<link rel="stylesheet" media="screen, print" href="https://stackpath.bootstrapcdn.com/font-awesome/5.14.0/css/font-awesome.min.css">
<div class="frame-wrap">
    <table class="table table-sm m-0">
        <thead class="bg-primary-500">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Вид пользователя</th>
            <th></th>
            <th></th>
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
        <tr>
            <th class="customer_id" scope="row">{{$customer->id}}</th>
            <td class="customer_name">{{$customer->name}}</td>
            <td class="customer_email">{{$customer->email}}</td>
            <td class="customer_phone">{{$customer->vid_user}}</td>
            <td class="customer_phone"></td>
            <td class="customer_phone"></td>
            <td class="customer_phone"></td>
            <td class="customer_phone"></td>
            <td class="customer_manager">


            </td>

            <td class="customer_phone"></td>
            <td class="customer_phone"></td>
            <td class="customer_phone">{{$customer->country}}</td>
            <td>
              <a target="_blanc" href="/admin/user_add/adv/{{$customer->id}}" class="PrependAd btn btn-primary btn-sm btn-icon waves-effect waves-themed"  >
               <i class="far fa-file"></i>

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
            var manager =  $(this).parent().parent().find('.customer_manager').find('.is_manager').val()
            console.log(manager);
            //$('#manager_selected').val(1); //<---below this one
           $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/users/get',
                data: {company_id: company_id,customer_id:customer_id
                },
                beforeSend: function() {
                },
                complete: function() {
                    reloadData();
                },
                success: function (data) {
                    console.log('PrependChangeCustomer',data)
                    console.log(data.get_customers_company)
                    $('#customer_id').val(customer_id)
                    $('#customer_name').val(data.name)
                    $('#customer_sername').val(data.sername)

                    $('#customer_email').val(data.email)
                    $('#customer_info').val(data.info)
                    $('#customer_phone').val(data.get_customers_company.phone)
                    $('#customer_address').val(data.get_customers_company.address)
                    $('#select option:selected').removeAttr("selected");
                    $("#select option[value="+data.get_customers_company.manager_id+"]").attr('selected', 'selected');
                    if(manager==1){
                        $('#managerSwitch').prop('checked', true);
                    }
                    else{
                        $('#managerSwitch').prop('checked',false);
                    }


                    console.log(data.get_customers_company.manager_id)
                    reloadData();
                      console.log('success')

                }
            });
        });

        $('.DeleteCustomer').click(function(){
            var customer_id =  $(this).parent().parent().find('.customer_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/company/users/delete',
                data: {customer_id: customer_id
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


