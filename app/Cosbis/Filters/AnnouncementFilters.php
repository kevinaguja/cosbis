<?php

namespace App\Cosbis\Filters;

class AnnouncementFilters extends QueryFilter
{
    public function sort($columns)
    {
        $data= explode(',', $columns[0]);

        return $this->builder->orderBy(...$data);
    }
}