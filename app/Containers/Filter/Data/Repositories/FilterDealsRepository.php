<?php

namespace App\Containers\Filter\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class FilterRepository
 */
class FilterDealsRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
