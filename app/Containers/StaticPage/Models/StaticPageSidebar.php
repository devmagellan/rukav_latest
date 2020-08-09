<?php

namespace App\Containers\StaticPage\Models;

use App\Ship\Parents\Models\Model;

class StaticPageSidebar extends Model
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
    protected $resourceKey = 'staticpage_sidebar_links';

    protected $table = 'staticpage_sidebar_links';

}
