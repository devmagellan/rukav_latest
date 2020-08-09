<?php

namespace App\Containers\Site\Services;

class ProductCategoryService
{

  protected $array=[];
  public static function BreadCrumbs($category)
  {


     $array=self::recursive(0,$category,[]);
   return $array;
  }

  public static function recursive($index=null,$category,$array){
      if($category=\App\Containers\Site\Models\ProductCategory::where('id',$category)->first()){
          $array[$index]['id']=$category->id;
          $array[$index]['name']=$category->name;
$index=$index+1;
          return self::recursive($index,$category->parent_id,$array);
      }
      else{
          return $array;
      }

  }


}
