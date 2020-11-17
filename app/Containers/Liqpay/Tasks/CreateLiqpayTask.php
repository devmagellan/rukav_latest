<?php

namespace App\Containers\Liqpay\Tasks;

use App\Containers\Liqpay\Data\Repositories\LiqpayRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateLiqpayTask extends Task
{

    protected $repository;

    public function __construct(LiqpayRepository $repository)
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
