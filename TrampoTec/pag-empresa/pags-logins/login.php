<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../reset.css">
    <link rel='stylesheet' href='../../pag-empresa/css/login.css'>
    <title>TrampoTec</title>
</head>

<body>

    <img class="cima" src="../img/imagemfundocima.png">

    <img class="baixo" src="../img/imagemfundobaixo.png">



    <section class="cards-meio">

        <div class="card">

            <div class="imagens">
                <div> <img class="logo" src="../img/trampotec-logo.png" alt="foto do aluno"></div>
                <div> <img class="imagem-ilustra" src="../img/2.png" alt="foto do aluno"></div>
            </div>

            <div class="linha"> </div>

            <div class="card-itens">
                <div class="container">
                    <div class="textos-cards">
                        <p class="titulo-um"> Login</p><br>
                        <p class="titulo-dois"> Entre na sua conta</p>
                    </div>

                    <div class="itens-agendar">
                        <div>
                            <form action="../beck-end/login/valida_login.php" method="post">
                                <p class="titulo-agendar"> EMAIL </p>
                                <div class="barra-agendar">
                                    <input type="email" placeholder="." require_once name="email">
                                </div>
                        </div>

                        <div>
                            <p class="titulo-agendar"> SENHA </p>
                            <div style="display: flex; align-items: center; justify-content: center; border: 1px solid rgb(3, 3, 70); border-radius: 12px; padding: 5px; width: 98%;" >
                                <input style="border: none; width: 100%; padding: 4px;" type="password" id="password" placeholder="" require_once name="senha">
                                <i class="fa-solid fa-eye" id="icon" onclick="mostrarSenha()" style="color: #1f3251; font-size: 22px;"></i>
                            </div>

                        </div>


                    </div>

                    <div class="link-senha">
                        <?php
                        if (isset($_GET['login']) && $_GET['login'] == "naoaprovado") {
                        ?>
                            <div class="text-danger">
                                <br>
                                Cadastro Pendente
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if (isset($_GET['login']) && $_GET['login'] == "erro") {
                        ?>
                            <div class="text-danger">
                            <br>
                                Usuario ou senha Inválidos
                            </div>
                        <?php
                        }
                        ?>
                        <?php
                        if (isset($_GET['login']) && $_GET['login'] == "aguardoConfirmacao") {
                        ?>
                            <div class="text-danger">
                            <br>
                                Acesso em Aguardo
                            </div>
                        <?php
                        }
                        ?><br>
                        <button type="submit" class="botao-agendar">
                            <h6 class="corBotao">LOGIN<h6>
                        </button>
                   <!--     <br><a class="link" href="./redefinir-senha.php"> Esqueceu a senha? </a> -->
                        <br>
                        <a class="link" style="color: red;" href="./criar-login.php"> Não é cadastrado? Crie agora </a>
                    </div>

                    </form>
                </div>
            </div>
        </div>

    </section>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script>
        function mostrarSenha() {
            var senha = document.getElementById('password')
            var icon = document.getElementById('icon')

            if (senha.type === 'password') {
                senha.setAttribute('type', 'text')
                icon.classList.replace('fa-eye', 'fa-eye-slash')
            } else {
                senha.setAttribute('type', 'password')
                icon.classList.replace('fa-eye-slash', 'fa-eye')
            }
        }
    </script>
</body>

</html>