<?php

namespace App\Cosbis\Filters;

class FileFilters extends QueryFilter
{
    public function filter($visibility)
    {
        if($visibility[0] == 1 && auth()->user()->is_superadmin())
            return $this->builder->where('visibility', ">",  0);

        if($visibility[0] == 2 && (auth()->user()->is_admin() || auth()->user()->is_superadmin()))
            return $this->builder->where('visibility',  $visibility[0]);

        return $this->builder->where('visibility',  3);
    }
}