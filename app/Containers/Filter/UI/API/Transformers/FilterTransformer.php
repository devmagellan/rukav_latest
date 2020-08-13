<?php

namespace App\Containers\Filter\UI\API\Transformers;

use App\Containers\Filter\Models\Filter;
use App\Ship\Parents\Transformers\Transformer;

class FilterTransformer extends Transformer
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
     * @param Filter $entity
     *
     * @return array
     */
    public function transform(Filter $entity)
    {
        $response = [
            'object' => 'Filter',
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
