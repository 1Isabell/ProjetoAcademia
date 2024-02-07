<?php



require_once('conexao.php');

class AlunoClass{
 //ATRIBUTO DA CLASSE

public $idAluno;
public $nomeAluno;
public $dataNascAluno;
public $emailAluno; 
public $senhaAluno;
public $dataCadAluno;
public $statusAluno;
public $fotoAluno;

//METODOS DA CLASSE
public function __construct($id = false)
{

    if ($id) {

        $this->idAluno = $id;
        $this->Carregar();
    }
}

// LISTAR
public function Listar(){
    $sql = "SELECT * FROM tblalunos WHERE statusAluno = 'Ativo' ORDER BY nomeAluno ASC";   //$sql é uma classe que recebe o selct do banco de dados onde informa os campos ativo no banco 
    $conn = Conexao::LigarConexao();       //vai ser responsável a conectar uma classe da outra classes
    $resultado = $conn->query($sql);       //query com a função de prepara e executar um comando sql    
    $lista = $resultado->fetchAll();         //se o valor da lista for igual o do resultado ira mostra a tabela     //fetchAll vai ser responsável de montar os dados conforme esta tabela   
    return $lista;  //irá retornar os valores da variavel lista
}// Fim listar

//Cadastrar 
//Onde vai trazer os parâmetros iguais do banco d dados, que quando fazer o cadastro no formulário também será realizado no banco de dados assim permitindo uma relação entre site e banco 
public function CadastrarA(){

    $query = "INSERT INTO tblalunos(    
     nomeAluno, 
     dataNascAluno, 
     emailAluno, 
     senhaAluno, 
     dataCadAluno, 
     statusAluno, 
     fotoAluno)   
     
    VALUES ('". $this->nomeAluno."',
    '". $this->dataNascAluno."',
    '". $this->emailAluno."',
    '". $this->senhaAluno."',
    '". $this->dataCadAluno."',
    '". $this->statusAluno."',
    '". $this->fotoAluno."')";

    $conn = Conexao::LigarConexao(); 
    $conn->exec($query);
    
     echo " <script>document.location='index.php?p=aluno&aluno'</script>";
    
    }

    //SEÇÃO RESPONSAVEL DE PASSAR AS INFROMAÇÕES DO BANCO DE DADOS PARA CAD

    public function Carregar(){
        $query = "SELECT * FROM tblalunos  WHERE idAluno = " . $this->idAluno;
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetchAll();

        foreach($lista as $linha){
            $this->nomeAluno                = $linha['nomeAluno'];
            $this->dataNascAluno                = $linha['dataNascAluno'];
            $this->emailAluno                = $linha['emailAluno'];
            $this->senhaAluno                = $linha['senhaAluno'];
            $this->dataCadAluno                = $linha['dataCadAluno'];
            $this->statusAluno                = $linha['statusAluno'];
            $this->fotoAluno                = $linha['fotoAluno'];
        }

    }

    //SEÇÃO RESPONSAVEL DE PASSAR AS INFROMAÇÕES DO BANCO DE DADOS PARA ATUALIZAR
    public function Atualizar() {
        $query = "UPDATE tblalunos SET nomeAluno = '".$this->nomeAluno."',
        dataNascAluno = '".$this->dataNascAluno."',
        emailAluno      = '".$this->emailAluno."',
        senhaAluno      = '".$this->senhaAluno."',
        statusAluno     = '".$this->statusAluno."',
        dataCadAluno    = '".$this->dataCadAluno."',
        statusAluno     = '".$this->statusAluno."',
        fotoAluno       = '".$this->fotoAluno."'
                        WHERE tblalunos.idAluno = " . $this->idAluno;   

                        $conn = Conexao::LigarConexao();   
                        $conn->query($query);
                        echo "<script>document.location='index.php?p=aluno'</script>'";
  
    }


    ///DESATIVAR    
            public function desativar(){
                $sql = "UPDATE tblalunos SET statusAluno = 'Desativado' WHERE idAluno = " . $this->idAluno;
                $conn = Conexao::LigarConexao();
                $conn->exec($sql);

                echo " <script>document.location='index.php?p=aluno'</script>";

            }
}//Fim da Classe Aluno