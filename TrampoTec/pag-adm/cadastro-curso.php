<?php
require_once "back-end/login/validador_acesso.php";
include '../dao/conexao.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dados = [];

    // Loop para coletar todos os campos do formulário
    $contadorCampos = 1;
    while (isset($_POST["campo{$contadorCampos}"])) {
        $campo = $_POST["campo{$contadorCampos}"];
        $dados[] = $campo;
        $contadorCampos++;
    }

    // Agora, você pode fazer o que quiser com os dados (por exemplo, armazená-los no banco de dados ou exibi-los)
    foreach ($dados as $campo) {
        echo "Campo: " . htmlspecialchars($campo) . "<br>";
    }
}

if ($_POST) {
    $id_curso = $_POST['id_curso'];
    $querySelect = "SELECT * FROM tb_curso  WHERE idCurso = $id_curso";
    $resultado = $conexao->query($querySelect);
    $curso = $resultado->fetch();
    $id_curso = $curso["idCurso"];
    $nome = $curso["nome"];
    $cargaHoraria = $curso["cargaHoraria"];
    $semestre = $curso["semestre"];
    $modalidade = $curso["modalidade"];
    $ensino = $curso["ensino"];
    $querySelect = "SELECT * FROM tb_eixo  WHERE fk_idCurso = $id_curso";
    $resultado = $conexao->query($querySelect);
    $eixo = $resultado->fetch();
    $eixo1 = $eixo["eixo"];
} else {
    $id_curso = "";
    $nome = "";
    $cargaHoraria = "";
    $semestre = "";
    $modalidade = "";
    $ensino = "";
    $eixo1 = "";
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
    <link rel="stylesheet" href="css/cadastro-curso.css">
    <title>cadastrar Cursos</title>

    <style>
        /* Estilos para o modal e overlay */
        #modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 250px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            transition: transform 0.4s, top 0.4s;
            padding: 20px;
        }

        #modal .align-itens {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            height: 100%;
            justify-content: center;
            gap: 4px;

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
            background-color: #4caf50;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            width: 90%;
            transition: 0.3s all ease-in-out;
            padding-left: 42%;
        }

        #modal .align-itens .btn:hover {
            background-color: #4caf4fe8;
            transition: 0.3s all ease-in-out;
        }

        #modal .align-itens .titulo {
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;

        }

        #modal .titulo1 {
            font-size: 1.6rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            text-align: center;

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
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 400px;
            height: 250px;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            transition: transform 0.4s, top 0.4s;
            padding: 20px;
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
            margin-top:-10px;

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
            background-color: #4caf50;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
            width: 90%;
            transition: 0.3s all ease-in-out;
            padding-left: 42%;
        }

        #modal2 .align-itens .btn:hover {
            background-color: #4caf4fe8;
            transition: 0.3s all ease-in-out;
        }

        #modal2 .align-itens .titulo {
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;

        }

        #modal2 .titulo1 {
            font-size: 1.6rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            text-align: center;

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


        /* Estilos para o botão de fechar */
        #closeBtn2 {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
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

        #modal3 {
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

        #modal3 .align-itens {
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

        #modal3 .align-itens .btn {
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
            padding-left: 42%;

        }

        #modal3 .align-itens .btn:hover {
            background-color: #8c8c8c;
            transition: 0.3s all ease-in-out;
        }

        #modal3 .align-itens .titulo {
            font-size: 1.8rem;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;

        }

        #modal3 .align-itens .titulo1 {
            font-size: 1.1rem;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            text-align: center;
            line-height: 25px;

        }

        #modal3 .align-x .btn1 {
            font-size: 2.2rem;
        }

        #modal3 .align-img {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #modal3 .align-img img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-top: -50px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        #modal3 .align-x {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
            margin-right: 20px;

        }

        #overlay3 {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>

<body>

    <!--<img class="cima" src="img/fundo2.png" alt="">-->
    <?php
