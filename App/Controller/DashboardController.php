<?php

namespace App\Controller;

class DashboardController extends Controller {

    public static function index()
    {
        parent::isProtected();
        
        // acessar ...
        
        include PATH_VIEW . 'home.php';
    }
}