@extends('homepage::layouts.layout')
@section('content')


    <div class="breadcums_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs">
                        <li><a href="index.html"><img src="/img/home_icon.svg" alt=""></a><img src="/img/back_Icon.svg" alt=""></li>
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
        <?
        $staticpages=\App\Containers\StaticPage\Models\StaticPageGroup::where('staticpage_id',$data['firstHelpPage']->id)->get();
        ?>
        <ul style="margin-top:0px;color:#A269F7">
@foreach($staticpages as $page)
                <a style="color:#A269F7" href="/static/{{$data['firstHelpPage']->link}}{{$page->link}}"><li style="cursor:pointer">> {{$page->name}}</li></a><br>
@endforeach

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
