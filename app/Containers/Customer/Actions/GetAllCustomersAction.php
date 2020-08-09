<?php

namespace App\Containers\Customer\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllCustomersAction extends Action
{
    public function run(Request $request)
    {
        $customers = Apiato::call('Customer@GetAllCustomersTask', [], ['addRequestCriteria']);

        return $customers;
    }
}
