<h2 class ="h2">Pagina matriculas</h2>
<?php
$pagina = @$_GET ['m'];

//echo "Estou na página exercicio";

if ($pagina == NULL){
    require_once('listar.php');
}else{
    if($pagina == 'cadastrar'){require_once ('cadastrar.php');}
    if($pagina == 'atualizar'){require_once ('atualizar.php');}
    if($pagina == 'desativar'){require_once ('desativar.php');}
}