<?php

namespace App\Containers\HomePage\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllHomePagesAction extends Action
{
    public function run(Request $request)
    {
        $homepages = Apiato::call('HomePage@GetAllHomePagesTask', [], ['addRequestCriteria']);

        return $homepages;
    }
}
