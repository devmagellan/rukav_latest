<?php

namespace App\Containers\Ad\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateAdAction extends Action
{
    public function run(Request $request)
    {

        $ad = Apiato::call('Ad@CreateAdTask', [$request]);
        \Log::info('Ad4',array($ad));
        return $ad;
    }
}
