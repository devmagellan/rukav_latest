<?php

namespace App\Containers\PrivateCabinet\UI\API\Controllers;

use App\Containers\PrivateCabinet\UI\API\Requests\CreatePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\API\Requests\DeletePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\API\Requests\GetAllPrivateCabinetsRequest;
use App\Containers\PrivateCabinet\UI\API\Requests\FindPrivateCabinetByIdRequest;
use App\Containers\PrivateCabinet\UI\API\Requests\UpdatePrivateCabinetRequest;
use App\Containers\PrivateCabinet\UI\API\Transformers\PrivateCabinetTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\PrivateCabinet\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreatePrivateCabinetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createPrivateCabinet(CreatePrivateCabinetRequest $request)
    {
        $privatecabinet = Apiato::call('PrivateCabinet@CreatePrivateCabinetAction', [$request]);

        return $this->created($this->transform($privatecabinet, PrivateCabinetTransformer::class));
    }

    /**
     * @param FindPrivateCabinetByIdRequest $request
     * @return array
     */
    public function findPrivateCabinetById(FindPrivateCabinetByIdRequest $request)
    {
        $privatecabinet = Apiato::call('PrivateCabinet@FindPrivateCabinetByIdAction', [$request]);

        return $this->transform($privatecabinet, PrivateCabinetTransformer::class);
    }

    /**
     * @param GetAllPrivateCabinetsRequest $request
     * @return array
     */
    public function getAllPrivateCabinets(GetAllPrivateCabinetsRequest $request)
    {
        $privatecabinets = Apiato::call('PrivateCabinet@GetAllPrivateCabinetsAction', [$request]);

        return $this->transform($privatecabinets, PrivateCabinetTransformer::class);
    }

    /**
     * @param UpdatePrivateCabinetRequest $request
     * @return array
     */
    public function updatePrivateCabinet(UpdatePrivateCabinetRequest $request)
    {
        $privatecabinet = Apiato::call('PrivateCabinet@UpdatePrivateCabinetAction', [$request]);

        return $this->transform($privatecabinet, PrivateCabinetTransformer::class);
    }

    /**
     * @param DeletePrivateCabinetRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deletePrivateCabinet(DeletePrivateCabinetRequest $request)
    {
        Apiato::call('PrivateCabinet@DeletePrivateCabinetAction', [$request]);

        return $this->noContent();
    }
}
