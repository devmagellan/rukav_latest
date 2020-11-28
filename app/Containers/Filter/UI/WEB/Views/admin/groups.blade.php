
@foreach($groups as $filter)
  <div><select class="form-control" style="width:150px;" name="filters[]">
      @foreach($filters as $fi)

        @php

        if(null!=$fi->pointer){
         $point='('.$fi->pointer.')';}
        else{$point='';}
        @endphp

        @if($fi->id==$filter->filter->id)
      <option selected value="{{$filter->filter->id}}">{{$filter->filter->name .$point }}</option>
        @else
          <option value="{{$fi->id}}">{{$fi->name.$point}}</option>
          @endif
      @endforeach
    </select><a href="#" class="remove_field">Удалить</a></div>
    @endforeach

