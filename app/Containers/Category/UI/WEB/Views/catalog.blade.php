
@extends('homepage::layouts.layout')
@section('content')
  <style>

    .page-item.active .page-link {
      z-index: 1;
      color: #fff;
      background-color: #A269F7;
      border-color: #A269F7;}
  </style>

  <div class="breadcums_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs">
            <li><a href="index.html"><img src="/img/home_icon.svg" alt=""></a><img src="/img/back_Icon.svg" alt=""></li>
            <li><a href="index.html">Транспорт</a><img src="/img/back_Icon.svg" alt=""></li>
            <li>Продажа автомобилей</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <main>
    <article class="product_main">
      <div class="container">
        <form action="#" method="get" >
        <div class="row">
          <div class="col-sm-9">
            <h5 class="add_advert_block_title">
              Все обьявления
            </h5>
          </div>
          <div class="col-sm-3">
            <select class="catalog_select catalog_select_filter" id="">
              <option value="">За все время</option>
              <option value="">За все время</option>
              <option>За все время</option>
              <option>За все время</option>
              <option>За все время</option>
            </select>
          </div>
        </div>
        <div class="row product_filter">
          <div class="col-sm-2">
            <p class="product_filter_text">
              Местоположения:
            </p>
            <select class="catalog_select">
              <option value="">Все UK</option>
              <option value="">Все UK</option>
              <option>Все UK</option>
              <option>Все UK</option>
              <option>Все UK</option>
            </select>
          </div>
          <div class="col-sm-2">
            <p class="product_filter_text">
              Тип сделки:
            </p>
            <select class="catalog_select">
              <option value="">Все</option>
              <option value="">Все</option>
              <option>Все</option>
              <option>Все</option>
              <option>Все</option>
            </select>
          </div>
          <div class="col-sm-3">
            <p class="product_filter_text">
              Поиск по рубрике
            </p>
            <input type="text" name="rubric_search" class="product_input" placeholder="Я ищу...">
          </div>


          <div class="col-sm-3">
            <label for="amount" class="product_price_text">Price range:</label>
            <input type="text" id="amount" readonly>
            <input type="hidden" id="price_start" name="price_start" value="" readonly>
            <input type="hidden" id="price_end" name="price_end" value="" readonly>
            <div id="slider-range"></div>
          </div>
          <div class="col-sm-2">
            <button type="submit" class="product_filter_btn">Пременить</button>
            <button class="product_filter_clear">Очистить</button>
          </div>
        </div>
        </form>
        <div class="row product_sort">



          <div class="col-sm-5 d-none d-sm-block"><button>Объявления </button></div>
          <?dump(Request::get('sort_by_date'));?>
          <div class="col-4 col-sm-3" style="text-align: center"><button class="data_sort   @if( Request::get('sort_by_date')=='lo_to_high') lo_to_high @elseif(Request::get('sort_by_date')=='high_to_low') high_to_low @else low_to_high @endif">Дата @if( Request::get('sort_by_date')=='lo_to_high') <img src="/img/play_button_img.svg" alt=""> @elseif(Request::get('sort_by_date')=='high_to_low') <img src="/img/play_button_img.svg" alt=""> @else <img src="/img/play_button_img.svg" alt=""> @endif</button></div>
          <div class="col-4 col-sm-2" style="text-align: center"><button>Марка <img src="/img/play_button_img.svg" alt=""></button></div>
          <div class="col-4 col-sm-2" style="text-align: center"><button>Цена <img src="/img/play_button_img.svg" alt=""></button></div>
        </div>

        @foreach($products as $product)
        <div class="row product_item_wrapper product_item_wrapper_active">
          <div class="col-sm-2">
            @if($product->pictures)
            <span class="product_item_foto"><img src="/img/photo_camera_icon.svg" alt="">{{count($product->pictures)}}</span>
            @endif
            @if(!$product->pictures)
            <img src="/storage/pictures/photo_icon.png" alt="" class="product_item_img">

            @else
              <img src="/storage/messages/{{$product->pictures->first()->photo}}" alt="" class="product_item_img">
            @endif
          </div>
          <div class="col-sm-4">
            <a href="#" class="product_item_name">
              {{$product->title}}
            </a>
            <p class="product_item_city d-none d-sm-block">
              <img src="/img/map_icon.svg" alt="" class="product_map_icon">
              Ливерпуль
            </p>
          </div>
          <div class="col-sm-2">
            <p class="product_map_marka d-none d-sm-block">{{$product->created_at}}</p>
          </div>
          <div class="col-sm-2">
            <p class="product_map_marka d-none d-sm-block">Volkswagen</p>
          </div>
          <div class="col-sm-2">
            <p class="product_item_price">£ {{$product->price}}</p>
            <p class="product_map_marka d-sm-none">Volkswagen</p>
            <p class="product_item_city d-sm-none">
              <img src="/img/map_icon.svg" alt="" class="product_map_icon">
              Ливерпуль
            </p>
            <div>
                <?
                if(\Auth::user()){
                    $wishlist=App\Containers\Ad\Models\Wishlist::where('message_id',$product->id)->where('user_id',\Auth::user()->id)->first();
                    ?>
            <input type="hidden" class="wishInputId" value="{{$product->id}}">
            <button onclick="wishList(this)"
                    class="product_btn_wishlist btn btn-outline-secondary btn-sm btn-wishlist @if(($wishlist && $wishlist->active==1) ) active @endif"
                    data-toggle="tooltip" title="Whishlist">
              <img src="/img/heart_icon.svg" alt="asd" class="heart_icon" @if($wishlist && $wishlist->active==1) style="display: none !important"  @else style="display: block !important" @endif>
              <img src="/img/hert_icon_filed.svg" alt="bsc" class="hert_icon_filed" @if(($wishlist && $wishlist->active!=1) || !$wishlist) style="display: none !important" @else style="display: block !important" @endif>

            </button>
                    <? }

                    ?>
            </div>
          </div>
        </div>
          @endforeach

        {{ $products->links() }}

      </div>
    </article>
    <article class="popular_category d-none d-sm-block">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h5>Популярные категории</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-lg-3">
            <div class="cart_item">
              <h6>Детский мир</h6>
              <div class="cart_item_wrapper">
                <img src="/img/cart_icon1.png" alt="">
              </div>
              <a href="#">Детская одежда</a>
              <a href="#">Детская обувь</a>
              <a href="#">Детские коляски</a>
              <a href="#">Детские автокресла</a>
              <a href="#">Детская мебель</a>
              <a href="#">Игрушки</a>
              <a href="#">Детский транспорт</a>

              <a href="#" class="search_all">Показать еще</a>
            </div>
          </div>
          <div class="col-md-4 col-lg-3">
            <div class="cart_item">
              <h6>Недвижимость</h6>
              <div class="cart_item_wrapper">
                <img src="/img/cart_icon2.png" alt="">
              </div>
              <a href="#">Квартиры и комнаты</a>
              <a href="#">Дома</a>
              <a href="#">Земля</a>
              <a href="#">Коммерческая недвижимость</a>
              <a href="#">Гаражи парковки</a>
              <a href="#">Посуточная аренда жилья</a>
              <a href="#">Предложения от застройщиков</a>

              <a href="#" class="search_all">Показать еще</a>
            </div>
          </div>
          <div class="col-md-4 col-lg-3">
            <div class="cart_item">
              <h6>Транспорт</h6>
              <div class="cart_item_wrapper">
                <img src="/img/cart_icon3.png" alt="">
              </div>
              <a href="#">Легковые автомобили</a>
              <a href="#">Грузовые автомобили</a>
              <a href="#">Автобусы</a>
              <a href="#">Мото</a>
              <a href="#">Спецтехника</a>
              <a href="#">Сельхозтехника</a>
              <a href="#">Водный транспорт</a>

              <a href="#" class="search_all">Показать еще</a>
            </div>
          </div>
          <div class="col-md-4 col-lg-3">
            <div class="cart_item">
              <h6>Запчасти для транспорта</h6>
              <div class="cart_item_wrapper">
                <img src="/img/cart_icon4.png" alt="">
              </div>
              <a href="#">Всё запчасти для транспорта</a>
              <a href="#">Автозапчасти и аксессуары</a>
              <a href="#">Шины, диски и колеса</a>
              <a href="#">Запчасти для спец/с.х. техники</a>
              <a href="#">Мотозапчасти и аксессуары</a>
              <a href="#">Прочие запчасти</a>
              <a href="#">Транспорт</a>

              <a href="#" class="search_all">Показать еще</a>
            </div>
          </div>
        </div>
      </div>
    </article>
  </main>
@endsection
@section('scripts')
<script>

    function wishList(event){
        var id = $(event).parent('div').find('.wishInputId').val()
        console.log(id)
        if($(event).hasClass('active')){
            console.log('not_active')
            $(event).find('.hert_icon_filed').hide()
            $(event).find('.heart_icon').show()
            var active = 0;
        }
        else{
            console.log('active')
            $(event).find('.heart_icon').hide()
            $(event).find('.hert_icon_filed').show()

            var active =1;
        }

        $.ajax({
            method: 'POST',
            dataType: 'json',
            async:false,
            url: '/add/wishList',
            data: {id:id,active:active
            },
            beforeSend: function() {
            },
            complete: function() {
                //$('.company_create_close').trigger('click')
                $('#badges_modal').modal("hide");
            },
            success: function (data) {

                $('#badges_modal').modal("hide");
                //$(".modal-backdrop").remove();
                //$('.categoryModalClose').trigger('click')
                //$('.company_create_close').trigger('click')
                //$('.modal-backdrop').removeClass('show').addClass('hide')



                console.log('success')

            }
        });
    }

    $( function() {
        console.log({{$pricesLimits[0]['min_price']}})
console.log({{$pricesLimits[0]['max_price']}})

        $( "#slider-range" ).slider({
            range: true,
            min: {{$pricesLimits[0]['min_price']}},
            max: {{$pricesLimits[0]['max_price']}},
            values: [ 75,300 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "£ " + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
                $( "#price_start" ).val( ui.values[ 0 ]);
                $( "#price_end" ).val(ui.values[ 1 ]);
            }
        });
        $( "#amount" ).val( "£ " + $( "#slider-range" ).slider( "values", 0 ) +
            " - " + $( "#slider-range" ).slider( "values", 1 ) );
        $( "#price_start" ).val( $( "#slider-range" ).slider( "values", 0 ));
        $( "#price_end" ).val($( "#slider-range" ).slider( "values", 1 ));
    } );


    $('.data_sort').click(function(){
        console.log(444)
        var url=$(location).attr('href');
        var url=removeParams(url,'sort_by_date')
        console.log('clear=>',url)
        if($(this).hasClass('low_to_high')){
            if (url.indexOf('?') > -1)
            {

                var param= '&sort_by_date=high_to_low'
            }
            else{
                var param= '?sort_by_date=high_to_low'
            }

        }else{
            $(this).removeClass('low_to_high')
            if (url.indexOf('?') > -1)
            {
                var param= '&sort_by_date=low_to_high'
            }
            else{
                var param= '?sort_by_date=low_to_high'
            }

        }

console.log('final=>',url+param)
        window.location.href=url+param
    })


  function removeParams(url,sParam){

      var url = new URL(url);
      console.log(url)
      var search_params = url.searchParams;
      search_params.delete(sParam);
      console.log(url)
      return url.href
  }
</script>
@endsection

