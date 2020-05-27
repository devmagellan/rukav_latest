<?php

namespace App\Containers\Site\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllProductCategoriesAction extends Action
{
    public function run(Request $request)
    {
       $rubrics = Apiato::call('Site@GetAllProductCategoriesTask', [], ['addRequestCriteria']);
       return $rubrics;
    }
}
