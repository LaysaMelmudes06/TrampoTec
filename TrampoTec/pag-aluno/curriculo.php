<?php
require_once "./back-end/login/validador_acesso.php";
include '../dao/conexao.php';
$querySelect = "SELECT * FROM  tb_etec ";

$query = $conexao->query($querySelect);

$etec = $query->fetchAll();

$cliente_id = $_SESSION['idAluno'];




?>
<?php
require_once "./back-end/login/validador_acesso.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel='stylesheet' href='../assets/css/bootstrap.min.css'>
  <link rel="stylesheet" href="../reset.css">

  <style>
    body {
      font-family: sans-serif;
    }

    form {
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      padding: 20px;
      height: auto;
      border-radius: 10px;
      margin-top: 6%;
      animation: 1000ms linear anim-left;
    }

    h4 {
      text-align: center;
      font-size: 1.2rem;
      font-weight: 600;
    }

    label {
      display: block;
      margin-top: 10px;
      font-weight: bold;
      font-size: medium;
    }

    input,
    select {
      height: 6%;
      width: 100%;
      padding: 10px;
      margin-top: 5%;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="submit"] {
      margin-top: 5%;
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .align-tudo {
      display: flex;
      align-items: start;
      justify-content: space-around;
      gap: 10px;
      flex-wrap: wrap;
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

    /* Estilos para o modal e overlay */
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

    .align-cards {
      display: flex;
      align-items: center;
      justify-content: start;
      flex-direction: column;
      height: 600px;
      overflow-y: auto;
      margin-top: 5%;
      padding-right: 20px;
      animation: 1000ms linear anim-right;
    }

    #btn-curso {
      display: none;
      justify-content: center;
    }

    .link-btn {
      text-align: center;
      color: white;
      padding: 12px;
      margin-top: 10px;
      font-family: 'Poppins', sans-serif;
      text-decoration: none;
      font-size: 1.2rem;
      border-radius: 10px;
      background-color: #0a3580;
      transition: 100ms linear;
    }

    .link-btn:hover {
      background-color: #124192;
      color: white;
      scale: 1.01;
    }

    @media (max-width: 786px) {
      #btn-curso {
        display: flex;
        animation: 1000ms linear anim-card;
      }

      .align-cards {
        height: 400px;
      }

      .align-tudo {
        padding: 15px;
      }

      form {
        animation: 1000ms linear anim-card2;
      }

      .align-cards {
        animation: 1000ms linear anim-card2;
      }

      @keyframes anim-card {
        0% {
          opacity: 0%;
          transform: translateY(-10%);
        }

        50% {
          opacity: 50%;
        }

        100% {
          opacity: 100%;
        }
      }

      @keyframes anim-card2 {
        0% {
          opacity: 0%;
          transform: translateY(-2%);
        }

        50% {
          opacity: 50%;
        }

        100% {
          opacity: 100%;
        }
      }

    }



    @keyframes anim-left {
      0% {
        opacity: 0%;
        transform: translateX(-20%);
      }

      50% {
        opacity: 50%;
        transform: translateX(0%);
      }

      100% {
        opacity: 100%;
      }
    }


    @keyframes anim-right {
      0% {
        opacity: 0%;
        transform: translateX(20%);
      }

      50% {
        opacity: 50%;
        transform: translateX(0%);
      }

      100% {
        opacity: 100%;
      }
    }

    .progress-bar {
      width: 25%;
      animation: 3s bar;
    }

    @keyframes bar {
      0% {
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
  <div id="overlay"></div>

  <!-- Modal -->
  <div id="modal">
    <div class="align-img">
      <img src="img/atencao.png" alt="">
    </div>
    <div class="align-x">
      <span id="closeBtn" class="btn1" onclick="fecharModal()">&times;</span>
    </div>
    <div class="align-itens">
      <h4 class="titulo">Atenção!</h4>

      <p class="titulo1">Crie o seu curriculo para finalizar o seu cadastro!!</p>
      <button class="btn" onclick="fecharModal()">OK</button>
    </div>
  </div>
  <div class="progress">
    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
    </div>
  </div>
  <div class="align-tudo">

    <div class="align-tabela">
      <div id="btn-curso">
        <a class="link-btn" href="#align-cards">Ver cursos cadastrados</a>
      </div>
      <form action="./back-end/cadastro/salvarCurriculo.php" method="POST">
        <label for="nome">Instituição:</label>
        <select class="input" placeholder="etec" id="nome-etec" name="nome-etec" placeholder="Nome da Instituição">
          <option>Selecione uma Instituição</option>
          <?php foreach ($etec as $etec) { ?>
            <option value="<?= $etec[0] ?>">
              <?= $etec[1] ?>
            </option>
          <?php } ?>
        </select>

        <label for="curso">Curso:</label>
        <select class="input" placeholder="curso" name="curso" id="curso">
          <option value="">Selecione seu curso</option>
        </select>

        <label for="periodo">Período:</label>
        <select class="input" placeholder="periodo" name="periodo">
          <option value="">Selecione um período</option>
          <option value="">Vespertino</option>
          <option value="">Noturno</option>
          <option value="">Matutino</option>
          <option value="">Integral</option>
        </select>
        <select class="input" placeholder="semestre" name="semestre">
          <option value="1">Selecione um semestre</option>
          <option value="1">1 SEMESTRE</option>
          <option value="2">2 SEMESTRE</option>
          <option value="3">3 SEMESTRE</option>
          <option value="4">4 SEMESTRE</option>
          <option value="5">5 SEMESTRE</option>
          <option value="6">6 SEMESTRE</option>
        </select>


        <label for="conclusao">Conclusão:</label>
        <input class="input" placeholder="conclusao" name="conclusao" type="date"></p>

        <input type="submit" value="Adicionar Curso">

        <a href="formulario2.php" class="button">Próximo</a>

      </form>

    </div>
    <div id="align-cards" class="align-cards">
      <?php
      $querySelect5 = "SELECT tb_aluno_curso_etec.* , tb_aluno.idAluno , tb_curso.* , tb_etec.nome , tb_etec.idEtec
       FROM tb_aluno
       INNER JOIN tb_aluno_curso_etec ON tb_aluno_curso_etec.fk_idAluno = tb_aluno.idAluno
       INNER JOIN tb_curso ON tb_curso.idCurso = tb_aluno_curso_etec.fk_idCurso
       INNER JOIN tb_etec ON tb_etec.idEtec = tb_aluno_curso_etec.fk_idEtec
       WHERE tb_aluno.idAluno = $cliente_id 
       ";
      $query5 = $conexao->query($querySelect5);
      $aluno5 = $query5->fetchAll();
      foreach ($aluno5 as $aluno5) {
        ?>

        <div id="card">
          <a class="dropdown-item"
            onclick="modalRemover(<?= $aluno5[5] ?>, 'id_curso' , <?= $cliente_id ?> , 'id_usuario' , <?= $aluno5[12] ?> , 'id_etec')"><i
              class="fas fa-trash-alt fa-lg text-danger"></i></a>
          <h2>Informações do Curso</h2>
          <div>
            <h3>Instituição:</h3>
            <p>
              <?= $aluno5[11] ?>
            </p>
          </div>

          <div>

            <h3>Curso:</h3>

            <p>
              <?= $aluno5[6] ?>
            </p>



          </div>
          <div>
            <h3>Carga Horária:</h3>
            <p>
              <?= $aluno5[7] ?> HORAS
            </p>
          </div>

          <div>
            <h3>Semestres Totais:</h3>
            <p>
              <?= $aluno5[8] ?>
            </p>
          </div>

          <div>
            <h3>Conclusão:</h3>
            <p>
              <?= $aluno5[3] ?>
            </p>
          </div>

        </div>

      <?php } ?>
    </div>


    <div class="modal fade" id="modalExcluir" role="dialog">
      <div class=" modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Excluir Usuário</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body  ">
            <form action="back-end/crudCurriculo/curriculo-delete.php" method="post">
              <input class="form-control" id="id_usuario" name="id_usuario" type="hidden">
              <input class="form-control" id="id_curso" name="id_curso" type="hidden">
              <input class="form-control" id="id_etec" name="id_etec" type="hidden">
              <p>Tem certeza que deseja excluir o item selcionado?
              <div class=" text-end">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Não</button>
                <button type="submit" class="btn btn-warning ms-3">Sim </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



  </div>
</body>


</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="js/funcoes.js"></script>
<script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
</script>
<script src='js/modal-deletar.js'></script>
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
  let curri = urlParams.get('curri');

  if (curri === 'true') {
    abrirModal();
  }
</script>