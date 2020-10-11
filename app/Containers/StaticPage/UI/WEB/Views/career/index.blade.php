@extends('homepage::layouts.layout')
@section('content')
  <style>
    .sendMessageBox{
      -webkit-box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);
      -moz-box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);
      box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);}
  </style>
  <main class="main">
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
  <article class="product_main_block">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <?

            ?>
          <ul class="breadcrumbs">
            <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="{{asset('/img/back_Icon.svg')}}" alt=""></li>

            <li>Карьера</li>
          </ul>
        </div>
      </div>

      <div class="row">
        <h3 style="font-weight:600" >Карьера</h3>
      </div>
        <div class="row">
          <div class="col-md-4">
            <div class="photoCareer" style="width:90%;height:300px;background-repeat:no-repeat;background-size:100%;border-radius:10px;background-image: url('/storage/pictures/hero-image-text-left-darker 1.png')">

            </div>
          </div>
          <div class="col-md-8">

              <p>
                  <?
                  print($data['firstHelpPage']->content);
                  ?>
              </p>
          </div>
        </div>


      <div class="row" style="margin-top:50px">
        <div class="col-md-7">
        <h3 style="font-weight:600">Нам нужны специалисты таких направлений</h3>
          <span>Отправляйте свое резюме нам на почту</span>
          <?

          ?>
          <ul style="margin-top:50px;color:#A269F7">
            @foreach($data['firstHelpPage']->getSidebar as $side)
              <li>> {{$side->name}}</li></br>
            @endforeach

          </ul>
        </div>
        <div class="col-md-5">
          <div class="sendMessageBox" style="width:99%;padding:15px;height:auto;border-radius: 15px;">
            <form class="formModal needs-validation" action="/adv/connect/career" method="post" id="contact" enctype="multipart/form-data" novalidate >
              <div class="row">
                  <div class="col-md-11">
                    <input type="text" name="sender_name" placeholder="Ваше Имя"> <span class="required">*</span>
                    <span id="firstName" class="errorBlock"></span>
                  </div>
                  <div class="col-md-11">
                    <input type="text" name="sender_email" placeholder="Ваш email 4"> <span class="required">*</span>
                    <span id="lastName" class="errorBlock"></span>
                  </div>
                  <div class="col-md-11" style="margin-top:15px">
                    <input type="tel" name="sender_phone" id="telphone5"><span class="required">*</span>
                    <span id="phone" class="errorBlock"></span>
                  </div>

                <div class="col-md-11">
                  <input type="file" name="file" id="msgr_file" placeholder="Ваше резюме"/>
                  <span id="resume" class="errorBlock"></span>
                </div>
                <div class="col-md-11">
                  <textarea name="text" id="msgr_input" placeholder="Текст сообщения"> </textarea>
                  <span id="lastName" class="errorBlock"></span>
                </div>
              </div>
              <p class="form_modal_text_bottom">

              </p>
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                  <button type="submit"  >Отправить сообщение
                  </button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </article>

  </main>

@endsection
