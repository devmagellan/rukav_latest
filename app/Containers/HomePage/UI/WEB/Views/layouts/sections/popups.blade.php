<style>
.modal .socials li:nth-child(2) a {
    background: #fff;
	top:-1px;
	position:relative;
}
</style>

@if (\Session::has('password_changed'))
  <div class="alert alert-success">
    <ul>
      <li>{!! \Session::get('password_changed') !!}</li>
    </ul>
  </div>
@endif
<div class="modal fade" id="goToBusinessUsersModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel53"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle" ><b>Для того чтобы попасть в список Бизнес-пользователей - пожалуйста заполните:</b></h6>
      <form id="GoBusinessForm" class="formModal" action="/go_to_business_users" method="post">

<div class="row">
        <div class="col-sm-12 col-md-3"></div>
        <div class="col-sm-12 col-md-2">
          @if(\Auth::user())
          <label for="imgInputBusiness" class="prophile_photo_picked_wrapper">
            <img class="prophile_photo_picked" for="imgInputBusiness" src="@if(\Auth::user()->avatar)  storage/avatars/{{\Auth::user()->avatar}} @else img/slide_img1.png @endif " alt="">
          </label>
          <label class="prophile_photo_wrapper" for="imgInputBusiness">
            <div class="prophile_photo_img">
              @if(\Auth::user())
                <img src="/storage/avatars/{{\Auth::user()->avatar}}" alt="">

              @else
                <img src="img/prophile_camera.png" alt="">@endif
            </div>
            @if(!\Auth::user()->avatar)

              <a class="prophile_photo_change">
                Добавить фото или логотип
              </a>
            @endif
@endif
          </label>
          <input type="file" name="loadphoto" id="imgInputBusiness">
        </div>
</div>




        <input type="hidden" name="id" value="@if(\Auth::user()) {{\Auth::user()->id}} @endif">
        <div class="row">
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="Название компании" class="input_password" name="company_name">
            <span id="company_name" class="errorBlock"></span>
          </div>
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="Вид деятельности" class="input_password" name="business_type">
            <span id="business_type" class="errorBlock"></span>
          </div>
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="Местоположение" class="input_password" name="business_location">
            <span id="business_location" class="errorBlock"></span>
          </div>
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="Email" class="input_password" name="email">
            <span id="email" class="errorBlock"></span>
          </div>
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="www" class="input_password" name="www">
            <span id="www" class="errorBlock"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <button type="submit" data-toggle="modal">Опубликовать
            </button>
          </div>

        </div>
      </form>


    </div>
  </div>
</div>
@php
  \Log::info('SessionHasN1'.\Session::has('ShowWeeklyAdminCreatedConfirmation') );
\Log::info('SessionHasN2'.\Session::get('ShowWeeklyAdminCreatedConfirmation') );
@endphp
@if(\Session::has('ShowWeeklyAdminCreatedConfirmation') && \Session::get('ShowWeeklyAdminCreatedConfirmation')==1)
  @php
    \Log::info('SessionHas');
@endphp
  <div class="modal fade" id="emailUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <button type="button" class="close closeEmailUpdate" data-dismiss="modal" aria-label="Close">
          <img src="{{asset('img/close-icon.svg')}}" alt="">
        </button>
        <h6 class="modalTitle">Подтвердите или измените свои данные</h6>
        <form id="idForm" class="formModal" action="/confirm_email" method="post">

          <h7>если вы не в сети и вам прислали сообщение, оно придет на указанный вами емайл</h7>
          <input type="hidden" name="id" value="@if(\Auth::user()) {{\Auth::user()->id}} @endif">
          <div class="row">
            <div class="col-sm-12">
              <button type="button" class="changeEmail" data-toggle="modal">Изменить свой email
              </button>

              <button type="submit" class="confirmEmail" name="confirmEmail" data-toggle="modal">Подтвердить {{\Auth::user()->email}}
              </button>
            </div>
          </div>
        </form>


      </div>
    </div>
  </div>

@endif



