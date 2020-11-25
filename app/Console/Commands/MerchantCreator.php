<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MerchantCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:merchant';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create merchant and his store';

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

        $user = \App\Models\User::create([
            'name'  => 'Merchant',
            'email' => 'merchant@merchant.com',
            'password' => \Hash::make('1234'),
            'role'  => 'merchant',
            'phone'  => '0123456789',
            'device_token' => \Str::random(50),
            'last_login' => date("Y-m-d H:i:s",$int)
        ]); 

        \App\Models\Stores::create([
            'name'  => $user->name.' store',
            'user_id' => $user->id,
        ]);
    }
}
