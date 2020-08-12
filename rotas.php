<?php

use App\Controller\{ DashboardController, LoginController, 
                    ProdutoController, CategoriaController };

try {

    switch($uri_parse)
    {
        // Tela inicial.
        case '/':
            DashboardController::index();
        break;

        
        // Rotas para trabalhar com Login
        case '/login':
            LoginController::login();
        break;

        case '/autenticar':
            LoginController::autenticar();
        break;

        case '/sair':
            LoginController::sair();
        break;



        // Rotas para trabalhar com produtos.
        case '/produto':       
            ProdutoController::index();
        break;

        case '/produto/cadastrar':
            ProdutoController::cadastrar();
        break;

        case '/produto/salvar':
            ProdutoController::salvar();
        break;

        case '/produto/ver':
            ProdutoController::ver();                              
        break;

        case '/produto/excluir':
            ProdutoController::excluir();
        break;



        // Rotas para trabalhar com categorias
        case '/categoria':            
            CategoriaController::index();            
        break;

        case '/categoria/cadastrar':           
            CategoriaController::cadastrar();
        break;

        case '/categoria/salvar':
            CategoriaController::salvar();
        break;

        case '/categoria/ver':
            CategoriaController::ver();                       
        break;

        case '/categoria/excluir':
            CategoriaController::excluir();
        break;



        

        default:
            echo "Rota inválida";
        break;
    }

} catch(Exception $e) {
    echo "Deu ruim " . $e->getMessage();
}