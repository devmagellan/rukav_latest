<?php

namespace App\Containers\HomePage\Services;

use Illuminate\Http\Response;
use Apiato\Core\Foundation\Facades\Apiato;

class GlobalService
{
	
  public static function getRootInformation($data)
  {
	$key = 'all_categories_';  
	$categories['all'] = \Cache::get($key);
	
    if($categories['all'] === null) {
        $categories['all'] = Apiato::call('Site@GetAllProductCategoriesAction', [$data]);
		
        \Cache::put($key, $categories['all'], 900);
    }
	$key2 = 'root_categories_'; 
	$categories['categoriesOnlyRoot'] = \Cache::get($key2);
	if($categories['categoriesOnlyRoot'] === null) {
	$categories['categoriesOnlyRoot'] = $categories['all']->where('parent_id', 0);
    \Cache::put($key2, $categories['categoriesOnlyRoot'], 900);
    }
    return $categories;
	  
  }
  
  
   public static function getMainProperties($request){
	   
	   $categories=self::getRootInformation($request);
        $cat['categories']=$categories['all'];
        $cat['categoriesOnlyRoot']=$categories['categoriesOnlyRoot'];
        return $cat;
    }
}
