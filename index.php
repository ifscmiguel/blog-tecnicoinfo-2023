<?php
require 'autoload.php';

use Blog\Classes;
use Blog\Classes\Texto;
use Blog\Classes\Usuario;

/*
# salvar user
$u = new Usuario();
$u->nome = 'Miguel';
$u->email = 'foo@bar.com';
$u->senha = '123';
$u->salvar();
*/

# pega o usuario do BD com id=1
$u = new Usuario(1); 

# novo texto
// $t = new Texto();
// $t->titulo = 'Lorem ipsum';
// $t->texto = 'conteúdo do texto';
// $t->usuario_id = 1;
// $t->salvar();

# outro novo texto
// $t = new Texto();
// $t->titulo = 'Programação com PHP';
// $t->texto = 'Conteúdo do texto sobre programação com PHP.';
// $t->usuario_id = 1;
// $t->salvar();

# bucar um texto pelo id
$t = new Texto(2);
echo $t->titulo;