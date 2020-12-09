<?php

namespace App\Containers\PrivateCabinet\UI\WEB\Controllers;

use App\Containers\PrivatCabinet\Services\PrivatCabinetService;
use App\Containers\PrivateCabinet\UI\WEB\Requests\CreatePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\DeletePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\GetAllPrivateCabinetsRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\FindPrivateCabinetByIdRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\UpdatePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\StorePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\EditPrivateCabinetRequest;
use App\Containers\User\Jobs\VerifyMail;
use App\Containers\User\Models\User;
use App\Containers\User\UI\WEB\Requests\GetAllUsersRequest;
use App\Containers\User\UI\WEB\Requests\ProfileSaveToIndividualRequest;
use App\Containers\User\UI\WEB\Requests\ProfileSaveToOrganisationRequest;
use App\Containers\User\UI\WEB\Requests\ProfileSaveToCompanyRequest;
use App\Services\UsersContactsExportService;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use Illuminate\Support\Facades\Storage;
use Image;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use App\Containers\Ad\Services\AdService;
use App\Containers\User\Services\UserService;
use App\Containers\HomePage\Services\GlobalService;


/**
 * Class Controller
 *
 * @package App\Containers\PrivateCabinet\UI\WEB\Controllers
 */
class Controller extends WebController
{


  public function showCabinetPage(GetAllPrivateCabinetsRequest $request , $type = null )
  {
    \Log::info('SessionHasC1' . \Session::has('ShowWeeklyAdminCreatedConfirmation'));
    \Log::info('SessionHasC2' . \Session::get('ShowWeeklyAdminCreatedConfirmation'));

    $toAccountType = '';

    $data['properties'] = GlobalService::getMainProperties($request)['categories'];
    $categoriesOnlyRoot = GlobalService::getMainProperties($request)['categoriesOnlyRoot'];
    $ads = \App\Containers\Ad\Models\Ad::where('sender', \Auth::user()->id)->with('pictures')->orderBy('created_at', 'desc')->get();
    $result = \App\Containers\Ad\Models\Wishlist::where('user_id', \Auth::user()->id)->where('active', 1)->get();
    $favorits = [];
    foreach ($result as $res) {
      $favorits[] = \App\Containers\Ad\Models\Ad::where('id', $res->message_id)->with('pictures')->first();
    }
    $user = null;
    if (\Auth::user()) {
      $user = \App\Containers\User\Models\User::where('id', \Auth::user()->id)->with('getBusinessAccount')->first();
    }

    $countrycode = \App\Containers\PrivateCabinet\Services\PrivateCabinetService::code_to_country(\Auth::user()->country);
    return view('privatecabinet::'.$type.'.index', compact('categoriesOnlyRoot', 'ads', 'favorits', 'data', 'toAccountType', 'countrycode'));
  }


  /**
   * Show all entities
   *
   * @param GetAllPrivateCabinetsRequest $request
   */
  public function index(GetAllPrivateCabinetsRequest $request, $type = null)
  {

    \Log::info('SessionHasC2' . \Session::has('ShowWeeklyAdminCreatedConfirmation'));
    \Log::info('SessionHasC3' . \Session::get('ShowWeeklyAdminCreatedConfirmation'));

    $toAccountType = '';
    if ($type) {
      $toAccountType = $type;
    }

    $data['properties'] = GlobalService::getMainProperties($request)['categories'];
    $categoriesOnlyRoot = GlobalService::getMainProperties($request)['categoriesOnlyRoot'];
    $ads = \App\Containers\Ad\Models\Ad::where('sender', \Auth::user()->id)->with('pictures')->orderBy('created_at', 'desc')->get();
    $result = \App\Containers\Ad\Models\Wishlist::where('user_id', \Auth::user()->id)->where('active', 1)->get();
    $favorits = [];
    foreach ($result as $res) {
      $favorits[] = \App\Containers\Ad\Models\Ad::where('id', $res->message_id)->with('pictures')->first();
    }
    $user = null;
    if (\Auth::user()) {
      $user = \App\Containers\User\Models\User::where('id', \Auth::user()->id)->with('getBusinessAccount')->first();
    }

    $countrycode = \App\Containers\PrivateCabinet\Services\PrivateCabinetService::code_to_country(\Auth::user()->country);
    return view('privatecabinet::my_profile.index', compact('categoriesOnlyRoot', 'ads', 'favorits', 'data', 'toAccountType', 'countrycode'));
  }

