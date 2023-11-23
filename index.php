<?php
require 'autoload.php';

use Blog\Classes\Controlador;

$p = filter_input(INPUT_GET, 'p');
$c = new Controlador;
switch ($p) {
    case 'value':
        # code...
        break;
    
    default:
        $c->inicial();
        break;
}
