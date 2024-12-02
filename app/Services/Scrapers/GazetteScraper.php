<?php

namespace App\Services\Scrapers;

use App\Models\Gazette;
use DOMXPath;

class GazetteScraper extends BaseScraper {
    protected string $scrapingType = 'Gazettes';
    protected string $baseUrl = 'https://www.kenyalaw.org/';
    
    public function scrape(): void {
        try {
            $this->startScraping();
            
            // Get gazettes page
            $html = $this->fetch($this->baseUrl . 'kenya_gazette/');
            $doc = $this->parseHtml($html);
            $xpath = new DOMXPath($doc);
            
            // Find gazette entries
            $gazetteNodes = $xpath->query("//div[contains(@class, 'gazette-notice')]");
            
            foreach ($gazetteNodes as $node) {
                try {
                    $gazetteData = $this->processItem($node);
                    $this->stats['processed']++;
                    
                    // Check if gazette exists
                    $existingGazette = Gazette::where('gazette_number', $gazetteData['gazette_number'])
                                            ->where('publication_date', $gazetteData['publication_date'])
                                            ->first();
                    
                    if (!$existingGazette) {
                        Gazette::create($gazetteData);
                        $this->stats['updated']++;
                    } elseif ($this->shouldUpdate($existingGazette, $gazetteData)) {
                        $existingGazette->update($gazetteData);
                        $this->stats['updated']++;
                    }
                    
                    // Save raw data as JSON
                    $this->saveToJson('gazettes', $gazetteData['gazette_number'], $gazetteData);
                    
                } catch (\Exception $e) {
                    $this->stats['failed']++;
                    logger('error', "Failed to process gazette ".$e->getMessage());
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
        
        $gazetteNumber = $xpath->evaluate("string(.//div[@class='gazette-number'])", $node);
        $title = $xpath->evaluate("string(.//h3[@class='gazette-title'])", $node);
        $type = $xpath->evaluate("string(.//div[@class='gazette-type'])", $node);
        $publicationDate = $xpath->evaluate("string(.//div[@class='publication-date'])", $node);
        
        return [
            'gazette_number' => $gazetteNumber,
            'publication_date' => date('Y-m-d', strtotime($publicationDate)),
            'type' => $type,
            'title' => $title,
            'content_json' => json_encode([
                'raw_title' => $title,
                'raw_type' => $type,
                'raw_date' => $publicationDate
            ]),
            'source_url' => $this->baseUrl . 'gazette/' . $gazetteNumber,
            'last_scraped' => now(),
            'is_valid' => true
        ];
    }
    
    protected function shouldUpdate($existingGazette, $newData): bool {
        return $existingGazette->title !== $newData['title'] ||
               $existingGazette->type !== $newData['type'];
    }
} 