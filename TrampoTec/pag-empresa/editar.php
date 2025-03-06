<?php
require_once "./beck-end/login/validador_acesso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<link rel="stylesheet" href="../reset.css">
<link rel='stylesheet' href='../pag-empresa/componentes/componente.css'>
<link rel='stylesheet' href='../pag-empresa/css/edita.css'>
<title>TrampoTec</title>
</head>
<body>
    

<?php include ('../pag-empresa/componentes/sidebar.php')?>
<?php include ('../pag-empresa/componentes/email.php')?>
<?php include ('../pag-empresa/componentes/notificacao.php')?>

<img class="cima" src="./img/fundo2.png" alt="">
    <img class="baixo" src="./img/fundo1.png" alt="">

<main class="main">

<span class="container-icon">
     <a class="link-add" href="./configuracoes.php"> <i class="icon-add fa-solid fa-circle-chevron-left"></i> Conta
</span>


<p class="titulo-config"> • Editar</p>

<section class="cards-alunos">

<a class="card" href="editar.php">
            <div class="card-corpo">
                <div class="card-itens">
                    <i class="icon-config fa-regular fa-user"></i>
                        <p class="nome-config"> Foto de perfil</p>
                 
                </div>
            </div>  
                <div class="tres-pontinhos">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
</a>    


<a class="card" href="">
            <div class="card-corpo">
                <div class="card-itens">
                <i class="icon-config fa-solid fa-question"></i>
                        <p class="nome-config"> Nome </p>
                 
                </div>
            </div>  
                <div class="tres-pontinhos">
                <i class="fa-solid fa-angle-right"></i>
                </div>
</a> 

<a class="card" href="fale-conosco.php">
            <div class="card-corpo">
                <div class="card-itens">
                <i class="icon-config fa-solid fa-exclamation"></i>
                        <p class="nome-config"> Bio</p>
                 
                </div>
            </div>  
                <div class="tres-pontinhos">
                <i class="fa-solid fa-angle-right"></i>
                </div>
</a> 

<a class="card" href="privacidade.php">
            <div class="card-corpo">
                <div class="card-itens">
                <i class="icon-config fa-solid fa-pen"></i>
                        <p class="nome-config"> Descricao</p>
                 
                </div>
            </div>  
                <div class="tres-pontinhos">
                <i class="fa-solid fa-angle-right"></i>
                </div>
</a> 

<a class="card" href="editar.php">
            <div class="card-corpo">
                <div class="card-itens">
                    <i class="icon-config fa-regular fa-file"></i>
                        <p class="nome-config"> CPNJ</p>
                 
                </div>
            </div>  
                <div class="tres-pontinhos">
                <i class="fa-solid fa-angle-right"></i>
                </div>
</a>    

<a class="card" href="../pag-empresa/pags-logins/redefinir-senha.php">
            <div class="card-corpo">
                <div class="card-itens">
                    <i class="icon-config fa-solid fa-lock"></i>
                        <p class="nome-config"> Senha</p>
                 
                </div>
            </div>  
                <div class="tres-pontinhos">
                <i class="fa-solid fa-angle-right"></i>
                </div>
</a>    

<a class="card" href="editar.php">
            <div class="card-corpo">
                <div class="card-itens">
                    <i class="icon-config fa-solid fa-location-dot"></i>
                        <p class="nome-config"> Endereco </p>
                 
                </div>
            </div>  
                <div class="tres-pontinhos">
                <i class="fa-solid fa-angle-right"></i>
                </div>
</a>    

<p class="detalhe-config"> • Exclusao</p>

<a class="card" href="editar.php">
            <div class="card-corpo">
                <div class="card-itens">
                    <i class="icon-config fa-solid fa-delete-left"></i>
                        <p class="nome-config"> Exclusao de Conta</p>
                 
                </div>
            </div>  
                <div class="tres-pontinhos">
                          <i class="fa-solid fa-angle-right"></i>
                </div>
</a>    

</section>
 </main>
 <script src="./js/java-empresa.js"></script>
<script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
</body>
</html>