<?php

namespace App\Containers\PrivateCabinet\UI\WEB\Controllers;

use App\Containers\PrivateCabinet\UI\WEB\Requests\CreatePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\DeletePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\GetAllPrivateCabinetsRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\FindPrivateCabinetByIdRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\UpdatePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\StorePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\WEB\Requests\EditPrivateCabinetRequest;
use App\Containers\User\UI\WEB\Requests\GetAllUsersRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use Image;


/**
 * Class Controller
 *
 * @package App\Containers\PrivateCabinet\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllPrivateCabinetsRequest $request
     */
    public function index(GetAllPrivateCabinetsRequest $request)
    {

        $categories= Apiato::call('Site@GetAllProductCategoriesAction', [$request]);
        $ads= \App\Containers\Ad\Models\Ad::where('sender',\Auth::user()->id)->with('pictures')->get();
        $categoriesOnlyRoot = $categories->where('parent_id', 0);
        $result=\App\Containers\Ad\Models\Wishlist::where('user_id',\Auth::user()->id)->where('active',1)->get();
        $favorits=[];
        foreach($result as $res){
            $favorits[]=\App\Containers\Ad\Models\Ad::where('id',$res->message_id)->with('pictures')->first();
        }
        $user=null;
        if(\Auth::user()){
        $user=\App\Containers\User\Models\User::where('id',\Auth::user()->id)->with('getBusinessAccount')->first();}


        return view('privatecabinet::index',compact('categoriesOnlyRoot', 'categories', 'ads','favorits','user' ) );
    }

    public function messagesData(GetAllPrivateCabinetsRequest $request){

        $data['title']="Staff postData";
        $conversations=\App\Containers\Connect\Models\Connect::where('receiver_id',\Auth::user()->id)->orWhere('sender_id',\Auth::user()->id)
            ->with('sender')->with('message')->with('pictures')
            ->groupBy('message_id','receiver_id')->distinct()->orderBy('created_at')->get();
        $tmp_msg=[];
        $tmp=[];
        foreach($conversations as $conver){
            if( (in_array($conver->sender_id,$tmp) && in_array($conver->receiver_id,$tmp))&& in_array($conver->message_id,$tmp_msg)){

            }
            else{
                $tmp[]=$conver->sender_id;
                $tmp[]=$conver->receiver_id;
                $tmp_msg[]=$conver->message_id;
                $data['conversations'][]= $conver;
            }
        }
        return view('privatecabinet::messages',$data);
    }




    /**
     * Show one entity
     *
     * @param FindPrivateCabinetByIdRequest $request
     */





    public function show(FindPrivateCabinetByIdRequest $request)
    {
        $privatecabinet = Apiato::call('PrivateCabinet@FindPrivateCabinetByIdAction', [$request]);

        // ..
    }

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

    public function setIsActive(GetAllPrivateCabinetsRequest $request){
        $result = Apiato::call('PrivateCabinet@setAdsActivityAction', [$request]);
        return \Response::json($result);
    }


    public function profileSave(GetAllUsersRequest $request){
        $result = Apiato::call('User@UpdateUserAction', [$request]);

    }

    public function changePassword(GetAllUsersRequest $request){
        $user = Apiato::call('User@FindUserByIdAction', [$request]);
        if(\Hash::check($request->input('old_password'), $user->password)){
            $result = Apiato::call('User@UpdateUserAction', [$request]);
            return \Response::json(['status'=>'success']);
        }else{
            return \Response::json(['status'=>'error','message'=>'Не верный пароль!']);
        }

    }

    public function uploadProfileImageAjax(GetAllPrivateCabinetsRequest $request){
        var_dump($request->hasFile('image'));
        var_dump($_FILES);

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();

            $img = Image::make($image->getRealPath());
            $img->fit(220);
            $img->resize(120, 120, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->stream(); // <-- Key point

            //dd();
            \Storage::disk('local')->put('/public/avatars'.'/'.$fileName, $img, 'public');

            \App\Containers\User\Models\User::where('id',\Auth::user()->id)->update(['avatar'=>$fileName]);


        }
    }



    public function conversationData(GetAllPrivateCabinetsRequest $request){
        $example=\App\Containers\Connect\Models\Connect::where('id',$request->input('conversation'))->with('author')->first();
        //Если хозяин объявления я то тянуть все конекты в которых receiver_id я и sender_id $example->sender_id
        //Иначе тянуть все коннекты в которых receiver_id $example->receiver_id и sender_id я
//dump($example);
        $recepients=[$example->sender_id,$example->receiver_id];
        $q=\App\Containers\Connect\Models\Connect::where('message_id',$example->message_id)->whereIn('receiver_id',$recepients)->whereIn('sender_id',$recepients)->with('message')->with('author');

        $data['conversation']=$q->orderBy('created_at')->get();
        //dump($data['conversation']);
        return view('privatecabinet::messageList',$data);
    }

    public function checkData(GetAllPrivateCabinetsRequest $request){
        $user=\App\Containers\User\Models\User::where('id',$request->input('client_id'))->first();
        if (preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $request->input('text')))
        {
            dd("Contains an email");}
        else{
            var_dump('popali');
            $message['values']=['text'=>$request->input('text'),
                'receiver_id'=>$user->id,
                'sender_id'=>\Auth::user()->id,
                'message_id'=>$request->input('message_id'),
                'is_viewed'=>0

            ];
            $message['attributes']['id']=(null!=($request->input('connect_id')) && !empty($request->input('connect_id'))) ? $request->input('connect_id') : null;

            if($message){

                $entityClass=\App\Containers\Connect\Models\Connect::class;
                $con=call_user_func("{$entityClass}::query")->updateOrCreate($message['attributes'], $message['values']);
                var_dump($con);
                var_dump('receiver-'.$user->id.'-');
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
                $data['created'] = $con->created_at;
                $pusher->trigger('my-channel', /* 'my-event' */'receiver-'.$user->id.'-', $data);
                $notification['created'] = $con->created_at;
                $pusher->trigger('notification-channel', /* 'my-event' */'notification-'.$user->id.'-', $notification);

            }
        }
        return json_encode(['message'=>'success']);
    }



}
