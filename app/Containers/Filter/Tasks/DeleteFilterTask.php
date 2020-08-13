<?php

namespace App\Containers\Filter\Tasks;

use App\Containers\Filter\Data\Repositories\FilterRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteFilterTask extends Task
{

    protected $repository;

    public function __construct(FilterRepository $repository)
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
