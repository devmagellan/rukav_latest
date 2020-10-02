@extends('homepage::layouts.layout')
<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/formplugins/select2/select2.bundle.css">
<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/vendors.bundle.css">
<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/app.bundle.css">
<!-- Place favicon.ico in the root directory -->
<link rel="apple-touch-icon" sizes="180x180" href="/NewSmartAdmin/img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/NewSmartAdmin/img/favicon/favicon-32x32.png">
<link rel="mask-icon" href="/NewSmartAdmin/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
<!-- DEMO related CSS below -->
<link rel="stylesheet" media="screen, print" href="/NewSmartAdmin/css/fa-brands.css">
@section('content')
<style>

  .block_main_categories {
    width: 24%;
    height: 350px;
    border: 1px solid #0000cc;
    overflow-y: auto;
    display: inline-block;
  }
  .cat_block {
    padding: 10px 15px;
  }

  .select2-search {
    display: block;
  }

  .select2-container--default .select2-selection--multiple{
    border-radius: 20px;
  }

  .select2-container--default .select2-selection--multiple .select2-container--open{
   border-radius: 20px !important;
  }

  #chooseGumtreeButton {
    float:right;
    background: #A269F7;
    border: 1px solid #A269F7;
    box-sizing: border-box;
    border-radius: 23px;
    display: inline-block;
    font-weight: bold;
    font-size: 14px;
    line-height: 36px;
    text-align: center;
    text-transform: uppercase;
    color: #FFFFFF;
    transition: all .2s ease-out;
    margin-top: 20px;
    width: 220px;
    margin-right: 18px;
  }
  .mainPreviewmodal-dialog {
    max-width: 1567px !important;
    margin: 0 auto;
  }

  .redBorder{
    border: 2px solid red;
  }

  #search-field {
    max-width: 21.875rem;
     height: 2.425rem !important;
     line-height: 34px !important;
    border-radius: 34px 0px 0px 34px !important;
    background: transparent;
   border: 1px solid #E4E4E4 !important;
    -webkit-box-shadow: none;
    box-shadow: none;
     font-size: 14px !important;
    padding-left: 48px !important;
}


  .add_foto_file_item_load2{
    position:relative;
    display:inline-block;
  }
  .add_foto_file_item_load2 img{
    position:absolute;
    top:9px;
    left:9px;
  }

  .add_foto_file_delete{
    position:relative;
    display:inline-block;
    top:-8px;
  }

  .add_foto_file_delete img{
    position:absolute;
    top:9px;
    left:9px;
  }

</style>
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (\Session::has('success') && \Session::get('success')=='Ваше объявление успешно добавлено ! Благодарим за сотрудничество')
  <div class="alert alert-success">
    <ul style="text-align:center;">
      <li class="text-center">Ваше объявление успешно добавлено !</li>
    </ul>
  </div>
@endif

@if (\Session::has('success') && \Session::get('success')=='Просмотр объявления')
  <script>
    $(document).ready(function() {
      $('#mainPreview').modal({show:true});

      $('.close_button_modal_previws').click(function(){
        $('#mainPreview').modal({show:false});
        $('#mainPreview').removeClass("show");
        $('#mainPreview').hide();
        $('.modal-backdrop').hide();
        alert('1');
      });
      $('.preview_btn').click(function(){
        var id='{{\Session::get('ad')->id}}'
       window.location.href='/save_preview/'+id;
      });


    });
  </script>


