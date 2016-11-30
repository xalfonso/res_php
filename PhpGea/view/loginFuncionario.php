<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../reso/css/proyect.css" rel="stylesheet" type="text/css">
        <link href="../reso/css/bootstrap.min.css" rel="stylesheet" type="text/css">        

    </head>
    <body ng-app="">
        <div id='subView'>           
            <?php
            session_start();
            if (isset($_SESSION['flashMessageInfo']) && $_SESSION['flashMessageInfo'] == true) {
                unset($_SESSION['flashMessageInfo']);
                session_destroy();
                include 'msgInfo.php';
            }

            if (isset($_REQUEST['nameButtonLoginFuncionario'])) {
                $login = $_REQUEST['funcionarioLogin'];
                $pass = $_REQUEST['funcionarioPassword'];

                include '../model/Funcionario.php';

                $funcionario = new Funcionario($login, $pass);
                try {
                    $func = $funcionario->autenticate();
                    session_start();
                    $funcArray = [];
                    $funcArray['id'] = $func->id;
                    $funcArray['name'] = $func->name;
                    $funcArray['centroId'] = $func->centro;
                    $funcArray['centroName'] = $func->centroName;
                    $_SESSION['funcionario'] = $funcArray;
                    header('Location: insertarVotos.php');
                } catch (Exception $e) {
                    include 'msgError.php';
                }
            }

            require('loginFuncionarioView.php');
            ?>


        </div>
    </body>
</html>
