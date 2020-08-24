<?php

namespace App\Ship\Commands;

use App\Ship\Parents\Commands\ConsoleCommand;
use App\Containers\User\Jobs\ExpiredAdsEmailVerification;
use Carbon\Carbon;
/**
 * Class ExpiredAdsCommand
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ExpiredAdsCommand extends ConsoleCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:ads';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expired Ads!';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
		$mutable = Carbon::now();
		$date=$mutable->subDays(2);
	//\Log::info('Days',array($date));
     $expiredAds=\App\Containers\Ad\Models\Ad::where('expired', '>=', $date)->where('expired_sent',0)->with('getSender')->get();
	 
	 if($expiredAds){
	 foreach($expiredAds as $user){
		 //\Log::info('ArrayDays',array($user->getSender));
		 dispatch(new ExpiredAdsEmailVerification($user->getSender))->onQueue('queue_name');
		 $user->expired_sent=1;
		 $user->save();
	 }}
	 
		//

    }
}
