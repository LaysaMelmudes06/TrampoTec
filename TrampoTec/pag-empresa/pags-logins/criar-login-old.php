<?php
include('../../dao/conexao.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../reset.css">
    <link rel='stylesheet' href='../../pag-empresa/css/login-cadastro.css'>
    <title>TrampoTec</title>
</head>

<body>
    <img class="cima" src="../img/imagemfundocima.png">

    <img class="baixo" src="../img/imagemfundobaixo.png">

    <section class="cards-meio">

        <div class="card">

            <div class="imagens">
                <div> <img class="logo" src="../img/trampotec-logo.png" alt="foto do aluno"></div>
                <div> <img class="imagem-ilustra" src="../fotosEmpresa/perfil/1.png"></div>
                <div> </div>
            </div>

            <div class="linha"> </div>
            <div class="alinhamento-botao">
                <div class="titulo-geral-login">
                    <p class="titulo-um"> Bem vindo!! Crie sua conta</p><br>
                    <p class="titulo-dois"> ja tem uma conta faça ? seu login</p><br>
                </div>
                <div class="alinha-itens">
                    <div class="card-itens">


                        <div class="itens-agendar">
                            <div>
                                <form method="post" action="../beck-end/cadastro/salvarCadastro.php">
                                    <p class="titulo-agendar"> NOME </p>
                                    <div class="barra-agendar">
                                        <input required type="text" placeholder="." name="nome">
                                    </div>
                            </div>
                            <div>
                                <p class="titulo-agendar"> EMAIL </p>
                                <div class="barra-agendar">
                                    <input required type="text" placeholder="" name="email">
                                </div>
                            </div>
                            <div>
                                <p class="titulo-agendar"> SENHA </p>
                                <div class="barra-agendar">
                                    <input required type="password" placeholder="" name="senha">
                                </div>
                            </div>

                            <div>
                                <p class="titulo-agendar"> CNPJ </p>
                                <div class="barra-agendar">

                                    <input required type="text" placeholder="_ _ . _ _ _ . _ _ _ / _ _ _ _ - _ _" name="cnpj">
                                </div>
                            </div>

                            <div>
                                <p class="titulo-agendar"> CEP </p>
                                <div class="barra-agendar">
                                    <input required type="numeric" placeholder="" name="cep">
                                </div>
                            </div>

                            <div>
                                <p class="titulo-agendar"> TELEFONE </p>
                                <div class="barra-agendar">
                                    <input required type="text" placeholder="( ) _ _ _ _ _ - _ _ _ _" name="telefone">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-itens">
                        <div class="itens-agendar">

                            <div>

                                <p class="titulo-agendar"> LOGRADOURO </p>
                                <div class="barra-agendar">
                                    <input required type="text" placeholder="." name="logradouro">
                                </div>
                            </div>
                            <div>
                                <p class="titulo-agendar"> NUMERO </p>
                                <div class="barra-agendar">
                                    <input required type="numeric" placeholder="" name="numero">
                                </div>
                            </div>
                            <div>
                                <p class="titulo-agendar"> BAIRRO </p>
                                <div class="barra-agendar">
                                    <input required type="text" placeholder="" name="bairro">
                                </div>
                            </div>



                            <div>
                                <p class="titulo-agendar"> ESTADO </p>
                                <div class="barra-agendar">
                                    <select required id="estado" name="estado">
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                        <option value="EX">Estrangeiro</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <br>
                                <p class="titulo-agendar"><label for="foto"> SELECIONE UMA IMAGEM</label> </p>
                                <div class="barra-file">
                                    <input type="file" id="foto" name="foto" accept="image/*" >
                                    <input class="input-none" type="hidden" id="foto_empresa" name="foto_empresa">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <?php
                if (isset($_GET['login']) && $_GET['login'] == "cnpjInvalido") {
                    ?>
                    <div class="text-danger">
                        CNPJ INVALIDO!!
                    </div>
                    <?php
                }
                ?>

                <?php
                if (isset($_GET['login']) && $_GET['login'] == "senhaFraca") {
                    ?>
                    <div class="text-danger">
                        Senha até 8 digitos, exemplo: Senha12@
                    </div>
                    <?php
                }
                ?>

<?php
                if (isset($_GET['login']) && $_GET['login'] == "numeroTelInvalido") {
                    ?>
                    <div class="text-danger">
                        Telefone Invalido
                    </div>
                    <?php
                }
                ?>


                <div>

                    <button type="submit" class="botao-agendar">CADASTRAR</button>
                    </form>
                </div>
            </div>


        </div>




    </section>

</body>

</html>