<?php

namespace App\Cosbis\TokenGenerator\Interfaces;


interface DuplicateTokenValidator
{
    public function checkForDuplicate($token);
}