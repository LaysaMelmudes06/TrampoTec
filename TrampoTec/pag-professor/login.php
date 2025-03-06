<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/logins.css">
    <title>Login</title>
</head>

<body>
    <main>
        <img class="cima" src="img/imagemfundocima.png" alt="">
        <img class="baixo" src="img/imagemfundobaixo.png" alt="">

        <section class="login">
            <div class="box-formulario">
                <h1 class="title-login">Login Professor</h1>

                <form action="back-end/login/valida_login.php" method="post">
                    <div class="item-form">
                        <label for="nome-professor">EMAIL</label>
                        <div class="div-input">
                            <input type="email" name="email-professor" id="email-professor">
                        </div>
                    </div>

                    <div class="item-form">
                        <label for="senha-professor">SENHA</label>
                        <div class="div-input">
                            <input type="password" name="senha-professor" id="senha-professor">
                            <i class="fa-solid fa-eye" style="color: #1f3251;"></i>
                        </div>
                    </div>
                    <?php
if (isset($_GET['login']) && $_GET['login'] == "erro") {
    ?>
                        <div class="text-danger">
                            Usuario ou senha Inválidos
                        </div>
                    <?php
}
?>
                    <input class="botao" type="submit" value="Entrar">
                    <div class="remember">
                        <div>
                            <input id="check" type="checkbox">
                            <label for="check"> Lembre de mim</label>
                        </div>
                        <a href="relembrar-senha.php">Esqueceu a Senha?</a>
                    </div>
                    <a href="confirmar_email.php" style="margin-left:30%;">Criar uma conta</a>
                </form>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>