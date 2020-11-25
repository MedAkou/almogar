<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add fake data to database';

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
     * @return mixed
     */
    public function handle()
    {
        \Artisan::call('db:seed');
    }
}
