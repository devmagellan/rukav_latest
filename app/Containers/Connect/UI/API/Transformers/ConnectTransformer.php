<?php

namespace App\Containers\Connect\UI\API\Transformers;

use App\Containers\Connect\Models\Connect;
use App\Ship\Parents\Transformers\Transformer;

class ConnectTransformer extends Transformer
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
     * @param Connect $entity
     *
     * @return array
     */
    public function transform(Connect $entity)
    {
        $response = [
            'object' => 'Connect',
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
