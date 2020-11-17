<?php

namespace App\Containers\Liqpay\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindLiqpayByIdAction extends Action
{
    public function run(Request $request)
    {
        $liqpay = Apiato::call('Liqpay@FindLiqpayByIdTask', [$request->id]);

        return $liqpay;
    }
}
