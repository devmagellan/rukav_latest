<?php

namespace App\Containers\Site\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ProductCategoryRepository
 */
class ProductCategoryRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];

}
