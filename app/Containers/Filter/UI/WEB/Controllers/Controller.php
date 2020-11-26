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

    public function indexFilterDeals(GetAllFiltersRequest $request)
    {
        $data['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
        return view('filter::admin.filter_deals.index', $data);
    }

    public function postDataFilterDeals(GetAllFiltersRequest $request)
    {
        $data['filters'] = Apiato::call('Filter@GetAllFilterDealsAction', [$request]);
        return view('filter::admin.filter_deals.table', $data);
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

    public function postDeleteFilterDeals(GetAllFiltersRequest  $request){
        $message=\App\Containers\Filter\Models\FilterDeals::where('id',$request->input('filter_id'))->delete();
        return \Response::json(['result'=>'success']);

    }

  public function postSave(GetAllFiltersRequest $request){
    $values=[];
      if(null!=$request->input('values')){

        foreach($request->input('values') as $value){
          $values[]=$value['value'];
        }
      }
    $companySlider['values']=[
      'name'=>$request->input('filter_name'),
      'active'=>($request->input('active')=='true') ? 1 : 0,
      'format'=>$request->input('format'),
      'default_value'=>$request->input('default_value'),
      'values'=>json_encode($values),
      ];
    $entityClass=\App\Containers\Filter\Models\Filter::class;
    $companySlider['attributes']['id']=($request->input('filter_id')&& $request->input('filter_id')!=0) ? $request->input('filter_id') : null;
    return call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);

  }

    public function postSaveFilterDeals(GetAllFiltersRequest $request){
        $companySlider['values']=[
            'name'=>$request->input('filter_name'),
            'active'=>($request->input('active')=='true') ? 1 : 0,
        ];
        $entityClass=\App\Containers\Filter\Models\FilterDeals::class;
        $companySlider['attributes']['id']=($request->input('filter_id')&& $request->input('filter_id')!=0) ? $request->input('filter_id') : null;
        return call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);

    }

  public function getFilters(GetAllFiltersRequest $request){
      $data['filters']= \App\Containers\Filter\Models\Filter::get();
    $data['groups']=  \App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->with('filter')->get();
    return view('filter::admin.groups', $data);
  }

    public function getFilterDeals(GetAllFiltersRequest $request){
        $data['filters']= \App\Containers\Filter\Models\FilterDeals::get();
        $data['group_deals']=  \App\Containers\Filter\Models\CategoryFilterDeals::where('category_id',$request->input('cat_id'))->with('filter')->get();
        return view('filter::admin.groups_deals', $data);
    }

  public function filtersAdd(GetAllFiltersRequest $request){


    $params = array();
    \Log::info('Filtersinput'.$request->input('filters'));
    if($request->input('filters')){
      \Log::info('Filtersinput2'.$request->input('filters'));
    parse_str($request->input('filters'), $params);
      \Log::info('FilterDeals',$params);
  if(array_key_exists('filters',$params)){
    \App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->delete();
       foreach($params['filters'] as $filter){
        $present=\App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->where('filter_id',$filter)->first();
        $companySlider['values']=[
          'category_id'=>$request->input('cat_id'),
          'filter_id'=>$filter,
        ];
        $entityClass=\App\Containers\Filter\Models\CategoryFilter::class;
        $companySlider['attributes']['id']=($present) ? $present->id : null;
        call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);
      }}
  }
    else{
      \App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->delete();
      \Log::info('FiltersCatID'.$request->input('cat_id'));

    }
    if(array_key_exists('filter_deals',$params)){
      \App\Containers\Filter\Models\CategoryFilterDeals::where('category_id',$request->input('cat_id'))->delete();
      foreach($params['filter_deals'] as $filter){
          $present=\App\Containers\Filter\Models\CategoryFilterDeals::where('category_id',$request->input('cat_id'))->where('filter_id',$filter)->first();
          $companySlider['values']=[
              'category_id'=>$request->input('cat_id'),
              'filter_id'=>$filter,
          ];
          $entityClass=\App\Containers\Filter\Models\CategoryFilterDeals::class;
          $companySlider['attributes']['id']=($present) ? $present->id : null;
          call_user_func("{$entityClass}::query")->updateOrCreate($companySlider['attributes'], $companySlider['values']);
      }}
return json_encode(['result'=>'success']);
  }


  public function searchForFilters(GetAllFiltersRequest $request){
      $data['filters']=\App\Containers\Filter\Models\CategoryFilter::where('category_id',$request->input('cat_id'))->with('filter')->get();
      return view('ad::filters.table', $data);
  }

    public function searchForFilterDeals(GetAllFiltersRequest $request){
        $data['filters']=\App\Containers\Filter\Models\CategoryFilterDeals::where('category_id',$request->input('cat_id'))->with('filter')->get();
        return view('ad::filters.table_deals', $data);
    }

    public function filterGet(GetAllFiltersRequest $request){
      $filter=\App\Containers\Filter\Models\Filter::where('id',$request->input('id'))->first();

       $current_values=\App\Containers\Filter\Models\AddFilter::where('filter_id',$filter->id)->get();

      return json_encode(['result'=>'success','filter'=>$filter,'current_values'=>$current_values]);
    }
}
