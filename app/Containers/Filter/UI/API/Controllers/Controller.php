<?php

namespace App\Containers\Filter\UI\API\Controllers;

use App\Containers\Filter\UI\API\Requests\CreateFilterRequest;
use App\Containers\Filter\UI\API\Requests\DeleteFilterRequest;
use App\Containers\Filter\UI\API\Requests\GetAllFiltersRequest;
use App\Containers\Filter\UI\API\Requests\FindFilterByIdRequest;
use App\Containers\Filter\UI\API\Requests\UpdateFilterRequest;
use App\Containers\Filter\UI\API\Transformers\FilterTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Filter\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateFilterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createFilter(CreateFilterRequest $request)
    {
        $filter = Apiato::call('Filter@CreateFilterAction', [$request]);

        return $this->created($this->transform($filter, FilterTransformer::class));
    }

    /**
     * @param FindFilterByIdRequest $request
     * @return array
     */
    public function findFilterById(FindFilterByIdRequest $request)
    {
        $filter = Apiato::call('Filter@FindFilterByIdAction', [$request]);

        return $this->transform($filter, FilterTransformer::class);
    }

    /**
     * @param GetAllFiltersRequest $request
     * @return array
     */
    public function getAllFilters(GetAllFiltersRequest $request)
    {
        $filters = Apiato::call('Filter@GetAllFiltersAction', [$request]);

        return $this->transform($filters, FilterTransformer::class);
    }

    /**
     * @param UpdateFilterRequest $request
     * @return array
     */
    public function updateFilter(UpdateFilterRequest $request)
    {
        $filter = Apiato::call('Filter@UpdateFilterAction', [$request]);

        return $this->transform($filter, FilterTransformer::class);
    }

    /**
     * @param DeleteFilterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFilter(DeleteFilterRequest $request)
    {
        Apiato::call('Filter@DeleteFilterAction', [$request]);

        return $this->noContent();
    }
}
