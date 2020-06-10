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
}
