<?php


namespace App\Containers\User\Models;

use App\Ship\Parents\Models\Model;

class OrganisationAccount extends Model
{
  protected $guarded = [];
  public function users()
  {
    return $this->belongsTo(User::class);
  }
}
