@foreach ($locations as $key=>$location)
        <a style="cursor:pointer">

<?$hasParent=\App\Containers\Ad\Models\BritainRegion::where('parent_id',$location->id)->first();?>
@if(!$hasParent)

                        <div class="cat_block " style="border-bottom:1px solid #000">
@else
                <div class="cat_block bodya" style="border-bottom:1px solid #000">
                    @endif


			
                <input type="hidden" value="{{$location->id}}">  
                {{$location->name}}


                @if(\App\Containers\Ad\Models\BritainRegion::where('parent_id',$location->id)->first())

@if(isset($non_arrow) && $location->id==$non_arrow)

                        <i style="color:#52a744;float:right" class="fa fa-check" aria-hidden="true"></i>
    <? \Session::put('gumtree',$location->id);?>
@else
                <i class="fa fa-arrow-right" aria-hidden="true" style="float:right"></i>
                    @endif
                    @elseif(isset($non_arrow) && $location->id==$non_arrow && $location->parent_id!=0)
                    <? \Log::info('nonArrow'.$non_arrow.'non_arrow2'.$location->id.'non_arrow2_parent'.$location->parent_id);?>
                    <i style="color:#52a744;float:right" class="fa fa-check" aria-hidden="true"></i>
                    <? \Session::put('gumtree',$location->id);?>
                    @endif
            </div>
        </a>
@endforeach