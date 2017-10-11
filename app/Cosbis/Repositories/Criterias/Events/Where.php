<?php

namespace App\Cosbis\Repositories\Criterias\Events  ;

use App\Cosbis\Repositories\Contracts\RepositoryInterface as Repository;
use App\Cosbis\Repositories\Criterias\Criteria;

class Where extends Criteria
{
    private $data;

    public function __construct(array $data)
    {
        $this->data= $data;
    }

    public function apply($model, Repository $repository){
        $query= $model->where($this->data);

        return $query;
    }
}