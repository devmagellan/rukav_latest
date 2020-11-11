@extends('ad::layouts.layout_second')
@section('content')
<style>
.slick-slider {
    margin-bottom: 0;
    position:relative;
}
ul.slickslide {
    padding-left:0;
    max-width:100%;
}
.slick-slider .slick-track {
    min-width:100%;
}
ul.slickslide li img, .slick-dots button img {
    width:100%;
    height:auto;
}
.slick-dots {
    bottom:-100px;
    top:auto;
    left:auto;
    right:auto;
    position:absolute;
    line-height:0;
    background:#fff;

}

.slick-dots li, .slick-dots li button:before {
   /* width: 100px;
    height:100px; */
    margin:0;
    padding:0;
}
.slick-dots li {
    margin: 5px; border:1px solid #ccc; display:inline-block; width:auto;height:auto;
}

.slick-slider .slick-track {
    min-width:100%;
}
.slick-dots li button {
    margin:0;
    height:auto;
    width:100%;
    padding:0;

}

.slick-dots li button.tab { clear:both;   display:block;}
.slick-dots li button img { width:100%; max-width:80px; height:auto;   }
.slick-dots li button:before {
    content:''; border:1px solid #f00;display:block; width:100%;  max-width:150px; overflow:hidden; float:none;  position:absolute;
    width:100%;
    height:100%}

.slick-thumbs {
    position:absolute;
    left: -9999px;
}
</style>
<article class="product_main_block">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
          <?

          ?>
        <ul class="breadcrumbs">
          <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="{{asset('/img/back_Icon.svg')}}" alt=""></li>

          @foreach(array_reverse($breadcrumbsArray) as $crumb)
            <li><a href="/category/{{$crumb['id']}}">{{$crumb['name']}}</a><img src="{{asset('/img/back_Icon.svg')}}" alt=""></li>

          @endforeach
          <li>{{$ad->title}}</li>
        </ul>
      </div>
    </div>
    @if($errors->any())
      <h4 class="success_message" style="color:green">{{$errors->first()}}</h4>
    @endif
	@if(!$ad->getSender)
		<div class="row">
      <div class="col-md-8 justify-content-between product_title_block" style="display: flex;">
        <h3 class="product_title">
          К сожалению данное объявление было удалено из-за нарушений правил публикации.
        </h3>
		</div>
		</div>
		@else
    <div class="row">
      <div class="col-md-8 justify-content-between product_title_block" style="display: flex;">
        <h3 class="product_title">
          {{$ad->title}}
        </h3>

          <?
          if(\Auth::user()){
          $wishlist=App\Containers\Ad\Models\Wishlist::where('message_id',$ad->id)->where('user_id',\Auth::user()->id)->first();
          ?>

        <div class="add_to_favourites">
          <input type="hidden" class="wishInputId" value="{{$ad->id}}">
          <span>Добавить в <br> Избранное</span>
          <button onclick="wishList(this)" class="btn btn-outline-secondary btn-sm btn-wishlist @if($wishlist && $wishlist->active==1) active @endif" data-toggle="tooltip" title="Whishlist">
            <img src="/img/heart_icon.svg" alt="" class="heart_icon" @if($wishlist && $wishlist->active==1) style="display: none"  @else style="display: block !important" @endif>
            <img src="/img/hert_icon_filed.svg" alt="" class="hert_icon_filed" @if(($wishlist && $wishlist->active!=1) || !$wishlist) style="display: none" @else style="display: block !important" @endif>
          </button>
        </div>
          <? }

          ?>

      </div>
      <div class="col-md-4">
        <p class="product_price">
		@if($ad->price==0.01)
			<h5>Цена договорная</h5>
			@else
		£ {{$ad->price}}
	@endif

        </p>
      </div>
    </div>
    <div class="row">

		<div class="col-lg-8 adv_photo_main" style="-webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;">
      <div class="col-lg-12 adv_photo" style="position: relative;
  top: 50%;
  transform: translateY(-50%);">