  public function messagesData(GetAllPrivateCabinetsRequest $request)
  {

    $data['title'] = "Staff postData";
    $blockedUsers = \App\Containers\PrivateCabinet\Models\BlockedUser::where('user_id', \Auth::user()->id)->pluck('opponent');
    $conversations = \App\Containers\Connect\Models\Connect::whereNull('group_id')->
    where(function ($query) use ($blockedUsers) {
      $query->where(function ($q) use ($blockedUsers) {
        $q->where('receiver_id', \Auth::user()->id)->whereNotIn('sender_id', $blockedUsers);
      })->orWhere(function ($qr) use ($blockedUsers) {
        $qr->where('sender_id', \Auth::user()->id)->whereNotIn('receiver_id', $blockedUsers);
      });
    })
      ->with('sender')->with('message')->with('pictures')
      /*->groupBy('message_id','receiver_id')*/ ->distinct()->orderBy('created_at', 'desc')->get();
    $tmp_msg = [];
    $tmp = [];
    foreach ($conversations as $conver) {
      if ((in_array($conver->sender_id, $tmp) && in_array($conver->receiver_id, $tmp)) && in_array($conver->message_id, $tmp_msg)) {

      } else {
        $tmp[] = $conver->sender_id;
        $tmp[] = $conver->receiver_id;
        $tmp_msg[] = $conver->message_id;
        $data['conversations'][] = $conver;
      }
    }
    $data['email'] = \Auth::user()->email;
    $data['businessOwnerConversationsList'] = \App\Containers\Ad\Models\SecondMessangerGroupsItem::where('user_id', \Auth::user()->id)->with('message')->with('group')->get();
    $data['privateOwnerConversationsList'] = \App\Containers\Ad\Models\SecondMessangerGroupRecipientItems::where('user_id', \Auth::user()->id)->with('recipients')->with('connects')->with('group')->get();
    return view('privatecabinet::messages', $data);
  }


  /**
   * Show one entity
   *
   * @param FindPrivateCabinetByIdRequest $request
   */


  /**
   * Create entity (show UI)
   *
   * @param CreatePrivateCabinetRequest $request
   */
  public function create(CreatePrivateCabinetRequest $request)
  {
// ..
  }

  /**
   * Add a new entity
   *
   * @param StorePrivateCabinetRequest $request
   */
  public function store(StorePrivateCabinetRequest $request)
  {
    $privatecabinet = Apiato::call('PrivateCabinet@CreatePrivateCabinetAction', [$request]);

// ..
  }

  /**
   * Edit entity (show UI)
   *
   * @param EditPrivateCabinetRequest $request
   */
  public function edit(EditPrivateCabinetRequest $request)
  {
    $privatecabinet = Apiato::call('PrivateCabinet@GetPrivateCabinetByIdAction', [$request]);

// ..
  }

  /**
   * Update a given entity
   *
   * @param UpdatePrivateCabinetRequest $request
   */
  public function update(UpdatePrivateCabinetRequest $request)
  {
    $privatecabinet = Apiato::call('PrivateCabinet@UpdatePrivateCabinetAction', [$request]);

// ..
  }

  /**
   * Delete a given entity
   *
   * @param DeletePrivateCabinetRequest $request
   */
  public function delete(DeletePrivateCabinetRequest $request)
  {
    $result = Apiato::call('PrivateCabinet@DeletePrivateCabinetAction', [$request]);

// ..
  }

  public function setIsActive(GetAllPrivateCabinetsRequest $request)
  {
    $result = Apiato::call('PrivateCabinet@setAdsActivityAction', [$request]);
    return \Response::json($result);
  }


  public function profileSave(GetAllUsersRequest $request)
  {
    \Log::info('user_after_save');
    $currentById = \App\Containers\User\Models\User::where('id', $request->id)->withTrashed()->first();
    $user = Apiato::call('User@UpdateUserAction', [$request]);
    \Log::info('user_after_save',$user);
    if (isset($request->id)) {
      if ($currentById->email != $user->email) {
        \Session::put('OpenConfirmationModal', 1);
        dispatch(new VerifyMail($user))->onQueue('queue_name');
      }
    }
    return redirect()->back()->with('account_saved', 'Ваш аккаунт изменен !');
  }

