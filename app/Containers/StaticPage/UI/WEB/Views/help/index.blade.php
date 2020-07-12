@extends('homepage::layouts.layout')
@section('content')


    <div class="breadcums_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs">
                        <li><a href="index.html"><img src="/img/home_icon.svg" alt=""></a><img src="/img/back_Icon.svg" alt=""></li>
                        <li>Помощь</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <main>
        <div class="container">
<div class="row">
    <div class="col-md-3">
        <ul style="margin-top:50px;color:#A269F7">
            @foreach($data['restHelpPage'] as $val)
                <a style="color:#A269F7" href="/help/{{$val->id}}"><li style="cursor:pointer">> {{$val->name}}</li></a><br>
            @endforeach
        </ul>


    </div>

    <div class="col-md-3">
        <?
print($data['firstHelpPage']->content);?>

    </div>
</div>

        </div>
    </main>
@endsection
