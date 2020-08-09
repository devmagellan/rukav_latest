<?php

namespace App\Containers\Connect\Tasks;

use App\Containers\Connect\Data\Repositories\ConnectRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindConnectByIdTask extends Task
{

    protected $repository;

    public function __construct(ConnectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
