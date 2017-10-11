<?php

namespace App\Cosbis\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected $request;

    protected $builder;

    /**
     * QueryFilter constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request= $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder= $builder;

        foreach($this->filters() as $name=>$value){
            if(method_exists($this, $name)){
                    call_user_func([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }

}