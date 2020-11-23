<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AdminCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create admin';

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
        // rand date between 2020-01-01 00:00:00 and now.
        $int= mt_rand(1577836800,time());

        \App\Models\User::create([
            'name'  => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('1234'),
            'role'  => 'manager',
            'phone'  => '0123456789',
            'device_token' => \Str::random(50),
            'last_login' => date("Y-m-d H:i:s",$int)
        ]); 
    }
}
