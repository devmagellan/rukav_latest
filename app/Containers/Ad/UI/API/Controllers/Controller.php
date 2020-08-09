<?php

namespace App\Containers\Ad\UI\API\Controllers;

use App\Containers\Ad\UI\API\Requests\CreateAdRequest;
use App\Containers\Ad\UI\API\Requests\DeleteAdRequest;
use App\Containers\Ad\UI\API\Requests\GetAllAdsRequest;
use App\Containers\Ad\UI\API\Requests\FindAdByIdRequest;
use App\Containers\Ad\UI\API\Requests\UpdateAdRequest;
use App\Containers\Ad\UI\API\Transformers\AdTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Ad\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAdRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAd(CreateAdRequest $request)
    {
        $ad = Apiato::call('Ad@CreateAdAction', [$request]);

        return $this->created($this->transform($ad, AdTransformer::class));
    }

    /**
     * @param FindAdByIdRequest $request
     * @return array
     */
    public function findAdById(FindAdByIdRequest $request)
    {
        $ad = Apiato::call('Ad@FindAdByIdAction', [$request]);

        return $this->transform($ad, AdTransformer::class);
    }

    /**
     * @param GetAllAdsRequest $request
     * @return array
     */
    public function getAllAds(GetAllAdsRequest $request)
    {
        $ads = Apiato::call('Ad@GetAllAdsAction', [$request]);

        return $this->transform($ads, AdTransformer::class);
    }

    /**
     * @param UpdateAdRequest $request
     * @return array
     */
    public function updateAd(UpdateAdRequest $request)
    {
        $ad = Apiato::call('Ad@UpdateAdAction', [$request]);

        return $this->transform($ad, AdTransformer::class);
    }

    /**
     * @param DeleteAdRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAd(DeleteAdRequest $request)
    {
        Apiato::call('Ad@DeleteAdAction', [$request]);

        return $this->noContent();
    }
}
