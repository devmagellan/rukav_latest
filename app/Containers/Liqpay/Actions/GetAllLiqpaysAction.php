<?php

namespace App\Containers\Liqpay\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllLiqpaysAction extends Action
{
    public function run(Request $request)
    {
        $liqpays = Apiato::call('Liqpay@GetAllLiqpaysTask', [], ['addRequestCriteria']);

        return $liqpays;
    }
}
