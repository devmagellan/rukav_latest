<?php

namespace App\Containers\Ad\UI\WEB\Controllers;

use App\Containers\Ad\Models\BritainRegion;
use App\Containers\Ad\UI\WEB\Requests\CreateAdRequest;
use App\Containers\Ad\UI\WEB\Requests\DeleteAdRequest;
use App\Containers\Ad\UI\WEB\Requests\GetAllAdsRequest;
use App\Containers\Ad\UI\WEB\Requests\GetAllAdsDataTableRequest;
use App\Containers\Ad\UI\WEB\Requests\FindAdByIdRequest;
use App\Containers\Ad\UI\WEB\Requests\UpdateAdRequest;
use App\Containers\Ad\UI\WEB\Requests\StoreAdRequest;
use App\Containers\Ad\UI\WEB\Requests\EditAdRequest;
use App\Containers\Filter\UI\WEB\Requests\GetAllFiltersRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Http\Response;
use MongoDB\Driver\Session;
use App\Ship\Parents\Requests\Request;
use App\Containers\Connect\UI\WEB\Requests\CreateConnectRequest;
use App\Containers\HomePage\Services\GlobalService;

/**
 * Class Controller
 *
 * @package App\Containers\Ad\UI\WEB\Controllers
 */
class Controller extends WebController
{

