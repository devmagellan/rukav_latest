<?php

namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecondMessangerGroups extends Model
{

  protected $fillable = [
    'group_name', 'parrent_category_id'

  ];

  protected $table='second_messanger_groups';
  public $timestamps = false;


}
