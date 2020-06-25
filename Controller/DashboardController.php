<?php

class DashboardController extends Controller {

    public static function index()
    {
        parent::isProtected();
        
        // acessar ...
        
        include 'Views/home.php';
    }
}