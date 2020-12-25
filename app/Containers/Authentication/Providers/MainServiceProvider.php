<?php

namespace App\Containers\Authentication\Providers;

use App\Ship\Parents\Providers\MainProvider;
use Laravel\Passport\PassportServiceProvider;

/**
 * Class MainServiceProvider.
 *
 * The Main Service Provider of this container, it will be automatically registered in the framework.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
class MainServiceProvider extends MainProvider
{

    /**
     * Container Service Providers.
     *
     * @var array
     */
    public $serviceProviders = [
        \Laravolt\Avatar\ServiceProvider::class,
        PassportServiceProvider::class,
        AuthProvider::class,
        MiddlewareServiceProvider::class,
		\SocialiteProviders\Manager\ServiceProvider::class,
		\Prettus\Repository\Providers\RepositoryServiceProvider::class,
    ];

    /**
     * Container Aliases
     *
     * @var  array
     */
    public $aliases = [

    ];

	protected $listen = [
    \SocialiteProviders\Manager\SocialiteWasCalled::class => [
        // add your listeners (aka providers) here
      'SocialiteProviders\\VKontakte\\VKontakteExtendSocialite@handle',
      'SocialiteProviders\\Odnoklassniki\\OdnoklassnikiExtendSocialite@handle',
      'SocialiteProviders\\Facebook\\FacebookExtendSocialite@handle',
      'SocialiteProviders\\Apple\\AppleExtendSocialite@handle',
    ],
];

}
