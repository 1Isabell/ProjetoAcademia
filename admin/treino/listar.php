<?php
require_once('class/treinos.php');
$treino = new TreinosClass();
$lista = $treino -> Listar();

//var_dump($lista);
?>


<div> <!----link para uma nova pg-->

    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="index.php?p=treinos&treino=cadastrar">
        <svg class="bi" aria-hidden="true">
            <use xlink:href="#clipboard"></use>
        </svg>
        Cadastrar Novo Treino
    </a>

</div>


<div class="table-responsive">

    <table class="table table-bordered border-primary">

        <caption>Lista de Exercícios</caption>

        <thead>
            <tr>

                <th class="table-success">idTreino</th>
                <th class="table-success">dataInicioTreino</th>
                <th class="table-success">dataFimTreino</th>
                <th class="table-success">statusTreino</th>
                <th class="table-success">idAluno</th>
                <th class="table-success">idFuncionario</th>

            </tr>
        </thead>

        <tbody>

            <?php foreach ($lista as $linha) : ?>
                <tr>
                   
                    <td><?php echo $linha['idTreino'] ?></td>
                    <td><?php echo $linha['dataInicioTreino'] ?></td>
                    <td><?php echo $linha['dataFimTreino'] ?></td>
                    <td><?php echo $linha['statusTreino'] ?></td>
                    <td><?php echo $linha['idAluno'] ?></td>
                    <td><?php echo $linha['idFuncionario'] ?></td>
                    <!--<td>
                    <img src="../img/<?php echo $linha['fotoExercicio'] ?>" alt="<?php echo $linha['nomeExercicio'] ?>" class="imgListar">
                    </td>-->
                    <td><?php echo $linha['linkExercicio'] ?></td>
                   
                                                                    <!---Ao clicar no link da pagina atualizar mostarar os parametros do id que foi criado 
                                                                    permitindo guarda os valores estão nele no rodape da pagina ------>               
                    <td> <a class="icon-link icon-link-hover" href="index.php?p=exercicios&e=atualizar&id=<?php echo $linha['idExercicio'] ?>"  class="imgListar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-brush" viewBox="0 0 16 16">
                                <path d="M15.825.12a.5.5 0 0 1 .132.584c-1.53 3.43-4.743 8.17-7.095 10.64a6.067 6.067 0 0 1-2.373 1.534c-.018.227-.06.538-.16.868-.201.659-.667 1.479-1.708 1.74a8.118 8.118 0 0 1-3.078.132 3.659 3.659 0 0 1-.562-.135 1.382 1.382 0 0 1-.466-.247.714.714 0 0 1-.204-.288.622.622 0 0 1 .004-.443c.095-.245.316-.38.461-.452.394-.197.625-.453.867-.826.095-.144.184-.297.287-.472l.117-.198c.151-.255.326-.54.546-.848.528-.739 1.201-.925 1.746-.896.126.007.243.025.348.048.062-.172.142-.38.238-.608.261-.619.658-1.419 1.187-2.069 2.176-2.67 6.18-6.206 9.117-8.104a.5.5 0 0 1 .596.04zM4.705 11.912a1.23 1.23 0 0 0-.419-.1c-.246-.013-.573.05-.879.479-.197.275-.355.532-.5.777l-.105.177c-.106.181-.213.362-.32.528a3.39 3.39 0 0 1-.76.861c.69.112 1.736.111 2.657-.12.559-.139.843-.569.993-1.06a3.122 3.122 0 0 0 .126-.75l-.793-.792zm1.44.026c.12-.04.277-.1.458-.183a5.068 5.068 0 0 0 1.535-1.1c1.9-1.996 4.412-5.57 6.052-8.631-2.59 1.927-5.566 4.66-7.302 6.792-.442.543-.795 1.243-1.042 1.826-.121.288-.214.54-.275.72v.001l.575.575zm-4.973 3.04.007-.005a.031.031 0 0 1-.007.004zm3.582-3.043.002.001h-.002z" />
                            </svg>
                            Atualizar
                        </a>

                    </td>

                    
                                                                    <!---Ao clicar no link da pagina atualizar mostarar os parametros do id que foi criado 
                                                                    permitindo guarda os valores estão nele ------>  
                    <td> <a class="icon-link icon-link-hover" href="index.php?p=exercicios&e=desativar&id=<?php echo $linha['idExercicio'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-lg" viewBox="0 0 16 16">
                                <path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" />
                            </svg>
                            Desativar
                        </a></td>

                </tr>

            <?php endforeach;   ?>
        </tbody>

    </table>

</div>