<?php
require_once "./back-end/login/validador_acesso.php";
include '../dao/conexao.php';

$aluno_id = $_SESSION['idAluno'];

$querySelect = "SELECT * FROM  tb_idioma_aluno WHERE fk_idAluno = $aluno_id ";

$query = $conexao->query($querySelect);

$idioma = $query->fetchAll();

?>
<?php
require_once "./back-end/login/validador_acesso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <!--link icone filtro-->
  <link rel='stylesheet' href='../assets/css/bootstrap.min.css'>
  <link rel="stylesheet" href="../reset.css">


  <style>
    body {
      font-family: sans-serif;
    }

    .align-tudo {
      display: flex;
      align-items: center;
      justify-content: center;

    }

    form {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      border: none;
      border-radius: 20px;
      width: 450px;
      height: 590px;
      margin-top: 5%;
      gap: 10px;
      padding: 10px;
    }

    .align-button {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      flex-direction: column;
    }

    .button {
      padding: 11px;
      border-radius: 15px;
      border: 1px solid #0a3580;
      background-color: #0a3580;
      width: 200px;
      font-weight: 600;
      color: white;
      transition: 0.2s all ease-in-out;
      margin-left: auto;
      margin-right: auto;
      display: block;
      width: 100%;
      border-radius: 5px;
      text-decoration: none;
      text-align: center;
    }

    .button:hover {
      background-color: white;
      color: #0a3580;
      transition: 0.2s all ease-in-out;
    }

    .link {
      margin-top: 5%;
      width: 200px;
      background-color: red;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .link:hover {
      background-color: white;
      color: red;
      transition: 0.2s all ease-in-out;
    }

    input,
    select {
      height: 8%;
      width: 100%;
      padding: 10px;
      margin-top: 5%;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    select {
      width: 270px;
    }


    thead {
      color: rgb(70, 70, 70);
      font-weight: 600;
    }

    th {
      text-align: center;
      padding-top: 10px;
    }

    table {
      background-color: transparent;
      border-radius: 4px;
      height: 90%;
      width: 300%;
    }

    table td {

      text-align: center;
      color: rgb(94, 94, 94);
    }

    label {
      margin-top: 10px;
      font-weight: bold;
      font-size: medium;
    }
    .progress-bar{
      width: 50%;
      animation: 3s bar;
    }
    @keyframes bar{
      0%{
        width: 0;
      }
    }
  </style>
  <title>Meu Curriculo</title>


</head>

<body>

  <?php
  include '../pag-aluno/components/header.php';

  ?>

  <div class="progress">
    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" aria-valuemin="0"
      aria-valuemax="100"></div>
  </div>

  <div class="align-tudo">
    <form id="language-form" action="back-end/cadastro/salvarCurriculoIdioma.php" method="POST">


      <label for="idioma">Idioma:</label>
      <select name="idioma">
        <option value="idioma">Selecione um idioma </option>
        <option value="ingles">Inglês</option>
        <option value="espanhol">Espanhol</option>
        <option value="frances">Francês</option>
        <option value="nenhum">Nenhum</option>
        <option value="outro">Outro</option>

      </select>

      <label for="nivel">Nível de Proficiência:</label>
      <select name="nivel">
        <option value="nivel">Selecione um nível </option>
        <option value="iniciante">Iniciante</option>
        <option value="intermediario">Intermediário</option>
        <option value="avancado">Avançado</option>
        <option value="nenhum">Nenhum</option>
        <option value="outro">outro</option>
      </select>

      <div class="align-button">
        <button type="submit" class="link">Adicionar Novo Idioma</button>
        <a href="formulario3.php" class="button">Avançar<a>

      </div>

    </form>
    <section class="etec">
      <tbody class="infos" id="result">
        <table class="table">
          <thead>
            <tr>

              <th scope="col">IDIOMA</th>
              <th scope="col">NÍVEL</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($idioma as $idioma) { ?>
              <tr>


                <td>
                  <?= $idioma[1] ?>
                </td>
                <td>
                  <?= $idioma[2] ?>
                </td>
                <td class="icone-table"> <a href="back-end/crudIdioma/idioma-delete.php?id=<?= $idioma[0] ?>"><i
                      class="fa-solid fa-x" style="color: #000000;"></i></a>

                </td>

              </tr>
            <?php } ?>


          </tbody>
        </table>
      </tbody>
    </section>
  </div>




</body>

</html>
<script src="js/funcoes.js"></script>
<script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>