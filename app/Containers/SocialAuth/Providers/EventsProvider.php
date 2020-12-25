<?php

namespace App\Containers\SocialAuth\Providers;

use App\Ship\Parents\Providers\MainProvider;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventsProvider
 *
 * A.K.A app/Providers/EventsServiceProvider.php
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class EventsProvider extends ServiceProvider
{

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
   	protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // add your listeners (aka providers) here
        'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
		'SocialiteProviders\\Odnoklassniki\\OdnoklassnikiExtendSocialite@handle',
		'SocialiteProviders\\Facebook\\FacebookExtendSocialite@handle',
      'SocialiteProviders\\Apple\\AppleExtendSocialite@handle',
    ],

];


    /**
     * Register any other events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

}
