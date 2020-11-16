@extends('homepage::layouts.layout')
@section('content')
  <style>
    .sendMessageBox {
      -webkit-box-shadow: 0px 0px 8px 0px rgba(148, 145, 148, 1);
      -moz-box-shadow: 0px 0px 8px 0px rgba(148, 145, 148, 1);
      box-shadow: 0px 0px 8px 0px rgba(148, 145, 148, 1);
    }
  </style>
  <main class="main">
    <article class="product_main_block">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <ul class="breadcrumbs">
              <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="{{asset('/img/back_Icon.svg')}}"
                                                                            alt=""></li>

              <li>О нас</li>
            </ul>
          </div>
        </div>

        <div class="row">
          <h3 style="font-weight:600"><span style="padding-left:10px;">О Нас</span></h3>

          <div class="col-md-12">
            <div class="photoCareer"
                 style="width:100%;height:300px;background-repeat:no-repeat;background-size:100%;border-radius:10px;background-image: url('/storage/pictures/hero-image-text-right-darker 1.jpg')">

            </div>
          </div>
        </div>
        <div class="row">


          <div class="col-md-2">
            <div class="row">
              <span class="col-md-3" style="color:#A269F7;font-weight:bold;font-size:48px">10</span>
              <div class="row" style="top:10px;position:relative;float:left;font-sixe:24px;">
                <div class="col-md-12"><span class="col-md-6">+</span><br><span class="col-md-12">ЛЕТ</span></div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="row">
              <span class="col-md-3" style="color:#A269F7;font-weight:bold;font-size:48px">16</span>
              <div class="row" style="top:10px;position:relative;float:left;font-sixe:24px;">
                <div class="col-md-12"><span class="col-md-6">+</span><br><span class="col-md-12">КАТЕГОРИЙ</span></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="row">
              <span class="col-md-4" style="color:#A269F7;font-weight:bold;font-size:48px">2456</span>
              <div class="row" style="top:10px;position:relative;float:left;font-sixe:24px;">
                <div class="col-md-12"><span class="col-md-6">+</span><br><span class="col-md-12">ОБЪЯВЛЕНИЙ</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <span class="col-md-3" style="color:#A269F7;font-weight:bold;font-size:48px">13</span>
            <div class="row" style="top:10px;position:relative;float:left;font-sixe:24px;">
              <div class="col-md-12"><span class="col-md-6">+</span><br><span class="col-md-12">ПАРТНЕРОВ</span></div>
            </div>
          </div>
        </div>

        <div class="row" style="margin-top:50px">
          <div class="col-md-12">
            <p>

              Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
              Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
              Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
              Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
              undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
              (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
              ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit
              amet..", comes from a line in section 1.10.32.

              The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections
              1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact
              original form, accompanied by English versions from the 1914 translation by H. Rackham.

              Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical
              Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
              Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a
              Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the
              undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum"
              (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
              ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit
              amet..", comes from a line in section 1.10.32.

              The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections
              1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact
              original form, accompanied by English versions from the 1914 translation by H. Rackham.
            </p>

          </div>

        </div>
      </div>
    </article>
    <section class="buisnes_user">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h3>Наши бизнес пользователи</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="slider_block">
              <div class="slider_block-item">
                <img src="{{asset('img/slide_img1.png')}}" alt="">
              </div>
              <div class="slider_block-item">
                <img src="{{asset('img/slide_img2.png')}}" alt="">
              </div>
              <div class="slider_block-item">
                <img src="{{asset('img/slide_img3.png')}}" alt="">
              </div>
              <div class="slider_block-item">
                <img src="{{asset('img/slide_img4.png')}}" alt="">
              </div>
              <div class="slider_block-item">
                <img src="{{asset('img/slide_img5.png')}}" alt="">
              </div>
              <div class="slider_block-item">
                <img src="{{asset('img/slide_img2.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </main>

@endsection
