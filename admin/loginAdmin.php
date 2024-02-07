<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/reset.css">

    <link rel="stylesheet" href="../css/slick.css" />
    <link rel="stylesheet" href="../css/slick-theme.css" />
    <link rel="stylesheet" href="../css/lity.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--NOSSO ESTILO È SEMPRE O ULTIMO-->

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    </head>
<body>

<!--CRIAÇÃO DA PAGINA LOGIN ADMIN-->
    
<section class="contenteADMIN" >

    <div class="formulImgAdmin">
          
    <h1><span>Minha</span> Academia </h1>

        <img src="../img/servico1.png" alt="">
      
    </div>

    <div class="formularLoginAdmin" id="loginModal">
        <h2>
            Faça seu <span>Login </span> ou acesse dados 
                    <span>de parcerias</span>
        </h2>

        <form id="loginForm" id="loginModal">

        <div class="form-group col-md-6">
            <label for="email">E-mail:</label>
            <input type="email"   id="email" name="email"  placeholder="Informe seu E-mail" 
            autocomplete="off"
            require>
            </div>

            <div class="form-group col-md-6">
            <label for="senha">Senha</label>
            <input type="password" class="form-control2" 
            id="senha" name="senha" id="inputPassword4" placeholder="Informe sua Senha" require>
            </div>
        
            

            <button type="button" onclick="carregarLoginAdmin()"> Área Login  </button>
          

        
        
        </form>


        

            <footer>
                <p>Sua academia onde você estiver !</p>
            
            </footer>

</div>
</section>


<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="../javaS/login.js"></script>

</body>
</html>

