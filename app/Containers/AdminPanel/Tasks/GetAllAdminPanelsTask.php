<?php

namespace App\Containers\AdminPanel\Tasks;

use App\Containers\AdminPanel\Data\Repositories\AdminPanelRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAdminPanelsTask extends Task
{

    protected $repository;

    public function __construct(AdminPanelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
