<?php

namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;

class BritainRegion extends Model
{

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
    protected $resourceKey = 'britain_regions';



    protected $fillable = [
        'name', 'parent_id'

    ];



}
