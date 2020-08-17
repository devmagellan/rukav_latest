<?php

namespace App\Containers\Filter\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateFilterAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $filter = Apiato::call('Filter@UpdateFilterTask', [$request->id, $data]);

        return $filter;
    }
}
