<?php

namespace App\Containers\PrivateCabinet\Tasks;

use App\Containers\PrivateCabinet\Data\Repositories\PrivateCabinetRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllPrivateCabinetsTask extends Task
{

    protected $repository;

    public function __construct(PrivateCabinetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
