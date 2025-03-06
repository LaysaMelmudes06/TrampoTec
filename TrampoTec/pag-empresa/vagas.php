<?php
require_once "./beck-end/login/validador_acesso.php";
include "../dao/conexao.php";
$id = $_SESSION['idEmpresa'];

$info = "SELECT tb_vaga.cidade, tb_vaga.area, tb_vaga.periodo, tb_vaga.bairro, tb_vaga.idVaga,
tb_vaga.nome, tb_vaga.descricao ,  tb_vaga.salario, tb_curso.nome AS curso,tb_empresa.nome AS empresa, tb_empresa.imagem,
tb_requisito.requisito
FROM tb_vaga
INNER JOIN tb_curso
ON tb_vaga.fk_idCurso = tb_curso.idCurso
INNER JOIN tb_empresa
ON tb_vaga.fk_idEmpresa = tb_empresa.idEmpresa
INNER JOIN tb_requisito_vaga
on tb_vaga.idVaga = tb_requisito_vaga.fk_idVaga
INNER JOIN tb_requisito
ON tb_requisito_vaga.fk_idRequisito = tb_requisito.idRequisito
WHERE tb_empresa.idEmpresa = $id
";

$result = $conexao->query($info);

$vagas = array();
foreach ($result as $vaga) {
    $vagaId = $vaga['idVaga'];
    if (!isset($vagas[$vagaId])) {
        $vagas[$vagaId] = array(
            'nome' => $vaga['nome'],
            'descricao' => $vaga['descricao'],
            'curso' => $vaga['curso'],

            'salario' => $vaga['salario'],
            'empresa' => $vaga['empresa'],
            'imagem' => $vaga['imagem'],

            'requisito' => $vaga['requisito'],
            'cidade' => $vaga['cidade'],
            'idVaga' => $vaga['idVaga'],
            'bairro' => $vaga['bairro'],
            'area' => $vaga['area'],
            'periodo' => $vaga['periodo'],

        );
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel='stylesheet' href='../pag-empresa/componentes/componente.css'>
    <link rel='stylesheet' href='../pag-empresa/css/vagas.css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>TrampoTec</title>

    <style>
        /* Estilos para o modal e overlay */
        #modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            min-height: 300px;
            height: auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            transition: transform 0.4s, top 0.4s;
            padding: 20px;
        }

        #modal .align-itens {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            height: 100%;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        #modal .align-itens .btn {
            padding: 10px 0;
            border: 0;
            border-radius: 4px;
            outline: none;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            color: white;
            background-color: #4caf50;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            width: 90%;
            transition: 0.3s all ease-in-out;


        }

        #modal .align-itens .btn:hover {
            background-color: #4caf4fe8;
            transition: 0.3s all ease-in-out;
        }

        #modal .align-itens .titulo {
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;

        }

        #modal .titulo1 {
            font-size: 1.1rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            text-align: center;

        }

        #modal .align-x .btn1 {
            font-size: 2.2rem;
        }

        #modal .align-img {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #modal .align-img img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: -50px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        #modal .align-x {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-right: 20px;

        }

        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        #closeBtn {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
        }

        #modal2 {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            min-height: 300px;
            height: auto;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            transition: transform 0.4s, top 0.4s;
            padding: 20px;
        }

        #modal2 .align-itens {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            height: 100%;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        #modal2 .align-itens .btn {
            padding: 10px 0;
            border: 0;
            border-radius: 4px;
            outline: none;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            color: white;
            background-color: #4caf50;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            width: 90%;
            transition: 0.3s all ease-in-out;


        }

        #modal2 .align-itens .btn:hover {
            background-color: #4caf4fe8;
            transition: 0.3s all ease-in-out;
        }

        #modal2 .align-itens .titulo {
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;

        }

        #modal2 .titulo1 {
            font-size: 1.1rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            text-align: center;

        }

        #modal2 .align-x .btn1 {
            font-size: 2.2rem;
        }

        #modal2 .align-img {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #modal2 .align-img img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: -50px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        #modal2 .align-x {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-right: 20px;

        }

        #overlay2 {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        #closeBtn2 {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
        }
    </style>
</head>

