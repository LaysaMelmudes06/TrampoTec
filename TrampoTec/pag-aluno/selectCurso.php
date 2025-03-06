<?php
include ('../dao/conexao.php');

$etec = $_GET['nome-etec'];




$querySelect = "SELECT * FROM  tb_curso_etec WHERE fk_idEtec = $etec";

$query = $conexao->prepare($querySelect);
$query->execute();
$resultado = $query->fetchAll();

foreach ($resultado as $resultado){
    $idCurso =  $resultado[0];
    $querySelect = "SELECT * FROM  tb_curso WHERE idCurso = $idCurso";

    $query = $conexao->query($querySelect);

    $cursoNome = $query->fetchAll();
    $query->execute();
    foreach($cursoNome as $cursoNome) {
    ?>
    <option value="<?php echo $cursoNome[0]?>"><?php echo $cursoNome[1]?></option>

    <?php
    }
}



/* 
$curso = $query->fetchAll();

foreach($curso as $curso){?>



<?php
}
 */

?>