@endif

  <article class="add_advert_block">
    <span data-status_created="{{session('infoAd')}}" id="statusAd"></span>
    <form action="/ads/store" method="post" id="add_ads_form" onsubmit="submitFunction()" enctype="multipart/form-data">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs">
            <li><a href="index.html"><img src="/img/home_icon.svg" alt=""></a><img src="/img/back_Icon.svg" alt=""></li>
            <li>Подать новое обьявление</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <h5 class="add_advert_block_title">
            Подать новое объявление
          </h5>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper" id="add_header">
            <h6 class="add_advert_block_wrapper_title">
              Заголовок
            </h6>
            <div class="add_advert_block_input1">
              <input type="text" name="name_ad" maxlength="70" placeholder="Название объявления" required value="@if(null!=(\Session::get('ad'))) {{\Session::get('ad')->title}} @endif">
              <span class="required"></span>
              @error('name_ad')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <p class="number_of_signs"><span>70</span> знаков остается</p>
            </div>
            <div class="add_advert_block_input1">
              @if(null!=(\Session::get('catsString')))
                <input type="text" name="category_ads" placeholder="Выберите категорию" value="{{\Session::get('catsString')}}" class="select_category" required readonly>
                @else
              <input type="text" name="category_ads" placeholder="Выберите категорию" class="select_category" required readonly>
              @endif
              <img src="/img/ipagination_right.svg" alt="">
              <span class="required"></span>
              @error('category_id')
                <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <style>
              .select2-search__field{
                min-width:400px;
                width:400px !important;
              }
            </style>
            <div class="add_second_chat_block_input1" style="margin-top:40px;display:none">
              <div class="form-group" style="width:60%">
                <select class="select2-placeholder-multiple form-control"  multiple="multiple" id="multiple-placeholder">
                  <optgroup label="Такси Ливерпуля">
                    <option value="AK">Такси близ Аэропорта Ливерпуль</option>
                    <option value="HI">Такси Центр Ливерпуль</option>
                  </optgroup>
                  <optgroup label="Заказ пасажирских перевозок">
                    <option value="CA">Перевозки микроавтобусом</option>
                    <option value="NV">Перевозки групп от 10человек</option>
                  </optgroup>

                </select>
              </div>
            </div>



          </div>
        </div>

        <div class="filters_block"></div>
        <div class="filter_deals_block"></div>

        <input type="hidden" id="category_id" name="category_id" required value="@if(null!=(\Session::get('ad')) ) {{\Session::get('ad')->category_id}} @endif">
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper" id="add_place">
            <h6 class="add_advert_block_wrapper_title">
              Местоположение
            </h6>
            <input type="hidden" name="city"  id="city">
            <input type="hidden" name="place_id"  id="place_id">
            <input type="hidden" name="administrative"  id="administrative">
            <!--div class="hide_location_radio">
              <input type="radio" name="hide_location" value="1" id="hide_location" checked="">
              <label for="hide_location">Показывать</label>
              <input type="radio" name="hide_location" value="Не показывать" id="no_hide_location">
              <label for="no_hide_location">Не показывать</label>
            </div-->
            <div class="select_location_block">
              <input type="radio" name="select_addres" value="Полыний адрес" id="all_adress" checked="">
              <label for="all_adress">Полный адрес</label>
              <input type="radio" name="select_addres" value="Только Postcode" id="postcode">
              <label for="postcode">Только Postcode</label>
              <input type="radio" name="select_addres" value="Выбрать местоположение" id="select_adress">
              <label for="select_adress">Выбрать место</label>
              <input type="radio" name="select_addres" value="Весь UK" id="all_uk">
              <label for="all_uk">Весь UK</label>
              <input type="radio" name="select_addres" value="Вне UK" id="out_uk">
              <label for="out_uk">Вне UK</label>
            </div>
            <div class="postcode_block" style="display:none">
              <input type="text" name="post_code" placeholder="Postcode" class="add_advert_input_location postcode InputControl" id="clntInfoEditZip" required value="{{old('post_code')}}">
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="all_user_block">
              <input type="text" name="address" placeholder="Адрес" class="add_advert_input_location InputControl" id="clntInfoEditAddr1" required value="{{old('address')}}">
              @error('address')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <input type="text" name="post_code" placeholder="Postcode" class="add_advert_input_location postcode InputControl" id="allUsersClntInfoEditZip" required value="{{old('post_code')}}">
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="outUk" style="display:none">


              <div class="hotel-search">
                <div id="findhotels">
                </div>


                <div id="controls" style="display:inline-block">
                  <select id="country" class="add_advert_input_location InputControl">
                    <option value="all">All</option>
                    <option value="au">Australia</option>
                    <option value="br">Brazil</option>
                    <option value="ca">Canada</option>
                    <option value="ru">Russia</option>
                    <option value="fr">France</option>
                    <option value="de">Germany</option>
                    <option value="mx">Mexico</option>
                    <option value="nz">New Zealand</option>
                    <option value="it">Italy</option>
                    <option value="za">South Africa</option>
                    <option value="es">Spain</option>
                    <option value="pt">Portugal</option>
                    <option value="ua">Ukraine</option>
                    <option value="lv">Latvia</option>
                    <option value="lt">Lithuania</option>
                    <option value="by">Belarus</option>
                    <option value="ee">Estonia</option>
                    <option value="us" selected>U.S.A.</option>
                    <option value="uk">United Kingdom</option>
                  </select>
                </div>

                <div id="locationField" style="display:inline-block">
                  <input id="autocomplete" class="add_advert_input_location postcode InputControl" placeholder="Город" type="text" />
                </div>


              </div>



              <div id="listing">
                <table id="resultsTable">
                  <tbody id="results"></tbody>
                </table>
              </div>

              <div style="display: none">
                <div id="info-content">
                  <table>
                    <tr id="iw-url-row" class="iw_table_row">
                      <td id="iw-icon" class="iw_table_icon"></td>
                      <td id="iw-url"></td>
                    </tr>
                    <tr id="iw-address-row" class="iw_table_row">
                      <td class="iw_attribute_name">Address:</td>
                      <td id="iw-address"></td>
                    </tr>
                    <tr id="iw-phone-row" class="iw_table_row">
                      <td class="iw_attribute_name">Telephone:</td>
                      <td id="iw-phone"></td>
                    </tr>
                    <tr id="iw-rating-row" class="iw_table_row">
                      <td class="iw_attribute_name">Rating:</td>
                      <td id="iw-rating"></td>
                    </tr>
                    <tr id="iw-website-row" class="iw_table_row">
                      <td class="iw_attribute_name">Website:</td>
                      <td id="iw-website"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>




              <!--input type="text" name="address" placeholder="Страна" class="add_advert_input_location InputControl" id="clntInfoEditAddrOutUk1" required value="{{old('address')}}"-->
              @error('address')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <!--input type="text" name="post_code" placeholder="Город" class="add_advert_input_location postcode InputControl" id="clntInfoEditOutUk" required value="{{old('post_code')}}"-->
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>

            <div class="Places" style="position:relative;display:none">
              <input type="text" class="col-sm-11 control-label cat_name"
                     style="left:5px !important;top:0 !important;font-size:17px;margin-top:30px;" readonly="true">
              <div class="form-group col-sm-12">

                <!--label class="control-label" style="display:block;">Категория в
                  каталоге*</label-->
                <input type="hidden" name="id_cat">
                <input type="hidden" name="model_id" value="{{null}}">


              </div>


              <div class="form-group col-sm-12 categories" style="border:1px solid #000;padding-top:50px;">


