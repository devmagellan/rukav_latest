<style>
.modal .socials li:nth-child(2) a {
    background: #fff;
	top:-1px;
	position:relative;
}
</style>

<div class="modal fade" id="contactFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel53"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close contactFormModalClose" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle" ><b>Связаться с нами</b></h6>
      <form id="GoContactFormModal" class="formModal" action="/contactForm" method="post">
	  @csrf
        <input type="hidden" name="id" value="@if(\Auth::user()) {{\Auth::user()->id}} @endif"/>
        <div class="row">
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="Полное имя" class="input_password" value="@if(\Auth::user()) {{\Auth::user()->name}}  {{\Auth::user()->sername}} @endif" name="name"><span class="required">*</span>
            <span id="name" style="color:red" class="errorBlock"></span>
          </div>
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="Ваш Email" class="input_password" value="@if(\Auth::user()) {{\Auth::user()->email}}  @endif" name="email" ><span class="required">*</span>
            <span id="email" style="color:red" class="errorBlock"></span>

          </div>
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="ID объявления" class="input_password" name="add_id" >
            <span id="add_id" style="color:red" class="errorBlock"></span>
          </div>
          <label style="left:15px;top:15px;position:relative;" for="textMessage" >Чем мы можем вам помочь?  &nbsp; <span class="required">  *</span></label>
		   <div class="input_password_wrapper col-md-12" style="margin:0 auto">

            <textarea  id="textMessage" name="text" placeholder="Пожалуйста дайте как можно больше деталей"></textarea>
            <span id="text" style="color:red" class="errorBlock"></span>

          </div>
		   <div class="input_password_wrapper col-md-12" style="margin:0 auto">
		  <span id="g-recaptcha-response" style="color:red" class="errorBlock"></span></div>
        </div>
		   @if(env("GOOGLE_RECAPTCHA_KEY"))
          <div class="g-recaptcha" data-callback="captcha_onclick" style="width: 100%;margin-top:15px;margin-left: 95px;"
               data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">

          </div>
		  <input type="hidden" name="recaptcha" id="recaptchaValidator" />
		  @else
			  no recaptcha key
        @endif


        <div class="row">
          <div class="col-sm-12">
            <button type="submit" data-toggle="modal">Отправить сообщение
            </button>
          </div>

        </div>
      </form>


    </div>
  </div>
</div>




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
            <input type="text"  placeholder="Название компании" class="input_password" id="businessUsersCompanyName" name="company_name">
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
            <input type="text"  placeholder="Email" class="input_password" name="email" id="businessUsersCompanyEmail">
            <span id="email" class="errorBlock"></span>
          </div>
          <div class="input_password_wrapper col-md-12" style="margin:0 auto">
            <input type="text"  placeholder="www" class="input_password" name="www" id="businessUsersCompanyWww">
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
@endphp
@if(\Session::has('ShowWeeklyAdminCreatedConfirmation') && \Session::get('ShowWeeklyAdminCreatedConfirmation')==1 && \Auth::user())
  @php
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

  @php \Session::put('ShowWeeklyAdminCreatedConfirmation',0)@endphp

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
		@php
		 $route = config("services.sign_in_with_apple.login");
            $backgroundColor =  "#000";
            $textColor = "#fff";
            $border =  "none;";
            $text =  "Sign in"
                ;
		@endphp


		<style>
    @font-face {
        font-family: "SF Pro Text";
        src: url(data:application/x-font-woff;charset=utf-8;base64,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) format("woff")
    }
</style>
<a
    href="https://rukav.co.uk/redirect/apple"
    style="display: block; font-family='SF Pro Text'; text-align: center; height: 25%; padding: 5%; padding-top: 3%; padding-bottom: 3%; width: 100%; background-color: {$backgroundColor}; border: {$border}; border-radius: 30px; color: {$textColor};"
    id="sign-in-with-apple"
>
     SignIn with Apple
</a>



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
  .form-error{
    border:1px solid red;
  }


</style>


