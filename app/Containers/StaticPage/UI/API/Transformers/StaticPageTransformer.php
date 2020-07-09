<?php

namespace App\Containers\StaticPage\UI\API\Transformers;

use App\Containers\StaticPage\Models\StaticPage;
use App\Ship\Parents\Transformers\Transformer;

class StaticPageTransformer extends Transformer
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
     * @param StaticPage $entity
     *
     * @return array
     */
    public function transform(StaticPage $entity)
    {
        $response = [
            'object' => 'StaticPage',
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