<div class="loader-z" style="display:none;position:absolute;z-index:999;width:100%;height:100%;background-color:rgba(255,255,255,0.6)">
  <div style="position:relative;left:200px;top:50px" class="spinner-border text-secondary"  role="status">
  </div>

</div>
                @if($locations!==null)
                <div class="block_main_categories_wrapper1" style="">
                  <div class="block_main_categories cat_block_1" style="">
                    @foreach ($locations as $key=>$location)
                      @if($location->parent_id==0 && !empty($location->name))
                        <a style="cursor:pointer">
                          <div class="cat_block" style="border-bottom:1px solid #000">
                            <input type="hidden" value="{{$location->id}}">
                            {{$location->name}}

                            <i class="fa fa-arrow-right" aria-hidden="true" style="float:right"></i>
                          </div>
                        </a>
                      @endif
                    @endforeach

                  </div>
<span class="block_main_categories1_next"><img src="https://rukav.co.uk/img/right_icon_black.svg"></span>
</div>
<div class="block_main_categories_wrapper2" style="">
                  <div class="block_main_categories cat_block_2">


                  </div>
<span class="block_main_categories2_prev"><img src="https://rukav.co.uk/img/right_icon_black.svg"></span>
<span class="block_main_categories2_next"><img src="https://rukav.co.uk/img/right_icon_black.svg"></span>
</div>
<div class="block_main_categories_wrapper3" style="">
                  <div class="block_main_categories cat_block_3">


                  </div>
<span class="block_main_categories3_prev"><img src="https://rukav.co.uk/img/right_icon_black.svg"></span>
<span class="block_main_categories3_next"><img src="https://rukav.co.uk/img/right_icon_black.svg"></span>
</div>
<div class="block_main_categories_wrapper4" style="">
                  <div class="block_main_categories cat_block_4">


                  </div>
