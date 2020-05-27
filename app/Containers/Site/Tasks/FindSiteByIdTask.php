<?php

namespace App\Containers\Site\Tasks;

use App\Containers\Site\Data\Repositories\SiteRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSiteByIdTask extends Task
{

    protected $repository;

    public function __construct(SiteRepository $repository)
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
