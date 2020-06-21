<?php

namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecondMessangerGroupsItem extends Model
{

  protected $fillable = [
    'group_id', 'user_id'

  ];

  protected $table='second_messanger_group_items';
  public $timestamps = false;


    public function group(){
        return $this->hasOne(\App\Containers\Ad\Models\SecondMessangerGroups::class,'id','group_id');

    }


    public function message(){
        return $this->hasMany(\App\Containers\Connect\Models\Connect::class,'receiver_id','user_id')->where('group_id', $this->group_id);

    }
}
