<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            @if(!isset($deleted) )
            <th>Доступные Роли</th>
            @endif
            <th>Объявлений</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
        <form>
            <input type="hidden" name="customer_id" id="customer_id" value="{{$customer->id}}">
        <tr>
            <th class="customer_id" scope="row">{{$customer->id}}</th>
            <td class="customer_name">{{$customer->name}}</td>
            <td class="customer_email">{{$customer->email}}</td>
            @if(!isset($deleted) )
            <td class="customer_email">
                <select class="form-control">
            @foreach($customer->roles as $role)
                <option>{{$role->display_name}}</option>

            @endforeach
                </select>
            </td>
            @endif
            <td class="customer_email">{{$customer->adsWithGroup->count()}}</td>
            <td>
                @if(!isset($deleted))
                @if(\Auth::user()->can('manage-roles'))
                        <button type="button" class="ChangePassword btn btn-danger btn-sm btn-icon waves-effect waves-themed"
                                data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-original-title="смена пароля"
                        >
                            <i class="fal fa-key"></i>
                        </button>
                        <button type="button" class="ChangeRoles btn btn-danger btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-original-title="редактирование ролей">
                            <i class="fal fa-users"></i>
                        </button>
                @endif
                    <button type="button" class="PrependChangeCustomer btn btn-primary btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-original-title="редактирование пользователя" >
                        <i class="fal fa-pencil"></i>
                    </button>
                    @if(\Auth::user()->can('delete-users'))
                        <a href="javascript:void(0);" class="DeleteCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Пользователь будет перемещен в таблицу удаленных" data-original-title="soft delete" >
                            <i class="fal fa-times"></i>
                        </a>
                 @endif
                    @else
                    <a href="javascript:void(0);" class="RecoveryCustomer btn btn-success btn-sm btn-icon waves-effect waves-themed"  data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Пользователь будет перемещен в основную таблицу" data-original-title="востановление">
                        <i class="fas fa-trash-restore"></i>
                    </a>
                    @if(\Auth::user()->can('delete-users'))
                        <a href="javascript:void(0);" class="HardDeleteCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Пользователь будет удален навсегда" data-original-title="hard delete">
                            <i class="fal fa-times"></i>
                        </a>
                    @endif


                 @endif
            </td>
        </tr>
            </form>
      @endforeach
        </tbody>
    </table>
</div>

    <script>
        $('.HardDeleteCustomer').click(function(){
            console.log(444)
            $('.example-modal-default-transparent').modal({show:true});
            $('[data-toggle=popover]').popover('hide');
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            $('#customer_id').val(customer_id)
            $('#delete_type').val('hard')

        });

        $('.ChangePassword').click(function(){
            console.log('ChangeRoles1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            $('.default-example-modal-right-lg-password').modal({show:true});
            $('[data-toggle=popover]').popover('hide');
            console.log('prepare_customer',customer_id)
            $('#customer_password_id').val(customer_id)
        });
        $('.ChangeRoles').click(function(){
            $('.default-example-modal-right-lg-roles').modal({show:true});
            $('[data-toggle=popover]').popover('hide')
            console.log('ChangeRoles1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()

            console.log('prepare_customer',customer_id)
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

        $('.RecoveryCustomer').click(function(){
            console.log('RecoveryCustomer1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()

            console.log('prepare_customer',customer_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/user/recovery',
                data: {customer_id:customer_id
                },
                beforeSend: function() {
                },
                complete: function() {
                },
                success: function (data) {
                    reloadData();
                }
            });
        });




        $('.PrependChangeCustomer').click(function(){
            $('.default-example-modal-right-lg-user').modal({show:true});
            $('[data-toggle=popover]').popover('hide');
            console.log('PrependChangeCustomer1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            //$('#manager_selected').val(1); //<---below this one
            console.log('prepare_customer',customer_id)
            localStorage.setItem('customer_id',customer_id);
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
                    $('#customer_id').val(data.id)
                    $('#customer_name').val(data.name)
                    $('#confirmed').val(data.confirmed)
                    $('#customer_sername').val(data.sername)
                    $('#admin_side').val(1)
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
            console.log('prepare_customer',customer_id)
              });

        $('.DeleteCustomer').click(function(){
            $('.example-modal-default-transparent').modal({show:true});
            $('[data-toggle=popover]').popover('hide');
            console.log(444)
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            $('#customer_id').val(customer_id)

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


