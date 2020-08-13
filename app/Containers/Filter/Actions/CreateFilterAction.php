<?php

namespace App\Containers\Filter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateFilterAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $filter = Apiato::call('Filter@CreateFilterTask', [$data]);

        return $filter;
    }
}
