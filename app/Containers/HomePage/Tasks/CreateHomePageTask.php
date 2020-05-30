<?php

namespace App\Containers\HomePage\Tasks;

use App\Containers\HomePage\Data\Repositories\HomePageRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateHomePageTask extends Task
{

    protected $repository;

    public function __construct(HomePageRepository $repository)
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
