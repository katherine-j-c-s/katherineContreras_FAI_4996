<?php
class Categoria {
	private $idcategoria;
	private $descripcion;

	public function __construct($idcategoria, $descripcion ){
		$this->idcategoria=$idcategoria;
		$this->descripcion= $descripcion;
	}
    //GETTERS
    public function getidcategoria(){
        return $this->idcategoria;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    //SETTERS
    public function setidcategoria($idcategoria){
        $this->idcategoria= $idcategoria;
    }
    public function setDescripcion($descripcion){
        $this->descripcion= $descripcion;
    }

    public function __toString(){
        //string $cadena
        $cadena = "IdCategori: ".$this->getidcategoria()."\n"
        . "descripcion: ".$this->getDescripcion()."\n";
        return $cadena;
    }
}
?>
