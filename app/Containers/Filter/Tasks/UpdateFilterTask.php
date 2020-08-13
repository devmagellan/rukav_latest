<?php

namespace App\Containers\Filter\Tasks;

use App\Containers\Filter\Data\Repositories\FilterRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateFilterTask extends Task
{

    protected $repository;

    public function __construct(FilterRepository $repository)
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