<span class="block_main_categories4_prev"><img src="https://rukav.co.uk/img/right_icon_black.svg"></span>
</div>

                @else
                  <div style="width:100%;height:100px;color:#fff;background:red;text-align:center">

                    <h3>У вас не выбраны категории товаров для использования в вашем
                      интернет магазине </h3>
                    <a href="/admin/menu_areas">Перейти для выбора категорий</a>
                  </div>
                @endif

                <button type="button" id="chooseGumtreeButton">Выбрать</button>
              </div>

            </div>
            <div class="place_in_UK" style="display:none">
              <input type="text" name="address" placeholder="Страна" class="add_advert_input_location InputControl" id="clntInfoEditAddrPlaceUk1" value="{{old('address')}}">
              @error('address')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <input type="text" name="post_code" placeholder="Город" class="add_advert_input_location postcode InputControl" id="clntInfoEditPlaceUk" value="{{old('post_code')}}">
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Цена
            </h6><br>
            <!--div class="contact_info_wrapper">
              <p>Email для сообщений (скрыт)</p>
              <input type="email" name="email" placeholder="Email" required value="{{old('email')}}">
              @error('email')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div-->
            <!--div class="contact_info_wrapper contact_info_wrapper2">
              <div class="hide_phone_radio">
                <input type="radio" name="hide_phone" value="Показывать" id="hide_phone1" checked>
                <label for="hide_phone1">Показывать</label>
                <input type="radio" name="hide_phone" value="Не показывать" id="no_hide_phone1">
                <label for="no_hide_phone1">Не показывать</label>
              </div>
              <input type="tel" id="telphone2" name="phone" required value="{{old('phone')}}">
              @error('email')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div-->
            <!--div class="contact_info_wrapper">
              <div class="hide_phone_radio">
                <input type="radio" name="hide_name" value="1" id="hide_name" checked>
                <label for="hide_name">Показывать</label>
                <input type="radio" name="hide_name" value="Не показывать" id="no_hide_name">
                <label for="no_hide_name">Не показывать</label>
              </div>
              <input type="text" name="name" placeholder="Имя" required value="{{old('name')}}">
              @error('name')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div-->
            <div class="contact_info_wrapper">
              <div class="input_price_icon">£</div><input type="number" step="1" name="price" placeholder="Цена (не обязательно)" value="@if(null!=(\Session::get('ad')) ) {{\Session::get('ad')->price}} @endif">
            </div>
          </div>
        </div>
      @if(null!=(\Session::get('ad')))
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Фотографии
            </h6>
            <?
            $realCount=count(\Session::get('ad')->pictures);
            ?>

            <div class="add_foto_file_wrapper">
              @foreach(\Session::get('ad')->pictures as $realPic)
                <div class="add_foto_file_item">

                  <div class="upload-file-container-text">

                    <label style="position: relative;height: 114px;width: 114px;" for="imgInput" class="add_foto_file_item_load">
                      <img style="object-fit: cover;height: 100%;width: 100%;" src="/storage/messages/{{$realPic->photo}}" alt="">
                    </label>
                    <div class="add_foto_file_img_wrapper">
                      <img  src="#" alt="" class="add_foto_file_img" />
                      <div class="add_foto_file_block_hover">
                        <label for="imgInput" class="add_foto_file_item_load2">
                          <img src="/img/refresh_icon.svg" alt="">
                        </label>
                        <div class="add_foto_file_delete">
                          <img src="/img/delete-icon.svg" alt="">
                        </div>
                      </div>
                    </div>
                    <input type="file" name="files[]" class="photo" id="imgInput"/>
                  </div>
                </div>
              @endforeach
              @for($i=1;$i<=10-$realCount;$i++)
                <div class="add_foto_file_item">
                  <div class="upload-file-container-text">

                    <label for="imgInput2" class="add_foto_file_item_load">
                      <img src="/img/photo-camera-icon.svg" alt="">
                      <span>Добавить фото</span>
                    </label>
                    <div class="add_foto_file_img_wrapper">
                      <img  src="#" alt="" class="add_foto_file_img" />
                      <div class="add_foto_file_block_hover">
                        <label for="imgInput2" class="add_foto_file_item_load2">
                          <img src="/img/refresh_icon.svg" alt="">
                        </label>
                        <div class="add_foto_file_delete">
                          <img src="/img/delete-icon.svg" alt="">
                        </div>
                      </div>
                    </div>
                    <input type="file" name="files[]" class="photo" id="imgInput2"/>
                  </div>
                </div>
              @endfor

            </div>
          </div>
          <a href="/static/policies#photo" class="add_advert_rolls_foto">Привила добавления фото</a>
        </div>

      @else
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Фотографии
            </h6>
            <div class="add_foto_file_wrapper">
              <div class="add_foto_file_item">

                <div class="upload-file-container-text">

                  <label for="imgInput" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">

                  <label for="imgInput2" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput2" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput2"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">

                  <label for="imgInput3" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput3" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput3"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput4" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput4" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput4"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput5" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput5" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput5"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput6" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput6" class="add_foto_file_item_load2">
                        <img src="img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput6"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput7" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput2" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput7"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">
                  <label for="imgInput8" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput8" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput8"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">

                  <label for="imgInput9" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput9" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput9"/>
                </div>
              </div>
              <div class="add_foto_file_item">
                <div class="upload-file-container-text">

                  <label for="imgInput10" class="add_foto_file_item_load">
                    <img src="/img/photo-camera-icon.svg" alt="">
                    <span>Добавить фото</span>
                  </label>
                  <div class="add_foto_file_img_wrapper">
                    <img  src="#" alt="" class="add_foto_file_img" />
                    <div class="add_foto_file_block_hover">
                      <label for="imgInput10" class="add_foto_file_item_load2">
                        <img src="/img/refresh_icon.svg" alt="">
                      </label>
                      <div class="add_foto_file_delete">
                        <img src="/img/delete-icon.svg" alt="">
                      </div>
                    </div>
                  </div>
                  <input type="file" name="files[]" class="photo" id="imgInput10"/>
                </div>
              </div>
            </div>
            <a href="/static/policies#photo" class="add_advert_rolls_foto">Привила добавления фото</a>
            @error('files')
            <div class="alert errorBlock">{{ $message }}</div>
            @enderror
          </div>
        </div>
      @endif
        <div class="col-sm-12">
            <div class="add_advert_block_wrapper">
                <h6 class="add_advert_block_wrapper_title">
                  Длительность
                </h6>
                <div class="add_advert_block_btn_wrapper">
                    <input type="radio" name="select_time" value="7" id="7day" @if(null!=(\Session::get('ad')) && \Session::get('ad')->select_time==7) checked="" @endif>
                    <label for="7day">7 дней</label>
                    <input type="radio" name="select_time" value="14" id="14day" @if(null!=(\Session::get('ad')) && \Session::get('ad')->select_time==14) checked="" @endif>
                    <label for="14day">14 дней</label>
                    <input type="radio" name="select_time" value="30" id="1mon" @if(null!=(\Session::get('ad')) && \Session::get('ad')->select_time==30) checked="" @elseif(null==(\Session::get('ad'))) checked="" @endif>
                    <label for="1mon">1 месяц</label>
                    <input type="radio" name="select_time" value="180" id="6mon" @if(null!=(\Session::get('ad')) && \Session::get('ad')->select_time==180) checked="" @endif>
                    <label for="6mon">6 месяц</label>
                    <input type="radio" name="select_time" value="0" id="always" @if(null!=(\Session::get('ad')) && \Session::get('ad')->select_time==0) checked="" @endif>
                    <label for="always">вечно</label>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper" id="add_description">
            <h6 class="add_advert_block_wrapper_title">
              Описание
            </h6>
            <div class="add_advert_desc">
              <p>Текст объявления: на русском языке. Допустимое использование английского не более 20%(термины, названия).</p>
              <p class="end">Транслит не допускается.</p>
              <textarea name="description" placeholder="Текст объявления" required>@if(null!=(\Session::get('ad')) ) {{\Session::get('ad')->message}} @endif</textarea>
              @error('description')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <p class="number_of_signs_text"><span>70000</span> знаков остается</p>
              <button type="submit" name="save" value="1" id="saveAdsButton">Подать обьявление</button>
              <button type="submit" id="previewAdsButton" name="preview" value="1" class="buttonHref">Предварительный просмотр</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  </article>
  </div>
    <div class="modal fade modalCatalog" id="mainCatalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <img src="/img/close-icon.svg" alt="">
      </button>
