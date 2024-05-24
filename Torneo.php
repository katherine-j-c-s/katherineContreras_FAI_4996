<?php
//Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del premio.
// Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.

class Partido{
    private $colPartidas;
    private $importePremio;

    //CONSTRUCTOR
    public function __construct($importePremio){
        $this->colPartidas = [];
        $this->importePremio = $importePremio;
    }

    //GETTERS

    public function getColPartidas(){
        return $this->colPartidas;
    }
    public function getimportePremio(){
        return $this->importePremio;
    }
    //SETTERS
    public function setColPartidas($colPartidas){
        $this->colPartidas= $colPartidas;
    }
    public function setImportePremio($importePremio){
        $this->importePremio= $importePremio;
    }
    
public function __toString(){
        //string $cadena
        $cadena = "Importe Premio: ".$this->getimportePremio()."\n"
        . "Coleccion Partidas: \n";
        $colPartidas=$this->getColPartidas();
        foreach($colPartidas as $partida){
            $cadena.=$partida;
        }
        return $cadena;
    }
}


?>