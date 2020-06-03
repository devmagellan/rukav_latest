<?php

namespace App\Containers\Authorization\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    //
    protected $table="role_has_permissions";


    public function permission_item()
    {
        return $this->hasOne(\App\Containers\Authorization\Models\Permission::class,'id','permission_id');
    }
}
