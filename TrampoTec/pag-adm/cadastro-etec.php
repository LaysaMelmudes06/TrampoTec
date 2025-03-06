<?php
include('../dao/conexao.php');

require_once "back-end/login/validador_acesso.php";

$querySelect = "SELECT * FROM  tb_curso";

$query = $conexao->query($querySelect);

$curso = $query->fetchAll();



if ($_POST) {
    $id_etec = $_POST['id_etec'];
    $querySelect = "SELECT * FROM tb_etec  WHERE idEtec = $id_etec";
    $resultado = $conexao->query($querySelect);
    $etec = $resultado->fetch();
    $id_etec = $etec["idEtec"];
    $nome = $etec["nome"];
    $email = $etec["email"];
    $codigo = $etec["codigo"];
    $municipio = $etec["municipio"];
} else if ($_GET) {
    $id_etec = $_GET['etec'];
    $querySelect = "SELECT * FROM tb_etec  WHERE idEtec = $id_etec";
    $resultado = $conexao->query($querySelect);
    $etec = $resultado->fetch();
    $id_etec = $etec["idEtec"];
    $nome = $etec["nome"];
    $email = $etec["email"];
    $codigo = $etec["codigo"];
    $municipio = $etec["municipio"];
} else {
    $id_etec = "";
    $nome = "";
    $email = "";
    $codigo = "";
    $municipio = "";
    $cursoEtec = "";
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <!--link icone filtro-->
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="components/component-adm.css">
    <link rel="stylesheet" href="css/cadastro-etec.css">

    <title>cadastrar etecs</title>

</head>

<body>
    <!--<img class="cima" src="img/fundo2.png" alt="">-->
    <?php
    include('../pag-adm/components/sidebar-adm.php');
    ?>

    <header>
       
        <div class="secao-cadastro">
            <a href="etec.php">
                <i id="icon-titulo" class="fa-solid fa-chevron-left"> </i>
                <h2>Cadastrar uma nova ETEC</h2>
            </a>
        </div>
    </header>
    <main>
        <section class="formulario-etec">
            <form action="back-end/cadastro/salvarCadastroEtec.php" method="post">
                <div class="input-box">

                    <input type="text" id="nome" name="nome" value="<?= $nome ?>" required>
                    <label class="label-anim" for="nome">NOME</label>
                </div>

                <div class="input-box">
                    <input type="text" id="email" name="email" value="<?= $email ?>" required>
                    <label class="label-anim" for="nome">EMAIL:</label>
                </div>

                <div class="input-box">
                    <input maxlength="text" type="numeric" id="codigo" name="codigo" value="<?= $codigo ?>" required>
                    <label class="label-anim" for="nome">CODIGO</label>
                </div>
                <div class="input-box">
                    <label class="label-mun" for="municipio">MUNICIPIO</label>
                    <select id="municipio" name="municipio">
                        <option value="Adamantina" <?= $municipio == 'Adamantina' ? 'selected' : '' ?>>Adamantina</option>
                        <option value="Aguaí" <?= $municipio == 'Aguaí' ? 'selected' : '' ?>>Aguaí</option>
                        <option value="Americana" <?= $municipio == 'Americana' ? 'selected' : '' ?>>Americana</option>
                        <option value="Amparo" <?= $municipio == 'Amparo' ? 'selected' : '' ?>>Amparo</option>
                        <option value="Andradina" <?= $municipio == 'Andradina' ? 'selected' : '' ?>>Andradina</option>
                        <option value="Araçatuba" <?= $municipio == 'Araçatuba' ? 'selected' : '' ?>>Araçatuba</option>
                        <option value="Araraquara" <?= $municipio == 'Araraquara' ? 'selected' : '' ?>>Araraquara</option>
                        <option value="Araras" <?= $municipio == 'Araras' ? 'selected' : '' ?>>Araras</option>
                        <option value="Assis" <?= $municipio == 'Assis' ? 'selected' : '' ?>>Assis</option>
                        <option value="Atibaia" <?= $municipio == 'Atibaia' ? 'selected' : '' ?>>Atibaia</option>
                        <option value="Avaré" <?= $municipio == 'Avaré' ? 'selected' : '' ?>>Avaré</option>
                        <option value="Barra Bonita" <?= $municipio == 'Barra Bonita' ? 'selected' : '' ?>>Barra Bonita
                        </option>
                        <option value="Barretos" <?= $municipio == 'Barretos' ? 'selected' : '' ?>>Barretos</option>
                        <option value="Bauru" <?= $municipio == 'Bauru' ? 'selected' : '' ?>>Bauru</option>
                        <option value="Bebedouro" <?= $municipio == 'Bebedouro' ? 'selected' : '' ?>>Bebedouro</option>
                        <option value="Birigui" <?= $municipio == 'Birigui' ? 'selected' : '' ?>>Birigui</option>
                        <option value="Botucatu" <?= $municipio == 'Botucatu' ? 'selected' : '' ?>>Botucatu</option>
                        <option value="Bragança Paulista" <?= $municipio == 'Bragança Paulista' ? 'selected' : '' ?>>
                            Bragança
                            Paulista</option>
                        <option value="Caçapava" <?= $municipio == 'Caçapava' ? 'selected' : '' ?>>Caçapava</option>
                        <option value="Cachoeira Paulista" <?= $municipio == 'Cachoeira Paulista' ? 'selected' : '' ?>>
                            Cachoeira
                            Paulista</option>
                        <option value="Cafêlandia" <?= $municipio == 'Cafêlandia' ? 'selected' : '' ?>>Cafêlandia</option>
                        <option value="Campinas" <?= $municipio == 'Campinas' ? 'selected' : '' ?>>Campinas</option>
                        <option value="Campo Limpo Paulista" <?= $municipio == 'Campo Limpo Paulista' ? 'selected' : '' ?>>
                            Campo
                            Limpo Paulista</option>
                        <option value="Casa Branca" <?= $municipio == 'Casa Branca' ? 'selected' : '' ?>>Casa Branca
                        </option>
                        <option value="Caraguatatuba" <?= $municipio == 'Caraguatatuba' ? 'selected' : '' ?>>Caraguatatuba
                        </option>
                        <option value="Carapicuíba" <?= $municipio == 'Carapicuíba' ? 'selected' : '' ?>>Carapicuíba
                        </option>
                        <option value="Catanduva" <?= $municipio == 'Catanduva' ? 'selected' : '' ?>>Catanduva</option>
                        <option value="Cerqueira César" <?= $municipio == 'Cerqueira César' ? 'selected' : '' ?>>Cerqueira
                            César
                        </option>
                        <option value="Cerquilho" <?= $municipio == 'Cerquilho' ? 'selected' : '' ?>>Cerquilho</option>
                        <option value="Cotia" <?= $municipio == 'Cotia' ? 'selected' : '' ?>>Cotia</option>
                        <option value="Cravinhos" <?= $municipio == 'Cravinhos' ? 'selected' : '' ?>>Cravinhos</option>
                        <option value="Cruzeiro" <?= $municipio == 'Cruzeiro' ? 'selected' : '' ?>>Cruzeiro</option>
                        <option value="Cubatão" <?= $municipio == 'Cubatão' ? 'selected' : '' ?>>Cubatão</option>
                        <option value="Diadema" <?= $municipio == 'Diadema' ? 'selected' : '' ?>>Diadema</option>
                        <option value="Dracena" <?= $municipio == 'Dracena' ? 'selected' : '' ?>>Dracena</option>
                        <option value="Embu das Artes" <?= $municipio == 'Embu das Artes' ? 'selected' : '' ?>>Embu das
                            Artes
                        </option>
                        <option value="Espirito Santo do Pinhal" <?= $municipio == 'Espirito Santo do Pinhal' ? 'selected' : '' ?>>Espirito Santo do Pinhal</option>
                        <option value="Ferraz de Vasconcelos" <?= $municipio == 'Ferraz de Vasconcelos' ? 'selected' : '' ?>>
                            Ferraz de Vasconcelos</option>
                        <option value="Franca" <?= $municipio == 'Franca' ? 'selected' : '' ?>>Franca</option>
                        <option value="Francisco Morato" <?= $municipio == 'Francisco Morato' ? 'selected' : '' ?>>
                            Francisco
                            Morato</option>
                        <option value="Franco da Rocha" <?= $municipio == 'Franco da Rocha' ? 'selected' : '' ?>>Franco da
                            Rocha
                        </option>
                        <option value="Garça" <?= $municipio == 'Garça' ? 'selected' : '' ?>>Garça</option>
                        <option value="Guaíra" <?= $municipio == 'Guaíra' ? 'selected' : '' ?>>Guaíra</option>
                        <option value="Guaratinguetá" <?= $municipio == 'Guaratinguetá' ? 'selected' : '' ?>>Guaratinguetá
                        </option>
                        <option value="Guariba" <?= $municipio == 'Guariba' ? 'selected' : '' ?>>Guariba</option>
                        <option value="Guarujá" <?= $municipio == 'Guarujá' ? 'selected' : '' ?>>Guarujá</option>
                        <option value="Guarulhos" <?= $municipio == 'Guarulhos' ? 'selected' : '' ?>>Guarulhos</option>
                        <option value="Ibaté" <?= $municipio == 'Ibaté' ? 'selected' : '' ?>>Ibaté</option>
                        <option value="Ibitinga" <?= $municipio == 'Ibitinga' ? 'selected' : '' ?>>Ibitinga</option>
                        <option value="Igarapava" <?= $municipio == 'Igarapava' ? 'selected' : '' ?>>Igarapava</option>
                        <option value="Iguapé" <?= $municipio == 'Iguapé' ? 'selected' : '' ?>>Iguapé</option>
                        <option value="Ilha Solteira" <?= $municipio == 'Ilha Solteira' ? 'selected' : '' ?>>Ilha Solteira
                        </option>
                        <option value="Ipiaí" <?= $municipio == 'Ipiaí' ? 'selected' : '' ?>>Ipiaí</option>
                        <option value="Itanhaém" <?= $municipio == 'Itanhaém' ? 'selected' : '' ?>>Itanhaém</option>
                        <option value="Itapeva" <?= $municipio == 'Itapeva' ? 'selected' : '' ?>>Itapeva</option>
                        <option value="Itapetininga" <?= $municipio == 'Itapetininga' ? 'selected' : '' ?>>Itapetininga
                        </option>
                        <option value="Itatiba" <?= $municipio == 'Itatiba' ? 'selected' : '' ?>>Itatiba</option>
                        <option value="Itu" <?= $municipio == 'Itu' ? 'selected' : '' ?>>Itu</option>
                        <option value="Ituverava" <?= $municipio == 'Ituverava' ? 'selected' : '' ?>>Ituverava</option>
                        <option value="Jacareí" <?= $municipio == 'Jacareí' ? 'selected' : '' ?>>Jacareí</option>
                        <option value="Jales" <?= $municipio == 'Jales' ? 'selected' : '' ?>>Jales</option>
                        <option value="Jandira" <?= $municipio == 'Jandira' ? 'selected' : '' ?>>Jandira</option>
                        <option value="Jaú" <?= $municipio == 'Jaú' ? 'selected' : '' ?>>Jaú</option>
                        <option value="Leme" <?= $municipio == 'Leme' ? 'selected' : '' ?>>Leme</option>
                        <option value="Lençóis Paulista" <?= $municipio == 'Lençóis Paulista' ? 'selected' : '' ?>>Lençóis
                            Paulista</option>
                        <option value="Limeira" <?= $municipio == 'Limeira' ? 'selected' : '' ?>>Limeira</option>
                        <option value="Lins" <?= $municipio == 'Lins' ? 'selected' : '' ?>>Lins</option>
                        <option value="Lorena" <?= $municipio == 'Lorena' ? 'selected' : '' ?>>Lorena</option>
                        <option value="Mairinque" <?= $municipio == 'Mairinque' ? 'selected' : '' ?>>Mairinque</option>
                        <option value="Mariporã" <?= $municipio == 'Mariporã' ? 'selected' : '' ?>>Mariporã</option>
                        <option value="Marília" <?= $municipio == 'Marília' ? 'selected' : '' ?>>Marília</option>
                        <option value="Miguelópolis" <?= $municipio == 'Miguelópolis' ? 'selected' : '' ?>>Miguelópolis
                        </option>
                        <option value="Mirassol" <?= $municipio == 'Mirassol' ? 'selected' : '' ?>>Mirassol</option>
                        <option value="Mococa" <?= $municipio == 'Mococa' ? 'selected' : '' ?>>Mococa</option>
                        <option value="Mogi das Cruzes" <?= $municipio == 'Mogi das Cruzes' ? 'selected' : '' ?>>Mogi das
                            Cruzes
                        </option>
                        <option value="Mogi Guaçu" <?= $municipio == 'Mogi Guaçu' ? 'selected' : '' ?>>Mogi Guaçu</option>
                        <option value="Mogi Mirim" <?= $municipio == 'Mogi Mirim' ? 'selected' : '' ?>>Mogi Mirim</option>
                        <option value="Monte Alto" <?= $municipio == 'Monte Alto' ? 'selected' : '' ?>>Monte Alto</option>
                        <option value="Monte Aprazível" <?= $municipio == 'Monte Aprazível' ? 'selected' : '' ?>>Monte
                            Aprazível
                        </option>
                        <option value="Monte Mor" <?= $municipio == 'Monte Mor' ? 'selected' : '' ?>>Monte Mor</option>
                        <option value="Nova Odessa" <?= $municipio == 'Nova Odessa' ? 'selected' : '' ?>>Nova Odessa
                        </option>
                        <option value="Novo Horizonte" <?= $municipio == 'Novo Horizonte' ? 'selected' : '' ?>>Novo
                            Horizonte
                        </option>
                        <option value="Olímpia" <?= $municipio == 'Olímpia' ? 'selected' : '' ?>>Olímpia</option>
                        <option value="Orlândia" <?= $municipio == 'Orlândia' ? 'selected' : '' ?>>Orlândia</option>
                        <option value="Osasco" <?= $municipio == 'Osasco' ? 'selected' : '' ?>>Osasco</option>
                        <option value="Osvaldo Cruz" <?= $municipio == 'Osvaldo Cruz' ? 'selected' : '' ?>>Osvaldo Cruz
                        </option>
                        <option value="Palmital" <?= $municipio == 'Palmital' ? 'selected' : '' ?>>Palmital</option>
                        <option value="Paraguaçu Paulista" <?= $municipio == 'Paraguaçu Paulista' ? 'selected' : '' ?>>
                            Paraguaçu
                            Paulista</option>
                        <option value="Penápolis" <?= $municipio == 'Penápolis' ? 'selected' : '' ?>>Penápolis</option>
                        <option value="Piedade" <?= $municipio == 'Piedade' ? 'selected' : '' ?>>Piedade</option>
                        <option value="Pindamonhangaba" <?= $municipio == 'Pindamonhangaba' ? 'selected' : '' ?>>
                            Pindamonhangaba
                        </option>
                        <option value="Piracicaba" <?= $municipio == 'Piracicaba' ? 'selected' : '' ?>>Piracicaba</option>
                        <option value="Piraju" <?= $municipio == 'Piraju' ? 'selected' : '' ?>>Piraju</option>
                        <option value="Pirassununga" <?= $municipio == 'Pirassununga' ? 'selected' : '' ?>>Pirassununga
                        </option>
                        <option value="Poá" <?= $municipio == 'Poá' ? 'selected' : '' ?>>Poá</option>
                        <option value="Porto Feliz" <?= $municipio == 'Porto Feliz' ? 'selected' : '' ?>>Porto Feliz
                        </option>
                        <option value="Porto Ferreira" <?= $municipio == 'Porto Ferreira' ? 'selected' : '' ?>>Porto
                            Ferreira
                        </option>
                        <option value="Presidente Prudente" <?= $municipio == 'Presidente Prudente' ? 'selected' : '' ?>>
                            Presidente Prudente</option>
                        <option value="Presidente Venceslau" <?= $municipio == 'Presidente Venceslau' ? 'selected' : '' ?>>
                            Presidente Venceslau</option>
                        <option value="Quatá" <?= $municipio == 'Quatá' ? 'selected' : '' ?>>Quatá</option>
                        <option value="Rancharia" <?= $municipio == 'Rancharia' ? 'selected' : '' ?>>Rancharia</option>
                        <option value="Registro" <?= $municipio == 'Registro' ? 'selected' : '' ?>>Registro</option>
                        <option value="Ribeirão Pires" <?= $municipio == 'Ribeirão Pires' ? 'selected' : '' ?>>Ribeirão
                            Pires
                        </option>
                        <option value="Ribeirão Preto" <?= $municipio == 'Ribeirão Preto' ? 'selected' : '' ?>>Ribeirão
                            Preto
                        </option>
                        <option value="Rio Claro" <?= $municipio == 'Rio Claro' ? 'selected' : '' ?>>Rio Claro</option>
                        <option value="Rio das Pedras" <?= $municipio == 'Rio das Pedras' ? 'selected' : '' ?>>Rio das
                            Pedras
                        </option>
                        <option value="Rio Grande da Serra" <?= $municipio == 'Rio Grande da Serra' ? 'selected' : '' ?>>
                            Rio
                            Grande da Serra</option>
                        <option value="Santa Bárbara D'Oeste" <?= $municipio == 'Santa Bárbara DOeste' ? 'selected' : '' ?>>
                            Santa Bárbara D'Oeste</option>
                        <option value="Santa Cruz das Palmeira" <?= $municipio == 'Santa Cruz das Palmeira' ? 'selected' : '' ?>>Santa Cruz das Palmeira</option>
                        <option value="Santa Cruz do Rio Pardo" <?= $municipio == 'Santa Cruz do Rio Pardo' ? 'selected' : '' ?>>Santa Cruz do Rio Pardo</option>
                        <option value="Santa Fé do Sul" <?= $municipio == 'Santa Fé do Sul' ? 'selected' : '' ?>>Santa Fé
                            do Sul
                        </option>
                        <option value="Santa Isabel" <?= $municipio == 'Santa Isabel' ? 'selected' : '' ?>>Santa Isabel
                        </option>
                        <option value="Santana de Parnaíba" <?= $municipio == 'Santana de Parnaíba' ? 'selected' : '' ?>>
                            Santana
                            de Parnaíba</option>
                        <option value="Santo André" <?= $municipio == 'Santo André' ? 'selected' : '' ?>>Santo André
                        </option>
                        <option value="Santos" <?= $municipio == 'Santos' ? 'selected' : '' ?>>Santos</option>
                        <option value="São Bernado do Campo" <?= $municipio == 'São Bernado do Campo' ? 'selected' : '' ?>>
                            São
                            Bernado do Campo</option>
                        <option value="São Caetano do Sul" <?= $municipio == 'São Caetano do Sul' ? 'selected' : '' ?>>São
                            Caetano do Sul</option>
                        <option value="São Carlos" <?= $municipio == 'São Carlos' ? 'selected' : '' ?>>São Carlos</option>
                        <option value="São Joaquim da Barra" <?= $municipio == 'São Joaquim da Barra' ? 'selected' : '' ?>>
                            São
                            Joaquim da Barra</option>
                        <option value="São José do Rio Pardo" <?= $municipio == 'São José do Rio Pardo' ? 'selected' : '' ?>>São
                            José do Rio Pardo</option>
                        <option value="São José dos Campos" <?= $municipio == 'São José dos Campos' ? 'selected' : '' ?>>
                            São
                            José dos Campos</option>
                        <option value="São Manuel" <?= $municipio == 'São Manuel' ? 'selected' : '' ?>>São Manuel</option>
                        <option value="São Paulo" <?= $municipio == 'São Paulo' ? 'selected' : '' ?>>São Paulo</option>
                        <option value="São Pedro" <?= $municipio == 'São Pedro' ? 'selected' : '' ?>>São Pedro</option>
                        <option value="São Roque" <?= $municipio == 'São Roque' ? 'selected' : '' ?>>São Roque</option>
                        <option value="São Sebastião" <?= $municipio == 'São Sebastião' ? 'selected' : '' ?>>São Sebastião
                        </option>
                        <option value="São Simão" <?= $municipio == 'São Simão' ? 'selected' : '' ?>>São Simão</option>
                        <option value="Serrana" <?= $municipio == 'Serrana' ? 'selected' : '' ?>>Serrana</option>
                        <option value="Sorocaba" <?= $municipio == 'Sorocaba' ? 'selected' : '' ?>>Sorocaba</option>
                        <option value="Sumaré" <?= $municipio == 'Sumaré' ? 'selected' : '' ?>>Sumaré</option>
                        <option value="Suzano" <?= $municipio == 'Suzano' ? 'selected' : '' ?>>Suzano</option>
                        <option value="Taboão da Serra" <?= $municipio == 'Taboão da Serra' ? 'selected' : '' ?>>Taboão da
                            Serra
                        </option>
                        <option value="Taquaritinga" <?= $municipio == 'Taquaritinga' ? 'selected' : '' ?>>Taquaritinga
                        </option>
                        <option value="Taquarituba" <?= $municipio == 'Taquarituba' ? 'selected' : '' ?>>Taquarituba
                        </option>
                        <option value="Tatuí" <?= $municipio == 'Tatuí' ? 'selected' : '' ?>>Tatuí</option>
                        <option value="Teodoro Sampaio" <?= $municipio == 'Teodoro Sampaio' ? 'selected' : '' ?>>Teodoro
                            Sampaio
                        </option>
                        <option value="Tietê" <?= $municipio == 'Tietê' ? 'selected' : '' ?>>Tietê</option>
                        <option value="Tupã" <?= $municipio == 'Tupã' ? 'selected' : '' ?>>Tupã</option>
                        <option value="Vargem Grande do Sul" <?= $municipio == 'Vargem Grande do Sul' ? 'selected' : '' ?>>
                            Vargem Grande do Sul</option>
                        <option value="Vera Cruz" <?= $municipio == 'Vera Cruz' ? 'selected' : '' ?>>Vera Cruz</option>
                        <option value="Votorantim" <?= $municipio == 'Votorantim' ? 'selected' : '' ?>>Votorantim</option>

                    </select>
                </div>

                <input type="hidden" id="id_etec" name="id_etec" value="<?= $id_etec ?>">
                <input type="submit" value="Próximo" class="btn"></input>
                <!--<input type="submit" class="btn" value="CADASTRAR">-->
            </form>
        </section>
    </main>
    <script src="modal-etec.js"></script>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
    <script>
        var count = 0;

        function adicionarSelect() {
            count++;
            // Crie um elemento select
            var select = document.createElement("select");


            // Defina os atributos desejados para o select
            select.name = "selectName[]"; // Nome do select
            select.id = ("selectId" + count); // ID do select (opcional)

            <?php foreach ($curso as $curso) { ?>
                // Crie opções para o select
                var option1 = document.createElement("option");
                option1.value = "<?= $curso[0] ?>";
                option1.text = "<?= $curso[1] ?>";

                // Adicione as opções ao select
                select.appendChild(option1);

                // Adicione o select à página
                document.getElementById("campoSelect").appendChild(select);

            <?php } ?>
        }

        function apagarUltimoSelect() {
            var campoSelect = document.getElementById("campoSelect");
            var selects = campoSelect.getElementsByTagName("select");

            if (selects.length > 0) {
                // Remove o último select da lista
                campoSelect.removeChild(selects[selects.length - 1]);
            }
        }
    </script>

</body>

</html>