    public $result;
  public $resultCat;

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
    $result['input_client_id']=$request->input('client_id');
    return view('ad::index', $result);
  }

  /**
   * Show one entity
   *
   * @param FindAdByIdRequest $request
   */
  public function show(FindAdByIdRequest $request)
  {
    $ad = Apiato::call('Ad@FindAdByIdAction', [$request]);
    $receiver=$ad->sender;
    //TODO эту переменную сделать в сервис провайдере
    $data['properties']=GlobalService::getMainProperties($request)['categories'];
    $categoriesOnlyRoot = GlobalService::getMainProperties($request)['categoriesOnlyRoot'];
    $breadcrumbsArray=\App\Containers\Site\Services\ProductCategoryService::BreadCrumbs($ad->category_id);
    \App\Containers\Ad\Models\Ad::where('id',$ad->id)->update(['view_counter'=>($ad->view_counter) ? $ad->view_counter+1 : 1]);
    $ad = Apiato::call('Ad@FindAdByIdAction', [$request]);
    return view('ad::ads.single-ads', compact( 'ad','breadcrumbsArray','categoriesOnlyRoot','receiver','data'));
  }

  /**
   * Create entity (show UI)
   *
   * @param CreateAdRequest $request
   */
  public function create(CreateAdRequest $request)
  {
    //TODO эту переменную сделать в сервис провайдере
    $data['properties']=GlobalService::getMainProperties($request)['categories'];
    $categoriesOnlyRoot = GlobalService::getMainProperties($request)['categoriesOnlyRoot'];
    $locations=\App\Containers\Ad\Models\BritainRegion::where('parent_id',0)->get();
    $filterDeals=\App\Containers\Filter\Models\FilterDeals::get();
	  \Log::info('AdPhotosForget');
	  if(!\Session::get('ad')){
		\Session::forget('ad_photos');}
    return view('ad::ads.form-add-ads', compact( 'categoriesOnlyRoot','locations','data','filterDeals'));
  }

  public function adminCreate(CreateAdRequest $request,$user_id){
    $result['user_id']=$user_id;
    $data['properties']=GlobalService::getMainProperties($request)['categories'];
    $result['categoriesOnlyRoot'] = GlobalService::getMainProperties($request)['categoriesOnlyRoot'];
    $result['locations']=\App\Containers\Ad\Models\BritainRegion::where('parent_id',0)->get();
      $result['filterDeals']=\App\Containers\Filter\Models\FilterDeals::get();
    $result['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
    //$users = Apiato::call('Ad@GetAllAdsDataTableAction', [$request]);
    $result['main_rubrics'] = Apiato::call('Site@GetProductCategoriesByParentIdAction', [0], [0]);
    return view('ad::admin.add.index', $result);
  }

    public function adminAddEdit(CreateAdRequest $request,$add_id){
        $data['properties']=GlobalService::getMainProperties($request)['categories'];
        $result['categoriesOnlyRoot'] = GlobalService::getMainProperties($request)['categoriesOnlyRoot'];
        $result['locations']=\App\Containers\Ad\Models\BritainRegion::where('parent_id',0)->get();
        $result['filterDeals']=\App\Containers\Filter\Models\FilterDeals::get();
        $result['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
        //$users = Apiato::call('Ad@GetAllAdsDataTableAction', [$request]);
        $result['ad'] = \App\Containers\Ad\Models\Ad::where('id',$add_id)->first();

        $this->getAllParentsCategoriesRecursive($result['ad']->category_id);
        if(is_array($this->resultCat)){
            \Log::info('kapec2');
            foreach($this->resultCat as $d){
                $res[]=$d;
            }
        }
        //dd(array_reverse($res));
        $result['category']='';
        foreach(array_reverse($res) as $cat){
            $result['category'].='/'.$cat->name;
        }
        $real=\App\Containers\Site\Models\ProductCategory::where('id',$result['ad']->category_id)->first();
        $result['category'].='/'.$real->name;

        $result['main_rubrics'] = Apiato::call('Site@GetProductCategoriesByParentIdAction', [0], [0]);
        return view('ad::admin.add.edit', $result);
    }

  public function searchRubrics(FindAdByIdRequest $request)
  {
      $data['properties']=$this->getMainProperties($request);
    $category = $data['properties']->categories->where('id', $request->categoryId)->first();
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
      \Log::info('ZASHLI STORE',array($request));

   if($request->save==1){
    $ad = Apiato::call('Ad@CreateAdAction', [$request]);
    \Log::info('AD1',array($ad));
    if ($ad) {

      $request->session()->flash('infoAd', true);

      \Session::forget('ad_photos');
        return back()->with('success', 'Ваше объявление успешно добавлено ! Благодарим за сотрудничество');
    }
      }
      else{
          $ad = Apiato::call('Ad@CreateAdAction', [$request]);
          \Log::info('AD2',array($ad));
          if ($ad) {
              $request->session()->flash('infoAd', true);
              $ad=\App\Containers\Ad\Models\Ad::where('id',$ad->id)->with('filterDeals')->first();
              $this->getAllParentsCategoriesRecursive($ad->category_id);
              $catsString='';
              foreach(array_reverse($this->resultCat) as $value){

                  $catsString.=$value->name;
                  $catsString.='/';
              }
              $catsString.=\App\Containers\Site\Models\ProductCategory::where('id',$ad->category_id)->first()->name;



              return back()->with('success', 'Просмотр объявления')->with('ad',$ad)->with('catsString',$catsString);
          }
      }
     return back();
  }


  public function savePreview($id){
      \App\Containers\Ad\Models\Ad::where('id',$id)->update(['is_tmp'=>0]);
      return redirect('/private_cabinet/screen/myads');
  }

  /**
   * Edit entity (show UI)
   *
   * @param EditAdRequest $request
   */
  public function edit(EditAdRequest $request,$id)
  {

    //TODO эту переменную сделать в сервис провайдере
      $data['properties']=GlobalService::getMainProperties($request)['categories'];
      $categoriesOnlyRoot = GlobalService::getMainProperties($request)['categoriesOnlyRoot'];
    $locations=\App\Containers\Ad\Models\BritainRegion::where('parent_id',0)->get();
    $ad=\App\Containers\Ad\Models\Ad::where('id',$id)->with('pictures')->first();
    $this->getAllParentsCategoriesRecursive($ad->category_id);
    if(is_array($this->resultCat)){
      \Log::info('kapec');
      foreach($this->resultCat as $d){
        $res[]=$d;
      }
}
    //dd(array_reverse($res));
    $category='';
    foreach(array_reverse($res) as $cat){
      $category.='/'.$cat->name;
    }
    $real=\App\Containers\Site\Models\ProductCategory::where('id',$ad->category_id)->first();
    $category.='/'.$real->name;
         return view('ad::ads.form-edit-ads', compact( 'categoriesOnlyRoot','locations','data','ad','category'));

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

    if(null!=$request->input('client_id')) {
      $ads = \App\Containers\Ad\Models\Ad::where('sender',$request->input('client_id'))->get();
    }
    else{
      $ads = \App\Containers\Ad\Models\Ad::get();
    }

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
      14 => 'title',
      15 => 'title',
      16 => 'title',
      17 => 'email',
      18 => 'title',
      19 => 'title',
      20 => 'title',
      21 => 'title',
	   22 => 'title',
	   23 => 'title',
    );
    //Getting the data

    $totalData = $ads->count();            //Total record
    $totalFiltered = $totalData;      // No filter at first so we can assign like this
    // Here are the parameters sent from client for paging
    $start = $request->input('start');           // Skip first start records
    $length = $request->input('length')+1;   //  Get length record from start
    /*
     * Where Clause
     */
\Log::info('TextLengthCol'.intval($request->input('col')));
    \Log::info('TextLengthArray',$request->all());
    if ($request->has('search')) {


      $statement = "";
      $items = $request->input('columns');
      $ads = \App\Containers\Ad\Models\Ad::where('is_tmp',0)
        ->when(request('client_id') !=null, function ($q) {
          return $q->where('sender',  request('client_id'));
        })->
      where(function ($query) use ($items, $columns) {
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
            }
            elseif ($key == 14) {

              \Log::info('$namesArray0'.$column['search']['value']);
              $namesArray = \App\Containers\User\Models\User::where('email', 'LIKE', "%" . $column['search']['value'] . "%")
                ->get();
                \Log::info('$namesArray',array($namesArray));
              $namesArray = \DB::table('users')->select('users.*')
                ->join('business_accounts', function($join) use($column)
                {
                  $join->on('business_accounts.user_id', '=', 'users.id')
                    ->where('business_accounts.www', 'like', "%{$column['search']['value'] }%");
                })
                ->leftJoin('individual_accounts', function($join) use($column)
                {
                  $join->on('individual_accounts.user_id', '=', 'users.id')
                    ->where('individual_accounts.www', 'like', "%{$column['search']['value'] }%");
                })
                ->leftJoin('organisation_accounts', function($join) use($column)
                {
                  $join->on('organisation_accounts.user_id', '=', 'users.id')
                    ->where('organisation_accounts.www', 'like', "%{$column['search']['value'] }%");
                })
                ->get();
              \Log::info('$namesArray2',array($namesArray));
              //var_dump($namesArray);
              $usersArray = [];
              foreach ($namesArray as $user) {
                $usersArray[] = $user->id;
              }
              $query->whereIn('sender', $usersArray);
            }
            else {
              $query->where($columns[$key], 'LIKE', "%" . $column['search']['value'] . "%");
            }

          }
        }
      })->get();
    }
    /*
      * Order By
      */
    if ($request->has('order') ) {
		//var_dump($request->order);
      if ($request->input('order.0.column') != '') {
        $orderColumn = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
		if($request->input('order.0.dir')=='desc'){
			$ads=$ads->sortByDesc($columns [intval($orderColumn)]);
		}
		else{
			$ads=$ads->sortBy($columns [intval($orderColumn)]);
		}
        //$ads=\App\Containers\Ad\Models\Ad::orderBy($columns [intval($orderColumn)], $orderDirection)->get();
      }
    }
    // Get the real count after being filtered by Where Clause
    $totalFiltered = $ads->count();
    // Here are the parameters sent from client for paging
    $start = $request->input ( 'start' );           // Skip first start records
    $length = $request->input ( 'length' );

    // Get the real count after being filtered by Where Clause
    $totalFiltered = $ads->count ();



    $ads = $ads->skip($start)->take($length);

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
        $qnt = \App\Containers\Ad\Models\Ad::where('sender', $ad->sender)->get()->count();
      $nestedData = array();
      $nestedData [0] = '<div><div style="display:inline-block;"><input type="hidden" class="ad_id" value="' . $ad->id . '"><input class="ad_check" type="checkbox" value="0"></div>
 <span class="photoAdsModalOpen" style="display:inline-block;cursor:pointer" ><i class="fal fa-image"></i></span><div style="display:inline-block;"><a href="/admin/user_edit/adv/'.$ad->id.'" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed"> <i class="fa fa-pencil"></i></a></div></div>';

      if($ad->getSender && $ad->getSender['id']==3){\Log::info('USER=>=>',array($ad));}
      else{//\Log::info('USER=>=>=>',array($ad->getSender));
        //\Log::info('USER=>=>=>===',array($ad));
      }
