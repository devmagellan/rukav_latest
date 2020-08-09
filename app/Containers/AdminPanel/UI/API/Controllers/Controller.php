<?php

namespace App\Containers\AdminPanel\UI\API\Controllers;

use App\Containers\AdminPanel\UI\API\Requests\CreateAdminPanelRequest;
use App\Containers\AdminPanel\UI\API\Requests\DeleteAdminPanelRequest;
use App\Containers\AdminPanel\UI\API\Requests\GetAllAdminPanelsRequest;
use App\Containers\AdminPanel\UI\API\Requests\FindAdminPanelByIdRequest;
use App\Containers\AdminPanel\UI\API\Requests\UpdateAdminPanelRequest;
use App\Containers\AdminPanel\UI\API\Transformers\AdminPanelTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\AdminPanel\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateAdminPanelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createAdminPanel(CreateAdminPanelRequest $request)
    {
        $adminpanel = Apiato::call('AdminPanel@CreateAdminPanelAction', [$request]);

        return $this->created($this->transform($adminpanel, AdminPanelTransformer::class));
    }

    /**
     * @param FindAdminPanelByIdRequest $request
     * @return array
     */
    public function findAdminPanelById(FindAdminPanelByIdRequest $request)
    {
        $adminpanel = Apiato::call('AdminPanel@FindAdminPanelByIdAction', [$request]);

        return $this->transform($adminpanel, AdminPanelTransformer::class);
    }

    /**
     * @param GetAllAdminPanelsRequest $request
     * @return array
     */
    public function getAllAdminPanels(GetAllAdminPanelsRequest $request)
    {
        $adminpanels = Apiato::call('AdminPanel@GetAllAdminPanelsAction', [$request]);

        return $this->transform($adminpanels, AdminPanelTransformer::class);
    }

    /**
     * @param UpdateAdminPanelRequest $request
     * @return array
     */
    public function updateAdminPanel(UpdateAdminPanelRequest $request)
    {
        $adminpanel = Apiato::call('AdminPanel@UpdateAdminPanelAction', [$request]);

        return $this->transform($adminpanel, AdminPanelTransformer::class);
    }

    /**
     * @param DeleteAdminPanelRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAdminPanel(DeleteAdminPanelRequest $request)
    {
        Apiato::call('AdminPanel@DeleteAdminPanelAction', [$request]);

        return $this->noContent();
    }
}
