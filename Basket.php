<?php
class Basket extends Partido {
	private $Infracciones;
    private $coefPenalizacion;
	public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $tipoDeDeporte, $Infracciones ){
		parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2,$tipoDeDeporte);
		$this->Infracciones= $Infracciones;
        $this->coefPenalizacion = 0.75;
	}
    //GET
    public function getInfracciones(){
        return $this->Infracciones;
    }
    public function getCoefPenalizacion(){
        return $this->coefPenalizacion;
    }


    //SET
    public function setInfracciones($Infracciones){
        $this->Infracciones= $Infracciones;
    }
    public function setCoefPenalizacion($value){
        $this->coefPenalizacion = $value;
    }
    
    public function coeficientePartido(){
        $coeficienteBasePartido = parent::coeficientePartido();
        $coefPenalizacion = $this->getCoefPenalizacion();
        $cantidadInfracciones = $this->getInfracciones();

        $coef = $coeficienteBasePartido - ($coefPenalizacion * $cantidadInfracciones);
        return $coef;
    }
    public function __toString(){
        //string $cadena
        $cadena = parent::__toString();
        $cadena.= "Infracciones: ".$this->getInfracciones()."\n"
        ."coeficientePenalizacion: ".$this->getCoefPenalizacion()."\n";
        return $cadena;
    }
}
?>
