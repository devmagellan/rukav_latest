<?php

namespace App\Containers\Site\Tasks;

use App\Containers\Site\Data\Repositories\ProductCategoryRepository;
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
        return $this->repository->get();
    }
}
