<?php
class Partido {
    private $idpartido;
    private $fecha;
    private $objEquipo1;
    private $cantGolesE1;
    private $objEquipo2;
    private $cantGolesE2;
    private $coefBase;

    //CONSTRUCTOR
    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2){
            $this->idpartido = $idpartido;
            $this->fecha = $fecha;
            $this->objEquipo1 =$objEquipo1;
            $this->cantGolesE1 = $cantGolesE1;
            $this->objEquipo2 = $objEquipo2;
            $this->cantGolesE2 = $cantGolesE2;
            $this->coefBase = 0.5;


    }

    //OBSERVADORES
    public function setidpartido($idpartido){
         $this->idpartido= $idpartido;
    }

    public function getIdpartido(){
        return $this->idpartido;
    }

    public function setFecha($fecha){
        $this->fecha= $fecha;
    }

    public function getFecha(){
        return $this->fecha;
    }


    public function setCantGolesE1($cantGolesE1){
        $this->cantGolesE1= $cantGolesE1;
    }

    public function getCantGolesE1(){
        return $this->cantGolesE1;
    }
    public function setCantGolesE2($cantGolesE2){
        $this->cantGolesE2= $cantGolesE2;
    }

    public function getCantGolesE2(){
        return $this->cantGolesE2;
    }



    public function setObjEquipo1($objEquipo1){
        $this->objEquipo1= $objEquipo1;
    }
    public function getObjEquipo1(){
        return $this->objEquipo1;
    }


    public function setObjEquipo2($objEquipo2){
        $this->objEquipo2= $objEquipo2;
    }
    public function getObjEquipo2(){
        return $this->objEquipo2;
    }

    public function setCoefBase($coefBase){
         $this->coefBase = $coefBase;
    }
    public function getCoefBase(){
        return $this->coefBase;
    }

    // En cada partido se gestiona un coeficiente base cuyo valor por defecto es 0.5  y es aplicado a la 
    // cantidad de goles y a la cantidad de jugadores de cada equipo. Es decir: coef =  0,5 * cantGoles * cantJugadores  
    // donde cantGoles : es la cantidad de goles;   cantJugadores : es la cantidad de jugadores.

    // Implementar el método coeficientePartido() en la clase Partido el cual retorna el valor obtenido 
    // por el coeficiente base, multiplicado por la cantidad de goles y la cantidad de jugadores. 
    // Redefinir dicho método según corresponda.
    public function coeficientePartido(){
        $cantGoles= $this->getCantGolesE1() + $this->getCantGolesE2();

        $jugadoresEquipo1= $this->getObjEquipo1()->getCantJugadores();
        $jugadoresEquipo2= $this->getObjEquipo2()->getCantJugadores();
        $cantJugadores = $jugadoresEquipo1 + $jugadoresEquipo2;

        $coeficiente= $this->getCoefBase();

        $coeficientePartido = $coeficiente * $cantGoles * $cantJugadores;
        return $coeficientePartido;
    }
    /**
     * Implementar en la clase Partido el método darEquipoGanador() que retorna el equipo ganador de un partido 
     * (equipo con mayor cantidad de goles del partido), en caso de empate debe retornar a los dos equipos.
    */
    public function darEquipoGanador(){
        $getCantGolesE1= $this->getCantGolesE1();
        $getCantGolesE2= $this->getCantGolesE2();

        $equipoGanador= "El ganador es!!\n";
        $equipo1=$this->getObjEquipo1();
        $equipo2=$this->getObjEquipo2();
        
        if($getCantGolesE1 > $getCantGolesE2){
            $equipoGanador.= $equipo1;
        }elseif($getCantGolesE1 < $getCantGolesE2){
            $equipoGanador.= $equipo2;
        }else{
            $equipoGanador.= "\nAMBOS EQUIPOS GANAN\n";
            $equipoGanador.= $equipo1;
            $equipoGanador.= $equipo2;
        }
        return $equipoGanador;
    }
    public function __toString(){
        //string $cadena
        $cadena = "idpartido: ".$this->getIdpartido()."\n";
        $cadena = $cadena. "Fecha: ".$this->getFecha()."\n";
        $cadena = $cadena."\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 1> "."\n".$this->getObjEquipo1()."\n";
        $cadena = $cadena. "Cantidad Goles E1: ".$this->getCantGolesE1()."\n";
          $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        $cadena = $cadena. "<Equipo 2> "."\n".$this->getObjEquipo2()."\n";
        $cadena = $cadena. "Cantidad Goles E2: ".$this->getCantGolesE2()."\n";
         $cadena = $cadena. "\n"."--------------------------------------------------------"."\n";
        return $cadena;
    }
}


?>