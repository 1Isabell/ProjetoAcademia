<?php
require_once('conexao.php');

class InstrutorClass {
    public $idFuncionario;
    public $nomeFuncionario;
    public $altFuncionario;
    public $dataNascFuncionario;
    public $cargoFuncionario;
    public $especialidadeFuncionario;
    public $emailFuncionario;
    public $senhaFuncionario;
    public $telefoneFuncionario;
    public $dataAdmissaoFuncionario;
    public $statusFuncionario;
    public $fotoFuncionario;
    public $linkFaceFuncionario;
    public $linkInstaFuncionario;
    public $linkLinkedinFuncionario;
    public $linkWhatsFuncionario;

    //METODO DA CLASS

    // Construindo um metodo que ira carregar as informações do banco de dados   //funcionando como uma ponte 
    public function __construct($id = false)
    {
 
        if ($id) {
 
            $this->idFuncionario = $id;
            $this->Carregar();
        }
    }

    //LISTAR
    public function Listar()
    {
        $sql = "SELECT * FROM tblfuncionarios WHERE statusFuncionario ='Ativo' ORDER by nomeFuncionario ASC;";
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    //CADASTRAR
    public function CadastrarA(){
        $query = "INSERT INTO tblfuncionarios
        (   idFuncionario, 
            nomeFuncionario,
            altFuncionario,
            dataNascFuncionario, 
            cargoFuncionario,
            especialidadeFuncionario, 
            emailFuncionario,
            senhaFuncionario, 
            telefoneFuncionario, 
            dataAdmissaoFuncionario, 
            statusFuncionario, 
            fotoFuncionario)

        VALUES  ('". $this->  idFuncionario."',
            '".$this->  nomeFuncionario."',    
            '".$this->  altFuncionario."',
            '".$this->  dataNascFuncionario."',
            '".$this->  cargoFuncionario."',
            '".$this->  especialidadeFuncionario."',
            '".$this->  emailFuncionario."',
            '".$this->  senhaFuncionario."',
            '".$this->  telefoneFuncionario."',
            '".$this->  dataAdmissaoFuncionario."',
            '".$this->  statusFuncionario."',
            '".$this->  fotoFuncionario."')";

            
        $conn = Conexao::LigarConexao(); 
        $conn->exec($query);
        
        echo " <script>document.location='index.php?p=instrutor&i'</script>";

    }

    //SEÇÃO RESPONSAVEL DE PASSAR AS INFROMAÇÕES DO BANCO DE DADOS PARA CAD

    public function Carregar(){
        $query = "SELECT * FROM tblfuncionarios  WHERE idFuncionario = " . $this->idFuncionario;
        $conn = Conexao::LigarConexao();
        $resultado = $conn->query($query);
        $lista = $resultado->fetchAll();

        foreach($lista as $linha){
            $this->idFuncionario                  = $linha['idFuncionario'];
            $this->nomeFuncionario                = $linha['nomeFuncionario'];
            $this->altFuncionario                 = $linha['altFuncionario'];
            $this->dataNascFuncionario                 = $linha['dataNascFuncionario'];
            $this->cargoFuncionario               = $linha['cargoFuncionario'];
            $this->especialidadeFuncionario       = $linha['especialidadeFuncionario'];
            $this->emailFuncionario               = $linha['emailFuncionario'];
            $this->senhaFuncionario               = $linha['senhaFuncionario'];
            $this->dataAdmissaoFuncionario        = $linha['dataAdmissaoFuncionario'];
            $this->statusFuncionario              = $linha['statusFuncionario'];
            $this->fotoFuncionario                = $linha['fotoFuncionario'];
        }
    }

    
    //SEÇÃO RESPONSAVEL DE PASSAR AS INFROMAÇÕES DO BANCO DE DADOS PARA ATUALIZAR
    public function Atualizar() {
        $query = "UPDATE tblfuncionarios SET idFuncionario = '".$this->idFuncionario."',
         nomeFuncionario =                  '".$this->nomeFuncionario."',
        altFuncionario =                    '".$this->altFuncionario."',
        dataNascFuncionario =                    '".$this->dataNascFuncionario."',
        cargoFuncionario =                  '".$this->cargoFuncionario."',
        especialidadeFuncionario =          '".$this->especialidadeFuncionario."',
        emailFuncionario =                  '".$this-> emailFuncionario."',
        senhaFuncionario =                   '".$this->senhaFuncionario."',
        dataAdmissaoFuncionario =           '".$this->dataAdmissaoFuncionario."',
        statusFuncionario =                 '".$this->statusFuncionario."',
        fotoFuncionario =                   '".$this->fotoFuncionario."'
                        WHERE tblfuncionarios.idFuncionario = " . $this->idFuncionario;   

                        $conn = Conexao::LigarConexao();   
                        $conn->query($query);
                        echo "<script>document.location='index.php?p=instrutor'</script>'";
  
    }




}
