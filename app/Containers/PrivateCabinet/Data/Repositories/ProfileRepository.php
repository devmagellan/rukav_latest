<?php

namespace App\Containers\PrivateCabinet\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class PrivateCabinetRepository
 */
class ProfileRepository extends Repository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
