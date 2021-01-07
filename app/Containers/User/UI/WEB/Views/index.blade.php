@extends('adminpanel::layouts.app_admin_ads')

@section('styles')
  <body class="scrollbar-external_wrapper">
  <link rel="stylesheet" href="/css/style.css" />


  <link rel="stylesheet" href="/css/style-tree.css" />

  <link rel="stylesheet" href="/css/nestable.css" />

  <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/formplugins/select2/select2.bundle.css">



  <style type="text/css">
    /*************** SCROLLBAR BASE CSS ***************/

    .scroll-wrapper {
      overflow: hidden !important;
      padding: 0 !important;
      position: relative;
      width: 100%;
    }

    .scroll-wrapper > .scroll-content {
      border: none !important;
      box-sizing: content-box !important;
      height: auto;
      left: 0;
      margin: 0;
      max-height: none;
      max-width: none !important;
      overflow: scroll !important;
      padding: 0;
      position: relative !important;
      top: 0;
      width: auto !important;
    }

    .scroll-wrapper > .scroll-content::-webkit-scrollbar {
      height: 0;
      width: 0;
    }

    .scroll-element {
      display: none;
    }
    .scroll-element, .scroll-element div {
      box-sizing: content-box;
    }

    .scroll-element.scroll-x.scroll-scrollx_visible,
    .scroll-element.scroll-y.scroll-scrolly_visible {
      display: block;
    }

    .scroll-element .scroll-bar,
    .scroll-element .scroll-arrow {
      cursor: default;
    }

    .scroll-textarea {
      border: 1px solid #cccccc;
      border-top-color: #999999;
    }
    .scroll-textarea > .scroll-content {
      overflow: hidden !important;
    }
    .scroll-textarea > .scroll-content > textarea {
      border: none !important;
      box-sizing: border-box;
      height: 100% !important;
      margin: 0;
      max-height: none !important;
      max-width: none !important;
      overflow: scroll !important;
      outline: none;
      padding: 2px;
      position: relative !important;
      top: 0;
      width: 100% !important;
    }
    .scroll-textarea > .scroll-content > textarea::-webkit-scrollbar {
      height: 0;
      width: 0;
    }




    .scrollbar-external_wrapper {
      height: 100% !important;
      position: relative;
      width: auto !important;
      margin: 0 10px;
    }
    .scrollbar-external {

      width: 100%;
      left:10px;
    }

    /******************* EXTERNAL SCROLLBAR *******************/

    .external-scroll_x,
    .external-scroll_y {
      border: solid 1px #9999fc;
      cursor: pointer;
      display: none;
      position: absolute;
    }

    .external-scroll_x.scroll-scrollx_visible {
      display: block;
      height: 20px;
      bottom: auto;
      width: 200px;
      top: 122px;
      left: 200px;
    }

    .external-scroll_y.scroll-scrolly_visible {
      display: block;
      height: 200px;
      left: 610px;
      top: 0;
      width: 10px;
    }

    .external-scroll_x div,
    .external-scroll_y div
    {
      height: 100%;
      left: 0;
      top: 0;
      position: absolute;
      width: 100%;
    }

    .external-scroll_x .scroll-bar,
    .external-scroll_y .scroll-bar {
      background: #9999fc;
      z-index: 12;
    }

    .external-scroll_x .scroll-bar {
      width: 100px;
    }
    .external-scroll_y .scroll-bar {
      height: 100px;
    }

  </style>

  <style>

    body {
      font: 90%/1.45em "Helvetica Neue", HelveticaNeue, Verdana, Arial, Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
      background-color: #fff;
    }



    div.container {
      min-width: 980px;
      margin: 0 auto;
    }

    table.dataTable th, table.dataTable td {
      overflow: hidden;
    }

    table.dataTable {
      table-layout: fixed;
    }
    tfoot tr{
      color:black !important;
    }







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

    #dt-basic-example {
      table-layout: fixed;
      margin-left: 0px;
    }
    #dt-basic-example td,
    #dt-basic-example th{

      white-space: normal;
      text-overflow: ellipsis;
      overflow: hidden;
    }

    table.dataTable.fixedHeader-floating {
      display: none !important; !* Hide the fixedHeader since we dont need it*!
    }

    .FixedHeader_Header{
      position: fixed;
      top: 50px !important;
      left: -3.65625px;
      z-index: 104;
      width: 1740px;
    }
    .dataTables_scrollHeadInner{
    //      margin-left: 0px;
    //      width: 100% !important;
    //      position: fixed;
    //      display: block;
    //      overflow: hidden;
    //      margin-right: 1px;
    //      background: white;
    //      z-index: 1000;
    //      left:84px;
    }

    .FixedHeader_Cloned{
      position: fixed;
      top: 40px !important;
      left: -3.65625px;
      z-index: 104;
      width: 1740px;
    }
    .dataTables_scrollFoot{
    //      position: fixed;
    //      left: 0;
    //      bottom: 0;
    //      width: 100%;
    //      background-color: red;
    //      color: white;
    //      text-align: center;
    //      left:84px;
    }

    .dataTables_scrollBody{
    //      padding-top: 60px;
    }

    .sticky {
      position: fixed;
      top: 0;
      background:#fff;
      width: 100%;
      z-index:999;
    }
    .contentTable {
      z-index:998;
    }

    .sticky + .contentTable {
      padding-top: 102px;
    }

    .horizontal {
      position: fixed;
      width: 50px;
      background: url(http://www.pngpix.com/wp-content/uploads/2016/06/PNGPIX-COM-Renault-Megane-RS-Trophy-White-Car-PNG-Image.png) no-repeat center center;
      background-size: cover;
      width: 500px;
      height: 200px;
      left: 10%;
      top: 50px;
      z-index:999;
    }
    .bottom{
      width: 100%;
    }
    #stickEdits #dt-basic-example_paginate{
      top: 14px;
      margin-left: 14px;
      position: relative;
    }
    .show{
      opacity: 1!important;
    }
    .modal-backdrop{
      background-color: rgba(0,0,0,0.4)!important;
    }
    .bottom .dataTables_paginate.paging_simple_numbers li{
      padding: 0!important;
      margin: 0;
    }
    .modal.fade .modal-dialog {
      -webkit-transition: initial!important;
      -o-transition: initial!important;
      transition: initial!important;
      -webkit-transform: initial!important;
      -ms-transform: initial!important;
      -o-transform: initial!important;
      transform: initial!important;
    }
    #dt-basic-example_length{
      margin: 10px 0;
    }
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
    $user=\Auth::guard('admin')->user();
    if($user->hasRole('Gods_mode')){
      $company_temp=true;
    }
    else{
      $company_temp=false;
    }


    ?>
    <div class="modal fade default-example-modal-show-user-password" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-transparent" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4" style="color:#fff">Пароль текущего пользователя</h5>
            <button type="button" class="close password_create_close_click" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button>
          </div>
          <input type="text" name="bookId" id="bookId" value=""/>
        </div>
      </div>
    </div>

    <div class="modal fade default-example-modal-right-lg-password" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-right modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4">Форма изменения пароля пользователя</h5>
            <button type="button" class="close password_create_close_click" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button>
          </div>

          <form class="needs-validation" id="customer_create_password" novalidate onsubmit="theSubmitFunctionPassword(); return false; 2">
            <input type="hidden" id="customer_password_id" name="customer_id" value="0">

            <div class="form-group">
              <label class="form-label" for="password">Пароль</label>
              <input type="text" id="password_enter" name="password" required class="form-control" placeholder="Пароль">

            </div>
            <div class="form-group">
              <label class="form-label" for="confirm_password">Подтвердить Пароль</label>
              <input type="text" id="confirm_password" name="confirm_password" required class="form-control" placeholder="Подтвердить Пароль">

            </div>
            <div class="modal-footer">
              <button type="button" class="password_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
              <button type="submit" class="password_create btn btn-primary waves-effect waves-themed" >Сохранить</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal modal-alert fade" id="example-modal-alert" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Вы действительно желаете удалить выбранных пользователей</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button>
          </div>
          <div class="modal-body">
            Пользователи будут удалены мягким удалением...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Отменить</button>
            <button type="button" class="btn btn-danger delete_ads">Удалить</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade default-example-modal-right-lg-user" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
      <div class="modal-dialog modal-dialog-right modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title h4">Форма добавления пользователя</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true"><i class="fal fa-times"></i></span>
            </button>
          </div>

          <form class="needs-validation" id="customer_create" novalidate onsubmit="theSubmitFunction(); return false;">

            <div class="modal-body">
              <input type="hidden" id="customer_id" name="customer_id" value="0">
              <input type="hidden" id="company_id" name="company_id" value="1">
              <input type="hidden" id="is_client" name="is_client" value="1">
              <input type="hidden" id="admin_side" name="admin_side" value="1">
              <input type="hidden" id="confirmed" name="confirmed" value="0">

              <div class="form-group">
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" name="send_notification" value="1" id="send_notification" >
                  <label class="custom-control-label" for="send_notification">Отправлять письмо с уведомлением</label>
                </div>
                <div class="custom-control custom-radio">
                  <input class="custom-control-input" type="radio" name="send_notification" value="0" id="dont_send_notification" checked="">
                  <label  class="custom-control-label" for="dont_send_notification">Не отправлять</label>
                </div>
              </div>
              <br>
              <div class="form-group">
                <label class="form-label" for="customer_name">Вид пользователя</label>

                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input vid_user" id="privat" value="Частная" name="vid_user" checked="">
                  <label class="custom-control-label" for="privat">Частная</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input vid_user" id="organisation" value="Организация" name="vid_user" >
                  <label class="custom-control-label" for="organisation">Организация</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input vid_user" id="enterprenur" value="Предприниматель" name="vid_user" >
                  <label class="custom-control-label" for="enterprenur">Предприниматель</label>
                </div>
                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input vid_user" id="company" value="Компания" name="vid_user" >
                  <label class="custom-control-label" for="company">Компания</label>
                </div>

              </div>

              <div id="company_information" class="company_modal_block">
                <div class="form-group">
                  <label class="form-label" for="customer_name">Название компании</label>
                  <input type="text" id="company_name" name="company_name" class="form-control" placeholder="Название компании">

                </div>
                <div class="form-group">
                  <label class="form-label" for="customer_name">Регистрационный номер</label>
                  <input type="text" id="reg_number" name="reg_number" class="form-control" placeholder="Регистрационный номер">

                </div>
                <div class="form-group">
                  <label class="form-label" for="customer_name">VAT number</label>
                  <input type="text" id="vat_number" name="vat_number" class="form-control" placeholder="VAT number">

                </div>
                <div class="form-group">
                  <label class="form-label" for="customer_name">Юридический адрес</label>
                  <input type="text" id="address" name="address" class="form-control" placeholder="Юридический адрес">

                </div>
                <div class="form-group">
                  <label class="form-label" for="post_code">PostCode</label>
                  <input type="text" id="post_code" name="postCode" class="form-control" placeholder="PostCode">

                </div>
              </div>

              <div id="individual_information" class="individual_modal_block">
                <div class="form-group">
                  <label class="form-label" for="customer_name">Название бизнеса</label>
                  <input type="text" id="business_name" name="business_name" class="form-control" placeholder="Название бизнеса">

                </div>
                <div class="form-group">
                  <label class="form-label" for="customer_name">Адрес</label>
                  <input type="text" id="address" name="address" class="form-control" placeholder="Адрес">

                </div>
                <div class="form-group">
                  <label class="form-label" for="post_code">PostCode</label>
                  <input type="text" id="post_code" name="postCode" class="form-control" placeholder="PostCode">

                </div>
              </div>
              <div id="organisation_information" class="organisation_modal_block">
                <div class="form-group">
                  <label class="form-label" for="organisation_name">Название организации</label>
                  <input type="text" id="organisation_name" name="organisation_name" class="form-control" placeholder="Название организации">

                </div>
                <div class="form-group">
                  <label class="form-label" for="customer_name">Адрес</label>
                  <input type="text" id="address" name="address" class="form-control" placeholder="Адрес">

                </div>
                <div class="form-group">
                  <label class="form-label" for="post_code">PostCode</label>
                  <input type="text" id="post_code" name="postCode" class="form-control" placeholder="PostCode">

                </div>
              </div>

              <div class="form-group">
                <label class="form-label" for="customer_name">Имя пользователя</label>
                <input type="text" id="customer_name" name="customer_name" required class="form-control" placeholder="Имя пользователя">

              </div>
              <div class="form-group">
                <label class="form-label" for="customer_sername">Фамилия пользователя</label>
                <input type="text" id="customer_sername" name="customer_sername" required class="form-control" placeholder="Фамилия пользователя">

              </div>

              @if(\Auth::user()->can('manage-roles'))
                <div class="form-group">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" name="is_client" id="managerSwitch" >
                    <label class="custom-control-label" for="managerSwitch">Админ/не админ</label>
                  </div>
                </div>
            @endif
            <!--div class="form-group">
                        <label class="form-label" for="customer_location">Страна резиденции</label>
                        <input type="text" id="customer_location" name="customer_location" class="form-control" required placeholder="Локация пользователя">
                    </div-->

              <div class="form-group">
                <label class="form-label" for="customer_email">Email</label>
                <input type="email" id="customer_email" name="customer_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required email class="form-control" placeholder="Email">
                <span class="has_been_taken_message" style="display:none;color:red"> Email has been taken</span>
              </div>

              <div class="form-group">
                <label class="form-label" for="customer_phone">Контактный телефон</label>
                <input type="text" id="customer_phone" name="customer_phone" class="form-control" placeholder="Контактный телефон">
              </div>




            </div>
            <div class="modal-footer">
              <button type="button" class="customer_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
              <button type="submit" class="customer_create btn btn-primary waves-effect waves-themed" >Сохранить</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-xl-12">
        <div id="panel-1" class="panel">

          <div class="panel-container show">
            <div class="panel-content">

              <div id="stickEdits">
                <a href="/dashboard"  style="background: #886ab5; color: #fff;" class="btn btn-primary edit_rubrics">Назад</a>
                <a htef="" OnClick="reloadWithoutSetState();" style="background: #886ab5; color: #fff;" class="btn btn-primary edit_rubrics">Перегрузить</a>
                <button type="button" onclick="clearCustomerAdding()" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg-user">
                  <span class="fal fa-plus  mr-1"></span>
                  Создать пользователя</button>
                <button type="button" class="btn btn-danger delete" style="display:inline-block" data-toggle="modal" data-target="#example-modal-alert">Удалить</button>
              </div>

              <div class="container2" >

                <!-- datatable start -->

                <table id="dt-basic-example" class="table table-hover table-bordered table-condensed table-striped " >
                  <thead class="bg-highlight">
                  <tr>
                    <th style="width:8px;"></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Вид пользователя</th>
                    <th>Телефон</th>
                    <th>Кол-во объявлений</th>
                    <th>Страна</th>
                    <th>Действия</th>


                  </tr>
                  </thead>
                  <tbody>


                  </tbody>
                  <tfoot>
                  <tr style="background:#6c757d;color:#fff">
                    <th></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Вид пользователя</th>
                    <th>Телефон</th>
                    <th>Кол-во объявлений</th>
                    <th>Страна</th>
                    <th>Действия</th>


                  </tr>
                  </tfoot>
                </table>
              </div>


              <!-- datatable end -->
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="external-scroll_x">
      <div class="scroll-element_outer">
        <div class="scroll-element_size"></div>
        <div class="scroll-element_track"></div>
        <div class="scroll-bar"></div>
      </div>
    </div>


  </body>
