

<?php 

include '../../../dao/conexao.php';
if ($_POST) {
    //passando todos os itens do post para as sua variaveis
    $nome = trim($_POST['nomeCuso']);
    $eixo = trim($_POST['eixo']);
    $cargaHoraria = trim($_POST['cargaHoraria']);
    $semestre = trim($_POST['semestre']);
    $modalidade = trim($_POST['modalidade']);
    $ensino = trim($_POST['ensino']);




    $sql =  " INSERT INTO tb_curso ( nome , cargaHoraria , semestre , modalidade , ensino) VALUES
    (   '$nome',
        '$cargaHoraria',
        '$semestre',
        '$modalidade',
        '$ensino'
    )
    ";
$query = $conexao->prepare($sql);
$query->execute();
$id = $conexao->lastInsertId();


$sql = " INSERT INTO tb_eixo ( eixo , fk_idCurso) VALUES
    (   '$eixo',
        '$id'
    )
    ";
$query = $conexao->prepare($sql);
$query->execute();

/* $contadorCampos = 1;
    while (isset($_POST["campo{$contadorCampos}"])) {
        $campo = $_POST["campo{$contadorCampos}"];

        $sql2 = "INSERT INTO tb_requisito ( requisito , fk_idCurso ) VALUES
        (   '$campo',
            '$id'
        )
        ";
    $query = $conexao->prepare($sql2);
    $query->execute();
    
    $contadorCampos++;
    
     }
    

     $contadorArea = 1;
    while (isset($_POST["area{$contadorArea}"])) {
        $area = $_POST["area{$contadorArea}"];

        $sql3 = "INSERT INTO tb_area ( area , fk_idCurso ) VALUES
        (   '$area',
            '$id'
        )
        ";
    $query = $conexao->prepare($sql3);
    $query->execute();
    
    $contadorArea++;
    
     } */
     header('Location: ../../cadastro-curso.php?cadastro=feito');
     exit;
}
else {
    header('Location: ../../cadastro-curso.php?cadastro=erro');
}
?>