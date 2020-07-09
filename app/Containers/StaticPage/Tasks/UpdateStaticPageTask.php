<?php

namespace App\Containers\StaticPage\Tasks;

use App\Containers\StaticPage\Data\Repositories\StaticPageRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateStaticPageTask extends Task
{

    protected $repository;

    public function __construct(StaticPageRepository $repository)
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
