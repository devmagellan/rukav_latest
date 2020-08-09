<?php

namespace App\Containers\AdminMenu\UI\WEB\Controllers;

use App\Containers\AdminMenu\UI\WEB\Requests\CreateAdminMenuRequest;
use App\Containers\AdminMenu\UI\WEB\Requests\DeleteAdminMenuRequest;
use App\Containers\AdminMenu\UI\WEB\Requests\GetAllAdminMenusRequest;
use App\Containers\AdminMenu\UI\WEB\Requests\FindAdminMenuByIdRequest;
use App\Containers\AdminMenu\UI\WEB\Requests\UpdateAdminMenuRequest;
use App\Containers\AdminMenu\UI\WEB\Requests\StoreAdminMenuRequest;
use App\Containers\AdminMenu\UI\WEB\Requests\EditAdminMenuRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AdminMenu\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllAdminMenusRequest $request
     */
    public function index(GetAllAdminMenusRequest $request)
    {
        $adminmenus = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindAdminMenuByIdRequest $request
     */
    public function show(FindAdminMenuByIdRequest $request)
    {
        $adminmenu = Apiato::call('AdminMenu@FindAdminMenuByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateAdminMenuRequest $request
     */
    public function create(CreateAdminMenuRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreAdminMenuRequest $request
     */
    public function store(StoreAdminMenuRequest $request)
    {
        $adminmenu = Apiato::call('AdminMenu@CreateAdminMenuAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditAdminMenuRequest $request
     */
    public function edit(EditAdminMenuRequest $request)
    {
        $adminmenu = Apiato::call('AdminMenu@GetAdminMenuByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateAdminMenuRequest $request
     */
    public function update(UpdateAdminMenuRequest $request)
    {
        $adminmenu = Apiato::call('AdminMenu@UpdateAdminMenuAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteAdminMenuRequest $request
     */
    public function delete(DeleteAdminMenuRequest $request)
    {
         $result = Apiato::call('AdminMenu@DeleteAdminMenuAction', [$request]);

         // ..
    }
}
