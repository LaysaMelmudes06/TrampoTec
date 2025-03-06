<?php

include '../dao/conexao.php';

require_once "./back-end/login/validador_acesso.php";

$cliente_id = $_SESSION['idAluno'];


//$querySelect = "SELECT tb_aluno., tb_aluno_curso., tb_aluno_etec.,tb_etec.,tb_curso.,tb_conhecimento.,tb_conhecimento_aluno.,tb_habilidade.
//,tb_habilidade_aluno.,tb_idioma_aluno.,tb_telefone_aluno.,tb_perfil_aluno.
//FROM tb_aluno
//INNER JOIN tb_aluno_curso ON tb_aluno_curso.fk_idAluno = tb_aluno.idAluno
//INNER JOIN tb_curso ON tb_curso.idCurso = tb_aluno_curso.fk_idCurso
//INNER JOIN tb_aluno_etec ON tb_aluno_etec.fk_idAluno = tb_aluno.idAluno
//INNER JOIN tb_etec ON tb_etec.idEtec = tb_aluno_etec.fk_idEtec
//INNER JOIN tb_perfil_aluno ON tb_perfil_aluno.fk_idAluno = tb_aluno.idAluno

//INNER JOIN tb_conhecimento_aluno ON tb_conhecimento_aluno.fk_idAluno = tb_aluno.idAluno
//INNER JOIN tb_conhecimento ON tb_conhecimento.idConhecimento = tb_conhecimento_aluno.fk_idConhecimento 

//INNER JOIN tb_habilidade_aluno ON tb_habilidade_aluno.fk_idAluno = tb_aluno.idAluno 
//INNER JOIN tb_habilidade ON tb_habilidade.idHabilidade= tb_habilidade_aluno.fk_idHabilidade

//INNER JOIN tb_idioma_aluno ON tb_idioma_aluno.fk_idAluno = tb_aluno.idAluno


//WHERE tb_aluno.idAluno = $cliente_id
//GROUP BY tb_aluno.idAluno";
//$query = $conexao->query($querySelect);
//$aluno = $query->fetchAll();


$querySelect5 = "SELECT tb_aluno_curso_etec.* , tb_aluno.idAluno , tb_curso.* , tb_etec.nome
FROM tb_aluno
INNER JOIN tb_aluno_curso_etec ON tb_aluno_curso_etec.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_curso ON tb_curso.idCurso = tb_aluno_curso_etec.fk_idCurso
INNER JOIN tb_etec ON tb_etec.idEtec = tb_aluno_curso_etec.fk_idEtec
WHERE tb_aluno.idAluno = $cliente_id 
";
$query5 = $conexao->query($querySelect5);
$aluno5 = $query5->fetchAll();

$querySelect2 = "SELECT tb_conhecimento.*,tb_conhecimento_aluno.* , tb_aluno.*
FROM tb_aluno
INNER JOIN tb_conhecimento_aluno ON tb_conhecimento_aluno.fk_idAluno = tb_aluno.idAluno
INNER JOIN tb_conhecimento ON tb_conhecimento.idConhecimento = tb_conhecimento_aluno.fk_idConhecimento 
WHERE tb_conhecimento_aluno.fk_idAluno = $cliente_id
";
$query2 = $conexao->query($querySelect2);
$aluno2 = $query2->fetchAll();


$querySelect3 = "SELECT tb_aluno.*,tb_habilidade.*,tb_habilidade_aluno.*
FROM tb_aluno
INNER JOIN tb_habilidade_aluno ON tb_habilidade_aluno.fk_idAluno = tb_aluno.idAluno 
INNER JOIN tb_habilidade ON tb_habilidade.idHabilidade= tb_habilidade_aluno.fk_idHabilidade
WHERE tb_habilidade_aluno.fk_idAluno = $cliente_id

";
$query3 = $conexao->query($querySelect3);
$aluno3 = $query3->fetchAll();



