
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
            <button type="submit" id="loginButton">Войти</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref button_show_reg">Регистрация</button>
          </div>
        </div>
      </form>

      <p class="textform">или войти через </p>
      <ul class="socials">
        <li>
          <a  href="{{ route('login.provider.fb', 'facebook') }}">
            <i class="fab fa-facebook-f "></i>
          </a>
        </li>
        <li>
          <a href="{{ route('login.provider.google', 'google') }}">
            <i class="fab fa-google-plus-g"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('login.provider.vk', 'vkontakte') }}">
            <i class="fab fa-vk"></i>
          </a>
        </li>
        <li>
          <a href="{{ route('login.provider.ok', 'odnoklassniki') }}">
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
      <form class="formModal" action="{{route('register_user_web')}}" method="post" id="registerForm">

        <div class="row">
          <div class="col-sm-6">
            <input type="text" name="firstName" placeholder="Имя"> <span class="required">*</span>
            <span id="firstName" class="errorBlock"></span>
          </div>
          <div class="col-sm-6">
            <input type="text" name="lastName" placeholder="Фамилия"> <span class="required">*</span>
            <span id="lastName" class="errorBlock"></span>
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
            <p class="input_text_top">Не виден пользователю</p>
            <input type="text" name="email" placeholder="Контактный email"><span class="required">*</span>
            <span id="email" class="errorBlock"></span>
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
            <span id="password" class="errorBlock"></span>
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
            <input type="hidden" name="code" id="code">
          </div>


        </div>
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

      <div class="socials_reg" style="display: none;">
        <p class="textform">или войти через l</p>

        <ul class="socials socials_reg">
          <li>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fab fa-google-plus-g"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fab fa-vk"></i>
            </a>
          </li>
          <li>
            <a href="#">
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

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Востановление пароля</h6>
      <form class="formModal">


        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" placeholder="Телефон или email">
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <button type="submit" data-dismiss="modal" aria-label="Close" data-toggle="modal"
                    data-target="#passwordRecoveryKod">востановить пароль
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
</div>



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


