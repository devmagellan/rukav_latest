<?php

namespace App\Containers\User\Models;

use App\Containers\Authorization\Traits\AuthenticationTrait;
use App\Containers\Authorization\Traits\AuthorizationTrait;
use App\Containers\Payment\Contracts\ChargeableInterface;
use App\Containers\Payment\Models\PaymentAccount;
use App\Containers\Payment\Traits\ChargeableTrait;
use App\Ship\Parents\Models\UserModel;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class TmpUser extends UserModel implements ChargeableInterface
{

    use ChargeableTrait;
    use AuthorizationTrait;
    use AuthenticationTrait;
    use Notifiable;
    use HasRoles;
    use \Awobaz\Compoships\Compoships;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tmp_users';
protected $emailCode;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sername',
        'email',
        'password',
        'device',
        'platform',
        'gender',
        'birth',
        'social_provider',
        'social_token',
        'social_refresh_token',
        'social_expires_in',
        'social_token_secret',
        'social_id',
        'social_avatar',
        'social_avatar_original',
        'social_nickname',
        'confirmed',
        'is_client',
        'sername',
      'country',
      'phone',
        'additional_phone',
        'show_phone',
        'show_additional_phone',
        'avatar','vid_user'
    ];

    protected $casts = [
        'is_client' => 'boolean',
        'confirmed' => 'boolean',
    ];

    /**
     * The dates attributes.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        //'password',
        'remember_token',
    ];

  /**
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
    public function paymentAccounts()
    {
        return $this->hasMany(PaymentAccount::class);
    }


    public function getCompany(){
        return $this->hasManyThrough('App\Domain\Company\Models\Company', 'App\AdminCompany','admin_id','id','id','company_id');

    }

    public function getCustomersCompany(){
        return $this->hasOne(\App\Containers\Customer\Models\Customer::class);

    }

    public function getCompanyBadges(){
        return $this->hasMany('App\Domain\Company\Models\CompanyBadge', 'company_id','company_id');

    }

    public function collegues(){
        return $this->hasMany('App\User', 'company_id','company_id');
    }


    public function manager(){

        return $this->hasOneThrough('App\Domain\Manager\Models\Manager', 'App\Domain\Customer\Models\Customer','user_id','id','id','manager_id');

    }

    public function messagesSent(){
        return $this->hasMany('App\Domain\Customer\Models\Message', 'sender','id');
    }


    public function messagesReceived(){
        return $this->hasMany('App\Domain\Customer\Models\Message', 'addressant','id');
    }

    public function getBusinessAccount(){
        return $this->hasOne(\App\Containers\User\Models\BusinessAccount::class);

    }

    public function getIndividualAccount(){
        return $this->hasOne(\App\Containers\User\Models\IndividualAccount::class);

    }

    public function getOrganisationAccount(){
        return $this->hasOne(\App\Containers\User\Models\OrganisationAccount::class);

    }

    public function adsWithGroup(){
        return $this->hasMany(\App\Containers\Ad\Models\Ad::class, 'sender','id');
    }



}
