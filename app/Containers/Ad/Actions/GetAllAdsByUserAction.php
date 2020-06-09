<?php

namespace App\Containers\Ad\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAdsByUserAction extends Action
{
    public function run(Request $request)
    {
        $ads = Apiato::call('Ad@GetAllAdsTask', [], ['ThisUserCriteria']);
        return $ads;
    }
}
