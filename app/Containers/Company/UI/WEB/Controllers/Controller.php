<?php

namespace App\Containers\Company\UI\WEB\Controllers;

use App\Containers\Company\UI\WEB\Requests\CreateCompanyRequest;
use App\Containers\Company\UI\WEB\Requests\DeleteCompanyRequest;
use App\Containers\Company\UI\WEB\Requests\GetAllCompaniesRequest;
use App\Containers\Company\UI\WEB\Requests\FindCompanyByIdRequest;
use App\Containers\Company\UI\WEB\Requests\UpdateCompanyRequest;
use App\Containers\Company\UI\WEB\Requests\StoreCompanyRequest;
use App\Containers\Company\UI\WEB\Requests\EditCompanyRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Company\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllCompaniesRequest $request
     */
    public function index(GetAllCompaniesRequest $request)
    {
        $companies = Apiato::call('Company@GetAllCompaniesAction', [$request]);

        // ..
    }

    /**
     * Show one entity
     *
     * @param FindCompanyByIdRequest $request
     */
    public function show(FindCompanyByIdRequest $request)
    {
        $company = Apiato::call('Company@FindCompanyByIdAction', [$request]);

        // ..
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateCompanyRequest $request
     */
    public function create(CreateCompanyRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreCompanyRequest $request
     */
    public function store(StoreCompanyRequest $request)
    {
        $company = Apiato::call('Company@CreateCompanyAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditCompanyRequest $request
     */
    public function edit(EditCompanyRequest $request)
    {
        $company = Apiato::call('Company@GetCompanyByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateCompanyRequest $request
     */
    public function update(UpdateCompanyRequest $request)
    {
        $company = Apiato::call('Company@UpdateCompanyAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteCompanyRequest $request
     */
    public function delete(DeleteCompanyRequest $request)
    {
         $result = Apiato::call('Company@DeleteCompanyAction', [$request]);

         // ..
    }
}
