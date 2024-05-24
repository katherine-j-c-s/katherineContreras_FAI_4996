<?php
/**
 * La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales 
 * como sillas de ruedas, asistencia para el embarque o desembarque, o comidas especiales para personas con alergias 
 * o restricciones alimentarias
*/
include "Pasajero.php";
class PasajeroNE extends Pasajero{
    private $sillaDeRuedas;
    private $asistencia;
    private $comidasEspeciales;
    
    public function __construct($nombre,$apellido,$numDoc,$telefono,$nroAsiento,$nroTicket,$sillaDeRuedas,$comidasEspeciales,$asistencia){
        parent::__construct($nombre,$apellido,$numDoc,$telefono,$nroAsiento,$nroTicket);
        $this -> sillaDeRuedas = $sillaDeRuedas;
        $this -> comidasEspeciales = $comidasEspeciales;
        $this -> asistencia = $asistencia;
    }

    public function getSillaDeRuedas(){
        return $this->sillaDeRuedas;
    }
    public function getComidasEspeciales(){
        return $this->comidasEspeciales;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }

    public function setSillaDeRuedas($nuevosillaDeRuedas){
        $this->sillaDeRuedas = $nuevosillaDeRuedas;
    }
    public function setcomidasEspeciales($nuevocomidasEspeciales){
        $this->comidasEspeciales = $nuevocomidasEspeciales;
    }
    public function setAsistencia($nuevoasistencia){
        $this->asistencia = $nuevoasistencia;
    }

    public function darPorcentajeIncremento(){
        //Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces 
        //el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios prestados entonces el incremento es del 15%.
        $porcentaje= 30;
        if($this->getSillaDeRuedas() == null || $this->getComidasEspeciales() == null || $this->getAsistencia() == null){
            $porcentaje = 15;
        }
        return $porcentaje;
    }

    public function __toString(){
        $sillaRuedas=$this->getSillaDeRuedas() ? "si tiene" : "no tiene";
        $cadena = parent::__toString();
        $cadena.="\nSilla de ruedas : " . $sillaRuedas
        . "\nComida especial tipo : " . $this->getComidasEspeciales()
        . "\nAsistenca para : " . $this->getAsistencia();
        return $cadena;
        
    }
}