<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'não') {

    header('Location: cadastro.php?cadastro=inexistente');
}
