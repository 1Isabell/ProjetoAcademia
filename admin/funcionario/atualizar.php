<?php
$id = $_GET["id"];

//acessando os metodos da classe
require_once("class/instrutor.php");

$funcionaros = new  InstrutorClass($id);


 
if (isset($_POST['  nomeFuncionario'])){
   
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

    //empty faz a verificação se a var e vazia ou não
    // ! inverte a verificação se não for vazio

    if (!empty($_FILES['$fotoFuncionario']['name'])) {
        //FOTO 

        $arquivo = $_FILES['fotoAluno'];

        //Responsável de fazer o upload da imagem que está no diretório raiz para o banco de dados, onde caso não for encontrado irá mostrar erro 
        // Um caso para cada situação 
        if ($arquivo['error']) {
            throw new Exception('Error' . $arquivo['error']);
        }
        if(move_uploaded_file($arquivo['tmp_name'], '../img/funcionario/' . $arquivo['name'])){
            $fotoAluno = 'funcionario/' . $arquivo['name']; 
        } else {
            throw new Exception('Erro; não foi possivel realizar o upload da imagem.');
        }

}
 else{
    $fotoFuncionario = $instrutor->$fotoFuncionario;
}

$funcionaros = new InstrutorClass();

$funcionaros ->nomeFuncionario = $nomeFuncionario;
$funcionaros -> dataNascFuncionario = $dataNascFuncionario ('Y-m-d');
$funcionaros ->emailFuncionario = $emailFuncionario ;
$funcionaros ->cargoFuncionario = $cargoFuncionario;
$funcionaros ->especialidadeFuncionario = $especialidadeFuncionario;
$funcionaros ->senhaFuncionario = $senhaFuncionario;
$funcionaros ->dataAdmissaoFuncionario = $dataAdmissaoFuncionario ('Y-m-d');
$funcionaros ->statusFuncionario = $statusFuncionario;
$funcionaros ->fotoFuncionario  = $fotoFuncionario ;
$funcionaros ->linkFaceFuncionario = 	$linkFaceFuncionario;
$funcionaros ->linkInstaFuncionario = $linkInstaFuncionario;
$funcionaros ->linkLinkedinFuncionario = $linkLinkedinFuncionario;
$funcionaros ->linkWhatsFuncionario = $linkWhatsFuncionario;

//chama o método inserir do banco de dados com os valores rece

 $funcionaros -> Atualizar();

}
?>

<section>
    
<form class="formulario-exercicio" action="index.php?p=instrutor&i=atualizar&id=<?php echo $funcionaros->idFuncionario ?>"
 method="POST" enctype="multipart/form-data">



    <div class="mb-3 foto-exercicio">
        <img src="../funcionario/joana.png" id="imgFoto">
        <input type="file" class="form-control" id="fotoFuncionario" name="fotoFuncionario" style="display: none;">
        <!---name que faz referencia ao banco---->
    </div>




    <div class="nome-funcionario">
        <div class="mb-3">
            <label for="nomeFuncionario" class="form-label">Nome do Funcionario:</label>
            <input type="text" class="form-control"
            value="<?php echo $funcionaros->nomeFuncionario; ?>" 
            name="nomeFuncionario" id="nomeFuncionario" require placeholder="Nome do Funcionario">
        </div>

        <div class="form-group">
            <label for="dataNascFuncionario">Data de Nascimemto</label>
            <input type="date" class="form-control2"
            value="<?php echo $funcionaros->dataNascFuncionario; ?>" 
            id="dataNascFuncionario" name="dataNascFuncionario"  id="formGroupExampleInput" placeholder="Informe sua Data de Nascimento">
        </div>


        
        <div class="form-row emailForm">
            <div class="form-group col-md-6">
            <label for="emailFuncionario">E-mail</label>
            <input type="email" class="form-control2" 
             id="emailFuncionario" name="emailFuncionario" id="inputEmail4"0
            placeholder=" E-mail">
            </div>

            
            <div class="form-group col-md-6">
            <label for="senhaFuncionario">Senha</label>
            <input type="password" class="form-control2"  id="senhaFuncionario" name="senhaFuncionario" id="inputPassword4" placeholder="Crie uma senha">
            </div>
        </div>

        
        <div class="form-group">
            <label for="dataAdmissaoFuncionario">Data de Admissão</label>
            <input type="date" class="form-control2"  id="dataAdmissaoFuncionario" 
            name="dataAdmissaoFuncionario"  id="formGroupExampleInput"
            value="<?php echo $funcionaros->dataAdmissaoFuncionario; ?>" 
            placeholder="Informe sua Data de Admissão" >
        </div>

        <div class="mb-3">
            <label for="cargoFuncionario" class="form-label">Cargo do Funcionario:</label>
            <input type="text" class="form-control" name="cargoFuncionario" id="cargoFuncionario" require placeholder="Cargo do Funcionario">
        </div>

        <div class="mb-3">
            <label for="especialidadeFuncionario" class="form-label" name="especialidadeFuncionario" id="especialidadeFuncionario" require>
                Especialidade Funcionario</label>
            <!--  <input type="text" class="form-control" name="gpmuscular" id="gpmuscular" require> -->

            <select id="inputState" class="form-control" name="especialidadeFuncionario"
             id="especialidadeFuncionario" value="<?php echo $funcionaros->especialidadeFuncionario; ?>">
                <option selected
                value="<?php echo $funcionaros->especialidadeFuncionario; ?>"
                >Categoria Funcionario</option>
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
                <select id="inputState" class="form-control" name="statusFuncionario"
                 id="statusExercicio" require
                 value="<?php echo $funcionaros->statusFuncionario; ?>">
                 >
                    <option selected value="<?php echo $funcionaros->statusFuncionario; ?>">---</option>
                    <option>ATIVO</option>
                    <option>INATIVO</option>
                    <option>DESATIVO</option>
                </select>
            </div>


        

        </fieldset>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">ATUALIZAR</button>
        </div>

    </div>

    </form>
    </section>


<script>
    document.getElementById('imgFoto').addEventListener('click', function(){
        //alert ('click na IMG');
        document.getElementById('fotoFuncionario').click();
    });
 
    document.getElementById('fotoFuncionario').addEventListener('change', function(Event) {
 
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