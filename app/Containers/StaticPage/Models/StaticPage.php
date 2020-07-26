<?php

namespace App\Containers\StaticPage\Models;

use App\Ship\Parents\Models\Model;

class StaticPage extends Model
{
    protected $fillable = [
        'id','active','editor','name','content','group'
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
    protected $resourceKey = 'static_pages';

    protected $table = 'static_pages';

    public function getGroup(){
        return $this->hasOne(\App\Containers\StaticPage\Models\StaticPageGroup::class,'id','group');

    }
}
