<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/envia-link.css">
    <title>TrampoTec - Registrar</title>
</head>

<body>
    <main>
        <img class="cima" src="img/imagemfundocima.png" alt="">
        <img class="baixo" src="img/imagemfundobaixo.png" alt="">

        <section class="login">
            <div class="box-formulario">
                <h1 class="title-login">Cadastro <br> Aluno</h1>

                <form class="send-validation-email" id="form-valida-email" action="../helpers/confirm-mail-helper.php">
                    <div class="item-form">
                        <label for="email">EMAIL INSTITUCIONAL</label>
                        <div class="div-input">
                            <input class="email" type="email" name="email" id="email">
                        </div>
                    </div>
                    <input class="botao" type="submit" value="ENVIAR">

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