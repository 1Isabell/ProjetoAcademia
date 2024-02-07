/*#########Banner########*/
$(document).ready(function() {
  /// banener
    $('.banner').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
    }); 
  });
 
  //Erro na galeria não está reconhecendo a biblioteca da galeria
  $('.galeria').slick({
    centerMode: true,
    centerPadding: '160px',
    slidesToShow: 7,
    responsive: [
      {
        breakpoint: 1001,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 5
        }
      },
      {
        breakpoint: 601,
        settings: {
          arrows: false,
          centerMode: true,
          centerPadding: '40px',
          slidesToShow: 1
        }
      }
    ]
  });

  //Biblioteca nao está sendo reconhecida
  /*######### WOW JS ########*/
  new WOW().init();
  
 
    
  /*##### MENU FIXO #######*/
  window.onscroll = function () {
    let top = window.scrollY;
  
    if (top > 1200) {
      document.getElementById("menufixo").classList.add("menufixo");
    } else {
      document.getElementById("menufixo").classList.remove("menufixo");
    }
  }
  
  /*##### MENU MOBILE #######*/
  document.querySelector(".abrir-menu").onclick = function () {
    document.documentElement.classList.add("menu-mobile");
  }
  
  document.querySelector(".fechar-menu").onclick = function () {
    document.documentElement.classList.remove("menu-mobile");
  
  }
  
  // ENVIAR DADOS DO FORM POR WHATSAPP
  function EnviarWhats() {
    let assunto = '*Site - Viva Bem Academia*';
    let nome = '*Nome:* ' + document.querySelector('#nome').value;
    let email = '*Email:* ' + document.querySelector('#email').value;
    let fone = '*Telefone:* ' + document.querySelector('#fone').value;
    let mesn = '*Mensagem:* ' + document.querySelector('#mens').value;
  
    let numeroWhats = '5511990145697';
  
    let quebraDeLinha = '%0A';
  
    window.open('https://api.whatsapp.com/send?phone=5511990145697' +
      numeroWhats + '&text=' +
      assunto + quebraDeLinha + quebraDeLinha +
      nome + quebraDeLinha +
      email + quebraDeLinha +
      fone + quebraDeLinha +
      mesn, '_blank');
  
  }

  //AREA LOGin

  function closeModal(){
    closeModal.style.display ='none';
  }

  function carregarLogin(){
    closeModal();
    alert('Login bem-sucedido! Redicionando ...')
  }