<div class="modal fade" id="changeEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Смена email</h6>
      <form id="idForm" class="formModal" action="/change_email" method="post">

        <input type="hidden" name="id" value="@if(\Auth::user()) {{\Auth::user()->id}} @endif">
        <div class="row">
          <div class="input_password_wrapper col-md-8" style="margin:0 auto">
            <input type="email"  placeholder="Новый Email" class="input_new_password" name="email" >
            <span id="passwordNewLogin" class="errorBlock"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit" data-toggle="modal">Изменить email
            </button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">вернуться</button>
          </div>
        </div>
      </form>


    </div>
  </div>
</div>



@if(\Session::has('successSocial') && \Session::get('successSocial')=='Your e-mail is verified. Your social account approoved.')
  <div class="modal fade" id="passwordUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="{{asset('img/close-icon.svg')}}" alt="">
        </button>
        <h6 class="modalTitle">Смена пароля</h6>
        <form id="idForm" class="formModal" action="/change_password" method="post">

          <input type="hidden" name="id" value="@if(\Auth::user()) {{\Auth::user()->id}} @endif">
          <div class="row">
            <div class="input_password_wrapper col-md-8" style="margin:0 auto">
              <input type="password"  placeholder="Текущий Пароль" class="input_password" name="old_password">
              <span id="passwordLogin" class="errorBlock"></span>
              <input type="checkbox" id="show_password" >
              <label for="show_password" class="show_password"><img src="{{asset('img/hide_password.svg')}}" alt=""></label>
              <span id="oldPassword" class="errorBlock"></span>
            </div>
          </div>
          <div class="row">
            <div class="input_password_wrapper col-md-8" style="margin:0 auto">
              <input type="password"  placeholder="Новый Пароль" class="input_new_password" name="password" >
              <span id="passwordNewLogin" class="errorBlock"></span>
              <input type="checkbox" id="show_new_password" >
              <label for="show_new_password" class="show_new_password"><img src="{{asset('img/hide_password.svg')}}" alt=""></label>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <button type="submit" data-toggle="modal">Изменить пароль
              </button>
            </div>
            <div class="col-sm-6">
              <button type="button" class="buttonHref">вернуться</button>
            </div>
          </div>
        </form>


      </div>
    </div>
  </div>
@endif
  @php
    \Session::forget('successSocial')
  @endphp

<div class="modal modal_confirm_email_phone fade" id="youAreNotLeggedIn" tabindex="-1" role="dialog"
           aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>

      <form class="formModal emailPhoneConfirmationForm">
        <h6 class="modalTitle">Для подачи объявления необходимо быть зарегестрированным пользователем</h6>

      </form>

    </div>
  </div>
</div>

<div class="modal modal_confirm_email_phone fade" id="alert_category_already_present" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>

      <form class="formModal emailPhoneConfirmationForm">
        <h6 class="modalTitle">Такая категория уже выбрана из списка</h6>

      </form>

    </div>
  </div>
</div>

<div class="modal modal_confirm_email_phone fade" id="alert_category_not_choosen" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>

      <form class="formModal emailPhoneConfirmationForm">
        <h6 class="modalTitle">Вы не выбрали дополнительную категорию из списка</h6>

      </form>

    </div>
  </div>
</div>


<div class="modal modal_confirm_email_phone fade" id="youAreNotAuthorized" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>

      <form class="formModal emailPhoneConfirmationForm">
        <h6 class="modalTitle">Для подачи объявления необходимо перейти по ссылке отправленной Вам на email</h6>

      </form>

    </div>
  </div>
</div>

<div class="modal modal_confirm_email_phone fade" id="simbolsNotAuthorised" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>

      <form class="formModal emailPhoneConfirmationForm">
        <h6 class="modalTitle">Пожалуйста используйте только латинские символы.</h6>

      </form>

    </div>
  </div>
</div>





<div class="modal fade" id="ModalIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Вход</h6>
@if(null!=(session()->get('registration_error')))
	<div style="color:red" class="alert alert-error">{{session()->get('registration_error')}}</div>
