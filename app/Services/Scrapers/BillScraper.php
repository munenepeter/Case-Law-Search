<?php

namespace App\Services\Scrapers;

use App\Models\Bill;
use DOMXPath;

class BillScraper extends BaseScraper {
    protected string $scrapingType = 'Bills';
    protected string $baseUrl = 'https://www.parliament.go.ke/';
    
    public function scrape(): void {
        try {
            $this->startScraping();
            
            // Get bills page
            $html = $this->fetch($this->baseUrl . 'bills-tracker');
            $doc = $this->parseHtml($html);
            $xpath = new DOMXPath($doc);
            
            // Find bill entries
            $billNodes = $xpath->query("//div[contains(@class, 'bill-item')]");
            
            foreach ($billNodes as $node) {
                try {
                    $billData = $this->processItem($node);
                    $this->stats['processed']++;
                    
                    // Check if bill exists
                    $existingBill = Bill::where('bill_number', $billData['bill_number'])
                                      ->where('year', $billData['year'])
                                      ->first();
                    
                    if (!$existingBill) {
                        Bill::create($billData);
                        $this->stats['updated']++;
                    } elseif ($this->shouldUpdate($existingBill, $billData)) {
                        $existingBill->update($billData);
                        $this->stats['updated']++;
                    }
                    
                    // Save raw data as JSON
                    $this->saveToJson('bills', $billData['bill_number'] . '_' . $billData['year'], $billData);
                    
                } catch (\Exception $e) {
                    $this->stats['failed']++;
                    logger('error', "Failed to process bill", [
                        'error' => $e->getMessage()
                    ]);
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
        
        $title = $xpath->evaluate("string(.//h3[@class='bill-title'])", $node);
        $billNumber = $xpath->evaluate("string(.//div[@class='bill-number'])", $node);
        $status = $xpath->evaluate("string(.//div[@class='bill-status'])", $node);
        $sponsor = $xpath->evaluate("string(.//div[@class='bill-sponsor'])", $node);
        
        // Extract year from bill number or title
        preg_match('/\b(20\d{2})\b/', $title . ' ' . $billNumber, $matches);
        $year = $matches[1] ?? date('Y');
        
        return [
            'title' => $title,
            'bill_number' => $billNumber,
            'year' => (int) $year,
            'status' => $status,
            'sponsor' => $sponsor,
            'content_json' => json_encode([
                'raw_title' => $title,
                'raw_status' => $status,
                'raw_sponsor' => $sponsor
            ]),
            'source_url' => $this->baseUrl . 'bills/' . $billNumber,
            'last_scraped' => now(),
            'is_valid' => true
        ];
    }
    
    protected function shouldUpdate($existingBill, $newData): bool {
        return $existingBill->status !== $newData['status'] ||
               $existingBill->title !== $newData['title'];
    }
} 