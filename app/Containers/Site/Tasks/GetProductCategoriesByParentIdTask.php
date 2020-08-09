<?php

namespace App\Containers\Site\Tasks;

use App\Containers\Site\Data\Repositories\ProductCategoryRepository;
use App\Ship\Parents\Tasks\Task;
use App\Containers\Site\Criterias\WhereParentIdCriteria;

class GetProductCategoriesByParentIdTask extends Task
{

    protected $repository;

    public function __construct(ProductCategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($parentId)
    {
        $this->repository->pushCriteria(new WhereParentIdCriteria($parentId));
        return $this->repository->get();
    }
}
