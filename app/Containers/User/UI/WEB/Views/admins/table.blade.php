<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Доступные Роли</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <form>

                <?
/*
                $manager=App\Containers\Manager\Models\Manager::where('id',$customer->getCustomersCompany['manager_id'])->first();
                if($manager){
                $manager_user=\App\Containers\User\Models\User::where('id',$manager->user_id)->first();}*/
                ?>
        <tr>
            <th class="customer_id" scope="row">{{$customer->id}}</th>
            <td class="customer_name">{{$customer->name}}</td>
            <td class="customer_email">{{$customer->email}}</td>
            <?
            ?> <td class="customer_email">
                <select class="form-control">
            @foreach($customer->roles as $role)
                <option>{{$role->display_name}}</option>

            @endforeach
                </select>
            </td>
            <td>
                <a href="javascript:void(0);" class="ChangeRoles btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-users"></i>
                </a>
                <a href="javascript:void(0)" class="PrependChangeCustomer btn btn-primary btn-sm btn-icon waves-effect waves-themed"  data-toggle="modal" data-target=".default-example-modal-right-lg-user">
                    <i class="fal fa-pencil"></i>
                </a>
                <a href="javascript:void(0);" class="DeleteCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed">
                    <i class="fal fa-times"></i>
                </a>
            </td>
        </tr>
            </form>
      @endforeach
        </tbody>
    </table>
</div>

    <script>
        $('.PrependChangeCustomer').click(function(){
            console.log('PrependChangeCustomer1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            //$('#manager_selected').val(1); //<---below this one
           $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/user/get',
                data: {customer_id:customer_id
                },
                beforeSend: function() {
                },
                complete: function() {
                    reloadData();
                },
                success: function (data) {
                    console.log('PrependChangeCustomer',data)
                    $('#customer_id').val(customer_id)
                    $('#customer_name').val(data.name)
                    $('#customer_sername').val(data.sername)

                    $('#customer_email').val(data.email)
                    $('#customer_info').val(data.info)
                    $('#customer_phone').val(data.phone)
                    $('#customer_address').val(data.address)
                   if(data.is_client==0){
                        $('#managerSwitch').prop('checked', true);
                    }
                    else{
                        $('#managerSwitch').prop('checked',false);
                    }
                    reloadData();
                      console.log('success')

                }
            });

            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:false,
                url: '/user/roles_get',
                data: {customer_id:customer_id
                },
                beforeSend: function() {
                },
                complete: function() {
                },
                success: function (data) {
                    $('#rolesBlock').html(data)
                }
            });
        });

        $('.DeleteCustomer').click(function(){

            @if(\Auth::user()->can('delete-users'))
            var customer_id =  $(this).parent().parent().find('.customer_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/users/delete',
                data: {id: customer_id
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                    console.log('success')
                    reloadData();
                }
            });
            @else
            alert('У вас недостаточно прав для удоления пользователя')
            @endif

        });

        $('.customSwitch2').change(function(){
           var customer=$(this).parent().find('.customSwitch2_id').val()
            var state = $(this).is(":checked")
            console.log(customer,state)

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/users/is_manager_set',
                data: {customer: customer,state:state
                },
                beforeSend: function() {
                },
                complete: function() {

                },
                success: function (data) {

                    console.log('success')
                }
            });
        })



    </script>


