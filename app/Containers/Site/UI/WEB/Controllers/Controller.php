<?php

namespace App\Containers\Site\UI\WEB\Controllers;

use App\Containers\Site\UI\WEB\Requests\CreateSiteRequest;
use App\Containers\Site\UI\WEB\Requests\DeleteSiteRequest;
use App\Containers\Site\UI\WEB\Requests\GetAllSitesRequest;
use App\Containers\Site\UI\WEB\Requests\FindSiteByIdRequest;
use App\Containers\Site\UI\WEB\Requests\UpdateSiteRequest;
use App\Containers\Site\UI\WEB\Requests\StoreSiteRequest;
use App\Containers\Site\UI\WEB\Requests\EditSiteRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Site\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllSitesRequest $request
     */
    public function index(GetAllSitesRequest $request)
    {
        $sites = Apiato::call('Site@GetAllSitesAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindSiteByIdRequest $request
     */
    public function show(FindSiteByIdRequest $request)
    {
        $site = Apiato::call('Site@FindSiteByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateSiteRequest $request
     */
    public function create(CreateSiteRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreSiteRequest $request
     */
    public function store(StoreSiteRequest $request)
    {
        $site = Apiato::call('Site@CreateSiteAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditSiteRequest $request
     */
    public function edit(EditSiteRequest $request)
    {
        $site = Apiato::call('Site@GetSiteByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateSiteRequest $request
     */
    public function update(UpdateSiteRequest $request)
    {
        $site = Apiato::call('Site@UpdateSiteAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteSiteRequest $request
     */
    public function delete(DeleteSiteRequest $request)
    {
         $result = Apiato::call('Site@DeleteSiteAction', [$request]);

         // ..
    }
}
