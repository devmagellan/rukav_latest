<?php

namespace App\Containers\HomePage\Tasks;

use App\Containers\HomePage\Data\Repositories\HomePageRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateHomePageTask extends Task
{

    protected $repository;

    public function __construct(HomePageRepository $repository)
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
