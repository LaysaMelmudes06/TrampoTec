<?php
session_name('empresa_session');
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'não'){

    header ('Location: pags-logins/login.php?cadastro=inexistente');
}
else if(!isset($_SESSION['aprovado']) || $_SESSION['aprovado'] == 'não'){
    header ('Location: pags-logins/login.php?login=naoaprovado');
}

?>