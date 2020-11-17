<?php

namespace App\Containers\Liqpay\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateLiqpayAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $liqpay = Apiato::call('Liqpay@UpdateLiqpayTask', [$request->id, $data]);

        return $liqpay;
    }
}
