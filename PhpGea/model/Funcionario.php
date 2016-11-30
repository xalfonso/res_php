<?php

/*
 * Property of RECAPT http://recapt.com.ec/
 * Chief Developer Ing. Eduardo Alfonso Sanchez eddie.alfonso@gmail.com
 */

/**
 * Description of Voto
 *
 * @author Eduardo
 */
include_once 'Incidencia.php';

class Funcionario {

    public $id;
    public $login;
    public $password;
    public $centro;
    public $centroName;
    public $name;

    public function __construct($p_login, $p_password) {
        $this->login = $p_login;
        $this->password = $p_password;
        $this->id = 0;
        $this->centro = 0;
        $this->name = "";
        $this->centroName = "";
    }

    /**
     * @return Funcionario
     * @throws Exception
     */
    public function autenticate() {

        $mysqli = new mysqli("encuestas.recapt.com.ec", "cne_prototipo", "cn3pr0t0t1p0.", "cne_prototipo");
        $mysqli->set_charset('utf8');

        #verifico que ho haya ocurrido un error en la conexion
        #esto normalmente muestra un errot de php sino funciona, la directiva
        if ($mysqli->connect_errno) {
            throw new Exception("Fallo al conectar a MYSQL: " . $mysqli->connect_error);
            exit();
        }
        #construyo mi consulta
        $consulta = "SELECT funcionario.funcionario_id, funcionario.funcionario_login, centro.name_centro, centro.id_centro, (SELECT COUNT(voto.voto_id) FROM voto WHERE voto.centro = centro.id_centro) AS 'datos' FROM funcionario INNER JOIN centro ON funcionario.centro = centro.id_centro WHERE funcionario.funcionario_login = '{$this->login}' AND funcionario.funcionario_password = '{$this->password}'";

        #ejecuto consulta
        $resultado = $mysqli->query($consulta);

        if ($row = $resultado->fetch_assoc()) {
            $this->centro = $row['id_centro'];
            $this->centroName = $row['name_centro'];
            $this->name = $row['funcionario_login'];
            $this->id = $row['funcionario_id'];
            if ($row['datos'] > 0) {
                $incidencia = new Incidencia("AgentTest", $this->login, "Se ha intentado autenticar un funcionario de un centro completado");
                $incidencia->salvar();
                throw new Exception("El centro al que pertenece este funcionario ya ha completado su información");
            }
        } else {
            $incidencia = new Incidencia("AgentTest", $this->login, "Autenticación Fallida");
            $incidencia->salvar();
            throw new Exception("Datos de autenticación incorrectos");
        }

        #liberar resultado
        $resultado->free();

        #cierro conexion
        $mysqli->close();

        return $this;
    }

}
