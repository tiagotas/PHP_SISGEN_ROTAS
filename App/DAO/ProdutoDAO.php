<?php

namespace App\DAO;

use App\Model\ProdutoModel;
use Exception;
use PDOException;

class ProdutoDAO extends DAO
{
    /**
     * Cria uma novo objeto para fazer o CRUD de Categorias
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Retorna um registro específico da tabela Categoria
     */
    public function getById($id)
    {
        try 
        {
            $stmt = $this->conexao->prepare("SELECT * FROM produto WHERE id = ?");
            $stmt->bindValue(1, $id);
            $stmt->execute();

            return $stmt->fetchObject('App\Model\ProdutoModel');

        } catch (PDOException $e) {
            
            throw new Exception("Erro ao obter o produto no banco de dados.");
        }
    }


    /**
     * Retorna todos os registros da tabela Categoria.
     */
    public function getAllRows()
    {

        $stmt = $this->conexao->prepare("SELECT * FROM produto where id > 10 ");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS);
    }



    /**
     * Método que insere uma categoria na tabela Categoria.
     */
    public function insert(ProdutoModel $model): bool
    {
        try {

            $sql = "INSERT INTO produto
                            (id_marca, id_categoria, descricao, preco) 
                            VALUES 
                            (?, ?, ?, ?)";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->id_marca);
            $stmt->bindValue(2, $model->id_categoria);
            $stmt->bindValue(3, $model->descricao);
            $stmt->bindValue(4, $model->preco);

            return $stmt->execute();
        } catch (PDOException $e) {

            throw new Exception("Erro ao cadastrar novo produto.");
        }
    }


    /**
     * Atualiza um registro na tabela Categoria.
     */
    public function update(ProdutoModel $model): bool
    {
        try {
            $sql = "UPDATE produto 
            SET id_marca = ?, id_categoria = ?, descricao = ?, preco = ?
            WHERE id = ? ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->id_marca);
            $stmt->bindValue(2, $model->id_categoria);
            $stmt->bindValue(3, $model->descricao);
            $stmt->bindValue(4, $model->preco);
            $stmt->bindValue(5, $model->id);

            return $stmt->execute();

        } catch (PDOException $e) {

            throw new Exception("Erro ao Inserir o Produto.");
        }
    }


    /**
     * Remove um registro da tabela Categoria.
     */
    public function delete($id): bool
    {
        try
        {
            $sql = "DELETE FROM produtos     WHERE id = ? ";

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);

            return $stmt->execute();

        } catch (PDOException $e) {

            return false;
        }        
    }
}
