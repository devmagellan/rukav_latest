<?php


namespace App\Containers\User\Models;

use App\Ship\Parents\Models\Model;

class IndividualAccount extends Model
{
  protected $guarded = [];

  protected $fillable = [
    'hours_from_weekday',
    'minutes_from_weekday',
    'hours_till_weekday',
    'minutes_till_weekday',
    'hours_from_saturday',
    'minutes_from_saturday',
    'hours_till_saturday',
    'minutes_till_saturday',
    'hours_from_sunday',
    'minutes_from_sunday',
    'hours_till_sunday',
    'minutes_till_sunday',
    'business_name',
'www',
'address',
'post_code','user_id'
  ];
  public function users()
  {
    return $this->belongsTo(User::class);
  }
}
