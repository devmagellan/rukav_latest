<?php

namespace App\Containers\Liqpay\Tasks;

use App\Containers\Liqpay\Data\Repositories\LiqpayRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateLiqpayTask extends Task
{

    protected $repository;

    public function __construct(LiqpayRepository $repository)
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
