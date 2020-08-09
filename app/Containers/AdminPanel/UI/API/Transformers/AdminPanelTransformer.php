<?php

namespace App\Containers\AdminPanel\UI\API\Transformers;

use App\Containers\AdminPanel\Models\AdminPanel;
use App\Ship\Parents\Transformers\Transformer;

class AdminPanelTransformer extends Transformer
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
     * @param AdminPanel $entity
     *
     * @return array
     */
    public function transform(AdminPanel $entity)
    {
        $response = [
            'object' => 'AdminPanel',
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
