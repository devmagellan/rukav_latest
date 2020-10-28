<?php

namespace App\Containers\Connect\UI\WEB\Controllers;

use App\Containers\Connect\UI\WEB\Requests\CreateConnectRequest;
use App\Containers\Connect\UI\WEB\Requests\DeleteConnectRequest;
use App\Containers\Connect\UI\WEB\Requests\GetAllConnectsRequest;
use App\Containers\Connect\UI\WEB\Requests\FindConnectByIdRequest;
use App\Containers\Connect\UI\WEB\Requests\UpdateConnectRequest;
use App\Containers\Connect\UI\WEB\Requests\StoreConnectRequest;
use App\Containers\Connect\UI\WEB\Requests\EditConnectRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;

/**
 * Class Controller
 *
 * @package App\Containers\Connect\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllConnectsRequest $request
     */
    public function index(GetAllConnectsRequest $request)
    {
        $connects = Apiato::call('Connect@GetAllConnectsAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindConnectByIdRequest $request
     */
    public function show(FindConnectByIdRequest $request)
    {
        $connect = Apiato::call('Connect@FindConnectByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateConnectRequest $request
     */
    public function create(CreateConnectRequest $request)
    {



    }

    /**
     * Add a new entity
     *
     * @param StoreConnectRequest $request
     */
    public function store(StoreConnectRequest $request)
    {

        $user=\App\Containers\User\Models\User::where('id',$request->input('client_id'))->first();

        if($user->confirmed==User::) {

        }
        if (preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $request->input('text')))
        {
            return json_encode(['message'=>'Contains an email']);
        }
        else{
            Apiato::call('Connect@CreateConnectAction', [$request]);
            return redirect('/ads/'.$request->input('message_id').'')->withErrors(['Ваше сообщение было успешно доставлено!', 'The Message']);
        }


    }

    /**
     * Edit entity (show UI)
     *
     * @param EditConnectRequest $request
     */
    public function edit(EditConnectRequest $request)
    {
        $connect = Apiato::call('Connect@GetConnectByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateConnectRequest $request
     */
    public function update(UpdateConnectRequest $request)
    {
        $connect = Apiato::call('Connect@UpdateConnectAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteConnectRequest $request
     */
    public function delete(DeleteConnectRequest $request)
    {
         $result = Apiato::call('Connect@DeleteConnectAction', [$request]);

         // ..
    }
}
