<?php

namespace App\Containers\Customer\Models;

use App\Ship\Parents\Models\Model;

class Customer extends Model
{
    protected $fillable = [
        'user_id', 'company_id','department','photo','active','position','manager_id','active','birth_date','start_date','sex','location'

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
    protected $resourceKey = 'customers';
}