<!--      <i class="previous_cat fa fa-arrow-left" aria-hidden="true"></i>-->
      <div class="row">

        <div class="col-md-4 catalogBlock1">
          <div class="number_block_category d-md-none">1/3</div>
          <h5>Категория</h5>
          <ul class="listCatalog listCatalog1">
            @foreach($categoriesOnlyRoot as $category)
              <li data-category_id="{{$category->id}}">{{$category->name}}</li>
            @endforeach
          </ul>
        </div>
        <div class="col-md-4 catalogBlock2">
          <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
          <div class="number_block_category d-md-none">2/3</div>
          <h5>Рубрика</h5>
          <ul class="listCatalog listCatalog2">

          </ul>
        </div>
        <div class="col-md-4 catalogBlock3">
          <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
          <div class="number_block_category d-md-none">3/3</div>
          <h5>Подрубрика</h5>
          <ul class="listCatalog listCatalog3 listCatalogEnd">

          </ul>
        </div>
      </div>

    </div>
  </div>
</div>



<div class="modal fade mainPreview" id="mainPreview" tabindex="-1" role="dialog" aria-labelledby="mainPreview1" aria-hidden="true">
  <div class="mainPreviewmodal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <button type="button" class="close close_button_modal_previws" data-dismiss="modal" aria-label="Close">
      <img src="https://rukav.co.uk/img/close-icon.svg" alt="">
    </button>
@if(null!=(\Session::get('ad')))
      <article class="product_main_block">
        <div class="container">
          <div class="row">
            <div class="col-md-8 justify-content-between product_title_block" style="display: flex;">
              <h3 class="product_title">
                {{\Session::get('ad')->title}}
              </h3>

              <?
              if(\Auth::user()){
              $wishlist=App\Containers\Ad\Models\Wishlist::where('message_id',\Session::get('ad')->id)->where('user_id',\Auth::user()->id)->first();
              ?>

              <div class="add_to_favourites">
                <input type="hidden" class="wishInputId" value="{{\Session::get('ad')->id}}">
                <span>Добавить в <br> Избранное</span>
                <button onclick="wishList(this)" class="btn btn-outline-secondary btn-sm btn-wishlist" data-toggle="tooltip" title="Whishlist">
                  <img src="/img/heart_icon.svg" alt="" class="heart_icon" @if($wishlist && $wishlist->active==1) style="display: none"  @else style="display: block !important" @endif>
                  <img src="/img/hert_icon_filed.svg" alt="" class="hert_icon_filed" @if(($wishlist && $wishlist->active!=1) || !$wishlist) style="display: none" @else style="display: block !important" @endif>
                </button>
              </div>
              <? }

              ?>

            </div>
            <div class="col-md-4">
              <p class="product_price">
                £ {{\Session::get('ad')->price}}
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="product_slider_main">
                @foreach(\Session::get('ad')->pictures as $picture)
                  <div class="product_slider_main_item">
                    <img src="{{asset('/storage/messages/'.$picture->photo)}}" alt="">
                  </div>
                @endforeach
              </div>
              <div class="product_slider_nav">
                @foreach(\Session::get('ad')->pictures as $picture)
                  <div class="product_slider_nav_item">
                    <img src="{{asset('/storage/messages/'.$picture->photo)}}" alt="">
                  </div>
                @endforeach
              </div>
            </div>
            <div class="col-lg-4">
              <div class="product_info_block">
                <div class="product_info_block_left">
                  <div class="product_info_block_avatar">
                    <img src="/storage/avatars/{{\Session::get('ad')->getSender->avatar}}" alt="">
                  </div>
                </div>
                <div class="product_info_block_right">
                  <p class="product_info_user_name">{{\Session::get('ad')->name}} <span>Часное лицо</span></p>
                  @if(\Session::get('ad')->show_name)

                  @endif

                  <p class="product_info_user_date">на RUKAVe с {{\Session::get('ad')->getSender->created_at}}</p>
                  <a href="#" class="product_info_all_add">смотреть все обьевления</a>
                  <p class="product_info_city">12 John Street, Manchester, UA (MN3 2ER)</p>
                </div>
                <a href="#" class="product_info_btn_phone">
                  <img src="/img/info_phone.svg" alt="">
                  <span>{{\Session::get('ad')->phone}}</span>
                </a>
                <a href="#" class="product_info_send_message" data-toggle="modal" data-target="#ModalSendMessage"><img src="/img/telegramm_icon.svg" alt="">отправить сообщение</a>
                <p class="product_info_text_down">
                  <img src="/img/mail-send.svg" alt="">
                  Быстро отвечает
                </p>
              </div>

              <div class="product_website_block">
                <img src="/img/internet_icon.svg" alt="">
                <p>Website: <a href="#">www.salecar.com</a></p>
              </div>

              <div class="product_slider_advantage">
                <div class="product_slider_advantage_slider">
                  <div class="product_slider_advantage_item">
                    <img src="/img/advantage_icon1.svg" alt="">
                    <h6>Безопасность</h6>
                    <p>
                      Пользуйтесь доставкой, чтобы уменьшить риск заболеть из-за распространения COVID-19. Если же нужно лично встретиться с покупателем или продавцом, придерживайтесь рекомендованных правил гигиены.
                    </p>
                  </div>
                  <div class="product_slider_advantage_item">
                    <img src="/img/advantage_icon1.svg" alt="">
                    <h6>Безопасность2</h6>
                    <p>
                      Пользуйтесь доставкой, чтобы уменьшить риск заболеть из-за распространения COVID-19. Если же нужно лично встретиться с покупателем или продавцом, придерживайтесь рекомендованных правил гигиены.
                    </p>
                  </div>
                  <div class="product_slider_advantage_item">
                    <img src="/img/advantage_icon1.svg" alt="">
                    <h6>Безопасность3</h6>
                    <p>
                      Пользуйтесь доставкой, чтобы уменьшить риск заболеть из-за распространения COVID-19. Если же нужно лично встретиться с покупателем или продавцом, придерживайтесь рекомендованных правил гигиены.
                    </p>
                  </div>
                </div>
                <a href="#" class="product_slider_advantage_all">читать все советы</a>
              </div>
            </div>
          </div>
          <div class="row product_description">
            <div class="col-sm-12">
              <h4>Описание</h4>
              <p>
                {{\Session::get('ad')->message}}
              </p>
            </div>
          </div>

          <div class="row product_will_share justify-content-between">
            <div class="col-md-6">
              <p class="product_will_share_desc">Поделиться на:</p>
              <ul class="socials">
                <li>
                  <a href="#">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="insta">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="twitter">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="pinterest">
                    <i class="fab fa-pinterest-p"></i>
                  </a>
                </li>
                <li>
                  <a href="#" class="envelope">
                    <i class="fas fa-envelope"></i>
                  </a>
                </li>
              </ul>
            </div>
            <div class="col-md-6" style="text-align: right">
              <img src="/img/tag_icon.png" alt="">
              <p class="product_will_share_tags">Метки: </p>
              <a href="#" class="product_will_share_link">#Автомобили,</a>
              <a href="#" class="product_will_share_link">#Транспорт</a>
            </div>
          </div>

          <div class="row product_indicators_block">
            <div class="col-md-9">
              <p>Добавлено в <span>{{\Session::get('ad')->created_at->format('H:i')}}, {{\Session::get('ad')->created_at->format('d-m-Y')}}</span></p>
              <p>Номер объявления: <span>{{\Session::get('ad')->id}}</span></p>
              <p>Просмотры: <span>{{rand(1, 100)}}</span></p>
            </div>
            <div class="col-md-3">
              <div class="product_indicators_complain">
                <a href="#"><img src="/img/compain.svg" alt="">Пожаловаться</a>
              </div>
            </div>
          </div>

        <div class="row justify-content-end preview_btn_wrapper">
            <div class="col-md-2">
                <button type="button" class="preview_btn_close close_button_modal_previws">Отмена</button>
            </div>
            <div class="col-md-2">
                <button type="button" class="preview_btn">Опубликовать</button>
            </div>
        </div>

        </div>
      </article>