@endsection

@section('scripts')
  <!--script src="/templates/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script-->
  <script src="/templates/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>

  <script src="/js/script.js"></script>
  <script src="/js/script-tree-edit.js"></script>

  <script src="/js/nestable.js"></script>
  <script src="/js/page-nestable.js"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script>
    // Class definition
    function reloadWithoutSetState(){
      window.dt.state.clear();
      window.location.reload();
    }
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

      // Setup - add a text input to each footer cell
      $('#dt-basic-example thead tr').clone(true).appendTo('#dt-basic-example thead');
      $('#dt-basic-example thead tr:eq(1) th').each(function(i,k)
      {
        console.log('searchable',i,k);
        if(i!=0 && i !=8 ){
        var title = $(this).text();
        $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

        $('input', this).on('keyup change', function()
        {
          if (dt.column(i).search() !== this.value)
          {
            dt
              .column(i)
              .search(this.value)
              .draw();
          }
        });
        }
      });


      var opts=
        {
          "scrollY": '500',
          "scrollX": true,
          "paging": true, // Allow data to be paged
          "lengthChange": true,
          "orderCellsTop": true,
          "searching": true, // Search box and search function will be actived
          "ordering": true,
          "info": true,
          "autoWidth": true,
          "processing": true,  // Show processing
          "stateSave": true,
          "serverSide": true,
          drawCallback: function() {

          },
          "ajax":{
            url :  '{{ route('userServerSide') }}',
            type : "GET",
            dataType: 'json',
            data:{
              'request':'get_users_invoices',
              'csrf_token':$('meta[name=csrf-token]').attr("content"),
            },
            error: function(data){
              console.log('error',data);
            }
          },
          "columns": [
            { "searchable": false, 'targets': [0,1] },
            null,
            null,
            null,
            null,
            null,
            null,
            null,
            null

          ],
          "columnDefs": [
            { "searchable": false, "targets": 0 }
          ],

          //retrieve: true,
          displayLength: 100,
          //stateSave: true,
          colResize: {
            "scrollX": true,
            "fixedHeader": {
              headerOffset: 40,
              "scrollX": true,
              "bottom": true,
              "lengthChange": true,
              "orderCellsTop": true,
              "searching": true, // Search box and search function will be actived
              "ordering": true,
              "info": true,
              "autoWidth": true,
              "processing": true,  // Show processing
              //"stateSave": true,
              "serverSide": true,
              top:true,
              "initComplete": function(settings, json){

                $('.dataTables_scrollBody').on('scroll',function(){
                  $('.dataTables_scrollHeadInner').scrollLeft($(this).scrollLeft());
                });

                $(document).on('scroll',function(){

                  var scroll_pos = $(this).scrollTop();
                  var margin = 14; // Adjust it to your needs
                  var cur_pos = $('.dataTables_scrollHeadInner').position();
                  var header_pos = cur_pos.top;

                  if(scroll_pos < margin)
                    var header_pos = margin - scroll_pos;
                  else
                    header_pos = 0;

                  $('.dataTables_scrollHeadInner').css({"top" : header_pos});
                });


              }
            },
          },
          dom: '<"top"Jflrtp<"clear">><"bottom"ip>',
//       dom: '<"top"Jfl<"clear">>rt<"bottom"ip>',
        order: [[1, 'asc']]



      };



      window.dt = $('#dt-basic-example').DataTable( opts );

      var colResize = window.dt.settings()[0].colResize;
      var fixedHeader = colResize.dom.fixedHeader;
      console.log(colResize);
      console.log(fixedHeader);
      window.dt.on('colResizeInitCompleted', function(e, obj){
        colResize = obj;
        fixedHeader = obj.dom.fixedHeader;

        console.log('colResizeNew',colResize);
        console.log(fixedHeader);
      });



      window.dt.ajax.url('{{route('userServerSide',['group_id'=>':group_id'])}}').load();
      window.dt.draw();
      $('#button').on('click',  function () {
        var resourceURL = "{{route('userServerSide',['group_id'=>':group_id'])}}";
        var group_id = 1;
        group_id = $('#group_id').val(); //Get the value of input text
        resourceURL = resourceURL.replace(":group_id", group_id); // Build the route

        /*
         * Change the URL of dataTable and call ajax to load new data
         */
        window.dt.ajax.url(targetUrl).load();
        window.dt.draw();
      } );


      $('#dt-basic-example_paginate').appendTo('#stickEdits')
      $('#dt-basic-example_paginate').css('display','inline-block')


    });
  </script>

  <script>

    $('.edit_rubrics').click(function(){
      var ad_check= $('#dt-basic-example').find('.ad_check')
      console.log('AD check',ad_check.length)
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

    $(".panel-body ul .panel-body ul").hide();
    $('.dropdown-icon.glyphicon.glyphicon-minus-sign').on("click", function(){
      $(this).siblings("ul").toggle();
    })

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
      console.log('Trying to reload page')
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
      window.location.reload()
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
        url: '/users/softdelete',
        data: {ids: window.checked},
        beforeSend: function() {
          $('#loader').show();
        },
        complete: function() {
          $('#loader').hide();
          $('.close').trigger('click');
          window.dt.ajax.url('{{route('userServerSide',['group_id'=>':group_id'])}}').load();
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

  <script>
    window.onscroll = function() {myFunction()};

    var header = document.getElementById("stickEdits");
    var sticky = header.offsetTop;

    function myFunction() {
      console.log('..')
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }



    $(document).ready(function () {
      var $horizontal = $('.horizontal');
      var startPosition = $horizontal.position().left;
      var speed = 14;
      $(window).scroll(function () {
        var st = $(this).scrollTop();
        var newPos = (st * (speed/100)) + startPosition;
        $horizontal.css({
          'left': newPos
        });
      });
    });
    jQuery(document).ready(function(){
      jQuery('.scrollbar-external').scrollbar({
        "autoScrollSize": false,
        "scrollx": $('.external-scroll_x'),
        //"scrollx": $('.horizontal'),
        //"scrolly": $('.external-scroll_y')
      });



    });

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







  <script src="/templates/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
  <script>
    $('.DeleteCustomerModal').click(function(){
      console.log(1234)

        @if(\Auth::user()->can('delete-users'))
      var customer_id =  $('#customer_id').val()
      var delete_type =  $('#delete_type').val()

      $.ajax({
        method: 'POST',
        dataType: 'json',
        async:false,
        url: '/users/delete',
        data: {id: customer_id,delete_type:delete_type
        },
        beforeSend: function() {
        },
        complete: function() {

        },
        success: function (data) {

          console.log('success')
          $('.customer_delete_close').click();
          reloadData();
        }
      });
      @else
      alert('У вас недостаточно прав для удоления пользователя')
      @endif

    });

    $('.vid_user').on('change', function () {

      var vid_user=$(this).val()
      console.log(vid_user)
      if(vid_user=='Компания'){
        $('.organisation_modal_block').hide();
        $('.company_modal_block').show();
        $('.individual_modal_block').hide();
        $('.organisation_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        window.www=$('.company_modal_block').find('input[name="www"]').val();
        window.address=$('.company_modal_block').find('input[name="address"]').val();
        window.postCode=$('.company_modal_block').find('input[name="postCode"]').val();
        $('.company_modal_block').find('input[name="www"]').prop( "disabled", false );
        $('.company_modal_block').find('input[name="address"]').prop( "disabled", false );
        $('.company_modal_block').find('input[name="postCode"]').prop( "disabled", false );
      }
      else if(vid_user=='Предприниматель'){
        $('.organisation_modal_block').hide();
        $('.company_modal_block').hide();
        $('.individual_modal_block').show();
        $('.organisation_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        window.www=$('.individual_modal_block').find('input[name="www"]').val();
        window.address=$('.individual_modal_block').find('input[name="address"]').val();
        window.postCode=$('.individual_modal_block').find('input[name="postCode"]').val();
        $('.individual_modal_block').find('input[name="www"]').prop( "disabled", false );
        $('.individual_modal_block').find('input[name="address"]').prop( "disabled", false );
        $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", false );
      }
      else if(vid_user=='Организация'){
        $('.organisation_modal_block').show();
        $('.company_modal_block').hide();
        $('.individual_modal_block').hide();
        $('.individual_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        window.www=$('.organisation_modal_block').find('input[name="www"]').val();
        window.address=$('.organisation_modal_block').find('input[name="address"]').val();
        window.postCode=$('.organisation_modal_block').find('input[name="postCode"]').val();
        $('.organisation_modal_block').find('input[name="www"]').prop( "disabled", false );
        $('.organisation_modal_block').find('input[name="address"]').prop( "disabled", false );
        $('.organisation_modal_block').find('input[name="postCode"]').prop( "disabled", false );
      }



    });





    function SetVid(vid_user) {
      if(vid_user=='Компания'){
        $('.organisation_modal_block').hide();
        $('.company_modal_block').show();
        $('.individual_modal_block').hide();
        $('.organisation_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        window.www=$('.company_modal_block').find('input[name="www"]').val();
        window.address=$('.company_modal_block').find('input[name="address"]').val();
        window.postCode=$('.company_modal_block').find('input[name="postCode"]').val();
        $('.company_modal_block').find('input[name="www"]').prop( "disabled", false );
        $('.company_modal_block').find('input[name="address"]').prop( "disabled", false );
        $('.company_modal_block').find('input[name="postCode"]').prop( "disabled", false );
      }
      else if(vid_user=='Предприниматель'){
        $('.organisation_modal_block').hide();
        $('.company_modal_block').hide();
        $('.individual_modal_block').show();
        $('.organisation_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.organisation_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        window.www=$('.individual_modal_block').find('input[name="www"]').val();
        window.address=$('.individual_modal_block').find('input[name="address"]').val();
        window.postCode=$('.individual_modal_block').find('input[name="postCode"]').val();
        $('.individual_modal_block').find('input[name="www"]').prop( "disabled", false );
        $('.individual_modal_block').find('input[name="address"]').prop( "disabled", false );
        $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", false );
      }
      else if(vid_user=='Организация'){
        $('.organisation_modal_block').show();
        $('.company_modal_block').hide();
        $('.individual_modal_block').hide();
        $('.individual_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="www"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="address"]').prop( "disabled", true );
        $('.comany_modal_block').find('input[name="postCode"]').prop( "disabled", true );
        window.www=$('.organisation_modal_block').find('input[name="www"]').val();
        window.address=$('.organisation_modal_block').find('input[name="address"]').val();
        window.postCode=$('.organisation_modal_block').find('input[name="postCode"]').val();
        $('.organisation_modal_block').find('input[name="www"]').prop( "disabled", false );
        $('.organisation_modal_block').find('input[name="address"]').prop( "disabled", false );
        $('.organisation_modal_block').find('input[name="postCode"]').prop( "disabled", false );
      }
    }

    // Class definition

    var controls = {
      leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
      rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
    }




    $(document).ready(function(){
      $('.organisation_modal_block').hide();
      $('.company_modal_block').hide();
      $('.individual_modal_block').hide();
      $('.organisation_modal_block').find('input[name="www"]').prop( "disabled", true );
      $('.organisation_modal_block').find('input[name="address"]').prop( "disabled", true );
      $('.organisation_modal_block').find('input[name="postCode"]').prop( "disabled", true );
      $('.individual_modal_block').find('input[name="www"]').prop( "disabled", true );
      $('.individual_modal_block').find('input[name="address"]').prop( "disabled", true );
      $('.individual_modal_block').find('input[name="postCode"]').prop( "disabled", true );
      $('.company_modal_block').find('input[name="www"]').prop( "disabled", true );
      $('.company_modal_block').find('input[name="address"]').prop( "disabled", true );
      $('.company_modal_block').find('input[name="postCode"]').prop( "disabled", true );

    })

    $('#managerSwitch').change(function(){
      console.log('Manager1',$(this).is(':checked'))
    })


    $('#customer_phone').change(function(){
      console.log(334)
      var company_phone = $('#customer_phone').val()

      $.ajax({
        url: '/user/phone_check',
        method: 'POST',
        dataType: 'json',
        async: false,
        data: {
          'email_check': 1,
          'phone': company_phone,
        },
        success: function (response) {
          console.log(response )
          if (response.result == 'taken' && response.belonging!=true) {
            localStorage.setItem('phone_state',1);
            console.log(response )
            $('#customer_phone').addClass("is-invalid");
            $('#customer_phone').removeClass("is-valid");
            /*           $('#company_email').parent().removeClass();
             $('#company_email').parent().addClass("form_error");
             $('#company_email').siblings("span").text('Sorry... Email already taken');*/
          } else {
            console.log(response )
            localStorage.setItem('phone_state',0);
            $('#customer_phone').removeClass("is-invalid");
            $('#customer_phone').addClass("is-valid");
            /*       $('#company_email').parent().removeClass();
             $('#company_email').parent().addClass("form_success");
             $('#company_email').siblings("span").text('Email available');*/
          }
        }
      });
    })

    $('#customer_sername').change(function(){
      console.log(334)
      var company_sername = $('#customer_sername').val()

      $.ajax({
        url: '/user/sername_check',
        method: 'POST',
        dataType: 'json',
        async: false,
        data: {
          'email_check': 1,
          'sername': company_sername,
        },
        success: function (response) {
          console.log(response )
          if (response.result == 'taken' && response.belonging!=true) {
            localStorage.setItem('sername_state',1);
            console.log(response )
            $('#customer_sername').addClass("is-invalid");
            $('#customer_sername').removeClass("is-valid");
            /*           $('#company_email').parent().removeClass();
             $('#company_email').parent().addClass("form_error");
             $('#company_email').siblings("span").text('Sorry... Email already taken');*/
          } else {
            console.log(response )
            localStorage.setItem('sername_state',0);
            $('#customer_sername').removeClass("is-invalid");
            $('#customer_sername').addClass("is-valid");
            /*       $('#company_email').parent().removeClass();
             $('#company_email').parent().addClass("form_success");
             $('#company_email').siblings("span").text('Email available');*/
          }
        }
      });
    })





    $('#customer_email').change(function(){
      console.log(333)
      var company_email = $('#customer_email').val()

      $.ajax({
        url: '/user/email_check',
        method: 'POST',
        dataType: 'json',
        async: false,
        data: {
          'email_check': 1,
          'email': company_email,
        },
        success: function (response) {
          console.log(response )
          if (response.result == 'taken' && response.belonging!=true) {
            localStorage.setItem('email_state',1);
            console.log(response )
            $('#customer_email').addClass("is-invalid");
            $('#customer_email').removeClass("is-valid");
            /*           $('#company_email').parent().removeClass();
             $('#company_email').parent().addClass("form_error");
             $('#company_email').siblings("span").text('Sorry... Email already taken');*/
          } else {
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
      console.log('form',form)
      console.log('form',localStorage.getItem('email_state'))
      if (form[0].checkValidity() === false || localStorage.getItem('email_state') == 1) {
        form.find( ":invalid" ).first().focus();
        console.log(form.find( ":invalid" ).first())
        if(localStorage.getItem('email_state') == 1 ){
          console.log(555)
          $('#customer_email').closest('.form-control').removeClass('is-valid').addClass('is-invalid')
          $('#customer_create').removeClass('was-validated')
          $('.has_been_taken_message').show();
        }
        console.log('checkValidaty=>'+777,form[0].checkValidity())
      }
      else {

        $('#customer_create').addClass('was-validated')
        var customer_email = $('#customer_email').val()
        var customer_phone =$('#customer_phone').val()
        var vid_user=$('#customer_create').find('input[name="vid_user"]:checked').val()
        SetVid(vid_user)
        console.log('VID',vid_user)
        var customer_name = $('#customer_name').val()
        var admin_side=1;
        var customer_sername = $('#customer_sername').val()
        var customer_location = $('#customer_location').val()
        var reg_number = $('#reg_number').val()
        var vat_number = $('#vat_number').val()
        var send_notification = $('#customer_create').find('input[name="send_notification"]').val()



        var company_name = $('#company_name').val()
        var business_name = $('#business_name').val()
        var address=window.address
        var postCode=(window.postCode !='undefined') ? window.postCode : null
        var organisation_name = $('#organisation_name').val()
        var www = window.www
        if($('#customer_id').val()){
          var customer_id = $('#customer_id').val()
        }
        else{
          var customer_id =0;
        }
        console.log('customer_id',customer_id)
        console.log('reg_number=>',reg_number);
        console.log('vat_number=>',vat_number);
        console.log('address=>',address);
        console.log('postCode=>',postCode);
        console.log('org=>',organisation_name);

        if($('#managerSwitch').is(":checked")){
          var is_client=0;
        }else{
          var is_client=1;
        }



        $.ajax({
          method: 'POST',
          dataType: 'json',
          async: false,
          url: '/users/create',
          data: {
            customer_id: customer_id, firstName: customer_name, lastName: customer_sername,
            location: customer_location,
            email: customer_email, reg_number:reg_number,vat_number:vat_number,vid_user:vid_user,admin_side:admin_side,
            send_notification:send_notification,phone:customer_phone,is_client:is_client ,www:www,company_name:company_name,business_name:business_name,
            organisation_name:organisation_name,address:address,postCode:postCode,regNumber:reg_number,vatNumber:vat_number 
          },
          beforeSend: function () {
          },
          complete: function () {
            $('.customer_create_close').click();
            $('#customer_id').val('')
            //reloadData();
            window.dt.ajax.url('{{route('userServerSide',['group_id'=>':group_id'])}}').load();

          },
          success: function (data) {

            console.log('success')
            //reloadData();
          }
        });
      }
    }
    /*  })*/



    function  theSubmitFunctionPassword () {

      var password = $('#password_enter').val()
      var confirm_password = $('#confirm_password').val()
      console.log(password,confirm_password,password!==confirm_password)
      if(password!==confirm_password){
        console.log(333)
        alert('Введенные пароли не соответствуют друг другу')
      }
      else{

        if($('#customer_password_id').val()){
          var customer_id = $('#customer_password_id').val()
        }
        else{
          var customer_id =0;
        }
        console.log('customer_password_id',$('#customer_password_id').val())
        $.ajax({
          method: 'POST',
          dataType: 'json',
          async: false,
          url: '/users/change_password',
          data: {
            customer_id: customer_id, password: password
          },
          beforeSend: function () {
          },
          complete: function () {

          },
          success: function (data) {

            console.log('success')
            $('.password_create_close').click();

            reloadData();
          }
        });
      }

    }




    $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      }
    })

    reloadData();
    function reloadData(){

      var module='admin.company.users.data'
      var url='/users/data';
      var deleted='{{request()->deleted}}'
      $.ajax({
        method: 'POST',
        dataType: 'html',
        async:true,
        url: url,
        data: {module: module,deleted:deleted},
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

    $( document ).ajaxComplete(function() {
      $('[data-toggle="popover"]').popover()
    })


  </script>




  <script>

    $( "table" ).delegate('.ShowUserPassword','click',function(){

      $('.default-example-modal-show-user-password').modal({show:true});
      var myBookId = $(this).data('id');
      console.log(myBookId);
      $(".default-example-modal-show-user-password #bookId").val( myBookId );
    })

    $( "table" ).delegate('.ChangePassword','click', function(){
      console.log('ChangeRoles1')
      var customer_id =  $(this).parent().find('.customer_id').val()
      $('.default-example-modal-right-lg-password').modal({show:true});
      $('[data-toggle=popover]').popover('hide');
      console.log('prepare_customer',customer_id)
      $('#customer_password_id').val(customer_id)
    });

    $('.ChangeRoles').click(function(){
      $('.default-example-modal-right-lg-roles').modal({show:true});
      $('[data-toggle=popover]').popover('hide');
    })
    $( "table" ).delegate('.HardDeleteCustomer','click', function(){
      $('.example-modal-default-transparent').modal({show:true});
      $('[data-toggle=popover]').popover('hide');
      console.log(444)
      var customer_id =  $(this).parent().find('.customer_id').val()
      $('#customer_id').val(customer_id)
      $('#delete_type').val('hard')

    });


    $( "table" ).delegate('.DeleteCustomer','click',function(){
      $('.example-modal-default-transparent').modal({show:true});
      $('[data-toggle=popover]').popover('hide');

      console.log(444)
      var customer_id =  $(this).parent().parent().find('.customer_id').text()
      $('#customer_id').val(customer_id)
      $('#delete_type').val('soft')

    });

    $( "table" ).delegate('.RecoveryCustomer','click',function(){
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
    $( "table" ).delegate('.BanCustomer','click',function(){
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

    $( "table" ).delegate('.UnBanCustomer','click', function(){
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


      $( "table" ).delegate( ".PrependChangeCustomer", "click", function() {


      $('.default-example-modal-right-lg-user').modal({show:true});
      $('[data-toggle=popover]').popover('hide');
      console.log('PrependChangeCustomer3')
      var customer_id =  $(this).parent().find('.customer_id').val()
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
          //reloadData();
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
          //reloadData();
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

@endsection

