<?php
include '../dao/conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel='stylesheet' href='../pag-empresa/css/login-cadastro.css'>
    <link rel='stylesheet' href='../assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../assets/css/style.css'>

    <title>TrampoTec - Cadastro de Aluno </title>

    <style>
        #modal {
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

        #modal .align-itens {
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

        #modal .align-itens .btn {
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

        #modal .align-itens .btn:hover {
            background-color: #8c8c8c;
            transition: 0.3s all ease-in-out;
        }

        #modal .align-itens .titulo {
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;

        }

        #modal .align-itens .titulo1 {
            font-size: 1.1rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            line-height: 25px;

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

        #card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 10%;
        }

        h2 {
            color: #333;
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 15px
        }

        p {
            margin: 5px 0;
            color: #666;
        }

        h3 {
            font-weight: 600;
        }

        #card div {
            display: flex;
            align-items: baseline;
            margin: 15px 0px;
            gap: 2px;
        }

        #card i {
            margin-left: 230px;
            cursor: pointer;
        }

        .algin-cards {
            display: flex;
            align-items: center;
            justify-content: start;
            flex-direction: column;
            max-height: 600px;
            overflow-y: auto;
            margin-top: 5%;
            padding-right: 20px;
        }
    </style>
</head>

<body>
    <img class="cima" src="img/imagemfundocima.png">


    <img class="baixo" src="img/imagemfundobaixo.png">
    <div class="align-form">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-center">
                    <img class="logo" src="img/trampotec-logo.png" alt="foto do aluno">
                    <img width="80%" src="img/aluno-form.png">
                </div>
                <div class="col-12 col-md-6">
                    <div class="row">
                        <div class="col-12 mt-5">
                            <p class="titulo-um"> Bem vindo! Crie sua conta</p>
                            <p class="titulo-dois">Já tem uma conta? <a href="login.php">Fazer login</a></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <form id="form-cadastro" enctype="multipart/form-data" method="post" action="./back-end/cadastro/salvarCadastro.php">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Nome
                                                    Completo</small></label>
                                            <input type="text" class="form-control obrigatorio" id="nome" name="nome" placeholder="Nome Completo" <?= isset($_GET['nome']) ? 'Nome Completo' : '' ?> value="<?= $_GET['nome'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                O nome é obrigatório
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="cpf-aluno"><small>CPF</small></label>
                                            <input class="form-control obrigatorio cpf" type="text" placeholder="000.000.000-00" id="cpf-aluno" name="cdp-aluno" <?= isset($_GET['cpf']) ? '000.000.000-00' : '' ?> value="<?= $_GET['cpf'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                Digite um CPF válido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nasc-aluno"><small> Data de
                                                    Nascimento</small></label>
                                            <input type="date" class="form-control obrigatorio" id="nasc-aluno" name="nasc-aluno" placeholder="Data de Nascimento" <?= isset($_GET['dtNascimento']) ? 'Data de Nascimento' : '' ?> value="<?= $_GET['dtNascimento'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                Informe a data de nascimento
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">

                                            <div class="invalid-feedback">
                                                Informe a data de nascimento
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="email"><small>Email</small></label>
                                            <input class="form-control obrigatorio" type="text" <?= isset($_GET['email']) ? 'readonly' : '' ?> value="<?= $_GET['email'] ?? '' ?>" placeholder="exemplo@dominio.com" id="email" name="email">
                                            <div class="invalid-feedback">
                                                O email é obrigatório
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="telefone"><small>Telefone</small></label>
                                            <input class="form-control celular obrigatorio" type="text" placeholder="(00) 90000-0000" id="telefone" name="telefone" <?= isset($_GET['telAluno']) ? '(00) 90000-0000' : '' ?> value="<?= $_GET['telAluno'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                O telefone é obrigatório
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="senha"><small>Senha</small></label>
                                            <input class="form-control obrigatorio senha" type="password" placeholder="********" id="senha" name="senha" <?= isset($_GET['senha']) ? 'senha' : '' ?> value="<?= $_GET['senha'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                A senha deve conter no mínimo 8 caracteres e conter pelo menos um
                                                número, uma letra maiúscula e um caracter especial
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="confirm-password"><small>Confirme a senha</small></label>
                                            <input class="form-control obrigatorio confirm-password" type="password" placeholder="********" id="confirm-password" name="confirm-password" <?= isset($_GET['senha']) ? 'senha' : '' ?> value="<?= $_GET['senha'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                As senhas não são iguais
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="cep"><small>CEP</small></label>
                                            <input class="form-control cep obrigatorio" type="numeric" placeholder="00000-000" id="cep" name="cep" <?= isset($_GET['cep']) ? '00000-000' : '' ?> value="<?= $_GET['cep'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                Informe um CEP válido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="logradouro"><small>Logradouro</small></label>
                                            <input class="address-search form-control" readonly type="text" placeholder="Informe o CEP" id="logradouro" name="logradouro" <?= isset($_GET['logradouro']) ? 'Informe o CEP' : '' ?> value="<?= $_GET['logradouro'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="numero"><small>Número</small></label>
                                            <input class="form-control obrigatorio" type="text" placeholder="Número" id="numero" name="numero" <?= isset($_GET['numero']) ? 'Número' : '' ?> value="<?= $_GET['numero'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                O número é obrigatório
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="bairro"><small>Bairro</small></label>
                                            <input class="address-search form-control" readonly type="text" placeholder="Informe o CEP" id="bairro" name="bairro" <?= isset($_GET['bairro']) ? 'Informe o CEP' : '' ?> value="<?= $_GET['bairro'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="cidade"><small>Cidade</small></label>
                                            <input class="address-search form-control" readonly type="text" placeholder="Informe o CEP" id="cidade" name="cidade" <?= isset($_GET['cidade']) ? 'Informe o CEP' : '' ?> value="<?= $_GET['cidade'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-2">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="estado"><small>Estado</small></label>
                                            <input class="address-search form-control" readonly type="text" placeholder="Informe o CEP" id="estado" name="estado" <?= isset($_GET['estado']) ? 'Informe o CEP' : '' ?> value="<?= $_GET['estado'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Selecione uma
                                                    imagem</small></label>
                                            <input class="form-control obrigatorio" type="file" id="foto" name="foto" accept="image/*" enctype="multipart/form-data">
                                            <input type="hidden" id="foto_usuario" name="foto_usuario">
                                            <div class="invalid-feedback">
                                                Selecione uma imagem
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-submit-form mt-3 col-12">CADASTRAR</button>
                                    </div>
                                </div>
                            </form>

                            <div id="overlay"></div>
                            <div id="modal">
                                <div class="align-img">
                                    <img src="img/atencao.png" alt="">
                                </div>
                                <div class="align-x">
                                    <span id="closeBtn" class="btn1" onclick="fecharModal()">&times;</span>
                                </div>
                                <div class="align-itens">
                                    <h4 class="titulo">Atenção!</h4>

                                    <p class="titulo1">Este Cpf já foi cadastrado, tente outro!!</p>
                                    <button class="btn" onclick="fecharModal()">OK</button>
                                </div>
                            </div>
                            <!-- Modal -->
                            <!-- <div id="modal">
                                <h6>Ops temos um problema!!</h6>
                                <span id="closeBtn" onclick="fecharModal()">&times;</span>
                                <p>Este Cpf já foi cadastrado, tente outro!!</p>
                                <button onclick="fecharModal()">OK</button>
                            </div> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/js/jquery-3.7.1.js"></script>
    <script src="../assets/js/jquery.mask.min.js"></script>
    <script src="../assets/js/my-mask.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src='js/modal-deletar.js'></script>

    <script type="text/javascript">
        $(function() {
            $('input').keyup(function() {
                $(this).removeClass('is-valid is-invalid');
            });

            $('.cep').keyup(function() {
                $(this).removeClass('is-valid is-invalid');
                if (this.value.length == 9) {
                    $.get(`https://viacep.com.br/ws/${this.value}/json/`, function(address) {
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
                            $('#numero').focus();
                        }
                    });
                } else {
                    $('.address-search').val('');
                }
            });

            $('#senha').keyup(function() {
                if (!validatePassword(this.value)) {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }

                if ($('#confirm-password').val().length > 0) validateConfirmPassword(this.value, $('#confirm-password').val());

            });

            $('#confirm-password').keyup(function() {
                if (this.value.length == 0) return false;
                if ($('#senha').val().length > 0) validateConfirmPassword($('#senha').val(), this.value);
            });

            $('.cpf').keyup(function() {
                if (!validateCPF(this.value)) {
                    $(this).addClass('is-invalid');
                    $(this).removeClass('is-valid');
                } else {
                    $(this).removeClass('is-invalid');
                    $(this).addClass('is-valid');
                }
            });

            $('#form-cadastro').submit(function(e) {
                if (validarForm($(this))) {
                    e.preventDefault();
                }
            })
        })
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
        let cpfCadastrado = urlParams.get('cpfCadastrado');

        if (cpfCadastrado === 'true') {
            abrirModal();
        }
    </script>
</body>

</html>