  public function profileSaveToIndividual(ProfileSaveToIndividualRequest $request)
  {
    if ($request->input('vid_Fuser') == 'Частная') {
      $controller = new \App\Containers\User\UI\WEB\Controllers\Controller(new UserService());
      return $controller->changeRegisterFromSimpleUser($request);
    } else {
      $controller = new \App\Containers\User\UI\WEB\Controllers\Controller(new UserService());
      return $controller->changeRegisterFromRestUser($request);
    }

  }

  public function profileSaveToOrganisation(ProfileSaveToOrganisationRequest $request)
  {
    \Log::info('user_after_save_to_organisation',$request->input());
    if ($request->input('vid_user') == 'Частная') {
      \Log::info('fromPrivate');
      $controller = new \App\Containers\User\UI\WEB\Controllers\Controller(new UserService());
      return $controller->changeRegisterFromSimpleUser($request);
    } else {
      $controller = new \App\Containers\User\UI\WEB\Controllers\Controller(new UserService());
      return $controller->changeRegisterFromRestUser($request);
    }


  }

  public function profileSaveToCompany(ProfileSaveToCompanyRequest $request)
  {
    if ($request->input('vid_user') == 'Частная') {
      $controller = new \App\Containers\User\UI\WEB\Controllers\Controller(new UserService());
      return $controller->changeRegisterFromSimpleUser($request);
    } else {
      $controller = new \App\Containers\User\UI\WEB\Controllers\Controller(new UserService());
      return $controller->changeRegisterFromRestUser($request);
    }

  }

  public function changePassword(GetAllUsersRequest $request)
  {
    $user = Apiato::call('User@FindUserByIdAction', [$request]);
    if (\Hash::check($request->input('old_password'), $user->password)) {
      $result = Apiato::call('User@UpdateUserAction', [$request]);
      return \Response::json(['status' => 'success']);
    } else {
      return \Response::json(['status' => 'error', 'message' => 'Не верный пароль!']);
    }

  }

  public function uploadProfileImageAjax(GetAllPrivateCabinetsRequest $request)
  {
//var_dump($request->hasFile('image'));
//var_dump($_FILES);

    if ($request->hasFile('image')) {
      $image = $request->file('image');
      $fileName = time() . '.' . $image->getClientOriginalExtension();

      $img = Image::make($image->getRealPath());
      $img->fit(220);
      $img->resize(120, 120, function ($constraint) {
        $constraint->aspectRatio();
      });

      $img->stream(); // <-- Key point

//dd();
      \Storage::disk('local')->put('/public/avatars' . '/' . $fileName, $img, 'public');

      \App\Containers\User\Models\User::where('id', \Auth::user()->id)->update(['avatar' => $fileName]);


    }
  }


  public function conversationData(GetAllPrivateCabinetsRequest $request)
  {
	  \Log::info('flag'.$request->input('flag'));
	  $data['conversationId']=$request->input('conversation');
 $res=\App\Containers\Connect\Models\Connect::select('message_id','receiver_id')->where('id', $request->input('conversation'))->first()->toArray();
   $data['messageId']=$res['message_id'];
    $example = \App\Containers\Connect\Models\Connect::where('id', $request->input('conversation'))->with('author')->first();
	\Log::info('conversationIDRes',$res);
	\Log::info('conversationExample'.$example->receiver_id);
	\Log::info('conversationAuth'.\Auth::user()->id); 
    if (/* \Auth::user()->id == $example->receiver_id &&  */$request->input('flag')=='true') {
		\Log::info('conversationData'.date("Y-m-d H:i:s"));
		\Log::info('conversationID'.$request->input('conversation'));
		
      
	 	
	  
	  \App\Containers\Connect\Models\Connect::where('message_id',$res['message_id'])->where('receiver_id',\Auth::user()->id)->update(['viewed_at' => Carbon::now()]);
	$all_connects=\App\Containers\Connect\Models\Connect::where('receiver_id',\Auth::user()->id)->where('viewed_at',null)->get();  
	    $options = array(
          'cluster' => 'eu',
          'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
          '500e0547867ccfe184af',
          'b8d3a1076b93fe80dd50',
          '1000615',
          $options
        );

        //$data['message_id'] = $request->input('message_id');
        $data['sender_id'] = \Auth::user()->id;
        //$data['text'] = $request->input('text');
		//$data['viewed'] = (count($connects)>0) ? count($connects) : null;
		$data['all_viewed'] = (count($all_connects)>0) ? count($all_connects) : null;
        //$data['photo'] = null;
        //$data['created'] = $con->created_at;
        $pusher->trigger('my-channel-header', /* 'my-event' */ 'receiver-' . \Auth::user()->id . '-', $data);
    }
//Если хозяин объявления я то тянуть все конекты в которых receiver_id я и sender_id $example->sender_id
//Иначе тянуть все коннекты в которых receiver_id $example->receiver_id и sender_id я
    $recepients = [$example->sender_id, $example->receiver_id];
    $q = \App\Containers\Connect\Models\Connect::where('group_id', $request->input('group_id'))->where('message_id', $example->message_id)->whereIn('receiver_id', $recepients)->whereIn('sender_id', $recepients)->with('message')->with('author');

    $data['conversation'] = $q->orderBy('created_at')->get();
	
    return view('privatecabinet::messageList', $data);
  }

