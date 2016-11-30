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

class Voto {

    public $centro;
    public $candidato;
    public $cant;
    public $agent;
    public $funcCentro;

    /**
     * 
     * @param int $p_centro
     * @param int $p_candidato
     * @param int $p_cant
     * @param string $p_agent
     * @param int $p_funcCentro
     */
    public function __construct($p_centro, $p_candidato, $p_cant, $p_agent, $p_funcCentro) {
        $this->centro = $p_centro;
        $this->candidato = $p_candidato;
        $this->cant = $p_cant;
        $this->agent = $p_agent;
        $this->funcCentro = $p_funcCentro;
    }

    function getCentro() {
        return $this->centro;
    }

    function getCandidato() {
        return $this->candidato;
    }

    function getCant() {
        return $this->cant;
    }

    function getAgent() {
        return $this->agent;
    }

    function getFuncCentro() {
        return $this->funcCentro;
    }

    function setCentro($centro) {
        $this->centro = $centro;
    }

    function setCandidato($candidato) {
        $this->candidato = $candidato;
    }

    function setCant($cant) {
        $this->cant = $cant;
    }

    function setAgent($agent) {
        $this->agent = $agent;
    }

    function setFuncCentro($funcCentro) {
        $this->funcCentro = $funcCentro;
    }

    /**
     * 
     * @param Voto[] $votos
     * @throws Exception
     */
    public static function salvarAll($votos) {
        //$mysqli = new mysqli("localhost", "root", "", "cne");
        $mysqli = new mysqli("encuestas.recapt.com.ec", "cne_prototipo", "cn3pr0t0t1p0.", "cne_prototipo");

        if ($mysqli->connect_errno) {
            throw new Exception("Fallo al conectar a MYSQL: " . $mysqli->connect_error);
            exit();
        }
            
        $query = "INSERT INTO voto(centro, candidato, cantvotos, agent, funcionario) VALUES('{$votos[0]->centro}', '{$votos[0]->candidato}','{$votos[0]->cant}', '{$votos[0]->agent}', '{$votos[0]->funcCentro}');";
        //$consulta = "INSERT INTO transaccion_tb(nombre, fecha, saldo, descr) VALUES('{$votos[0]->centro}', '$fechaString','$this->saldoTotal', '$this->descr')";
        for ($i = 1; $i < count($votos); $i++) {
            $query .= "INSERT INTO voto(centro, candidato, cantvotos, agent, funcionario) VALUES('{$votos[$i]->centro}', '{$votos[$i]->candidato}','{$votos[$i]->cant}', '{$votos[$i]->agent}', '{$votos[$i]->funcCentro}');";
        }

        #ejecuto consulta
        //$resultado = $mysqli->query($query);    

        $resultado = $mysqli->multi_query($query);
       
        
        if (!($resultado)) {
            throw new Exception("Fallo al ejecutar la inserción de los votos");
        }

        #cierro conexion
        $mysqli->close();
    }

}
