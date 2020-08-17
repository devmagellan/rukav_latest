<?php

namespace App\Containers\Filter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindFilterByIdAction extends Action
{
    public function run(Request $request)
    {
        $filter = Apiato::call('Filter@FindFilterByIdTask', [$request->id]);

        return $filter;
    }
}
