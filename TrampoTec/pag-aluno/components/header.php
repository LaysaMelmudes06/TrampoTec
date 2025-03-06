<style>
  body {
    padding-bottom: 50px;
  }
  .navbar-nav {
    width: 100%;
    justify-content: center;

  }

  .container-fluid {
    min-height: 100px;
    height: auto;
    animation: 800ms linear anim-link;
    
  }

  .img-nav {
    width: 180px;
    height: auto;
    position: absolute;
    top: 0;
    padding-top: 10px;
  }

  .img-nav img {
    width: 100%;
    height: auto;
  }


  ul {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 18px;
  }


  /* Animação de cor suave ao passar o mouse sobre os links */
  .navbar-nav .nav-link {
    color: black !important;
    border-radius: 20px;
  }

  .navbar-nav .nav-link:hover {
    color: red !important;
    /* Cor de destaque ao passar o mouse sobre os links */
  }

  /* Animação de fundo suave ao passar o mouse sobre os links */
  .navbar-nav .nav-link {
    transition: background-color 0.3s ease-in-out;
  }

  @media (max-width: 600px) {
    #align-nav {
      margin-left: 12px;
      margin-top: 10px;
      border-top: #c9c9c9 2px solid;
    }

    .img-nav {
      padding-bottom: 5px;
      position: static;
      padding-top: 0px;
    }




  }

  @keyframes anim-nav {
      0% {
        opacity: 0%;
        transform: translatey(-100%);
      }

      70% {
        transform: translatey(1%);
        opacity: 100%;
      }
    }
    @keyframes anim-link {
      0% {
        opacity: 0%;
      }
      10%{
        opacity: 0%;
      }
      20%{
        opacity: 0%;
      }
      30%{
        opacity: 0%;
      }
      40%{
        opacity: 0%;
      }
      50%{
        opacity: 0%;
      }
      60%{
        opacity: 5%;
      }
      70%{
        opacity: 10%;
      }
      80%{
        opacity: 25%;
      }
      90%{
       opacity: 50%; 
      }
      100% {
        opacity: 100%;
      }
    }
  .navbar{
    animation: 800ms ease-in-out anim-nav;
  }
</style>


  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <div class="img">
        <img class="img-nav" src="img/trampotec-logo.png" alt="Bootstrap" width="30" height="24">
      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div  class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="align-nav" class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="painel-de-vagas.php">Painel de vagas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="processos-seletivos.php">Processo seletivo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="meu-curriculo.php">Meu currículo</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Meu Perfil
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="perfil.php">Meus dados</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li><a class="dropdown-item" href="curriculo.php">Editar Currículo</a></li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="contato.php">Fale Conosco</a></li>
              <li>
                <hr class="dropdown-divider">
                <!--       </li>
            <li><a class="dropdown-item" href="#">Configurações</a></li>
              <li>
                <hr class="dropdown-divider">-->
              </li>
              <li><a class="dropdown-item" href="back-end/login/logout.php">Sair</a></li>
            </ul>
          </li>
      </div>
    </div>
  </nav>