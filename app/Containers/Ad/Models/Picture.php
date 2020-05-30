<?php
namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;

class Picture extends Model
{
    protected $fillable = [
     'photo','message_id'

    ];

    public $timestamps = false;

}
