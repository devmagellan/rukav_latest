
<? $i=0;
$last=count($categories);?>
@foreach ($categories as $key=>$category)
    @if($category->parent_id==0)
        @if($i==0)
            <div>



                <input type="hidden" class="category_level" value="{{$category->parent_id}}">
                <button class="add_category_into_level" type="button"  ><i class="fa fa-plus" ></i>Добавить категорию в уровень</button>

            </div>
        @endif
        <div id="pos_{{$category->position}}">
            <div style="display:inline-block;width:27px">
                <input type="hidden" class="category_id" value="{{$category->id}}">
                <input type="hidden" class="parent_id" value="{{$category->parent_id}}">
                @if($key!=0)
                    <i style="cursor:pointer" class="arrow_press arrow_up fal fa-arrow-up" aria-hidden="true"></i>
                @endif
                @if($key+1!=$last)
                    <i style="cursor:pointer" class="arrow_press arrow_down fal fa-arrow-down" aria-hidden="true"></i>
                @endif
            </div>
            <a style="display:inline-block" >

                <div  class="cat_block" >




                    <input  class="fahover_cubes_input" type="hidden" value="{{$category->id}}">
                    <button style="background:red;color:white" class="delete_cat"><i class="fa fa-trash"></i></button>
                    <button class="edit_cat"><i class="fa fa-pencil"></i></button>
                    <button class="picture_cat" data-toggle="modal" data-target=".default-example-modal-right-lg-slider"><i class="fas fa-camera-retro"></i></i></button>

                <!--div style="display:inline-block" class="i-checks">
                                                                <label> <input class="category_checkbox" type="checkbox" {{$category->checked}} value=""> </label>
                                                            </div-->


                    <span style="position:relative;padding-left:20px;">{{$category->name}}</span>

                    <span class="fa arrow" style="float:right"></span>
                </div></a>
        </div>
        <?$i++;?>
    @endif
@endforeach