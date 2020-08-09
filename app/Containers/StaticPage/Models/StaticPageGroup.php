<?php

namespace App\Containers\StaticPage\Models;

use App\Ship\Parents\Models\Model;

class StaticPageGroup extends Model
{
    protected $fillable = [
'link','name','staticpage_id'
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
    protected $resourceKey = 'staticpage_groups';

    protected $table = 'staticpage_groups';

}
