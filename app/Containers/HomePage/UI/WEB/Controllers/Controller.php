<?php

namespace App\Containers\HomePage\UI\WEB\Controllers;

use App\Containers\HomePage\UI\WEB\Requests\CreateHomePageRequest;
use App\Containers\HomePage\UI\WEB\Requests\DeleteHomePageRequest;
use App\Containers\HomePage\UI\WEB\Requests\GetAllHomePagesRequest;
use App\Containers\HomePage\UI\WEB\Requests\FindHomePageByIdRequest;
use App\Containers\HomePage\UI\WEB\Requests\UpdateHomePageRequest;
use App\Containers\HomePage\UI\WEB\Requests\StoreHomePageRequest;
use App\Containers\HomePage\UI\WEB\Requests\EditHomePageRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

/**
 * Class Controller
 *
 * @package App\Containers\HomePage\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllHomePagesRequest $request
     */
    public function index(GetAllHomePagesRequest $request)
    {
      $data['properties']=$this->getMainProperties($request);
        $categoriesOnlyRoot = $data['properties']->categories->where('parent_id', 0);
      return view('homepage::index', compact('categoriesOnlyRoot','data'));
    }

    /**
     * Show one entity
     *
     * @param FindHomePageByIdRequest $request
     */
    public function show(FindHomePageByIdRequest $request)
    {
        $category= Apiato::call('Category@GetAllCategoriesAction', [$request]);
        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateHomePageRequest $request
     */
    public function create(CreateHomePageRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreHomePageRequest $request
     */
    public function store(StoreHomePageRequest $request)
    {
        $homepage = Apiato::call('HomePage@CreateHomePageAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditHomePageRequest $request
     */
    public function edit(EditHomePageRequest $request)
    {
        $homepage = Apiato::call('HomePage@GetHomePageByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateHomePageRequest $request
     */
    public function update(UpdateHomePageRequest $request)
    {
        $homepage = Apiato::call('HomePage@UpdateHomePageAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteHomePageRequest $request
     */
    public function delete(DeleteHomePageRequest $request)
    {
         $result = Apiato::call('HomePage@DeleteHomePageAction', [$request]);

         // ..
    }
	
	    public function search(GetAllHomePagesRequest $request){


            $data['properties']=$this->getMainProperties($request);
      $data['categoriesOnlyRoot'] = $data['categories']->where('parent_id', 0);
        $data['spacial_customer_id']=null;
        $data['title']="Додати товар";
        $data['user']=(\Auth::user()) ? \Auth::user() : null;
        $data['category_name']='Результаты Вашего поиска';
        $data['keywords']="Ukrainian industry platform";
        $data['description']="Ukrainian industry platform";

        $currentPage = $request->input('page');

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
      $q= \App\Containers\Ad\Models\Ad::with('pictures')->where(function ($query) use($request) {
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
$data['pricesLimits']=$qr->select( \DB::raw("MAX(ads.price) AS max_price"), \DB::raw("MIN(ads.price) AS min_price"))->get()->toArray();
if($data['pricesLimits'][0]['max_price']==$data['pricesLimits'][0]['min_price']){
    $data['pricesLimits'][0]['min_price']=0;
}

		
		
		
		
		
		
        // Make sure that you call the static method currentPageResolver()
        // before querying users
        \Illuminate\Pagination\Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
		

		    $administrative=$request->input('administrative');
            $uk_only=$request->input('uk_only');

		      $messages=$q->where(function ($query) use($from,$to) {
      if(!empty($from) && !empty($to)){
          $query->where('price','>=',$from)
              ->where('price','<=',$to);
      }
  })->where(function ($query) use($request){
            $query->where('message', 'like', '%' . $request->input('search_string') . '%')
                ->orWhere('title', 'like', '%' . $request->input('search_string') . '%');
        })->where('city', 'like', '%' . $request->input('city') . '%')
                  ->where(function($query) use ($administrative,$uk_only)  {
                      if(isset($administrative)&&$administrative!=0 && $uk_only=="checked") {
                          $query->where('administrative',$administrative);
                      }
                     elseif($uk_only=="checked"){
                          $query->whereIn('administrative',['England','Nothern Irland','Scotland','Wales']);
                      }
                  })



            ->where('active',1)


          ->paginate(5);

		
/* 		
		
		
		
        $messages= \App\Containers\Ad\Models\Ad::where(function ($query) use($request){
            $query->where('message', 'like', '%' . $request->input('search_string') . '%')
                ->orWhere('title', 'like', '%' . $request->input('search_string') . '%');
        })->where('city',$request->input('city'))->where('administrative',$request->input('administrative'))
            ->where('active',1)
            ->paginate(3); */
        $data['products']=$messages;
        $data['search_string']=$request->input('search_string');
        $data['city']=$request->input('city');
        $data['administrative']=$request->input('administrative');
        return view('category::catalog',$data);

    }

    public function categoryLink(GetAllHomePagesRequest $request){

	        $isFinal=\App\Containers\Site\Models\ProductCategory::where('parent_id',$request->input('id'))->first();
	        return json_encode(['response'=>(!$isFinal) ? 'redirect' : $isFinal]);
    }
	
	
}
