<?php

namespace App\Cosbis\Filters;

class ElectionFilters extends QueryFilter
{
    public function year($columns)
    {
        $this->builder->whereYear('created_at', '=', $columns[0])->orWhere('id', '=', 1);
    }
}