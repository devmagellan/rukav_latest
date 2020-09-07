
<? $i=0;
$last=count($value);?>
@foreach ($value as $key=>$category)
        @if($i==0)
            <div>



                <input type="hidden" class="category_level" value="{{$category->parent_id}}">
                <button class="add_category_into_level" type="button"  ><i class="fa fa-plus" ></i>Добавить категорию в уровень 2</button>

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
                  <?
                  $hasChild=\App\Containers\Site\Models\ProductCategory::where('parent_id',$category->id)->first();
                  ?>
                    <button style="background:red;color:white" class="delete_cat"><i class="fa fa-trash"></i></button>
                    <button class="edit_cat"><i class="fa fa-pencil"></i></button>
                  @if(!$hasChild)
                  <button class="filter_cat"><i class="fa fa-filter"></i></button>
                        <button class="filter_second_cat"><i class="fa fa-filter"></i></button>
                  @endif
                    <span style="position:relative;padding-left:20px;">{{$category->name}}</span>

                    <span class="fa arrow" style="float:right"></span>
                </div></a>
        </div>
        <?$i++;?>
@endforeach
