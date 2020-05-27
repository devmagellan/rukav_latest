<?php

namespace App\Containers\Site\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class SiteRepository
 */
class SiteRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