@endif

      <form class="formModal" action="{{route('login_user')}}" method="post" id="loginForm">
        <div id="loginErrorsBlock" class="errorBlock"></div>
        <div id="loginErrorsBlockIP" class="errorBlock"></div>
        <span id="ipLogin" class="errorBlock"></span>
        <input type="text" name="email" placeholder="Телефон или email">
          <span id="emailLogin" class="errorBlock"></span>
        <div class="input_password_wrapper">
          <input type="password" name="password" placeholder="Пароль" class="input_password">
          <span id="passwordLogin" class="errorBlock"></span>
          <input type="checkbox" name="" id="show_password">
          <label for="show_password" class="show_password"><img src="{{asset('img/hide_password.svg')}}" alt=""></label>
        </div>
        <div class="row">
          <div class="col-6">
            <input type="checkbox" name="rememberMe" id="rememberMe" checked>
            <label for="rememberMe" class="rememberMe">Запомнить меня</label>
          </div>
          <div class="col-6">
            <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#passwordRecovery">Забыли
              пароль?</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <button type="submit" class="default" id="loginButton">Войти</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref button_show_reg">Регистрация</button>
          </div>
        </div>
      </form>

      <p class="textform">или войти через </p>
      <ul class="socials">
        <li>
          <a  id="facebookSocialLoginBtn" class="social_btns" href="{{ route('login.provider.fb', 'facebook') }}">
            <i class="fab fa-facebook-f "></i>
          </a>
        </li>
        <li>
          <a class="social_btns" href="{{ route('login.provider.google', 'google') }}">

		   <img style="background-color:#fff;width:25px;height:25px;top:-3px;" src="/img/google.png">

          </a>
        </li>
        <li>
          <a class="social_btns" href="{{ route('login.provider.vk', 'vkontakte') }}">
            <i class="fab fa-vk"></i>
          </a>
        </li>
        <li>
          <a class="social_btns" href="{{ route('login.provider.ok', 'odnoklassniki') }}">
            <i class="fab fa-odnoklassniki"></i>
          </a>
        </li>

		<!--li>
          <a href="{{ route('login.provider.pi', 'pinterest') }}">
            <i class="fab fa-pinterest"></i>
          </a>
        </li-->
      </ul>
	  <style>
	  #sign-in-with-apple {
	display: block;
    font-family:'SF Pro Text' !important;
    text-align: center;
    height: 40px !important;
    padding: 25%;
    padding-top: 2% !important;
    padding-bottom: 2% !important;
    background-color: #000;
    border: none;
    border-radius: 0px;
    color: #fff;
	width:50% !important;
	margin-left:25%;
	text-decoration:none !important;

	  }
	  </style>
	  <div style="margin-top:10px" class="apple_id">
		@signInWithApple('black', false, 'sign-in', 40)
		</div>

      <p class="privatpolitica">
        Авторизуясь на сайте, Вы принимаете <a href="/static/policies" target="_blanc">Пользовательское соглашение,</a> <a href="/static/policies" target="_blanc">Политику
          конфиденциальности</a> и <a href="/static/policies" target="_blanc">Политику “Cookie”</a> сайта RUKAV
      </p>

    </div>
  </div>
</div>
<style>

  input[type="radio"] + label:before {
    margin-right:2px;
  }

.modal {
  overflow-y: auto;
}
.modal-open {
  overflow: auto;
}


