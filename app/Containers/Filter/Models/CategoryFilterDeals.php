<?php

namespace App\Containers\Filter\Models;

use App\Ship\Parents\Models\Model;

class CategoryFilterDeals extends Model
{
    protected $fillable = [
'category_id','filter_id'
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
    protected $resourceKey = 'category_filter_deals';
  protected $table = 'category_filter_deals';

  public function filter(){
    return $this->hasOne(\App\Containers\Filter\Models\FilterDeals::class,'id','filter_id');

  }
}
