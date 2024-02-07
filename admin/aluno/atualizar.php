<h2 class="h2">Area de Atualização</h2>
<?php

$id = $_GET["id"];

//acessando os metodos da classe
require_once("class/aluno.php");

//responsavel 
$aluno = new AlunoClass ($id);



if (isset($_POST['nomeAluno'])){
    $nomeAluno = $_POST['nomeAluno'];
  $dataNascAluno = $_POST['dataNascAluno'];
  $emailAluno = $_POST['emailAluno'];
  $senhaAluno = $_POST['senhaAluno'];
  $dataCadAluno = $_POST['dataCadAluno'];
  $statusAluno = $_POST['statusAluno'];
  $fotoAluno = $_POST['fotoAluno'];

  //empty faz a verificação se a var e vazia ou não
    // ! inverte a verificação se não for vazio

    if (!empty($_FILES['$fotoAluno']['name'])) {
        //FOTO 

        $arquivo = $_FILES['fotoAluno'];

        //Responsável de fazer o upload da imagem que está no diretório raiz para o banco de dados, onde caso não for encontrado irá mostrar erro 
        // Um caso para cada situação 
        if ($arquivo['error']) {
            throw new Exception('Error' . $arquivo['error']);
        }
        if(move_uploaded_file($arquivo['tmp_name'], '../img/aluno/' . $arquivo['name'])){
            $fotoAluno = 'aluno/' . $arquivo['name']; 
        } else {
            throw new Exception('Erro; não foi possivel realizar o upload da imagem.');
        }

} else{
    $fotoAluno = $aluno->fotoAluno;
}

    $aluno = new AlunoClass();
    $aluno ->nomeAluno = $nomeAluno;
    $aluno ->dataNascAluno = $dataNascAluno;
    $aluno -> emailAluno = $emailAluno;
    $aluno -> senhaAluno =$senhaAluno;
    $aluno -> dataCadAluno =$dataCadAluno('Y-m-d');
    $aluno -> statusAluno = $statusAluno;
    $aluno -> fotoAluno = $fotoAluno;

$aluno -> Atualizar();
}
?>

<section class="formulario-exercicio">


  <form  class="formulario-aluno" 
  action="index.php?p=aluno&aluno=atualizar&id=<?php echo $aluno->idAluno ?>"
  method="POST" enctype="multipart/form-data">

  <div class="mb-3 foto-exercicio1">
  <img src="../luno/maria" id="imgFoto">
        <input type="file" class="form-control" id="fotoAluno" name="fotoAluno" style="display: none;">
    <!---name que faz referencia ao banco---->
</div>
      <div>
      <div class="form-group">
        <label for="nomeAluno">Nome</label>
        <input type="text" class="form-control2"  id="nomeAluno" name="nomeAluno" 
        value="<?php echo $aluno->nomeAluno; ?>"
        id="formGroupExampleInput" placeholder="Informe Nome e Sobrenome">
      </div>

      
      <div class="form-group">
        <label for="dataNascAluno">Data de Nascimento</label>
        <input type="date" class="form-control2"  id="dataNascAluno" name="dataNascAluno"
        value="<?php echo $aluno->dataNascAluno; ?>"
        id="formGroupExampleInput" placeholder="Informe sua Data de Nascimento">
      </div>

  
    <div class="form-row emailForm">
        <div class="form-group col-md-6">
          <label for="emailAluno">E-mail</label>
          <input type="email" class="form-control2"  id="emailAluno" 
          value="<?php echo $aluno->emailAluno; ?>"
          name="emailAluno" id="inputEmail4" placeholder=" E-mail">
        </div>

        <div class="form-group col-md-6">
          <label for="senhaAluno">Senha</label>
          <input type="password" class="form-control2"  id="senhaAluno"
          name="senhaAluno" id="inputPassword4" placeholder="Crie uma senha">
        </div>
      </div>

     
      

      <div class="form-group">
        <label for="dataCadAluno">Data de Cadastro</label>
        <input type="date" class="form-control2" id="dataCadAluno" 
        value="<?php echo $aluno->dataCadAluno; ?>"
        name="dataCadAluno" id="formGroupExampleInput" placeholder="Data de Cadastro">
      </div>

      <div class="form-row align-items-center">
        <div class="col-auto my-1">
          <label class="mr-sm-2" for="statusAluno">Status</label>
          <select class="custom-select mr-sm-2" id="statusAluno"
          value="<?php echo $aluno->statusAluno; ?>"
          name="statusAluno" id="inlineFormCustomSelect"
    >
          <option selected
          value="<?php echo $aluno->statusAluno; ?>"
          >Status</option>
            <option>Ativo</option>
            <option>Inativo</option>
            <option>Desativado</option>
          </select>
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar Atualizar</button>
    </div>
  </form>
</section>

<script>
    document.getElementById('imgFoto').addEventListener('click', function(){
        //alert ('click na IMG');
        document.getElementById('fotoAluno').click();
    });
 
    document.getElementById('fotoAluno').addEventListener('change', function(Event) {
 
        let imgFoto = document.getElementById('imgFoto');
        let arquivo = Event.target.files[0];
 
        if(arquivo){
            let carregar = new FileReader();
 
 
            carregar.onload = function(e){
                imgFoto.src = e.target.result;
               console.log(imgFoto.scr);
            }
 
            carregar.readAsDataURL(arquivo);
        }
 
    });
 
 
</script>