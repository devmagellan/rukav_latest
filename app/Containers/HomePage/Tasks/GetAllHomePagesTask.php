<?php

namespace App\Containers\HomePage\Tasks;

use App\Containers\HomePage\Data\Repositories\HomePageRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllHomePagesTask extends Task
{

    protected $repository;

    public function __construct(HomePageRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
