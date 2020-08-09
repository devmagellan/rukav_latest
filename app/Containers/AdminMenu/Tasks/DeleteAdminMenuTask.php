<?php

namespace App\Containers\AdminMenu\Tasks;

use App\Containers\AdminMenu\Data\Repositories\AdminMenuRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAdminMenuTask extends Task
{

    protected $repository;

    public function __construct(AdminMenuRepository $repository)
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
