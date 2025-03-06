<?php
include '../dao/conexao.php';

require_once "back-end/login/validador_acesso.php";

$cliente_id = $_SESSION['idAdmin'];
$querySelect = "SELECT * FROM  tb_admin WHERE idAdmin = $cliente_id";

$query = $conexao->query($querySelect);

$resultado = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/perfiil.css">
    <title>Document</title>
</head>

<body>
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>

    <header>
        <h1>Perfil</h1>
    </header>
    <main>
        <section class="perfil">
            <div class="perfil-info">
                <?php foreach ($resultado as $resultado) {?>
                <h2>EMAIL:</h2>
                <h3><?=$resultado[2]?></h3>
            </div>
            <div class="perfil-info">
                <h2>NOME:</h2>
                <h3><?=$resultado[1]?></h3>
            </div>
            <div class="perfil-info">
                <h2>SENHA:</h2>
                <h3><?=$resultado[3]?></h3>
            </div>
            <?php }?>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>