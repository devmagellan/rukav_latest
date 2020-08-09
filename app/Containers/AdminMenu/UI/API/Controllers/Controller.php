<?php

namespace App\Containers\AdminMenu\UI\API\Controllers;

use App\Containers\AdminMenu\UI\API\Requests\CreateAdminMenuRequest;
use App\Containers\AdminMenu\UI\API\Requests\DeleteAdminMenuRequest;
use App\Containers\AdminMenu\UI\API\Requests\GetAllAdminMenusRequest;
use App\Containers\AdminMenu\UI\API\Requests\FindAdminMenuByIdRequest;
use App\Containers\AdminMenu\UI\API\Requests\UpdateAdminMenuRequest;
use App\Containers\AdminMenu\UI\API\Transformers\AdminMenuTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AdminMenu\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAdminMenuRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAdminMenu(CreateAdminMenuRequest $request)
    {
        $adminmenu = Apiato::call('AdminMenu@CreateAdminMenuAction', [$request]);

        return $this->created($this->transform($adminmenu, AdminMenuTransformer::class));
    }

    /**
     * @param FindAdminMenuByIdRequest $request
     * @return array
     */
    public function findAdminMenuById(FindAdminMenuByIdRequest $request)
    {
        $adminmenu = Apiato::call('AdminMenu@FindAdminMenuByIdAction', [$request]);

        return $this->transform($adminmenu, AdminMenuTransformer::class);
    }

    /**
     * @param GetAllAdminMenusRequest $request
     * @return array
     */
    public function getAllAdminMenus(GetAllAdminMenusRequest $request)
    {
        $adminmenus = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);

        return $this->transform($adminmenus, AdminMenuTransformer::class);
    }

    /**
     * @param UpdateAdminMenuRequest $request
     * @return array
     */
    public function updateAdminMenu(UpdateAdminMenuRequest $request)
    {
        $adminmenu = Apiato::call('AdminMenu@UpdateAdminMenuAction', [$request]);

        return $this->transform($adminmenu, AdminMenuTransformer::class);
    }

    /**
     * @param DeleteAdminMenuRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAdminMenu(DeleteAdminMenuRequest $request)
    {
        Apiato::call('AdminMenu@DeleteAdminMenuAction', [$request]);

        return $this->noContent();
    }
}
