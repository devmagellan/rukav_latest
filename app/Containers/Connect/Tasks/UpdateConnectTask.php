<?php

namespace App\Containers\Connect\Tasks;

use App\Containers\Connect\Data\Repositories\ConnectRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateConnectTask extends Task
{

    protected $repository;

    public function __construct(ConnectRepository $repository)
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
