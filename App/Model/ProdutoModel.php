<?php

namespace App\Model;

use App\DAO\{ ProdutoDAO, CategoriaDAO, MarcaDAO };
use Exception;

class ProdutoModel extends Model
{
    private $id;
    private $descricao;
    private $preco;
    private $foto;
    private $id_categoria;
    private $id_marca;


    public $lista_categorias = array();
    public $lista_marcas = array();


    



    public function setId($_id)
    {
        $this->id = ($_id == null) ? null : $_id;
    }


    public function setDescricao($_desc)
    {
        if (!empty($_desc))
            $this->descricao = $_desc;
        else
            $this->validaton_erros[] = "Desculpe, informe a descrição.";
    }


    public function getDescricao(): ?string
    {
        return $this->descricao;
    }


    public function setPreco($_preco)
    {
        if (!empty($_preco))
            $this->preco = $_preco;
        else
            $this->validaton_erros[] = "Desculpe, informe o preço.";
    }

    public function setCategoria(int $_id_categoria)
    {
        if (!empty($_id_categoria))
            $this->id_categoria = $_id_categoria;
        else
            $this->validaton_erros[] = "Desculpe, selecione a categoria.";
    }

    public function setMarca(int $_id_marca)
    {
        if (!empty($_id_marca))
            $this->id_marca = $_id_marca;
        else
            $this->validaton_erros[] = "Desculpe, selecione a marca.";
    }



    public function __get($property)
    {
        return $this->$property;
    }








    


    public function delete(int $id)
    {
        try 
        {
            $dao = new ProdutoDAO();

            if(!$dao->delete($id))
                throw new Exception("Não foi possível deletar o produto.");            
                
        } catch (Exception $e) {

            $this->validaton_erros[] = $e->getMessage();

            throw new Exception("Erro na camada DAO.");
        }
    }

    public function getById(int $id)
    {
        try 
        {
            $dao = new ProdutoDAO();

            $dados_produto = $dao->getById($id);

            if(is_object($dados_produto))
                return $dados_produto;
            else 
                throw new Exception("Produto não encontrado.");

        } catch (Exception $e) {

            $this->validaton_erros[] = $e->getMessage();

            throw new Exception("Erro na camada DAO.");
        }
    }

    public function save()
    {
        if (!$this->hasValidationErrors()) {
            try {
                $dao = new ProdutoDAO();

                if ($this->id == null) {
                    $dao->insert($this);
                } else {

                    $dao->update($this);
                }
            } catch (Exception $e) {

                $this->validaton_erros[] = $e->getMessage();

                throw new Exception("Erro na camada DAO.");
            }
        } else
            throw new Exception("Erros de validação no formulário.");
    }

    public function getAll()
    {
        try 
        {
            $dao = new ProdutoDAO();

            $arr_produtos = $dao->getAllRows();

            if(is_array($arr_produtos))
                return $arr_produtos;
            else 
                throw new Exception("Erro ao obter a lista de produtos.");

        } catch (Exception $e) {

            $this->validaton_erros[] = $e->getMessage();

            throw new Exception("Erro ao obter a lista de produtos.");
        }

    }


    public function getAllCategorias()
    {
        $categoria_dao = new CategoriaDAO();
        
        return $categoria_dao->getAllRows();
    }

    public function getAllMarcas()
    {
        $marca_dao = new MarcaDAO();

        return $marca_dao->getAllRows();
    }






}
