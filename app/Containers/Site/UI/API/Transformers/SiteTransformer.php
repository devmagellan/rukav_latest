<?php

namespace App\Containers\Site\UI\API\Transformers;

use App\Containers\Site\Models\Site;
use App\Ship\Parents\Transformers\Transformer;

class SiteTransformer extends Transformer
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
     * @param Site $entity
     *
     * @return array
     */
    public function transform(Site $entity)
    {
        $response = [
            'object' => 'Site',
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
