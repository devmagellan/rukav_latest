<?php

namespace App\Containers\Liqpay\Tasks;

use App\Containers\Liqpay\Data\Repositories\LiqpayRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindLiqpayByIdTask extends Task
{

    protected $repository;

    public function __construct(LiqpayRepository $repository)
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
