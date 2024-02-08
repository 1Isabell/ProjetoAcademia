 //AREA LOGIM
  //MAPEANDO A ESTRUTURA DO FORM, ONDE PASSA POR CADA CAMPO ATE CHEGAR NO NAME
  //var password = form.getElementById('input[name="password"]').value;

  //CRIAÇÃO DE VAR QUE SERA RESPONSAVEL DE  PEGAR OS VALORESS DO ID OU NAME DO INPUT
  //var email = document.getElementById('email').value;
  //var password = document.getElementById('password').value;

     //AO USAR JQUERY PODEMOS MUDAR O SEMNATICA DO GETELEMENTBYID
       //var emailAdm = $ ('#emai').val;
    //var passwordAdm = $ ('#passwor').val;

    //PEGANDO OS DADOS DO FORM
    //AO USAR JQUERY PODEMOS  USAR O ID DO FORM PARA PEGAR TODAS AS INFORMAÇÕES
    //var formData = $('#loginForm').serialize();


 //**************************************************************************** */
//CRIAÇÃO DA FUNÇÃO CARREGAR LOGIN QUE IRA SUBIR UMA MESNAGM AO CLICKAR NOO BOTÃO

  function carregarLogin() {
    //USABNDO O JQUER
    $("#loginForm").click(function(){
      var formData = $('#loginForm').serialize();

      //ENVIAR A SOLICITAÇÃO - CLASSE ALUNO 
      $.ajax({
        url: './admin/class/aluno.php',  //qual caminho a url ira fazer ate chegar na classe
        method: 'POST',                   //qual metodo esta sendo ultiilizado no form
        data: formData,                   //de onde as informações estão vindo 
        dataTypr: 'json',
        success:function(data){                       //data nome padrao
         if(data.success){
           //Bem Sucedido caminho onde recebera a informação
           $('#msgLogin').html( '<div class="msgSuccess">'+ data.message+'</div>');

           var idAluno = data.idAluno; //FAZ RREFERENCIA COM O BANCO DE DADOS
           window.location.href = 'http://localhost/projetoAcademia/admin/index.php?p=dashboard'; // DIRECIONA PARA O DASHBORD

           
           
         }
         else{
          //LOGIN INVALIDO
          $('#msgLogin').html( '<div class="msgInvalido">'+ data.message+'</div>');
         }


        },
        //TRAS AS INFORMAÇÕES DO PROPRIO NAVEGADOR
        erro: function(xhr, status, erro){
          
          console.log(error);

        }
      })
    })
    
  }



  /************************************************************************ */
  //SERA REPONSAVEL DE CRIAR UM ALERTA NO BOTÃO E PASSAR AS INFORMAÇÕES DO FORM
  //function carregarLoginAdmin() {
  //alert('Login bem- sucedido! Redirecionando...');

   //AO USAR JQUERY PODEMOS MUDAR O SEMNATICA DO GETELEMENTBYID

   //var emailAdm = $ ('#emailAdm').val;
    //var passwordAdm = $ ('#passwordAdm').val;

    //console.log("E-mail" + emailAdm);
    //console.log("Senha" + passwordAdm);}

