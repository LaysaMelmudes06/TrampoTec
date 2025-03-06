<?php
session_name('admin_session');
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'NAO'){

    header ('Location: login.php?cadastro=inexistente');
}

?>