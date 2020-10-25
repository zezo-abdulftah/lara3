<?php

namespace App\Console\Commands;

use App\Mail\modd;
use http\Client\Curl\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class expires extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'User:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this for our work 0>>not active 1>>expire';

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
        $users=\App\User::pluck('email') -> toArray();
        $data=["lesson" =>"php","great"=>3];
        foreach ($users as $user){
   Mail::To($user) ->send(new modd($data));
        }


    }
}
