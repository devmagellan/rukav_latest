<style>
#body > footer > div:nth-child(1) > div > div.col-md-4 > ul > li > a > svg{

	top:5px;
	position:relative;

}
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: #A269F7;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 70px;
  font-size: 18px;
}

#myBtn:hover {
  background-color: #555;
}


</style>
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-arrow-up"></i></button>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="{{asset('img/logo.svg')}}" alt="">
        <p class="footer_text">
          Бесплатные объявления для русскоязычных жителей Великобритании.
        </p>
        <ul class="socials">
          <li>
            <a target="_blank" href="http://facebook.com/rukav.co.uk">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a target="_blank" href="http://instagram.com/rukav.co.uk">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>

      <!--div class="col-md-2">
        <h5>Навигация</h5>
        <ul class="menu_footer">
          <li>
            <a href="/about_us">О нас</a>
          </li>
          <li>
            <a href="/adv">Реклама на Rukav</a>
          </li>
          <li>
            <a href="#">Наши партнеры</a>
          </li>

          <li>
            <a href="#">Контакты для прессы</a>
          </li>
          <li>
            <a href="#">Блог</a>
          </li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Пользователю</h5>
        <ul class="menu_footer">
          <li>
            <a href="/help/1">Помощь</a>
          </li>
          <li>
            <a href="/static/safety">Безопасность</a>
          </li>

          <li>
            <a href="/static/policies ">Правила</a>
          </li>
          <li>
            <a href="/career">Карьера</a>
          </li>
          <li>
            <a href="#">Связаться с нами</a>
          </li>
        </ul>
      </div-->
        <?
        $staticPages=\App\Containers\StaticPage\Models\StaticPage::orderBy('position','asc')->get();
        ?>
      <div class="col-md-2">
        <h5>Навигация</h5>

        <ul class="menu_footer">
          @foreach($staticPages as $page)
		  @if($page->name=='Наши партнеры')
			  <li>
                  <a href="/businessusers">{{$page->name}}</a>
                </li>
			 @else
            @if($page->group==1)
              @if(mb_substr($page->link, 0, 6)=='mailto')
                <li>
                  <a href="{{$page->link}}">{{$page->name}}</a>
                </li>
              @else
          <li>
            <a href="/static/{{$page->link}}">{{$page->name}}</a>
          </li>
                @endif
            @endif
			 @endif
         @endforeach
          </li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Пользователю</h5>
        <ul class="menu_footer">
          @foreach($staticPages as $page)
            @if($page->group==2)
              @if(mb_substr($page->link, 0, 6)=='mailto')
                <li>
                  <a class="footer_link" href="{{$page->link}}">{{$page->name}}</a>
                </li>
              @else
              <li>
                <a class="footer_link" href="/static/{{$page->link}}">{{$page->name}}</a>
              </li>
                @endif
            @endif
          @endforeach
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Мобильное приложение Rukav</h5>
        <!--a href="#" class="link_footer">
          <img src="{{asset('img/button_playstore.svg')}}" alt="">
        </a-->
        <a href="#" class="link_footer">
          <img src="{{asset('img/button_appstore.svg')}}" alt="">
        </a>
      </div>
    </div>
  </div>
  <hr>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <p class="copy">
          RUKAV - сайт бесплатных объявлений в UK. © Copyright 2019 - {{now()->format('Y')}} Rukav Adverts Ltd. All
          rights reserved.
        </p>
      </div>
    </div>
  </div>
</footer>
<script>
//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}


$('.footer_link').click(function(e){
	if($(this).attr('href')=='/static/support'){
		e.preventDefault();
		$('#contactFormModal').modal({show:true})
	}

})
</script>
