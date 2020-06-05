@extends('ad::layouts.layout')
@section('content')

  <article class="add_advert_block">
    <span data-status_created="{{session('infoAd')}}" id="statusAd"></span>
    <form action="{{route('web_ad_store')}}" method="post" enctype="multipart/form-data">
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
          </div>
        </div>
        <input type="hidden" id="category_id" name="category_id" value="{{old('category_id')}}">
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Местополежение
            </h6>
            <div class="hide_location_radio">
              <input type="radio" name="hide_location" value="1" id="hide_location" checked="">
              <label for="hide_location">Показывать</label>
              <input type="radio" name="hide_location" value="Не показывать" id="no_hide_location">
              <label for="no_hide_location">Не показывать</label>
            </div>
            <div class="select_location_block">
              <input type="radio" name="select_addres" value="Полыний адрес" id="all_adress" checked="">
              <label for="all_adress">Полыний адрес</label>
              <input type="radio" name="select_addres" value="Только Postcode" id="postcode">
              <label for="postcode">Только Postcode</label>
              <input type="radio" name="select_addres" value="Выбрать местоположение" id="select_adress">
              <label for="select_adress">Выбрать местоположение</label>
              <input type="radio" name="select_addres" value="Вне UK" id="out_uk">
              <label for="out_uk">Вне UK</label>
            </div>
            <div class="all_user_block">
              <input type="text" name="address" placeholder="Адрес" class="add_advert_input_location InputControl" id="clntInfoEditAddr1" required value="{{old('address')}}">
              @error('address')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <input type="text" name="post_code" placeholder="Postcode" class="add_advert_input_location postcode InputControl" id="clntInfoEditZip" required value="{{old('post_code')}}">
              @error('post_code')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="outUk" style="display:none;">
              <div class="row">
                <div class="col-md-3 catalogBlock1">
                  <div class="number_block_category d-md-none">1/4</div>
                  <ul class="listCatalog listCatalog1">
                    <li>Вне UK</li>
                    <li>England</li>
                    <li>England_1</li>
                    <li>England_22</li>
                    <li>England_344</li>
                  </ul>
                </div>
                <div class="col-md-3 catalogBlock2">
                  <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
                  <div class="number_block_category d-md-none">2/4</div>
                  <ul class="listCatalog listCatalog2">
                    <li>Албания</li>
                    <li>Багамские Острова</li>
                    <li>Алжир</li>
                    <li>Ангола</li>
                    <li>Андорра</li>
                    <li>Животные</li>
                    <li>Антигуа</li>
                    <li>Ангола</li>
                  </ul>
                </div>
                <div class="col-md-3 catalogBlock3">
                  <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
                  <div class="number_block_category d-md-none">3/4</div>
                  <ul class="listCatalog listCatalog3">
                    <li>Бельгия</li>
                    <li>Бенин</li>
                    <li>Беларусь</li>
                    <li>Болгария</li>
                    <li>Боливия</li>
                    <li>Босниякои</li>
                    <li>Ботсвана</li>
                    <li>Бразилия</li>
                    <li>Ботсвана</li>
                  </ul>
                </div>
                <div class="col-md-3 catalogBlock4">
                  <img src="/img/arrow_left.svg" alt="" class="arrow_left d-md-none">
                  <div class="number_block_category d-md-none">4/4</div>
                  <ul class="listCatalog listCatalog4 listCatalogEnd">
                    <li>Бельгия</li>
                    <li>Бенин Бенин</li>
                    <li>Беларусь Беларусь</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="add_advert_block_wrapper">
            <h6 class="add_advert_block_wrapper_title">
              Контактная информация
            </h6><br>
            <div class="contact_info_wrapper">
              <p>Email для сообщений (скрыт)</p>
              <input type="email" name="email" placeholder="Email" required value="{{old('email')}}">
              @error('email')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
            </div>
            <div class="contact_info_wrapper contact_info_wrapper2">
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
            </div>
            <div class="contact_info_wrapper">
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
            </div>
            <div class="contact_info_wrapper">
              <div class="input_price_icon">£</div><input type="text" name="price" placeholder="Цена (необезательно)" value="{{old('price')}}">
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
    </div>
  </form>
  </article>
  </div>
    <div class="modal fade modalCatalog" id="mainCatalog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <img src="img/close-icon.svg" alt="">
                </button>

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
                        <img src="img/arrow_left.svg" alt="" class="arrow_left d-md-none">
                        <div class="number_block_category d-md-none">2/3</div>
                        <h5>Рубрика</h5>
                        <ul class="listCatalog listCatalog2">

                        </ul>
                    </div>
                    <div class="col-md-4 catalogBlock3">
                        <img src="img/arrow_left.svg" alt="" class="arrow_left d-md-none">
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

