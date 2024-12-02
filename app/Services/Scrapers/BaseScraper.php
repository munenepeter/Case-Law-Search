<?php

namespace App\Services\Scrapers;

use Exception;
use GuzzleHttp\Client;
use App\Models\ScrapingLog;
use Illuminate\Database\Capsule\Manager as DB;

abstract class BaseScraper {
    protected Client $client;
    protected string $scrapingType;
    protected string $baseUrl = 'https://new.kenyalaw.org/';
    protected ?int $logId = null;
    protected array $stats = [
        'processed' => 0,
        'updated' => 0,
        'failed' => 0
    ];

    public function __construct() {
        $this->client = new Client([
            'timeout' => 30,
            'verify' => false,
            'headers' => [
                'User-Agent' => 'Tabel Legal Resource Aggregator/1.0',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9',
                'Accept-Language' => 'en-US,en;q=0.5',
            ]
        ]);
    }

    protected function startScraping(): void {
        $log = ScrapingLog::create([
            'scraper_type' => $this->scrapingType,
            'start_time' => now(),
            'status' => 'Started'
        ]);
        $this->logId = $log->id;
    }

    protected function endScraping(string $status, ?string $errorMessage = null): void {
        ScrapingLog::where('id', $this->logId)->update([
            'status' => $status,
            'end_time' => now(),
            'items_processed' => $this->stats['processed'],
            'items_updated' => $this->stats['updated'],
            'items_failed' => $this->stats['failed'],
            'error_message' => $errorMessage
        ]);
    }

    protected function fetch(string $url): string {
        try {
            $response = $this->client->get($url);
            return (string) $response->getBody();
        } catch (Exception $e) {
            logger('error', "Failed to fetch URL: {$url}", [
                'error' => $e->getMessage()
            ]);
            $this->stats['failed']++;
            throw $e;
        }
    }

    protected function parseHtml(string $html): \DOMDocument {
        libxml_use_internal_errors(true);
        $doc = new \DOMDocument();
        $doc->loadHTML($html, LIBXML_NOERROR);
        libxml_clear_errors();
        return $doc;
    }

    protected function saveToJson(string $type, string $identifier, array $data): void {
        $path = storage_path("app/scraped/{$type}");
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        file_put_contents(
            "{$path}/{$identifier}.json",
            json_encode($data, JSON_PRETTY_PRINT)
        );
    }

    abstract public function scrape(): void;
    abstract protected function processItem($item): array;
    abstract protected function shouldUpdate($existingData, $newData): bool;
} 