@if(count($filters)>0)
<div class="row">
  <div class="col-sm-12">
    <div class="add_advert_block_wrapper">
      <h6 class="add_advert_block_wrapper_title">
        Фильтра
      </h6>


      @foreach ($filters as $key=>$filter)
      @if($filter->filter->active==1)
      <div class="add_advert_block_input1">
        <input type="text" name="filter_value[{{$key}}]" maxlength="70" placeholder="{{$filter->filter->name}}" required value="">
        <input type="hidden" name="filter_id[{{$key}}]" value="{{$filter->filter->id}}">
        <span class="required">*</span>
        @error('filter_ad')
        <div class="alert errorBlock">{{ $message }}</div>
        @enderror
        <p class="number_of_signs"><span>Укажите ваше значение данного фильтра</span> </p>
      </div>
      @endif
      @endforeach



    </div>
  </div>
</div>
  @endif




