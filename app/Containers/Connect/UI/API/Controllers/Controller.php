<?php

namespace App\Containers\Connect\UI\API\Controllers;

use App\Containers\Connect\UI\API\Requests\CreateConnectRequest;
use App\Containers\Connect\UI\API\Requests\DeleteConnectRequest;
use App\Containers\Connect\UI\API\Requests\GetAllConnectsRequest;
use App\Containers\Connect\UI\API\Requests\FindConnectByIdRequest;
use App\Containers\Connect\UI\API\Requests\UpdateConnectRequest;
use App\Containers\Connect\UI\API\Transformers\ConnectTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Connect\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateConnectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createConnect(CreateConnectRequest $request)
    {
        $connect = Apiato::call('Connect@CreateConnectAction', [$request]);

        return $this->created($this->transform($connect, ConnectTransformer::class));
    }

    /**
     * @param FindConnectByIdRequest $request
     * @return array
     */
    public function findConnectById(FindConnectByIdRequest $request)
    {
        $connect = Apiato::call('Connect@FindConnectByIdAction', [$request]);

        return $this->transform($connect, ConnectTransformer::class);
    }

    /**
     * @param GetAllConnectsRequest $request
     * @return array
     */
    public function getAllConnects(GetAllConnectsRequest $request)
    {
        $connects = Apiato::call('Connect@GetAllConnectsAction', [$request]);

        return $this->transform($connects, ConnectTransformer::class);
    }

    /**
     * @param UpdateConnectRequest $request
     * @return array
     */
    public function updateConnect(UpdateConnectRequest $request)
    {
        $connect = Apiato::call('Connect@UpdateConnectAction', [$request]);

        return $this->transform($connect, ConnectTransformer::class);
    }

    /**
     * @param DeleteConnectRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteConnect(DeleteConnectRequest $request)
    {
        Apiato::call('Connect@DeleteConnectAction', [$request]);

        return $this->noContent();
    }
}