@else
  <? dump('NoT Ad');?>
   @endif





    </div>
  </div>
</div>

@endsection
@section('scripts')
  <script src="/NewSmartAdmin/js/formplugins/select2/select2.bundle.js"></script>

<style>
.product_slider_main .slick-list.draggable{
    height: auto!important;
}
.preview_btn_wrapper button{
    display: block;
    width: 100%;
    line-height: 36px;
    padding: 0 30px;
    border: 1px solid #A269F7;
    color: #A269F7;
    background: #fff;
    border-radius: 40px;
    margin: 20px 0;
    margin-top: 40px;
}
.preview_btn_wrapper .preview_btn{
    background: #A269F7;
    color: #fff;
}
#controls{
    width: 636px;
}
#filterDeals{
    width: 100%;
    background: #fff;
    box-shadow: none;
    border-radius: 30px;
}
</style>

<script>
    $('#previewAdsButton').click(function(){

    });

    $(document).ready(function() {
        $('#clntInfoEditZip').removeAttr("required");
        $('#clntInfoEditOutUk').removeAttr("required");
        $('#clntInfoEditAddrOutUk1').removeAttr("required");
        $('#allUsersClntInfoEditZip').removeAttr("required");

        $('#out_uk').on('click', function () {
            $('.all_user_block').hide();
            $('.outUk').show();
            $('.Places').hide();
          $('#clntInfoEditZip').hide()
		  $('#clntInfoEditAddr1').removeAttr("required");
        });

        $('#postcode').on('click', function () {
            $('.all_user_block').hide();
            $('.outUk').hide();
            $('.Places').hide();
            $('.postcode_block').show();
          $('#clntInfoEditZip').show()
		  $('#clntInfoEditOutUk').removeAttr("required");
            $('#clntInfoEditAddrOutUk1').removeAttr("required");
			$('#clntInfoEditAddr1').removeAttr("required");
        });

        $('#all_adress').on('click', function () {
            $('.all_user_block').show();

            $('.postcode_block').hide();
            $('#clntInfoEditOutUk').removeAttr("required");
            $('#clntInfoEditAddrOutUk1').removeAttr("required");



            $('#clntInfoEditZip').removeAttr("required");

            $('.cat_name').removeAttr("required");

            $('.outUk').hide();
            $('.Places').hide();
        });

        $('#select_adress').on('click', function () {
        console.log(434)
        $('#clntInfoEditAddr1').removeAttr("required");
        $('#allUsersClntInfoEditZip').removeAttr("required");
        $('#clntInfoEditOutUk').removeAttr("required");
        $('#clntInfoEditAddrOutUk1').removeAttr("required");
        $('#clntInfoEditZip').removeAttr("required");
        $('#clntInfoEditZip').hide()
        $('.cat_name').prop('required',true);
          //$('#city').prop('required',true);
        $('.all_user_block').hide().prop('required',false);
        $('.outUk').hide().prop('required',false);
        $('.Places').show();

      });

      $('#all_uk').on('click', function () {
        console.log(434)
        $('#clntInfoEditAddr1').removeAttr("required");
        $('#allUsersClntInfoEditZip').removeAttr("required");
        $('#clntInfoEditOutUk').removeAttr("required");
        $('#clntInfoEditAddrOutUk1').removeAttr("required");
        $('#clntInfoEditZip').removeAttr("required");
        $('#clntInfoEditZip').hide()
        $('.all_user_block').hide().prop('required',false);
        $('.outUk').hide().prop('required',false);
        $('.Places').hide();
        $('#city').val('UK')
        $('#administrative').val('UK')

      });



        $(function () {

            $(".select2-placeholder-multiple").select2(
                {
                    placeholder: "Выберите дополнительную группу для общения"
                });
        });

    });


