<?php

namespace App\Containers\StaticPage\Tasks;

use App\Containers\StaticPage\Data\Repositories\StaticPageRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateStaticPageTask extends Task
{

    protected $repository;

    public function __construct(StaticPageRepository $repository)
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
