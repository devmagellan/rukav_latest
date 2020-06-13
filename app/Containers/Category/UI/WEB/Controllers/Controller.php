<?php

namespace App\Containers\Category\UI\WEB\Controllers;

use App\Containers\Category\UI\WEB\Requests\CreateCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\DeleteCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\GetAllCategoriesRequest;
use App\Containers\Category\UI\WEB\Requests\FindCategoryByIdRequest;
use App\Containers\Category\UI\WEB\Requests\UpdateCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\StoreCategoryRequest;
use App\Containers\Category\UI\WEB\Requests\EditCategoryRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Category\UI\WEB\Controllers
 */
class Controller extends WebController
{
  /**
   * Show all entities
   *
   * @param GetAllCategoriesRequest $request
   */
  public function index(GetAllCategoriesRequest $request, $id)
  {
    //$categories = Apiato::call('Category@GetAllCategoriesAction', [$request]);
      $categories= Apiato::call('Site@GetAllProductCategoriesAction', [$request]);
      $categoriesOnlyRoot = $categories->where('parent_id', 0);
      $user=null;
      if(\Auth::user()){
          $user=\App\Containers\User\Models\User::where('id',\Auth::user()->id)->first();}


      $currentPage = $request->input('page');
      $from=$request->input('price_start');
      $to=$request->input('price_end');
      $sort_by_date=$request->input('sort_by_date');
      // Make sure that you call the static method currentPageResolver()
      // before querying users
      \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
          return $currentPage;
      });

      '';
      $q= \App\Containers\Ad\Models\Ad::where('category_id',$id)->with('pictures')->where(function ($query) use($request) {
          $query->where('message', 'like', '%' . $request->input('search_string') . '%')
              ->orWhere('title', 'like', '%' . $request->input('search_string') . '%');
      })
          ->where(function ($query) use($request) {
              $query->where('message', 'like', '%' . $request->input('rubric_search') . '%')
                  ->orWhere('title', 'like', '%' . $request->input('rubric_search') . '%');
          })


          ->where('active',1);

      if($request->input('sort_by_date')=='low_to_high'){
          dump('low_to_high');
          $q->orderBy('created_at');
      }
      if($request->input('sort_by_date')=='high_to_low'){
          dump('high_to_low');
          $q->orderByDesc('created_at');
      }



      $qr=clone($q);
$pricesLimits=$qr->select( \DB::raw("MAX(ads.price) AS max_price"), \DB::raw("MIN(ads.price) AS min_price"))->get()->toArray();
if($pricesLimits[0]['max_price']==$pricesLimits[0]['min_price']){
    $pricesLimits[0]['min_price']=0;
}
      $products=$q->where(function ($query) use($from,$to) {
      if(!empty($from) && !empty($to)){
          $query->where('price','>=',$from)
              ->where('price','<=',$to);
      }
  })
          /*->where('city',$request->input('city'))->where('administrative',$request->input('administrative'))*/

          ->paginate(5);
    //$products=\App\Containers\Ad\Models\Ad::where('category_id',$id)->with('pictures')->paginate(4);
      return view('category::catalog',  compact('products','categoriesOnlyRoot', 'categories','user','pricesLimits'));
   // return $link . ' ' . $id;
  }

  /**
   * Show one entity
   *
   * @param FindCategoryByIdRequest $request
   */
  public function show(FindCategoryByIdRequest $request)
  {
    $category = Apiato::call('Category@FindCategoryByIdAction', [$request]);

    // ..
  }

  /**
   * Create entity (show UI)
   *
   * @param CreateCategoryRequest $request
   */
  public function create(CreateCategoryRequest $request)
  {
    // ..
  }

  /**
   * Add a new entity
   *
   * @param StoreCategoryRequest $request
   */
  public function store(StoreCategoryRequest $request)
  {
    $category = Apiato::call('Category@CreateCategoryAction', [$request]);

    // ..
  }

  /**
   * Edit entity (show UI)
   *
   * @param EditCategoryRequest $request
   */
  public function edit(EditCategoryRequest $request)
  {
    $category = Apiato::call('Category@GetCategoryByIdAction', [$request]);

    // ..
  }

  /**
   * Update a given entity
   *
   * @param UpdateCategoryRequest $request
   */
  public function update(UpdateCategoryRequest $request)
  {
    $category = Apiato::call('Category@UpdateCategoryAction', [$request]);

    // ..
  }

  /**
   * Delete a given entity
   *
   * @param DeleteCategoryRequest $request
   */
  public function delete(DeleteCategoryRequest $request)
  {
    $result = Apiato::call('Category@DeleteCategoryAction', [$request]);

    // ..
  }
}
