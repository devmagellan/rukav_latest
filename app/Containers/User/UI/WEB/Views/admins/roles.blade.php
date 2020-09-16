<div class="form-group">
    <label class="form-label" for="select">Назначить этому пользователю роли</label>
    @foreach(\App\Containers\Authorization\Models\Role::get() as $role)
        <div class="custom-control custom-switch">
        <input type="checkbox" id="role_{{$role->id}}" class="custom-control-input" name="roles[]" value="{{$role->id}}" @if(in_array($role->id,$roles_array)) checked @endif>
        <label class="custom-control-label" for="role_{{$role->id}}">{{$role->display_name}}</label>
        </div>
    @endforeach

</div>