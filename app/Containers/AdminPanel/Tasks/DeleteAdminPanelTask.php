<?php

namespace App\Containers\AdminPanel\Tasks;

use App\Containers\AdminPanel\Data\Repositories\AdminPanelRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAdminPanelTask extends Task
{

    protected $repository;

    public function __construct(AdminPanelRepository $repository)
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
