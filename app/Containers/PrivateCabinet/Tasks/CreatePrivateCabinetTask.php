<?php

namespace App\Containers\PrivateCabinet\Tasks;

use App\Containers\PrivateCabinet\Data\Repositories\PrivateCabinetRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreatePrivateCabinetTask extends Task
{

    protected $repository;

    public function __construct(PrivateCabinetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
