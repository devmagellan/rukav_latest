<link rel="stylesheet" media="screen, print" href="/templates/smartadmin/css/theme-demo.css">
<div id="carouselExampleKitchenSink" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleKitchenSink" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleKitchenSink" data-slide-to="1" class=""></li>

    </ol>
    <div class="carousel-inner" style="max-height:200px">
        @foreach($ads->pictures as$key=> $ad)
         <div class="carousel-item @if($key==0) active @endif">
            <img style="height:200px;width:auto;margin: 0 auto;" class="d-block" src="storage/messages/{{$ad->photo}}" alt="First slide">
            <div class="carousel-caption d-none d-md-block">

            </div>
        </div>
    @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleKitchenSink" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleKitchenSink" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<script src="/templates/smartadmin/js/holder.js"></script>