<?php
$id = $_GET["id"];

//echo  $id;
//acessando os metodos da classe
require_once("class/exercicios.php");

$exercicios = new ExerciciosClass($id);

if (isset($_POST["nomeExercico"]))
    ;

if (isset($_POST['nomeExercicio '])) {
    $nomeExercicio = $_POST['nomeExercicio '];
    $altExercicio = $_POST['altExercicio'];
    $descricaoExercicio = $_POST['descricaoExercicio'];
    $grupoMuscularExercicio = $_POST['grupoMuscularExercicio'];
    $statusExercicio = $_POST['statusExercicio'];
    $fotoExercicio = $_POST['fotoExercicio '];
    $linkExercicio = $_POST['linkExercicio  '];

    //empty faz a verificação se a var e vazia ou não
    // ! inverte a verificação se não for vazio
    if (!empty($_FILES['$fotoExercicio']['name'])) {
        //FOTO 

        $arquivo = $_FILES['fotoAluno'];

        //Responsável de fazer o upload da imagem que está no diretório raiz para o banco de dados, onde caso não for encontrado irá mostrar erro 
        // Um caso para cada situação 
        if ($arquivo['error']) {
            throw new Exception('Error' . $arquivo['error']);
        }
        if(move_uploaded_file($arquivo['tmp_name'], '../img/exercicio/' . $arquivo['name'])){
            $fotoExercicio = 'exercicio/' . $arquivo['name']; 
        } else {
            throw new Exception('Erro; não foi possivel realizar o upload da imagem.');
        }

    } else {
        $fotoExercicio = $exercicios->fotoExercicio;
    }

    $exercicio = new ExerciciosClass();
    $exercicio->nomeExercicio = $nomeExercicio;
    $exercicio->altExercicio = $altExercicio;
    $exercicio->descricaoExercicio = $descricaoExercicio;
    $exercicio->grupoMuscularExercicio = $grupoMuscularExercicio;
    $exercicio->statusExercicio = $statusExercicio;
    $exercicio->fotoExercicio = $fotoExercicio;
    $exercicio->linkExercicio = $linkExercicio;

    $exercicio->Atualizar();

            //echo $_POST['nomeExercicio'];
        //echo $_POST['descricaoExercicio'];
        //echo $_POST['grupoMuscular'];
        //echo $_POST['statusExercicio'];
        //echo $_POST['linkExercicio'];
}

?>

<section div="FormuAtualizar">

    <form class="formulario-exercicio"
        action="index.php?p=exercicios&e=atualizar&id=<?php echo $exercicios->idExercicio ?>" method="POST"
        enctype="multipart/form-data">

        <div class="mb-3 foto-exercicio1">
            <img src="../exercicio/peito.png" id="imgFoto">
            <input type="file" class="form-control" id="fotoExercicio" name="fotoExercicio" style="display: none;">
            <!---name que faz referencia ao banco---->
        </div>




        <div class="nome-exercicio">
            <div class="mb-3">
                <label for="nomeExercicio" class="form-label">Nome do Exercício:</label>
                <!--o id recebera um valor-->
                <input type="text" class="form-control" name="nomeExercicio" id="nomeExercicio" require
                    placeholder="Nome do exercício" value="<?php echo $exercicios->nomeExercicio; ?>">
            </div>





            <div class="mb-3">
                <label for="descricaoExercicio" class="form-label">Descrição:</label>
                <textarea type="text" class="form-control" name="descricaoExercicio" id="descricaoExercicio" require
                    placeholder="Descrição do exercício" cols="30" rows="10"
                    value="<?php echo $exercicios->descricaoExercicio; ?>"> </textarea>
            </div>


            <div class="mb-3">
                <label for="grupoMuscularExercicio" class="form-label" name="grupoMuscularExercicio"
                    id="grupoMuscularExercicio" require value="<?php echo $exercicios->grupoMuscularExercicio; ?>">Grupo
                    Muscular</label>
                <!--  <input type="text" class="form-control" name="gpmuscular" id="gpmuscular" require> -->

                <select id="inputState" class="form-control" name="grupoMuscularExercicio" id="grupoMuscularExercicio">
                    <option selected value="<?php echo $exercicios->grupoMuscularExercicio; ?>">
                        <?php echo $exercicios->grupoMuscularExercicio; ?>
                    </option>
                    <option>Peito</option>
                    <option>Braço</option>
                    <option>Pernas</option>
                    <option>Abdomen</option>
                    <option> Cardio</option>
                </select>
            </div>




            <fieldset class="row mb-3">
                <div class="form-group col-md-4" name="statusExercicio" id="statusExercicio" require>
                    <label for="inputState">Status</label>
                    <select id="inputState" class="form-control" name="statusExercicio" id="statusExercicio" require
                        value="<?php echo $exercicios->statusExercicio; ?>">
                        <option selected value="<?php echo $exercicios->statusExercicio; ?>">---</option>
                        <option>ATIVO</option>
                        <option>INATIVO</option>
                        <option>DESATIVO</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label for="linkExercicio" class="form-label">Link:</label>
                    <input type="text" class="form-control" name="linkExercicio" id="linkExercicio" require
                        placeholder="Link do exercício" value="<?php echo $exercicios->linkExercicio; ?>">
                </div>

            </fieldset>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Atualizar Exercício</button>
            </div>

        </div>

    </form>

</section>

<script>
    document.getElementById('imgFoto').addEventListener('click', function(){
        //alert ('click na IMG');
        document.getElementById('fotoExercicio').click();
    });
 
    document.getElementById('fotoExercicio').addEventListener('change', function(Event) {
 
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