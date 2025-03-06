<?php
require_once "./back-end/login/validador_acesso.php";
?>
<?php
include '../dao/conexao.php';
$id = $_SESSION['idAluno'];

$querySelect = "SELECT tb_aluno.nome, tb_aluno.email FROM tb_aluno
    WHERE tb_aluno.idAluno = $id";


$resultado = $conexao->query($querySelect);

$resultado = $resultado->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='../assets/css/bootstrap.min.css'>
    <!--link icone filtro-->
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../pag-aluno/components/components-aluno.css">
    <link rel="stylesheet" href="../pag-aluno/css/fale.css">
    <title>Fale Conosco</title>
</head>

<body>
    <?php
    include('../pag-aluno/components/header.php');
    ?>
    <main id="main">

        <div class="container">
            <section class="titulo">
                <h1 id="titu">CENTRAL FALE CONOSCO</h1>
                <h2>Tire suas úvidas de forma rápida</h2>
            </section>

            <section class="formulario">
                <form action="back-end/faleConosco/salvar.php" method="post">
                    <?php
                    foreach ($resultado as $resultado) {
                    ?>
                        <div class="align">

                            <div class="box-input">
                                <label for="nome">NOME:</label>
                                <input type="text" value="<?= $resultado[0] ?>" disabled>
                                <input type="hidden" id="nome" name="nome" value="<?= $resultado[0] ?>">
                            </div>
                            <select name="categoria" id="categoria">
                                <option value="elogio">Elogio</option>
                                <option value="sugestao">Sugestão</option>
                                <option value="reclamacao">Reclamação</option>
                            </select>
                        </div>
                        <div class="box-input">
                            <label for="email">EMAIL:</label>
                            <input type="email" value="<?= $resultado[1] ?>" disabled>
                            <input type="hidden" id="email" name="email" value="<?= $resultado[1] ?>">
                        </div>
                    <?php
                    }
                    ?>
                    <textarea name="comentario" id="comentario" cols="30" rows="10" placeholder="Detalhes da mensagem"></textarea>
                    <br>

                    <input type="hidden" name="tipoUsuario" value="Aluno">
                    <input class="btn" type="submit" value="ENVIAR" name="" id="">

                </form>

            </section>
        </div>


       
    </main>
    <img class="icone" src="img/contato.png" alt="">

    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>