<?php

class LoginDAO extends DAO {

    /**
     * Cria uma novo objeto para fazer o CRUD de Categorias
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getUserByUserAndPass($usuario, $senha) 
    {
        $sql = "SELECT id, nome FROM usuarios WHERE usuario=? AND senha= sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $usuario);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject();            
    }
}