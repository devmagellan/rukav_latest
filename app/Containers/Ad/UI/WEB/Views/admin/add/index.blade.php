@extends('adminpanel::layouts.app_admin')

@section('styles')

    <link rel="stylesheet" href="/css/style.css" />


    <link rel="stylesheet" href="/css/style-tree.css" />

    <link rel="stylesheet" href="/css/nestable.css" />

    <link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/formplugins/select2/select2.bundle.css">

    <link href="{{asset('/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('/css/media.css')}}" rel="stylesheet">

    <style>
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

    <?php


    $main_rubrics=Apiato::call('Site@GetProductCategoriesByParentIdAction',[0], [0]);
    ?>

    <main id="js-page-content" role="main" class="page-content">


        <ol class="breadcrumb page-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">SmartAdmin</a></li>
            <li class="breadcrumb-item">Application Intel</li>
            <li class="breadcrumb-item active">Marketing Dashboard</li>
            <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
        </ol>
        <div class="subheader">
            <h1 class="subheader-title">
                <i class='subheader-icon fal fa-chart-area'></i> Создание <span class='fw-300'>Объявления</span>
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


    <div id="panel-7" class="panel">






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

      @if (\Session::has('success'))
        <div class="alert alert-success">
          <ul>
            <li>{!! \Session::get('success') !!}</li>
          </ul>
        </div>
      @endif






      <article class="add_advert_block">
        <span data-status_created="{{session('infoAd')}}" id="statusAd"></span>
        <form action="/ads/store" method="post" enctype="multipart/form-data">
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
                  Подать новое обьявление
                </h5>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="add_advert_block_wrapper">
                  <h6 class="add_advert_block_wrapper_title">
                    Заголовок
                  </h6>
                  <div class="add_advert_block_input1">
                    <input type="hidden" name="user_id" value="{{$user_id}}">
                    <input type="hidden" name="is_admin_format" value="1">
                    <input type="text" name="name_ad" maxlength="70" placeholder="Название объявления" required value="{{old('name_ad')}}">
                    <span class="required">*</span>
                    @error('name_ad')
                    <div class="alert errorBlock">{{ $message }}</div>
                    @enderror
                    <p class="number_of_signs"><span>70</span> знаков остается</p>
                  </div>
                  <div class="add_advert_block_input1">
                    <input type="text" name="category_ads" placeholder="Выберите категорию" class="select_category" required readonly>
                    <img src="/img/ipagination_right.svg" alt="">
                    <span class="required">*</span>
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


              <input type="hidden" id="category_id" name="category_id" value="{{old('category_id')}}">
              <div class="col-sm-12">
                <div class="add_advert_block_wrapper">
                  <h6 class="add_advert_block_wrapper_title">
                    Местоположение
                  </h6>
                  <input type="hidden" name="city"  id="city">
                  <input type="hidden" name="place_id"  id="place_id">
                  <input type="hidden" name="administrative"  id="administrative">
                  <div class="hide_location_radio">
                    <input type="radio" name="hide_location" value="1" id="hide_location" checked="">
                    <label for="hide_location">Показывать</label>
                    <input type="radio" name="hide_location" value="Не показывать" id="no_hide_location">
                    <label for="no_hide_location">Не показывать</label>
                  </div>
                  <div class="select_location_block">
                    <input type="radio" name="select_addres" value="Полыний адрес" id="all_adress" checked="">
                    <label for="all_adress">Полный адрес</label>
                    <input type="radio" name="select_addres" value="Только Postcode" id="postcode">
                    <label for="postcode">Только Postcode</label>
                    <input type="radio" name="select_addres" value="Выбрать местоположение" id="select_adress">
                    <label for="select_adress">Выбрать местоположение</label>
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
                          <option value="ru">Russia</option>
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
                            @if($location->parent_id==0)
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
                  <div class="input_price_icon">£</div><input type="text" name="price" placeholder="Цена (не обезательно)" value="{{old('price')}}">
                </div>
              </div>
            </div>
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
                <a href="#" class="add_advert_rolls_foto">Привила добавления фото</a>
                @error('files')
                <div class="alert errorBlock">{{ $message }}</div>
                @enderror
              </div>
            </div>
            <div class="col-sm-12">
              <div class="add_advert_block_wrapper">
                <h6 class="add_advert_block_wrapper_title">
                  Описание
                </h6>
                <div class="add_advert_desc">
                  <p>Текст объявления: на русском языке. Допустимое использование английского не более 20%(термины, названия).</p>
                  <p class="end">Транслит не допускается.</p>
                  <textarea name="description" placeholder="Текст обьявления" required>{{old('description')}}</textarea>
                  @error('description')
                  <div class="alert errorBlock">{{ $message }}</div>
                  @enderror
                  <button type="submit" id="saveAdsButton">Подать обьявление</button>
                  <button type="button" class="buttonHref">Предварительный просмотр</button>
                </div>
              </div>
            </div>
          </div>
      </form>
      </article>



























    </div>
    </main>

    <div class="modal fade modalCatalog" id="mainCatalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <img src="/img/close-icon.svg" alt="">
          </button>
          <i class="previous_cat fa fa-arrow-left" aria-hidden="true"></i>
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
@endsection

