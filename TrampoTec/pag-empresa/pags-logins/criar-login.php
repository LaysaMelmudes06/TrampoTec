<?php
include '../../dao/conexao.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../reset.css">
    <link rel='stylesheet' href='../../pag-empresa/css/login-cadastro.css'>
    <link rel='stylesheet' href='../../assets/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../../assets/css/style.css'>
    <title>TrampoTec - Cadastro Empresa</title>

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

        #modal2 {
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

        #modal2 .align-itens {
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

        #modal2 .align-itens .btn {
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

        #modal2 .align-itens .btn:hover {
            background-color: #8c8c8c;
            transition: 0.3s all ease-in-out;
        }

        #modal2 .align-itens .titulo {
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;

        }

        #modal2 .align-itens .titulo1 {
            font-size: 1.1rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            line-height: 25px;

        }

        #modal2 .align-x .btn1 {
            font-size: 2.2rem;
        }

        #modal2 .align-img {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #modal2 .align-img img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: -50px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        #modal2 .align-x {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-right: 20px;

        }

        #overlay2 {
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
        #closeBtn2 {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <img class="cima" src="../img/imagemfundocima.png">

    <img class="baixo" src="../img/imagemfundobaixo.png">
    <div class="align-card-cadastro">
        <div class="container">
            <div class="row ">
                <div class="col-12 col-md-4 d-flex flex-column align-items-center justify-content-around">
                    <img class="logo" src="../img/trampotec-logo.png" alt="foto do aluno">
                    <img width="80%" src="../fotosEmpresa/perfil/empresa.png">
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
                            <form id="form-cadastro" enctype="multipart/form-data" method="post" action="../beck-end/cadastro/salvarCadastro.php">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>CNPJ</small></label>
                                            <input class="form-control cnpj obrigatorio" type="text" placeholder="00.000.000/0001-00" name="cnpj" <?= isset($_GET['cnpj']) ? '00.000.000/0001-00' : '' ?> value="<?= $_GET['cnpj'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                Digite um CNPJ válido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Nome Empresa</small></label>
                                            <input type="text" class="form-control obrigatorio" id="nome" name="nome" placeholder="Nome Empresa" <?= isset($_GET['nome']) ? 'Nome Empresa' : '' ?> value="<?= $_GET['nome'] ?? '' ?> ">
                                            <div class="invalid-feedback">
                                                O nome é obrigatório
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Email</small></label>
                                            <input class="form-control obrigatorio" type="text" placeholder="exemplo@dominio.com" name="email" <?= isset($_GET['email']) ? 'exemplo@dominio.com' : '' ?> value="<?= $_GET['email'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                O email é obrigatório
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Senha</small></label>
                                            <input class="form-control obrigatorio" type="password" placeholder="********" name="senha" <?= isset($_GET['senha']) ? '********' : '' ?> value="<?= $_GET['senha'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                A senha deve conter no mínimo 8 caracteres e conter pelo menos um número, uma letra maiúscula e um caracter especial
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Telefone</small></label>
                                            <input class="form-control celular obrigatorio" type="text" placeholder="(00) 90000-0000" name="telefone" <?= isset($_GET['telefone']) ? '(00) 90000-0000' : '' ?> value="<?= $_GET['telefone'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                O telefone é obrigatório
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>CEP</small></label>
                                            <input class="form-control cep obrigatorio" type="numeric" placeholder="00000-000" name="cep" <?= isset($_GET['cep']) ? 'Informe o CEP' : '' ?> value="<?= $_GET['cep'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                Informe um CEP válido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Logradouro</small></label>
                                            <input class="address-search form-control" readonly type="text" placeholder="Informe o CEP" id="logradouro" name="logradouro" <?= isset($_GET['logradouro']) ? 'readonly' : '' ?> value="<?= $_GET['logradouro'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Bairro</small></label>
                                            <input class="address-search form-control" readonly type="text" placeholder="Informe o CEP" id="bairro" name="bairro" <?= isset($_GET['bairro']) ? 'readonly' : '' ?> value="<?= $_GET['bairro'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Cidade</small></label>
                                            <input class="address-search form-control" readonly type="text" placeholder="Informe o CEP" id="cidade" name="cidade" <?= isset($_GET['cidade']) ? 'readonly' : '' ?> value="<?= $_GET['cidade'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Estado</small></label>
                                            <input class="address-search form-control" readonly type="text" placeholder="Informe o CEP" id="estado" name="estado" <?= isset($_GET['estado']) ? 'readonly' : '' ?> value="<?= $_GET['estado'] ?? '' ?>">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Número</small></label>
                                            <input class="form-control obrigatorio" type="text" placeholder="Número" id="numero" name="numero" <?= isset($_GET['numero']) ? 'Número' : '' ?> value="<?= $_GET['numero'] ?? '' ?>">
                                            <div class="invalid-feedback">
                                                O número é obrigatório
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label class="font-weight-bold border-0" for="nome"><small>Selecione uma imagem</small></label>
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

                            <!-- Modal -->
                            <!-- <div id="modal">
                                <h6>Ops temos um problema!!</h6>
                                <span id="closeBtn" onclick="fecharModal()">&times;</span>
                                <p>Este email ja foi cadastrado, tente outro!!</p>
                                <button onclick="fecharModal()">OK</button>
                            </div> -->
                            <div id="modal">
                                <div class="align-img">
                                    <img src="../img/atencao.png" alt="">
                                </div>
                                <div class="align-x">
                                    <span id="closeBtn" class="btn1" onclick="fecharModal()">&times;</span>
                                </div>
                                <div class="align-itens">
                                    <h4 class="titulo">Atenção!</h4>
                                    <p>Este email ja foi cadastrado, tente outro!!</p>
                                    <button class="btn" onclick="fecharModal()">OK</button>
                                </div>
                            </div>
                            <div id="overlay2"></div>

                            <!-- Modal -->
                            <!-- <div id="modal2">
                                <h6>Ops temos um problema!!</h6>
                                <span id="closeBtn2" onclick="fecharModal2()">&times;</span>
                                <p>Este Cnpj ja foi cadastrado, tente outro!!</p>
                                <button onclick="fecharModal2()">OK</button>
                            </div> -->
                            <div id="modal2">
                                <div class="align-img">
                                    <img src="../img/atencao.png" alt="">
                                </div>
                                <div class="align-x">
                                    <span id="closeBtn" class="btn1" onclick="fecharModal2()">&times;</span>
                                </div>
                                <div class="align-itens">
                                    <h4 class="titulo">Atenção!</h4>
                                    <p>Este Cnpj ja foi cadastrado, tente outro!!</p>
                                    <button class="btn" onclick="fecharModal2()">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/jquery-3.7.1.js"></script>
    <script src="../../assets/js/jquery.mask.min.js"></script>
    <script src="../../assets/js/my-mask.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/main.js"></script>

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
                        }
                    });
                } else {
                    $('.address-search').val('');
                }
            });

            $('.cnpj').keyup(function() {
                if (!validateCNPJ(this.value)) {
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
        let erroEmail = urlParams.get('erroEmail');

        if (erroEmail === 'true') {
            abrirModal();
        }
    </script>
    <script>
        // Função para abrir o modal

        // Verificar se o CPF já está cadastrado via GET
        let urlParamss = new URLSearchParams(window.location.search);
        let erroCnpj = urlParamss.get('erroCnpj');

        if (erroCnpj === 'true') {
            abrirModal1();
        }

        function abrirModal1() {
            document.getElementById('overlay2').style.display = 'block';
            document.getElementById('modal2').style.display = 'block';
        }

        function fecharModal2() {
            document.getElementById('overlay2').style.display = 'none';
            document.getElementById('modal2').style.display = 'none';
        }
    </script>
</body>

</html>