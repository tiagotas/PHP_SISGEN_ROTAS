<?php

abstract class DAO {

    protected $conexao;

    public function __construct()
    {
        $this->conexao = new MySQL();
    }
}