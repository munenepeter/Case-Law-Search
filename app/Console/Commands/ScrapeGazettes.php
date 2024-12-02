<?php

namespace App\Console\Commands;

use Tabel\Core\Command;
use App\Services\Scrapers\GazetteScraper;
    
class ScrapeGazettes extends Command {
    public function handle(): int {
        try {
            $scraper = new GazetteScraper();

            $this->info('Starting gazette scraping...');
            $scraper->scrape();
            $this->info('Gazette scraping completed successfully!');

            return 0; // Success
        } catch (\Exception $e) {
            $this->error($e->getMessage());
            return 1; // Failure
        }
    }
}
