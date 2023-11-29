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
        # o form foi enviado
        if(filter_input(INPUT_POST, 'nome')){
            $u = new Usuario();
            $u->nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $u->email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $u->senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_ADD_SLASHES);
            if($u->salvar()){
                header('Location:?p=login');
                exit;
            }
            // criar msg de erro TODO           
        }
        $page = 'novoUsuario';
        require 'template/template1.php';
    }

    # salvar o usuário no bd
    // TODO

}