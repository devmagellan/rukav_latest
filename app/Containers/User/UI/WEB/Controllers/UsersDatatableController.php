<?php

namespace App\Containers\User\UI\WEB\Controllers;

use App\Containers\User\UI\WEB\Requests\GetAllUsersRequest;
use App\Ship\Parents\Controllers\WebController;

class UsersDatatableController extends WebController
{

  public $result;


  public function usersByGroupDatatables(GetAllUsersRequest $request)
  {


    if (null != $request->input('client_id')) {
      \Log::info('client_id!=null');
      $ads = \App\Containers\User\Models\User::where('sender', $request->input('client_id'))->get();
    } else {
      \Log::info('client_id==null');
      $ads = \App\Containers\User\Models\User::where('is_client', 1)->get();
    }
    \Log::info('ADS', array($ads));

    //var_dump($ads);
// The columns variable is used for sorting
    $columns = array(
      // datatable column index => database column name

      0 => 'id',
      1 => 'id',
      2 => 'name',
      3 => 'email',
      4 => 'vid_user',
      5 => 'phone',
      6 => 'ads_count',
      7 => 'title',
      8 => 'title',


    );
    //Getting the data

    $totalData = $ads->count();            //Total record
    $totalFiltered = $totalData;      // No filter at first so we can assign like this
    // Here are the parameters sent from client for paging
    $start = $request->input('start');           // Skip first start records
    $length = $request->input('length') + 1;   //  Get length record from start
    /*
     * Where Clause
     */
    \Log::info('TextLengthCol' . intval($request->input('col')));
    \Log::info('TextLengthArray', $request->all());
    if ($request->has('search')) {


      $statement = "";
      $items = $request->input('columns');
      $ads = \App\Containers\User\Models\User::where('is_client', 1)->
      /* ->when(request('client_id') != null, function ($q) {
         return $q->where('sender', request('client_id'));
       })->*/
      where(function ($query) use ($items, $columns) {
        foreach ($items as $key => $column) {
          if (null != $column['search']['value']) {
            if ($key == 6) {
              $namesArray = \App\Containers\User\Models\User::where('name', 'LIKE', "%" . $column['search']['value'] . "%")->
              orWhere('sername', 'LIKE', "%" . $column['search']['value'] . "%")
                ->get();
              $usersArray = [];
              foreach ($namesArray as $user) {
                $usersArray[] = $user->id;
              }
              $query->whereIn('sender', $usersArray);

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
      //var_dump($request->order);
      if ($request->input('order.0.column') != '') {
        $orderColumn = $request->input('order.0.column');
        $orderDirection = $request->input('order.0.dir');
        if ($request->input('order.0.dir') == 'desc') {
          $ads = $ads->sortByDesc($columns [intval($orderColumn)]);
        } else {
          $ads = $ads->sortBy($columns [intval($orderColumn)]);
        }
        //$ads=\App\Containers\Ad\Models\Ad::orderBy($columns [intval($orderColumn)], $orderDirection)->get();
      }
    }
    // Get the real count after being filtered by Where Clause
    $totalFiltered = $ads->count();
    // Here are the parameters sent from client for paging
    $start = $request->input('start');           // Skip first start records
    $length = $request->input('length');

    // Get the real count after being filtered by Where Clause
    $totalFiltered = $ads->count();


    $ads = $ads->skip($start)->take($length);

    /*
     * Execute the query
     */

    /*
    * We built the structure required by BootStrap datatables
    */
    $data = array();
    foreach ($ads as $ad) {
      $rubrik = \App\Containers\Site\Models\ProductCategory::where('id', $ad->category_id)->first();
      $qnt = \App\Containers\Ad\Models\Ad::where('sender', $ad->sender)->get()->count();
      $nestedData = array();
      $nestedData [0] = '<div><div style="display:inline-block;"><input type="hidden" class="ad_id" value="' . $ad->id . '"><input class="ad_check" type="checkbox" value="0"></div>
 </div>';


      \Log::info('vid_user' . $ad->vid_user);
$buttons='<div> <input type="hidden" name="customer_id" class="customer_id" value="'.$ad->id.'">';
      if (\Auth::user()->can('manage-roles')){
        $buttons.= '<button type = "button" class="ChangePassword btn btn-danger btn-sm btn-icon waves-effect waves-themed"
                           data - toggle = "popover" data - trigger = "hover" data - placement = "top" title = "" data - original - title = "смена пароля"
        >
                            <i class="fal fa-key" ></i >
                        </button >';
     }
      $buttons.= '<button type = "button" class="PrependChangeCustomer btn btn-primary btn-sm btn-icon waves-effect waves-themed" data - toggle = "popover" data - trigger = "hover" data - placement = "top" title = "" data - original - title = "редактирование пользователя" >
                        <i class="fal fa-pencil" ></i >
                    </button >
                        <a href = "/admin/user_add/adv/'.$ad->id.'" class="btn btn-primary btn-sm btn-icon waves-effect waves-themed" data - toggle = "popover" data - trigger = "hover" data - placement = "top" title = "" data - original - title = "создание объявления" >
                            <i class="fal fa-file" ></i >
                        </a >';
                  if($ad->confirmed==\App\Containers\User\Models\User::STATUS_CREATED_BY_ADMIN_NOT_CONFIRMED){
$buttons.= '<a href="javascript:void(0);" class="ShowUserPassword btn btn-danger btn-sm btn-icon waves-effect waves-themed" data-id="'.openssl_decrypt($ad->encripted_password,"AES-128-ECB",'password').'" data-toggle="popover" data-trigger="hover" data-placement="top" title="" data-content="Показать пароль пользователя" data-original-title="show password">
                      <i class="fal fa-eye"></i>
                    </a>';
      }

      $buttons.='</div>';

\Log::info('AdsWithGroup'.count($ad->adsWithGroup));
      $nestedData [1] = $ad->id;
      $nestedData [2] = $ad->name;
      $nestedData [3] = $ad->email;
      $nestedData [4] = $ad->vid_user;
      $nestedData [5] = ($ad->phone) ? $ad->phone  : 'Не известно';
      $nestedData [6] = '<a href="/ads?client_id='.$ad->id.'" >'.count($ad->adsWithGroup).'</a>';
      $nestedData [7] = ($ad->country) ? $ad->country : 'нет';
      $nestedData [8] =  $buttons;
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
}
