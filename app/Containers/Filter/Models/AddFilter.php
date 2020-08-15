<?php

namespace App\Containers\Filter\Models;

use App\Ship\Parents\Models\Model;

class AddFilter extends Model
{
    protected $fillable = [
'add_id','filter_id','value'
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
    protected $resourceKey = 'add_filters';
  protected $table = 'add_filters';
}
