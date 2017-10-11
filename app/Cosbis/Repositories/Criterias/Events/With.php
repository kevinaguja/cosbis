<?php

namespace App\Cosbis\Repositories\Criterias\Events  ;

use App\Cosbis\Repositories\Contracts\RepositoryInterface as Repository;
use App\Cosbis\Repositories\Criterias\Criteria;

class With extends Criteria
{
    private $relationship;

    public function __construct($relationship)
    {
        $this->relationship= $relationship;
    }

    public function apply($model, Repository $repository){
        $query= $model->with($this->relationship);

        return $query;
    }
}