<?php

namespace App\Containers\AdminMenu\Tasks;

use App\Containers\AdminMenu\Data\Repositories\AdminMenuRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAdminMenuTask extends Task
{

    protected $repository;

    public function __construct(AdminMenuRepository $repository)
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