  public function checkData(GetAllPrivateCabinetsRequest $request)
  {
	  \Log::info('checkData'.date("Y-m-d H:i:s"));
    $user = \App\Containers\User\Models\User::where('id', $request->input('client_id'))->first();
    if (\Auth::user()->confirmed == \App\Containers\User\Models\User::STATUS_CREATED_BY_ADMIN_NOT_CONFIRMED) {
      \Session::put('ShowWeeklyAdminCreatedConfirmation', 1);
      return response()->json(['error' => 'Email Not confirmed'], 404);
    }
    if (preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $request->input('text'))) {
      dd("Contains an email");
    } else {
      $message['values'] = ['text' => $request->input('text'),
        'receiver_id' => $user->id,
        'sender_id' => \Auth::user()->id,
        'message_id' => $request->input('message_id'),
        'is_viewed' => 0

      ];
      $message['attributes']['id'] = (null != ($request->input('connect_id')) && !empty($request->input('connect_id'))) ? $request->input('connect_id') : null;

      if ($message) {

        $entityClass = \App\Containers\Connect\Models\Connect::class;
        $con = call_user_func("{$entityClass}::query")->updateOrCreate($message['attributes'], $message['values']);
		$connects=\App\Containers\Connect\Models\Connect::where('receiver_id',$user->id)->where('message_id',$request->input('message_id'))->where('viewed_at',null)->get();
$all_connects=\App\Containers\Connect\Models\Connect::where('receiver_id',$user->id)->where('viewed_at',null)->get();

//var_dump('receiver-'.$user->id.'-');
        $options = array(
          'cluster' => 'eu',
          'useTLS' => true
        );
        $pusher = new \Pusher\Pusher(
          '500e0547867ccfe184af',
          'b8d3a1076b93fe80dd50',
          '1000615',
          $options
        );

        $data['message_id'] = $request->input('message_id');
        $data['sender_id'] = \Auth::user()->id;
        $data['text'] = $request->input('text');
		$data['viewed'] = (count($connects)>0) ? count($connects) : null;
		$data['all_viewed'] = (count($all_connects)>0) ? count($all_connects) : null;
        $data['photo'] = null;
        $data['created'] = $con->created_at;
        $pusher->trigger('my-channel', /* 'my-event' */ 'receiver-' . $user->id . '-', $data);
		$pusher->trigger('my-channel-header-2', /* 'my-event' */ 'receiver-' . $user->id . '-', $data);
		
        $notification['created'] = $con->created_at;
        $pusher->trigger('notification-channel', /* 'my-event' */ 'notification-' . $user->id . '-', $notification);

      }
    }
    return json_encode(['message' => 'success']);
  }

  public function addSecondMessangerGroup(GetAllPrivateCabinetsRequest $request)
  {
//привязываем категорию к юзеру

    $second_messanger_group_recipient_item = \App\Containers\Ad\Models\SecondMessangerGroupRecipientItems::where('group_id', $request->input('group_id'))->where('user_id', \Auth::user()->id)->first();

    $response = \App\Containers\Ad\Models\SecondMessangerGroups::where('id', $request->input('group_id'))->first();

    if (!$second_messanger_group_recipient_item) {
      $data = [
        'group_id' => $request->input('group_id'),
        'user_id' => \Auth::user()->id
      ];

      \App\Containers\Ad\Models\SecondMessangerGroupRecipientItems::insert($data);
    }

    return json_encode(['message' => 'success', 'data' => $response]);
//return redirect('/private_cabinet#messages');
  }

  public function deleteSecondGroup(GetAllPrivateCabinetsRequest $request)
  {
    if ($request->input('type') == 'private') {
      \App\Containers\Ad\Models\SecondMessangerGroupRecipientItems::where('group_id', $request->input('group_id'))->where('user_id', \Auth::user()->id)->delete();
    } else {
      \App\Containers\Ad\Models\SecondMessangerGroupsItem::where('group_id', $request->input('group_id'))->where('user_id', \Auth::user()->id)->delete();
    }
  }


  public function cleanConversationData(GetAllPrivateCabinetsRequest $request)
  {
    $data['message_id'] = '';
    $data['recepient'] = '';
    $data['ad'] = \App\Containers\Ad\Models\Ad::where('id', $request->input('ad_id'))->with('getSender')->first();
    return view('privatecabinet::messageClean', $data);
  }

  function generateRandomString($length = 10)
  {
    return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
  }

  public function checkPhotoData(GetAllPrivateCabinetsRequest $request)
  {
    $user = \App\Containers\User\Models\User::where('id', $request->input('client_id'))->first();
    $filename = $request->file('file');
    $newPath = storage_path('app/public/message_images/');
    $originalPath = storage_path('app/public/message_images_original/');
    $rand = $this->generateRandomString(5);
    $file = $rand . '_m_image' . $filename->getClientOriginalName();
    $original = $rand . '_o_image' . $filename->getClientOriginalName();
    $location = $newPath . $file;
    $originalLocation = $originalPath . $original;
    $img = Image::make($filename)->resize(200, 200, function ($constraint) {
      $constraint->aspectRatio();
    });
    $img->save($location);
    $img = Image::make($filename);
    $img->save($originalLocation);

    $con = new \App\Containers\Connect\Models\Connect();
    $con->text = '';
    $con->receiver_id = $user->id;
    $con->sender_id = \Auth::user()->id;
    $con->message_id = $request->input('message_id');
    $con->photo = $file;
    $con->created_at = Carbon::now();
    $con->save();
    $options = array(
      'cluster' => 'eu',
      'useTLS' => true
    );
    $pusher = new \Pusher\Pusher(
      '500e0547867ccfe184af',
      'b8d3a1076b93fe80dd50',
      '1000615',
      $options
    );

    $data['message_id'] = $request->input('message_id');
    $data['sender_id'] = \Auth::user()->id;
    $data['text'] = '';
    $data['photo'] = $file;
    $data['created'] = $con->created_at;
    $pusher->trigger('my-channel', 'receiver-' . $user->id . '-', $data);
    $notification['created'] = $con->created_at;
    $pusher->trigger('notification-channel', 'notification-' . $user->id . '-', $notification);
    return json_encode(['message' => 'success', 'data' => $data]);
  }

  public function exportUserContactsCsv(GetAllPrivateCabinetsRequest $request, $user_id)
  {
    $excel = new \App\Exports\UserDataExport($user_id);
    return \Excel::download($excel,'userData.xlsx');

  }

  public function downloadChatFile($file, $ext)
  {
    $filename = $file . '.' . $ext;
    $ex = explode('_m_', $file);
    if (Storage::disk('chatOriginalImages')->exists($ex[0] . '_o_' . $ex[1] . '.' . $ext)) {
      return Storage::disk('chatOriginalImages')->download($ex[0] . '_o_' . $ex[1] . '.' . $ext);
    } else {
      dd(444);
    }
  }

  public function blockUser(GetAllPrivateCabinetsRequest $request)
  {

    \App\Containers\PrivateCabinet\Models\BlockedUser::insert(['user_id' => \Auth::user()->id, 'opponent' => $request->input('opponent')]);
    return json_encode(['message' => 'success']);
  }
  
  public function avatarRrefresh(){
	  return count(\App\Containers\Connect\Models\Connect::where('receiver_id',\Auth::user()->id)->where('viewed_at',null)->get());
  }


}
