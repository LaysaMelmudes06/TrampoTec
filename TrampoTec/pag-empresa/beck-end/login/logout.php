<?php
session_name('empresa_session');
session_start();

session_destroy();

header('Location: ../../pags-logins/login.php');
