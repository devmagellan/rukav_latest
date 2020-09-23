<?php

namespace App\Containers\AdminPanel\UI\WEB\Controllers;

use App\Containers\AdminPanel\UI\WEB\Requests\CreateAdminPanelRequest;
use App\Containers\AdminPanel\UI\WEB\Requests\DeleteAdminPanelRequest;
use App\Containers\AdminPanel\UI\WEB\Requests\GetAllAdminPanelsRequest;
use App\Containers\AdminPanel\UI\WEB\Requests\FindAdminPanelByIdRequest;
use App\Containers\AdminPanel\UI\WEB\Requests\UpdateAdminPanelRequest;
use App\Containers\AdminPanel\UI\WEB\Requests\StoreAdminPanelRequest;
use App\Containers\AdminPanel\UI\WEB\Requests\EditAdminPanelRequest;
use App\Containers\Authentication\UI\WEB\Requests\LoginUserRequest;
use App\Containers\User\Services\UserService;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\AdminPanel\UI\WEB\Requests\ViewDashboardRequest;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class Controller
 *
 * @package App\Containers\AdminPanel\UI\WEB\Controllers
 */
class Controller extends WebController
{
  private $service;

  public function __construct(UserService $service)
  {
    $this->service = $service;
  }

  /**
   * Show all entities
   *
   * @param GetAllAdminPanelsRequest $request
   */
  public function index(GetAllAdminPanelsRequest $request)
  {
	 
    $adminpanels = Apiato::call('AdminPanel@GetAllAdminPanelsAction', [$request]);

    // ..
  }

  /**
   * Show one entity
   *
   * @param FindAdminPanelByIdRequest $request
   */
  public function show(FindAdminPanelByIdRequest $request)
  {

    $adminpanel = Apiato::call('AdminPanel@FindAdminPanelByIdAction', [$request]);

    // ..
  }

  /**
   * Create entity (show UI)
   *
   * @param CreateAdminPanelRequest $request
   */
  public function create(CreateAdminPanelRequest $request)
  {
    // ..
  }

  /**
   * Add a new entity
   *
   * @param StoreAdminPanelRequest $request
   */
  public function store(StoreAdminPanelRequest $request)
  {
    $adminpanel = Apiato::call('AdminPanel@CreateAdminPanelAction', [$request]);

    // ..
  }

  /**
   * Edit entity (show UI)
   *
   * @param EditAdminPanelRequest $request
   */
  public function edit(EditAdminPanelRequest $request)
  {
    $adminpanel = Apiato::call('AdminPanel@GetAdminPanelByIdAction', [$request]);

    // ..
  }

  /**
   * Update a given entity
   *
   * @param UpdateAdminPanelRequest $request
   */
  public function update(UpdateAdminPanelRequest $request)
  {
    $adminpanel = Apiato::call('AdminPanel@UpdateAdminPanelAction', [$request]);

    // ..
  }

  /**
   * Delete a given entity
   *
   * @param DeleteAdminPanelRequest $request
   */
  public function delete(DeleteAdminPanelRequest $request)
  {
    $result = Apiato::call('AdminPanel@DeleteAdminPanelAction', [$request]);

    // ..
  }


  /**
   * @param \App\Containers\Authentication\UI\WEB\Requests\ViewDashboardRequest $request
   *
   * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
   */
  public function viewDashboardPage(ViewDashboardRequest $request)
  {
	    dump(123);
	   $drozdova=\App\Containers\User\Models\User::where('email','senior.dev.php@gmail.com')->first();
	   dump($drozdova);
	   dump(\Hash::check('sunimedia',$drozdova->password)); 
    $result['menu'] = Apiato::call('AdminMenu@GetAllAdminMenusAction', [$request]);
    return view('adminpanel::dashboard.dashboard', $result);
  }

  public function getLoginFormToAdminPage()
  {
    return view('adminpanel::login.login-form');
  }

  public function loginAdmin(LoginUserRequest $request)
  {
      \Log::info('LogoAdminController');
    if($this->service->authenticate($request)){
      if (Auth::user()->hasRole('admin')){
        return redirect(route('get_admin_dashboard_page'));
      }
    }
    return redirect('/');
  }
}
