
@extends('ad::layouts.layout')
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
                    <img src="/img/hert_icon_filed.svg" alt="" class="hert_icon_filed" @if($wishlist && $wishlist->active!=1) style="display: none" @else style="display: block !important" @endif>
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
        <div class="col-lg-8">
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
        <div class="col-lg-4">
          <div class="product_info_block">
            <div class="product_info_block_left">
              <div class="product_info_block_avatar">
                <img src="/img/info_user_icon.svg" alt="">
              </div>
            </div>
            <div class="product_info_block_right">
              @if($ad->show_name)
                <p class="product_info_user_name">{{$ad->name}} <span>Часное лицо</span></p>
              @endif
              <p class="product_info_user_date">на RUKAVe з 22.05.2019</p>
              <a href="#" class="product_info_all_add">смотреть все обьевления</a>
              <p class="product_info_city">12 John Street, Manchester, UA (MN3 2ER)</p>
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

<script>

    function wishList(event){
        var id = $(event).parent('div').find('.wishInputId').val()
        console.log(id)
        if($(event).hasClass('active')){
            console.log('not_active')
            $('.hert_icon_filed').hide()
            $('.heart_icon').show()
            var active = 0;
        }
        else{
            console.log('active')
            $('.heart_icon').hide()
            $('.hert_icon_filed').show()

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


</script>
