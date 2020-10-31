@extends('adminpanel::layouts.app_admin')
@section('styles')
    <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/formplugins/bootstrap-datepicker/bootstrap-datepicker.css">
@endsection
@section('theme_scripts')


    <?
    $createdAt = \Carbon\Carbon::now();
    $today=$createdAt->format('m/d/Y');

    ?>


@endsection
@section('content')


    <?
    $user=\Auth::user();
    if($user->hasRole('Gods_mode')){
        $company_temp=true;
    }
    else{
        $company_temp=false;
    }
    ?>
    <main id="js-page-content" role="main" class="page-content">
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

        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
            <li class="breadcrumb-item">Application Intel</li>
            <li class="breadcrumb-item active">Marketing Dashboard</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-chart-area'></i> Marketing <span class='fw-300'>Dashboard</span>
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




        <div class="demo">
            @if(!isset($deleted))
            <button type="button" onclick="clearCustomerAdding()" class="btn btn-lg btn-primary waves-effect waves-themed" data-toggle="modal" data-target=".default-example-modal-right-lg-user">
                <span class="fal fa-plus  mr-1"></span>
                Создать пользователя</button>
            @endif
        </div>


        <div id="panel-7" class="panel">
            <div class="panel-hdr">
                @if($deleted)
                    <h2>
                        Таблица  <span class="fw-300"><i>удаленных пользователей компании</i></span>
                    </h2>
                @else
                    <h2>
                        Таблица  <span class="fw-300"><i>всех пользователей компании</i></span>
                    </h2>
                @endif
                <div class="panel-toolbar">
               </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="panel-tag">
                        Вы можете редактировать информацию нажав на  <a href="utilities_color_pallet.html" title="Color Pallets">карандаш</a> справа от информации
                    </div>
                    <h5 class="frame-heading">
                        Пользователи
                    </h5>
                    <div id="loader">
                        <div class="border p-3">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-tag result_of_customers_table">


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
                      <input type="text" id="business_name" name="business_name" class="form-control" placeholder="Название организации">

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



      <div class="modal fade default-example-modal-right-lg-ad" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-right modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title h4">Форма добавления объявления</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fal fa-times"></i></span>
              </button>
            </div>

            <form class="needs-validation" id="customer_create" novalidate onsubmit="theSubmitFunctionAd(); return false;">

              <div class="modal-body">
                <input type="hidden" id="customer_id" name="customer_id" value="0">





              </div>
              <div class="modal-footer">
                <button type="button" class="customer_create_close btn btn-secondary waves-effect waves-themed" data-dismiss="modal">Закрыть</button>
                <button type="submit" class="customer_create btn btn-primary waves-effect waves-themed" >Сохранить</button>
              </div>
            </form>
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

                    <form class="needs-validation" id="customer_create" novalidate onsubmit="theSubmitFunctionPassword(); return false;">
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

        <div class="modal fade example-modal-default-transparent" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-transparent" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-white">
                            Удаление пользователя
                            <small class="m-0 text-white opacity-70">
                                Вы действительно желаете удалить пользователя ?
                            </small>
                        </h4>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fal fa-times"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="customer_id">
                        <input type="hidden" id="delete_type" name="delete_type">
                        <button type="button" class="btn btn-secondary customer_delete_close" data-dismiss="modal">Закрыть</button>
                        <button type="button" class="DeleteCustomerModal  btn btn-primary">Удалить</button>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection

@section('scripts')
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
    if (form[0].checkValidity() === false || localStorage.getItem('email_state') == 1) {

    if(localStorage.getItem('email_state') == 1 ){
        console.log(555)
        $('#customer_email').closest('.form-control').removeClass('is-valid').addClass('is-invalid')
        $('#customer_create').removeClass('was-validated')
        $('.has_been_taken_message').show();
    }
console.log(777,form[0].checkValidity())
    }
    else {

        $('#customer_create').addClass('was-validated')
        var customer_email = $('#customer_email').val()
      var customer_phone =$('#customer_phone').val()
      var vid_user=$('#customer_create').find('input[name="vid_user"]:checked').val()
      console.log('VID',vid_user)
        var customer_name = $('#customer_name').val()
      var admin_side=1;
        var customer_sername = $('#customer_sername').val()
        var customer_location = $('#customer_location').val()
      var reg_number = $('#reg_namber').val()
      var vat_number = $('#vat_namber').val()
      var send_notification = $('#customer_create').find('input[name="send_notification"]').val()
        if($('#customer_id').val()){
            var customer_id = $('#customer_id').val()
        }
        else{
            var customer_id =0;
        }

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
                email: customer_email, is_client:1,reg_number:reg_number,vat_number:vat_number,vid_user:vid_user,admin_side:admin_side,
              send_notification:send_notification,phone:customer_phone,is_client:is_client
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
@endsection
