<?php

namespace App\Containers\StaticPage\UI\API\Controllers;

use App\Containers\StaticPage\UI\API\Requests\CreateStaticPageRequest;
use App\Containers\StaticPage\UI\API\Requests\DeleteStaticPageRequest;
use App\Containers\StaticPage\UI\API\Requests\GetAllStaticPagesRequest;
use App\Containers\StaticPage\UI\API\Requests\FindStaticPageByIdRequest;
use App\Containers\StaticPage\UI\API\Requests\UpdateStaticPageRequest;
use App\Containers\StaticPage\UI\API\Transformers\StaticPageTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\StaticPage\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateStaticPageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createStaticPage(CreateStaticPageRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@CreateStaticPageAction', [$request]);

        return $this->created($this->transform($staticpage, StaticPageTransformer::class));
    }

    /**
     * @param FindStaticPageByIdRequest $request
     * @return array
     */
    public function findStaticPageById(FindStaticPageByIdRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@FindStaticPageByIdAction', [$request]);

        return $this->transform($staticpage, StaticPageTransformer::class);
    }

    /**
     * @param GetAllStaticPagesRequest $request
     * @return array
     */
    public function getAllStaticPages(GetAllStaticPagesRequest $request)
    {
        $staticpages = Apiato::call('StaticPage@GetAllStaticPagesAction', [$request]);

        return $this->transform($staticpages, StaticPageTransformer::class);
    }

    /**
     * @param UpdateStaticPageRequest $request
     * @return array
     */
    public function updateStaticPage(UpdateStaticPageRequest $request)
    {
        $staticpage = Apiato::call('StaticPage@UpdateStaticPageAction', [$request]);

        return $this->transform($staticpage, StaticPageTransformer::class);
    }

    /**
     * @param DeleteStaticPageRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteStaticPage(DeleteStaticPageRequest $request)
    {
        Apiato::call('StaticPage@DeleteStaticPageAction', [$request]);

        return $this->noContent();
    }
}
