@extends('adminpanel::layouts.app_admin')

@section('styles')

    <link rel="stylesheet" href="/css/style.css" />


    <link rel="stylesheet" href="/css/style-tree.css" />

    <link rel="stylesheet" href="/css/nestable.css" />

    <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/formplugins/select2/select2.bundle.css">

    <style>
        #dt-basic-example_filter{
            display:none;
        }
        #dt-basic-example > thead > tr:nth-child(2) > th:nth-child(1) > input{display:none;}

        #dt-basic-example > thead > tr:nth-child(1) > th.dt-center.sorting_asc::before{
            display:none;
        }
        #dt-basic-example > thead > tr:nth-child(1) > th.dt-center.sorting_asc::after{
            display:none;
        }
        #dt-basic-example > thead > tr:nth-child(1) > th.dt-center.sorting_asc{ width:17px !important;}

    </style>
@endsection

@section('theme_scripts')


    <?
    $createdAt = \Carbon\Carbon::now();
    $today=$createdAt->format('m/d/Y');

    ?>


@endsection
@section('content')


    <?
    use Apiato\Core\Foundation\Facades\Apiato;
    $user=\Auth::user();
    if($user->hasRole('Gods_mode')){
        $company_temp=true;
    }
    else{
        $company_temp=false;
    }


    ?>

    <?php


    $main_rubrics=Apiato::call('Site@GetProductCategoriesByParentIdAction',[0], [0]);
    ?>
    <div class="modal modal-alert fade" id="example-modal-alert" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Вы действительно желаете удалить выбранные объявления</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    Объявления будут удалены мягким удалением...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
                    <button type="button" class="btn btn-danger delete_ads">Удалить</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Large -->
    <div class="modal fade" id="default-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование объявлений</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="form-group">
                        <label class="form-label" for="example-textarea">Рубрики</label>

                        <div class="panel panel-default tree">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">Выберите рубрику в которую желаете переместить выбранные объявления</h3>
                            </div>
                            <div class="panel-body">
                                <div class="tree-body">
                                    <ul>
                                <?print($main_rubrics);?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="ad_edit_submit btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="default-example-modal-rest" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование объявлений</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label class="form-label" for="example-textarea">Автор</label>
                            <select class="select2 form-control" id="author-result">
                                <option value="0">--Как есть--</option>
                                <optgroup label="Админы">
                                    @foreach(\App\Containers\User\Models\User::where('is_client',0)->get() as $admin)
                                        <option value="{{$admin->id}}">{{$admin->name}} {{$admin->sername}}</option>
                                    @endforeach
                                </optgroup>
                                <optgroup label="Пользователи">
                                    @foreach(\App\Containers\User\Models\User::where('is_client',1)->get() as $client)
                                        <option value="{{$client->id}}">{{$client->name}} {{$client->sername}}</option>
                                    @endforeach
                                </optgroup>

                            </select>

                        </div>

                        <div class="form-group">
                            <label class="form-label" for="example-textarea">Статус</label>
                            <select class="select2 form-control" id="status-result">
                                <option value="0">--Как есть--</option>
                                <option value="1">Опубликовано</option>
                                <option value="2">На утверждении</option>
                                <option value="3">Черновик</option>
                                <option value="4">Отвергнуто</option>
                                <option value="5">Просрочено</option>

                                </optgroup>

                            </select>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="ad_edit_rest_submit btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="default-example-modal-photos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Фотографии объявления</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fal fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body photoAdsModal">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="ad_edit_submit btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <main id="js-page-content" role="main" class="page-content">


        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
            <li class="breadcrumb-item">Application Intel</li>
            <li class="breadcrumb-item active">Marketing Dashboard</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-chart-area'></i> Просмотр <span class='fw-300'>Объявлений</span>
            </h1>
            <div class="d-flex mr-4">
                <div class="mr-2">
                    <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#967bbd&quot;, &quot;#ccbfdf&quot;],  &quot;innerRadius&quot;: 14, &quot;radius&quot;: 20 }">7/10</span>
                </div>
                <div>
                    <label class="fs-sm mb-0 mt-2 mt-md-0">New Sessions</label>
                    <h4 class="font-weight-bold mb-0">70.60%</h4>
                </div>
            </div>
            <div class="d-flex mr-0">
                <div class="mr-2">
                    <span class="peity-donut" data-peity="{ &quot;fill&quot;: [&quot;#2196F3&quot;, &quot;#9acffa&quot;],  &quot;innerRadius&quot;: 14, &quot;radius&quot;: 20 }">3/10</span>
                </div>
                <div>
                    <label class="fs-sm mb-0 mt-2 mt-md-0">Page Views</label>
                    <h4 class="font-weight-bold mb-0">14,134</h4>
                </div>
            </div>
        </div>


    <div id="panel-7" class="panel">
        <div class="panel-hdr">
            <h2>
                Таблица  <span class="fw-300"><i>всех объявлений</i></span>
            </h2>
            <div class="panel-toolbar">
            </div>
        </div>
        <div class="panel-container show">
            <div class="panel-content">


                <div id="loader">
                    <div class="border p-3">
                        <div class="d-flex justify-content-center">

                        </div>
                    </div>
                </div>
                <div class="panel-tag result_of_customers_table">



                    <div class="row">
                        <div class="col-xl-12">
                            <div id="panel-1" class="panel">

                                <div class="panel-container show">
                                    <div class="panel-content">


                                        <button type="button" class="btn btn-primary edit_rubrics" >Редактировать рубрики</button>
                                        <button type="button" class="btn btn-default edit" >Прочее редактирование</button>
                                        <button type="button" class="btn btn-danger delete" data-toggle="modal" data-target="#example-modal-alert">Удалить</button>
                                        <!-- datatable start -->
                                        <table id="dt-basic-example" class="datatable mdl-data-table dataTable table table-bordered table-hover table-striped w-100" aria-describedby="dt-basic-example_info">
                                            <thead class="bg-highlight">
                                            <tr>
                                                <th style="width:8px;"></th>
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


                                            </tbody>
                                            <tfoot>
                                            <tr style="background:#6c757d;color:#fff">
                                                <th></th>
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

                </div>

            </div>
        </div>
    </div>
    </main>
