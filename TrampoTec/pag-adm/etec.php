<?php include '../dao/conexao.php';

require_once "back-end/login/validador_acesso.php";

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--link icone filtro-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/etec.css">
    <title>Etecs</title>

    <style>
        /* Estilos para o modal e overlay */
        #modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;

            height: 250px;
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

            justify-content: center;
            gap: 10px;
            margin-top: 30px;
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
            margin-top: 20px;
            width: 90%;
            transition: 0.3s all ease-in-out;


        }

        #modal .align-itens .btn:hover {
            background-color: #4caf4fe8;
            transition: 0.3s all ease-in-out;
        }

        #modal .align-itens .titulo {
            font-size: 1.5rem;
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

            height: 260px;
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
            margin-top: 0px;
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
            margin-top: 20px;
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
    <img class="cima" src="img/fundo2.png" alt="">
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>

    <header>
        <div id="overlay"></div>
        <div id="modal">
            <div class="align-img">
                <img src="img/check.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal()">&times;</span>
            </div>
            <div class="align-itens">
                <p class="titulo">Cadastro de Etec realizado </p>
                <p class="titulo">  com sucesso! 😁</p>
                <button class="btn" onclick="fecharModal()">OK</button>
            </div>
        </div>

        <!-- Modal cadastro feito-->
        <!-- <div id="modal">
            <span id="closeBtn" onclick="fecharModal()">&times;</span>
            <p>Cadastro realizado com sucesso!!</p>
            <button onclick="fecharModal()">OK</button>
        </div> -->
        <div id="overlay2"></div>

        <div id="modal2">
            <div class="align-img">
                <img src="img/check.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal2()">&times;</span>
            </div>
            <div class="align-itens">
                <h4 class="titulo">Atualizada com Sucesso</h4>
                <p class="titulo1">Etec atualizada com sucesso! 😁</p>
                <button class="btn" onclick="fecharModal2()">OK</button>
            </div>
        </div>
        <!-- Modal cadastro feito-->
        <!-- <div id="modal2">
            <span id="closeBtn2" onclick="fecharModal2()">&times;</span>
            <p>Cadastro atualizado com sucesso!!</p>
            <button onclick="fecharModal2()">OK</button>
        </div> -->
        <h1>Etecs</h1>
        <section id="content2">
            <div class="secao-cadastro">
                <a href="cadastro-etec.php">
                    <i id="icon-titulo" class="fa-solid fa-plus"></i>
                    <h2>Cadastrar uma nova ETEC</h2>
                </a>
            </div>
        </section>
    </header>
    <main>
        <div id="loading">
            <img src="img/loading.gif" alt="Carregando"> <!-- Use uma imagem de loading ou outra animação -->
            <p>Carregando...</p>
        </div>
        <section id="content">
            <div class="secao-busca">
                <section class="sistema-busca">
                    <div class="barra-pesquisa">
                        <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
                        <input type="text" id="busca" placeholder="buscar por etec">
                    </div>

                    <div class="align-filtro">
                        <!--<div class="btn-side">
                        <p>CADASTRADAS</p>
                    </div>
                    <div class="btn-side">
                        <p>PENDENTES</p>
                    </div>-->

                    </div>

                    <div class="modal-filtro" id="abrir-filtro">
                        <form action="">
                            <div class="align-form-filtro">
                                <label for="">Periodo</label>
                                <input type="checkbox" name="" id="">
                            </div>
                            <div class="align-form-filtro">
                                <label for="">Horario</label>
                                <input type="checkbox" name="" id="">
                            </div>
                            <div class="align-form-filtro">
                                <label for="">Curso</label>
                                <input type="checkbox" name="" id="">
                            </div>
                            <div class="align-form-filtro">
                                <label for="">Area</label>
                                <input type="checkbox" name="" id="">
                            </div>
                            <input type="submit" value="Aplicar" class="button-filtro">

                        </form>
                    </div>
                </section>
            </div>

            <section class="etec">

                <table>
                    <thead>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>EMAIL</th>
                        <th>CÓDIGO</th>
                        <th>MUNICIPIO</th>
                        <th></th>
                        <th></th>

                    </thead>
                    <tbody class="infos" id="result">


                    </tbody>
                </table>
                <div class="modal fade" id="modalExcluir" role="dialog">
                    <div class=" modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Etec</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body  ">
                                <form action="back-end/crudEtec/etec-delete.php" method="post">
                                    <input class="form-control" id="id_usuario" name="id_usuario" type="hidden">
                                    <p>Tem certeza que deseja excluir essa etec?
                                    <div class=" text-end">
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                                        <button type="submit" class="btn btn-warning ms-3">Sim </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            var busca = ("");
            $.post('./back-end/buscas/buscaEtec.php', {
                busca
            }, function(data) {
                $("#result").html(data);
            });


            $("#busca").keyup(function() {

                busca = $("#busca").val().trim();
                $.post('./back-end/buscas/buscaEtec.php', {
                    busca: busca
                }, function(data) {
                    $("#result").html(data);
                });


            });
        });
    </script>
    <script src="js/modal-etec.js"></script>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script src="js/anim-load.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src='js/modal-deletar.js'></script>
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
        let cadastro = urlParams.get('cadastro');

        if (cadastro === 'true') {
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
        let atualizada = urlParamss.get('atualizada');

        if (atualizada === 'true') {
            abrirModal2();
        }
    </script>
</body>

</html>