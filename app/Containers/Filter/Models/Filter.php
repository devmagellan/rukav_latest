<?php

namespace App\Containers\Filter\Models;

use App\Ship\Parents\Models\Model;

class Filter extends Model
{
    protected $fillable = [
'name','active'
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
    protected $resourceKey = 'filters';
}
