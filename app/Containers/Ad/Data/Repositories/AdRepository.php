<?php

namespace App\Containers\Ad\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AdRepository
 */
class AdRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
