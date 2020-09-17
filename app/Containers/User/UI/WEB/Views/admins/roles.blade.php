<div class="form-group">
    <label class="form-label" for="select">Назначить этому пользователю роли</label>
    @foreach(\App\Containers\Authorization\Models\Role::get() as $role)
        <div class="custom-control custom-switch">
        <input type="checkbox" id="role_{{$role->id}}" class="custom-control-input roles_checkbox" name="roles[]" value="{{$role->id}}" @if(in_array($role->id,$roles_array)) checked @endif>
        <label class="custom-control-label" for="role_{{$role->id}}">{{$role->display_name}}</label>
        </div>
    @endforeach

</div>

<script>
   $('.roles_checkbox').change(function(){
       var user='{{$user->id}}'
       var role=$(this).val()
       var state=$(this).is(":checked")
       console.log(user,role,state)
       $.ajax({
           method: 'POST',
           dataType: 'json',
           async:false,
           url: '/user/change_role',
           data: {user:user,state:state,role:role
           },
           beforeSend: function() {
           },
           complete: function() {
           },
           success: function (data) {
                alert('Роль у данного пользователя изменена!')
           }
       });
   })
</script>