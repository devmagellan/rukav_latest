
@extends('homepage::layouts.layout')
@section('content')
  <style>

    .page-item.active .page-link {
      z-index: 1;
      color: #fff;
      background-color: #A269F7;
      border-color: #A269F7;}
  </style>

  <div class="breadcums_wrapper">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <ul class="breadcrumbs">

            <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="/img/back_Icon.svg" alt=""></li>

              @if(isset($data['garndParentCat']))
            <li><a href="/category/{{$data['garndParentCat']->id}}">{{$data['garndParentCat']->name}}</a><img src="/img/back_Icon.svg" alt=""></li>
              @endif
              @if(isset($data['parentCat']))
                  <li><a href="/category/{{$data['parentCat']->id}}">{{$data['parentCat']->name}}</a><img src="/img/back_Icon.svg" alt=""></li>
              @endif
			   @if(isset($data['currentCat']))
            <li>{{$data['currentCat']->name}}</li>
					@endif
          </ul>
        </div>
      </div>
    </div>
  </div>

  <main>

  </main>
@endsection
@section('scripts')
    <script>
$(document).ready(function(){
var id='{{$id}}'
    $('.btn_category').trigger('click')

    $('.category_dropdown_main_list li').each(function(n,key) {
        console.log(id);
        var inp=$(this).find('input').val();
//        console.log(inp)
        if(inp==id){
            $('.category_dropdown_main_list li').removeClass('category_link_active');
            $('.category_dropdown_main_list ul').hide();
                                              $("input[value='"+ id +"']").next().next().show();
            $(this).addClass('category_link_active');
            $(this).closest(".category_dropdown_main_list-li").addClass('category_link_active');
            $(this).next().show();
            $('.category_dropdown').innerHeight($(this).next('ul.category_dropdown_sub_list').height());
            console.log($(this).next('ul.category_dropdown_sub_list').height());
        }
    });
})
    </script>
@endsection

