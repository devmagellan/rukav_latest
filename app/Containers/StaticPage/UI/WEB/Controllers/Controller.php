<?php

namespace App\Containers\StaticPage\UI\WEB\Controllers;

use App\Containers\StaticPage\UI\WEB\Requests\CreateStaticPageRequest;
use App\Containers\StaticPage\UI\WEB\Requests\DeleteStaticPageRequest;
use App\Containers\StaticPage\UI\WEB\Requests\GetAllStaticPagesRequest;
use App\Containers\StaticPage\UI\WEB\Requests\FindStaticPageByIdRequest;
use App\Containers\StaticPage\UI\WEB\Requests\UpdateStaticPageRequest;
use App\Containers\StaticPage\UI\WEB\Requests\StoreStaticPageRequest;
use App\Containers\StaticPage\UI\WEB\Requests\EditStaticPageRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\StaticPage\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllStaticPagesRequest $request
     */
    public function index(GetAllStaticPagesRequest $request)
    {
        $data['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);


        return view('staticpage::admin.index', $data);
    }

    public function postData(GetAllStaticPagesRequest $request)
    {
        $data['staticpages'] = Apiato::call('StaticPage@GetAllStaticPagesAction', [$request]);
        //dd($data['staticpages']);
        return view('staticpage::admin.table', $data);
        // ..
    }

    /**
     * Show one entity
     *
     * @param FindStaticPageByIdRequest $request
     */
    public function show(FindStaticPageByIdRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@FindStaticPageByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateStaticPageRequest $request
     */
    public function create(CreateStaticPageRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreStaticPageRequest $request
     */
    public function store(StoreStaticPageRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@CreateStaticPageAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditStaticPageRequest $request
     */
    public function edit(EditStaticPageRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@GetStaticPageByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateStaticPageRequest $request
     */
    public function update(UpdateStaticPageRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@UpdateStaticPageAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteStaticPageRequest $request
     */
    public function delete(DeleteStaticPageRequest $request)
    {
         $result = Apiato::call('StaticPage@DeleteStaticPageAction', [$request]);

         // ..
    }
}