@endsection

@section('scripts')
    <script src="/templates/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script src="/templates/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

    <script src="/js/script.js"></script>
    <script src="/js/script-tree-edit.js"></script>

    <script src="/js/nestable.js"></script>
    <script src="/js/page-nestable.js"></script>
    <script>
       // Class definition

        var controls = {
            leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
            rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
        }

        var runDatePicker = function()
        {

            // minimum setup
            $('#datepicker-1').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });


            // input group layouts
            $('#datepicker-2').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });

            // input group layouts for modal demo
            $('#datepicker-modal-2').datepicker(
                {
                    todayHighlight: true,
                    orientation: "bottom left",
                    templates: controls
                });

            // enable clear button
            $('#datepicker-3').datepicker(
                {
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });

            // enable clear button for modal demo
            $('#datepicker-modal-3').datepicker(
                {
                    todayBtn: "linked",
                    clearBtn: true,
                    todayHighlight: true,
                    templates: controls
                });

            // orientation
            $('#datepicker-4-1').datepicker(
                {
                    orientation: "top left",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-2').datepicker(
                {
                    orientation: "top right",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-3').datepicker(
                {
                    orientation: "bottom left",
                    todayHighlight: true,
                    templates: controls
                });

            $('#datepicker-4-4').datepicker(
                {
                    orientation: "bottom right",
                    todayHighlight: true,
                    templates: controls
                });

            // range picker
            $('#datepicker-5').datepicker(
                {
                    todayHighlight: true,
                    templates: controls
                });

            // inline picker
            $('#datepicker-6').datepicker(
                {
                    todayHighlight: true,
                    templates: controls
                });
        }


        $(document).ready(function(){ runDatePicker();})

        $('#managerSwitch').change(function(){
            console.log('Manager1',$(this).is(':checked'))
        })



        $('#customer_email').change(function(){
            var company_email = $('#customer_email').val()

            $.ajax({
                url: '/admin/main_admin/company/email_check',
                method: 'POST',
                dataType: 'json',
                async: false,
                data: {
                    'email_check': 1,
                    'email': company_email,
                },
                success: function (response) {
                    console.log(response )
                    if (response == 'taken') {
                        localStorage.setItem('email_state',1);
                        console.log(response )
                        $('#customer_email').addClass("is-invalid");
                        $('#customer_email').removeClass("is-valid");
                        /*           $('#company_email').parent().removeClass();
                         $('#company_email').parent().addClass("form_error");
                         $('#company_email').siblings("span").text('Sorry... Email already taken');*/
                    } else if (response == 'not_taken') {
                        console.log(response )
                        localStorage.setItem('email_state',0);
                        $('#customer_email').removeClass("is-invalid");
                        $('#customer_email').addClass("is-valid");
                        /*       $('#company_email').parent().removeClass();
                         $('#company_email').parent().addClass("form_success");
                         $('#company_email').siblings("span").text('Email available');*/
                    }
                }
            });
        })



        /* $('.customer_create').click(function(){*/
        function  theSubmitFunction () {

            $('.has_been_taken_message').hide();
            var form=$('#customer_create')
            if (form[0].checkValidity() === false || localStorage.getItem('email_state') == 1) {
                if(localStorage.getItem('email_state') == 1){
                    console.log(555)
                    $('#customer_email').closest('.form-control').removeClass('is-valid').addClass('is-invalid')
                    $('#customer_create').removeClass('was-validated')
                    $('.has_been_taken_message').show();
                }
                console.log(777)
            }
            else {

                $('#customer_create').addClass('was-validated')
                console.log(222, company_id)
                @if($company_temp)
                    company_id=$('#selectCompany').val()
                        @endif
                var customer_name = $('#customer_name').val()
                var customer_sername = $('#customer_sername').val()
                var customer_sex = $('#customer_sex').val()
                var customer_location = $('#customer_location').val()
                var customer_id = $('#customer_id').val()
                var manager = $('#managerSwitch').is(':checked')
                var manager_id = $('#select').val()
                var customer_department = $('#customer_department').val()
                var customer_position = $('#customer_position').val()

                console.log('customer_position',customer_position)
                console.log('customer_id',customer_id)
                var customer_email = $('#customer_email').val()
                var customer_birth_date = $('#datepicker-1').val()
                var customer_start_date = $('#datepicker-2').val()
                console.log(customer_name, customer_email, company_id)

                $.ajax({
                    method: 'POST',
                    dataType: 'json',
                    async: false,
                    url: '/company/users/create',
                    data: {
                        customer_id: customer_id, customer_name: customer_name, customer_sername: customer_sername,
                        customer_sex: customer_sex, customer_location: customer_location,
                        customer_department: customer_department, company_id: company_id, manager_id: manager_id,
                        customer_position: customer_position,
                        customer_email: customer_email, manager: manager,
                        birth_date:customer_birth_date,
                        start_date:customer_start_date
                    },
                    beforeSend: function () {
                    },
                    complete: function () {
                        $('.customer_create_close').click();
                        $('#customer_id').val('')
                        reloadData();

                    },
                    success: function (data) {

                        console.log('success')
                        reloadData();
                    }
                });
            }
        }
        /*  })*/



        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        //reloadData();
        function reloadData(){

            var module='admin.company.users.data'
            var url='/ads/data';
            $.ajax({
                method: 'POST',
                dataType: 'html',
                async:true,
                url: url,
                data: {module: module},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {

                    $('.result_of_customers_table').html(data);


                }
            });


        }


        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        console.log(666)
                        if(localStorage.getItem('email_state') != 1){
                            console.log(888)
                            form.classList.add('was-validated');}
                    }, false);
                });
            }, false);
        })();


        function clearCustomerAdding(){
            $('#customer_create').removeClass('was-validated');
            $('#customer_id').val("")
            $('#customer_name').val("")
            $('#customer_sername').val("")
            $('#customer_location').val("")
            $('#customer_department').val("")
            $('#customer_position').val("")
            $('#customer_email').val("")
            $('#customer_phone').val("")

        }


    </script>


    <script>
        $(document).ready(function() {
            console.log('ready')

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })
 /*           $('.datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: '',
             columns: [
             {'data': 'id'},
             {'data': 'first_name'},
             {'data': 'last_name'},
             {'data': 'email'},
             {
             'orderable': true,
             'searchable': true,
             'data': null,
             'render': function (data, type, row, meta) {
             // render custom html
             return '<button type="button" class="btn btn-info">Edit</button>';
             }
             }
             ],
             });*/

            // Setup - add a text input to each footer cell
            $('#dt-basic-example thead tr').clone(true).appendTo('#dt-basic-example thead');
            $('#dt-basic-example thead tr:eq(1) th').each(function(i)
            {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function()
                {
                    if (dataTable.column(i).search() !== this.value)
                    {
                        dataTable
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });



            var dataTable = $('.datatable').DataTable(
                {
                    "paging": true, // Allow data to be paged
                    "lengthChange": false,
                    "orderCellsTop": true,
                    "fixedHeader": true,
                    "searching": true, // Search box and search function will be actived
                       "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "processing": true,  // Show processing
                    "serverSide": true,  // Server side processing
                    "deferLoading": 0, // In this case we want the table load on request so initial automatical load is not desired
                    "pageLength": 5,    // 5 rows per page
                    "ajax":{
                        url :  '{{ route('serverSide') }}',
                        type : "GET",
                        dataType: 'json',
                        data:{
                            'request':'get_users_invoices',
                            'csrf_token':$('meta[name=csrf-token]').attr("content")
                        },
                        error: function(data){
                            console.log('error',data);
                        }
                    },
                    // aoColumnDefs allow us to specify which column we want to make
                    // sortable or column's alignment
                    "aoColumnDefs": [
                        { 'bSortable': false, 'aTargets': [0] }    ,
                        { className: "dt-center", "aTargets": [0,1,2,3] },
                    ],
                  "columns": [
                      { "bSearchable": false, 'aTargets': [0,1] },
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        { "visible": false }, //The last column will be invisible
                    ],

                });
           dataTable.ajax.url('{{route('serverSide',['group_id'=>':group_id'])}}').load();
            dataTable.draw();
            $('#button').on('click',  function () {
                var resourceURL = "{{route('serverSide',['group_id'=>':group_id'])}}";
                var group_id = 1;
                group_id = $('#group_id').val(); //Get the value of input text
                resourceURL = resourceURL.replace(":group_id", group_id); // Build the route

                /*
                 * Change the URL of dataTable and call ajax to load new data
                 */
                dataTable.ajax.url(targetUrl).load();
                dataTable.draw();
            } );





        });
    </script>

    <script>

        $('.edit_rubrics').click(function(){
           var ad_check= $('#dt-basic-example').find('.ad_check')
            console.log(ad_check.length)
            var checked=[];
            $.each(ad_check, function(index, value) {
                //console.log(value);
                if ($(value).is(':checked')) {
                    console.log($(this).parent().find('.ad_id').val())
                    checked.push($(this).parent().find('.ad_id').val())
                }

            });

            if(checked.length === 0){
                console.log('empty')
            }
            else{

                window.checked=checked
                console.log('window.checked.length',window.checked.length)
                $('#default-example-modal-lg').modal('show');

            }
        })


        $('.edit').click(function(){
            var ad_check= $('#dt-basic-example').find('.ad_check')
            console.log(ad_check.length)
            var checked=[];
            $.each(ad_check, function(index, value) {
                //console.log(value);
                if ($(value).is(':checked')) {
                    console.log($(this).parent().find('.ad_id').val())
                    checked.push($(this).parent().find('.ad_id').val())
                }

            });

            if(checked.length === 0){
                console.log('empty')
            }
            else{

                window.checked=checked
                console.log('window.checked.length',window.checked)
                console.log('window.checked.length',window.checked.length)
                $('#default-example-modal-rest').modal('show');

            }
        })

    </script>

    <script>

        $(document).ready(function()
        {
            $(function() {
                $('.select2').select2({
                    dropdownParent: $('#default-example-modal-rest')
                });
            })
        });
    </script>

    <script>
        $('.ad_edit_rest_submit').click(function(){
            var status=$('#status-result').val();
            var author=$('#author-result').val();
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:true,
                url: '/ads/edit',
                data: {ids: window.checked,status:status,author:author},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {

                    $('.result_of_customers_table').html(data);


                }
            });

            $('#default-example-modal-rest').modal('hide');
        })


        $('.transfer_rubric').click(function(){
var new_rubric=$(this).parent().find('.hidden_rubric').val()
            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:true,
                url: '/ads/edit',
                data: {ids: window.checked,new_rubric:new_rubric},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                },
                success: function (data) {

                    $('.result_of_customers_table').html(data);


                }
            });

            $('#default-example-modal-lg').modal('hide');
        })

        $('.delete_ads').click(function(){
            var ad_check= $('#dt-basic-example').find('.ad_check')
            console.log(ad_check.length)
            var checked=[];
            $.each(ad_check, function(index, value) {
                //console.log(value);
                if ($(value).is(':checked')) {
                    console.log($(this).parent().find('.ad_id').val())
                    checked.push($(this).parent().find('.ad_id').val())
                }

            });

            if(checked.length === 0){
                console.log('empty')
            }
            else{

                window.checked=checked
                console.log('window.checked.length',window.checked)
                console.log('window.checked.length',window.checked.length)

            }

            $.ajax({
                method: 'POST',
                dataType: 'json',
                async:true,
                url: '/ads/delete',
                data: {ids: window.checked},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                    $('.close').trigger('click');
                },
                success: function (data) {

                    //$('#example-modal-alert').hide();


                }
            });

        });

        $( "table" ).delegate( ".photoAdsModalOpen", "click", function() {
          console.log('delegate')

            var add_id =  $(this).parent().find('.ad_id').val()
            console.log('photoAdsModalOpen',add_id)
               $.ajax({
             method: 'POST',
             dataType: 'html',
             async:false,
             url: '/ads/showPhotoAdsModal',
             data: {add_id: add_id },
             beforeSend: function() {
             },
             complete: function() {

             },
             success: function (data) {
                 $('.photoAdsModal').html(data)
                 $('#default-example-modal-photos').modal('show');

             }
             });
        });

    </script>

@endsection
