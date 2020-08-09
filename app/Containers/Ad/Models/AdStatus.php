<?php

namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;

class AdStatus extends Model
{

    protected $attributes = [

];
    protected $table = 'ad_statuses';

    protected $hidden = [

    ];

    protected $casts = [

    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'ad_statuses';



    protected $fillable = [
        'id', 'name'

    ];


}
