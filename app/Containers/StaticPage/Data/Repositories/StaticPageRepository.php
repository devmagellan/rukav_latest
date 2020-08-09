<?php

namespace App\Containers\StaticPage\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class StaticPageRepository
 */
class StaticPageRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
