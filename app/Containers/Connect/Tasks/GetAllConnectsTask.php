<?php

namespace App\Containers\Connect\Tasks;

use App\Containers\Connect\Data\Repositories\ConnectRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllConnectsTask extends Task
{

    protected $repository;

    public function __construct(ConnectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
