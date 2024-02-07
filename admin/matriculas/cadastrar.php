<?php
if (isset($_POST['idMatricula'])){
    $idMatricula                =$_POST['idMatricula'];
    $dataInicioMatricula        =$_POST['dataInicioMatricula '];
    $dataFimMatricula           =$_POST['dataFimMatricula'];
    $statusMatricula            =$_POST['statusMatricula'];        
    $idAluno                    =$_POST['idAluno'];
    $idPlano                    =$_POST['idPlano'];


    $matricula = new MatriculasClass();
    $matricula ->  idMatricula  = $idMatricula;      
    $matricula -> dataInicioMatricula = $dataInicioMatricula('Y-m-d');
    $matricula -> dataFimMatricula = $dataFimMatricula('Y-m-d');
    $matricula ->  statusMatricula = $statusMatricula;
    $matricula ->  idAluno = $idAluno;
    $matricula ->  idPlano = $idPlano;

    $matricula-> Cadastrar();

    var_dump($_POST['nome']);
}

?>

<section>
<form class="formulario-exercicio" action="index.php?p=matriculas&m=cadastrar" method="POST" enctype="multipart/form-data">




<div class="idMatricula">
    <div class="mb-3">
        <label for="idMatricula" class="form-label">id Matricula:</label>
        <input type="text" class="form-control" name="idMatricula" id="idMatricula" require placeholder="idMatricula">
    </div>


    <div class="form-group">
        <label for="dataInicioMatricula">Data Inicio Matricula</label>
        <input type="date" class="form-control2"  id="dataInicioMatricula" name="dataInicioMatricula"  id="dataInicioMatricula"
         placeholder="Informe a data Inicio Matricula">
      </div>

      <div class="form-group">
        <label for="dataFimMatricula">data Fim Matricula</label>
        <input type="date" class="form-control2"  id="dataFimMatricula" name="dataFimMatricula"
          id="dataFimMatricula"
         placeholder="Informe a data FimM atricula">
      </div>


    <fieldset class="row mb-3">
        <div class="form-group col-md-4" name="statusExercicio" id="statusExercicio" require>
            <label for="inputState">Status</label>
            <select id="inputState" class="form-control" name="statusExercicio" id="statusExercicio" require>
                <option selected>---</option>
                <option>ATIVO</option>
                <option>INATIVO</option>
                <option>DESATIVO</option>
            </select>
        </div>
    </fieldset>

    <div class="idAluno">
    <div class="mb-3">
        <label for="idAluno" class="form-label">idAluno:</label>
        <input type="text" class="form-control" name="idAluno" 
        id="idAluno" require placeholder="idAluno">
    </div>

    <div class="idPlano">
    <div class="mb-3">
        <label for="idPlano" class="form-label">idPlano:</label>
        <input type="text" class="form-control" 
        name="idPlano" id="idPlano" require placeholder="idPlano">
    </div>


    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar nova Matricula</button>
    </div>

</div>

</form>
</section>