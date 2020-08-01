@extends('homepage::layouts.layout')
@section('content')
  <style>
    .sendMessageBox{
      -webkit-box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);
      -moz-box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);
      box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);}
  </style>
  <main class="main">
  <article class="product_main_block">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs">
            <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="{{asset('/img/back_Icon.svg')}}" alt=""></li>

            <li>Реклама на рукав</li>
          </ul>
        </div>
      </div>

      <div class="row">
        <h3 style="font-weight:600" >Реклама на RUKAV</h3>
        <div class="col-md-12">
        <p>
            <?
            print($data['firstHelpPage']->content);
            ?>
        </p></div>
      </div>
      <div class="row" style="margin-top:50px">
        <div class="col-md-7">
        <h3 style="font-weight:600">По вопросам размещения рекламы заполните форму!</h3>
          <ul>

            <li>-  Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</li>
            <li>-  Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College</li>
          <li>-  It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College</li>

          </ul>
        </div>
        <div class="col-md-5">
          <div class="sendMessageBox" style="width:99%;padding:15px;height:auto;border-radius: 15px;">
            <form class="formModal needs-validation" action="/adv/connect" method="get" id="contact"  novalidate >
              <div class="row">
                  <div class="col-md-11">
                    <input type="text" name="sender_name" placeholder="Ваше Имя"> <span class="required">*</span>
                    <span id="firstName" class="errorBlock"></span>
                  </div>
                  <div class="col-md-11">
                    <input type="text" name="sender_email" placeholder="Ваш email"> <span class="required">*</span>
                    <span id="lastName" class="errorBlock"></span>
                  </div>
                  <div class="col-md-11" style="margin-top:15px">
                    <input type="tel" name="sender_phone" id="telphone5"><span class="required">*</span>
                    <span id="phone" class="errorBlock"></span>
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