if(null!=$ad->getSender ){

  $businessAccount=\App\Containers\User\Models\BusinessAccount::where('user_id',$ad->getSender['id'])->first();
  $individualAccount=\App\Containers\User\Models\IndividualAccount::where('user_id',$ad->getSender['id'])->first();
  $organisaionAccount=\App\Containers\User\Models\IndividualAccount::where('user_id',$ad->getSender['id'])->first();
      if($businessAccount){
        $www=$businessAccount->www;
		$address=$businessAccount->address;
      }
      elseif($individualAccount){
        $www=$individualAccount->www;
		$address=$individualAccount->address;
      }
      elseif($organisaionAccount){
        $www=$organisaionAccount->www;
		$address=$organisaionAccount->address;
      }
      else{
        $www='Не определено';
		$address='Не определено';
      }}else{
  $www='Не определено';
  $address='Не определено';}
  $str=json_decode($ad->language_filter);
  if($str!=null){
	 // \Log::info('JSON=>',json_decode($ad->language_filter));
  }
if($ad->getSender!=null){
switch($ad->getSender->confirmed){
	case 10:
	$userStatus='активный';
	break;
	case 5:
	$userStatus='adm_creat_not_conf';
	break;
	case 9:
	$userStatus='не активный';
	break;
	case 2:
	$userStatus='забаненый';
	break;
	case 8:
	$userStatus='social active';
	break;
	case 0:
	$userStatus='soft deleted';
	break;
	default:
	$userStatus='-------';
}
  }
      $nestedData [1] = $status;
      $nestedData [2] = $ad->title;
      $nestedData [3] = '<span style="font-size:9px">' . mb_strimwidth($ad->message, 0, (null!=$request->input('col_width')) ? intval($request->input('col_width'))/5 : 30, "...") . '</span>';
      $nestedData [4] = $ad->sender;
      $nestedData [5] = ($ad->getSender) ? $ad->getSender->name . ' ' . $ad->getSender->sername : 'Не известно';
      $nestedData [6] = ($ad->getSender) ? $ad->getSender->email : 'Не известно';
      $nestedData [7] = ($ad->phone) ? $ad->phone : 'нет';
      $nestedData [8] = ($rubrik) ? $rubrik->name : 'NoCategoryName';
      $nestedData [9] = 'second2';
      $nestedData [10] = 'third';
      $nestedData [11] = ($ad->updated_at) ? $ad->updated_at->toDateTimeString() : $ad->created_at->toDateTimeString();
      $nestedData [12] = $ad->id;
      $nestedData [13] = $qnt;
      $nestedData [14] = $www;
      $nestedData [15] = ($ad->price!=null) ? $ad->price  : (($ad->age!=null) ? 'возраст '.$ad->age : 'Не определено');
      $nestedData [16] = ($ad->select_time!=null) ? $ad->select_time  : 'Не определено';
      $nestedData [17] = ($ad->expired_sent!=null) ? $ad->expired_sent  : 'Не определено';
      $nestedData [18] = ($ad->counter!=null) ? $ad->counter  : 'Не определено';
      $nestedData [19] = ($ad->view_counter!=null) ? $ad->view_counter  : 'Не определено';
      $nestedData [20] = $address;
	  $nestedData [21] = ($ad->language_filter!=null) ?   $str : 'Не определено';
	  $nestedData [22] = ($ad->getSender!=null && $ad->getSender->confirmed!=null && $ad->getSender->confirmed==5) ? 'не подтвержден' : '------';
	  $nestedData [23] = $userStatus;
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


    public function makeCategories(GetAllAdsDataTableRequest $request){

        $final=[];
        $i=0;
        foreach ($this->main as $m){
            $final[$i]['name']=$m['name'];
            $final[$i]['parent_id']=$m['parent_id'];
            $i++;
        }
        $b=count($final)+1 ;
        $a=count($final);
//dump($a);
        foreach($this->scotland as $s){
            $final[$a]['name']=$s['name'];
            if($s['parent_id']==0){
                $final[$a]['parent_id']=0;
            }
            else{
                $final[$a]['parent_id']=$s['parent_id']+$b;
            }

            $a++;
        }
        $f=var_export($final,true);
         echo $f;

        //dump($this->fin[1176]);
        \App\Containers\Ad\Models\BritainRegion::insert($this->fin);


    }


    public function showSubcatGumtree(GetAllAdsDataTableRequest $request){
        $data['locations']=\App\Containers\Ad\Models\BritainRegion::where('parent_id',$request->input('id_cat'))->get();
        return view('ad::gumtree.table', $data);
    }


    public function showMaincatGumtree(GetAllAdsDataTableRequest $request){
        if(null!=($request->input('id_cat'))){
            $cat=\App\Containers\Ad\Models\BritainRegion::where('id',$request->input('id_cat'))->first();
            $data['locations']=\App\Containers\Ad\Models\BritainRegion::where('parent_id',$cat->parent_id)->get();
        }else{

        $data['locations']=\App\Containers\Ad\Models\BritainRegion::whereIn('name',['England','Scotland','Wales','Nothern Irland'])->get();}
        $data['non_arrow']=$request->input('non_arrow');
        return view('ad::gumtree.table', $data);
    }



    public function saveGumtree(GetAllAdsDataTableRequest $request){
        $id=\Session::get('gumtree');
        var_dump($id);
/*        $cat=\App\Containers\Ad\Models\BritainRegion::where('id',$id)->first();
        if($cat){
        $string[]=$cat->name;}
        $catPrev=\App\Containers\Ad\Models\BritainRegion::where('id',$cat->parent_id)->first();
        if($catPrev){
            $string[]=$catPrev->name;}
        $catPrev2=\App\Containers\Ad\Models\BritainRegion::where('id',$catPrev->parent_id)->first();
        if($catPrev2){
            $string[]=$catPrev->name;}*/

    }

    public function getAllParentsString(GetAllAdsDataTableRequest $request){

        $this->getAllParentsRecursive($request->input('child'));
        if(is_array($this->result)){
            \Log::info('kapec');
        foreach($this->result as $d){
            $res[]=$d;
        }
        return json_encode(['result'=>array_reverse($res)]);}
        return json_encode(['result'=>'empty']);

    }

    public function getAllParentsRecursive($id){

        $real=\App\Containers\Ad\Models\BritainRegion::where('id',$id)->first();
        $data=\App\Containers\Ad\Models\BritainRegion::where('id',$real->parent_id)->first();
        if($data){
            \Log::info('data',array($data));
            $this->result[]=$data;
            $this->getAllParentsRecursive($data->id);
        }
        if($data && $data->parent_id==0){
            \Log::info('sata',array($this->result));
            return $this->result;}
    }

  public function getAllParentsCategoriesRecursive($id){
    $real=\App\Containers\Site\Models\ProductCategory::where('id',$id)->first();
	if($real){
    $data=\App\Containers\Site\Models\ProductCategory::where('id',$real->parent_id)->first();
    if($data){
      \Log::info('data',array($data));
      $this->resultCat[]=$data;
      $this->getAllParentsCategoriesRecursive($data->id);
    }
    if($data && $data->parent_id==0){
      \Log::info('sata2',array($this->resultCat));
      return $this->resultCat;}
	}
  }

  public function adminAddAds(GetAllAdsDataTableRequest $request){
    $result['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
    //$users = Apiato::call('Ad@GetAllAdsDataTableAction', [$request]);
    $result['main_rubrics'] = Apiato::call('Site@GetProductCategoriesByParentIdAction', [0], [0]);
    return view('ad::admin.add.index', $result);
  }

  public function complain(GetAllAdsRequest $request){
    foreach($request->all() as $key=>$req){
      if($key=='complain'){
        switch($req){
          case 'rudeness':
            $rq['complain']='Текст некорректный/неуважение/грубость';
            break;
          case 'wrong_contact':
          $rq['complain']='Контактная информация неверная';
          break;
          case 'sold_out':
            $rq['complain']='Товар продан/ услуга недоступна';
            break;
          case 'forbidden':
            $rq['complain']='Запрещенный товар/непристойное содержание';
            break;
          case 'big_price':
          $rq['complain']='Продавец просит цену выше указанной';
          break;
          case 'fraud':
            $rq['complain']='Мошенничество/спам';
            break;
          case 'disparity':
            $rq['complain']='Объявление не соответствует рубрике';
            break;
			case 'my_phone':
            $rq['complain']='В объявлении кто-то указал мой телефон';
            break;
			case 'other':
            $rq['complain']=$request->input('other_name');
            break;

        }
      }
	  elseif($key=='add_id'){

		  $rq['add_link']='https://rukav.co.uk/ads/'.$request->input('add_id');
	  }
    }
	$rq['email']=\App\Containers\User\Models\User::select('email')->where('id',\Auth::user()->id)->first();
    dispatch(new \App\Containers\User\Jobs\SendComplainRequestJob($rq))->onQueue('queue_name');
	return back()->with('success', 'Жалоба отправлена');
  }

}
