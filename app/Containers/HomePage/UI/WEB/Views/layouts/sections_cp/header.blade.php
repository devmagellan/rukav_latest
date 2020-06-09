<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Rukav</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@ 1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link href="{{asset('/css/intlTelInput.css')}}" rel="stylesheet">
  <link href="{{asset('/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('/css/media.css')}}" rel="stylesheet">
</head>
<body>
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-2 col-6">
        <a href="#" class="logo">
          <img src="{{asset('/img/logo.svg')}}" alt="">
        </a>
      </div>
      <div class="col-md-1 d-none d-md-block">
        <a href="#" class="btn_category">
          <img src="/img/btnCategoryIcon.svg" alt="" class="dropDownHide">
          <img src="/img/close_white.svg" alt="" class="dropDownShow" style="display: none;">
          <span style="display: none;"></span>
          Категории
        </a>
      </div>
      <div class="col-md-6 col-2">
        <form class="form_category">
          <img src="{{asset('/img/loupe.svg')}}" alt="" class="form_category_imp-loupe">
          <img src="{{asset('/img/pin.svg')}}" alt="" class="form_category_imp-pin">
          <input type="text" name="search" class="form_category_search" placeholder="Я ищу...">
          <input type="text" name="search_city" class="form_category_search-city" placeholder="Город или посткод">
          <button class="form_category_btn">Поиск</button>
        </form>
        <a href="#" class="btn_search_m"><img src="{{asset('/img/loupe.svg')}}" alt=""
                                              class="form_category_imp-loupe"></a>
      </div>
      @if(!\Illuminate\Support\Facades\Auth::user())
      <div class="col-md-2 col-2">
        <a href="#" class="add_ad" data-toggle="modal" data-target="#confirmEmailPhone">
          <span class="plus">+</span>
          <span>Подать объявление</span>
        </a>
      </div>
      @else
        <div class="col-md-2 col-2">
          <a href="{{route('web_ad_create')}}" class="add_ad">
            <span class="plus">+</span>
            <span>Подать объявление</span>
          </a>
        </div>
      @endif
      @if(!\Illuminate\Support\Facades\Auth::user())
        <div class="col-md-1 col-2">
          <a href="#" class="user_cabinet" data-toggle="modal" data-target="#ModalIn">
            <img src="{{asset('/img/user_icon.svg')}}" alt="">
          </a>
        </div>
      @else
        <div class="col-md-1 col-2">
          <a href="{{route('logout_user')}}" class="user_cabinet logout">Выйти
          </a>
        </div>
        @endif
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