function getAllParentsString(child,current){
    $.ajax({
        type: "POST",
        dataType: 'json',
        async: false,
        url: '/getAllParentsString',
        data: {child:child}, // serializes the form's elements.
        beforeSend: function() {
            $('.loader-z').css('display','block');
        },
        complete:function(){
            $('.loader-z').css('display','none');
        },
        success: function (data) {
        console.log(data)
        if(data.result=='empty'){
            $('.cat_name').val(current.split(",")[0])
        }else{
            var string='';
            $.each(data.result, function(i, val) {
               string=string+'/'+val.name
              console.log('FIRSTChar=>',string.charAt(0))
              if(string.charAt(0)=='/'){
                string=string.substring(1)
              }
            });
            console.log('Cardif=>',current)
            $('.cat_name').val(string+'/'+current.split(",")[0])

        }

        }

    });
}




    $('.categories').delegate('.cat_block','click',function(e){
console.log('deligate!')
        var id_cat = $(this).parent('a').find('input').val()
        console.log('id_cat',id_cat)
        var cl=$(this).parent('a').parent().attr('class');
        cl=cl.split(' ')[1]
        var simbol=parseInt(cl.slice(10))+1
        new_block_cl=cl.slice(0, 10)+simbol
        window.inpText=$('.cat_name').val()
        console.log('window.inpText',window.inpText)
console.log('123=>',new_block_cl)
        if(new_block_cl=='cat_block_2'){
            $('.cat_block_2').empty()
            $('.cat_block_3').empty()
            $('.cat_block_4').empty()


           $.ajax({
                type: "POST",
                dataType: 'html',
                async: false,
                url: '/show_maincat_gumtree',
                data: {non_arrow: $(this).find('input').val()}, // serializes the form's elements.
               beforeSend: function() {
                   $('.loader-z').show();
               },
               complete:function(){
                   $('.loader-z').hide();
               },
               success: function (sata) {
                    $('.cat_block_1').html(sata)
                    console.log('sata',$(e.currentTarget).find('input').val())
                   var child=$(e.currentTarget).find('input').val();

                    var realValue=$.trim($(e.currentTarget).text());
                    console.log('555=>',realValue)
                   getAllParentsString(child,realValue)
                    $('#administrative').val(realValue)

                   // $('.cat_name').val(window.inpText+'/'+realValue)
                   $('#city').val(realValue)
                 $('#add_place').removeClass('redBorder')
                }

            });

        }
        if(new_block_cl=='cat_block_3'){
            $('.cat_block_4').empty()

            $.ajax({
                type: "POST",
                dataType: 'html',
                async: false,
                url: '/show_maincat_gumtree',
                data: {non_arrow: $(this).find('input').val(),id_cat: id_cat}, // serializes the form's elements.
                beforeSend: function() {
                    $('.loader-z').css('display','block');
                },
                complete:function(){
                    $('.loader-z').css('display','none');
                },
                success: function (wata) {
                    $('.cat_block_2').html(wata)
                    var inpText=$('.cat_name').text()
                    console.log('sata',$(e.currentTarget).find('input').val())
                    var child=$(e.currentTarget).find('input').val();

                    var realValue=$.trim($(e.currentTarget).text());
                    getAllParentsString(child,realValue)
                    console.log(realValue)
                    //$('.cat_name').val(window.inpText+'/'+realValue)
                    $('#city').val(realValue)
                  $('#add_place').removeClass('redBorder')
                }

            });

        }
        if(new_block_cl=='cat_block_4'){
            $('.cat_block_4').empty()

            $.ajax({
                type: "POST",
                dataType: 'html',
                async: false,
                url: '/show_maincat_gumtree',
                data: {non_arrow: $(this).find('input').val(),id_cat: id_cat}, // serializes the form's elements.
                beforeSend: function() {
                    $('.loader-z').css('display','block');
                },
                complete:function(){
                    $('.loader-z').css('display','none');
                },
                success: function (wata) {
                    $('.cat_block_3').html(wata)
                    var inpText=$('.cat_name').text()
                    console.log('sata',$(e.currentTarget).find('input').val())
                    var child=$(e.currentTarget).find('input').val();

                    var realValue=$.trim($(e.currentTarget).text());
                    getAllParentsString(child,realValue)
                    console.log(realValue)
                    //$('.cat_name').val(window.inpText+'/'+realValue)
                    $('#city').val(realValue)
                  $('#add_place').removeClass('redBorder')
                }

            });

        }
        if(new_block_cl=='cat_block_5'){
            console.log($(this).find('input').val());
            $.ajax({
                type: "POST",
                dataType: 'html',
                async: false,
                url: '/show_maincat_gumtree',
                data: {non_arrow: $(this).find('input').val(),id_cat: id_cat}, // serializes the form's elements.
                beforeSend: function() {
                    $('.loader-z').css('display','block');
                },
                complete:function(){
                    $('.loader-z').css('display','none');
                },
                success: function (gata) {
                    $('.cat_block_4').html(gata)
                    var inpText=$('.cat_name').text()
                    console.log('sata',$(e.currentTarget).find('input').val())
                    var child=$(e.currentTarget).find('input').val();

                    var realValue=$.trim($(e.currentTarget).text());
                    getAllParentsString(child,realValue)
                    console.log(realValue)
                    //$('.cat_name').val(window.inpText+'/'+realValue)
                    $('#city').val(realValue)
                  $('#add_place').removeClass('redBorder')
                }

            });
        }
        else{
        $.ajax({
            type: "POST",
            dataType: 'html',
            async: false,
            url: '/show_subcat_gumtree',
            data: {id_cat: id_cat}, // serializes the form's elements.
            beforeSend: function() {
                $('.loader-z').show();
            },
            complete:function(){
                $('.loader-z').hide();
            },
            success: function (data) {
            $('.'+new_block_cl+'').html(data)
            }

        });
    }





    });

