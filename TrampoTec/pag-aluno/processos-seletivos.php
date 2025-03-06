<?php
include '../dao/conexao.php';

require_once "./back-end/login/validador_acesso.php";

$cliente_id = $_SESSION['idAluno'];

$queryAreas = "SELECT DISTINCT tb_vaga.area FROM tb_vaga";
$resultAreas = $conexao->query($queryAreas);
$areas = $resultAreas->fetchAll(PDO::FETCH_ASSOC);



// $queryCursosAluno = "SELECT tb_curso.nome FROM tb_curso
//                     INNER JOIN tb_curso_etec ON tb_curso_etec.fk_idCurso = tb_curso.idCurso
//                     INNER JOIN tb_aluno_curso ON tb_aluno_curso.fk_idCurso = tb_curso_etec.fk_idCurso
//                     INNER JOIN tb_aluno ON tb_aluno.idAluno = tb_aluno_curso.fk_idAluno;
//                     WHERE tb_aluno_curso.fk_idAluno = $cliente_id";
// $resultCursosAluno = $conexao->query($queryCursosAluno);
// $cursosAluno = $resultCursosAluno->fetchAll(PDO::FETCH_ASSOC);

//       $queryCursos = "SELECT tb_curso.nome AS curso FROM tb_vaga
//                 INNER JOIN tb_curso ON tb_curso.idCurso = tb_vaga.fk_idCurso
//                 WHERE tb_curso.nome = $cliente_id";

if (!empty($_GET)) {
  $filtro = "WHERE tb_aluno.idAluno = '$cliente_id'";

  $periodo = isset($_GET['periodo']) ? trim($_GET['periodo']) : "qualquer";
  $salario = isset($_GET['salario']) ? trim($_GET['salario']) : "qualquer";
  $area = isset($_GET['area']) ? trim($_GET['area']) : "qualquer";
  $curso = isset($_GET['curso']) ? trim($_GET['curso']) : "qualquer";
  $status = isset($_GET['status']) ? trim($_GET['status']) : "qualquer";

  if ($status != "qualquer") {
    if ($status == "aceito") {
      $filtro .= " AND tb_vaga_aluno.aprovado = 1";
    } elseif ($status == "recusado") {
      $filtro .= " AND tb_vaga_aluno.aprovado = 2";
    } elseif ($status == "andamento") {
      $filtro .= " AND tb_vaga_aluno.aprovado = 0";

    } elseif ($status == "preenchida") {
      $filtro .= " AND tb_vaga.preenchida = 1";
    }
  }

  if ($periodo != "qualquer") {
    $filtro .= " AND tb_vaga.periodo = '$periodo'";
  }

  if ($salario != "qualquer") {

    if ($salario == "2000") {
      $filtro .= " AND tb_vaga.salario < 2000";
    } elseif ($salario == "4000") {
      $filtro .= " AND tb_vaga.salario BETWEEN 2000 AND 4000";
    } elseif ($salario == "6000") {
      $filtro .= " AND tb_vaga.salario > 4000";
    }
  }

  if ($area != "qualquer") {
    $filtro .= " AND tb_vaga.area = '$area'";
  }

  if ($curso != "qualquer") {
    $filtro .= " AND tb_curso.nome = '$curso'";
  }

  // if ($curso != "qualquer") {
  //   $filtro .= " AND tb_curso.nome = '$curso'";
  // }
  // $selectCurso = "SELECT DISTINCT tb_curso.nome FROM  tb_curso";
  // $resultCursosAluno = $conexao->query($selectCurso);
  // $cursos = $resultCursosAluno->fetchAll(PDO::FETCH_ASSOC);

  $querySelect = "SELECT tb_vaga.*, tb_vaga_aluno.*, tb_aluno.*, tb_curso.nome 
                FROM tb_vaga
                INNER JOIN tb_vaga_aluno ON tb_vaga_aluno.fk_idVaga = tb_vaga.idVaga
                INNER JOIN tb_aluno ON tb_aluno.idAluno = tb_vaga_aluno.fk_idAluno
                INNER JOIN tb_curso ON tb_curso.idCurso = tb_vaga.fk_idCurso
                $filtro";
} else {
  //   $selectCurso = "SELECT DISTINCT tb_curso.nome FROM  tb_curso";
// $resultCursosAluno = $conexao->query($selectCurso);
// $cursos = $resultCursosAluno->fetchAll(PDO::FETCH_ASSOC);

  $querySelect = "SELECT tb_vaga.*, tb_vaga_aluno.*, tb_aluno.*,  tb_curso.nome 
                  FROM tb_vaga
                  INNER JOIN tb_vaga_aluno ON tb_vaga_aluno.fk_idVaga = tb_vaga.idVaga
                  INNER JOIN tb_aluno ON tb_aluno.idAluno = tb_vaga_aluno.fk_idAluno
                  INNER JOIN tb_curso ON tb_curso.idCurso = tb_vaga.fk_idCurso
                  WHERE tb_aluno.idAluno = '$cliente_id'";
}



$query = $conexao->query($querySelect);
$resultado = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <!--link icone filtro-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../reset.css">
  <link rel="stylesheet" href="../pag-aluno/css/processo-seletivo.css">
  <title>Processos Seletivos</title>

</head>

