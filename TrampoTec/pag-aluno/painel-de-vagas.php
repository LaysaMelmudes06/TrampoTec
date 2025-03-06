<?php
include '../dao/conexao.php';

require_once "./back-end/login/validador_acesso.php";

$cliente_id = $_SESSION['idAluno'];

if (!($_GET) || $_GET['periodo'] == "qualquer" && $_GET['salario'] == "qualquer" && $_GET['area'] == "qualquer" && $_GET['curso'] == "qualquer") {
  $querySelect = "SELECT tb_empresa.nome AS nomeEmpresa, tb_empresa.email, tb_empresa.descricao AS descEmpresa , tb_empresa.departamento , tb_empresa.anoFundacao, tb_empresa.cnpj, tb_empresa.cep, tb_empresa.logradouro , tb_empresa.numero ,
    tb_empresa.estado , tb_empresa.bairro , tb_empresa.imagem , tb_telefone_empresa.numeroTelefone , tb_vaga.idVaga , tb_vaga.nome , tb_vaga.cidade , tb_vaga.bairro AS bairroVaga , tb_vaga.salario ,
    tb_vaga.descricao , tb_vaga.inicio , tb_vaga.termino , tb_vaga.periodo ,tb_vaga.preenchida, tb_vaga.area , tb_curso.nome AS cursoNome , tb_requisito.requisito, tb_vaga.preenchida
      FROM tb_vaga
      INNER JOIN tb_empresa ON tb_vaga.fk_idEmpresa = tb_empresa.idEmpresa
      INNER JOIN tb_telefone_empresa ON tb_telefone_empresa.fk_idEmpresa = tb_empresa.idEmpresa
      INNER JOIN tb_curso ON tb_curso.idCurso = tb_vaga.fk_idCurso
      INNER JOIN tb_requisito_vaga ON tb_requisito_vaga.fk_idVaga = tb_vaga.idVaga
      INNER JOIN tb_requisito ON tb_requisito.idRequisito = tb_requisito_vaga.fk_idRequisito
      WHERE tb_vaga.preenchida = 0";
} else {
  $periodo = trim($_GET['periodo']);
  $curso = trim($_GET['curso']);
  $area = trim($_GET['area']);
  $salario = trim($_GET['salario']);

  $querySelect = "SELECT tb_empresa.nome AS nomeEmpresa, tb_empresa.email,tb_empresa.descricao AS descEmpresa , tb_empresa.departamento , tb_empresa.anoFundacao, tb_empresa.cnpj, tb_empresa.cep, tb_empresa.logradouro , tb_empresa.numero ,
  tb_empresa.estado , tb_empresa.bairro , tb_empresa.imagem , tb_telefone_empresa.numeroTelefone , tb_vaga.idVaga , tb_vaga.nome , tb_vaga.cidade , tb_vaga.bairro AS bairroVaga , tb_vaga.salario ,
  tb_vaga.descricao , tb_vaga.inicio , tb_vaga.termino , tb_vaga.periodo ,tb_vaga.preenchida, tb_vaga.area ,tb_vaga.modalidade, tb_curso.nome AS cursoNome , tb_requisito.requisito
    FROM tb_vaga
    INNER JOIN tb_empresa ON tb_vaga.fk_idEmpresa = tb_empresa.idEmpresa
    INNER JOIN tb_telefone_empresa ON tb_telefone_empresa.fk_idEmpresa = tb_empresa.idEmpresa
    INNER JOIN tb_curso ON tb_curso.idCurso = tb_vaga.fk_idCurso
    INNER JOIN tb_requisito_vaga ON tb_requisito_vaga.fk_idVaga = tb_vaga.idVaga
    INNER JOIN tb_requisito ON tb_requisito.idRequisito = tb_requisito_vaga.fk_idRequisito WHERE tb_vaga.periodo = '$periodo' OR tb_curso.nome = '$curso'
    OR tb_vaga.area = '$area' OR  tb_vaga.salario BETWEEN 0 AND '$salario'
";
}