</style>
<div class="modal fade" id="ModalReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" id="closeReg" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Регистрация</h6>
      <form class="formModal"action="{{route('register_user_web')}}" method="post" id="registerForm">

        <div class="row">
          <div class="col-sm-6">
            <input type="text" name="firstName" placeholder="Имя"> <span class="required">*</span>
            <span style="color:red" id="firstName" class="errorBlock"></span>
          </div>
          <div class="col-sm-6">
            <input type="text" name="lastName" placeholder="Фамилия"> <span class="required">*</span>
            <span style="color:red" id="lastName" class="errorBlock"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <p>Страна резиденции</p>
            <div class="selectWrapper">
              <select class="form-control select_form custom-select" id="address-country" name="country"></select><span
                class="required">*</span>
            </div>
          </div>

          <div class="col-sm-6">
            <p class="input_text_top">Не виден пользователям</p>
            <input type="text" name="email" placeholder="Контактный email"><span class="required">*</span>
            <span style="color:red" id="email" class="errorBlock"></span>
          </div>

        </div>
        <div class="row">
          <div class="col-md-12" style="padding:1px;margin-top:5px">
        <input type="radio" name="vid_user" value="Частная" id="private" class="radio_input" checked>
        <label for="private" style="margin-right:0px">Частное лицо</label>
        <input type="radio" name="vid_user" value="Организация" id="organisation" class="radio_input" >
        <label for="organisation" style="margin-right:0px">Организация</label>
            <input type="radio" name="vid_user" value="Предприниматель" id="individual" class="radio_input" >
            <label for="individual" style="margin-right:0px">Предприниматель</label>
            <input type="radio" name="vid_user" value="Компания" id="company" class="radio_input" >
            <label for="company" style="margin-right:0px">Компания</label>
          </div>
        </div>

        <div class="organisation_modal_block" style="display:none">
          <div class="row">
            <div class="col-sm-6">

                <input type="text" name="organisation_name" placeholder="Название организации" class="input-address"><span class="required">*</span>

            </div>
            <div class="col-sm-6">
              <input type="text" name="www" placeholder="Веб страница" class="input-address">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="address" placeholder="Адрес" class="input-address">
              <span id="address" class="errorBlock"></span>
            </div>
            <div class="col-sm-6"><input type="text" name="postCode" placeholder="Postcode" class="input-postcode">
              <span id="postCode" class="errorBlock"></span>
            </div>
          </div>
        </div>

        <div class="company_modal_block" style="display:none">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="company_name" placeholder="Название компании" class="input-address"><span class="required">*</span>
            </div>
            <div class="col-sm-6">
              <input type="text" name="www" placeholder="Веб страница" class="input-address">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="address" placeholder="Юридический адрес" class="input-address">
              <span class="required">*</span>
              <span id="address" class="errorBlock"></span>
            </div>
            <div class="col-sm-6"><input type="text" name="postCode" placeholder="Postcode" class="input-postcode"><span
                class="required">*</span>
              <span id="postCode" class="errorBlock"></span>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="regNumber" placeholder="Рег.номер"
                                         class="input-reg-number">
              <span class="required">*</span>
              <span id="regNumber" class="errorBlock"></span>
            </div>
            <div class="col-sm-6"><input type="text" name="vatNumber" placeholder="VAT номер"
                                         class="input-vat-number"><span
                class="required">*</span>
              <span id="vatNumber" class="errorBlock"></span>
            </div>
          </div>
        </div>

        <div class="individual_modal_block" style="display:none">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="business_name" placeholder="Название бизнеса" class="input-address"><span class="required">*</span>
            </div>
            <div class="col-sm-6">
              <input type="text" name="www" placeholder="Веб страница" class="input-address">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="address" placeholder="Адрес" class="input-address">
              <span id="address" class="errorBlock"></span>
            </div>
            <div class="col-sm-6"><input type="text" name="postCode" placeholder="Postcode" class="input-postcode">
              <span id="postCode" class="errorBlock"></span>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-sm-6">
            <input type="text" class="modal_pass" name="password" placeholder="Пароль"><span class="required">*</span>
            <span style="color:red" id="password" class="errorBlock"></span>
          </div>



          <div class="col-sm-6" class="phoneDiv">
            <div class="hide_phone_radio">
              <input type="radio" name="hide_phone" value="Показывать" id="hide_phone" checked>
              <label for="hide_phone">Показывать</label>
              <input type="radio" name="hide_phone" value="Не показывать" id="no_hide_phone">
              <label for="no_hide_phone">Не показывать</label>
            </div>

            <input type="tel" name="phone" id="telphone"><span class="required">*</span>
            <span id="phone" class="errorBlock"></span>

          </div>




        </div>
        <input type="hidden" name="code" id="code" value="0">
        <div class="row">
          <div class="col-sm-6">
            <button type="submit" id="registerButton">Зарегистрироваться</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref" id="enterButton">Вход</button>
          </div>
        </div>
      </form>

      <p class="form_modal_text_bottom">
        <span>*</span> Для завершения регистрации необходимо подтвердить свой телефон и email адрес
      </p>

      <div class="socials_reg" style="/*display: none;*/">
        <p class="textform">или войти через</p>

        <ul class="socials socials_reg">
          <li>
            <a href="#" class="social_btns">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#" class="social_btns">
              <img style="background-color:#fff;width:25px;height:25px;top:-3px;" src="/img/google.png">
              <!--i class="fab fa-google"></i-->
            </a>
          </li>
          <li>
            <a href="#" class="social_btns">
              <i class="fab fa-vk"></i>
            </a>
          </li>
          <li>
            <a href="#" class="social_btns">
              <i class="fab fa-odnoklassniki"></i>
            </a>
          </li>
        </ul>
      </div>

      <p class="privatpolitica">
        Авторизуясь на сайте, Вы принимаете <a href="#">Пользовательское соглашение,</a> <a href="#">Политику
          конфеденциальности</a> и <a href="#">Политику “Cookie”</a> сайта RUKAV
      </p>

    </div>
  </div>
