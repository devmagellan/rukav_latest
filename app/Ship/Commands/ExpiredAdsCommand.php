<?php

namespace App\Ship\Commands;

use App\Ship\Parents\Commands\ConsoleCommand;
use App\Containers\User\Jobs\ExpiredAdsEmailVerification;
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

     //$expiredAds=\App\Containers\Ad\Models\Ad::where('')->get();
		//dispatch(new SendEmailVerification($user))->onQueue('queue_name');

    }
}
