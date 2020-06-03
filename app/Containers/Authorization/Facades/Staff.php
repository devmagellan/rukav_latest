<?php
namespace App\Containers\Authorization\Facades;

use Illuminate\Support\Facades\Facade;

class Staff extends Facade {

    protected static function getFacadeAccessor() { return 'Staff'; }

}