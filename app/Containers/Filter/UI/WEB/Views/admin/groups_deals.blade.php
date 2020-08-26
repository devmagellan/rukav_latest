@foreach($group_deals as $filter)
  <div><select class="form-control" style="width:150px;" name="filter_deals[]">
      @foreach($filters as $fi)
        @if($fi->id==$filter->filter->id)
      <option selected value="{{$filter->filter->id}}">{{$filter->filter->name}}</option>
        @else
          <option value="{{$fi->id}}">{{$fi->name}}</option>
          @endif
      @endforeach
    </select><a href="#" class="remove_field">Удалить</a></div>
    @endforeach

