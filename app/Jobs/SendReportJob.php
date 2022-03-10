<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\SendKaveCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $produce=\App\Models\Barcode::whereDate('created_at', \Carbon\Carbon::today())->count();
        $serive=\App\Models\Repair:: whereDate('created_at', \Carbon\Carbon::today())->count();
        $sell=\App\Models\Barcode::whereDate('sell', \Carbon\Carbon::today())->count();
        $invitedUser = new User();
        $invitedUser->notify(new SendKaveCode( '09121498571','daily-report',$produce,$serive,$sell));
        Log::info('slam3');
    }
}
