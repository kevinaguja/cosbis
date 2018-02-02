<?php

namespace App\Cosbis\Filters;

use Carbon\Carbon;

class EventFilters extends QueryFilter
{
    public function search_name($name)
    {
        if(!$name)
            return $this->builder;
        return $this->builder->where('title', 'LIKE', "%$name[0]%");
    }

    public function organization($id)
    {
        return $this->builder->where('organization_id', $id[0]);
    }

    public function search_date($data)
    {
        if(strcmp($data[0], 'latest')==0)
            return $this->builder->orderBy('created_at', 'desc');
        if(strcmp($data[0], 'oldest')==0)
            return $this->builder->orderBy('created_at', 'asc');
        if(strcmp($data[0], 'future')==0)
            return $this->builder->where('date', '>=', Carbon::now());
        if(strcmp($data[0], 'past')==0)
            return $this->builder->where('date', '<', Carbon::now());
    }

    public function status($status)
    {
        return $this->builder->where('status', $status[0]);
    }
}