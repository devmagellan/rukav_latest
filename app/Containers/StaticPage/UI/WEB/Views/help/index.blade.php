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
    <div class="col-md-4">



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
