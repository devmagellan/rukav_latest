<?php

namespace App\Containers\Site\Tasks;

use App\Containers\Site\Data\Repositories\SiteRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSitesTask extends Task
{

    protected $repository;

    public function __construct(SiteRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
