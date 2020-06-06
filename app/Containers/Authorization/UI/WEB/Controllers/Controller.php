<?php

namespace App\Containers\Authorization\UI\WEB\Controllers;

use App\Containers\Authorization\UI\WEB\Requests\CreatePermissionsRequest;
use App\Containers\Authorization\UI\WEB\Requests\DeletePermissionsRequest;
use App\Containers\Authorization\UI\WEB\Requests\GetAllPermissionsRequest;
use App\Containers\Authorization\UI\WEB\Requests\CreateRolesRequest;
use App\Containers\Authorization\UI\WEB\Requests\UpdateRolesRequest;
use App\Containers\Authorization\UI\WEB\Requests\FindPermissionsByIdRequest;
use App\Containers\Authorization\UI\WEB\Requests\UpdatePermissionsRequest;
use App\Containers\Authorization\UI\WEB\Requests\StorePermissionsRequest;
use App\Containers\Authorization\UI\WEB\Requests\EditPermissionsRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Authorization\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllPermissionsRequest $request
     */
    public function index(GetAllPermissionsRequest $request)
    {
        $data['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
        $data['roles']=\App\Containers\Authorization\Models\Role::get();
        $data['first_roles']=\App\Containers\Authorization\Models\Role::first();
        //$permissions = Apiato::call('Permissions@GetAllPermissionsAction', [$request]);

        return view('authorization::index',$data);
    }

    /**
     * Show one entity
     *
     * @param FindPermissionsByIdRequest $request
     */
    public function show(FindPermissionsByIdRequest $request)
    {
        $permissions = Apiato::call('Permissions@FindPermissionsByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreatePermissionsRequest $request
     */
    public function create(CreatePermissionsRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StorePermissionsRequest $request
     */
    public function store(StorePermissionsRequest $request)
    {
        $permissions = Apiato::call('Permissions@CreatePermissionsAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditPermissionsRequest $request
     */
    public function edit(EditPermissionsRequest $request)
    {
        $permissions = Apiato::call('Permissions@GetPermissionsByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdatePermissionsRequest $request
     */
    public function update(UpdatePermissionsRequest $request)
    {
        $permissions = Apiato::call('Authorization@UpdatePermissionsAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeletePermissionsRequest $request
     */
    public function delete(DeletePermissionsRequest $request)
    {
         $result = Apiato::call('Permissions@DeletePermissionsAction', [$request]);

         // ..
    }

    public function postData(GetAllPermissionsRequest $request){
        $data['title']="Staff postData";
        $data['roles']=\App\Containers\Authorization\Models\Role::get();
        return view('authorization::table',$data);
    }


    public function postPermissionsData(GetAllPermissionsRequest $request){

        $data['title']="Staff postPermissionsData";
        $data['available_permissions_array']=\App\Containers\Authorization\Models\RoleHasPermission::select('permission_id')->where('role_id',$request->input('role_permission'))->get()->toArray();
        foreach($data['available_permissions_array'] as $perm){
            $data['available_permissions_final_array'][]=$perm['permission_id'];
        }
        $data['role_id']=$request->input('role_permission');
        $data['all_permissions']=\App\Containers\Authorization\Models\Permission::get();

        return view('authorization::table_permissions',$data);
    }

    public function getRoles(){
        $roles=\App\Containers\Authorization\Models\Role::get();
        return $roles;
    }

    public function createRole(CreateRolesRequest $request){
        $roles = Apiato::call('Authorization@CreateRolesAction', [$request]);
    }

    public function updateRole(UpdateRolesRequest $request){

        $roles = Apiato::call('Authorization@UpdateRolesAction', [$request]);
    }

    public function postPermissionsChange(GetAllPermissionsRequest $request){
$role=$request->input('role');
$permission=$request->input('permission');
        $value=$request->input('value');
        if( \App\Containers\Authorization\Models\RoleHasPermission::where('role_id',$role)->where('permission_id',$permission)->first() && $value=="false"){

            $row=\App\Containers\Authorization\Models\RoleHasPermission::where('role_id',$role)->where('permission_id',$permission)->delete();
            var_dump('popali',$row);
        }
        elseif(!\App\Containers\Authorization\Models\RoleHasPermission::where('role_id',$role)->where('permission_id',$permission)->first() && $value=="true"){
            \App\Containers\Authorization\Models\RoleHasPermission::insert(['role_id'=>$role,'permission_id'=>$permission]);}
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }



}
