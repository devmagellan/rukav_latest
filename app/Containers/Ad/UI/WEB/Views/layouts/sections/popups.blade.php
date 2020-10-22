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

      <p class="textform">или войти через m</p>
      <ul class="socials">
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

      <p class="privatpolitica">
        Авторизуясь на сайте, Вы принимаете <a href="#">Пользовательское соглашение,</a> <a href="#">Политику
          конфиденциальности</a> и <a href="#">Политику “Cookie”</a> сайта RUKAV
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
            <span style="color:red" id="firstName" class="errorBlock"></span>
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
        <p class="textform">или войти через</p>

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

<div class="modal fade" id="adCreated" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h1>Успех</h1>
      <p>Ваше объявление создано</p>
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

        <!--img src="{{asset('img/modalIconEmail.svg')}}" alt="" class="moadal_img">
        <h6 class="modalTitle">Подтвердите свой email</h6>
        <div class="row">
          <div class="col-sm-12">
            <input type="text" name="" placeholder="Введите код который мы прислали на ваш email">
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
    <div class="modal fade modalCatalog" id="mainCatalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="/img/close-icon.svg" alt="">
                </button>

                <div class="row">
                    <div class="col-md-4 catalogBlock1">
                        <div class="number_block_category d-md-none">1/3</div>
                        <h5>Категория</h5>
                        <ul class="listCatalog listCatalog1">
                            <li>Детский мир</li>
                            <li>Недвижимость</li>
                            <li>Транспорт</li>
                            <li>Запчасти для транспорта</li>
                            <li>Работа</li>
                            <li>Животные</li>
                            <li>Электроника</li>
                            <li>Бизнес и услуги</li>

                            <li>Детский мир</li>
                            <li>Недвижимость</li>
                            <li>Транспорт</li>
                        </ul>
                    </div>
                    <div class="col-md-4 catalogBlock2">
                        <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
                        <div class="number_block_category d-md-none">2/3</div>
                        <h5>Рубрика</h5>
                        <ul class="listCatalog listCatalog2">
                            <li>Детский мир</li>
                            <li>Недвижимость</li>
                            <li>Транспорт</li>
                            <li>Запчасти для транспорта</li>
                            <li>Работа</li>
                            <li>Животные</li>
                            <li>Электроника</li>
                            <li>Бизнес и услуги</li>
                        </ul>
                    </div>
                    <div class="col-md-4 catalogBlock3">
                        <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
                        <div class="number_block_category d-md-none">3/3</div>
                        <h5>Подрубрика</h5>
                        <ul class="listCatalog listCatalog3 listCatalogEnd">
                            <li>Аренда гаражей, парковок</li>
                            <li>Продажа гаражей, парковок</li>
                        </ul>
                    </div>
                </div>

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
