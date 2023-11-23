<?php
namespace Blog\Classes;

class Controlador{

    # página inicial
    function inicial(){ 
        $textos = Texto::lista();
        $page = 'inicial';
        require 'template/template1.php';
    }



}