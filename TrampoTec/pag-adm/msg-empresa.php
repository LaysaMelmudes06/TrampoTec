<?php
require_once "back-end/login/validador_acesso.php";
include "../dao/conexao.php";

$querySelect = "SELECT * FROM  tb_fale_conosco";
$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel='stylesheet' href='../pag-adm/css/fale.css'>
    <title>TrampoTec</title>
</head>

<body>


    <?php
include '../pag-adm/components/sidebar-adm.php';
?>


    <img class="cima" src="./img/fundo2.png" alt="">
    <img class="baixo" src="./img/fundo1.png" alt="">
    <main class="main">

        <p>Mensagens dos Usuarios</p>

        <section class="sistema-busca">
            <div class="secao-busca">
                <div class="barra-pesquisa">
                    <input type="text" name="pesquisa" id="busca" placeholder="Buscar por usuario">
                    <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
                </div>

                <div class="align-filtro">
                    <!--
                    <div class="filtro" onclick="abrirFiltro()">
                        <i class="fa-solid fa-filter"></i>
                        <span>Filtrar</span>

                    </div>
-->
                </div>

                <div class="modal-filtro" id="abrir-filtro">
                    <form action="">
                        <div class="align-form-filtro">
                            <label for="">Periodo</label>
                            <input type="checkbox" name="" id="">
                        </div>

                        <div class="align-form-filtro">
                            <label for="">Salario</label>
                            <input type="checkbox" name="" id="">
                        </div>
                        <div class="align-form-filtro">
                            <label for="">Vaga</label>
                            <input type="checkbox" name="" id="">
                        </div>

                        <input type="submit" value="Aplicar" class="button-filtro">

                    </form>
                </div>
            </div>
        </section>

        <section class="section-vagas">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>USUARIO</th>
                        <th></th>
                        <th></th>


                    </tr>
                </thead>
                <tbody class="infos" id="result">
                    <?php
foreach ($resultado as $resultado) {
    ?>
                        <tr class="infos">
                            <td class="table-id"><?=$resultado[0]?></td>
                            <td class="table-nome-aluno"> <?=$resultado[1]?> </td>
                            <td class="table-email-aluno"><?=$resultado[2]?> </td>
                            <td class="table-email-aluno"><?=$resultado[5]?> </td>
                            <td class="text-center">
                                <form method="GET" action="vagas-candidato.php">
                                    <input type="hidden" value="1" name="aprovado">
                                    <button type="button" id="ver-mais" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$resultado[0]?>">
                                        MENSAGEM
                                    </button>
                                </form>
                            <td>

                            <td class="icone-table">
                                <button class="email"  data-bs-toggle="modal" data-bs-target="#exampleModal<?=$resultado[0]?>">
                                  <i class="fa-solid fa-envelope" style="color: #055bc3;"></i>
                                </button>
                            <td>
                        </tr>


                        <div class="modal fade" id="staticBackdrop<?=$resultado[0]?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel"> <?=$resultado[5]?>: <?=$resultado[1]?>
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h5>Tipo de Comentario:</h5>
                                        <p class="comentario"><?=$resultado[3]?></p>
                                        <h5>Mensagem:</h5>
                                        <p class="comentario"><?=$resultado[4]?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="exampleModal<?=$resultado[0]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="https://formsubmit.co/<?=$resultado[2]?>" method="POST">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Entrar em Contato</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                               <input type="hidden" name="_captcha" value="false">
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Para:</label>
                                                <label><?=$resultado[2]?></label>
                                            </div>
                                            <input type="hidden" name="entre em contato" value=" <?=$email?>">
                                            <div class="mb-3">
                                                <textarea class="form-control" name="message" rows="10" required></textarea>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    <?php
}
?>

                </tbody>
            </table>

        </section>
        <!--modal-->





    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/java-empresa.js"></script>
    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
</body>

</html>