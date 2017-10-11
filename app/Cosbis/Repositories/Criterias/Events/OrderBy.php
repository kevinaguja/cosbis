<?php

namespace App\Cosbis\Repositories\Criterias\Events  ;

use App\Cosbis\Repositories\Contracts\RepositoryInterface as Repository;
use App\Cosbis\Repositories\Criterias\Criteria;

class OrderBy extends Criteria
{
    private $column, $order;

    public function __construct($column, $order)
    {
        $this->column= $column;
        $this->order= $order;
    }

    public function apply($model, Repository $repository){
        $query= $model->orderBy($this->column, $this->order);

        return $query;
    }
}