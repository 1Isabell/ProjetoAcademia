<?php
require_once('conexao.php');

class TreinosClass{

    //ATRIBUTOS DA CLASSE
    public  $idTreino; 
    public   $dataInicioTreino;
    public  $dataFimTreino;
    public  $statusTreino;
    public  $idAluno;
    public  $idFuncionario; 

    

    public function __construct($id = false)
    {
    
        if ($id) {
    
            $this->idTreino = $id;
            $this->Carregar();
        }
    }
    
    //LISTAR
    public function Listar(){
 
    $sql = "SELECT * FROM tbltreinos WHERE statusTreino ='Ativo' ORDER by idTreino ASC;";
    $conn = Conexao::LigarConexao();
    $resultado = $conn->query($sql);
    $lista = $resultado->fetchAll();
    return $lista;   
    }   

    //CADASTRAR
    public function Cadastrar(){
    $query = "INSERT INTO tbltreinos(
        idTreino, 
        dataInicioTreino,
        dataFimTreino,
        statusTreino,
        idAluno,
        idFuncionario)
    
        VALUES ('". $this->idTreino."',    
        '".$this->  dataInicioTreino."',
        '".$this->  dataFimTreino."',
        '".$this->  statusTreino."',
        '".$this->  idAluno."',
        '".$this->  idFuncionario."')";

        $conn = Conexao::LigarConexao();
        $conn->exec($query);



        echo " <script>document.location='index.php?p=treinos'</script>";
    }

    //CARREGAR
    public function Carregar(){
        
        $query = "SELECT * FROM tbltreinos  WHERE idTreino = " . $this->idTreino;
     $conn = Conexao::LigarConexao();
     $resultado = $conn->query($query);
     $lista = $resultado->fetchAll();

     foreach ($lista as $linha) {
         $this->dataInicioTreino          = $linha['dataInicioTreino'];
         $this->dataFimTreino             = $linha['dataFimTreino'];
         $this->statusTreino              = $linha['statusTreino'];
         $this->idAluno                   = $linha['idAluno'];
         $this->idFuncionario             = $linha['idFuncionario'];
         
        }
    }


    
    public function Atualizar()
    {
        $query = "UPDATE tbltreinos SET idTreino = '".$this->idTreino."',
        dataInicioTreino             = '".$this->dataInicioTreino ."',
        dataFimTreino                = '".$this->dataFimTreino."',
        statusTreino                 = '".$this->statusTreino."',
        idAluno                     = '".$this->idAluno."',
        idFuncionario              = '".$this->idFuncionario."',
                                    WHERE tbltreinos.idTreino = " . $this->idTreino;   
    
         $conn = Conexao::LigarConexao();   
         $conn->query($query);
         echo "<script>document.location='index.php?p=treinos'</script>'"; 
    

    }
}