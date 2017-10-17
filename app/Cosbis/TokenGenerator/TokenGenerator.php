<?php

namespace App\Cosbis\TokenGenerator;

use App\Cosbis\TokenGenerator\Interfaces\DuplicateTokenValidator;
use App\Cosbis\TokenGenerator\Interfaces\RandomTokenGenerator;
use Illuminate\Support\Str;

abstract class TokenGenerator implements RandomTokenGenerator, DuplicateTokenValidator
{
    protected $model;

    abstract function model();

    public function __construct()
    {
        $this->model= $this->model();
    }

    public function getToken()
    {
        do{
            $token= $this->generateToken();
        }while($this->checkForDuplicate($token));

        return $token;
    }

    public function generateToken()
    {
        return Str::random(60);
    }

    public function checkForDuplicate($token)
    {
        return $this->model::where('token', '=' , $token)->exists();
    }
}