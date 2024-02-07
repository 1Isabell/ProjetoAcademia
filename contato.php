<?php
//Importe classes PHPMailer para o namespace global
//Eles devem estar no topo do seu script, não dentro de uma função
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$ok = 0;

if (isset($_POST['email'])) { /*VERIFICAR SE O METODO FOI INICIALIZADO*/

    $nome       =  $_POST['nome'];
    $tel        =  $_POST['fone'];
    $email      = $_POST['email'];
    $mens       = $_POST['mens'];
    $assunto    = 'Site Academia Viva Bem';


    require_once('admin/class/contato.php');  /*encontrar o arquivo*/

    $contato = new ContatoClass();  /*new estensao de um elemento*/

    $contato->nomeContato = $nome;
    $contato->emailContato = $email;
    $contato->telefoneContato = $fone;
    $contato->mensagemContato = $mens;

    $contato->Inserir();

    require_once('mailer/Exception.php');
    require_once('mailer/PHPMailer.php');
    require_once('mailer/SMTP.php');

    //Crie uma instância; passar `true (verdadeiro)`
    $mail = new PHPMailer(true);

    try {
        //Configurações do servidor
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     //Habilita saída de depuração detalhada
        $mail->isSMTP();                                            //Enviar usando SMTP
        $mail->Host       = 'smtp.hostinger.com';                   //Defina o servidor SMTP para enviar
        $mail->SMTPAuth   = true;                                   //Habilitar autenticação SMTP
        $mail->Username   = 'vivabem@ti21.smpsistema.com.br';           //SMTP nome de usuário
        $mail->Password   = 'Senac@ti21';                       //SMTP senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Habilitar criptografia TLS implícita
        $mail->Port       = 465;                                    //Porta TCP para conexão

        //Destinatários
        $mail->setFrom('vivabem@ti21.smpsistema.com.br', $assunto);                // Quem dispara o email
        $mail->addAddress('manuelalacerda88@gmail.com');                         //Adicionar um destinatário

        //Conteúdo do email
        $mail->isHTML(true);                                          //Defina o formato do e-mail para HTML
        $mail->Subject = $assunto;

        //Conteúdo HTML
        $mail->Body    = "        
                <strong>Nome: </strong> $nome <br>
                <strong>Email:</strong> $email <br>
                <strong>Telefone:</strong> $tel <br>
                <strong>Mensagem:</strong> $mens
            ";

        //Sem formatação HTML
        $mail->AltBody = "
                <strong>Nome: </strong> $nome <br>
                <strong>Email:</strong> $email <br>
                <strong>Telefone:</strong> $tel <br>
                <strong>Mensagem:</strong> $mens
            ";

        $mail->send();
        // echo 'Email enviado com Sucesso!';
        $ok = 1;
    } catch (Exception $e) { /*TRAZ A IMFORMAÇÃO DO ERRO*/
        echo "Error: {$mail->ErrorInfo}";
        $ok = 2;
    }
}




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>::.Projeto TI21::.</title>

    <link rel="stylesheet" href="css/reset.css">

    <link rel="stylesheet" href="css/slick.css" />
    <link rel="stylesheet" href="css/slick-theme.css" />
    <link rel="stylesheet" href="css/lity.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--NOSSO ESTILO È SEMPRE O ULTIMO-->
   
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/resp.css">
</head>

<body>


    <main>
        <!--INICIO DO CORPO-->
        <?php require_once('conteudo/topo.php') ?>

        <section class="mapa">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.0250551487384!2d-46.43320320852504!3d-23.495607018160584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce63dda7be6fb9%3A0xa74e7d5a53104311!2sSenac%20S%C3%A3o%20Miguel%20Paulista!5e0!3m2!1spt-BR!2sbr!4v1696022070962!5m2!1spt-BR!2sbr" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

        <!--FORMULARIO-->
        <section class="contato">

            <div class="site">

                <h2>CONTATO</h2>

                <h4>

                    <?php
                        if ($ok == 1) {
                        echo $nome . ", sua mensagem foi enviada com sucesso!";
                        } else if ($ok == 2) {
                        echo $nome . ", nao foi possivel enviar sua mensagem. Tente mais tarde!";
                        }
                    ?>

                </h4>

                <div class="contato">
                    <form action="#" method="POST"> <!--tudo que estiver dentro form é considerado formulário-->

                        <div>

                            <div>
                                <label for="nome">Nome:</label> <!--Rótulo-->
                                <input type="text" name="nome" id="nome" placeholder="*Informe seu nome" required> <!--name = nome - Guarda a informação-->
                            </div>

                            <div>
                                <label for="email">E-mail</label>
                                <input type="email" name="email" id="email" placeholder="*Informe seu e-mail: " required> <!--Guarda a informação-->
                            </div>

                            <div>
                                <label for="fone">Telefone</label>
                                <input type="tel" name="fone" id="fone" placeholder="*Informe seu telefone: ">
                            </div>
                        </div>

                        <div>
                            <div>
                                <label for="mens">Mensagem:</label>
                                <textarea name="mens" id="mens" cols="50" rows="10"></textarea>

                            </div>

                            <div class="btnContato">
                                <input type="submit" value="Enviar por e-mail"> <!--Submit pega as informações dos - name - e faz o envio-->
                                <input type="button" value="Enviar por WhatsApp" onclick="EnviarWhats()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <?php require_once('conteudo/servico.php') ?>

        <?php require_once('conteudo/galeria.php') ?>

        <?php require_once('conteudo/equipe.php') ?>


    </main>
    <!--FIM DO CORPO-->

    <!--RODAPE-->

    <?php require_once('conteudo/footer.php') ?>

     <!--Começo da biblioteca /-->
 <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!--Configurações especificas da biblioteca-->
<script src="javaS/slick.min.js"></script>

<script src="javaS/lity.min.js"></script>

<script src="javaS/wow.min.js"></script>

<script src="javaS/animacoes.js"></script>


</body>

</html>