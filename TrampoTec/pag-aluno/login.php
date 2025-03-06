   <?php
include '../dao/conexao.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='../assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../assets/css/style.css'>
    <link rel="stylesheet" href="css/login.css">


    <title>Login</title>
</head>

<body>
    <main>

        <img class="cima" src="img/imagemfundocima.png">

        <img class="baixo" src="img/imagemfundobaixo.png">
        <div class="align-card-cadastro">
            <div class="container">
                <div class="content first-content">
                    <div class="first-column">
                        <h2 class="title title-primary">Bem Vindo de Volta!</h2>

                        <p class="description description-primary">Efetue seu login clicando no botão </p>
                        <button id="signin" class="btn btn-primary">Criar</button>
                    </div>

                    <div class="second-column">
                        <p class="title-conta">Faça Seu Login </p>

                        <form id="form-cadastro" enctype="multipart/form-data" method="post"
                            action="./back-end/login/valida_login.php">

                            <div class="form-group">
                                <div class="align-input">

                                    <i class="fa-solid fa-user fa-lg" style="color:#75777a;"></i><input type="text"
                                        class="form-control obrigatorio" id="nome-aluno" name="nome-aluno"
                                        placeholder="Seu Email">

                                </div>
                            </div>


                            <div class="form-group">
                                <div class="align-input">
                                    <i class="fa-solid fa-lock fa-lg" style="color: #75777a;"></i>
                                    <input class="form-control obrigatorio" id="password" type="password" placeholder="Sua Senha" name="senha-aluno">
                                    <i class="fa-solid fa-eye" id="icon" onclick="mostrarSenha()" style="color: #1f3251; font-size: 22px;"></i>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="align-btn">

                                    <button type="submit" class="btn btn-submit-form mt-3 col-12"
                                        id="btn">LOGAR</button>
                                    <?php
                                    if (isset($_GET['login']) && $_GET['login'] == "erro") {
                                        ?>
                                        <div class="text-danger">
                                            Usuario ou senha Inválidos
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    

                                </div>

                            </div>

                        </form>
                    </div>
                </div>
                <div class="content second-content">
                    <div class="first-column">
                        <h2 class="title title-primary">Bem Vindo de Volta!</h2>
                        <p class="description description-primary">Efetue seu login clicando no botão</p>

                        <button id="signup" class="btn btn-primary">Entrar</button>
                    </div>

                    <div class="second-column">
                        <h2 class="title title-second">Cadastro Aluno </h2>



                        <form class="send-validation-email" id="form-valida-email"
                            action="../helpers/confirm-mail-helper.php" method="post">
                            <div class="form-group-login">
                                <div class="align-input-login">
                                    <div class="div-input email">
                                        <i class="fa-solid fa-envelope fa-lg" style="color: #75777a;"></i><input
                                            class="form-control-login  email obrigatorio" placeholder="Seu Email"
                                            type="email" name="email" id="email">
                                    </div>
                                </div>
                                <small class="invalid-feedback"> O email deve conter @etec.sp.gov.br e ser
                                    válido.</small>

                                <div class="align-btn">
                                    <input class="btn-second" type="submit" value="Enviar">
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="../assets/js/jquery-3.7.1.js"></script>
        <script src="../assets/js/jquery.mask.min.js"></script>
        <script src="../assets/js/my-mask.js"></script>
        <script src="../assets/js/bootstrap.min.js"></script>
        <script src="../assets/js/main.js"></script>
        <script src="../assets/js/sweetalert2@11.js"></script>
        <script src="js/professor.js"></script>
        <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(function () {
                $('input').keyup(function () {
                    $(this).removeClass('is-valid is-invalid');
                });

                $('.cep').keyup(function () {
                    $(this).removeClass('is-valid is-invalid');
                    if (this.value.length == 9) {
                        $.get(`https://viacep.com.br/ws/${this.value}/json/`, function (address) {
                            if (address.erro) {
                                $('.cep').removeClass('is-valid');
                                $('.cep').addClass('is-invalid');
                            } else {
                                $('.cep').removeClass('is-invalid');
                                $('.cep').addClass('is-valid');
                                $('#logradouro').val(address.logradouro);
                                $('#bairro').val(address.bairro);
                                $('#cidade').val(address.localidade);
                                $('#estado').val(address.uf);
                            }
                        });
                    } else {
                        $('.address-search').val('');
                    }
                });

                $('.cnpj').keyup(function () {
                    if (!validateCNPJ(this.value)) {
                        $(this).addClass('is-invalid');
                        $(this).removeClass('is-valid');
                    } else {
                        $(this).removeClass('is-invalid');
                        $(this).addClass('is-valid');
                    }
                });

                $('#form-cadastro').submit(function (e) {
                    if (validarForm($(this))) {
                        e.preventDefault();
                    }
                })
            })
        </script>
</body>

</html>