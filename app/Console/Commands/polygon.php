<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\PolygonService;

class polygon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'polygon:news {ticker?} {--limit=30 : min - 10 max - 1000}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets a list of news by API for the specified company ticker';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ticker = $this->argument('ticker');
        $limit =  $this->option('limit');

        (new PolygonService)->getNews($ticker, $limit);


    }
}