$('.cat_name').click(function(){
    $('.categories').show();
})
    $('#chooseGumtreeButton').click(function(){
        console.log('alert')
        $.ajax({
            type: "POST",
            dataType: 'html',
            async: false,
            url: '/save_gumtree',
            data: {}, // serializes the form's elements.
            beforeSend: function() {
                $('.loader-z').show();
            },
            complete:function(){
                $('.loader-z').hide();
                $('.categories').hide();

            },
            success: function (data) {
                $('.categories').hide();
            }


        });
        $('.categories').hide();
    })


  $('.cat_block_1 .cat_block').click(function(){
      console.log('this=>',$(this))
  })

  $('.select_category').change(function(){
      //Услуги/Перевозки/Такси
      if($(this).val()=='Услуги/Перевозки/Такси'){
          console.log('Услуги/Перевозки/Такси')
          $('.add_second_chat_block_input1').show()
      }
      else{
          $('.add_second_chat_block_input1').hide()
      }


    var cat_id=window.cat_id


  })



   $(document).ready(function() {
      $('#allUsersClntInfoEditZip, #clntInfoEditZip, #clntInfoEditAddr1, #autocomplete').bind('keyup blur', function() {
        //alert('In here with' + $(this).val())
        //var regex = new RegExp("/^[a-z ]+$/i");
        if($(this).val().match(/[^A-Za-z0-9\s]/ig)){
          $('#simbolsNotAuthorised').modal({show:true});
          //#youAreNotLeggedIn
         // alert('Пожалуйста используйте только латинские символы.');
          $(this).val($(this).val().replace(/[^A-Za-z0-9\s]/ig, ''))
          return false;
        }
      });

    /* $('#add_ads_form').validate({
       ignore: [],
       // any other options and/or rules
     });*/
    });


    $('input[name="name_ad"]').change(function(){
      if($('input[name="category_id"]').val()){
        $('#add_header').removeClass('redBorder')
      }
    })



    $('textarea[name="description"]').on('input',function(e){
      $('#add_description').removeClass('redBorder')
    });

    $( "#saveAdsButton, #previewAdsButton" ).click(function( event ) {
      console.log(987)
      if (!$('input[name="name_ad"]').is(':valid') || !$('input[name="category_id"]').val()) {
        console.log(777)
        console.log($('#category_id').val())
        $('#add_header').addClass('redBorder')
        $(window).scrollTop($('#add_header').offset().top);
      }
      else{
        $('#add_header').removeClass('redBorder')
      }


      if (($('#clntInfoEditAddr1').is(':valid') && $('#all_adress').is(':checked')) || ($('#clntInfoEditZip').is(':valid')&& $('#postcode').is(':checked')) || ($('#city').val()!=='' && $('#select_adress').is(':checked')) || ($('#autocomplete').is(':valid') && $('#out_uk').is(':checked')) || $('#all_uk').is(':checked')) {

        $('#add_place').removeClass('redBorder')
      }
      else{

        console.log(765,$('#city').val())
        $('#add_place').addClass('redBorder')
        $(window).scrollTop($('#add_place').offset().top);
      }


      if (!$('textarea[name="description"]').is(':valid') ) {
        console.log(779)
        console.log($('#category_id').val())
        $('#add_description').addClass('redBorder')
        $(window).scrollTop($('#add_description').offset().top);
      }
      else{
        $('#add_description').removeClass('redBorder')
      }

    });


</script>




  @endsection

