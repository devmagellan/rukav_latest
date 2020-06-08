<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="{{asset('img/logo.svg')}}" alt="">
        <p class="footer_text">
          It is a long established fact that a reader will be distracted by the readable content of a page when looking.
        </p>
        <ul class="socials">
          <li>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fab fa-instagram"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-2">
        <h5>Навигация</h5>
        <ul class="menu_footer">
          <li>
            <a href="#">О нас</a>
          </li>
          <li>
            <a href="#">Реклама на Rukav</a>
          </li>
          <li>
            <a href="#">Наши партнеры</a>
          </li>
          <li>
            <a href="#">Популярные запросы</a>
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
            <a href="#">Помощь</a>
          </li>
          <li>
            <a href="#">Безопасность</a>
          </li>
          <li>
            <a href="#">Политика конфиденциальности</a>
          </li>
          <li>
            <a href="#">Условия использование RUKAV</a>
          </li>
          <li>
            <a href="#">Карьера</a>
          </li>
          <li>
            <a href="#">Связаться с нами</a>
          </li>
        </ul>
      </div>
      <div class="col-md-3">
        <h5>Мобильное приложение Rukav</h5>
        <a href="#" class="link_footer">
          <img src="{{asset('img/button_playstore.svg')}}" alt="">
        </a>
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
