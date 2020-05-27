<?php

namespace App\Containers\Site\Models;

use App\Ship\Parents\Models\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'parent_id','name','icon','link','photo'

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
    protected $resourceKey = 'product_categories';
}
