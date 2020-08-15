<?php

namespace App\Containers\Filter\UI\WEB\Controllers;

use App\Containers\Filter\UI\WEB\Requests\CreateFilterRequest;
use App\Containers\Filter\UI\WEB\Requests\DeleteFilterRequest;
use App\Containers\Filter\UI\WEB\Requests\GetAllFiltersRequest;
use App\Containers\Filter\UI\WEB\Requests\FindFilterByIdRequest;
use App\Containers\Filter\UI\WEB\Requests\UpdateFilterRequest;
use App\Containers\Filter\UI\WEB\Requests\StoreFilterRequest;
use App\Containers\Filter\UI\WEB\Requests\EditFilterRequest;
use App\Containers\StaticPage\UI\WEB\Requests\GetAllStaticPagesRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Filter\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllFiltersRequest $request
     */
    public function index(GetAllFiltersRequest $request)
    {
      $data['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
      return view('filter::admin.index', $data);
    }

  public function postData(GetAllFiltersRequest $request)
  {
    $data['filters'] = Apiato::call('Filter@GetAllFiltersAction', [$request]);
    return view('filter::admin.table', $data);
    // ..
  }
    /**
     * Show one entity
     *
     * @param FindFilterByIdRequest $request
     */
    public function show(FindFilterByIdRequest $request)
    {
        $filter = Apiato::call('Filter@FindFilterByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateFilterRequest $request
     */
    public function create(CreateFilterRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreFilterRequest $request
     */
    public function store(StoreFilterRequest $request)
    {
        $filter = Apiato::call('Filter@CreateFilterAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditFilterRequest $request
     */
    public function edit(EditFilterRequest $request)
    {
        $filter = Apiato::call('Filter@GetFilterByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateFilterRequest $request
     */
    public function update(UpdateFilterRequest $request)
    {
        $filter = Apiato::call('Filter@UpdateFilterAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteFilterRequest $request
     */
    public function delete(DeleteFilterRequest $request)
    {
         $result = Apiato::call('Filter@DeleteFilterAction', [$request]);

         // ..
    }

  public function updateFilterStatus(GetAllFiltersRequest $request){

    $status=($request->input('status')=='true') ? 1 :0;

    $companySlider['values']=['active'=>$status ];
    $entityClass=\App\Containers\Filter\Models\Filter::class;
    $companySlider['attributes']['id']=(null!=($request->input('id')) && !empty($request->input('id'))) ? $request->input('id') : null;
    return call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);
  }

  public function postDelete(GetAllFiltersRequest  $request){
    $message=\App\Containers\Filter\Models\Filter::where('id',$request->input('filter_id'))->delete();
    return \Response::json(['result'=>'success']);

  }

  public function postSave(GetAllFiltersRequest $request){
    $companySlider['values']=[
      'name'=>$request->input('filter_name'),
      'active'=>($request->input('active')=='true') ? 1 : 0,
      ];
    $entityClass=\App\Containers\Filter\Models\Filter::class;
    $companySlider['attributes']['id']=($request->input('filter_id')&& $request->input('filter_id')!=0) ? $request->input('filter_id') : null;
    return call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);

  }

  public function getFilters(GetAllFiltersRequest $request){
      $data['filters']= \App\Containers\Filter\Models\Filter::get();
    $data['groups']=  \App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->with('filter')->get();
    return view('filter::admin.groups', $data);
  }
  public function filtersAdd(GetAllFiltersRequest $request){
    \App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->delete();
    $params = array();
    parse_str($request->input('filters'), $params);
       foreach($params['filters'] as $filter){
        $present=\App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->where('filter_id',$filter)->first();
        $companySlider['values']=[
          'category_id'=>$request->input('cat_id'),
          'filter_id'=>$filter,
        ];
        $entityClass=\App\Containers\Filter\Models\CategoryFilter::class;
        $companySlider['attributes']['id']=($present) ? $present->id : null;
        call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);
      }
return json_encode(['result'=>'success']);
  }


  public function searchForFilters(GetAllFiltersRequest $request){
      $data['filters']=\App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->with('filter')->get();
      return view('ad::filters.table', $data);
  }
}