</div>

<div class="modal fade" id="passwordRecovery" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close RecoveryPasswordClose" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Востановление пароля</h6>
      <form class="formModal RecoveryPassword">


        <div class="row">
          <div class="col-sm-12">
            <input id="recoveryEmail" type="text" name="" placeholder="Email">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit" >востановить пароль
            </button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref" data-dismiss="modal" aria-label="Close">вернуться</button>
          </div>
        </div>
      </form>


    </div>
  </div>
</div>


<!--div class="modal fade" id="passwordRecoveryKod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Код для завершения регистрации</h6>
      <form class="formModal">


        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" placeholder="Введите код из полученного сообщения">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit">подтвердить</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">переслать еще раз</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div-->



<div class="modal fade" id="passwordRecoveryKod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Код для завершения регистрации</h6>
      <form class="formModal">


        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" placeholder="Введите код из полученного сообщения">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit">подтвердить</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">переслать еще раз</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmPhone" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close confirmPhoneClose" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <img src="{{asset('')}}img/modalIconPhone.svg" alt="" class="moadal_img">
      <h6 class="modalTitle">Подтвердите свой телефонный номер</h6>
      <form class="formModal phoneConfirmationForm">

        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" class="phoneConfirmation" placeholder="Введите код который мы прислали на ваш телефон">
            <span id="phoneConfirmation" class="errorBlock"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit">подтвердить</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">переслать еще раз</button>
          </div>
        </div>
      </form>


    </div>
  </div>
</div>

<!--div class="modal fade" id="confirmEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close confirmEmailClose" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <img src="{{asset('img/modalIconEmail.svg')}}" alt="" class="moadal_img">
      <h6 class="modalTitle">Подтвердите свой email</h6>
      <form class="formModal emailConfirmationForm">

        <div class="row">
          <div class="col-sm-12">
            <input type="text" class="emailConfirmation" name="" placeholder="Введите код который мы прислали на ваш email">
            <span id="emailConfirmation" class="errorBlock"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit">подтвердить</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">переслать еще раз</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div-->


<div class="modal fade" id="confirmEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close confirmEmailClose" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <img src="{{asset('img/modalIconEmail.svg')}}" alt="" class="moadal_img">
      <h6 class="modalTitle">Мы отправили Вам письмо </h6>
      <h6 class="modalTitle">Подтвердите свой email перейдя по ссылке в сообщении</h6>
      <form class="formModal emailConfirmationForm">
      </form>

    </div>
  </div>
</div>


