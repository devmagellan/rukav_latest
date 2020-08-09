<?php

namespace App\Containers\AdminMenu\Tasks;

use App\Containers\AdminMenu\Data\Repositories\AdminMenuRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAdminMenuByIdTask extends Task
{

    protected $repository;

    public function __construct(AdminMenuRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
