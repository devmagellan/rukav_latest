<?php

namespace App\Containers\Liqpay\UI\API\Controllers;

use App\Containers\Liqpay\UI\API\Requests\CreateLiqpayRequest;
use App\Containers\Liqpay\UI\API\Requests\DeleteLiqpayRequest;
use App\Containers\Liqpay\UI\API\Requests\GetAllLiqpaysRequest;
use App\Containers\Liqpay\UI\API\Requests\FindLiqpayByIdRequest;
use App\Containers\Liqpay\UI\API\Requests\UpdateLiqpayRequest;
use App\Containers\Liqpay\UI\API\Transformers\LiqpayTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Liqpay\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateLiqpayRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createLiqpay(CreateLiqpayRequest $request)
    {
        $liqpay = Apiato::call('Liqpay@CreateLiqpayAction', [$request]);

        return $this->created($this->transform($liqpay, LiqpayTransformer::class));
    }

    /**
     * @param FindLiqpayByIdRequest $request
     * @return array
     */
    public function findLiqpayById(FindLiqpayByIdRequest $request)
    {
        $liqpay = Apiato::call('Liqpay@FindLiqpayByIdAction', [$request]);

        return $this->transform($liqpay, LiqpayTransformer::class);
    }

    /**
     * @param GetAllLiqpaysRequest $request
     * @return array
     */
    public function getAllLiqpays(GetAllLiqpaysRequest $request)
    {
        $liqpays = Apiato::call('Liqpay@GetAllLiqpaysAction', [$request]);

        return $this->transform($liqpays, LiqpayTransformer::class);
    }

    /**
     * @param UpdateLiqpayRequest $request
     * @return array
     */
    public function updateLiqpay(UpdateLiqpayRequest $request)
    {
        $liqpay = Apiato::call('Liqpay@UpdateLiqpayAction', [$request]);

        return $this->transform($liqpay, LiqpayTransformer::class);
    }

    /**
     * @param DeleteLiqpayRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteLiqpay(DeleteLiqpayRequest $request)
    {
        Apiato::call('Liqpay@DeleteLiqpayAction', [$request]);

        return $this->noContent();
    }
}
