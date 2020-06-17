<div class="modal fade" id="ModalIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Вход</h6>
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
		<li>
          <a href="{{ route('login.provider.pi', 'pinterest') }}">
            <i class="fab fa-pinterest"></i>
          </a>
        </li>
      </ul>

      <p class="privatpolitica">
        Авторизуясь на сайте, Вы принимаете <a href="#">Пользовательское соглашение,</a> <a href="#">Политику
          конфеденциальности</a> и <a href="#">Политику “Cookie”</a> сайта RUKAV
      </p>

    </div>
  </div>
</div>

<div class="modal fade" id="ModalReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Регистрация</h6>
      <form class="formModal" action="{{route('register_user_web')}}" method="post" id="registerForm">
        <input type="radio" name="vid_user" value="Частная" id="private" class="radio_input">
        <label for="private">Частная</label>
        <input type="radio" name="vid_user" value="Бизнес" id="buisnes" class="radio_input" checked>
        <label for="buisnes">Бизнес</label>
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
        <div class="row">
          <div class="col-sm-6">
            <input type="text" class="modal_pass" name="password" placeholder="Пароль"><span class="required">*</span>
            <span id="password" class="errorBlock"></span>
          </div>
          <div class="col-sm-6">
            <p class="input_text_top">Не виден пользователю</p>
            <input type="text" name="email" placeholder="Контактный email"><span class="required">*</span>
            <span id="email" class="errorBlock"></span>
          </div>
        </div>


        <div class="company_modal_block">
          <div class="row">
            <div class="col-sm-6">
              <div class="selectWrapper select_company">
                <select class="form-control select_form custom-select" name="optionUser">
                  <option value="Компания">Компания</option>
                  <option value="Само-занятый">Само-занятый</option>
                </select><span class="required">*</span>
              </div>
            </div>
            <div class="col-sm-6">
              <input type="text" name="nameJob" placeholder="Название компании" class="input-name-job"><span class="required">*</span>
              <span id="nameJob" class="errorBlock"></span>
              {{--              <input type="text" name="nameBuisnes" placeholder="Название бизнеса" class="input-name-buisnes"--}}
              {{--                     style="display: none"><span class="required">*</span>--}}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="address" placeholder="Юридический адрес" class="input-address">
              {{--              <input type="text" name="address" placeholder="Адрес" class="input-address" style="display: none;"><span--}}
              {{--               --}}
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

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <img src="{{asset('')}}img/modalIconPhone.svg" alt="" class="moadal_img">
      <h6 class="modalTitle">Подтвердите свой телефонный номер</h6>
      <form class="formModal">

        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" placeholder="Введите код который мы прислали на ваш телефон">
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

<div class="modal fade" id="confirmEmail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <img src="{{asset('img/modalIconEmail.svg')}}" alt="" class="moadal_img">
      <h6 class="modalTitle">Подтвердите свой email</h6>
      <form class="formModal">

        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" placeholder="Введите код который мы прислали на ваш email">
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

      <form class="formModal">

        <img src="{{asset('img/modalIconPhone.svg')}}" alt="" class="moadal_img">
        <h6 class="modalTitle">Подтвердите свой телефонный номер</h6>
        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" placeholder="Введите код который мы прислали на ваш телефон">
          </div>
        </div>

        <img src="{{asset('img/modalIconEmail.svg')}}" alt="" class="moadal_img">
        <h6 class="modalTitle">Подтвердите свой email</h6>
        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" placeholder="Введите код который мы прислали на ваш email">
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


