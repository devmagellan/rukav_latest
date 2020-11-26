<?php

namespace App\Containers\Site\Models;

use App\Ship\Parents\Models\Model;

class ProductCategory extends Model
{
  protected $primaryKey = 'id';
  protected $fillable = [
    'parent_id', 'name', 'icon', 'link', 'photo'

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

  public function childrenCategories()
  {
    return $this->hasMany(ProductCategory::class, 'parent_id', 'id');
  }

    public function children() { return $this->hasMany('App\Containers\Site\Models\ProductCategory', 'parent_id', 'id'); }
}
