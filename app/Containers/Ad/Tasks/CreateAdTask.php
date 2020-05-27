<?php

namespace App\Containers\Ad\Tasks;

use App\Containers\Ad\Data\Repositories\AdRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAdTask extends Task
{

    protected $repository;

    public function __construct(AdRepository $repository)
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
