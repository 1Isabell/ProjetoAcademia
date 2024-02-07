<?php

require_once('conexao.php');

class MatriculasClass{

    //ATRIBUINDO A CLASSE

   public $idMatricula;
   public $dataInicioMatricula;
   public $dataFimMatricula;
   public $statusMatricula;
   public $idAluno;
   public $idPlano;

   public function __construct($id = false)
{

    if ($id) {

        $this->idMatricula = $id;
        $this->Carregar();
    }
}

///LISTAR
public function Listar(){
    $sql = "SELECT * FROM tblmatriculas WHERE statusMatricula ='Ativo' ORDER by idMatricula ASC;";
    $conn = Conexao::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;
}

///CADASTRAR

public function Cadastrar(){
    $query = "INSERT INTO tblmatriculas(
        idMatricula,
        dataInicioMatricula ,
        dataFimMatricula,
        statusMatricula,
        idAluno,
        idPlano

    )
    
        VALUES ('". $this->idMatricula."',    
        '".$this->  dataInicioMatricula."',
        '".$this->  dataFimMatricula."',
        '".$this->  statusMatricula."',
        '".$this->  idAluno."',
        '".$this->  idPlano."',)";

        $conn = Conexao::LigarConexao();
        $conn->exec($query);



        echo " <script>document.location='index.php?p=matriculas'</script>";
 }


 public function Carregar(){
 
    $query = "SELECT * FROM tblmatriculas  WHERE idMatricula = " . $this->idMatricula;
     $conn = Conexao::LigarConexao();
     $resultado = $conn->query($query);
     $lista = $resultado->fetchAll();

        foreach ($lista as $linha) {
            $this->idMatricula                      = $linha['idMatricula'];
            $this->dataInicioMatricula              = $linha['dataInicioMatricula'];
            $this->dataFimMatricula                 = $linha['dataFimMatricula'];
            $this->statusMatricula                  = $linha['statusMatricula'];
            $this->idAluno                          = $linha['idAluno'];
            $this->idPlano                           = $linha['idPlano'];
            

 }

}

///ATUALIZAR 

public function Atualizar(){
    $query = "UPDATE tblmatriculas SET idMatricula = '".$this->idMatricula."',
    dataInicioMatricula              = '".$this->dataInicioMatricula."',
    dataFimMatricula        = '".$this->dataFimMatricula."',
    statusMatricula     = '".$this->statusMatricula."',
    idAluno            = '".$this->idAluno."',
    idPlano              = '".$this->idPlano."'
                                WHERE tblmatriculas.idMatricula = " . $this->idMatricula;   

    $conn = Conexao::LigarConexao();   
    $conn->query($query);
    echo "<script>document.location='index.php?p=matriculas'</script>'";               


}
}
