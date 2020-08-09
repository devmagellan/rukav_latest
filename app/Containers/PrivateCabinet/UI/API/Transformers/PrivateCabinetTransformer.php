<?php

namespace App\Containers\PrivateCabinet\UI\API\Transformers;

use App\Containers\PrivateCabinet\Models\PrivateCabinet;
use App\Ship\Parents\Transformers\Transformer;

class PrivateCabinetTransformer extends Transformer
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
     * @param PrivateCabinet $entity
     *
     * @return array
     */
    public function transform(PrivateCabinet $entity)
    {
        $response = [
            'object' => 'PrivateCabinet',
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
