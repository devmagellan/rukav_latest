@extends('homepage::layouts.layout')
@section('content')


    <div class="breadcums_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs">
                        <li><a href="/"><img src="/img/home_icon.svg" alt=""></a><img src="/img/back_Icon.svg" alt=""></li>
                        <li>{{$data['firstHelpPage']->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <main>
        <div class="container">
<div class="row">
      <div class="col-md-4">
        <ul style="margin-top:50px;color:#A269F7">
            @if($data['firstHelpPage'])
            @foreach($data['firstHelpPage']->getSidebar as $side)
                <li><a href="#{{$side->link}}"> {{$side->name}}</a></li></br>
            @endforeach
            @endif
        </ul>


    </div>

    <div class="col-md-8">
        <?
        print($data['firstHelpPage']->content);
        ?>
    </div>
</div>

        </div>
    </main>
@endsection
