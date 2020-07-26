<?php

namespace App\Containers\Page\UI\WEB\Controllers;

use App\Containers\Page\UI\WEB\Requests\CreatePageRequest;
use App\Containers\Page\UI\WEB\Requests\DeletePageRequest;
use App\Containers\Page\UI\WEB\Requests\GetAllPagesRequest;
use App\Containers\Page\UI\WEB\Requests\FindPageByIdRequest;
use App\Containers\Page\UI\WEB\Requests\UpdatePageRequest;
use App\Containers\Page\UI\WEB\Requests\StorePageRequest;
use App\Containers\Page\UI\WEB\Requests\EditPageRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Page\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllPagesRequest $request
     */
    public function index(GetAllPagesRequest $request)
    {
        $pages = Apiato::call('Page@GetAllPagesAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindPageByIdRequest $request
     */
    public function show(FindPageByIdRequest $request)
    {
        $page = Apiato::call('Page@FindPageByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreatePageRequest $request
     */
    public function create(CreatePageRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StorePageRequest $request
     */
    public function store(StorePageRequest $request)
    {
        $page = Apiato::call('Page@CreatePageAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditPageRequest $request
     */
    public function edit(EditPageRequest $request)
    {
        $page = Apiato::call('Page@GetPageByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdatePageRequest $request
     */
    public function update(UpdatePageRequest $request)
    {
        $page = Apiato::call('Page@UpdatePageAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeletePageRequest $request
     */
    public function delete(DeletePageRequest $request)
    {
         $result = Apiato::call('Page@DeletePageAction', [$request]);

         // ..
    }


    public function confidencial(GetAllPagesRequest $request)
    {
        $data['properties']=$this->getMainProperties($request);
        return view('page::politics.confidencial', compact('categoriesOnlyRoot', 'categories','user','data'));
    }

    public function adv(GetAllPagesRequest $request)
    {
        $data['properties']=$this->getMainProperties($request);
        $categoriesOnlyRoot = $data['properties']->categories->where('parent_id', 0);
        return view('page::adv.index', compact('categoriesOnlyRoot', 'data'));
    }
	
	public function about(GetAllPagesRequest $request)
    {
        $data['properties']=$this->getMainProperties($request);
        $categoriesOnlyRoot = $data['properties']->categories->where('parent_id', 0);
        return view('page::about_us.index', compact('categoriesOnlyRoot', 'data'));
    }


    public function career(GetAllPagesRequest $request)
    {
        $data['properties']=$this->getMainProperties($request);
        $categoriesOnlyRoot = $data['properties']->categories->where('parent_id', 0);
        return view('page::career.index', compact('categoriesOnlyRoot', 'data'));
    }


}
