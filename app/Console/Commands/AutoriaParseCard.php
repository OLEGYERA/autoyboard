<?php

namespace App\Console\Commands;

use App\Http\Controllers\Aggregator\Parse;
use Illuminate\Console\Command;

class AutoriaParseCard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse_card:autoria';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        (new Parse())->runParseCards();
        return 0;
    }
}
