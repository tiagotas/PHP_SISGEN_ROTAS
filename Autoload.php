<?php

class Autoload {

    public function __construct()
    {
        spl_autoload_register(function ($class) {

            if(file_exists(PATH_DAO . $class . '.php'))
                include PATH_DAO . $class . '.php';
            else if(file_exists(PATH_CONTROLLER . $class . '.php'))
                include PATH_CONTROLLER . $class . '.php';           
        });
    }
}

new Autoload();