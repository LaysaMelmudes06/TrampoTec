<?php
// Classe para poder concetar com o banco de dados

$servidor="localhost";
$banco="bdtrampotec";
$usuario="root";
$senha="";
    
try{

$conexao = new PDO("mysql:host=$servidor;
dbname=$banco",
$usuario,
$senha);

return $conexao;

 }catch(PDOException $e){

 echo '<p>' . $e->getMessage(). '</p>';

 }
 $query = "SELECT idCurso, nome FROM tb_curso";

 $result = $connection->query($query);
 
 $data = array();
 
 if ($result->num_rows > 0) {
     while ($row = $result->fetch_assoc()) {
         $data[] = $row;
     }
 }

?>