<!--div class="modal modal_confirm_email_phone fade" id="confirmEmailPhonelIfRegistered" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>

      <form class="formModal emailPhoneConfirmationForm">

        <img src="{{asset('img/modalIconPhone.svg')}}" alt="" class="moadal_img">
        <h6 class="modalTitle">Подтвердите свой телефонный номер</h6>
        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" class="phoneConfirmationSecond" placeholder="Введите код который мы прислали на ваш телефон">
            <span id="phoneConfirmationWithEmail" class="errorBlock"></span>
          </div>
        </div>

        <img src="{{asset('img/modalIconEmail.svg')}}" alt="" class="moadal_img">
        <h6 class="modalTitle">Подтвердите свой email</h6>
        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="emailConfirmation" class="emailConfirmationWithPhone" placeholder="Введите код который мы прислали на ваш email">
            <span id="emailConfirmationWithPhone" class="errorBlock"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit">подтвердить</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">переслать еще раз</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div-->


<div class="modal modal_confirm_email_phone fade" id="confirmEmailPhonelIfRegistered" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>

      <form class="formModal emailPhoneConfirmationForm">

        <img src="{{asset('img/modalIconPhone.svg')}}" alt="" class="moadal_img">
        <h6 class="modalTitle">Подтвердите свой телефонный номер</h6>
        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" class="phoneConfirmationSecond" placeholder="Введите код который мы прислали на ваш телефон">
            <span id="phoneConfirmationWithEmail" class="errorBlock"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <button type="submit">подтвердить</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">переслать еще раз</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="confirmEmailIfRegistered" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close confirmEmailClose" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <img src="{{asset('img/modalIconEmail.svg')}}" alt="" class="moadal_img">
      <h6 class="modalTitle">Подтвердите свой email</h6>
      <form class="formModal emailConfirmationFormIfRegistered">

        <div class="row">
          <div class="col-sm-12">
            <input type="text" class="emailConfirmationIfRegistered" name="emailConfirmation" placeholder="Введите код который мы прислали на ваш email">
            <span id="emailConfirmation" class="errorBlock"></span>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit">подтвердить</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">переслать еще раз</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal modal_confirm_email_phone fade" id="confirmEmailPhone" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel2" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close confirmPhoneClose" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>

      <form class="formModal emailPhoneConfirmationForm">

        <img src="{{asset('img/modalIconPhone.svg')}}" alt="" class="moadal_img">
        <h6 class="modalTitle">Подтвердите свой телефонный номер</h6>
        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" id="phoneConfirmationSecond" class="phoneConfirmationSecond" placeholder="Введите код который мы прислали на ваш телефон">
            <span id="phoneConfirmationWithEmail" class="errorBlock"></span>
          </div>
        </div>

        <!--img src="{{asset('img/modalIconEmail.svg')}}" alt="" class="moadal_img">
        <h6 class="modalTitle">Подтвердите свой email</h6>
        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="emailConfirmation" class="emailConfirmationWithPhone" placeholder="Введите код который мы прислали на ваш email">
            <span id="emailConfirmationWithPhone" class="errorBlock"></span>
          </div>
        </div-->

        <div class="row">
          <div class="col-sm-6">
            <button type="submit">подтвердить</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">переслать еще раз</button>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
<style>
#passwordRecoveryUpdate .input_password_wrapper label {
    position: absolute;
    right: 32px;
    top: 3px;
}

#passwordRecoveryUpdate input[type="checkbox"] {
    display: none;
}

#passwordRecoveryUpdate input[type="checkbox"] + label:before {  display: none;}
</style>

