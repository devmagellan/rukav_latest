<?php

namespace App\Containers\HomePage\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class HomePageRepository
 */
class HomePageRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