include '../pag-adm/components/sidebar-adm.php';
?>

    <header>
        <div class="secao-cadastro">
            <a href="curso.php">
                <i id="icon-titulo" class="fa-solid fa-chevron-left"></i>
                <h2>Cadastrar um novo curso</h2>
            </a>
        </div>
    </header>
    <main>

        <div id="overlay"></div>

        <!-- Modal -->
        <div id="modal">
            <div class="align-img">
                <img src="img/check.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal()">&times;</span>
            </div>
            <div class="align-itens">

                <p class="titulo1">Cadastro de Curso </p>
                <p class="titulo1"> realizado com sucesso!😁</p>
                <button class="btn" onclick="fecharModal()">OK</button>
            </div>
        </div>
        <!-- Modal cadastro feito-->
        <!-- <div id="modal">
            <span id="closeBtn" onclick="fecharModal()">&times;</span>
            <p>Cadastro realizado com sucesso!!</p>
            <button onclick="fecharModal()">OK</button>
        </div> -->
        <div id="overlay2"></div>

        <!-- Modal Atualizado -->
        <!-- <div id="modal2">
            <span id="closeBtn2" onclick="fecharModal2()">&times;</span>
            <p>Curso atualizado com sucesso!!</p>
            <button onclick="fecharModal2()">OK</button>
        </div> -->

        <div id="modal2">
            <div class="align-img">
                <img src="img/check.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal2()">&times;</span>
            </div>
            <div class="align-itens">

                <p class="titulo1">Curso atualizado com sucesso!😁</p>
                <button class="btn" onclick="fecharModal2()">OK</button>
            </div>
        </div>

        <div id="overlay3"></div>

        <!-- Modal  erro -->
        <!-- <div id="modal3">
            <h4>Atenção</h4>
            <span id="closeBtn3" onclick="fecharModal3()">&times;</span>
            <p>Cadastro com erro, tente novamente</p>
            <button onclick="fecharModal3()">OK</button>
        </div> -->
        <div id="modal3">
            <div class="align-img">
                <img src="img/atencao.png" alt="">
            </div>
            <div class="align-x">
                <span id="closeBtn" class="btn1" onclick="fecharModal3()">&times;</span>
            </div>
            <div class="align-itens">
                <h4 class="titulo">Atenção!</h4>
                <h4 class="titulo">Cadastro com erro</h4>
                <p class="titulo1">Tente novamente!!</p>
                <button class="btn" onclick="fecharModal3()">OK</button>
            </div>
        </div>
        <section class="formulario-etec">
            <form action="back-end/cadastro/salvarCadastroCurso.php" method="post" id="meuFormulario">

                <div class="input-box">

                    <input type="text" id="nomeCuso" name="nomeCuso" value="<?=$nome?>" required>
                    <label class="label-anim" for="nome">NOME DO CURSO</label>
                </div>

                <div class="input-box">

                    <input type="text" id="eixo" name="eixo" value="<?=$eixo1?>" required>
                    <label class="label-anim" for="eixo">EIXO</label>
                </div>
                <div class="input-select">
                    <h3 class="sub-form">Informaçoes Adicionais</h3>
                    <select type="text" id="cargaHoraria" name="cargaHoraria" value="<?=$cargaHoraria?>" required>

                        <option>1200 horas</option>
                        <option>1600 horas</option>
                        <option>800 horas</option>

                    </select>
                    <select type="text" id="semestre" name="semestre" value="<?=$semestre?>" required>
                        <option>1º semestre</option>

                        <option>2º semestre</option>

                        <option>3º semestre</option>
                        <option>4º semestre</option>
                        <option>5º semestre</option>
                        <option>6º semestre</option>
                    </select>
                    <select type="text" id="modalidade" name="modalidade" required>
                        <option>Modalidade</option>
                        <option <?=$modalidade == 'Presencial' ? 'selected' : ''?>>Presencial</option>
                        <option <?=$modalidade == 'Online' ? 'selected' : ''?>>Online</option>


                    </select>
                    <select type="text" id="modalidade" name="ensino" required>
                        <option>Ensino</option>
                        <option <?=$ensino == 'Curso Tecnico' ? 'selected' : ''?>>Curso Tecnico</option>
                        <option <?=$ensino == 'Ensino Medio Integrado ao Tecnico(M-TEC)' ? 'selected' : ''?>>Ensino Medio
                            Integrado ao Tecnico(M-TEC)</option>
                        <option <?=$ensino == 'Ensino Medio Integrado ao Tecnico em Periodo Integral(M-TEC-Pi)' ? 'selected' : ''?>>Ensino Medio Integrado ao Tecnico em Periodo
                            Integral(M-TEC-Pi)</option>
                        <option <?=$ensino == 'Ensino Medio Integrado ao Tecnico em Periodo Noturno(M-TEC-N)' ? 'selected' : ''?>>Ensino Medio Integrado ao Tecnico em Periodo
                            Noturno(M-TEC-N)</option>
                        <option <?=$ensino == 'Articulação dos Ensino Medio - Técnico e Superior (AMS)' ? 'selected' : ''?>>
                            Articulação dos Ensino Medio - Técnico e Superior (AMS)</option>
                        <option <?=$ensino == 'Especialização Técnica' ? 'selected' : ''?>>Especialização Técnica</option>


                    </select>
                </div>



                <input type="hidden" id="id_curso" name="id_curso" value="<?=$id_curso?>">
                <input type="submit" class="btn" value="CADASTRAR">
            </form>
        </section>
    </main>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formulario = document.getElementById("meuFormulario");
            const camposContainer = document.getElementById("campos");
            const adicionarCampoButton = document.getElementById("adicionarCampo");

            let contadorCampos = 0;

            adicionarCampoButton.addEventListener("click", function() {
                contadorCampos++;

                const novoCampo = document.createElement("input");
                novoCampo.type = "text";
                novoCampo.name = `campo${contadorCampos}`;
                novoCampo.placeholder = `Requisito ${contadorCampos}`;
                camposContainer.appendChild(novoCampo);
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formulario = document.getElementById("meuFormulario");
            const camposContainer = document.getElementById("area");
            const adicionarCampoButton = document.getElementById("adicionarArea");

            let contadorArea = 0;

            adicionarCampoButton.addEventListener("click", function() {
                contadorArea++;

                const novoArea = document.createElement("input");
                novoArea.type = "text";
                novoArea.name = `area${contadorArea}`;
                novoArea.placeholder = `Area ${contadorArea}`;
                camposContainer.appendChild(novoArea);
            });
        });
    </script>
    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
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
        let cadastro = urlParams.get('cadastro');

        if (cadastro === 'true') {
            abrirModal();
        }
    </script>
    <script>
        // Função para abrir o modal
        function abrirModal2() {
            document.getElementById('overlay2').style.display = 'block';
            document.getElementById('modal2').style.display = 'block';
        }

        // Função para fechar o modal
        function fecharModal2() {
            document.getElementById('overlay2').style.display = 'none';
            document.getElementById('modal2').style.display = 'none';
        }

        // Verificar se o CPF já está cadastrado via GET
        let urlParamss = new URLSearchParams(window.location.search);
        let cadastroAtualizado = urlParamss.get('cadastroAtualizado');

        if (cadastroAtualizado === 'true') {
            abrirModal2();
        }
    </script>
    <script>
        // Função para abrir o modal
        function abrirModal3() {
            document.getElementById('overlay3').style.display = 'block';
            document.getElementById('modal3').style.display = 'block';
        }

        // Função para fechar o modal
        function fecharModal3() {
            document.getElementById('overlay3').style.display = 'none';
            document.getElementById('modal3').style.display = 'none';
        }

        // Verificar se o CPF já está cadastrado via GET
        let urlParamsss = new URLSearchParams(window.location.search);
        let cadastroErro = urlParamsss.get('cadastroErro');

        if (cadastroErro === 'true') {
            abrirModal3();
        }
    </script>
</body>

</html>