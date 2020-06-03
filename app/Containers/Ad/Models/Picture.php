<?php

namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Picture extends Model
{
  use SoftDeletes;

  protected $fillable = [
    'photo', 'message_id', 'ads_id'

  ];

  public $timestamps = false;

  public function ads()
  {
    return $this->belongsTo(Ad::class);
  }

}
