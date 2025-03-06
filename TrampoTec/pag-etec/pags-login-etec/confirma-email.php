<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../css/confirma-email.css">
    <title>Cadastro</title>
</head>

<body>
    <main>
        <img class="cima" src="../img/imagemfundocima.png" alt="">
        <img class="baixo" src="../img/imagemfundobaixo.png" alt="">

        <section class="login">
            <div class="box-formulario">
                <div class="title-login">
                <h1>Confirmação de Email</h1>
                <p>Valide seu email para prosseguir com o cadastro</p>
                </div>
                <form action="login.php">
                    <div class="item-form">
                        <label for="nome-professor">EMAIL</label>
                        <div class="div-input">
                            <input type="email" name="email-professor" placeholder="Digite seu email" id="email-professor">
                        </div>
                    </div>
                    <div class="item-form">
                        <label for="email-institucional">CONFIRMAR EMAIL </label>
                        <div class="div-input">
                            <input type="email" name="email-institucional" id="email-institucional" placeholder="Confirme seu email">
                        </div>
                    </div>
                    
                    <input class="botao" type="submit" value="Enviar">


                </form>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>