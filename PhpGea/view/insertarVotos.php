<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../reso/css/proyect.css" rel="stylesheet" type="text/css">
        <link href="../reso/css/bootstrap.min.css" rel="stylesheet" type="text/css"> 
        <script src="../reso/js/proyect.js"></script>

    </head>
    <body ng-app="" onload="readyBody()">
        <div id='subView'>           
            <?php
            session_start();
            if (empty($_SESSION['funcionario'])) {                
                header('Location: loginFuncionario.php');
            } else {
                 include '../model/Funcionario.php';
                $funcionario = $_SESSION['funcionario'];                
                
                if (isset($_REQUEST['nameButtonInsertar'])) {
                    $dat = $_REQUEST['datos'];                    

                    //Define filter Data validation
                    $filters = [];
                    for ($i = 0; $i < 12; $i++) {
                        $m = $i + 1;
                        $clave = 'candidato_' . $m;
                        $filters[$clave] = ['filter' => FILTER_VALIDATE_INT, 'options' => ['min_range' => 0]];
                    }

                    //Apply filter data validation
                    $dat = filter_var_array($dat, $filters);
                    $error = false;
                    foreach ($dat as $key => $value) {

                        if ($value === false) {
                            $e = new Exception("Datos Invalidos. El valor " . $key . " presenta un valor incorrecto");
                            include 'msgError.php';
                            $error = true;
                        }
                    }

                    if (!$error) {
                        include '../model/Voto.php';

                        $votos = [];
                        foreach ($dat as $key => $value) {
                            $idCandidato = explode('_', $key)[1];
                            $votoI = new Voto($funcionario['centroId'], $idCandidato, $value,/* agent login*/ 1, $funcionario['id']);
                            $votos[] = $votoI;
                        }

                        try {
                            Voto::salvarAll($votos);

                            //cerrar session
                            session_start();
                            unset($_SESSION[funcionario]);
                            session_destroy();
                            
                            //message satisfactorio                            
                            session_start();
                             $_SESSION['flashMessageInfo'] = true;
                            
                            header('Location: loginFuncionario.php');
                        } catch (Exception $e) {
                            include 'msgError.php';
                        }
                    }
                }


                require('insertarVotosView.php');
            }		
			?>

        </div>
    </body>
</html>
