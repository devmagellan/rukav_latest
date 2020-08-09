<?php

namespace App\Containers\Ad\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllAdsDataTableAction extends Action
{
    public function run(Request $request)
    {

        $ads = Apiato::call('Ad@GetAllAdsDataTableTask',  [$request],['OrderByNameCriteria']);

        return $ads;
    }
}
