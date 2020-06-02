@extends('homepage::layouts.layout')
@section('content')
  <main class="main">
    <ul class="category_dropdown_main_list">
    </ul>
    <div class="container">
      <div class="row">
        @foreach($categoriesOnlyRoot  as $category)
          <div class="col-md-4 col-lg-3">
            <div class="cart_item">
              <h6>{{$category->name}}</h6>
              <div class="cart_item_wrapper">
                <img src="{{$category->photo}}" alt="">
              </div>
              @foreach($category->childrenCategories->take(7) as $childCategory)
                <a href="/category{{$childCategory->link}}/{{$childCategory->id}}">{{$childCategory->name}}</a>
              @endforeach
              <a href="/category{{$category->link}}/{{$category->id}}" class="search_all">Показать еще</a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    </div>
  </main>
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
@endsection