$result = $conexao->query($querySelect);
$vagas = array();
foreach ($result as $vaga) {
  $vagaId = $vaga['idVaga'];
  if (!isset($vagas[$vagaId])) {
    $vagas[$vagaId] = array(
      'nomeEmpresa' => $vaga['nomeEmpresa'],
      'email' => $vaga['email'],
      'departamento' => $vaga['departamento'],
      'anoFundacao' => $vaga['anoFundacao'],
      'cnpj' => $vaga['cnpj'],
      'cep' => $vaga['cep'],
      'logradouro' => $vaga['logradouro'],
      'numero' => $vaga['numero'],
      'estado' => $vaga['estado'],
      'bairro' => $vaga['bairro'],

      'imagem' => $vaga['imagem'],
      'numeroTelefone' => $vaga['numeroTelefone'],
      'idVaga' => $vaga['idVaga'],
      'nome' => $vaga['nome'],
      'cidade' => $vaga['cidade'],
      'bairroVaga' => $vaga['bairroVaga'],
      'salario' => $vaga['salario'],
      'descricao' => $vaga['descricao'],
      'descEmpresa' => $vaga['descEmpresa'],
      'requisito' => $vaga['requisito'],
      'area' => $vaga['area'],

      'periodo' => $vaga['periodo'],
      'termino' => $vaga['termino'],
      'inicio' => $vaga['inicio'],
      'cursoNome' => $vaga['cursoNome'],
      'preenchida' => $vaga['preenchida'],
    );
  }
}

$selectCurso = "SELECT nome FROM  tb_curso";
$query = $conexao->query($selectCurso);
$curso = $query->fetchAll();

$queryAreas = "SELECT DISTINCT tb_vaga.area FROM tb_vaga";
$resultAreas = $conexao->query($queryAreas);
$areas = $resultAreas->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../reset.css">
  <link rel="stylesheet" href="./css/painel-de-vagas.css">
  <title>Pagina de Vagas</title>
  <style>
    /* Estilos para o modal e overlay */
    #modal2 {
      display: none;
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
      background-color: #4caf50;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      margin-top: 50px;
      width: 90%;
      transition: 0.3s all ease-in-out;


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
      font-size: 1.1rem;
      font-weight: 500;
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

    #modal {
      display: none;
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
      background-color: #4caf50;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      margin-top: 50px;
      width: 90%;
      transition: 0.3s all ease-in-out;


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
      font-size: 1.1rem;
      font-weight: 500;
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

    #closeBtn {
      cursor: pointer;
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 18px;
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

    h2 {
      text-align: center;
      margin-bottom: 10px;
      font-size: 1.5rem;
      font-weight: 600;
      padding-top: 10px;
    }

    #texto-descs {
      word-break: break-word;
      line-height: 25px;
    }

    #texto-vaga {
      color: #fff;
    }

    .sobre-vaga {
      height: 100vh;
      max-height: 35vh;
      overflow-y: auto;
      padding-top: 20px;
    }


    .sobre-vaga::-webkit-scrollbar {
      width: 10px;
    }

    .sobre-vaga::-webkit-scrollbar-thumb {
      background-color: #fff;
      border-radius: 30px;
      border: 3px solid #0382ac;
    }

    @media (max-width: 900px) {
      h2 {
        font-size: 1.2rem;
      }

      #texto-descs {
        font-size: 1rem;
      }

      #card {
        width: 300px;
        height: 230px;
      }

      #job-title {
        font-size: 1.1em;
      }

      #descricao-vaga p {
        font-size: 1rem;
      }

      #titulo2 {
        font-size: 15px;
      }


    }
  </style>
</head>

