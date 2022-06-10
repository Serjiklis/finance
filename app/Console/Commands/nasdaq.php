<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Service\NasdaqService;

class nasdaq extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nasdaq:data {id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->argument('id');
        
        (new NasdaqService)->getDataApi();
    }
}
