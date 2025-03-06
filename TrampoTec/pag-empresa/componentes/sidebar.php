<?php
include '../dao/conexao.php';

require_once "./beck-end/login/validador_acesso.php";

// Pega o ID do cliente logado
$cliente_id = $_SESSION['idEmpresa'];

$querySelect = "SELECT * FROM  tb_empresa WHERE idEmpresa = $cliente_id";

$query = $conexao->query($querySelect);

$resultados = $query->fetchAll();

?>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<header class="side-bar">
    <nav>
        <div class="imagem-logo">
            <img src="img/trampotec.png" alt="">
        </div>
        <div class="imagem-empresa">
            <a href="../pag-empresa/perfil.php">
                <?php foreach ($resultados as $resultados) { ?> <img src="fotosEmpresa/perfil/<?= $resultados[13] ?>">
                <?php } ?>
                <i class="icon-foto fa-solid fa-caret-right"></i>
            </a>
        </div>
        <ul>
            <div class="coluna-um">
                <li><a href="../pag-empresa/dash.php"><i class="fa-solid fa-house"></i> Dashboard</a></li>
                <!--  <li><a href="../pag-empresa/home.php"><i class="fa-solid fa-house"></i> Home</a></li>-->
                <li> <a href="../pag-empresa/candidatos.php"><i class="fa-solid fa-user"></i> Candidatos</a></li>
                <li><a href="../pag-empresa/vagas.php"><i class="fa-solid fa-bag-shopping"></i> Vagas</a></li>


                <li><a href="../pag-empresa/fale-conosco.php"><i class="fa-solid fa-gear fa-lg"></i> Fale Conosco</a>
                </li>





                <li><a href="./beck-end/login/logout.php"><i class="fa-solid fa-door-open"></i> Sair</a></li>
            </div>
        </ul>
    </nav>
</header>