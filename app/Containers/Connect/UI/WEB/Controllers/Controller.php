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
		\Log::info('message store1',$request->all());
		\Log::info('message store'.$request->input('sender_id'));

        $user=\App\Containers\User\Models\User::where('id',$request->input('sender_id'))->first();

        if($user->confirmed==User::STATUS_CREATED_BY_ADMIN_NOT_CONFIRMED) {
          \Session::put('ShowWeeklyAdminCreatedConfirmation',1);
          return redirect('/ads/'.$request->input('message_id').'')->withErrors(['Ваш email не подвержден!', 'The Message']);
        }
        if (preg_match('/\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/si', $request->input('text')))
        {
            return json_encode(['message'=>'Contains an email']);
        }
        else{
            Apiato::call('Connect@CreateConnectAction', [$request]);

		$connects=\App\Containers\Connect\Models\Connect::where('sender_id',\Auth::user()->id)->where('receiver_id',$request->input('receiver_id'))->where('message_id',$request->input('message_id'))->where('viewed_at',null)->get();
		$all_connects=\App\Containers\Connect\Models\Connect::where('receiver_id',$request->input('receiver_id'))->where('viewed_at',null)->get();
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
        //$data['photo'] = null;
        //$data['created'] = $con->created_at;
        $pusher->trigger('my-channel-header', /* 'my-event' */ 'receiver-' . $request->input('receiver_id') . '-', $data);

		$pusher->trigger('my-channel', /* 'my-event' */ 'receiver-' . $request->input('receiver_id') . '-', $data);
		\Log::info('trigger');

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
