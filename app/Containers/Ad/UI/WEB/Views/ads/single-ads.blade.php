@extends('ad::layouts.layout_second')
@section('content')
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
          £ {{$ad->price}}
        </p>
      </div>
    </div>
    <div class="row">
	<div class="col-lg-8 adv_photo_main">
      <div class="col-lg-12 adv_photo">
        <div class="product_slider_main">
          @foreach($ad->pictures as $picture)
            <div class="product_slider_main_item">
              <img src="{{asset('/storage/messages/'.$picture->photo)}}" alt="">
            </div>
          @endforeach
        </div>
        <div class="product_slider_nav">
          @foreach($ad->pictures as $picture)
            <div class="product_slider_nav_item">
              <img src="{{asset('/storage/messages/'.$picture->photo)}}" alt="">
            </div>
          @endforeach
        </div>
      </div>
	  </div>
      <div class="col-lg-4">
        <div class="product_info_block">
          <div class="product_info_block_left">
            <div class="product_info_block_avatar">
              <img src="/storage/avatars/{{$ad->getSender->avatar}}" alt="">
            </div>
          </div>
          <div class="product_info_block_right">
            <p class="product_info_user_name">{{$ad->name}} <span> @if($ad->getSender->vid_user=='Частная') Частное лицо @else {{$ad->getSender->vid_user}}@endif</span></p>
            @if($ad->show_name)

            @endif
			@if(null!=($ad->getSender->created_at))
            <p class="product_info_user_date">на RUKAVe с {{$ad->getSender->created_at->format('d-m-Y')}}</p>
		@endif
            <a href="/all_author_ads?id={{$ad->getSender->id}}" class="product_info_all_add">смотреть все объявления</a>
            <p class="product_info_city">{{$ad->city}}</p>
          </div>
          <a href="#" class="product_info_btn_phone">
            <img src="/img/info_phone.svg" alt="">
            <span>{{$ad->phone}}</span>
          </a>
          <a href="#" class="product_info_send_message" data-toggle="modal" data-target="#ModalSendMessage"><img src="/img/telegramm_icon.svg" alt="">отправить сообщение</a>
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
          <a href="/static/safety#theses" class="product_slider_advantage_all">читать все советы</a>
        </div>
      </div>
    </div>
    <div class="row product_description">
      <div class="col-sm-12">
        <h4>Описание</h4>
        <p>
          {{$ad->message}}
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
        <p>Добавлено в <span>{{$ad->created_at->format('H:i')}}, {{$ad->created_at->format('d-m-Y')}}</span></p>
        <p>Номер объявления: <span>{{$ad->id}}</span></p>
        <p>Просмотры: <span>{{rand(1, 100)}}</span></p>
      </div>
      <div class="col-md-3">
        <div class="product_indicators_complain">
          <a href="#"><img src="/img/compain.svg" alt="">Пожаловаться</a>
        </div>
      </div>
    </div>
  </div>
</article>
@endsection

