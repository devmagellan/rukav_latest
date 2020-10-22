
@extends('homepage::layouts.layout')
@section('content')
  <style>

    .page-item.active .page-link {
      z-index: 1;
      color: #fff;
      background-color: #A269F7;
      border-color: #A269F7;}
.flag{width:30px;height:30px;margin-top:80px;margin-left:30px;}
    .flag > svg {
      position:absolute;
      background-size: 20px 30px;
    }
  </style>


  <div class="breadcums_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs">

            <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="/img/back_Icon.svg" alt=""></li>

              @if(isset($data['garndParentCat']))
            <li><a href="/category/{{$data['garndParentCat']->id}}">{{$data['garndParentCat']->name}}</a><img src="/img/back_Icon.svg" alt=""></li>
              @endif
              @if(isset($data['parentCat']))
                  <li><a href="/category/{{$data['parentCat']->id}}">{{$data['parentCat']->name}}</a><img src="/img/back_Icon.svg" alt=""></li>
              @endif
			   @if(isset($data['currentCat']))
            <li>{{$data['currentCat']->name}}</li>
					@endif
          </ul>
        </div>
      </div>
    </div>
  </div>

  <main>
    <article class="product_main">
	@if(count($products)<1)
		<div class="container">
	<h3>По Вашему запросу объявлений не найдено </h3>
	</div>
	@else
      <div class="container">
        <form action="#" method="get" >
        <div class="row">
          <div class="col-sm-9">
            <h5 class="add_advert_block_title">
              Все обьявления
            </h5>
          </div>
          <div class="col-sm-3">
            <select class="catalog_select catalog_select_filter" id="" name="period">
              <option value="1" @if(app('request')->input('period')==1) selected @endif>За 24 часа</option>
              <option value="2" @if(app('request')->input('period')==2) selected @endif>За 2 дня</option>
              <option value="3" @if(app('request')->input('period')==3) selected @endif>За 7 дней</option>
              <option value="0" @if(app('request')->input('period')==0 || null==app('request')->input('period') ) selected @endif >За все время</option>
            </select>
          </div>
        </div>
        <div class="row product_filter">
          <div class="col-sm-2">
            <p class="product_filter_text">
              Местоположение:
            </p>
            <select class="catalog_select" name="area">
              <option value="0">Все UK</option>
              <option value="1">England</option>
              <option value="2">Scotland</option>
              <option value="3">Northern Ireland</option>
              <option value="4">Wales</option>
              <option value="5">Вне UK</option>
            </select>
          </div>
          <div class="col-sm-2">
            <p class="product_filter_text">
              Тип сделки:
            </p>

				@if(isset($data) )
              <select id="filterDeals" class="form-control" name="filterDeals">
                  @foreach($data['filterDeals'] as $filter)
                      <option value="{{$filter->id}}">{{$filter->name}}</option>
                  @endforeach
              </select>
        @elseif(isset($filterDeals))
              <select id="filterDeals" class="form-control" name="filterDeals">
                @foreach($filterDeals as $filter)
                  <option value="{{$filter->id}}">{{$filter->name}}</option>
                @endforeach
              </select>
			  @endif
          </div>
          <div class="col-sm-3">
            <p class="product_filter_text">
              Поиск по рубрике
            </p>
            <input type="text" name="rubric_search" class="product_input" placeholder="Я ищу...">
          </div>


          <div class="col-sm-3">
            <label for="amount" class="product_price_text">Диапазон цен:</label>
            <input type="text" id="amount" readonly>
            <input type="hidden" id="price_start" name="price_start" value="" readonly>
            <input type="hidden" id="price_end" name="price_end" value="" readonly>
            <div id="slider-range"></div>
          </div>
          <div class="col-sm-2">
            <button type="submit" class="product_filter_btn">Применить</button>
            <button class="product_filter_clear">Очистить</button>
          </div>
        </div>
        </form>
        <div class="row product_sort">



          <div class="col-sm-4 d-none d-sm-block"><button>Объявления </button></div>
          <div class="col-4 col-sm-1" style="text-align: center"><button class="data_sort   @if( Request::get('sort_by_date')=='lo_to_high') lo_to_high @elseif(Request::get('sort_by_date')=='high_to_low') high_to_low @else low_to_high @endif">Дата @if( Request::get('sort_by_date')=='low_to_high') <img src="/img/play_button_img.svg" alt=""> @elseif(Request::get('sort_by_date')=='high_to_low') <img style="width:9px;" src="/img/play_button_img_down.svg" alt=""> @else <img style="width:9px;" src="/img/play_button_img.svg" alt=""> @endif</button></div>
			@if(isset($data))
            <?

            $currentFilters=\App\Containers\Filter\Models\CategoryFilter::with('filter')->where('category_id',$data['currentCat']->id)->get();
            ?>
            @foreach($currentFilters as $filter)
                <div class="col-md-2" style="text-align: center">
                <input type="hidden" class="filter_variant" value="{{$filter->filter->id}}">
                  <? $filter_variant='sort_by_filter_'.$filter->filter->id;
                  ?>
                  <button class="filter_sort @if( Request::get($filter_variant)=='lo_to_high') lo_to_high @elseif(Request::get($filter_variant)=='high_to_low') high_to_low @else low_to_high @endif">{{$filter->filter->name}} @if( Request::get($filter_variant)=='lo_to_high') <img src="/img/play_button_img.svg" alt=""> @elseif(Request::get($filter_variant)=='high_to_low') <img style="width:9px;" src="/img/play_button_img_down.svg" alt=""> @else <img src="/img/play_button_img.svg" alt=""> @endif </button>
                </div>
            @endforeach
          @if(count($currentFilters)<3)
            @for($i=1;$i<=3-count($currentFilters)-1;$i++)
              <div class="col-md-2" style="text-align: center"></div>

            @endfor
              <div class="col-md-3" style="text-align: center"><button style="float:right" class="price_sort   @if( Request::get('sort_by_price')=='lo_to_high') lo_to_high @elseif(Request::get('sort_by_price')=='high_to_low') high_to_low @else low_to_high @endif">Цена @if( Request::get('sort_by_price')=='low_to_high') <img src="/img/play_button_img.svg" alt=""> @elseif(Request::get('sort_by_price')=='high_to_low') <img style="width:9px;" src="/img/play_button_img_down.svg" alt=""> @else <img style="width:9px;" src="/img/play_button_img.svg" alt=""> @endif</button></div>
        </div>
          @endif
        @else
            <div class="col-md-2" style="text-align: center"></div>
            <div class="col-md-2" style="text-align: center"></div>
            <div class="col-md-3" style="text-align: center"><button style="float:right" class="price_sort @if( Request::get('sort_by_price')=='lo_to_high') lo_to_high @elseif(Request::get('sort_by_price')=='high_to_low') high_to_low @else low_to_high @endif">Цена @if( Request::get('sort_by_price')=='low_to_high') <img src="/img/play_button_img.svg" alt=""> @elseif(Request::get('sort_by_price')=='high_to_low') <img style="width:9px;" src="/img/play_button_img_down.svg" alt=""> @else <img style="width:9px;" src="/img/play_button_img.svg" alt=""> @endif</button></div>
        </div>
			@endif


        @foreach($products as $product)
      @php
      \App\Containers\Ad\Models\Ad::where('id',$product->id)->update(['counter'=>$product->view_counter+1]);
      @endphp
        <div class="row product_item_wrapper product_item_wrapper_active">
          <div class="col-sm-2">
            @if($product->pictures)
            <span class="product_item_foto"><img src="/img/photo_camera_icon.svg" alt="">{{count($product->pictures)}}</span>
            @endif
            @if(!$product->pictures->first())
                <a href="/ads/{{$product->id}}">
            <img src="/storage/pictures/photo_icon.png" alt="" class="product_item_img">
                    </a>
            @else
                    <?
                    $small_file="storage/messages/small_{$product->pictures->first()->photo}";
                    ?>
            @if(file_exists($small_file))
                <? dump('small');?>
                        <a href="/ads/{{$product->id}}">
                            <img src="/storage/messages/small_{{$product->pictures->first()->photo}}" alt="" class="product_item_img">
                        </a>
              @else
              <? dump('big');?>
                    <a href="/ads/{{$product->id}}">
              <img src="/storage/messages/{{$product->pictures->first()->photo}}" alt="" class="product_item_img">
                    </a>
            @endif
            @endif
          </div>
          <div class="col-sm-3">
            <a href="/ads/{{$product->id}}" class="product_item_name">
              {{$product->title}}
            </a>
            <div >
              <div class="flag" style="width:30px;display:none;position:relative">
             <?
			 if($product->getSender){
			 if($product->getSender->country){
              $egypt = country($product->getSender->country);

              echo $egypt->getFlag();
			 }}?></div>
            <p class="product_item_city d-none d-sm-block">
              <img src="/img/map_icon.svg" alt="" class="product_map_icon">
                {{$product->city}}
            </p></div>
          </div>
          <?$filterValue=[];
          ?>

@if(isset($currentFilters))
          @foreach($currentFilters as $key=>$filter)
            <?
            $filterValue[$key]=\App\Containers\Filter\Models\AddFilter::where('add_id',$product->id)->where('filter_id',$filter->filter_id)->first();
            ?>
            <div class="col-md-2" style="text-align: center">
              @if($filterValue[$key])
              <p class="product_map_marka d-none d-sm-block">{{$filterValue[$key]->value}}</p>
              @endif
            </div>
          @endforeach
          @if(count($currentFilters)<3)
            @for($i=1;$i<=3-count($currentFilters)-1;$i++)
              <div class="col-md-2" style="text-align: center"></div>
            @endfor
              <div class="col-md-3">
                <p class="product_item_price">{{number_format($product->price, 0, '.', ' ')}} £</p>
                <p class="product_map_marka d-sm-none">Volkswagen</p>
                <p class="product_item_city d-sm-none">
                  <img src="/img/map_icon.svg" alt="" class="product_map_icon">
                  {{$product->city}}
                </p>
                <div>
                  @else
                    <div class="col-md-3">
                      <p class="product_item_price">{{number_format($product->price, 0, '.', ' ')}} £</p>
                      <p class="product_map_marka d-sm-none">Volkswagen</p>
                      <p class="product_item_city d-sm-none">
                        <img src="/img/map_icon.svg" alt="" class="product_map_icon">
                        {{$product->city}}
                      </p>
                      <div>
          @endif
  @else
            <div class="col-md-2" style="text-align: center"></div>
            <div class="col-md-2" style="text-align: center"></div>
            <div class="col-sm-3">
              <p class="product_item_price">{{number_format($product->price, 0, '.', ' ')}} £</p>
              <p class="product_map_marka d-sm-none">Volkswagen</p>
              <p class="product_item_city d-sm-none">
                <img src="/img/map_icon.svg" alt="" class="product_map_icon">
                {{$product->city}}
              </p>
              <div>

		@endif
          <!--div class="col-sm-1">
            <p class="product_item_price">{{number_format($product->price, 0, '.', ' ')}} £</p>
            <p class="product_map_marka d-sm-none">Volkswagen</p>
            <p class="product_item_city d-sm-none">
              <img src="/img/map_icon.svg" alt="" class="product_map_icon">
              {{$product->city}}
            </p>
            <div-->
                <?
                if(\Auth::user()){
                    $wishlist=App\Containers\Ad\Models\Wishlist::where('message_id',$product->id)->where('user_id',\Auth::user()->id)->first();
                    ?>

                  <div class="add_to_favourites" style="float:right">
                    <input type="hidden" class="wishInputId" value="{{$product->id}}">
                    <button onclick="wishList(this)" class="btn btn-outline-secondary btn-sm btn-wishlist @if($wishlist && $wishlist->active==1) active @endif" data-toggle="tooltip" title="Whishlist">
                      <img src="/img/heart_icon.svg" alt="" class="heart_icon" @if($wishlist && $wishlist->active==1) style="display: none"  @else style="display: block !important" @endif>
                      <img src="/img/hert_icon_filed.svg" alt="" class="hert_icon_filed" @if(($wishlist && $wishlist->active!=1) || !$wishlist) style="display: none" @else style="display: block !important" @endif>
                    </button>
                  </div>
                    <? }

                    ?>
            </div>
          </div>
        </div>
          @endforeach


        {{ $products->appends(request()->input())->links() }}

      </div>
	  @endif
    </article>
    <article class="popular_category d-none d-sm-block">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <h5>Популярные категории</h5>
          </div>
        </div>
        <div class="row">


            @foreach($categoriesOnlyRoot->take(4)  as $category)
                <div class="col-md-4 col-lg-3">
                    <div class="cart_item">
                        <h6>{{$category->name}}</h6>
                        <div class="cart_item_wrapper">
                            <img style="border-radius: 50%;" src="/storage/root_cat_photos/{{$category->photo}}" alt="">
                        </div>
                        @foreach($category->childrenCategories->take(7) as $childCategory)
                            <a href="/category/{{$childCategory->id}}">{{$childCategory->name}}</a>
                        @endforeach
                        <a href="/category/{{$category->id}}" class="search_all">Показать еще</a>
                    </div>
                </div>
            @endforeach


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
      $(event).removeClass('active')
    }
    else{
      console.log('active')
      $(event).find('.heart_icon').hide()
      $(event).find('.hert_icon_filed').show()

      var active =1;
      $(event).addClass('active')
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
            min: Number('{{$pricesLimits[0]['min_price']}}'),
            max: Number('{{$pricesLimits[0]['max_price']}}'),
            values: [ '{{$pricesLimits[0]['min_price']}}','{{$pricesLimits[0]['max_price']}}' ],
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



    $('.price_sort').click(function(){
        console.log(444)
        var url=$(location).attr('href');
        var url=removeParams(url,'sort_by_price')
        console.log('clear=>',url)
        if($(this).hasClass('low_to_high')){
            if (url.indexOf('?') > -1)
            {

                var param= '&sort_by_price=high_to_low'
            }
            else{
                var param= '?sort_by_price=high_to_low'
            }

        }else{
            $(this).removeClass('low_to_high')
            if (url.indexOf('?') > -1)
            {
                var param= '&sort_by_price=low_to_high'
            }
            else{
                var param= '?sort_by_price=low_to_high'
            }

        }

        console.log('final=>',url+param)
        window.location.href=url+param
    })

    $('.filter_sort').click(function(){
      console.log(444)
      var filter_id=$(this).parent().find('.filter_variant').val()
      var url=$(location).attr('href');
        var url=removeFilterParams(url,'sort_by_filter_')
      //var url=removeParams(url,'sort_by_filter_'+filter_id+'')

      console.log('clear=>',url)
      if($(this).hasClass('low_to_high')){
        if (url.indexOf('?') > -1)
        {

          var param= '&sort_by_filter_'+filter_id+'=high_to_low'
        }
        else{
          var param= '?sort_by_filter_'+filter_id+'=high_to_low'
        }

      }else{
        $(this).removeClass('low_to_high')
        if (url.indexOf('?') > -1)
        {
          var param= '&sort_by_filter_'+filter_id+'=low_to_high'
        }
        else{
          var param= '?sort_by_filter_'+filter_id+'=low_to_high'
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

    function removeFilterParams(url,sParam){

        var url = new URL(url);
        console.log(url)
        var search_params = url.searchParams;
        console.log('search_params',search_params)
        search_params.forEach(function(value, key) {
            console.log(key.includes('sort_by_filter_'));
        if(key.includes('sort_by_filter_')){
            search_params.delete(key);
        }
        });

        console.log(url)
        return url.href
    }

  $('.product_filter_clear').click(function(){
    console.log(window.location.href.split("?")[0])
    setTimeout(function(){document.location.href = ''+window.location.href.split("?")[0]+'/'},100);
  })


    $(document).ready(function () {
      var svg = $('.flag').find('svg');
      $.each(svg, function (index, value) {
        console.log(value);

        var w = value.getAttribute('width').replace('px', '');
        var h = value.getAttribute('height').replace('px', '');

        value.removeAttribute('width');
        value.removeAttribute('height');

        value.setAttribute('viewBox', '0 0 ' + w + ' ' + h);
        value.setAttribute('preserveAspectRatio', 'xMinYMin meet')

        $(value)
          .css('width', '100%')
          .css('height', '100%')
          .css('background-color', 'white');

      });
      $('.flag').css('display','block')
    });
</script>
@endsection

