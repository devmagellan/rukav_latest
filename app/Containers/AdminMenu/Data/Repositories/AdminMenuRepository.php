<?php

namespace App\Containers\AdminMenu\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AdminMenuRepository
 */
class AdminMenuRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
