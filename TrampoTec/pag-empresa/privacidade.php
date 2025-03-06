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
<link rel='stylesheet' href='../pag-empresa/css/priv.css'>
<title>TrampoTec</title>
</head>
<body>
    

<?php include ('../pag-empresa/componentes/sidebar.php')?>
<?php include ('../pag-empresa/componentes/email.php')?>
<?php include ('../pag-empresa/componentes/notificacao.php')?>


<main class="main">


<span class="container-icon">
     <a class="link-add" href="./configuracoes.php"> <i class="icon-add fa-solid fa-circle-chevron-left"></i> <span> • Privacidade </span> 
</span>



<section class="cards-alunos">

<a class="card" href="editar.php">
            <div class="card-corpo">
                <div class="card-itens">
                <i class="icon-config fa-solid fa-user-plus"></i>
                        <p class="nome-config"> Perfil Publico</p>
                 
                </div>
            </div>  
            <div class="container">
                <input type="checkbox" class="checkbox" id="checkbox">
                <label class="switch" for="checkbox">
                <span class="slider"></span>
            </label>
           </div>
</a>    




</section> 
  
</main>
<script src="./js/java-empresa.js"></script>
<script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
</body>
</html>