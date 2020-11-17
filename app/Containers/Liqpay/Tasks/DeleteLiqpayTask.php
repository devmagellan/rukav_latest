<?php

namespace App\Containers\Liqpay\Tasks;

use App\Containers\Liqpay\Data\Repositories\LiqpayRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteLiqpayTask extends Task
{

    protected $repository;

    public function __construct(LiqpayRepository $repository)
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
