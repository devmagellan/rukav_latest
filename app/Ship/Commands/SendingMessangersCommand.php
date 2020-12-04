<?php

namespace App\Ship\Commands;

use App\Ship\Parents\Commands\ConsoleCommand;
use App\Containers\User\Jobs\SendingMessangersEmailNotification;
use Carbon\Carbon;
/**
 * Class ExpiredAdsCommand
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class SendingMessangersCommand extends ConsoleCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sending:messangers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Messangers!';

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
		$date=$mutable->subMinutes(5);
	//\Log::info('Days',array($date));
     $connects=\App\Containers\Connect\Models\Connect::where('created_at', '>=', $date)->where('viewed_at', null)->where('text','!=', null)->with('receiver')->get();

	 if($connects){
	 foreach($connects as $connect){
		 //\Log::info('ArrayDays',array($user->getSender));
		 dispatch(new SendingMessangersEmailNotification($connect))->onQueue('queue_name');
		 \Log::info('$mutable'.date("Y-m-d H:i:s"));
     //$connect->viewed_at=$mutable;
     $connect->save();
	 }}

		//

    }
}
