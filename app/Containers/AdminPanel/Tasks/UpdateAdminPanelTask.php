<?php

namespace App\Containers\AdminPanel\Tasks;

use App\Containers\AdminPanel\Data\Repositories\AdminPanelRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAdminPanelTask extends Task
{

    protected $repository;

    public function __construct(AdminPanelRepository $repository)
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
