<?php

namespace App\Containers\Filter\Tasks;

use App\Containers\Filter\Data\Repositories\FilterDealsRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllFilterDealsTask extends Task
{

    protected $repository;

    public function __construct(FilterDealsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
