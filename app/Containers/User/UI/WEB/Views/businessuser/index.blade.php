@extends('homepage::layouts.layout')
@section('content')
  <main class="main">


    <ul class="category_dropdown_main_list">
    </ul>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs">
            <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="{{asset('/img/back_Icon.svg')}}" alt=""></li>

            <li>Наши бизнес пользователи</li>
          </ul>
        </div>
      </div>
      <div class="row">
        <h3 style="font-weight:600" >Наши бизнес пользователи</h3>
      </div>
      <div class="row">
        @foreach($data['businessusers']  as $user)
          <div class="choosen_item-wrapper d-flex" id="favorite_{{$user->id}}">
            <div class="choosen_item_img">
              @if($user->user->avatar)
                <img src="/storage/avatars/{{$user->user->avatar}}" alt="">
              @endif
            </div>
            <div class="choosen_item_text d-flex flex-column">
              <p class="choosen_item_name">

              </p>
              <div class="choosen_subitems_wrapper">
                <div class="choosen_subitem d-flex flex-column" style="min-width: 270px">
                  <h3 class="choosen_subtitle" style="font-weight:bold;font-size:17px;color:black">
                   <b></b> {{$user->company_name}}
                  </h3>
                  <p class="choosen_info">
                    {{$user->business_type}}
                  </p>

                  <p class="choosen_subtitle">  <img src="/img/internet_icon.svg" alt="">
                  Www: <a target="_blanc" href="{{$user->www}}">{{$user->www}}</a>
                  </p>

                  <p class="choosen_subtitle">
                    <img src="/img/map_icon.svg" alt="" class="product_map_icon">
                    {{$user->business_location}}
                  </p>
                  <p class="choosen_info">

                  </p>

                </div>


                <div class="choosen_subitem d-flex flex-column" style="min-width: 270px">
                <a href="tel:{{$user->user->phone}}" class="product_info_btn_phone">
                  <img src="/img/info_phone.svg" alt="">
                  <span>{{print($user->user->phone)}}</span>
                </a>
                </div>
                <div class="choosen_subitem d-flex flex-column" style="min-width: 270px">
                  <a href="#" class="product_info_send_message product_info_send_message_authenticated" onclick="localStorage.removeItem('ModalSendMessage');" data-toggle="modal" data-target="#ModalSendMessage"><img src="/img/telegramm_icon.svg" alt="">отправить сообщение</a>
                </div>
              </div>
            </div>
            <div class="choosen_button-wrapper d-flex flex-row flex-wrap align-items-center justify-content-between">

            </div>
          </div>
        @endforeach
      </div>
    </div>
  </main>

@endsection

