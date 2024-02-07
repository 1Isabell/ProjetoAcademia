<?php

//Será responsável de passar as informações do banco de dados para a página que vai confirmar as informações 

if(isset($_POST['nomeAluno'])){

  $nomeAluno =    $_POST['nomeAluno'];
  $dataNascAluno =  $_POST['dataNascAluno'];
  $emailAluno =     $_POST['emailAluno'];
  $senhaAluno =     $_POST['senhaAluno'];
  $dataCadAluno =   $_POST['dataCadAluno'];
  $statusAluno =    $_POST['statusAluno'];
  $fotoAluno =      $_POST['fotoAluno'];

//FOTO 

$arquivo =  $_FILES['fotoAluno'];

//Responsável de fazer o upload da imagem que está no diretório raiz para o banco de dados, onde caso não for encontrado irá mostrar erro 
// Um caso para cada situação 
if($arquivo['error']){
  throw new Exception('Error'.$arquivo['error']);
}
if(move_uploaded_file($arquivo['tmp_name'], '../img/aluno/' . $arquivo['name'])){
  $fotoAluno = 'aluno/' . $arquivo['name']; //aluno/maria.png
}else{
  throw new Exception('Erro; não foi possivel realizar o upload da imagem.');
}
 
//Vai trazer as informações da classe aluno 
require_once('class/aluno.php');

// Será responsável de trazer as informações que existe na classe passando os seus parâmetros 

$aluno = new AlunoClass();
$aluno ->nomeAluno = $nomeAluno;
$aluno ->dataNascAluno = $dataNascAluno;
$aluno -> emailAluno = $emailAluno;
$aluno -> senhaAluno =$senhaAluno;
$aluno -> dataCadAluno =$dataCadAluno('Y-m-d');
$aluno -> statusAluno = $statusAluno;
$aluno -> fotoAluno = $fotoAluno;

$aluno -> CadastrarA();

 var_dump($_POST['nome']);
}
?>


<!---- action="index.php?p=aluno&aluno=cadastrar" / A ação que irá acontecer quando clicar no botão será carregar para e mesma página por isso colocamos o 'link dela para carregar e volta para sua página'------>
<!--Se caso colocarmos o # iria carregar para sua página raiz do deshbord / enctype="multipart/form-data" ação que e usada quando tiver arquivos no forme será responsável de mandar as imagens para o servidor-->


<section class="CadastAform">
<h2 class="h2Cad">Area de Cadastro</h2>

  <form  class="formulario-exercicio"  action="index.php?p=aluno&aluno=cadastrar" method="POST" enctype="multipart/form-data">

  <div class="mb-3 foto-exercicio1">
  <img src="../luno/maria" id="imgFoto">
        <input type="file" class="form-control" id="fotoAluno" name="fotoAluno" style="display: none;">
    <!---name que faz referencia ao banco---->
</div>
      <div>
      <div class="form-group">
        <label for="nomeAluno">Nome</label>
        <input type="text" class="form-control2"  id="nomeAluno" name="nomeAluno"  id="formGroupExampleInput" placeholder="Informe Nome e Sobrenome">
      </div>

  
    <div class="form-row emailForm">
        <div class="form-group col-md-6">
          <label for="emailAluno">E-mail</label>
          <input type="email" class="form-control2"  id="emailAluno" name="emailAluno" id="inputEmail4" placeholder=" E-mail">
        </div>

        <div class="form-group col-md-6">
          <label for="senhaAluno">Senha</label>
          <input type="password" class="form-control2"  id="senhaAluno" name="senhaAluno" id="inputPassword4" placeholder="Crie uma senha">
        </div>
      </div>

      
      <div class="form-group">
        <label for="dataNascAluno">Data de Nascimento</label>
        <input type="date" class="form-control2"  id="dataNascAluno" name="dataNascAluno"  id="formGroupExampleInput" placeholder="Informe sua Data de Nascimento">
      </div>

      

      <div class="form-group">
        <label for="dataCadAluno">Data de Cadastro</label>
        <input type="date" class="form-control2" id="dataCadAluno" name="dataCadAluno" id="formGroupExampleInput" placeholder="Data de Cadastro">
      </div>

      <div class="form-row align-items-center">
        <div class="col-auto my-1">
          <label class="mr-sm-2" for="statusAluno">Status</label>
          <select class="custom-select mr-sm-2" id="statusAluno" name="statusAluno" id="inlineFormCustomSelect"
    >
          <option selected>Status</option>
            <option>Ativo</option>
            <option>Inativo</option>
            <option>Desativado</option>
          </select>
        </div>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar Aluno</button>
    </div>
  </form>
</section>


<script>
  document.getElementById('imgFoto').addEventListener('click', function() {
    // alert('Click na Img')
    document.getElementById('fotoAluno').click();
  });

  document.getElementById('fotoAluno').addEventListener('change', function(e) {
    let imgFoto = document.getElementById('imgFoto'); //quem ta pegando a foto
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