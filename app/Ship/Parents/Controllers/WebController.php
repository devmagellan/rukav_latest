<?php

namespace App\Ship\Parents\Controllers;

use Apiato\Core\Abstracts\Controllers\WebController as AbstractWebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Requests\Request;
/**
 * Class WebController.
 *
 * @author  Mahmoud Zalt <mahmoud@zalt.me>
 */
abstract class WebController extends AbstractWebController
{

    public function getMainProperties(Request $request){
        $this->categories= Apiato::call('Site@GetAllProductCategoriesAction', [$request]);
        $this->categoriesOnlyRoot = $this->categories->where('parent_id', 0);
        $this->user=null;
        if(\Auth::user()){
            $this->user=\App\Containers\User\Models\User::where('id',\Auth::user()->id)->first();}
            return $this;
    }
}
