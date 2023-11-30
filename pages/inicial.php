<h1>Página Inicial</h1>
<?php
foreach($textos as $t){
    echo '<hr>';
    echo "<h2>$t->titulo</h2>";
    echo "<div>".nl2br($t->texto)."</div>";
    echo "<p><small>Autor: ". $t->getUsuario()->nome ."</small></p>";
}