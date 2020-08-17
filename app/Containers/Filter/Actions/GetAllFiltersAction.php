<?php

namespace App\Containers\Filter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllFiltersAction extends Action
{
    public function run(Request $request)
    {
        $filters = Apiato::call('Filter@GetAllFiltersTask', [], ['addRequestCriteria']);

        return $filters;
    }
}
