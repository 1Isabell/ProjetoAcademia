<?php
    require_once('conexao.php');

class ContatoClass{

    public $idContato;
    public $nomeContato;
    public $emailContato;
    public $telefoneContato;
    public $mensagemContato;
 
    public $dataContato; 
    public $horaContato; 
   public $statusContato;

    public function Inserir(){
        $sql = "INSERT INTO `tblcontato`( nomeContato, emailContato, telefoneContato, mensagemContato) 
        VALUES ('".$this->nomeContato."','".$this->emailContato."','".$this->telefoneContato."','".$this->mensagemContato."')";

        $conn = Conexao::LigarConexao();
        $conn->exec($sql);

    }

    public function __construct($id = false)
    {
 
        if ($id) {
 
            $this->nomeContato = $id;
            $this->Carregar();
        }
    }
    



public function ListarContato(){

        $sql = "SELECT * FROM tblcontato ORDER BY idContato ASC;";

        $conn = Conexao::LigarConexao(); //função

        $resultado = $conn->query($sql);

        $lista = $resultado->fetchAll(); //fetchAll trata os dados da matriz

        return $lista; //fetchAll retorna os dados da matriz
}

public function cadastrarContato(){
    $query = "INSERT INTO tblcontato(
        idContato,
     nomeContato, 
     emailContato, 
     telefoneContato, 
     mensagemContato, 
     dataContato, 
     horaContato, 
    statusContato)

    VALUES (
    '".$this->  nomeContato."',
    '".$this->  emailContato."',
    '".$this->  telefoneContato."',
    '".$this->  mensagemContato."',
    '".$this->  dataContato."',
    '".$this->  horaContato."',
    '".$this->  statusContato."'
    
    )";



    $conn = Conexao::LigarConexao();
    $conn->exec($query);

    echo " <script>document.location='index.php?p=contato'</script>";
}

    public function Carregar(){
        $query = "SELECT * FROM tblcontato WHERE idContato = " . $this-> idContato ;
        $conn = Conexao::LigarConexao();
     $resultado = $conn->query($query);
     $lista = $resultado->fetchAll();

     foreach ($lista as $linha){

        $this ->nomeContato         = $linha['nomeContato'];
        $this -> emailContato       = $linha['emailContato'];
        $this -> telefoneContato    = $linha['telefoneContato'];
        $this -> mensagemContato    = $linha['mensagemContato'];
        $this -> dataContato        = $linha['dataContato'];
        $this -> horaContato        = $linha['horaContato'];
        $this -> statusContato      = $linha['statusContato'];

     }
    }

    public function Atualizar(){
        $query = "UPDATE tblcontato SET nomeContato = '".$this->nomeContato."',
        emailContato        = '".$this->emailContato."',
        telefoneContato     = '".$this->telefoneContato."',
        mensagemContato     = '".$this->mensagemContato."',
        dataContato         ='".$this->  dataContato."',
        horaContato         ='".$this->  horaContato."',
        statusContato       ='".$this->  statusContato."'
          
                WHERE tblcontato.idContato = " . $this->idContato; 
        
                $conn = Conexao::LigarConexao();   
                $conn->query($query);
                echo "<script>document.location='index.php?p=contato'</script>'"; 

    }

}
