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

    # página de login
    function login(){
        # enviou o form de login
        if(filter_input(INPUT_POST, 'email')){
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_ADD_SLASHES);
            # verificar se o user existe
            $u = new Usuario();
            if(  $u->buscarPorEmail($email)  ){
                # verificar se a senha confere
                if(password_verify($senha, $u->senha)){
                    $_SESSION['id'] = $u->id;
                    header('Location:?p=novoTexto');
                    exit;
                }
                else{
                    # senha não está certa; TODO msg
                }
            }
            else{
                # user não existe; TODO msg
            }
        }
        $page = 'login';
        require 'template/template1.php';
    }
    
    function novoTexto(){
        # verifica se o user está logado, senão redireciona
        if(!isset($_SESSION['id'])){
            header('Location:?p=login');
            exit;
        }

        # se enviou o form, salva
        if(filter_input(INPUT_POST,'titulo')){
            $titulo = filter_input(INPUT_POST,'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
            $texto = filter_input(INPUT_POST,'texto', FILTER_SANITIZE_SPECIAL_CHARS);
            $usuario_id = $_SESSION['id'];
            $t = new Texto();
            $t->titulo = $titulo;
            $t->texto = $texto;
            $t->usuario_id = $usuario_id;
            $t->salvar();
            header('Location:index.php');
            exit;
        }



        $page = 'novoTexto';
        require 'template/template1.php';
    }
}