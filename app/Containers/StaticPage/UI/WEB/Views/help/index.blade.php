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
        <ul style="margin-top:0px;color:#A269F7">

                <a style="color:#A269F7" href="/help/1#main"><li style="cursor:pointer">> Общие положения</li></a><br>
            <a style="color:#A269F7" href="/help/1#adds"><li style="cursor:pointer">> Размещение объявлений</li></a><br>
            <a style="color:#A269F7" href="/help/1#from_users"><li style="cursor:pointer">> Сведения, предоставляемые пользователем</li></a><br>
            <a style="color:#A269F7" href="/help/1#delete_reasons"><li style="cursor:pointer">> Причины удаления объявлений</li></a><br>
            <a style="color:#A269F7" href="/help/1#rights"><li style="cursor:pointer">> Права и обязанности сторон</li></a><br>
            <a style="color:#A269F7" href="/help/1#pays"><li style="cursor:pointer">> Оплата услуг</li></a><br>
            <a style="color:#A269F7" href="/help/1#ltd"><li style="cursor:pointer">> Ограничение ответственности компании</li></a><br>
            <a style="color:#A269F7" href="/help/1#changes"><li style="cursor:pointer">> Внесение изменений в соглашение</li></a><br>
            <a style="color:#A269F7" href="/help/1#rest"><li style="cursor:pointer">> Прочие условия</li></a><br>

        </ul>


    </div>

    <div class="col-md-8">
        <?
print($data['firstHelpPage']->content);?>

    </div>
</div>

        </div>
    </main>
@endsection