<div class="modal fade" id="ModalComplaining" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" id="closeRegComplaining" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Пожаловаться</h6>
      <form class="formModal"action="\complain" method="post" id="complainingForm">

        <div class="row">
          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input class="modal-body-add_id" type="hidden" name="add_id">
            <input type="radio" name="complain" value="rudeness" id="rudeness" class="radio_input" checked>
            <label for="rudeness" style="margin-right:0px"> Текст некорректный/неуважение/грубость</label>
          </div>
          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input type="radio" name="complain" value="wrong_contact" id="wrong_contact" class="radio_input" >
            <label for="wrong_contact" style="margin-right:0px"> Контактная информация неверная</label>
          </div>
          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input type="radio" name="complain" value="sold_out" id="sold_out" class="radio_input" >
            <label for="sold_out" style="margin-right:0px"> Товар продан/ услуга недоступна</label>
          </div>

          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input type="radio" name="complain" value="forbidden" id="forbidden" class="radio_input">
            <label for="forbidden" style="margin-right:0px"> Запрещенный товар/непристойное содержание</label>
          </div>

          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input type="radio" name="complain" value="big_price" id="big_price" class="radio_input" >
            <label for="big_price" style="margin-right:0px"> Продавец просит цену выше указанной</label>
          </div>

          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input type="radio" name="complain" value="fraud" id="fraud" class="radio_input" >
            <label for="fraud" style="margin-right:0px"> Мошенничество/спам</label>
          </div>

          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input type="radio" name="complain" value="disparity" id="disparity" class="radio_input" >
            <label for="disparity" style="margin-right:0px"> Объявление не соответствует рубрике</label>
          </div>
          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input type="radio" name="complain" value="my_phone" id="my_phone" class="radio_input" >
            <label for="my_phone" style="margin-right:0px"> В объявлении кто-то указал мой телефон</label>
<div class="my_phone_div">
            <!--p>Если кто-то разместил объявление с вашим номером телефона без вашего разрешения - вы можите самостоятельно удалить его</p-->
            <!--a href="#" class="product_info_send_message" >удалить объявление</a-->
			<span style="color:red">Эта услуга пока не доступна</span>
</div>
          </div>
            <div class="col-md-12" style="padding:1px;margin-top:5px">
              <input type="radio" name="complain" value="other" id="other" class="radio_input" >
              <label for="other" style="margin-right:0px"> Другое</label>
                <textarea name="other_name" placeholder="Текст"></textarea>
            </div>
        </div>

        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <button type="submit" id="complainingButton">Пожаловаться</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="ModalReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" id="closeReg" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <?
      $ip = $_SERVER["REMOTE_ADDR"];

      // Use JSON encoded string and converts
      // it into a PHP variable
      $ipdat = @json_decode(file_get_contents(
      "http://www.geoplugin.net/json.gp?ip=" . $ip));
