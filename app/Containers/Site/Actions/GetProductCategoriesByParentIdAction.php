<?php

namespace App\Containers\Site\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetProductCategoriesByParentIdAction extends Action
{
    public function run($parent_id)
    {
        $adminmenus = Apiato::call('Site@GetAllProductCategoriesTask', [], ['addRequestCriteria']);

        //Выводи меню на экран с помощью рекурсивной функции
        ob_start();
        Apiato::call('Site@GenerateProductCategoriesViewTask', [$adminmenus->toArray()], ['addRequestCriteria']);
        $adminmenus = ob_get_contents();
        ob_end_clean();
        return $adminmenus;
    }

}
