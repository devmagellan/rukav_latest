<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Rukav</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@ 1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link href="{{asset('css/intlTelInput.css')}}" rel="stylesheet">
  <link href="{{asset('css/main.css')}}" rel="stylesheet">
  <link href="{{asset('css/media.css')}}" rel="stylesheet">
</head>
<body>
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-6">
        <a href="#" class="logo">
          <img src="{{asset('img/logo.svg')}}" alt="">
        </a>
      </div>
      <div class="col-md-1 d-none d-md-block">
        <a href="#" class="btn_category">
          <img src="img/btnCategoryIcon.svg" alt="" class="dropDownHide">
          <img src="img/close_white.svg" alt="" class="dropDownShow" style="display: none;">
          <span style="display: none;"></span>
          Категории
        </a>
      </div>
      <div class="col-md-6 col-2">
        <form class="form_category">
          <img src="{{asset('img/loupe.svg')}}" alt="" class="form_category_imp-loupe">
          <img src="{{asset('img/pin.svg')}}" alt="" class="form_category_imp-pin">
          <input type="text" name="search" class="form_category_search" placeholder="Я ищу...">
          <input type="text" name="search_city" class="form_category_search-city" placeholder="Город или посткод">
          <button class="form_category_btn">Поиск</button>
        </form>
        <a href="#" class="btn_search_m"><img src="{{asset('img/loupe.svg')}}" alt=""
                                              class="form_category_imp-loupe"></a>
      </div>
      <div class="col-md-2 col-2">
        <a href="#" class="add_ad" data-toggle="modal" data-target="#confirmEmailPhone">
          <span class="plus">+</span>
          <span>Подать объявление</span>
        </a>
      </div>
      <div class="col-md-1 col-2">
        <a href="#" class="user_cabinet" data-toggle="modal" data-target="#ModalIn">
          <img src="{{asset('img/user_icon.svg')}}" alt="">
        </a>
      </div>
    </div>
  </div>
  @php

    class Recursion
    {
        public $level;
        public $lang = 'en';
        public function get_cat($menu=null)
        {

            if (!$menu) {
                return NULL;
            }
            $arr_cat = array();
            if (count($menu) != 0) {

                //В цикле формируем массив

                foreach ($menu as $key => $row) {
                    //Формируем массив где ключами являются адишники на родительские категории
                    if (empty($arr_cat[$row->parent_id])) {
                        $arr_cat[$row->parent_id] = array();
                    }
                    $arr_cat[$row->parent_id][] = $row;
                }
                //возвращаем массив
                return $arr_cat;
            }
        }


        //вывод каталогa с помощью рекурсии

                  public function view_cat($arr, $parent_id = 0, $level, $nameSection=null) {

                      //Условия выхода из рекурсии
                      if (empty($arr[$parent_id])) {
                          return;
                      }
                      if($parent_id !== 0) {
                          echo '<ul class="category_dropdown_sub_list" >';
                          echo '<h6>'.$nameSection.'</h6>';
                      }
                      //перебираем в цикле массив и выводим на экран
                      for ($i = 0; $i < count($arr[$parent_id]); $i++) {
                          if($parent_id == 0){
                               echo '<li class="category_dropdown_main_list-li"> <p>'.$arr[$parent_id][$i]->name.'</p>';
                          }else{
                                echo '<li><p>'.$arr[$parent_id][$i]->name.'</p>';
                          }
                          //рекурсия - проверяем нет ли дочерних категорий
                          $this->view_cat($arr, $arr[$parent_id][$i]->id, 1, $arr[$parent_id][$i]->name);
                          echo '</li> ';
                      }
                      if($parent_id !== 0) {
                          echo '</ul>';
                      }
                  }
    }
    if(isset($categories)){
     $rec= new Recursion;
     $result = $rec->get_cat($categories);
    //Выводи каталог на экран с помощью рекурсивной функции
    }
  @endphp
  <div class="category_dropdown" style="display: none;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="category_dropdown_main_list">
          {{ $rec->view_cat($result,0,0)}}
          </ul>
        </div>
      </div>
    </div>
  </div>

</header>
<main class="main">
  <ul class="category_dropdown_main_list">


  </ul>
  <div class="container">
    <div class="row">
      @foreach($categoriesOnlyRoot  as $category)
        <div class="col-md-4 col-lg-3">
          <div class="cart_item">
            <h6>{{$category->name}}</h6>
            <div class="cart_item_wrapper">
              <img src="{{$category->photo}}" alt="">
            </div>
            @foreach($category->childrenCategories->take(7) as $childCategory)
              <a href="/category{{$childCategory->link}}/{{$childCategory->id}}">{{$childCategory->name}}</a>
            @endforeach
            <a href="/category{{$category->link}}/{{$category->id}}" class="search_all">Показать еще</a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  </div>
