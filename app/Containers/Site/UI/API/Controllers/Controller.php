<?php

namespace App\Containers\Site\UI\API\Controllers;

use App\Containers\Site\UI\API\Requests\CreateSiteRequest;
use App\Containers\Site\UI\API\Requests\DeleteSiteRequest;
use App\Containers\Site\UI\API\Requests\GetAllSitesRequest;
use App\Containers\Site\UI\API\Requests\FindSiteByIdRequest;
use App\Containers\Site\UI\API\Requests\UpdateSiteRequest;
use App\Containers\Site\UI\API\Transformers\SiteTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Site\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSiteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSite(CreateSiteRequest $request)
    {
        $site = Apiato::call('Site@CreateSiteAction', [$request]);

        return $this->created($this->transform($site, SiteTransformer::class));
    }

    /**
     * @param FindSiteByIdRequest $request
     * @return array
     */
    public function findSiteById(FindSiteByIdRequest $request)
    {
        $site = Apiato::call('Site@FindSiteByIdAction', [$request]);

        return $this->transform($site, SiteTransformer::class);
    }

    /**
     * @param GetAllSitesRequest $request
     * @return array
     */
    public function getAllSites(GetAllSitesRequest $request)
    {
        $sites = Apiato::call('Site@GetAllSitesAction', [$request]);

        return $this->transform($sites, SiteTransformer::class);
    }

    /**
     * @param UpdateSiteRequest $request
     * @return array
     */
    public function updateSite(UpdateSiteRequest $request)
    {
        $site = Apiato::call('Site@UpdateSiteAction', [$request]);

        return $this->transform($site, SiteTransformer::class);
    }

    /**
     * @param DeleteSiteRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSite(DeleteSiteRequest $request)
    {
        Apiato::call('Site@DeleteSiteAction', [$request]);

        return $this->noContent();
    }
}
