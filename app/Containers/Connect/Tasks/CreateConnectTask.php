<?php

namespace App\Containers\Connect\Tasks;

use App\Containers\Connect\Data\Repositories\ConnectRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateConnectTask extends Task
{

    protected $repository;

    public function __construct(ConnectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            dd($exception);
            throw new CreateResourceFailedException();
        }
    }
}
