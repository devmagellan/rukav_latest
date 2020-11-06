<?php

namespace App\Containers\PrivateCabinet\Models;

use App\Ship\Parents\Models\Model;

class BlockedUser extends Model
{
    protected $fillable = [
'user_id','opponent'
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
    protected $resourceKey = 'blocked_users';
}
