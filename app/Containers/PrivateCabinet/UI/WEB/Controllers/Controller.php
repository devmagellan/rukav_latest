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
}