@section('scripts')
    <script src="/templates/smartadmin/js/datagrid/datatables/datatables.bundle.js"></script>
    <script src="/templates/smartadmin/js/formplugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="/js/main_emulate.js"></script>
    <script src="/js/script.js"></script>
    <script src="/js/script-tree-edit.js"></script>

    <script src="/js/nestable.js"></script>
    <script src="/js/page-nestable.js"></script>
    <script type="text/javascript" src="/js/search_rubricks.js"></script>
    <script>
       // Class definition

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
 /*           $('.datatable').DataTable({
             processing: true,
             serverSide: true,
             ajax: '',
             columns: [
             {'data': 'id'},
             {'data': 'first_name'},
             {'data': 'last_name'},
             {'data': 'email'},
             {
             'orderable': true,
             'searchable': true,
             'data': null,
             'render': function (data, type, row, meta) {
             // render custom html
             return '<button type="button" class="btn btn-info">Edit</button>';
             }
             }
             ],
             });*/

            // Setup - add a text input to each footer cell
            $('#dt-basic-example thead tr').clone(true).appendTo('#dt-basic-example thead');
            $('#dt-basic-example thead tr:eq(1) th').each(function(i)
            {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control form-control-sm" placeholder="Search ' + title + '" />');

                $('input', this).on('keyup change', function()
                {
                    if (dataTable.column(i).search() !== this.value)
                    {
                        dataTable
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });



            var dataTable = $('.datatable').DataTable(
                {
                    "paging": true, // Allow data to be paged
                    "lengthChange": false,
                    "orderCellsTop": true,
                    "fixedHeader": true,
                    "searching": true, // Search box and search function will be actived
                       "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "processing": true,  // Show processing
                    "serverSide": true,  // Server side processing
                    "deferLoading": 0, // In this case we want the table load on request so initial automatical load is not desired
                    "pageLength": 5,    // 5 rows per page
                    "ajax":{
                        url :  '{{ route('serverSide') }}',
                        type : "GET",
                        dataType: 'json',
                        data:{
                            'request':'get_users_invoices',
                            'csrf_token':$('meta[name=csrf-token]').attr("content")
                        },
                        error: function(data){
                            console.log('error',data);
                        }
                    },
                    // aoColumnDefs allow us to specify which column we want to make
                    // sortable or column's alignment
                    "aoColumnDefs": [
                        { 'bSortable': false, 'aTargets': [0] }    ,
                        { className: "dt-center", "aTargets": [0,1,2,3] },
                    ],
                  "columns": [
                      { "bSearchable": false, 'aTargets': [0,1] },
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        null,
                        { "visible": false }, //The last column will be invisible
                    ],

                });
           dataTable.ajax.url('{{route('serverSide',['group_id'=>':group_id'])}}').load();
            dataTable.draw();
            $('#button').on('click',  function () {
                var resourceURL = "{{route('serverSide',['group_id'=>':group_id'])}}";
                var group_id = 1;
                group_id = $('#group_id').val(); //Get the value of input text
                resourceURL = resourceURL.replace(":group_id", group_id); // Build the route

                /*
                 * Change the URL of dataTable and call ajax to load new data
                 */
                dataTable.ajax.url(targetUrl).load();
                dataTable.draw();
            } );





        });
    </script>

    <script>

        $('.edit_rubrics').click(function(){
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
                url: '/ads/delete',
                data: {ids: window.checked},
                beforeSend: function() {
                    $('#loader').show();
                },
                complete: function() {
                    $('#loader').hide();
                    $('.close').trigger('click');
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


      $(document).ready(function() {
        $('#clntInfoEditZip').removeAttr("required");
        $('#clntInfoEditOutUk').removeAttr("required");
        $('#clntInfoEditAddrOutUk1').removeAttr("required");
        $('#allUsersClntInfoEditZip').removeAttr("required");

        $('#out_uk').on('click', function () {
          $('.all_user_block').hide();
          $('.outUk').show();
          $('.Places').hide();
        });

        $('#postcode').on('click', function () {
          $('.all_user_block').hide();
          $('.outUk').hide();
          $('.Places').hide();
          $('.postcode_block').show();
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
          $('#clntInfoEditAddr1').removeAttr("required");
          $('#allUsersClntInfoEditZip').removeAttr("required");
          $('#clntInfoEditOutUk').removeAttr("required");
          $('#clntInfoEditAddrOutUk1').removeAttr("required");
          $('#clntInfoEditZip').removeAttr("required");

          $('.cat_name').prop('required',true);
          $('.all_user_block').hide().prop('required',false);
          $('.outUk').hide().prop('required',false);
          $('.Places').show();

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
              $('.cat_name').val(current)
            }else{
              var string='';
              $.each(data.result, function(i, val) {
                string=string+'/'+val.name
              });
              $('.cat_name').val(string+'/'+current)

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
    </script>

@endsection