<link href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.2/css/swiper.min.css" rel="stylesheet" />

<style>
    .product_slider_nav .swiper-wrapper{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .product_slider_nav .swiper-wrapper .swiper-slide:hover{
        cursor: pointer;
        opacity: 1;
    }
    .product_slider_main .swiper-wrapper{
        display: flex;
        align-items: center;
    }
    .swiper-slide{
        text-align: center;
    }
    .swiper-button{
        background-color: #A269F7;
        width: 35px;
        height: 35px;
        background-size: 10px;
        line-height: 34px;
        text-align: center;
        border-radius: 48%;
        z-index: 3;
        transition: all .2s ease-out;
        color: #fff;
    }
.product_slider_nav .swiper-wrapper .swiper-slide{
    width: 80px;
    display: flex;
    height: 80px;
    align-items: center;
    text-align: center;
    justify-content: center;
}
</style>

<div class="product_slider_main swiper-container">
        <div class="swiper-wrapper">
          @foreach($ad->pictures as $picture)
            <div class="product_slider_main_item swiper-slide">
                <?
                $middle_file="storage/messages/middle_{$picture->photo}";
                ?>
              @if(file_exists($middle_file))
              <img src="{{asset($middle_file)}}" alt="">
              @else
              <img src="{{asset('/storage/messages/'.$picture->photo)}}" alt="">
                @endif
            </div>
          @endforeach
        </div>
<div class="swiper-button-next swiper-button swiper-button-white"></div>
<div class="swiper-button-prev swiper-button swiper-button-white"></div>
</div>
<div class="product_slider_nav swiper-container">
        <div class="swiper-wrapper">

          @foreach($ad->pictures as $picture)
            <div class="product_slider_nav_item swiper-slide">
              <img src="{{asset('/storage/messages/'.$picture->photo)}}" alt="">
            </div>
          @endforeach
        </div>
</div>
      </div>
	  </div>


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var galleryThumbs = new Swiper('.product_slider_nav', {
        spaceBetween: 10,
        slidesPerView: 6,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper('.product_slider_main', {
        spaceBetween: 10,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs
        }
    });
</script>



	<!--div class="col-lg-8 adv_photo_main" style="-webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  transform-style: preserve-3d;">
      <div class="col-lg-12 adv_photo" style="position: relative;
  top: 50%;
  transform: translateY(-50%);">
        <ul class="slickslide product_slider_main">
          @foreach($ad->pictures as $picture)
            <li class="product_slider_main_item">
              <img src="{{asset('/storage/messages/'.$picture->photo)}}" alt="">
            </li>
          @endforeach
        </ul>
		<div class="slick-thumbs">
        <ul>
          @foreach($ad->pictures as $picture)
            <li class="product_slider_nav_item">
              <img src="{{asset('/storage/messages/'.$picture->photo)}}" alt="">
            </li>
          @endforeach
        </ul>
		</div>
      </div>
	  </div-->

	  <!--div class="container">
    <p>Here is my header</p>
    <ul class="slickslide">
        <li>
            <img src="http://placehold.it/800x300/200&text=active"  title="img" alt="img" />
        </li>
        <li>
            <img src="http://placehold.it/800x300/300" title="img2" alt="img2" />
        </li>
        <li>
            <img  src="http://placehold.it/800x300/400" title="img" alt="img" />
        </li>
         <li>
            <img src="http://placehold.it/800x300/500"  title="img2" alt="img2" />
        </li>
        <li>
            <img  src="http://placehold.it/800x300/600" title="img" alt="img" />
        </li>
    </ul>
    <div class="slick-thumbs">
        <ul>
             <li>
                <img src="http://placehold.it/150x100/200" />
            </li>
            <li>
                <img src="http://placehold.it/150x100/300" />
            </li>
            <li>
                <img src="http://placehold.it/150x100/400" />
            </li>
            <li>

                <img src="http://placehold.it/150x100/500" />
            </li>
            <li>
                <img src="http://placehold.it/150x100/600" />
            </li>
        </ul>
    </div>
    <hr/>
     <h3>Featured News</h3>

    <p>Proactively create adaptive schemas vis-a-vis multimedia based synergy. Energistically repurpose cost effective users before economically sound web services. Proactively aggregate fully tested ROI whereas superior benefits. Distinctively exploit mission-critical.</p>
</div-->

      <div class="col-lg-4">
        <div class="product_info_block">
          <div class="product_info_block_left">
            <div class="product_info_block_avatar">
              <img src="@if(substr($ad->getSender->avatar, 0, 4)!='http')/storage/avatars/@endif{{ $ad->getSender->avatar }}" />
            </div>
          </div>
          <div class="product_info_block_right">
            <p class="product_info_user_name">{{$ad->name}} <span> @if($ad->getSender->vid_user=='Частная') Частное лицо @else {{$ad->getSender->vid_user}}@endif</span></p>
            @if($ad->show_name)

            @endif
			    @if(null!=($ad->getSender->created_at))
            <p class="product_info_user_date">на RUKAVe с {{$ad->getSender->created_at->format('d-m-Y')}}</p>
		      @endif
            <a href="/all_author_ads?id={{$ad->getSender->id}}" class="product_info_all_add">Все объявления автора</a>
            <p class="product_info_city">{{($ad->address) ? $ad->address : ''}}, {{$ad->city}}</p>
          </div>
          <a href="tel:{{$ad->phone}}" class="product_info_btn_phone">
            <img src="/img/info_phone.svg" alt="">
		@if(empty($ad->getSender->phone) || strlen($ad->getSender->phone)<6 )
			<span>Не указан</span>
			@else
            <span>{{print($ad->getSender->phone)}}</span>
		@endif
          </a>
          @if(\Auth::user() && \Auth::user()->confirmed==\App\Containers\User\Models\User::STATUS_CREATED_BY_ADMIN_NOT_CONFIRMED)
            @php \Session::put('ShowWeeklyAdminCreatedConfirmation',1)@endphp
          <a href="#" class="product_info_send_message product_info_send_message_authenticated" onclick="localStorage.removeItem('ModalSendMessage');" data-toggle="modal" data-target="#emailUpdate"><img src="/img/telegramm_icon.svg" alt="">отправить сообщение</a>
          @elseif(\Auth::user())
            <a href="#" class="product_info_send_message product_info_send_message_authenticated" onclick="localStorage.removeItem('ModalSendMessage');" data-toggle="modal" data-target="#ModalSendMessage"><img src="/img/telegramm_icon.svg" alt="">отправить сообщение</a>
          @else
            <a href="#" class="product_info_send_message" onclick="localStorage.setItem('ModalSendMessage', 'Open message modal')" data-toggle="modal" data-target="#ModalIn"><img src="/img/telegramm_icon.svg" alt="">отправить сообщение</a>
          @endif
          <p class="product_info_text_down">
            <img src="/img/mail-send.svg" alt="">
            Быстро отвечает
          </p>
        </div>
		@if($ad->getSender->vid_user=='Предприниматель')
        <div class="product_website_block">
          <img src="/img/internet_icon.svg" alt="">
		  <? $link=($ad->getSender->getIndividualAccount) ? ((mb_substr($ad->getSender->getIndividualAccount->www, 0, 4)!=='http' ) ? 'http://'.$ad->getSender->getIndividualAccount->www : $ad->getSender->getIndividualAccount->www) : null; ?>
          <p>Website: <a target="_blanc" href="{{$link}}">{{$link}}</a></p>
        </div>
		@endif
		@if($ad->getSender->vid_user=='Организация')
        <div class="product_website_block">
          <img src="/img/internet_icon.svg" alt="">
		  <? $link=($ad->getSender->getOrganisationAccount) ? ((mb_substr($ad->getSender->getOrganisationAccount->www, 0, 4)!=='http' ) ? 'http://'.$ad->getSender->getOrganisationAccount->www : $ad->getSender->getOrganisationAccount->www) : null ; ?>
          <p>Website: <a target="_blanc" href="{{$link}}">{{$link}}</a></p>
        </div>
		@endif
		@if($ad->getSender->vid_user=='Компания')
        <div class="product_website_block">
          <img src="/img/internet_icon.svg" alt="">
		  <? $link=($ad->getSender->getOrganisationAccount) ? ( (mb_substr($ad->getSender->getBusinessAccount->www, 0, 4)!=='http' ) ? 'http://'.$ad->getSender->getBusinessAccount->www : $ad->getSender->getBusinessAccount->www):null; ?>
          <p>Website: <a target="_blanc" href="{{$link}}">{{$link}}</a></p>
        </div>
		@endif
        <div class="product_slider_advantage">
          <div class="product_slider_advantage_slider">
            <div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Пожалуйста, следуйте последним советам от Государства, чтобы оставаться в безопасности.
              </p>
            </div>
            <div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Используйте PayPal при оплате.
              </p>
            </div>
            <div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Не используйте Western Union, Ukash или Paysafe при покупках на RUKAV.
              </p>
            </div>
			 <div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Не полагайтесь на email адреса, скрытые в тексте или картинках.
              </p>
            </div>
			<div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Если предложение слишком заманчиво, возможно, это слишком хорошо, чтобы быть правдой.
              </p>
            </div>
			<div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Задавайте много вопросов о товаре при покупке.
              </p>
            </div>
			<div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Публикуйте много фотографий при продаже товаров и услуг, а также если сдаете недвижимость в аренду.
              </p>
            </div>
			<div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Всегда пользуйтесь услугами курьера при доставке.
              </p>
            </div>
			<div class="product_slider_advantage_item">
              <img src="/img/advantage_icon1.svg" alt="">
              <h6>Безопасность</h6>
              <p>
                Жалуйтесь на объявления, которые нарушают правила или кажутся вам подозрительными, с помощью кнопки внизу объявления
              </p>
            </div>
          </div>
          <a href="/static/safety#theses" target="_blanc" class="product_slider_advantage_all">читать все советы</a>
        </div>
      </div>
    </div>

	<?

    $currentFilters=\App\Containers\Filter\Models\CategoryFilter::with('filter')->where('category_id',$ad->category_id)->get();
	$sliceFilters=array_slice($currentFilters->toArray(), 1);
	if(count($currentFilters)>0){
    ?>
	<div class="row" style="margin-top:30px;">

	<div class="col-md-6">
	@foreach($sliceFilters as $filter)
	<div class="row">
	<div class="col-md-6">
	<h6 style="color:grey">{{$filter['filter']['name']}} :</h6>
	</div>
	<div class="col-md-6">
	<?
	$firstFilterValue= \App\Containers\Filter\Models\AddFilter::where('add_id',$ad->id)->where('filter_id',$filter['filter_id'])->first();
	?>
	@if($firstFilterValue)
	{{$firstFilterValue->value}}
	@endif
	</div>
	</div>
	@endforeach
	</div>

    <div class="col-md-6">
      <div class="row">
        <div class="col-md-6">
          <h6 style="color:grey">Страна Резиденции :</h6>
        </div>
        <div class="col-md-6">
          {{\App\Containers\PrivateCabinet\Services\PrivateCabinetService::code_to_country($ad->getSender->country)}}
        </div></div>
      <div class="row">
        <div class="col-md-6">
          <h6 style="color:grey">Язык :</h6>
        </div>
        <div class="col-md-6">
          <?
          $languageFilterValue= json_decode($ad->language_filter);?>
          @foreach($languageFilterValue as $key=>$value)
          @if(count($languageFilterValue)==1 && $key==0)

          {{$value}}
            @elseif($key>0 && $key<2)
                , {{$value}}
            @else
                {{$value}}
          @endif
          @endforeach
        </div>
      </div>

    </div>

	</div>
	<?}?>

	<div class="row product_description" style="word-wrap: break-word;">
      <div class="col-sm-12">
        <h4>Описание</h4>
        {!! nl2br(e($ad->message)) !!}

      </div>
    </div>

    <div class="row product_will_share justify-content-between">
      <div class="col-md-6">
        <p class="product_will_share_desc">Поделиться на:</p>
        <!--ul class="socials">
          <li>add_foto_file_item_load2
            <a href="http://www.facebook.com/sharer.php?u={{url()->current()}}">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#" class="insta">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
          <li>
            <a href="https://twitter.com/share?url={{url()->current()}}&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" class="twitter">
              <i class="fab fa-twitter"></i>
            </a>
          </li>
          <li>
            <a href="#" class="pinterest">
              <i class="fab fa-pinterest-p"></i>
            </a>
          </li>
          <li>
            <a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 {{url()->current()}}" class="envelope">
              <i class="fas fa-envelope"></i>
            </a>
          </li>
        </ul-->
		<!-- AddToAny BEGIN -->
        <!-- AddToAny BEGIN -->
        <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
          <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
          <a class="a2a_button_facebook"></a>
          <a class="a2a_button_whatsapp"></a>
          <a class="a2a_button_google_gmail"></a>
          <a class="a2a_button_odnoklassniki"></a>
          <a class="a2a_button_vk"></a>
        </div>
        <script>
          var a2a_config = a2a_config || {};
          a2a_config.onclick = 1;
          a2a_config.locale = "ru";
          a2a_config.exclude_services = ["gmail","Pocket","reddit","myspace", "linkedin",
          "telegram","mix","amazon_wish_list","blogger","aol_mail","balatarin","bitty_browser","bibsonomy","tumblr",
            "blogmarks","box_net","buffer","bookmarks_fr","citeulike","design_float","diaspora","copy_link","diigo","digg","douban",
            "dzone","evernote","draugiem","facebook","fark","folkd","flipboard","diary_ru","google_classroom","hacker_news","houzz","hatena","instapaper",
            "google_bookmarks","kakao","care2_news","kindle_it","lite","known","kik","livejournal","mastodon","meneame","mewe",
            "line","mixi","netvouz","papaly","outlook_com","pinboard","mendeley","print","pusha","plurk","printfriendly","protopage_bookmarks",
            "qzone","refind","renren","sina_weibo","sitejot","rediff","svejo","slashdot","stockwits","symbaloo_bookmarks","trello","viadeo","stocktwits",
            "tuenti","threema","typepad_post","twiddla","wanelo","wordpress","xing","wykop","wechat","yahoo_mail","yummly","yoolink"
          ];
        </script>
        <script async src="https://static.addtoany.com/menu/page.js"></script>
        <!-- AddToAny END -->
<!-- AddToAny END -->
      </div>
      <!--div class="col-md-6" style="text-align: right">
        <img src="/img/tag_icon.png" alt="">
        <p class="product_will_share_tags">Метки: </p>
        <a href="#" class="product_will_share_link">#Автомобили,</a>
        <a href="#" class="product_will_share_link">#Транспорт</a>
      </div-->
    </div>

    <div class="row product_indicators_block">
      <div class="col-md-9">
        <p>Добавлено в <span>{{$ad->created_at->format('H:i')}}, {{$ad->created_at->format('d-m-Y')}}</span></p>
        <p>Номер объявления: <span>{{$ad->id}}</span></p>
        <p>Просмотры: <span>{{$ad->view_counter}}</span></p>
      </div>
      <div class="col-md-3">
        <div class="product_indicators_complain">
          <a href="#" data-toggle="modal" data-target="#ModalComplaining"><img src="/img/compain.svg" alt="">Пожаловаться</a>
        </div>
      </div>
    </div>
	@endif
  </div>
</article>
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


    $(document).ready(function(){
      if(localStorage.getItem('ModalSendMessage')=='Open message modal'){
        console.log('modalOpened')
        $('.product_info_send_message_authenticated').trigger('click')

      }
    })

    </script>
  @endsection

