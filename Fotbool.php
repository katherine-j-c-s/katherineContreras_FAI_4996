<?php
class Fotbool extends Partido {

    private $coefMenores;
    private $coefJuveniles;
    private $coefMayores;
	public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $tipoDeDeporte ){
		parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$tipoDeDeporte);
        $this->coefMenores = 0.13;
        $this->coefJuveniles = 0.19;
        $this->coefMayores = 0.27;
    }
    public function getCoefMenores(){
        return $this->coefMenores;
    }

    public function setCoefMenores($value){
        $this->coefMenores = $value;
    }

    public function getCoefJuveniles(){
        return $this->coefJuveniles;
    }

    public function setCoefJuveniles($value){
        $this->coefJuveniles = $value;
    }

    public function getCoefMayores(){
        return $this->coefMayores;
    }

    public function setCoefMayores($value){
        $this->coefMayores = $value;
    }

    public function coeficientePartido(){
        $cantGoles = $this->getCantGolesE1() + $this->getCantGolesE2();
        $cantJugadores = $this->getObjEquipo1()->getCantJugadores() + $this->getObjEquipo2()->getCantJugadores();

        $categoriaPartido = parent::getObjEquipo1()->getObjCategoria()->getDescripcion();
        $coef = parent::coeficientePartido();
        switch ($categoriaPartido) {
            case "menores":
                $coef = $this->getCoefMenores();
                break;
            case "juveniles":
                $coef = $this->getCoefJuveniles();
                break;
            case "mayores":
                $coef = $this->getCoefMayores();
                break;
        }
        return $coef * $cantGoles * $cantJugadores;
    }
    public function __toString(){
        //string $cadena
        $cadena = parent::__toString();
        return $cadena;
    }
}
?>
