<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/componente.css">
    <link rel="stylesheet" href="css/cadastro-curso.css">
    <title>TrampoTec</title>
</head>

<body>    
    <?php include '../pag-etec/componentes/sidebar.php'?>
    <?php include '../pag-etec/componentes/notificacao.php'?>
    <main>
        <section class="parte-pequisa">
            <span class="titulo-pagina">
                <i id="icon-titulo" class="fa-solid fa-chevron-left" style="color: #435b84;"></i>
                <h1>Cadastro de curso</h1>
            </span>
        </section>
        <section class="formulario">
            <form action="home.php">
                <div class="left">
                    <div class="align ">
                        <label for="nome-etec">Nome da Etec</label>
                        <input type="text" id="nome-etec" name="nome-etec">
                    </div>
                    <div class="align ">
                        <label for="localização">Localização</label>
                        <input type="text" id="localização" name="localização">
                    </div>
                    <div class="align ">
                        <label for="carga-horaria">Carga Horária</label>
                        <input type="time" id="carga-horaria" name="carga-horaria">
                    </div>
                    <div class="align ">
                        <label for="horario">Horário</label>
                        <input type="time" id="horario" name="carga-horaria">
                    </div>
                    <input class="btn" type="submit" value="ENVIAR">
                </div>



                <div class="right">
                    <div class="align">
                        <label for="nome-curso">Nome do Curso</label>
                        <input type="text" id="nome-curso" name="nome-curso">
                    </div>
                    <div class="align">
                        <label for="modalidade">Modalidade</label>
                        <select name="modalidade" id="modalidade">
                            <option value="">1</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                        </select>

                    </div>
                    <div class="align">
                        <label for="periodo">Periodo</label>
                        <input type="text" id="periodo" name="periodo">
                    </div>

                </div>
                </div>

            </form>
        </section>
    </main>

    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
    <script src="./js/etec.js"></script>
</body>

</html>