<?php
include '../dao/conexao.php';

require_once "./back-end/login/validador_acesso.php";

if($_POST){
    $emailEmpresa = $_POST['emailEmpresa'];
    $idCandidato = $_POST['idCandidato'];

    
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../pag-aluno/components/components-aluno.css">
    <link rel="stylesheet" href="../pag-aluno/css/chat.css">
    <title>Fale Conosco</title>
</head>

<body>
    <main id="main">
        <div class="container">
            <section class="formulario">
                <form action="">
                    <div class="align">
                        <div class="box-input">
                            <label for="nome">NOME:</label>
                            <input type="text" id="nome" name="nome">
                        </div>
                 
                    </div>
                    <div class="box-input">
                        <label for="email">EMAIL:</label>
                        <input type="email" id="email" name="email">
                    </div>

                    <textarea name="" id="" cols="30" rows="10" placeholder="detalhes" ></textarea>
                    <br>
                    <input class="btn" type="submit" value="ENVIAR" name="" id="">
                </form>

            </section>
        </div>

      
    </main>

    <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</body>

</html>