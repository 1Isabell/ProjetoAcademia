<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
    
<section class="contente">

    <div class="formulImg">
        <img src="img/logoVivaBem.svg" alt="">
        
        <h1><span>Minha</span> Academia </h1>
    </div>

<div class="formularLogin">
        <h2>
            Faça seu <span>Login </span> ou acesse dados 
                    <span>de parcerias</span>
        </h2>

        <form id="loginForm" >

            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email"  placeholder="Informe seu E-mail" 
                
                require>
                </div>

                <div class="form-group col-md-6">
                <label for="password">Senha</label>
                <input type="password" class="form-control2" 
                id="password" name="password"  placeholder="Informe sua Senha" require>
                </div>
            
                <!--BTN COM O TIPO BUTTON ONDE PERMITE A CONF DE BOTAO CRIAÇÃO DO ONCLICK QUE IRA SUBIR 
                    UMA MENSAGEM AO CLICKAR -->

                <button type="button" onclick="carregarLogin()"> Área do Aluno  </button>
        </form>

        <di class="msgLogin"> </di>


       

        <footer>
            <p>Sua academia onde você estiver !</p>
           
        </footer>

</div>
</section>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="javaS/login.js"></script>



</body>
</html>

