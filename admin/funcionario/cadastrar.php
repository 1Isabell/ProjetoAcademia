<?php
if (isset($_POST['nomeFuncionario'])){

    /* Será responsável de passar as informações do banco de dados para a página que vai confirmada as informações  */

  
	$nomeFuncionario    = $_POST['nomeFuncionario'];
    $dataNascFuncionario    = $_POST['dataNascFuncionario'];
	$cargoFuncionario   = $_POST['cargoFuncionario'];
	$especialidadeFuncionario	= $_POST['especialidadeFuncionario'];
	$emailFuncionario   = $_POST['emailFuncionario'];
	$senhaFuncionario   = $_POST['senhaFuncionario'];
	$dataAdmissaoFuncionario    = $_POST['dataAdmissaoFuncionario'];
	$statusFuncionario  = $_POST['statusFuncionario'];
	
	$linkFaceFuncionario    = $_POST['linkFaceFuncionario '];
	$linkInstaFuncionario   = $_POST['linkInstaFuncionario'];
	$linkLinkedinFuncionario = $_POST['linkLinkedinFuncionario'];
	$linkWhatsFuncionario   = $_POST['linkWhatsFuncionario'];

    
    //Foto

    $arquivo =  $_FILES['fotoFuncionario'];

    //Responsável de fazer o upload da imagem que está no diretório raiz para o banco de dados, onde caso não
    // for encontrado irá mostrar erro / Uma situação para cada imprevisto 
    if($arquivo['error']){
        throw new Exception('Error'.$arquivo['error']);
    }

    if(move_uploaded_file($arquivo['tmp_name'], '../img/funcionario/' . $arquivo['name'])){
        $fotoExercicio = 'funcionario/' . $arquivo['name']; //exercicio/corrida.png
    }else{
        throw new Exception('Erro; não foi possivel realizar o upload da imagem.');
    }

    /***De onde vai vir as inforações da class* */
    require_once('class/instrutor.php');

    /***Objeto que traz todas as informaçao da class*/
    $funcionaros = new InstrutorClass();
 
    $funcionaros ->nomeFuncionario = $nomeFuncionario;
    $funcionaros -> dataNascFuncionario = $dataNascFuncionario;
    $funcionaros ->emailFuncionario = $emailFuncionario ;
    $funcionaros ->cargoFuncionario = $cargoFuncionario;
    $funcionaros ->especialidadeFuncionario = $especialidadeFuncionario;
    $funcionaros ->senhaFuncionario = $senhaFuncionario;
    $funcionaros ->dataAdmissaoFuncionario = $dataAdmissaoFuncionario;
    $funcionaros ->statusFuncionario = $statusFuncionario;
    $funcionaros ->fotoFuncionario  = $fotoFuncionario ;
    $funcionaros ->linkFaceFuncionario = 	$linkFaceFuncionario;
    $funcionaros ->linkInstaFuncionario = $linkInstaFuncionario;
    $funcionaros ->linkLinkedinFuncionario = $linkLinkedinFuncionario;
    $funcionaros ->linkWhatsFuncionario = $linkWhatsFuncionario;
    $funcionaros -> CadastrarA();


   var_dump($_POST['nomeFuncionario']);
    //echo   $_POST['altFuncionario']; //echo
}
?>

<!---- action="index.php?p=instrutor=cadastrar" / A ação que irá acontecer quando clicar no botão será carregar para e mesma página por isso colocamos o 'link dela para carregar e volta para sua página'------>
<!--Se caso colocarmos o # iria carregar para sua página raiz do deshbord / enctype="multipart/form-data" ação que e usada quando tiver arquivos no forme será responsável de mandar as imagens para o servidor-->

<section>
    
<form class="formulario-exercicio" action="index.php?p=instrutor&i=cadastrar" method="POST" enctype="multipart/form-data">



    <div class="mb-3 foto-exercicio">
        <img src="../funcionario/joana.png" id="imgFoto">
        <input type="file" class="form-control" id="fotoFuncionario" name="fotoFuncionario" style="display: none;">
        <!---name que faz referencia ao banco---->
    </div>




    <div class="nome-funcionario">
        <div class="mb-3">
            <label for="nomeFuncionario" class="form-label">Nome do Funcionario:</label>
            <input type="text" class="form-control" name="nomeFuncionario" id="nomeFuncionario" require placeholder="Nome do Funcionario">
        </div>

        <div class="form-group">
            <label for="dataNascFuncionario">Data de Nascimemto</label>
            <input type="date" class="form-control2"  id="dataNascFuncionario" name="dataNascFuncionario"  id="formGroupExampleInput" placeholder="Informe sua Data de Nascimento">
        </div>

        
        <div class="form-row emailForm">
            <div class="form-group col-md-6">
            <label for="emailFuncionario">E-mail</label>
            <input type="email" class="form-control2"  id="emailFuncionario" name="emailFuncionario" id="inputEmail4"0
            placeholder=" E-mail">
            </div>

            
            <div class="form-group col-md-6">
            <label for="senhaFuncionario">Senha</label>
            <input type="password" class="form-control2"  id="senhaFuncionario" name="senhaFuncionario" id="inputPassword4" placeholder="Crie uma senha">
            </div>
        </div>

        
        <div class="form-group">
            <label for="dataAdmissaoFuncionario">Data de Admissão</label>
            <input type="date" class="form-control2"  id="dataAdmissaoFuncionario" name="dataAdmissaoFuncionario"  id="formGroupExampleInput" placeholder="Informe sua Data de Admissão">
        </div>

        <div class="mb-3">
            <label for="cargoFuncionario" class="form-label">Cargo do Funcionario:</label>
            <input type="text" class="form-control" name="cargoFuncionario" id="cargoFuncionario" require placeholder="Cargo do Funcionario">
        </div>

        <div class="mb-3">
            <label for="especialidadeFuncionario" class="form-label" name="especialidadeFuncionario" id="especialidadeFuncionario" require>
                Especialidade Funcionario</label>
            <!--  <input type="text" class="form-control" name="gpmuscular" id="gpmuscular" require> -->

            <select id="inputState" class="form-control" name="especialidadeFuncionario" id="especialidadeFuncionario">
                <option selected>Categoria Funcionario</option>
                <option>Persol Trainer</option>
                <option>Professor Yoga</option>
                <option>Professor Zumba</option>
                <option>Atendente</option>
                <option>Setor Administrativo</option>
                <option>Setor Limpeza</option>
            </select>
        </div>




        <fieldset class="row mb-3">
            <div class="form-group col-md-4" name="statusFuncionario" id="statusFuncionario" require>
                <label for="inputState">Status</label>
                <select id="inputState" class="form-control" name="statusFuncionario" id="statusExercicio" require>
                    <option selected>---</option>
                    <option>ATIVO</option>
                    <option>INATIVO</option>
                    <option>DESATIVO</option>
                </select>
            </div>


        

        </fieldset>

        <div class="mb-3">
            <label for="linkWhatsFuncionario" class="form-label">Link:</label>
            <input type="text" class="form-control" name="linkWhatsFuncionario" id="linkWhatsFuncionario" require placeholder="Link do exercício">
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Novo Cadastro</button>
        </div>

    </div>

    </form>
    </section>


<script>
    document.getElementById('imgFoto').addEventListener('click', function() {
        // alert('Click na Img')
        document.getElementById('fotoFuncionario').click();
    });

    document.getElementById('fotoFuncionario').addEventListener('change', function(e) {
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


