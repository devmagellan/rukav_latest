<?php
namespace App\Containers\Site\Criterias;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

class WhereParentIdCriteria extends Criteria
{
    private $parentId;

    public function __construct($parentId)
    {
        $this->parentId = $parentId;
    }

    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('parent_id', '=', $this->parentId);
    }
}