?>

      <h6 class="modalTitle">Регистрация</h6>

      <form class="formModal"action="{{route('register_user_web')}}" method="post" id="registerForm">

        <div class="row">
          <div class="col-md-12" style="padding:1px;margin-top:5px">
            <input type="radio" name="vid_user" value="Частная" id="private" class="radio_input registrationType" checked>
            <label for="private" style="margin-right:0px">Частное лицо</label>
            <input type="radio" name="vid_user" value="Организация" id="organisation" class="radio_input registrationType" >
            <label for="organisation" style="margin-right:0px">Организация</label>
            <input type="radio" name="vid_user" value="Предприниматель" id="individual" class="radio_input registrationType" >
            <label for="individual" style="margin-right:0px">Предприниматель</label>
            <input type="radio" name="vid_user" value="Компания" id="company" class="radio_input registrationType" >
            <label for="company" style="margin-right:0px">Компания</label>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <input type="text"  id="firstName" class="errorInputBlock" name="firstName" placeholder="Имя"> <span class="required">*</span>
            <span style="color:red" id="firstNameError" class="errorBlock"></span>
          </div>
          <div class="col-sm-6">
            <input type="text" class="errorInputBlock" name="lastName" id="lastName" placeholder="Фамилия"> <span class="required">*</span>
            <span style="color:red"  class="errorBlock"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <p style="margin-top:15px">Страна резиденции</p>
            <div class="selectWrapper" >
              <select class="form-control select_form custom-select" id="address-country" name="country"></select><span
                class="required">*</span>
            </div>
          </div>

          <div class="col-sm-6">
            <p class="input_text_top">не виден пользователям</p>
            <input type="text" id="contactEmail" class="errorInputBlock" name="email" placeholder="Контактный email"><span class="required">*</span>
            <span style="color:red" class="errorBlock"></span>
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
              <input type="text" id="address"name="address" placeholder="Адрес" class="input-address">
              <span  class="errorBlock"></span>
            </div>
            <div class="col-sm-6"><input id="postCode" type="text" name="postCode" placeholder="Postcode" class="input-postcode">
              <span  class="errorBlock"></span>
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
              <input type="text" id="address" name="address" placeholder="Юридический адрес" class="input-address">
              <span class="required">*</span>
              <span  class="errorBlock"></span>
            </div>
            <div class="col-sm-6"><input id="postCode" type="text" name="postCode" placeholder="Postcode" class="input-postcode"><span
                class="required">*</span>
              <span  class="errorBlock"></span>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <input type="text" id="regNumber" name="regNumber" placeholder="Рег.номер"
                                         class="input-reg-number">
              <span class="required">*</span>
              <span  class="errorBlock"></span>
            </div>
            <div class="col-sm-6"><input id="vatNumber" type="text" name="vatNumber" placeholder="VAT номер"
                                         class="input-vat-number">
              <span  class="errorBlock"></span>
            </div>
          </div>
        </div>

        <div class="individual_modal_block" style="display:none">
          <div class="row">
            <div class="col-sm-6">
              <input type="text" id="business_name" name="business_name" placeholder="Название бизнеса" class="errorInputBlock"><span class="required">*</span><!--input-address -->
            </div>
            <div class="col-sm-6">
              <input type="text" name="www" placeholder="Веб страница" class="input-address">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <input type="text" id="address" name="address" placeholder="Адрес" class="input-address">
              <span  class="errorBlock"></span>
            </div>
            <div class="col-sm-6"><input id="postCode" type="text" name="postCode" placeholder="Postcode" class="input-postcode">
              <span  class="errorBlock"></span>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-sm-6">
            <input type="text"  style="margin-top:45px" id="password" class="modal_pass errorInputBlock" name="password" placeholder="Пароль"><span class="required">*</span>
            <span style="color:red"  class="errorBlock"></span>
          </div>



          <div class="col-sm-6" class="phoneDiv">
            <div class="hide_phone_radio">
              <input type="radio" name="hide_phone" value="Показывать" id="hide_phone" checked>
              <label for="hide_phone">Показывать</label>
              <input type="radio" name="hide_phone" value="Не показывать" id="no_hide_phone">
              <label for="no_hide_phone">Не показывать</label>
            </div>

            <input type="tel" class="errorInputBlock" name="phone" id="telphone"><span class="required req_phone" style="display:none">*</span>
            <!--span id="phone" class="errorBlock"></span-->

          </div>




        </div>
        <input type="hidden" name="code" id="code" value="0">
        <div class="row">
          <div class="col-sm-6">
            <button type="submit" id="registerButton">Зарегистрироваться</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref" id="enterButton">Назад</button>
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
            <a href="{{ route('login.provider.fb', 'facebook') }}" class="social_btns">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="{{ route('login.provider.google', 'google') }}" class="social_btns">
              <img style="background-color:#fff;width:25px;height:25px;top:-3px;" src="/img/google.png">
              <!--i class="fab fa-google"></i-->
            </a>
          </li>
          <li>
            <a href="{{ route('login.provider.vk', 'vkontakte') }}" class="social_btns">
              <i class="fab fa-vk"></i>
            </a>
          </li>
          <li>
            <a href="{{ route('login.provider.ok', 'odnoklassniki') }}" class="social_btns">
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
      <img src="{{asset('')}}img/modalIconPhone.svg" alt=""  class="moadal_img">
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
        <img src="{{asset('img/close-icon.svg')}}" alt="" >
      </button>
      <img src="{{asset('img/modalIconEmail.svg')}}" alt="" style="height:100px" class="moadal_img">
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
      <img src="{{asset('img/modalIconEmail.svg')}}" alt="" style="height:100px" class="moadal_img">
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
      <h6 class="modalTitle">Сообщение 2</h6>
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
 <script src='https://www.google.com/recaptcha/api.js'></script>
<script>

function captcha_onclick() {
    document.getElementById('recaptchaValidator').value = grecaptcha.getResponse();
}
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

    $('.modal input[type="radio"]').on('click', function(){

            $('.my_phone_div').hide();
            $('#complainingForm textarea').hide();
            if($('input[name="complain"]:checked').val() == 'my_phone'){
                $('.my_phone_div').show();
            }
            if($('input[name="complain"]:checked').val() == 'other'){
                $('#complainingForm textarea').show();
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


