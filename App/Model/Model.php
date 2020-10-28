<?php

namespace App\Model;

abstract class Model
{
    protected $validaton_erros = array();
    

    public function getValidationErrors(): array
    {
        return $this->validaton_erros;
    }


    public function hasValidationErrors(): bool
    {
        return (count($this->validaton_erros) > 0) ? true : false;
    }
}
