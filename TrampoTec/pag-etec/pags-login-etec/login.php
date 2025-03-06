<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>

<body>
    <main>
        <img class="cima" src="../img/imagemfundocima.png" alt="">
        <img class="baixo" src="../img/imagemfundobaixo.png" alt="">

        <section class="login">
            <div class="box-formulario">
                <h1 class="title-login">Login Etec</h1>

                <form action="home.php">
                    <div class="item-form">
                        <label for="nome-etec">NOME</label>
                        <div class="div-input">
                            <input type="text" name="nome-etec" id="nome-etec">
                        </div>
                    </div>

                    <div class="item-form">
                        <label for="senha-etec">SENHA</label>
                        <div class="div-input">
                            <input type="password" name="senha-etec" id="senha-etec">
                            <i class="fa-solid fa-eye" style="color: #1f3251;"></i>
                        </div>
                    </div>
                    <input class="botao" type="submit" value="Entrar">
                    <div class="remember">
                        <div>
                            <input id="check" type="checkbox">
                            <label for="check"> Lembre de mim</label>
                        </div>
                        <a href="redefinir-senha.php">Esqueceu a Senha?</a>
                    </div>
                    <a href="./cadastro.php" style="margin-left:30%;">Criar uma conta</a>
                </form>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>