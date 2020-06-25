<?php

abstract class Controller {

    protected static function isProtected() {

        if(!isset($_SESSION["usuario_logado"]))
            header("Location: /login");
    }
}