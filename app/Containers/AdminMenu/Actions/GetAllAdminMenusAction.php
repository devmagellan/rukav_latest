<?php

namespace App\Containers\AdminMenu\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAdminMenusAction extends Action
{
    public function run(Request $request)
    {

        $adminmenus = Apiato::call('AdminMenu@GetAllAdminMenusTask', [], ['addRequestCriteria']);
       //Выводи меню на экран с помощью рекурсивной функции
        ob_start();
        Apiato::call('AdminMenu@GenerateAdminMenuViewTask', [$adminmenus->toArray()], ['addRequestCriteria']);
        $adminmenus = ob_get_contents();
        ob_end_clean();
        return $adminmenus;
    }
}
