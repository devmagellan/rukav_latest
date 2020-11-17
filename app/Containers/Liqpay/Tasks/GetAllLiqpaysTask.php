<?php

namespace App\Containers\Liqpay\Tasks;

use App\Containers\Liqpay\Data\Repositories\LiqpayRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllLiqpaysTask extends Task
{

    protected $repository;

    public function __construct(LiqpayRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
