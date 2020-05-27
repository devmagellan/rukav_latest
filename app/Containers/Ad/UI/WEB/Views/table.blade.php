
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Example <span class="fw-300"><i>Table</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        This example demonstrates FixedHeader being used with individual column filters, placed into a second row of the table's header (using <code>$().clone()</code>).
                    </div>
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead class="bg-highlight">
                        <tr>
                            <th>Tickbox</th>
                            <th>Статус</th>
                            <th>Заголовок</th>
                            <th>Текст</th>
                            <th>ID Автора</th>
                            <th>Автор И.Ф.</th>
                            <th>email</th>
                            <th>телефон</th>
                            <th>Рубрики</th>
                            <th>Метки</th>
                            <th>Коментарии</th>
                            <th>Дата послед. измен.</th>
                            <th>ID</th>
                            <th>Log Link</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($messages as $message)
                                <tr>
                                    <td>Tickbox</td>
                                    <td>Статус</td>
                                    <td>{{$message->title}}</td>
                                    <td>Текст</td>
                                    <td>{{$message->sender}}</td>
                                    <td>{{$message->getSender->name}} {{$message->getSender->sername}}</td>
                                    <td>{{$message->email}}</td>
                                    <td>{{$message->phone}}</td>
                                    <td>Рубрики</td>
                                    <td>Метки</td>
                                    <td>Коментарии</td>
                                    <td>Дата послед. измен.</td>
                                    <td>{{$message->id}}</td>
                                    <td>Log Link</td>
                                </tr>

                        @endforeach

                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Tickbox</th>
                            <th>Статус</th>
                            <th>Заголовок</th>
                            <th>Текст</th>
                            <th>ID Автора</th>
                            <th>Автор И.Ф.</th>
                            <th>email</th>
                            <th>телефон</th>
                            <th>Рубрики</th>
                            <th>Метки</th>
                            <th>Коментарии</th>
                            <th>Дата послед. измен.</th>
                            <th>ID</th>
                            <th>Log Link</th>
                        </tr>
                        </tfoot>
                    </table>
                    <!-- datatable end -->
                </div>
            </div>
        </div>
    </div>
</div>









<script src="/templates/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
<script>
    $(document).ready(function()
    {
        // Setup - add a text input to each footer cell
        $('#dt-basic-example thead tr').clone(true).appendTo('#dt-basic-example thead');
        $('#dt-basic-example thead tr:eq(1) th').each(function(i)
        {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

            $('input', this).on('keyup change', function()
            {
                if (table.column(i).search() !== this.value)
                {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });

        var table = $('#dt-basic-example').DataTable(
            {
                //responsive: true,
                orderCellsTop: true,
                fixedHeader: true,
                "processing": true,
                "serverSide": true,
                "ajax": "../server_side/scripts/server_processing.php"
            });

    });

</script>



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

        $('.DeleteMessage').click(function(){
            var message_id =  $(this).parent().parent().find('.message_id').text()

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/messages/delete',
                data: {message_id: message_id
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
           var message=$(this).parent().find('.customSwitch2_id').val()
            var state = $(this).is(":checked")

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:false,
                url: '/admin/messages/message_activity_set',
                data: {message: message,state:state
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


