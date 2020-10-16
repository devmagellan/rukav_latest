<?php


namespace App\Containers\User\Models;

use App\Ship\Parents\Models\Model;

class BusinessUser extends Model
{
  protected $guarded = [];

  protected $fillable = [
    'email',
    'company_name',
    'business_location',
    'business_type',
    'www',
    'user_id'
  ];

  public function user()
  {
    return $this->hasOne(User::class,'id','user_id');
  }
}
