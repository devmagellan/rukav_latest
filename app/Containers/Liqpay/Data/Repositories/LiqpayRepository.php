<?php

namespace App\Containers\Liqpay\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class LiqpayRepository
 */
class LiqpayRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
