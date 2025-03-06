<?php
include '../dao/conexao.php';

$querySelect = "SELECT * FROM  tb_curso  ORDER BY nome ASC";

$query = $conexao->query($querySelect);

$resultado = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='../assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../assets/css/style.css'>
     <link rel='stylesheet' href='css/cadastro.css'>

    <title>TrampoTec - Cadastro Professor</title>
</head>

<body>
    <img class="cima" src="img/imagemfundocima.png">

    <img class="baixo" src="img/imagemfundobaixo.png">
<div class="align-card-cadastro">
    <div class="container">
            <div class="content first-content">
                    <div class="first-column">
                        <h2 class="title title-primary">Bem Vindo de Volta!</h2>

                        <p class="description description-primary">Efetue seu login clicando no botão </p>
                        <button id="signin" class="btn btn-primary">sign in</button>
                    </div>

                    <div class="second-column">
                        <p class="title-conta">Crie sua Conta </p>

                        <form id="form-cadastro" enctype="multipart/form-data" method="post" action="./back-end/cadastro/salvarCadastro.php">

                            <div class="form-group">
                                <div class="align-input">

                                <i class="fa-solid fa-user fa-lg" style="color:#75777a;"></i><input type="text" class="form-control obrigatorio" id="nome" name="nome" placeholder="Nome Completo">
                                        <div class="invalid-feedback">
                                            O nome é obrigatório
                                        </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="align-input">

                                    <i class="fa-solid fa-envelope fa-lg" style="color: #75777a;"></i><input class="form-control obrigatorio" type="text" placeholder="exemplo@dominio.com" name="email">
                                        <div class="invalid-feedback">
                                            O email é obrigatório
                                        </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="align-input">

                                <i class="fa-solid fa-lock fa-lg" style="color: #75777a;"></i><input class="form-control obrigatorio" type="password" placeholder="********" name="senha">
                                        <div class="invalid-feedback">
                                            A senha deve conter no mínimo 8 caracteres e conter pelo menos um número, uma letra maiúscula e um caracter especial
                                        </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="align-input">
                                <i class="fa-solid fa-image fa-lg" style="color:#75777a;"></i> <label class="font-weight-bold "  for="foto" id="label-file"><small>Selecione uma imagem</small></label>
                                        <input class="form-control obrigatorio" type="file" id="foto"  name="foto" accept="image/*"  enctype="multipart/form-data">
                                        <input type="hidden" id="foto_usuario" name="foto_usuario" >
                                        <div class="invalid-feedback">
                                            Selecione uma imagem
                                        </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="align-input">
                                <i class="fa-solid fa-layer-group fa-lg" style="color: #75777a;"></i>
                                <select name="curso" class="select-curso" id="">Escolha o seu curso
                                <?php foreach ($resultado as $resultado) {?>
                                    <option value="<?=$resultado[0]?>"><?=$resultado[1]?></option>
                                <?php }?>
                                </select>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="align-btn">

                                <button type="submit" class="btn btn-submit-form mt-3 col-12" id="btn">CADASTRAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
            </div>
            <div class="content second-content">
                <div class="first-column">
                <h2 class="title title-primary">Olá, Amigo!</h2>
                <p class="description description-primary">Crie sua conta agora</p>
                <p class="description description-primary">e comece sua jornada </p>
                <button id="signup" class="btn btn-primary">sign up</button>
                </div>

                <div class="second-column">
                <h2 class="title title-second">Faça seu login</h2>



                <form action="back-end/login/valida_login.php" method="post">
                    <div class="form-group-login">
                        <div class="align-input-login">
                            <i class="fa-solid fa-envelope fa-lg" style="color: #75777a;"></i><input  class="form-control-login obrigatorio"  placeholder= "Seu Email" type="email" name="email-professor" id="email-professor">
                        </div>

                        <div class="align-input-login">
                            <i class="fa-solid fa-lock fa-lg" style="color: #75777a;"></i><input  class="form-control-login obrigatorio"  placeholder="Sua Senha" type="password" name="senha-professor" id="password">
                            <i class="fa-solid fa-eye" id="icon" onclick="mostrarSenha()" style="color: #1f3251;"></i>
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
                            <div class="align-btn">
                                <input class="btn-second"  type="submit" value="Entrar">
                            </div>

                            <div class="align-row-conta">
                            <a href="relembrar-senha.php">Esqueceu a Senha?</a>

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
<script src="js/professor.js"></script>
<script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(function(){
        $('input').keyup(function(){
            $(this).removeClass('is-valid is-invalid');
        });

        $('.cep').keyup(function(){
            $(this).removeClass('is-valid is-invalid');
            if(this.value.length == 9){
                $.get(`https://viacep.com.br/ws/${this.value}/json/`, function(address){
                    if(address.erro){
                        $('.cep').removeClass('is-valid');
                        $('.cep').addClass('is-invalid');
                    }else{
                        $('.cep').removeClass('is-invalid');
                        $('.cep').addClass('is-valid');
                        $('#logradouro').val(address.logradouro);
                        $('#bairro').val(address.bairro);
                        $('#cidade').val(address.localidade);
                        $('#estado').val(address.uf);
                    }
                });
            }else{
                $('.address-search').val('');
            }
        });

        $('.cnpj').keyup(function(){
            if(!validateCNPJ(this.value)){
                $(this).addClass('is-invalid');
                $(this).removeClass('is-valid');
            }else{
                $(this).removeClass('is-invalid');
                $(this).addClass('is-valid');
            }
        });

        $('#form-cadastro').submit(function(e){
            if(validarForm($(this))){
                e.preventDefault();
            }
        })
    })
</script>


</body>

</html>
