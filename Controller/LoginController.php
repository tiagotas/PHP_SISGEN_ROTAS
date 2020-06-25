<?php

class LoginController extends Controller {

    public static function login()
    {
        include 'Views/login.php';
    }


    public static function autenticar()
    {
        $usuario = $_POST["user"];
        $senha   = $_POST["pass"];

        $login_dao = new LoginDAO();

        $resultado = $login_dao->getUserByUserAndPass($usuario, $senha);

        if($resultado !== false)
        {
            $_SESSION["usuario_logado"] = array('id' => $resultado->id, 
                                                'nome' => $resultado->nome);

            header("Location: /");

        } else 
            header("Location: /login?fail=true");        
    }

    public static function sair()
    {
        unset($_SESSION["usuario_logado"]);

        parent::isProtected();
    }

    
    public static function getNameOfUser()
    {
        return $_SESSION['usuario_logado']['nome'];
    }

}