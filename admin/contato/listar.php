<?php

require_once('class/contato.php');

$contato = new ContatoClass();

$lista = $contato->ListarContato();

// TESTE
//var_dump($lista);

?>


<div> <!----link para uma nova pg-->

    <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" href="index.php?p=contato&cont=cadastrar">
        <svg class="bi" aria-hidden="true">
            <use xlink:href="#clipboard"></use>
        </svg>
        Novo Contato
    </a>

</div>



<div class="table-responsive">

<table class="table table-bordered border-primary">

<caption>Lista de e-mail</caption>

<thead>
<tr>

<th class="table-success">Id Contato</th>
<th class="table-success">Nome Contato</th>
<th class="table-success">E-mail Contato</th>
<th class="table-success">Telefone Contato</th>
<th class="table-success">Mensagem</th>
<th class="table-success">Data</th>
<th class="table-success">Hora</th>
<th class="table-success">Status</th>



</tr>
</thead>

<tbody>



<?php

foreach ($lista as $linha): 

?>
    <tr>
        <td class="table-success"><?php echo $linha['idContato']; ?></td>
        <td class="table-success"><?php echo $linha['nomeContato']; ?></td>
        <td class="table-success"><?php echo $linha['emailContato']; ?></td>
        <td class="table-success"><?php echo $linha['telefoneContato']; ?></td>
        <td class="table-success"><?php echo $linha['mensagemContato']; ?></td>
        <td class="table-success"><?php echo $linha['dataContato']; ?></td>
        <td class="table-success"><?php echo $linha['horaContato']; ?></td>
        <td class="table-success"><?php echo $linha['statusContato']; ?></td>
    
    </tr>

    <?php endforeach; ?>

</tbody>

</table>

</div>