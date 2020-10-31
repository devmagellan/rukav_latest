<style>

    .banned{
       color:red
    }
</style>

<link rel="stylesheet" media="screen, print" href="https://stackpath.bootstrapcdn.com/font-awesome/5.14.0/css/font-awesome.min.css">

<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Вид пользователя</th>
            <th>Телефон</th>
            <th>Объявлений</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>Страна</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $customer)
            <form>
                <input type="hidden" name="customer_id" id="customer_id" value="{{$customer->id}}">
        <tr>
            <th class="customer_id @if($customer->confirmed==2) banned @endif"  scope="row">{{$customer->id}}</th>
            <td class="customer_name @if($customer->confirmed==2) banned @endif">{{$customer->name}}</td>
            <td class="customer_email @if($customer->confirmed==2) banned @endif">{{$customer->email}}</td>
            <td class="customer_phone @if($customer->confirmed==2) banned @endif">{{$customer->vid_user}}</td>
            <td class="customer_phone @if($customer->confirmed==2) banned @endif">{{$customer->phone}}</td>
          <td class="customer_phone"><a href="/ads?client_id={{$customer->id}}" >{{$customer->adsWithGroup->count()}}</a>

            </td>
            <td class="customer_phone"></td>
            <td class="customer_phone"></td>
            <td class="customer_manager">


            </td>

            <td class="customer_phone"></td>
            <td class="customer_phone"></td>
            <td class="customer_phone">{{$customer->country}}</td>
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
                        <a href="/admin/user_add/adv/{{$customer->id}}" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-original-title="создание объявления">
                            <i class="fal fa-file"></i>
                        </a>
                    @if(\Auth::user()->can('delete-users'))
                        <a href="javascript:void(0);" class="DeleteCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Пользователь будет перемещен в таблицу удаленных?" data-original-title="soft delete" >
                            <i class="fal fa-times"></i>
                        </a>
                    @endif
                @else
                    <a href="javascript:void(0);" class="RecoveryCustomer btn btn-success btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Пользователь будет перемещен в основную таблицу" data-original-title="востановление">
                        <i class="fas fa-trash-restore"></i>
                    </a>
                    @if($customer->confirmed==2)
                        <a href="javascript:void(0);" class="UnBanCustomer btn btn-success btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="IP пользователя будет разблокирован" data-original-title="разабанить">
                            <i class="fa fa-ban"></i>
                        </a>
                        @else
                    <a href="javascript:void(0);" class="BanCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="IP пользователя будет заблокирован" data-original-title="забанить">
                        <i class="fa fa-ban"></i>
                    </a>


                        @endif
                    @if(\Auth::user()->can('delete-users'))
                  <a href="javascript:void(0);" class="HardDeleteCustomer btn btn-danger btn-sm btn-icon waves-effect waves-themed" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Пользователь будет удален навсегда" data-original-title="hard delete">
                    <i class="fal fa-times"></i>
                  </a>
                @endif

                @endif
                  @if($customer->confirmed==\App\Containers\User\Models\User::STATUS_CREATED_BY_ADMIN_NOT_CONFIRMED)
                    <a href="javascript:void(0);" class="ShowUserPassword btn btn-danger btn-sm btn-icon waves-effect waves-themed" data-id="{{openssl_decrypt($customer->encripted_password,"AES-128-ECB",'password')}}" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Показать пароль пользователя" data-original-title="show password">
                      <i class="fal fa-eye"></i>
                    </a>
                  @endif
            </td>
        </tr>
            </form>
      @endforeach
        </tbody>
    </table>
</div>

    <script>

      $('.ShowUserPassword').click(function(){

        $('.default-example-modal-show-user-password').modal({show:true});
        var myBookId = $(this).data('id');
        console.log(myBookId);
        $(".default-example-modal-show-user-password #bookId").val( myBookId );
      })

        $('.ChangePassword').click(function(){
            $('.default-example-modal-right-lg-password').modal({show:true});
            $('[data-toggle=popover]').popover('hide');
        })

        $('.ChangeRoles').click(function(){
            $('.default-example-modal-right-lg-roles').modal({show:true});
            $('[data-toggle=popover]').popover('hide');
        })
        $('.HardDeleteCustomer').click(function(){
            $('.example-modal-default-transparent').modal({show:true});
            $('[data-toggle=popover]').popover('hide');
            console.log(444)
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            $('#customer_id').val(customer_id)
            $('#delete_type').val('hard')

        });


        $('.DeleteCustomer').click(function(){
            $('.example-modal-default-transparent').modal({show:true});
            $('[data-toggle=popover]').popover('hide');

            console.log(444)
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            $('#customer_id').val(customer_id)
            $('#delete_type').val('soft')

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
        $('.BanCustomer').click(function(){
            console.log('RecoveryCustomer1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()

            console.log('prepare_customer',customer_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/user/ban',
                data: {customer_id:customer_id
                },
                beforeSend: function() {
                },
                complete: function() {
                },
                success: function (data) {
                    if(data.result=='success'){
                    reloadData();}
                    else{
                        alert('No Client IP')
                    }


                }
            });
        });

        $('.UnBanCustomer').click(function(){
            console.log('RecoveryCustomer1')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()

            console.log('prepare_customer',customer_id)
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/user/unban',
                data: {customer_id:customer_id
                },
                beforeSend: function() {
                },
                complete: function() {
                },
                success: function (data) {
                    if(data.result=='success'){
                        reloadData();}
                    else{
                        alert('No Client IP')
                    }


                }
            });
        });


        $('.PrependChangeCustomer').click(function(){


            $('.default-example-modal-right-lg-user').modal({show:true});
            $('[data-toggle=popover]').popover('hide');
            console.log('PrependChangeCustomer2')
            var customer_id =  $(this).parent().parent().find('.customer_id').text()
            //$('#manager_selected').val(1); //<---below this one
            console.log('prepare_customer',customer_id)
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

<script type="text/javascript">
    $('body').popover(
        {
            selector: '.has-popover'
        });


    function usingSelectorOption()
    {
        return $('#use-selector').is(':checked');
    }

    function updateCodeView()
    {
        $('#with-selector-code').toggle(usingSelectorOption());
        $('#without-selector-code').toggle(!usingSelectorOption());
    }

    $(function()
    {
        // Update code view when checkbox is toggled
        updateCodeView();
        $('#use-selector').click(function()
        {
            updateCodeView();
        });


        var startedDemo = false;
        $('#add-button').click(function()
        {
            // One-time initialization
            if (!startedDemo)
            {
                if (usingSelectorOption())
                {

                }
                else
                {
                    $('.has-popover').popover();
                }

                startedDemo = true;
            }

            // Disable selector checkbox, put a tooltip on it, and show the buttons panel
            $('#use-selector').attr('disabled', 'disabled');
            $('#use-selector-label span').tooltip();
            $('.js-buttons').show();

            // Add a new button that triggers (or doesn't) a popover, with the appropriate message
            var button = null;
            if (usingSelectorOption())
            {
                button = $('<button class="btn btn-block btn-success has-popover" data-title="Dynamic" data-content="This button was added dynamically by JavaScript" data-placement="top">Working dynamically added button</button>');
            }
            else
            {
                button = $('<button class="btn btn-block btn-default has-popover" data-title="Dynamic" data-content="This button was added dynamically by JavaScript" data-placement="top">Non-working dynamically added button</button>');
            }

            button.appendTo('.js-buttons');
        });
    });

</script>


