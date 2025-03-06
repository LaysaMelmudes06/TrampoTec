<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="css/confirmaEmail.css">
    <title>Cadastro</title>
</head>

<body>
    <main>
        <img class="cima" src="img/imagemfundocima.png" alt="">
        <img class="baixo" src="img/imagemfundobaixo.png" alt="">

        <section class="login">
            <div class="box-formulario">
                <div class="title-login">
                <h1>Confirmação de Email</h1>
                <p>Valide seu email para prosseguir com o cadastro</p>
                </div>
                <form class="send-validation-email" id="form-valida-email" action="../helpers/confirm-mail-helper.php">
                    <input type="hidden" name="template" value="../templates/confirm-your-mail-professor.html">
                    <div class="item-form">
                        <label for="email">EMAIL</label>
                        <div class="div-input">
                            <input class="obrigatorio email" type="text" name="email" placeholder="Digite seu email" id="email">
                            <small class="invalid-feedback">Digite um email válido</small>
                        </div>
                    </div>
                    <div class="item-form">
                        <label for="email-confirmation">CONFIRMAR EMAIL </label>
                        <div class="div-input">
                            <input class="obrigatorio email-confirmation" type="text" name="email-confirmation" id="email-confirmation" placeholder="Confirme seu email">
                            <small class="invalid-feedback">Os e-mails não conferem</small>
                        </div>
                    </div>
                    <input class="botao" type="submit" value="Enviar">
                </form>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script src="../assets/js/jquery-3.7.1.js"></script>
    <script src="../assets/js/sweetalert2@11.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>