$querySelect4 = "SELECT tb_aluno.*,tb_idioma_aluno.*
FROM tb_aluno
INNER JOIN tb_idioma_aluno ON tb_idioma_aluno.fk_idAluno = tb_aluno.idAluno
WHERE tb_aluno.idAluno = $cliente_id
";
$query4 = $conexao->query($querySelect4);
$aluno4 = $query4->fetchAll();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Meu Currículo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .resume .resume-title {
      font-size: 26px;
      font-weight: 400;
      margin-top: 20px;
      margin-bottom: 20px;
      color: #222222;

    }

    .resume .resume-item {
      padding: 0 0 20px 20px;
      margin-top: -2px;
      border-left: 5px solid blue;
      position: relative;
    }

    .resume .resume-item h4 {
      line-height: 18px;
      font-size: 18px;
      font-weight: 600;
      color: #1d685f;
      margin-bottom: 10px;
    }

    .resume .resume-item em {
      font-size: 16px;
      margin-left: 4%;
    }

    .botoes {
      display: flex;
      justify-content: center;
      gap: 50PX;
      align-items: center;
      width: 100%;
      margin-top: 3%;
    }

    .resume .resume-item ul {
      padding-left: 20px;
    }

    .resume .resume-item ul li {
      padding-bottom: 10px;
    }

    .resume .resume-item:last-child {
      padding-bottom: 0;
    }

    .resume .resume-item::before {
      content: "";
      position: absolute;
      width: 20px;
      height: 20px;
      border-radius: 50px;
      left: -12px;
      top: 0;
      background: #fff;
      border: 2px solid blue;
    }

    button {
      text-transform: uppercase;
      font-weight: 600;
      font-size: 12px;
      width: 160px;
      height: 40px;
      border-radius: 50px;
      transition: 0.5s;
      color: #fff;
      background: red;
      border: none;
    }

    button:hover {
      background-color: white;
      color: black;
      border: 1px solid red;
    }

    .container {
      padding: 50px;
    }

    @keyframes anim1 {
      0% {
        opacity: 0%;
        transform: translateY(-5%);
      }
      25%{
        opacity: 25%;
      }
      50% {
        opacity: 50%;
      }

      100% {
        opacity: 100%;
      }
    }

    @keyframes anim2 {
      0% {
        opacity: 0%;
        transform: translateY(-5%);
      }
      25%{
        opacity: 0%;
      }
      50%{
        opacity: 0%;
      }
      80%{
        opacity: 10%;
      }
      90% {
        opacity: 50%;
      }

      100% {
        opacity: 100%;
      }
    }

    .primeiro{
      animation: 1000ms linear anim1 ;
    }
    .segundo{
      animation: 1000ms linear anim2 ;
    }
    .titulo{
      animation: 1000ms linear anim1 ;
      margin-top: 3%;
    }
  </style>

</head>

<body>
  <?php
  include '../pag-aluno/components/header.php';
  ?>
  <main id="main">

    <section id="resume" class="resume">
      <div class="container" data-aos="fade-up">


        <div class="section-title">
          <h2 class="titulo" >Meu currículo</h2>
        </div>


        <div class="row">
          <div class="col-lg-6 primeiro" style="text-align:justify;">
            <h3 class="resume-title">Acadêmico</h3>


            <div class="resume-item">

              <h4>Conhecimentos escolares</h4>

              <li>Instituição:
                <?php foreach ($aluno5 as $aluno5) { ?>
                  <p><em>
                      <?= $aluno5[11] ?>
                    </em></p>

                </li>


                <li>Curso:
                  <p><em>
                      <?= $aluno5[6] ?> -
                      <?= $aluno5[7] ?> Horas
                    </em></p>

                </li>

                </li>
                <li>Conclusão:
                  <p><em>
                      <?= $aluno5[3] ?>
                    </em></p>
                <?php } ?>
              </li>

            </div>

            <h3 class="resume-title">Adicional</h3>
            <div class="resume-item">
              <h4>Informações adicionais</h4>

              <li>Conhecimentos:
                <?php foreach ($aluno2 as $aluno2) { ?>
                  <p><em>
                      <?= $aluno2[1] ?>
                    </em></p>
                <?php } ?>
              </li>

              <li>Habilidades:
                <?php foreach ($aluno3 as $aluno3) { ?>
                  <p><em>
                      <?= $aluno3[16] ?>
                    </em> </p>
                <?php } ?>
              </li>

            </div>
          </div>
          <div class="col-lg-6 segundo" style="text-align:justify;">
            <h3 class="resume-title">Idiomas</h3>
            <div class="resume-item">
              <h4>Idiomas e nível de proficiência</h4>

              <li>idiomas:
                <?php foreach ($aluno4 as $aluno4) { ?>
                  <p><em>
                      <?= $aluno4[16] ?> -
                      <?= $aluno4[17] ?>
                    </em></p>
                <?php } ?>
              </li>
            </div>
          </div>
        </div>
        <div class="botoes">
          <a href="curriculo.php">
            <button id="editButton">Editar currículo</button>
          </a>
        </div>

      </div>
    </section>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</body>

</html>