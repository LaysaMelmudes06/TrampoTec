<?php
require_once "back-end/login/validador_acesso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/cadastro-adm.css">
    <title>TrampoTec - Cadastro Adm</title>

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
            margin-top: 50px;
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
            margin-top: 40px;
            width: 90%;
            transition: 0.3s all ease-in-out;


        }

        #modal .align-itens .btn:hover {
            background-color: #4caf4fe8;
            transition: 0.3s all ease-in-out;
        }

        #modal .align-itens .titulo {
            font-size: 1.7rem;
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

        /* Estilos para o botão de fechar */
        #closeBtn {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
        }

        #modal2 {
            display: none;
            padding: 20px;
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
            background-color: #b5b5b5;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
            width: 90%;
            transition: 0.3s all ease-in-out;


        }

        #modal2 .align-itens .btn:hover {
            background-color: #8c8c8c;
            transition: 0.3s all ease-in-out;
        }

        #modal2 .align-itens .titulo {
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;

        }

        #modal2 .align-itens .titulo1 {
            font-size: 1.1rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            line-height: 25px;

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
    </style>
</head>

<body>
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>
    <header>
        <div class="secao-cadastro">
            <a href="adm.php">
                <i id="icon-titulo" class="fa-solid fa-chevron-left"></i>
                <h2>Cadastrar um novo Administrador</h2>
            </a>
        </div>
    </header>
    <main>
        <div id="overlay"></div>

        <!-- Modal -->
        <div id="modal">
            <div class="align-img">
                <img src="img/check.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal()">&times;</span>
            </div>
            <div class="align-itens">

                <p class="titulo">Administrador cadastrado </p>
                <p class="titulo">com sucesso!😁</p>
                <button class="btn" onclick="fecharModal()">OK</button>
            </div>
        </div>
        <!-- Modal -->
        <!-- <div id="modal">
            <span id="closeBtn" onclick="fecharModal()">&times;</span>
            <p>Cadastro realizado com sucesso!!</p>
            <button onclick="fecharModal()">OK</button>
        </div> -->
        <div id="overlay2"></div>
        <div id="modal2">
            <div class="align-img">
                <img src="img/atencao.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal2()">&times;</span>
            </div>
            <div class="align-itens">
                <h4 class="titulo">Atenção!</h4>
                <h4 class="titulo">Cadastro com erro</h4>
                <p class="titulo1">Tente novamente!!</p>
                <button class="btn" onclick="fecharModal2()">OK</button>
            </div>
        </div>
        <!-- Modal -->
        <!-- <div id="modal2">
            <h4>Atenção</h4>
            <span id="closeBtn2" onclick="fecharModal2()">&times;</span>
            <p>Cadastro com erro, tente novamente</p>
            <button onclick="fecharModal2()">OK</button>
        </div> -->
        <section class="formulario-adm">
            <form action="back-end/cadastro/salvarCadastro.php" method="POST">

                <div class="input-box">
                    <input type="text" id="nome" name="nome" required>
                    <label class="label-anim" for="nome">NOME</label>
                </div>
                <div class="input-box">
                    <input type="email" id="email" name="email" required>
                    <label class="label-anim" for="nome">EMAIL</label>
                </div>
                <div class="input-box">
                    <input type="password" id="senha" name="senha" required>
                    <label class="label-anim" for="nome">SENHA</label>
                </div>


                <input type="submit" class="btn" value="CADASTRAR">
            </form>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <script type="text/javascript">
        $("#telefone, #celular").mask("(00) 0000-0000");
    </script>
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
        let cadastroErro = urlParamss.get('cadastroErro');

        if (cadastroErro === 'false') {
            abrirModal2();
        }
    </script>
</body>

</html>