<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\Reserve;
use App\Models\User;
use Carbon\Carbon;

class NewUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:newuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email on the day of reservation';

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
        $today = Carbon::today();
        $reserves=Reserve::wheredate('date', $today)->get();


        foreach($reserves as $reserve){
             Mail::to($reserve->user->email)->send(new WelcomeMail($reserve));
    }
    }
}
