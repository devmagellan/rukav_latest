<?php

namespace App\Ship\Providers;

use App\Ship\Parents\Providers\MainProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PodcastProcessed;
/**
 * Class ShipProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ShipProvider extends MainProvider
{


    /**
     * Register any Service Providers on the Ship layer (including third party packages).
     *
     * @var array
     */
    public $serviceProviders = [
	EventServiceProvider::class,
	\SocialiteProviders\Manager\ServiceProvider::class,
	];

    /**
     * Register any Alias on the Ship layer (including third party packages).
     *
     * @var  array
     */
    protected $aliases = [];

	protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // add your listeners (aka providers) here
      'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
      'SocialiteProviders\\Odnoklassniki\\OdnoklassnikiExtendSocialite@handle',
      'SocialiteProviders\\Facebook\\FacebookExtendSocialite@handle',
      'SocialiteProviders\\Apple\\AppleExtendSocialite@handle',
    ],
	];

    public function __construct()
    {
        parent::__construct(app());

        if (class_exists('Barryvdh\Debugbar\ServiceProvider')) {
            $this->serviceProviders[] = \Barryvdh\Debugbar\ServiceProvider::class;
        }

        if (class_exists('Barryvdh\Debugbar\Facade')) {
            $this->aliases[] = \Barryvdh\Debugbar\Facade::class;
        }
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ...

        parent::boot();
        // ...
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Load the ide-helper service provider only in non production environments.
         */
        if ($this->app->environment() !== 'production' && class_exists('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        parent::register();
    }



}
