<?php

namespace App\Containers\PrivateCabinet\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllPrivateCabinetsAction extends Action
{
    public function run(Request $request)
    {
        $privatecabinets = Apiato::call('PrivateCabinet@GetAllPrivateCabinetsTask', [], ['addRequestCriteria']);

        return $privatecabinets;
    }
}
