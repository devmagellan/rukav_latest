@if(count($filters)>0)
<div class="row">
  <div class="col-sm-12">
    <div class="add_advert_block_wrapper">
      <h6 class="add_advert_block_wrapper_title">
        Фильтра
      </h6>


      @foreach ($filters as $key=>$filter)
      @if($filter->filter->active==1)
        @if($filter->filter->format=='input')
      <div class="add_advert_block_input1">
        <input type="text" name="filter_value[{{$key}}]" maxlength="20" pattern="^[A-Za-zА-Яа-я\s]+$" placeholder="{{$filter->filter->name}}" required value="{{$filter->filter->default_value}}">
        <input type="hidden" name="filter_id[{{$key}}]" value="{{$filter->filter->id}}">
        <span class="required">*</span>
        @error('filter_ad')
        <div class="alert errorBlock">{{ $message }}</div>
        @enderror
        <p class="number_of_signs"><span>Укажите ваше значение фильтра {{$filter->filter->name}}</span> </p>
      </div>
            @elseif($filter->filter->format=='input_digits')
              <div class="add_advert_block_input1">
                <input type="number" name="filter_value[{{$key}}]" max="1000"  placeholder="{{$filter->filter->name}}" required value="{{$filter->filter->default_value}}">
                <input type="hidden" name="filter_id[{{$key}}]" value="{{$filter->filter->id}}">
                <span class="required">*</span>
                @error('filter_ad')
                <div class="alert errorBlock">{{ $message }}</div>
                @enderror
                <p class="number_of_signs"><span>Укажите ваше значение фильтра {{$filter->filter->name}}</span> </p>
              </div>
          @elseif($filter->filter->format=='dropdown')
            <div class="add_advert_block_input1">
              <select name="filter_value[{{$key}}]">
                <option selected value="{{$filter->filter->default_value}}">{{$filter->filter->default_value}}</option>
                @foreach(json_decode($filter->filter->values) as $val)
                  <option value="{{$val}}">{{$val}}</option>
                  @endforeach
              </select>
              <input type="hidden" name="filter_id[{{$key}}]" value="{{$filter->filter->id}}">
              <span class="required">*</span>
              @error('filter_ad')
              <div class="alert errorBlock">{{ $message }}</div>
              @enderror
              <p class="number_of_signs"><span>Укажите ваше значение фильтра {{$filter->filter->name}}</span> </p>
            </div>
        @elseif($filter->filter->format=='multiple_choice')
          <div class="add_advert_block_input1">
            <div class="add_second_chat_block_input1" style="margin-top:40px;">
              <div class="form-group" style="width:100%">
                <select class="select2-placeholder-multiple-f form-control" name="filter_value[{{$key}}][]" multiple="multiple" id="multiple-placeholder">
                  @foreach(json_decode($filter->filter->values) as $val)
                    <option value="{{$val}}">{{$val}}</option>
                  @endforeach

                </select>
              </div>
            </div>
            <input type="hidden" name="filter_id[{{$key}}]" value="{{$filter->filter->id}}">
            <span class="required">*</span>
            @error('filter_ad')
            <div class="alert errorBlock">{{ $message }}</div>
            @enderror
            <p class="number_of_signs"><span>Укажите ваше значение фильтра {{$filter->filter->name}}</span> </p>
          </div>

          <script>
            $(function () {

              $(".select2-placeholder-multiple-f").select2(
                {
                  placeholder: "{{$filter->filter->name}}"
                });
              $(".select2-placeholder-language-multiple-f").select2(
                {
                  placeholder: "{{$filter->filter->name}}"
                });
            });
          </script>
        @endif
      @endif
      @endforeach



    </div>
  </div>
</div>
  @endif




