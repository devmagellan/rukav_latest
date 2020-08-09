<?php

namespace App\Containers\AdminPanel\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class AdminPanelRepository
 */
class AdminPanelRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
