<?php

namespace App\Containers\AdminMenu\Tasks;

use App\Containers\AdminMenu\Data\Repositories\AdminMenuRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAdminMenuTask extends Task
{

    protected $repository;

    public function __construct(AdminMenuRepository $repository)
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