</main>
<section class="buisnes_user">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h3>Наши бизнес пользователи</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="slider_block">
          <div class="slider_block-item">
            <img src="{{asset('img/slide_img1.png')}}" alt="">
          </div>
          <div class="slider_block-item">
            <img src="{{asset('img/slide_img2.png')}}" alt="">
          </div>
          <div class="slider_block-item">
            <img src="{{asset('img/slide_img3.png')}}" alt="">
          </div>
          <div class="slider_block-item">
            <img src="{{asset('img/slide_img4.png')}}" alt="">
          </div>
          <div class="slider_block-item">
            <img src="{{asset('img/slide_img5.png')}}" alt="">
          </div>
          <div class="slider_block-item">
            <img src="{{asset('img/slide_img2.png')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="{{asset('img/logo.svg')}}" alt="">
        <p class="footer_text">
          It is a long established fact that a reader will be distracted by the readable content of a page when looking.
        </p>
        <ul class="socials">
          <li>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-2">
        <h5>Навигация</h5>
        <ul class="menu_footer">
          <li>
            <a href="#">О нас</a>
          </li>
          <li>
            <a href="#">Реклама на Rukav</a>
          </li>
          <li>
            <a href="#">Наши партнеры</a>
          </li>
          <li>
            <a href="#">Популярные запросы</a>
          </li>
          <li>
            <a href="#">Контакты для прессы</a>
          </li>
          <li>
            <a href="#">Блог</a>
          </li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Пользователю</h5>
        <ul class="menu_footer">
          <li>
            <a href="#">Помощь</a>
          </li>
          <li>
            <a href="#">Безопасность</a>
          </li>
          <li>
            <a href="#">Политика конфиденциальности</a>
          </li>
          <li>
            <a href="#">Условия использование RUKAV</a>
          </li>
          <li>
            <a href="#">Карьера</a>
          </li>
          <li>
            <a href="#">Связаться с нами</a>
          </li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Мобильное приложение Rukav</h5>
        <a href="#" class="link_footer">
          <img src="{{asset('img/button_playstore.svg')}}" alt="">
        </a>
        <a href="#" class="link_footer">
          <img src="{{asset('img/button_appstore.svg')}}" alt="">
        </a>
      </div>
    </div>
  </div>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <p class="copy">
          RUKAV - сайт бесплатных объявлений в UK. © Copyright 2019 - {{now()->format('Y')}} Rukav Adverts Ltd. All
          rights reserved.
        </p>
      </div>
    </div>
  </div>
</footer>


<div class="modal fade" id="ModalIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="{{asset('img/close-icon.svg')}}" alt="">
      </button>
      <h6 class="modalTitle">Вход</h6>
      <form class="formModal">
        <input type="text" name="" placeholder="Телефон или email">
        <div class="input_password_wrapper">
          <input type="password" name="" placeholder="Пароль" class="input_password">

          <input type="checkbox" name="" id="show_password">
          <label for="show_password" class="show_password"><img src="{{asset('img/hide_password.svg')}}" alt=""></label>
        </div>
        <div class="row">
          <div class="col-6">
            <input type="checkbox" name="" id="rememberMe" checked>
            <label for="rememberMe" class="rememberMe">Запомнить меня</label>
          </div>
          <div class="col-6">
            <a href="#" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#passwordRecovery">Забыли
              пароль?</a>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <button type="submit">Войти</button>
          </div>
          <div class="col-sm-6">
            <button type="button" class="buttonHref button_show_reg">Регистрация</button>
          </div>
        </div>
      </form>

      <p class="textform">или войти через</p>
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
        <div id="errorsBlock"></div>
        <input type="radio" name="vid_user" value="Частная" id="private" class="radio_input">
        <label for="private">Частная</label>
        <input type="radio" name="vid_user" value="Бизнес" id="buisnes" class="radio_input" checked>
        <label for="buisnes">Бизнес</label>

        <div class="row">
          <div class="col-sm-6">
            <input type="text" name="firstName" placeholder="Имя"> <span class="required">*</span>
          </div>
          <div class="col-sm-6">
            <input type="text" name="lastName" placeholder="Фамилия"> <span class="required">*</span>
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
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <input type="text" class="modal_pass" name="password" placeholder="Пароль"><span class="required">*</span>
          </div>
          <div class="col-sm-6">
            <p class="input_text_top">Не виден пользователю</p>
            <input type="text" name="email" placeholder="Контактный email"><span class="required">*</span>
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
              <input type="text" name="nameJob" placeholder="Название компании" class="input-name-job">
{{--              <input type="text" name="nameBuisnes" placeholder="Название бизнеса" class="input-name-buisnes"--}}
{{--                     style="display: none"><span class="required">*</span>--}}
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <input type="text" name="address" placeholder="Юридический адрес" class="input-address">
{{--              <input type="text" name="address" placeholder="Адрес" class="input-address" style="display: none;"><span--}}
{{--                class="required">*</span>--}}
            </div>
            <div class="col-sm-6"><input type="text" name="postCode" placeholder="Postcode" class="input-postcode"><span
                class="required">*</span></div>
          </div>

          <div class="row">
            <div class="col-sm-6"><input type="text" name="regNumber" placeholder="Рег.номер" class="input-reg-number"><span
                class="required">*</span></div>
            <div class="col-sm-6"><input type="text" name="vatNumber" placeholder="VAT номер" class="input-vat-number"><span
                class="required">*</span></div>
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

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script type="text/javascript" src="http://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
<script type="text/javascript" src="js/intlTelInput.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" src="js/register_user.js"></script>

</body>
</html>
