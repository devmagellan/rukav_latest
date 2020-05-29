<?php

namespace App\Containers\HomePage\UI\WEB\Controllers;

use App\Containers\HomePage\UI\WEB\Requests\CreateHomePageRequest;
use App\Containers\HomePage\UI\WEB\Requests\DeleteHomePageRequest;
use App\Containers\HomePage\UI\WEB\Requests\GetAllHomePagesRequest;
use App\Containers\HomePage\UI\WEB\Requests\FindHomePageByIdRequest;
use App\Containers\HomePage\UI\WEB\Requests\UpdateHomePageRequest;
use App\Containers\HomePage\UI\WEB\Requests\StoreHomePageRequest;
use App\Containers\HomePage\UI\WEB\Requests\EditHomePageRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\HomePage\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllHomePagesRequest $request
     */
    public function index(GetAllHomePagesRequest $request)
    {
      $categories = Apiato::call('Site@GetAllProductCategoriesAction', [$request]);
      return view('homepage::index', compact('categories'));
    }

    /**
     * Show one entity
     *
     * @param FindHomePageByIdRequest $request
     */
    public function show(FindHomePageByIdRequest $request)
    {
        $category= Apiato::call('Category@GetAllCategoriesAction', [$request]);
        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateHomePageRequest $request
     */
    public function create(CreateHomePageRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreHomePageRequest $request
     */
    public function store(StoreHomePageRequest $request)
    {
        $homepage = Apiato::call('HomePage@CreateHomePageAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditHomePageRequest $request
     */
    public function edit(EditHomePageRequest $request)
    {
        $homepage = Apiato::call('HomePage@GetHomePageByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateHomePageRequest $request
     */
    public function update(UpdateHomePageRequest $request)
    {
        $homepage = Apiato::call('HomePage@UpdateHomePageAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteHomePageRequest $request
     */
    public function delete(DeleteHomePageRequest $request)
    {
         $result = Apiato::call('HomePage@DeleteHomePageAction', [$request]);

         // ..
    }
}
