<?php

namespace App\Containers\AdminMenu\Models;

use App\Ship\Parents\Models\Model;

class AdminMenu extends Model
{
    protected $guard_name = 'admin';

    protected $fillable = [

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
    protected $resourceKey = 'adminmenus';
}
