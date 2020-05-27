<?php

namespace App\Containers\Manager\Models;

use App\Ship\Parents\Models\Model;

class Manager extends Model
{
    protected $fillable = [
        'user_id','company_id','login','department','info','photo','address','active',

    ];



    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user(){
        return $this->hasOne('App\User','id','user_id');

    }

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'managers';
}