<body>
  <?php
  include '../pag-aluno/components/header.php';

  ?>

  <img class="imagem-1" src="./img/12.png" alt="">
  <img class="imagem-2" src="./img/11.png" alt="">



  <main id="main">
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
        <p class="titulo1">Você ja se candidatou para esta vaga!!</p>
        <button class="btn" onclick="fecharModal()">OK</button>
      </div>
    </div>
    <!-- Modal cadastro feito-->
    <!-- <div id="modal">
      <p>Atenção!!</p>
      <span id="closeBtn" onclick="fecharModal()">&times;</span>
      <p>Você ja se candidatou para esta vaga</p>
      <button onclick="fecharModal()">OK</button>
    </div> -->

    <div id="overlay2"></div>
    <div id="modal2">
      <div class="align-img">
        <img src="img/check.png" alt="">
      </div>
      <div class="align-x">
        <span id="closeBtn" class="btn1" onclick="fecharModal2()">&times;</span>
      </div>
      <div class="align-itens">
        <h4 class="titulo">Candidatura realizada com Sucesso!!</h4>
        <button class="btn" onclick="fecharModal2()">OK</button>
      </div>
    </div>
    <!-- Modal cadastro feito-->
    <!-- <div id="modal2">
      <span id="closeBtn2" onclick="fecharModal2()">&times;</span>
      <p>Candidatura realizada com sucesso!!</p>
      <button onclick="fecharModal2()">OK</button>
    </div> -->
    <div id="overlay3"></div>
    <div id="modal3">
      <div class="align-img">
        <img src="img/atencao.png" alt="">
      </div>
      <div class="align-x">
        <span id="closeBtn" class="btn1" onclick="fecharModal3()">&times;</span>
      </div>
      <div class="align-itens">
        <h4 class="titulo">Atenção!</h4>
        <p class="titulo1">Sua candidatura esta com erro, tente novamente!!</p>
        <button class="btn" onclick="fecharModal3()">OK</button>
      </div>
    </div>
    <!-- Modal cadastro feito-->
    <!-- <div id="modal3">
      <h6>Ops temos um problema!!</h6>
      <span id="closeBtn3" onclick="fecharModal3()">&times;</span>
      <p>Sua candidatura esta com erro, tente novamente!!</p>
      <button onclick="fecharModal3()">OK</button>
    </div> -->
    <section class="filtro">
      <div class="container  mt-4" id="contain-filtro">
        <span class="filtro-icon">
          <i class="fa-solid fa-sliders" style="color: #0a3580;"></i>
          <h5>FILTRAR POR :</h5>
        </span>

        <div>
          <form id="barra" method="get">
            <div class="row">
              <div class="col-md-3">
                <select name="periodo" class="form-control">
                  <option value="qualquer">Período</option>
                  <option value="matinal">Manhã</option>
                  <option value="diurno">Tarde</option>
                  <option value="noturno">Noite</option>
                  <option value="integral">integral</option>
                </select>
              </div>
              <div class="col-md-3" id="left">
                <select name="salario" class="form-control">
                  <option value="qualquer">Salário</option>
                  <option value="2000">Menos de R$ 2.000</option>
                  <option value="4000">R$ 2.000 - R$ 4.000</option>
                  <option value="6000">Mais de R$ 4.000</option>
                </select>
              </div>
              <div class="col-md-3">
                <select name="area" class="form-control">
                  <option value="qualquer">Área</option>
                  <?php foreach ($areas as $areaOpcao) { ?>
                    <option value="<?= $areaOpcao['area'] ?>">
                      <?= $areaOpcao['area'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-md-3">
                <select name="curso" class="form-control">
                  <option value="qualquer">curso</option>
                  <?php foreach ($curso as $curso) { ?>
                    <option value=" <?= $curso[0] ?> ">
                      <?= $curso[0] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-1">
              <button type="submit" id="botao-filtro">Filtrar</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <div class="box">

      <?php if (count($vagas) == 0) { ?>
        <div class="box">
          <p>Não foram encontradas vagas com os critérios de filtragem selecionados.</p>
        </div>
      <?php } else { ?>

        <?php foreach ($vagas as $vaga) { ?>
          <div id="cards">
            <div class="card" id="card">
              <div class="card-content" id="conteudo-card">
                <div id="job-title">
                  <?= $vaga['cidade'] ?> -
                  <?= $vaga['bairroVaga'] ?>
                </div>
                <div class="job-description" id="descricao-vaga">
                  <p>
                    <?= $vaga['nome'] ?>
                  </p>
                  <p>
                    <?= $vaga['inicio'] ?> as
                    <?= $vaga['termino'] ?>
                    </< /p>
                  <p>R$
                    <?= $vaga['salario'] ?>
                  </p>
                  <button type=" button" class="btn btn-primary" id="botao-vaga-modal" data-toggle="modal"
                    data-target=".bd-example-modal-lg<?= $vaga['idVaga'] ?>">
                    Mais Informações
                  </button>
                </div>

              </div>
            </div>
          </div>
          <div class="modal fade bd-example-modal-lg<?= $vaga['idVaga'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content" id="modal-vaga">
                <div class="modal-header" id="modal-cabeaca-footer">
                  <h5 class=" modal-title" id="exampleModalLabel"></h5>
                  <button type="button" data-dismiss="modal" aria-label="Close" id="botao-fechar">
                    <span aria-hidden="true"> <i class="fa-solid fa-xmark" style="color: #ff0000;"></i></span>
                  </button>
                </div>
                <div class="modal-body">
                  <section id="info-empresa">
                    <div id="infos-vaga-modal">
                      <div id="div-img-modal">
                        <img class="img-modal" src="../pag-empresa/fotosEmpresa/perfil/<?= $vaga['imagem'] ?>">
                      </div>
                      <div id="sobre-empresa">
                        <span id="info-titulo">
                          <?= $vaga['nomeEmpresa'] ?>
                        </span>
                        <span id="info-nome">
                          <?= $vaga['departamento'] ?>
                        </span>
                        <span id="info-ano">
                          <?= $vaga['anoFundacao'] ?>
                        </span>
                      </div>
                    </div>
                    <div id="container-infos">
                      <div id="infos-vaga-requisito">
                        <span id="titulo2">CONHECIMENTOS </span>
                        <div id="requisitos-vaga">
                          <?php
                          $selectRequisito = "SELECT tb_requisito_vaga.* , tb_requisito.*
                      FROM  tb_requisito
                      INNER JOIN tb_requisito_vaga ON tb_requisito_vaga.fk_idRequisito = tb_requisito.idRequisito WHERE tb_requisito_vaga.fk_idVaga = $vaga[idVaga]
                      ";
                          $query1 = $conexao->query($selectRequisito);
                          $requisito1 = $query1->fetchAll();
                          foreach ($requisito1 as $requisito1) { ?>
                            <span>
                              .
                              <?= $requisito1[3] ?>
                            </span>
                          <?php } ?>

                        </div>
                      </div>
                      <div id="texto-vaga">
                        <h2>DESCRIÇÃO DA VAGA</h2>
                        <div class="sobre-vaga">
                          <p id="texto-descs">
                            <?= $vaga['descricao'] ?>
                          </p>
                        </div>
                      </div>

                    </div>
                  </section>
                </div>
                <div class="modal-footer" id="modal-footer">
                  <form action="./back-end/salvarCandidato/salvar-candidato.php" method="POST">
                    <input type="hidden" id="idVaga" name="idVaga" value="<?= $vaga['idVaga'] ?>">
                    <button name="bnt" id="botao-candidatar" type="submit" value="<?= $cliente_id ?>"
                      class="btn btn-primary" style="align-items: center;" onclick="openModal()">CANDIDATAR-SE</button>
                  </form>
                </div>
              </div>
            </div>
          </div>




        <?php } ?>


      <?php } ?>

    </div>







  </main>
  <img class="imagem-3" src="./img/10.png" alt="">
  <img class="imagem-4" src="./img/9.png" alt="">
  <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
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
    let candidaturaJaFeita = urlParams.get('candidaturaJaFeita');

    if (candidaturaJaFeita === 'true') {
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
    let candidaturaFeita = urlParamss.get('candidaturaFeita');

    if (candidaturaFeita === 'true') {
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
    let candidaturaErro = urlParamsss.get('candidaturaErro');

    if (candidaturaErro === 'true') {
      abrirModal3();
    }
  </script>

</body>

</html>