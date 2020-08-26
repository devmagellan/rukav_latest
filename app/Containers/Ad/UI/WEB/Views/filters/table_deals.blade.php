@if(count($filters)>0)
<div class="row">
  <div class="col-sm-12">



    <div class="add_advert_block_wrapper">
      <h6 class="add_advert_block_wrapper_title">
        Тип сделки
      </h6>
      <div class="filterDeals_block">

        <div id="controls" style="display:inline-block">
          <select id="filterDeals" class="form-control" name="filterDeals">
            @foreach ($filters as $key=>$filter)
              @if($filter->filter->active==1)

              @if(null!=(\Session::get('ad')) && $filter->id==\Session::get('ad')->filterDeals->filter_deals_id)
                <option selected value="{{$filter->filter->id}}">{{$filter->filter->name}}</option>
              @else
                <option value="{{$filter->filter->id}}">{{$filter->filter->name}}</option>
              @endif
              @endif
              @endforeach
          </select>
        </div>
      </div>
    </div>



  </div>
</div>
  @endif




