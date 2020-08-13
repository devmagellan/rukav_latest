<?php

namespace App\Containers\Filter\Tasks;

use App\Containers\Filter\Data\Repositories\FilterRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllFiltersTask extends Task
{

    protected $repository;

    public function __construct(FilterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
