<?php

/*
 * Property of RECAPT http://recapt.com.ec/
 * Chief Developer Ing. Eduardo Alfonso Sanchez eddie.alfonso@gmail.com
 */

/**
 * Description of Incidencia
 *
 * @author Eduardo
 */

class Incidencia {
    public $agent;
    public $funcionario;
    public $message;
    
    function __construct($agent, $funcionario, $message) {
        $this->agent = $agent;
        $this->funcionario = $funcionario;
        $this->message = $message;
    }
    
    
    public function salvar() {        
        $mysqli = new mysqli("encuestas.recapt.com.ec", "cne_prototipo", "cn3pr0t0t1p0.", "cne_prototipo");
        $mysqli->set_charset('utf8');
        if ($mysqli->connect_errno) {
            throw new Exception("Fallo al conectar a MYSQL: " . $mysqli->connect_error);
            exit();
        }
            
        $query = "INSERT INTO incidencia(agent_incidencia, funcionario_incidencia, message_incidencia) VALUES('{$this->agent}', '{$this->funcionario}','{$this->message}');";
       

        #ejecuto consulta
        $resultado = $mysqli->query($query);    

        if (!($resultado)) {
            throw new Exception("Fallo al ejecutar la inserción de la incidencia. ¡Por favor avise a su supervisor!");
        }

        #cierro conexion
        $mysqli->close();
    }

}
