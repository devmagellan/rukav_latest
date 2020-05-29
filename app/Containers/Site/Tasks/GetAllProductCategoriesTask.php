<?php

namespace App\Containers\Site\Tasks;

use App\Containers\Site\Data\Repositories\ProductCategoryRepository;
use App\Ship\Criterias\Eloquent\CreatedTodayCriteria;
use App\Ship\Parents\Tasks\Task;

class GetAllProductCategoriesTask extends Task
{

    protected $repository;

    public function __construct(ProductCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->where('parent_id', 0)->with('childrenCategories')->get();
    }
}
