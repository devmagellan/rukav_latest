<?php

namespace App\Containers\Customer\UI\API\Transformers;

use App\Containers\Customer\Models\Customer;
use App\Ship\Parents\Transformers\Transformer;

class CustomerTransformer extends Transformer
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
     * @param Customer $entity
     *
     * @return array
     */
    public function transform(Customer $entity)
    {
        $response = [
            'object' => 'Customer',
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
