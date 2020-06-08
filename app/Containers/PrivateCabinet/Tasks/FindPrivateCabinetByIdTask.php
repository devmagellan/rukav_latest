<?php

namespace App\Containers\PrivateCabinet\Tasks;

use App\Containers\PrivateCabinet\Data\Repositories\PrivateCabinetRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindPrivateCabinetByIdTask extends Task
{

    protected $repository;

    public function __construct(PrivateCabinetRepository $repository)
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
