<?php

namespace App\Controller;

use App\DAO\UsuarioDAO;

class UsuarioController extends Controller
{
    public static function meusDados()
    {
        parent::isProtected();

        $usuario_dao = new UsuarioDAO();

        $meus_dados = $usuario_dao->getMyUserById(LoginController::getIdOfCurrentUser());

        require PATH_VIEW . '/modulos/usuario/meus-dados.php';
    }


    public static function salvar()
    {
        parent::isProtected();

        $usuario_dao = new UsuarioDAO();

        $dados_para_salvar = array(
            'id' => LoginController::getIdOfCurrentUser(), 
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'senha' => $_POST['senha_atual']
        );

        $usuario_dao->update($dados_para_salvar);

        LoginController::updateNameOfCurrentUser($dados_para_salvar['nome']);

        header("Location: / ");
    }
}
