<?php

namespace App\Containers\HomePage\Tasks;

use App\Containers\HomePage\Data\Repositories\HomePageRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteHomePageTask extends Task
{

    protected $repository;

    public function __construct(HomePageRepository $repository)
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
