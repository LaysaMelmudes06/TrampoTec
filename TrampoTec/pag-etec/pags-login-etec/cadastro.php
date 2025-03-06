<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../css/cadastro.css">
    <title>Cadastro</title>
</head>

<body>
    <main>
        <img class="cima" src="../img/imagemfundocima.png" alt="">
        <img class="baixo" src="../img/imagemfundobaixo.png" alt="">

        <section class="login">
            <div class="box-formulario">
                <h1>Cadastro Etec</h1>
                <a class="link-login" href="login.php">Ja tem uma conta? Faça seu login</a>
                <form action="confirma-email.php">
                    <div class="item-form">
                        <label for="nome-etec">NOME</label>
                        <div class="div-input">
                            <input type="text" name="nome-etec" id="nome-etec">
                        </div>
                    </div>
                    <div class="item-form">
                        <label for="email-etec">EMAIL </label>
                        <div class="div-input">
                            <input type="email" name="email-etec" id="email-etec">
                        </div>
                    </div>
                    <div class="item-form">
                        <label for="codigo-etec">CODIGO</label>
                        <div class="div-input">
                            <input type="number" name="codigo-etec" id="codigo-etec">
                        </div>
                    </div>

                    <div class="item-form">
                        <label for="municipio-etec">MUNICIPIO</label>
                        <div class="div-input">
                            <input type="text" name="municipio-etec" id="municipio-etec">
                            
                        </div>
                    </div>

                    <div class="item-form">
                        <label for="senha-etec">SENHA</label>
                        <div class="div-input">
                            <input type="password" name="senha-etec" id="senha-etec">
                            <i class="fa-solid fa-eye" style="color: #1f3251;"></i>
                        </div>
                    </div>
                    <div class="align-file">
                        <label  class="label-file" for="arquivo-etec">Selecionar uma imagem</label>
                        <input class="input-file" type="file" name="arquivo-etec" id="arquivo-etec" >
                    </div>
                   
                    <input class="botao" type="submit" value="Cadastrar">


                </form>
            </div>
        </section>
    </main>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>