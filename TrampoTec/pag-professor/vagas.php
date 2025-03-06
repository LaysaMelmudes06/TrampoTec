
<html lang="en">
<?php
require_once "./back-end/login/validador_acesso.php";
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/side.css">
    <link rel="stylesheet" href="css/vagas.css">
    <link rel="stylesheet" href="css/geral.css">
</head>

<body>
    <?php
include '../pag-professor/components/sidebar.php';
?>
    <main class="main">
        <span class="titulo-vagas">Vagas</span>
        <div class="img-cima">
        <img src="img/fundo 2.png" alt="">
        </div>
    </main>

    <section class="sistema-busca">
        <div class="barra-pesquisa">
                <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #000000;"></i>
                <input type="text" name="pesquisa" id="pesquisa" placeholder="">
        </div>
            <div class="align-filtro" >
                <div class="filtro"  onclick="abrirFiltro()">
                <span   class="material-symbols-outlined">
                        tune
                </span>
                    <p >Filtrar</p>

                </div>
            </div>
            <div class="modal-filtro" id="abrir-filtro">
                <form action="" >
                    <div class="align-form-filtro">
                        <label for="">Periodo</label>
                        <select name="" id="">
                        <option value="">Tarde</option>
                        <option value="">Manhã</option>
                        <option value="">Noite</option>
                        </select>
                        </div>
                        <div class="align-form-filtro">
                        <label for="">Horario</label>
                        <input type="checkbox" name="" id="">
                        </div>
                        <div class="align-form-filtro">
                        <label for="">Curso</label>
                        <input type="checkbox" name="" id="">
                        </div>
                        <div class="align-form-filtro">
                        <label for="">Area</label>
                        <input type="checkbox" name="" id="">
                        </div>
                        <input type="submit" value="Aplicar" class="button-filtro">

                </form>
            </div>

    </section>

    <section class="empresa">

<table>
    <thead>
        <tr>

            <th>EMPRESA</th>
            <th>VAGA</th>
            <th>PERIODO</th>
            <th>SALARIO</th>
            <th>REQUISITOS</th>

        </tr>
    </thead>
    <tbody>
        <tr class="infos">

            <td class="table-nome-empresa">Cysco Systen</td>
            <td class="table-email-empresa">Front - End</td>
            <td class="table-cnpj">Manhã</td>
            <td class="table-cep">R$ 2000,00</td>
            <td class="table-log">Saber programar JavaScript</td>

            <td class="icone-table">
            <div class="icons">
                    <i id="btn1" class="fa-solid fa-circle-check" style="color: #0c5fed;"></i>
                    <i class="fa-solid fa-xmark" style="color: #e00000;"></i>

                </div>
        </tr>

        <tr class="infos">
        <td class="table-nome-empresa">Cysco Systen</td>
            <td class="table-email-empresa">Front - End</td>
            <td class="table-cnpj">Manhã</td>
            <td class="table-cep">R$ 2000,00</td>
            <td class="table-log">Saber programar JavaScript</td>

            <td class="icone-table">
            <div class="icons">
                    <i id="btn2" class="fa-solid fa-circle-check" style="color: #0c5fed;"></i>
                    <i class="fa-solid fa-xmark" style="color: #e00000;"></i>

                </div>
        </tr>
        <tr class="infos">
        <td class="table-nome-empresa">Cysco Systen</td>
            <td class="table-email-empresa">Front - End</td>
            <td class="table-cnpj">Manhã</td>
            <td class="table-cep">R$ 2000,00</td>
            <td class="table-log">Saber programar JavaScript</td>

            <td class="icone-table">
            <div class="icons">
                    <i id="btn3" class="fa-solid fa-circle-check" style="color: #0c5fed;"></i>
                    <i class="fa-solid fa-xmark" style="color: #e00000;"></i>

                </div>
        </tr>
    </tbody>
</table>

<dialog id="abrir-indicacao">

      <div class="align-card-indicacao">
          <h5 class="title-indicacao">Compartilhar Vaga</h5>
          <form class="" action="vagas.php">
              <label for="destinatario">Destinatario</label>
              <input type="email" name="email-professor" id="">
              <br>
              <label for="mensagem">Mensagem</label>
              <textarea name="texto-indicacao" id="" cols="30" rows="10"></textarea>

              <input type="submit" value="Enviar" class="botao-indicacao">
          </form>
      </div>

</dialog>
    </section>


    <div class="img-baixo">
        <img src="img/fundo 1.png" alt="">
    </div>


    <script src="https://kit.fontawesome.com/1c065add65.js" crossorigin="anonymous"></script>
    <script>
         var filtro = document.getElementById('abrir-filtro')
        function abrirFiltro(){
           if(filtro.style.display == "none"){
            filtro.style.display="block"
            filtro.style.transform="translateY(25px)"
            filtro.style.transitionDuration='5s'
        }
        else if(filtro.style.display="block"){
        filtro.style.display="none"
    }
    else{
        filtro.style.display="block"
    }
}
var button1 = document.getElementById("btn1")
            var button2 = document.getElementById("btn2")
            var button3 = document.getElementById("btn3")
            var indicar = document.getElementById('abrir-indicacao')
            var body = document.getElementsByTagName('body')
            button1.onclick = function (){
                indicar.showModal()
            }
            button2.onclick = function (){
                indicar.showModal()
            }
             button3.onclick = function (){
                indicar.showModal()
            }
    </script>
</body>