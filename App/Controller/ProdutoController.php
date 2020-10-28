<?php

namespace App\Controller;

use App\DAO\{ProdutoDAO, CategoriaDAO, MarcaDAO};
use App\Model\ProdutoModel;
use Exception;

class ProdutoController extends Controller
{

    public static function index()
    {
        parent::isProtected();

        $arr_produtos = array();

        try {

            $model = new ProdutoModel();

            $arr_produtos = $model->getAll();

        } catch (Exception $e) {

           // echo $e->getMessage();

        }

        include PATH_VIEW . 'modulos/produto/listar_produtos.php';
    }

    public static function ver()
    {
        parent::isProtected();

        try {
            if (isset($_GET['id'])) {
                $model = new ProdutoModel();

                $dados = $model->getById((int) $_GET['id']);

                self::cadastrar($dados);
            } else {
                header("location: /produto");
            }
        } catch (Exception $e) {

            self::cadastrar($model);
        }
    }

    public static function cadastrar(ProdutoModel $_model = null)
    {
        parent::isProtected();

        $model = ($_model == null) ? new ProdutoModel() : $_model;

        $model->lista_categorias = $model->getAllCategorias();
        $model->lista_marcas = $model->getAllMarcas();

        include PATH_VIEW . 'modulos/produto/cadastrar_produto.php';
    }

    public static function salvar()
    {
        parent::isProtected();

        try {
            $model = new ProdutoModel();

            $model->setId(isset($_POST['id']) ? $_POST['id'] : null);
            $model->setDescricao($_POST["descricao"]);
            $model->setPreco($_POST["preco"]);
            $model->setCategoria((int) $_POST["id_categoria"]);
            $model->setMarca((int) $_POST["id_marca"]);

            $model->save();

            header("Location: /produto");
        } catch (Exception $e) {

            self::cadastrar($model);
        }
    }

    public static function excluir()
    {
        parent::isProtected();

        if (isset($_GET['id'])) {
            try {

                $model = new ProdutoModel();

                $model->delete((int) $_GET['id']);

                header("Location: /produto");
            } catch (Exception $e) {

                self::cadastrar($model);
            }
        } else
            header("Location: /produto ");
    }
}
