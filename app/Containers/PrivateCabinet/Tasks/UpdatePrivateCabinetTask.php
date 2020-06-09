<?php

namespace App\Containers\PrivateCabinet\Tasks;

use App\Containers\PrivateCabinet\Data\Repositories\PrivateCabinetRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdatePrivateCabinetTask extends Task
{

    protected $repository;

    public function __construct(PrivateCabinetRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
