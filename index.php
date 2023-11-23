<?php
require 'autoload.php';

use Blog\Classes\Controlador;

$p = filter_input(INPUT_GET, 'p');
$c = new Controlador;
switch ($p) {
    case 'novoUsuario':
        $c->novoUsuario();
        break;
    
    default:
        $c->inicial();
        break;
}
