<?php

namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Awobaz\Compoships\Compoships;

class SecondMessangerGroupRecipientItems extends Model
{

  use Compoships;

  protected $fillable = [
    'group_id', 'user_id'

  ];

  protected $group_id;
  protected $table='second_messanger_group_recipient_items';
  public $timestamps = false;


    public function group(){
        return $this->hasOne(\App\Containers\Ad\Models\SecondMessangerGroups::class,'id','group_id');

    }


    public function connects(){
        return $this->hasMany(\App\Containers\Connect\Models\Connect::class,['receiver_id','group_id'],['user_id','group_id']);

    }
}
