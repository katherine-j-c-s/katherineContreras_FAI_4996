<?php
/**
 *La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero
*/
include "Pasajero.php";
class PasajeroVIP extends Pasajero{
    private $nroViajeFrecuente;
    private $cantMillas;
    
    public function __construct($nombre,$apellido,$numDoc,$telefono,$nroAsiento,$nroTicket,$nroViajeFrecuente,$cantMillas){
        parent::__construct($nombre,$apellido,$numDoc,$telefono,$nroAsiento,$nroTicket);
        $this -> nroViajeFrecuente = $nroViajeFrecuente;
        $this -> cantMillas = $cantMillas;
    }

    public function getNroViajeFrecuente(){
        return $this->nroViajeFrecuente;
    }
    public function getCantMillas(){
        return $this->cantMillas;
    }

    public function setNroViajeFrecuente($nuevoNroViajeFrecuente){
        $this->nroViajeFrecuente = $nuevoNroViajeFrecuente;
    }
    public function setCantMillas($nuevoCantMillas){
        $this->cantMillas = $nuevoCantMillas;
    }

    public function darPorcentajeIncremento(){
        //Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 
        //300 millas se realiza un incremento del 30%.
        $porcentaje= 35;
        if($this->getCantMillas() > 300){
            $porcentaje = 300; 
        }
        return $porcentaje;
    }
    public function __toString(){
        $cadena = parent::__toString();
        $cadena.="\nNumero Viaje Frecuente : " . $this->getNroViajeFrecuente()
        . "\nCantidad de millas pasajero : " . $this->getCantMillas();
        return $cadena;
        
    }
}