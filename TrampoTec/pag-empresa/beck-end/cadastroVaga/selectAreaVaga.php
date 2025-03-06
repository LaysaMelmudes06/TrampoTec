<?php
include('../../../dao/conexao.php');

$curso = $_GET['curso'];

$querySelect = "SELECT idArea, area FROM  tb_area WHERE fk_idCurso=:fk_idCurso ORDER BY area ASC";

$query = $conexao->prepare($querySelect);



$data = ['fk_idCurso' => $curso];
$query->execute($data);

$resultado = $query->fetchAll();

foreach($resultado as $resultado) { ?>
    <option <?=$resultado[0]?>><?=$resultado[1]?></option>

<?php } ?>

