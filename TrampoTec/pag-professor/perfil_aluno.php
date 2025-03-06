<?php
include '../dao/conexao.php';

require_once "./back-end/login/validador_acesso.php";

$cliente_id = $_SESSION['idProfessor'];
$id = ['idAluno'];
$querySelect = "SELECT * FROM tb_indicacao WHERE fk_idProfessor ";
$resultado = $conexao->query($querySelect);
$indicacao = $resultado->fetchAll();

$querySelect = "SELECT tb_professor.* , tb_professor_etec.* , tb_etec.*, tb_indicacao.*
FROM tb_professor
INNER JOIN tb_professor_etec ON tb_professor_etec.fk_idProfessor = tb_professor.idProfessor
INNER JOIN tb_etec ON tb_etec.idEtec = tb_professor_etec.fk_idEtec
INNER JOIN tb_indicacao ON tb_indicacao.fk_idProfessor = tb_professor.idProfessor
    WHERE tb_professor.idProfessor = '$cliente_id'
";
$resultado1 = $conexao->query($querySelect);
$ResuInner = $resultado1->fetchAll();

$querySelect1 = "SELECT * FROM tb_aluno

    ";
$resultado2 = $conexao->query($querySelect1);
$ResuInner2 = $resultado2->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/side.css">
    <link rel="stylesheet" href="css/perfil_aluno.css">
    <link rel="stylesheet" href="css/geral.css">

    <title>Document</title>
</head>

<body>
    <?php
include '../pag-professor/components/sidebar.php'

?>

    <main>
        <div>
            <div class="align-btn">
                <a href="./alunos.php"><i class="fa-solid fa-chevron-left"></i> </a>
                <h3 class="titulo-perfil">Perfil Aluno</h3>
            </div>

            <div class="img-cima">
                <img src="img/fundo 2.png" alt="">
            </div>
            <?php foreach ($ResuInner2 as $ResuInner2) {?>
            <div class="container-perfil">
                <div class="img-perfil">
                    <img src="../pag-aluno/fotosAluno/perfil/<?=$ResuInner2[13] != "" ? $ResuInner2[13] : '';?>" alt="">
                </div>

                <div class="sobre-perfil">
                    <p class="padrao-perfil">Nome</p>
                    <p class="nome-perfil"><?=$ResuInner2[3]?></p>

                    <p class="padrao-perfil">Email</p>
                    <p class="nome-perfil"><?=$ResuInner2[1]?></p>

                    <?php }?>
                </div>
            </div>
        </div>




        <section class="cartas">
            <?php foreach ($ResuInner as $ResuInner) {?>



                <div class="card-carta">
                    <section class="header-card">
                        <span class="etec">
                            <h3>ETEC:</h3>
                            <p><?=$ResuInner[9]?></p>
                        </span>

                        <span class="prof">
                            <h3>PROF°:</h3>
                            <p><?=$ResuInner[1]?></p>
                        </span>
                    </section>
                    <h3 class="titulo-recomendacao">CARTA DE RECOMENDAÇÃO</h3>
                    <section class="conteudo-card">

                        <p>
                        <?=$ResuInner[14]?>
                        </p>
                    </section>
                </div>

                </div>

        </section>
        <?php }?>



        <div class="img-baixo">
            <img src="img/fundo 1.png" alt="">
        </div>
    </main>
    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
</body>

</html>