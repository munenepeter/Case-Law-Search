<?php

namespace App\Services\Scrapers;

use App\Models\ParliamentSession;
use DOMXPath;

class ParliamentScraper extends BaseScraper {
    protected string $scrapingType = 'Parliament';
    protected string $baseUrl = 'https://www.parliament.go.ke/';
    
    public function scrape(): void {
        try {
            $this->startScraping();
            
            // Get parliament calendar page
            $html = $this->fetch($this->baseUrl . 'calendar');
            $doc = $this->parseHtml($html);
            $xpath = new DOMXPath($doc);
            
            // Find session entries
            $sessionNodes = $xpath->query("//div[contains(@class, 'session-item')]");
            
            foreach ($sessionNodes as $node) {
                try {
                    $sessionData = $this->processItem($node);
                    $this->stats['processed']++;
                    
                    // Check if session exists
                    $existingSession = ParliamentSession::where('title', $sessionData['title'])
                                                      ->where('date', $sessionData['date'])
                                                      ->where('time', $sessionData['time'])
                                                      ->first();
                    
                    if (!$existingSession) {
                        ParliamentSession::create($sessionData);
                        $this->stats['updated']++;
                    } elseif ($this->shouldUpdate($existingSession, $sessionData)) {
                        $existingSession->update($sessionData);
                        $this->stats['updated']++;
                    }
                    
                    // Save raw data as JSON
                    $identifier = date('Y-m-d', strtotime($sessionData['date'])) . '_' . 
                                str_replace(':', '', $sessionData['time']);
                    $this->saveToJson('parliament', $identifier, $sessionData);
                    
                } catch (\Exception $e) {
                    $this->stats['failed']++;
                    logger('error', "Failed to process parliament session ".$e->getMessage());
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
        
        $title = $xpath->evaluate("string(.//h3[@class='session-title'])", $node);
        $type = $xpath->evaluate("string(.//div[@class='session-type'])", $node);
        $dateTime = $xpath->evaluate("string(.//div[@class='session-datetime'])", $node);
        $location = $xpath->evaluate("string(.//div[@class='session-location'])", $node);
        $status = $xpath->evaluate("string(.//div[@class='session-status'])", $node);
        
        // Parse date and time
        preg_match('/(\d{4}-\d{2}-\d{2})\s+(\d{2}:\d{2})/', $dateTime, $matches);
        
        return [
            'session_type' => $type,
            'title' => $title,
            'date' => $matches[1] ?? now(),
            'time' => $matches[2] ?? '00:00',
            'location' => $location,
            'status' => $status,
            'content_json' => json_encode([
                'raw_title' => $title,
                'raw_datetime' => $dateTime,
                'raw_location' => $location,
                'raw_status' => $status
            ]),
            'source_url' => $this->baseUrl . 'session/' . urlencode($title),
            'last_scraped' => now(),
            'is_valid' => true
        ];
    }
    
    protected function shouldUpdate($existingSession, $newData): bool {
        return $existingSession->status !== $newData['status'] ||
               $existingSession->location !== $newData['location'];
    }
} 