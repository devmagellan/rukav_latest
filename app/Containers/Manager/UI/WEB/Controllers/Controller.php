<?php

namespace App\Containers\Manager\UI\WEB\Controllers;

use App\Containers\Manager\UI\WEB\Requests\CreateManagerRequest;
use App\Containers\Manager\UI\WEB\Requests\DeleteManagerRequest;
use App\Containers\Manager\UI\WEB\Requests\GetAllManagersRequest;
use App\Containers\Manager\UI\WEB\Requests\FindManagerByIdRequest;
use App\Containers\Manager\UI\WEB\Requests\UpdateManagerRequest;
use App\Containers\Manager\UI\WEB\Requests\StoreManagerRequest;
use App\Containers\Manager\UI\WEB\Requests\EditManagerRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Manager\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllManagersRequest $request
     */
    public function index(GetAllManagersRequest $request)
    {
        $managers = Apiato::call('Manager@GetAllManagersAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindManagerByIdRequest $request
     */
    public function show(FindManagerByIdRequest $request)
    {
        $manager = Apiato::call('Manager@FindManagerByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateManagerRequest $request
     */
    public function create(CreateManagerRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreManagerRequest $request
     */
    public function store(StoreManagerRequest $request)
    {
        $manager = Apiato::call('Manager@CreateManagerAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditManagerRequest $request
     */
    public function edit(EditManagerRequest $request)
    {
        $manager = Apiato::call('Manager@GetManagerByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateManagerRequest $request
     */
    public function update(UpdateManagerRequest $request)
    {
        $manager = Apiato::call('Manager@UpdateManagerAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteManagerRequest $request
     */
    public function delete(DeleteManagerRequest $request)
    {
         $result = Apiato::call('Manager@DeleteManagerAction', [$request]);

         // ..
    }
}
