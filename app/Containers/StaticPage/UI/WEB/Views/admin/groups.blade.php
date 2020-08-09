

@foreach($groups as $group)
    <div><input type="text" name="link[]"  value="{{$group->link}}"><input type="text" name="name[]" value="{{$group->name}}"><a href="#" class="remove_field">Remove</a></div>
    @endforeach