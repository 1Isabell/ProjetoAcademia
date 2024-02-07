<h2>Página Desativar</h2>
<?php
$id = $_GET['id'];

$aluno = new AlunoClass();
$aluno->idAluno = $id;
$aluno->Desativar();

?>