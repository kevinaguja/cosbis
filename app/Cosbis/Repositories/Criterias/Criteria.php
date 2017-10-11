<?php

namespace App\Cosbis\Repositories\Criterias;

use App\Cosbis\Repositories\Contracts\RepositoryInterface as Repository;

abstract class Criteria
{
    public abstract function apply($model, Repository $repository);
}