<?php

if (isset($_POST['nomeContato'])){

    $nomeContato        = $_POST['nomeContato'];
    $emailContato       = $_POST['emailContato'];
    $telefoneContato    = $_POST['telefoneContato'];
    $mensagemContato    = $_POST['mensagemContato'];
    $dataContato        =$_POST['dataContato'];
    $horaContato        =$_POST['horaContato'];
    $statusContato      =$_POST['statusContato'];


    //OBJETO QUE TRAZ TODAS AS INFORMAÇÕES DA CLASSE

    $contato = new ContatoClass();
    $contato -> nomeContato = $nomeContato;
    $contato -> emailContato = $emailContato;
    $contato -> telefoneContato = $telefoneContato;
    $contato -> mensagemContato = $mensagemContato;
    $contato-> dataContato = date('Y-m-d');
    $contato-> horaContato =$horaContato;
    $contato -> statusContato = $statusContato;

    $contato -> cadastrarContato();

    var_dump($_POST['nome']);

}

?>

<section>
<form class="formulario-exercicio"
 action="index.php?p=contato&cont=cadastrar" method="POST" enctype="multipart/form-data">


    <div class="nome-exercicio">
    <div class="mb-3">
        <label for="nomeContato" class="form-label">Nome do Contato:</label>
        <input type="text" class="form-control" name="nomeContato" id="nomeContato" require placeholder="Nome do exercício">
    </div>


    <div class="mb-3">
        <label for="emailContato" class="form-label">E-mail para contato:</label>
        <input type="email" class="form-control" name="emailContato" id="emailContato" require placeholder="Email para contato">
    </div>

    
    <div class="mb-3">
        <label for="telefoneContato" class="form-label">Telefone para contato:</label>
        <input type="tell" class="form-control" name="telefoneContato" id="telefoneContato" require placeholder="Telefone para Contato">
    </div>


    
    <div class="mb-3">
        <label for="mensagemContato" class="form-label">Mensagem para contato:</label>
        <input type="text" class="form-control" name="mensagemContato" id="mensagemContato" require placeholder=" Motivo da Mensagem para Contato">
    </div>

    <div class="mb-3">
        <label for="dataContato" class="form-label">data do Contato:</label>
        <input type="date" class="form-control" name="dataContato" id="dataContato" require placeholder=" data Contato">
    </div>

    
    <div class="mb-3">
        <label for="horaContato" class="form-label">Hora do Contato:</label>
        <input type="time" class="form-control" name="horaContato" id="horaContato" require placeholder=" hora Contato">
    </div>

    
    <fieldset class="row mb-3">
        <div class="form-group col-md-4" name="statusContato" id="statusContato" require>
            <label for="inputState">Status</label>
            <select id="inputState" class="form-control" name="statusContato" id="statusContato" require>
                <option selected>---</option>
                <option>ATIVO</option>
                <option>INATIVO</option>
                <option>DESATIVO</option>
            </select>
        </div>

    </fieldset>

    

    

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar Exercício</button>
    </div>

</div>

</form>
</section>
