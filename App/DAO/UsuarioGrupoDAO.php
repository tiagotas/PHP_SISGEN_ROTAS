<?php

namespace App\DAO;

class UsuarioGrupoDAO extends DAO {

    /**
     * Cria uma novo objeto para fazer o CRUD de Grupos de Usuário.
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Retorna um registro específico da tabela Grupo de Usuário
     */
    public function getById($id) {

        $stmt = $this->conexao->prepare("SELECT * FROM grupos WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();            
    }


    /**
     * Retorna todos os registros da tabela 
     */
    public function getAllRows() {
        
        $stmt = $this->conexao->prepare("SELECT * FROM grupos");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }



    /**
     * Método que insere uma categoria na tabela Categoria.
     */
    public function insert($dados) {

        $sql = "INSERT INTO grupos (descricao, cadastrar, editar, listar, excluir) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados['descricao']);
        $stmt->bindValue(2, $dados['cadastrar']);
        $stmt->bindValue(3, $dados['editar']);
        $stmt->bindValue(4, $dados['listar']);
        $stmt->bindValue(5, $dados['excluir']);
        $stmt->execute();
    }


    /**
     * Atualiza um registro na tabela Categoria.
     */
    public function update($dados) {

        $sql = "UPDATE grupos 
                SET descricao = ?, cadastrar = ?, editar = ?, listar = ?, excluir = ? 
                WHERE id = ? ";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $dados['descricao']);
        $stmt->bindValue(2, $dados['cadastrar']);
        $stmt->bindValue(3, $dados['editar']);
        $stmt->bindValue(4, $dados['listar']);
        $stmt->bindValue(5, $dados['excluir']);
        $stmt->bindValue(6, $dados['id']);
        $stmt->execute();
    }


    /**
     * Remove um registro da tabela Categoria.
     */
    public function delete($id) {

        $sql = "DELETE FROM grupos WHERE id = ? ";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
    }
}

