<?php

namespace App\Controller;

use App\DAO\UsuarioGrupoDAO;

class UsuarioGrupoController extends Controller {

    public static function index() 
    {
        parent::isProtected();

        $grupo_dao = new UsuarioGrupoDAO();
        $lista_grupos = $grupo_dao->getAllRows();

        include PATH_VIEW . 'modulos/usuario_grupo/listar_grupos.php';
    }

    public static function ver() 
    {
        parent::isProtected();

        if(isset($_GET['id']))
        {
            $grupo_dao = new UsuarioGrupoDAO();

            $dados_grupo = $grupo_dao->getById($_GET['id']);

            include PATH_VIEW . 'modulos/usuario_grupo/cadastrar_grupo.php';
        } else 
            header("Location: /usuario/grupo"); 
    }

    public static function cadastrar() 
    {
        parent::isProtected();

        include PATH_VIEW . 'modulos/usuario_grupo/cadastrar_grupo.php';
    }

    public static function salvar() 
    {
        parent::isProtected();

        $grupo_dao = new UsuarioGrupoDAO();
    
        $dados_para_salvar = array(
            'descricao' => $_POST["descricao"],
            'cadastrar' => isset($_POST["cadastrar"]) ? 'S' : 'N',
            'editar'    => isset($_POST["editar"]) ? 'S' : 'N',
            'listar'    => isset($_POST["listar"]) ? 'S' : 'N',
            'excluir'   => isset($_POST["excluir"]) ? 'S' : 'N'
        );
    
        if(isset($_POST['id'])) {
    
            $dados_para_salvar['id'] = $_POST["id"];
    
            $grupo_dao->update($dados_para_salvar);
    
        } else {
    
            $grupo_dao->insert($dados_para_salvar);
    
            echo "Inserido.";
        }
        
        header("Location:  /usuario/grupo");     
    }

    public static function excluir()
    {
        parent::isProtected();
        
        if(isset($_GET['id']))
        {
            $grupo_dao = new UsuarioGrupoDAO();

            $grupo_dao->delete($_GET['id']);

            header("Location: /usuario/grupo?excluido=true");
        } else 
            header("Location: /usuario/grupo");
    }  
}

