<?php

namespace App\Containers\Filter\Tasks;

use App\Containers\Filter\Data\Repositories\FilterRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateFilterTask extends Task
{

    protected $repository;

    public function __construct(FilterRepository $repository)
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
