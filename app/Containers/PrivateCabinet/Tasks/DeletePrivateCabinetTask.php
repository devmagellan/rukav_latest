<?php

namespace App\Containers\PrivateCabinet\Tasks;

use App\Containers\PrivateCabinet\Data\Repositories\PrivateCabinetRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeletePrivateCabinetTask extends Task
{

    protected $repository;

    public function __construct(PrivateCabinetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