<body>
  <?php
  include '../pag-aluno/components/header.php';
  ?>
  <main id="main">

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
              <div class="col-md-3">
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
                <select name="status" class="form-control">
                  <option value="qualquer">Status</option>
                  <option value="aceito">Aceito</option>
                  <option value="recusado">Recusado</option>
                  <option value="andamento">Em Andamento</option>
                  <option value="preenchida">Vagas Preenchidas</option>
                </select>
              </div>
              <!-- <div class="col-md-2">
                <select name="curso" class="form-control">
                  <option value="curso">Curso</option>
                  <?php foreach ($cursos as $cursos) { ?>
                    <option value=" <?= $cursos['curso'] ?> "> <?= $cursos['curso'] ?> </option>
                  <?php } ?>
                </select>
              </div> -->
            </div>

            <div class="col-md-1">
              <button type="submit" id="botao-filtro">Filtrar</button>
            </div>
          </form>
        </div>
      </div>
    </section>


    <div class="box">

      <?php if (count($resultado) == 0) { ?>
        <div class="box">
          <p>Não foram encontradas vagas com os critérios de filtragem selecionados.</p>
        </div>
      <?php } else { ?>

        <?php foreach ($resultado as $resultado) { ?>
          <div id="card">

            <h4 class="local">
              <?= $resultado[2] ?> -
              <?= $resultado[3] ?>
            </h4>
            <h4 class="vaga">
              <?= $resultado[1] ?>
            </h4>

            <?php
            $queryPreenchida = "SELECT tb_vaga_aluno.aprovado, tb_empresa.email, tb_vaga.idVaga, tb_vaga.preenchida FROM tb_vaga_aluno
            INNER JOIN tb_vaga ON tb_vaga.idVaga = tb_vaga_aluno.fk_idVaga
            INNER JOIN tb_empresa ON tb_empresa.idEmpresa = tb_vaga.fk_idEmpresa
            WHERE tb_vaga.idVaga = $resultado[0] AND tb_vaga.preenchida = 1";
            $preenchida = $conexao->query($queryPreenchida);
            $num3 = $preenchida->fetchALL();
            $qtn3 = count($num3);

            $querySelect = "SELECT tb_vaga_aluno.aprovado , tb_empresa.email , tb_vaga.idVaga, tb_vaga.preenchida
          FROM tb_vaga_aluno
          INNER JOIN tb_vaga ON tb_vaga.idVaga = tb_vaga_aluno.fk_idVaga
          INNER JOIN tb_empresa ON tb_empresa.idEmpresa = tb_vaga.fk_idEmpresa
          WHERE tb_vaga_aluno.fk_idAluno = $cliente_id AND tb_vaga_aluno.fk_idVaga = $resultado[0] AND tb_vaga_aluno.aprovado = 1";
            $resultado2 = $conexao->query($querySelect);
            $num = $resultado2->fetchALL();
            $qtn = count($num);

            $querySelect3 = "SELECT tb_vaga_aluno.aprovado , tb_empresa.email , tb_vaga.idVaga
          FROM tb_vaga_aluno
          INNER JOIN tb_vaga ON tb_vaga.idVaga = tb_vaga_aluno.fk_idVaga
          INNER JOIN tb_empresa ON tb_empresa.idEmpresa = tb_vaga.fk_idEmpresa
          WHERE tb_vaga_aluno.fk_idAluno = $cliente_id AND tb_vaga_aluno.fk_idVaga = $resultado[0] AND tb_vaga_aluno.aprovado = 2";
            $resultado3 = $conexao->query($querySelect3);
            $num2 = $resultado3->fetchALL();
            $qtn2 = count($num2);

            if ($qtn3 == 1) { ?>
              <h4>ESTÁ VAGA JÁ FOI PREENCHIDA</h4>
              <span class="botao-excluir">
                <a
                  href="./back-end/salvarCandidato/delete-processo.php?idAluno=<?= $cliente_id ?>&idVaga=<?= $resultado[0] ?>">
                  <i class="fa-solid fa-xmark"></i>
                </a>
              </span>
            <?php } elseif ($qtn >= 1) { ?>
              <span class="botao-excluir">
                <a
                  href="./back-end/salvarCandidato/delete-processo.php?idAluno=<?= $cliente_id ?>&idVaga=<?= $resultado[0] ?>">
                  <i class="fa-solid fa-xmark"></i>
                </a>
              </span>
              <h4 class="aceito">STATUS : ACEITO NO PROCESSO SELETIVO</h4>
              <!--       <?php foreach ($num as $num) { ?>
                <form class="chat" method="post" action="./chat.php">
                  <input type="hidden" name="emailEmpresa" value="<?= $num[1] ?>">
                  <button type="submit" value="<?= $cliente_id ?>" name="idCandidato">
                    <i class="fa-solid fa-envelope"></i>
                  </button>
                </form>
              <?php } ?> -->
            <?php } else if ($qtn2 >= 1) { ?>
                <h4 style="color: red;">STATUS : RECUSADO</h4>
            <?php } else { ?>
                <h4 class="nao-aceito">STATUS : EM ANDAMENTO</h4>
                <span class="botao-excluir">
                  <a
                    href="./back-end/salvarCandidato/delete-processo.php?idAluno=<?= $cliente_id ?>&idVaga=<?= $resultado[0] ?>">
                    <i class="fa-solid fa-xmark"></i>
                  </a>
                </span>

            <?php } ?>
          </div>
        <?php } ?>
      <?php } ?>






    </div>

  </main>
  <img class="imagem-4" src="./img/icon1-cortado.png" alt="">
  <img class="imagem-3" src="./img/icon3.png" alt="">

  <script src="https://kit.fontawesome.com/57efc2ce52.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>

</html>