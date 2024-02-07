

<?php
if (isset($_POST['nomeExercicio'])) {

    /* Será responsável de passar as informações do banco de dados para a página que vai confirmada as informações  */

    $nomeExercicio =            $_POST['nomeExercicio'];
    $descricaoExercicio =       $_POST['descricaoExercicio'];
    $grupoMuscularExercicio =   $_POST['grupoMuscularExercicio'];
    $statusExercicio =          $_POST['statusExercicio'];
    $linkExercicio =            $_POST['linkExercicio'];

    
    //Foto

    $arquivo =  $_FILES['fotoExercicio'];

    //Responsável de fazer o upload da imagem que está no diretório raiz para o banco de dados, onde caso não
    // for encontrado irá mostrar erro / Uma situação para cada imprevisto 
    if($arquivo['error']){
        throw new Exception('Error'.$arquivo['error']);
    }

    if(move_uploaded_file($arquivo['tmp_name'], '../img/exercicio/' . $arquivo['name'])){
        $fotoExercicio = 'exercicio/' . $arquivo['name']; //exercicio/corrida.png
    }else{
        throw new Exception('Erro; não foi possivel realizar o upload da imagem.');
    }

    /***De onde vai vir as inforações da class* */
    require_once('class/exercicios.php');

    /***Objeto que traz todas as informaçao da class*/
    $exercicio = new ExerciciosClass();
    $exercicio ->nomeExercicio = $nomeExercicio;
    $exercicio ->altExercicio = $altExercicio;
    $exercicio ->descricaoExercicio = $descricaoExercicio;
    $exercicio ->grupoMuscularExercicio = $grupoMuscularExercicio;
    $exercicio ->statusExercicio = $statusExercicio;
    $exercicio ->fotoExercicio = $fotoExercicio;
    $exercicio ->linkExercicio = $linkExercicio;

    $exercicio -> Cadastrar();


   var_dump($_POST['nome']); //echo   $_POST['descricaoExercicio']; //echo   $_POST['grupoMuscularExercicio']; //print($_POST['nomeExercicio']);
}
?>




<!---- action="index.php?p=exercicios&e=cadastrar" / A ação que irá acontecer quando clicar no botão será carregar para e mesma página por isso colocamos o 'link dela para carregar e volta para sua página'------>
<!--Se caso colocarmos o # iria carregar para sua página raiz do deshbord / enctype="multipart/form-data" ação que e usada quando tiver arquivos no forme será responsável de mandar as imagens para o servidor-->

<section>
<form class="formulario-exercicio" action="index.php?p=exercicios&e=cadastrar" method="POST" enctype="multipart/form-data">

<div class="mb-3 foto-exercicio">
    <img src="../exercicio/agachamento.png" id="imgFoto">
    <input type="file" class="form-control" id="fotoExercicio" name="fotoExercicio" style="display: none;">
    <!---name que faz referencia ao banco---->
</div>




<div class="nome-exercicio">
    <div class="mb-3">
        <label for="nomeExercicio" class="form-label">Nome do Exercício:</label>
        <input type="text" class="form-control" name="nomeExercicio" id="nomeExercicio" require placeholder="Nome do exercício">
    </div>





    <div class="mb-3">
        <label for="descricaoExercicio" class="form-label">Descrição:</label>
        <input type="text" class="form-control" name="descricaoExercicio" id="descricaoExercicio" require placeholder="Descrição do exercício">
    </div>


    <div class="mb-3">
        <label for="grupoMuscularExercicio" class="form-label" name="grupoMuscularExercicio" id="grupoMuscularExercicio" require>Grupo Muscular</label>
        <!--  <input type="text" class="form-control" name="gpmuscular" id="gpmuscular" require> -->

        <select id="inputState" class="form-control" name="grupoMuscularExercicio" id="grupoMuscularExercicio">
            <option selected>Categoria muscular do exercício</option>
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
            <select id="inputState" class="form-control" name="statusExercicio" id="statusExercicio" require>
                <option selected>---</option>
                <option>ATIVO</option>
                <option>INATIVO</option>
                <option>DESATIVO</option>
            </select>
        </div>

    </fieldset>

    
    <div class="mb-3">
            <label for="linkExercicio" class="form-label">Link:</label>
            <input type="text" class="form-control" name="linkExercicio" id="linkExercicio" require placeholder="Link do exercício">
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