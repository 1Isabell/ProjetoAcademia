


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DAHHBORD </title>
        <link rel="stylesheet" href="css/reset.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <header>

            <section class="cabecaCad">
                <div class="logoCad">
                    <img src="../img/imgIcon/logoVivaBem.svg" alt="">
                </div>

                <div class="loginCad">
                    <img src="../img/imgIcon/login80ico.png" alt="">
                    <h3>NOME</h3>
                </div>

            </section>

            <section>
                <h1>DESHBORD</h1>
            </section>



        </header>

        <main>
          <section class="blocoCad">
          <section class="conteudoCad">
                <div>
                    <ul>
                        <li><a href="index.php?p=dashboard" class="<?php echo (@$_GET['p'] == 'dashboard') ? 'menuAtivo' : ''; ?>">DASHBOARD</a></li>
                        <li><a href="index.php?p=matriculas" class="<?php echo (@$_GET['p'] == 'matriculas') ? 'menuAtivo' : ''; ?>">MATRÍCULAS</a></li>
                        <li><a href="index.php?p=exercicios" class="<?php echo (@$_GET['p'] == 'exercicios') ? 'menuAtivo' : ''; ?>">EXERCÍCIOS</a></li>
                        <li><a href="index.php?p=aulas" class="<?php echo (@$_GET['p'] == 'aulas') ? 'menuAtivo' : ''; ?>">AULAS</a></li>
                        <li><a href="index.php?p=treinos" class="<?php echo (@$_GET['p'] == 'treinos') ? 'menuAtivo' : ''; ?>">TREINOS</a></li>
                        <li><a href="index.php?p=contato" class="<?php echo (@$_GET['p'] == 'contato') ? 'menuAtivo' : ''; ?>">CONTATO</a></li>
                        <li><a href="index.php?p=instrutor" class="<?php echo (@$_GET['p'] == 'instrutor') ? 'menuAtivo' : ''; ?>">INSTRUTORES</a></li>
                        <li><a href="index.php?p=aluno" class="<?php echo (@$_GET['p'] == 'aluno') ? 'menuAtivo' : ''; ?>">ALUNOS</a></li>
                        <li><a href="index.php?p=pagamento" class="<?php echo (@$_GET['p'] == 'pagamento') ? 'menuAtivo' : ''; ?>">PAGAMENTO</a></li>
                        <li><a href="index.php?p=relatorio" class="<?php echo (@$_GET['p'] == 'relatorio') ? 'menuAtivo' : ''; ?>">RELATÓRIO</a></li>
                        <li><a href="index.php?p=configuracao" class="<?php echo (@$_GET['p'] == 'configuracap') ? 'menuAtivo' : ''; ?>">CONFIGURAÇÃO</a></li>
                        <li><a href="index.php?p=ajuda" class="<?php echo (@$_GET['p'] == 'ajuda') ? 'menuAtivo' : ''; ?>">AJUDA E SUPORTE</a></li>
                    </ul>
                </div>

              

                
            </section>

            <section class="BOX">

                <div class="box">
                    <!--echo  '<h2>'.$pagina. '<h2>';-->
                    <?php

                    session_start();

                    if(isset($_SESSION['idAluno'])){
                        echo "Cheguei Aqui";
                    }
                    else{
                        header("locatio:http://localhost/ti21/");
                        exit();
                    }


                    $pagina = @$_GET['p'];

                    switch ($pagina) {

                        case 'dashboard':
                            echo 'Página DASHBOARD ';
                            break;


                        case 'matriculas':
                            require_once('matriculas/matriculas.php');
                            break;

                        case 'exercicios':
                            require_once('exercicio/exercicio.php');
                            break;

                        case 'aulas':
                            echo 'Página AULAS';
                            break;

                        case 'treinos':
                            require_once('treino/treinos.php');
                            break;

                        case 'contato':
                            require_once('contato/contato.php');
                            break;

                        case 'instrutor':
                            require_once('funcionario/instrutor.php');
                            break;


                        case 'aluno':
                            require_once('aluno/aluno.php');
                            break;


                        case 'pagamento':
                            echo 'Página PAGAMENTO';
                            break;


                        case 'relatorio':
                            echo 'Página RELATÓRIO';
                            break;


                        case 'configuracao':
                            echo 'Página CONFIGURAÇÕES';
                            break;


                        case 'nome':
                            echo 'Página NOME';
                            break;



                        case 'telefone':
                            echo 'Página TELRFONE';
                            break;


                        case 'status':
                            echo 'Página STATUS';
                            break;


                        default:
                            echo 'PG DASHBOARD';
                            break;
                    }

                    ?>

                </div>

            </section>
          </section>

        </main>



        <footer>
            <section>
                <h2>Direitos Resevados ao Ti21 - Senac SMP</h2>
            </section>
            <section>
                <h2>Desenvolvido por Alessandro e Ricardo</h2>
            </section>
        </footer>
    </body>

</html>