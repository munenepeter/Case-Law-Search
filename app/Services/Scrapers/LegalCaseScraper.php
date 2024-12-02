<?php

namespace App\Services\Scrapers;

use App\Models\LegalCase;
use App\Models\Court;
use DOMXPath;

class LegalCaseScraper extends BaseScraper {
    protected string $scrapingType = 'Cases';

    public function scrape(): void {
        try {
            $this->startScraping();

            // Get latest cases page
            $html = $this->fetch($this->baseUrl . 'kl/cases/latest');
            $doc = $this->parseHtml($html);
            $xpath = new DOMXPath($doc);

            // Find case links
            $caseNodes = $xpath->query("//div[contains(@class, 'case-item')]");

            foreach ($caseNodes as $node) {
                try {
                    $caseData = $this->processItem($node);
                    $this->stats['processed']++;

                    // Check if case exists
                    $existingCase = LegalCase::where('citation', $caseData['citation'])->first();

                    if (!$existingCase) {
                        LegalCase::create($caseData);
                        $this->stats['updated']++;
                    } elseif ($this->shouldUpdate($existingCase, $caseData)) {
                        $existingCase->update($caseData);
                        $this->stats['updated']++;
                    }

                    // Save raw data as JSON
                    $this->saveToJson('cases', $caseData['citation'], $caseData);
                } catch (\Exception $e) {
                    $this->stats['failed']++;
                    logger('error', "Failed to process case ".$e->getMessage());
                }
            }

            $this->endScraping('Success');
        } catch (\Exception $e) {
            $this->endScraping('Failed', $e->getMessage());
            throw $e;
        }
    }

    protected function processItem($node): array {
        $xpath = new DOMXPath($node->ownerDocument);

        // Extract case details
        $citation = $xpath->evaluate("string(.//div[@class='citation'])", $node);
        $title = $xpath->evaluate("string(.//h2[@class='case-title'])", $node);
        $courtName = $xpath->evaluate("string(.//div[@class='court-name'])", $node);

        // Get or create court
        $court = Court::firstOrCreate(
            ['name' => $courtName],
            ['court_level' => $this->determineCourLevel($courtName)]
        );

        // Generate content hash
        $contentHash = hash('sha256', $title . $citation);

        return [
            'citation' => $citation,
            'title' => $title,
            'court_id' => $court->id,
            'content_hash' => $contentHash,
            'source_url' => $this->baseUrl . 'kl/cases/' . $citation,
            'last_scraped' => now(),
            'is_valid' => true
        ];
    }

    protected function shouldUpdate($existingCase, $newData): bool {
        return $existingCase->hasContentChanged($newData['content_hash']);
    }

    private function determineCourLevel(string $courtName): string {
        if (stripos($courtName, 'Supreme') !== false) {
            return 'Supreme';
        } elseif (stripos($courtName, 'Appeal') !== false) {
            return 'Appeal';
        } elseif (stripos($courtName, 'High') !== false) {
            return 'High';
        }
        return 'Magistrate';
    }
}
