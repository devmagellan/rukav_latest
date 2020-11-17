<?php

namespace App\Containers\Liqpay\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteLiqpayAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Liqpay@DeleteLiqpayTask', [$request->id]);
    }
}
