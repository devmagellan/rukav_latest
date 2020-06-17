<?php

namespace App\Containers\Connect\Models;

use App\Ship\Parents\Models\Model;

class Connect extends Model
{
    protected $fillable = [
        'receiver_id',
        'message_id',
        'sender_id',
        'sender_name',
        'sender_email',
        'sender_phone',
        'text',
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

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'connects';

    public function message(){
        return $this->hasOne(\App\Containers\Ad\Models\Ad::class,'id','message_id');

    }

    public function sender(){
        return $this->hasOne(\App\Containers\User\Models\User::class,'id','sender_id');

    }

    public function receiver(){
        return $this->hasOne(\App\Containers\User\Models\User::class,'id','receiver_id');

    }

    public function pictures(){
        return $this->hasOneThrough(\App\Containers\Ad\Models\Picture::class, \App\Containers\Ad\Models\Ad::class,'id','id','message_id','id');


    }

    public function author(){
        return $this->hasOneThrough(\App\Containers\User\Models\User::class, \App\Containers\Ad\Models\Ad::class,'id','id','message_id','sender');


    }
}
