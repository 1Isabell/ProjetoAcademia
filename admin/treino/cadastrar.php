

<?php
if (isset($_POST['idTreino'])) {

    /* Será responsável de passar as informações do banco de dados para a página que vai confirmada as informações  */

     
    $idTreino               = $_POST['idTreino']; 
    $dataInicioTreino       = $_POST['dataInicioTreino'];
    $dataFimTreino          = $_POST['dataFimTreino'];
    $statusTreino           = $_POST['statusTreino'];
    $idAluno                = $_POST['idAluno'];
    $idFuncionario          = $_POST['idFuncionario'];

    
     //Foto

     $arquivo =  $_FILES['fotoExercicio'];

     //Responsável de fazer o upload da imagem que está no diretório raiz para o banco de dados, onde caso não
     // for encontrado irá mostrar erro / Uma situação para cada imprevisto 
     if($arquivo['error']){
         throw new Exception('Error'.$arquivo['error']);
     }
 
     if(move_uploaded_file($arquivo['tmp_name'], '../img/treino/' . $arquivo['name'])){
         $fotoExercicio = 'treino/' . $arquivo['name']; //exercicio/corrida.png
     }else{
         throw new Exception('Erro; não foi possivel realizar o upload da imagem.');
     }

    /***De onde vai vir as inforações da class* */
    require_once('class/treinos.php');

    /***Objeto que traz todas as informaçao da class*/
    $treino = new TreinosClass();
    $treino ->idTreino= $idTreino;
    $treino ->dataInicioTreino = $dataInicioTreino;
    $treino ->dataFimTreino = $dataFimTreino;
    $treino ->statusTreino = $statusTreino;
    $treino ->idAluno = $idAluno;
    $treino ->idFuncionario = $idFuncionario;
    

    $treino -> Cadastrar();


   //var_dump($_POST['nome']); //echo   $_POST['descricaoExercicio']; //echo   $_POST['grupoMuscularExercicio']; //print($_POST['nomeExercicio']);
}
?>




<!---- action="index.php?p=treinos&trein=cadastrar" / A ação que irá acontecer quando clicar no botão será carregar para e mesma página por isso colocamos o 'link dela para carregar e volta para sua página'------>
<!--Se caso colocarmos o # iria carregar para sua página raiz do deshbord / enctype="multipart/form-data" ação que e usada quando tiver arquivos no forme será responsável de mandar as imagens para o servidor-->

<section>
<form class="formulario-exercicio" action="index.php?p=treinos&treino=cadastrar" method="POST" enctype="multipart/form-data">





<div class="nome-idTreino">
    <div class="mb-3">
        <label for="idTreino" class="form-label">IdTreino:</label>
        <input type="text" class="form-control" name="idTreino" id="idTreino" require placeholder="idTreino">
    </div>




    <div class="form-group">
        <label for="dataInicioTreino">Data de inicio Treino</label>
        <input type="date" class="form-control2"  id="dataInicioTreino" name="dataInicioTreino"  id="formGroupExampleInput" placeholder="Informe a data de inicio
        Treino">
      </div>

      <div class="form-group">
        <label for="dataFimTreino">Data Fim Treino</label>
        <input type="date" class="form-control2"  id="dataFimTreino" name="dataFimTreino"  id="formGroupExampleInput" placeholder="Informe sua Data do Fim Treino">
      </div>



    <fieldset class="row mb-3">
        <div class="form-group col-md-4" name="statusTreino" id="statusTreino" require>
            <label for="inputState">Status</label>
            <select id="inputState" class="form-control" name="statusTreino" id="statusTreino" require>
                <option selected>---</option>
                <option>ATIVO</option>
                <option>INATIVO</option>
                <option>DESATIVO</option>
            </select>
        </div>
    </fieldset>

    <div class="mb-3">
        <label for="idAluno" class="form-label">Id Aluno:</label>
        <input type="text" class="form-control" name="idAluno" id="idAluno" require placeholder="idAluno">
    </div>

        <div class="mb-3">
         <label for="idFuncionario" class="form-label">IdFuncionario:</label>
         <input type="text" class="form-control" name="idFuncionario" id="idFuncionario" require placeholder="idFuncionario">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Cadastrar Exercício</button>
        </div>

</div>

</form>
</section>

<script>
    document.getElementById('imgFoto').addEventListener('click', function() {
        // alert('Click na Img')
        document.getElementById('fotoExercicio').click();
    });

    document.getElementById('fotoExercicio').addEventListener('change', function(e) {
        let imgFoto = document.getElementById('imgFoto'); //quem ta pedando a foto
        let arquivo = e.target.files[0];

        if (arquivo) {
            let carregar = new FileReader();

            carregar.onload = function(e) {
                imgFoto.src = e.target.result; //
            }

            carregar.readAsDataURL(arquivo);
        }

    });
</script>