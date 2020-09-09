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


        if(isset($_GET['success']))
        {
            $retorno['positivo'] = "Dados alterados com sucesso!";
        }

        if(isset($_GET['wrongpassword']))
        {
            $retorno['senha_incorreta'] = "Senha incorreta. As alterações não foram salvas.";
        }

        if(isset($_GET['wrongpasswordconfirmacation']))
        {
            $retorno['senha_confirmacao_incorreta'] = "A confirmação da nova senha não confere com a nova senha.";
        }

        require PATH_VIEW . '/modulos/usuario/meus-dados.php';
    }


    public static function salvar()
    {
        parent::isProtected();

        // Verificando se o usuário colocou a senha atual correta
        if (self::checkCurrentUserPassword($_POST['senha_atual'])) 
        {
            // Verificar se o usuário quer alterar a senha
            if(!empty($_POST['nova_senha']))
            {
                if($_POST['nova_senha'] == $_POST['confirmacao_nova_senha'])
                {
                    $nova_senha = $_POST['nova_senha'];

                } else {
                    header("Location: /usuario/meus-dados?wrongpasswordconfirmacation=true");
                }
            }

            $usuario_dao = new UsuarioDAO();

            $dados_para_salvar = array(
                'id' => LoginController::getIdOfCurrentUser(),
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => isset($nova_senha) ? $nova_senha : $_POST['senha_atual']
            );

            $usuario_dao->update($dados_para_salvar);

            LoginController::updateNameOfCurrentUser($dados_para_salvar['nome']);

            header("Location: /usuario/meus-dados?success=true");            

        } else 
            header("Location: /usuario/meus-dados?wrongpassword=true");
    }


    private static function checkCurrentUserPassword($password)
    {
        $usuario_dao = new UsuarioDAO();

        $retorno = $usuario_dao->checkUserByIdAndPassword(LoginController::getIdOfCurrentUser(), $password);

        return ($retorno !== false) ? true : false;
    }
}
