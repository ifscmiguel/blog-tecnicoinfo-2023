<?php
namespace Blog\Classes;

/*
Cada método do controlador, é uma página ou funcionalidade do sistema.

Se for uma página, carrega uma view (pasta pages).
*/
class Controlador{

    # página inicial
    function inicial(){ 
        $textos = Texto::lista();
        $page = 'inicial';
        require 'template/template1.php';
    }

    # página de cadastro do usuário
    function novoUsuario(){
        $page = 'novoUsuario';
        require 'template/template1.php';
    }

    # salvar o usuário no bd
    // TODO

}