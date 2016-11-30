<?php

session_start();
unset($_SESSION[funcionario]);
session_destroy();
header('Location: loginFuncionario.php');
?>