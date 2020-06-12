<?php

namespace App\Containers\Ad\UI\WEB\Controllers;

use App\Containers\Ad\UI\WEB\Requests\CreateAdRequest;
use App\Containers\Ad\UI\WEB\Requests\DeleteAdRequest;
use App\Containers\Ad\UI\WEB\Requests\GetAllAdsRequest;
use App\Containers\Ad\UI\WEB\Requests\GetAllAdsDataTableRequest;
use App\Containers\Ad\UI\WEB\Requests\FindAdByIdRequest;
use App\Containers\Ad\UI\WEB\Requests\UpdateAdRequest;
use App\Containers\Ad\UI\WEB\Requests\StoreAdRequest;
use App\Containers\Ad\UI\WEB\Requests\EditAdRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Http\Response;
use MongoDB\Driver\Session;
use App\Ship\Parents\Requests\Request;
use App\Containers\Connect\UI\WEB\Requests\CreateConnectRequest;

/**
 * Class Controller
 *
 * @package App\Containers\Ad\UI\WEB\Controllers
 */
class Controller extends WebController
{
  /**
   * Show all entities
   *
   * @param GetAllAdsDataTableRequest $request
   */
  public function index(GetAllAdsDataTableRequest $request)
  {

    $result['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
    //$users = Apiato::call('Ad@GetAllAdsDataTableAction', [$request]);
    $result['main_rubrics'] = Apiato::call('Site@GetProductCategoriesByParentIdAction', [0], [0]);
    return view('ad::index', $result);
  }

  /**
   * Show one entity
   *
   * @param FindAdByIdRequest $request
   */
  public function show(FindAdByIdRequest $request)
  {
    $user=null;
    if(\Auth::user()){
          $user=\App\Containers\User\Models\User::where('id',\Auth::user()->id)->first();}
    $ad = Apiato::call('Ad@FindAdByIdAction', [$request]);
    $receiver=$ad->sender;
    //TODO эту переменную сделать в сервис провайдере
    $categories = Apiato::call('Site@GetAllProductCategoriesAction', [$request]);
    $breadcrumbsArray=\App\Containers\Site\Services\ProductCategoryService::BreadCrumbs($ad->category_id);
    return view('ad::ads.single-ads', compact('categories', 'ad','breadcrumbsArray','receiver','user'));
  }

  /**
   * Create entity (show UI)
   *
   * @param CreateAdRequest $request
   */
  public function create(CreateAdRequest $request)
  {
    //TODO эту переменную сделать в сервис провайдере
    $categories = Apiato::call('Site@GetAllProductCategoriesAction', [$request]);
    $categoriesOnlyRoot = $categories->where('parent_id', 0);
    $locations=\App\Containers\Settings\Models\Places::where('parent_id',0)->get();
    return view('ad::ads.form-add-ads', compact('categories', 'categoriesOnlyRoot','locations'));
  }

  public function searchRubrics(FindAdByIdRequest $request)
  {
    $categories = Apiato::call('Site@GetAllProductCategoriesAction', [$request]);
    $category = $categories->where('id', $request->categoryId)->first();
    if($category->childrenCategories->count()){
      foreach ($category->childrenCategories as $categoryChild){
        echo '<li data-category_id="'.$categoryChild->id.'">'.$categoryChild->name.'</li>';
      }
    }else{
      return response(['message'=>'not child category'], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
  }

  /**
   * Add a new entity
   *
   * @param StoreAdRequest $request
   */
  public function store(StoreAdRequest $request)
  {
    $ad = Apiato::call('Ad@CreateAdAction', [$request]);
    if ($ad) {
      $request->session()->flash('infoAd', true);
    }
    return back();
  }


  /**
   * Edit entity (show UI)
   *
   * @param EditAdRequest $request
   */
  public function edit(EditAdRequest $request)
  {
    $ad = Apiato::call('Ad@GetAdByIdAction', [$request]);

    // ..
  }

  /**
   * Update a given entity
   *
   * @param UpdateAdRequest $request
   */
  public function update(UpdateAdRequest $request)
  {
    $ad = Apiato::call('Ad@UpdateAdAction', [$request]);

    // ..
  }

  /**
   * Delete a given entity
   *
   * @param DeleteAdRequest $request
   */
  public function delete(DeleteAdRequest $request)
  {
    $result = Apiato::call('Ad@DeleteAdAction', [$request]);

    // ..
  }

  public function postData(GetAllAdsRequest $request)
  {
    $result['messages'] = Apiato::call('Ad@GetAllAdsAction', [$request]);
    return view('ad::table', $result);
    // ..
  }

  public function adsByGroupDatatables(GetAllAdsDataTableRequest $request)
  {

    $ads = \App\Containers\Ad\Models\Ad::get();
    //var_dump($ads);
// The columns variable is used for sorting
    $columns = array(
      // datatable column index => database column name

      0 => 'id',
      1 => 'status',
      2 => 'title',
      3 => 'message',
      4 => 'message',
      5 => 'message',
      6 => 'email',
      7 => 'title',
      8 => 'message',
      9 => 'id',
      10 => 'title',
      11 => 'title',
      12 => 'id',
      13 => 'message',
      14 => 'message'
    );
    //Getting the data

    $totalData = $ads->count();            //Total record
    $totalFiltered = $totalData;      // No filter at first so we can assign like this
    // Here are the parameters sent from client for paging
    $start = $request->input('start');           // Skip first start records
    $length = $request->input('length');   //  Get length record from start
    /*
     * Where Clause
     */

    if ($request->has('search')) {


      $statement = "";
      $items = $request->input('columns');
      $ads = \App\Containers\Ad\Models\Ad::where(function ($query) use ($items, $columns) {
        foreach ($items as $key => $column) {
          if (null != $column['search']['value']) {
            if ($key == 1) {
              $namesArray = \App\Containers\Ad\Models\AdStatus::where('name', 'LIKE', "%" . $column['search']['value'] . "%")
                ->get();
              $statusArray = [];
              foreach ($namesArray as $status) {
                $statusArray[] = $status->id;
              }
              $query->whereIn('status', $statusArray);
            } elseif ($key == 5) {
              $namesArray = \App\Containers\User\Models\User::where('name', 'LIKE', "%" . $column['search']['value'] . "%")->
              orWhere('sername', 'LIKE', "%" . $column['search']['value'] . "%")
                ->get();
              $usersArray = [];
              foreach ($namesArray as $user) {
                $usersArray[] = $user->id;
              }
              $query->whereIn('sender', $usersArray);
            } elseif ($key == 6) {
              $namesArray = \App\Containers\User\Models\User::where('email', 'LIKE', "%" . $column['search']['value'] . "%")
                ->get();
              $usersArray = [];
              foreach ($namesArray as $user) {
                $usersArray[] = $user->id;
              }
              $query->whereIn('sender', $usersArray);
            } elseif ($key == 8) {
              $namesArray = \App\Containers\Site\Models\ProductCategory::where('name', 'LIKE', "%" . $column['search']['value'] . "%")
                ->get();
              $categoryArray = [];
              foreach ($namesArray as $category) {
                $categoryArray[] = $category->id;
              }
              $query->whereIn('category_id', $categoryArray);
            } else {
              $query->where($columns[$key], 'LIKE', "%" . $column['search']['value'] . "%");
            }

          }
        }
      })->get();
    }
    /*
      * Order By
      */
    if ($request->has('order')) {
      if ($request->input('order.0.column') != '') {
        $orderColumn = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
        \App\Containers\Ad\Models\Ad::orderBy($columns [intval($orderColumn)], $orderDirection)->get();
      }
    }
    // Get the real count after being filtered by Where Clause
    $totalFiltered = $ads->count();
    // Data to client
    $jobs = $ads->skip($start)->take($length);

    /*
     * Execute the query
     */

    /*
    * We built the structure required by BootStrap datatables
    */
    $data = array();
    foreach ($ads as $ad) {
      switch ($ad->status) {
        case 1:
          $status = '<button type="button" class="btn btn-success btn-xs btn-block waves-effect waves-themed">Опубликовано</button>';
          break;
        case 2:
          $status = '<button type="button" class="btn btn-warning btn-xs btn-block waves-effect waves-themed">На утверждении</button>';
          break;
        case 3:
          $status = '<button type="button" class="btn btn-secondary btn-xs btn-block waves-effect waves-themed">Черновик</button>';
          break;
        case 4:
          $status = '<button type="button" class="btn btn-danger btn-xs btn-block waves-effect waves-themed">Отвергнуто</button>';
          break;
        case 5:
          $status = '<button type="button" class="btn btn-info btn-xs btn-block waves-effect waves-themed">Просрочено</button>';
          break;
      }
      $rubrik = \App\Containers\Site\Models\ProductCategory::where('id', $ad->category_id)->first();
      $nestedData = array();
      $nestedData [0] = '<div><div style="display:inline-block;"><input type="hidden" class="ad_id" value="' . $ad->id . '"><input class="ad_check" type="checkbox" value="0"></div>
 <span class="photoAdsModalOpen" style="display:inline-block;cursor:pointer" ><i class="fal fa-image"></i></span></div>';
      $nestedData [1] = $status;
      $nestedData [2] = $ad->title;
      $nestedData [3] = '<span style="font-size:9px">' . mb_strimwidth($ad->message, 0, 30, "...") . '</span>';
      $nestedData [4] = $ad->sender;
      $nestedData [5] = $ad->getSender->name . ' ' . $ad->getSender->sername;
      $nestedData [6] = $ad->getSender->email;
      $nestedData [7] = ($ad->phone) ? $ad->phone : 'нет';
      $nestedData [8] = $rubrik->name;
      $nestedData [9] = 'second';
      $nestedData [10] = 'third';
      $nestedData [11] = ($ad->updated_at) ? $ad->updated_at->toDateTimeString() : $ad->created_at->toDateTimeString();
      $nestedData [12] = $ad->id;
      $nestedData [13] = $ad->updated_at;
      $nestedData [14] = $ad->id;
      $data [] = $nestedData;
    }
    /*
    * This below structure is required by Datatables
    */
    $tableContent = array(
      "draw" => intval($request->input('draw')), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
      "recordsTotal" => intval($totalData), // total number of records
      "recordsFiltered" => intval($totalFiltered), // total number of records after searching, if there is no searching then totalFiltered = totalData
      "data" => $data
    );
    return $tableContent;
  }

  public function postEdit(EditAdRequest $request)
  {

    var_dump($request->input('status'));
    var_dump($request->input('ids'));


    if ($request->input('status') != 0) {
      $update = ['status' => $request->input('status')];
      \App\Containers\Ad\Models\Ad::whereIn('id', $request->input('ids'))->update($update);
    }

    if ($request->input('author') != 0) {
      $update = ['sender' => $request->input('author')];
      \App\Containers\Ad\Models\Ad::whereIn('id', $request->input('ids'))->update($update);
    }
    if (null != ($request->input('new_rubric'))) {
      $update = ['category_id' => $request->input('new_rubric')];
      \App\Containers\Ad\Models\Ad::whereIn('id', $request->input('ids'))->update($update);
    }
  }

  public function postDelete(DeleteAdRequest $request)
  {
    \App\Containers\Ad\Models\Ad::whereIn('id', $request->input('ids'))->delete();

  }


  public function showPhotoAdsModal(GetAllAdsDataTableRequest $request)
  {
    // var_dump($request->input('add_id'));
    $result['ads'] = \App\Containers\Ad\Models\Ad::where('id', $request->input('add_id'))->with('pictures')->first();
    return view('ad::modal_photo', $result);

  }


    public function setWishListStatus(GetAllAdsDataTableRequest $request){
      var_dump($request->input('active'));
        $result=\App\Containers\Ad\Models\Wishlist::where('message_id',$request->input('id'))->where('user_id',\Auth::user()->id)->first();
        $message=[
            'active'=>$request->input('active'),
            'user_id'=>\Auth::user()->id,
            'message_id'=>$request->input('id'),
        ];
        if(null!=$result ){
            \App\Containers\Ad\Models\Wishlist::where('message_id',$request->input('id'))->where('user_id',\Auth::user()->id)->update($message);
        }else{
            \App\Containers\Ad\Models\Wishlist::where('message_id',$request->input('id'))->where('user_id',\Auth::user()->id)->insert($message);
        }
    }

}
