@extends('homepage::layouts.layout')
@section('content')
  <style>
    .sendMessageBox{
      -webkit-box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);
      -moz-box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);
      box-shadow: 0px 0px 8px 0px rgba(148,145,148,1);}

    #adv_links li a {
      color:black;
    }
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
          <ul class="breadcrumbs">
            <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="{{asset('/img/back_Icon.svg')}}" alt=""></li>

            <li>Реклама на рукав</li>
          </ul>
        </div>
      </div>

      <div class="row">
        <h3 style="font-weight:600" >Реклама на RUKAV</h3>
        <div class="col-md-12">
          @if($data['firstHelpPage'])
                <?
                print($data['firstHelpPage']->content);
                ?>
          @endif</div>
      </div>
      <div class="row" style="margin-top:50px">
        <div class="col-md-7">
        <h3 style="font-weight:600">По вопросам размещения рекламы заполните форму!</h3>
          <ul id="adv_links">
            @if($data['firstHelpPage'])
              @foreach($data['firstHelpPage']->getSidebar as $side)
                <li><!--a href="#{{$side->link}}"-->{{$side->name}}<!--/a--></li></br>
              @endforeach
            @endif
          </ul>
        </div>
        <div class="col-md-5">
          <div class="sendMessageBox" style="width:99%;padding:15px;height:auto;border-radius: 15px;">
            <form class="formModal needs-validation" action="/adv/connect" method="post" id="contact"  novalidate >
              <div class="row">
                  <div class="col-md-11">
                    <input type="text" name="sender_name" placeholder="Ваше Имя"> <span class="required">*</span>
                    <span id="firstName" class="errorBlock"></span>
                  </div>
                  <div class="col-md-11">
                    <input type="text" name="sender_email" placeholder="Ваш email 6"> <span class="required">*</span>
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
                  <button class="contact_submit" type="submit"  >Отправить сообщение
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
@section('scripts')
  <script>

    $('.contact_submit').on('click', function(e) {
      e.preventDefault();
      console.log('user?')
      var user='{{\Auth::guard('web')->user()->id}}'
    console.log('user=>',user.length<1)
      if(user.length<1){
        console.log('notA user')
        $('#ModalIn').modal({show:true})
      }
      else{
        $('#contact').submit();
      }
    return true;

    });
  </script>
@endsection
