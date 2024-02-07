<?php

//requiremento da classe acessando 
 require_once('admin/class/exercicios.php');

 //instanciar a classe // trazendo as informações que tem na classe para a index do site / traz o banco de dados 
 $exercicio = new ExerciciosClass();
$lista = $exercicio -> Listar();

require_once('admin/class/instrutor.php');

$funcionaros = new InstrutorClass();
$lista = $funcionaros -> Listar();

//responsavel de mostrar as informações que tem no bnaco de dados var_dump($lista);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia - </title>
    <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">
    <link rel="stylesheet" href="css/lity.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="css/resp.css">

  cu
</head>

<body>


    <?php require_once('conteudo/topo.php'); ?>

    <main>
        <!--BANEER--->
        <?php require_once('conteudo/banner.php'); ?>

        <!--SOBRE--->
        <?php require_once('conteudo/sobre_cont.php'); ?>

        <!--SERVIÇOS--->
        <?php require_once('conteudo/servico.php'); ?>

        <!--GALERIA--->
        <?php require_once('conteudo/galeria.php'); ?>

          <!--EQUIPE--->
          <?php require_once('conteudo/equipe.php'); ?>

            <!--DESTAQUE--->
        <?php require_once('conteudo/destaque.php'); ?>

    </main>

    
            <!--RODAPÉ--->
            <?php require_once('conteudo/footer.php'); ?>
   
 <!--Começo da biblioteca /-->
 <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!--Configurações especificas da biblioteca-->
<script src="javaS/slick.min.js"></script>

<script src="javaS/lity.min.js"></script>

<script src="javaS/wow.min.js"></script>

<script src="javaS/animacoes.js"></script>


</body>

</html>