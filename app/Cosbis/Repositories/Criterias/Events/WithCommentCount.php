<?php

namespace App\Cosbis\Repositories\Criterias\Events  ;

use App\Cosbis\Repositories\Contracts\RepositoryInterface as Repository;
use App\Cosbis\Repositories\Criterias\Criteria;

class WithCommentCount extends Criteria
{

    public function apply($model, Repository $repository){
        $query= $model->withCount('comments');

        return $query;
    }
}