@if(\Session::get('recoveryPasswordEmail'))

  <div class="modal fade" id="passwordRecoveryUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"
       aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <img src="{{asset('img/close-icon.svg')}}" alt="">
        </button>
        <h6 class="modalTitle">Смена пароля</h6>
        <form id="idForm" class="formModal" action="/recovery_change_password" method="post">
          <input type="hidden"  name="email" value="{{\Session::get('recoveryPasswordEmail')}}">
          <div class="row">
            <div class="input_password_wrapper col-md-8" style="margin:0 auto">
              <input type="password"  placeholder="Новый Пароль" class="input_new_password" name="password" >
              <span id="passwordNewLogin" class="errorBlock"></span>
              <input type="checkbox" id="show_new_password" >
              <label for="show_new_password" class="show_new_password"><img src="{{asset('img/hide_password.svg')}}" alt=""></label>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <button type="submit" data-toggle="modal">Изменить пароль
              </button>
            </div>
            <div class="col-sm-6">
              <button type="button" class="buttonHref">вернуться</button>
            </div>
          </div>
        </form>


      </div>
    </div>
  </div>

  @php
    \Session::forget('recoveryPasswordEmail')
  @endphp


@endif









<div class="modal fade" id="passwordUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Смена пароля</h6>
      <form id="idForm" class="formModal" action="/change_password" method="post">

      <input type="hidden" name="id" value="@if(\Auth::user()) {{\Auth::user()->id}} @endif">
        <div class="row">
          <div class="input_password_wrapper col-md-8" style="margin:0 auto">
            <input type="password"  placeholder="Текущий Пароль" class="input_password" name="old_password">
            <span id="passwordLogin" class="errorBlock"></span>
            <input type="checkbox" id="show_password" >
            <label for="show_password" class="show_password"><img src="{{asset('img/hide_password.svg')}}" alt=""></label>
            <span id="oldPassword" class="errorBlock"></span>
          </div>
        </div>
        <div class="row">
          <div class="input_password_wrapper col-md-8" style="margin:0 auto">
            <input type="password"  placeholder="Новый Пароль" class="input_new_password" name="password" >
            <span id="passwordNewLogin" class="errorBlock"></span>
            <input type="checkbox" id="show_new_password" >
            <label for="show_new_password" class="show_new_password"><img src="{{asset('img/hide_password.svg')}}" alt=""></label>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit" data-toggle="modal">Изменить пароль
            </button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref">вернуться</button>
          </div>
        </div>
      </form>


    </div>
  </div>
</div>


<div class="modal fade" id="ModalSendMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel8"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Сообщение</h6>
      <form class="formModal needs-validation" action="/connects/store" method="get" id="contact"  novalidate >
        <input type="hidden" name="message_id" value="{{\Request::segment(2)}}">
       @if(isset($receiver))
        <input type="hidden" name="receiver_id" value="{{$receiver}}">
        @endif
        <div class="row">
          @if(!\Auth::user())
            <input type="hidden" name="sender_id" value="0">
          <div class="col-sm-12">
            <input type="text" name="sender_name" placeholder="Ваше Имя"> <span class="required">*</span>
            <span id="firstName" class="errorBlock"></span>
          </div>
          <div class="col-sm-12">
            <input type="text" name="sender_email" placeholder="Ваш email"> <span class="required">*</span>
            <span id="lastName" class="errorBlock"></span>
          </div>
          <div class="col-sm-12" style="margin-top:15px">
            <input type="tel" name="sender_phone" id="telphone5"><span class="required">*</span>
            <span id="phone" class="errorBlock"></span>
          </div>
            @else
            <input type="hidden" name="sender_id" value="{{Auth::user()->id}}">
          @endif
          <div class="col-sm-12">
            <textarea name="text" id="msgr_input" placeholder="Текст сообщения"> </textarea>
            <span id="lastName" class="errorBlock"></span>
          </div>
        </div>
        <p class="form_modal_text_bottom">
          Оригинал объявления автоматически будет приложен к этому сообщению
        </p>
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <button type="submit"  >Отправить сообщение
            </button>
          </div>

        </div>
      </form>


    </div>
  </div>
</div>

<script>
  $(function() {
    $("#loginForm").keypress(function (e) {
      console.log('ee')
      if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
        $('button[type=submit] .default').click();

        return true;
      } else {
        return true;
      }
    });
  });

  $(function() {
    $(".search").keypress(function (e) {
      console.log('eev')
      if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
        console.log('searchPress')
        $('#go').click();

        return true;
      } else {
        return true;
      }
    });
  });


</script>


