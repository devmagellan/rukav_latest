<?php

namespace App\Containers\Connect\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ConnectRepository
 */
class ConnectRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
