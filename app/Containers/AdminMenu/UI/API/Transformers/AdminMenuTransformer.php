<?php

namespace App\Containers\AdminMenu\UI\API\Transformers;

use App\Containers\AdminMenu\Models\AdminMenu;
use App\Ship\Parents\Transformers\Transformer;

class AdminMenuTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [

    ];

    /**
     * @param AdminMenu $entity
     *
     * @return array
     */
    public function transform(AdminMenu $entity)
    {
        $response = [
            'object' => 'AdminMenu',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }
}