<body>


    <?php include '../pag-empresa/componentes/sidebar.php'?>
    <?php include '../pag-empresa/componentes/email.php'?>
    <?php include '../pag-empresa/componentes/notificacao.php'?>


    <img class="cima" src="./img/fundo2.png" alt="">
    <img class="baixo" src="./img/fundo1.png" alt="">
    <main class="main">
    <div id="loading">
            <img src="img/loading.gif" alt="Carregando"> <!-- Use uma imagem de loading ou outra animação -->
            <p>Carregando...</p>
        </div>
        <div id="content">

        <p>Vagas</p>
        <div id="overlay"></div>

        <!-- Modal cadastro feito-->
        <!-- <div id="modal">
            <span id="closeBtn" onclick="fecharModal()">&times;</span>
            <p>Cadastro atualizado com sucesso!!</p>
            <button onclick="fecharModal()">OK</button>
        </div> -->
        <div id="modal">
            <div class="align-img">
                <img src="img/check.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal()">&times;</span>
            </div>
            <div class="align-itens">
                <p class="titulo1">Vaga Atualizada com Sucesso!!</p>
                <button class="btn" onclick="fecharModal()">OK</button>
            </div>
        </div>
        <div id="overlay2"></div>

        <!-- Modal cadastro feito-->
        <!-- <div id="modal2">
            <span id="closeBtn2" onclick="fecharModal2()">&times;</span>
            <p>Cadastro realizado com sucesso!!</p>
            <button onclick="fecharModal2()">OK</button>
        </div> -->
        <div id="modal2">
            <div class="align-img">
                <img src="img/check.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal2()">&times;</span>
            </div>
            <div class="align-itens">
                <p class="titulo1">Vaga Cadastrada com Sucesso!!</p>
                <button class="btn" onclick="fecharModal2()">OK</button>
            </div>
        </div>
        <section class="sistema-busca">
            <div class="secao-busca">

                <span an class="add-vaga">
                    <span>
                        <a href="./cadastrar-vaga.php">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </span>

                    Cadastra Nova Vaga
                </span>
                <div class="barra-pesquisa">
                    <input type="text" name="pesquisa" id="busca" placeholder="Buscar por vaga">
                    <i class="fa-solid fa-magnifying-glass fa-lg"></i>
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
                        <th> VAGA</th>
                        <th>CIDADE</th>
                        <th>BAIRRO</th>
                        <th>AREA</th>
                        <th>PERIODO</th>
                        <th>CANDIDATOS</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="infos" id="result">

                </tbody>
            </table>

            <?php foreach ($vagas as $vaga) {?>
                <div class="modal" tabindex="-1" role="dialog" id="confirmarPreenchimentoModal<?=$vaga['idVaga']?>">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Confirmação</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Você tem certeza que deseja preencher esta vaga?</p>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="./beck-end/vagaPreenchida/vaga-preenchida.php" method="POST">
                                    <input type="hidden" name="idVaga" value=" <?=$vaga['idVaga']?>">
                                    <button name="preenchida" id="vaga-preenchida" type="submit" class="btn btn-primary"
                                        style="align-items: center;">Preencher Vaga</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            <?php }?>
        </section>
        </div>




    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {


            var busca = ("");
            $.post('./beck-end/buscaVaga/buscaVaga.php?idEmpresa=<?=$id?>', {
                busca
            }, function (data) {
                $("#result").html(data);
            });


            $("#busca").keyup(function () {

                busca = $("#busca").val();
                $.post('./beck-end/buscaVaga/buscaVaga.php?idEmpresa=<?=$id?>', {
                    busca: busca
                }, function (data) {
                    $("#result").html(data);
                });


            });
        });
    </script>
    <script src="./js/java-empresa.js"></script>
    <script src="js/modal-etec.js"></script>
    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
    <script>
        // Função para abrir o modal
        function abrirModal() {
            document.getElementById('overlay').style.display = 'block';
            document.getElementById('modal').style.display = 'block';
        }

        // Função para fechar o modal
        function fecharModal() {
            document.getElementById('overlay').style.display = 'none';
            document.getElementById('modal').style.display = 'none';
        }

        // Verificar se o CPF já está cadastrado via GET
        let urlParams = new URLSearchParams(window.location.search);
        let atualizada = urlParams.get('atualizada');

        if (atualizada === 'true') {
            abrirModal();
        }
    </script>
    <script>
        // Função para abrir o modal
        function abrirModal2() {
            document.getElementById('overlay2').style.display = 'block';
            document.getElementById('modal2').style.display = 'block';
        }

        // Função para fechar o modal
        function fecharModal2() {
            document.getElementById('overlay2').style.display = 'none';
            document.getElementById('modal2').style.display = 'none';
        }

        // Verificar se o CPF já está cadastrado via GET
        let urlParamss = new URLSearchParams(window.location.search);
        let cadastrada = urlParamss.get('cadastrada');

        if (cadastrada === 'true') {
            abrirModal2();
        }
    </script>
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Simular um carregamento de 2 segundos
            setTimeout(function () {
                // Oculta a tela de carregamento
                document.getElementById("loading").style.display = "none";

                // Exibe a tela de conteúdo
                document.getElementById("content").style.display = "block";
            }, 2000); // Tempo de espera em milissegundos
        })
    </script>


</body>

</html>