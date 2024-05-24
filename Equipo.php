<?php
class Equipo extends Categoria{
	private $nombre;
	private $capitan;
	private $cantJugadores;

	public function __construct($nombre, $capitan,$cantJugadores,$objCategoria){

        $idCategoria = $objCategoria->getidcategoria();
        $descCategoria = $objCategoria->getDescripcion();
        parent::__construct($idCategoria,$descCategoria);

		$this->nombre=$nombre;
		$this->capitan= $capitan;
		$this->cantJugadores=$cantJugadores;
	}

    //GETTERS
    public function getNombre(){
        return $this->nombre;
    }
    public function getCapitan(){
        return $this->capitan;
    }
    public function getCantJugadores(){
        return $this->cantJugadores;
    }

    //SETTERS
    public function setNombre($nombre){
        $this->nombre= $nombre;
    }
    public function setCapitan($capitan){
        $this->capitan= $capitan;
    }
    public function setCantJugadores($cantJugadores){
         $this->cantJugadores= $cantJugadores;
    }
    public function __toString(){
        $categoria = parent::__toString();
        //string $cadena
        $cadena = "Nombre: ".$this->getNombre()."\n";
        $cadena.= "capitan: ".$this->getCapitan()."\n";
         $cadena.= "Categoria: ". $categoria ."\n";
        $cadena.= "Cant. Jugadores: ".$this->getCantJugadores()."\n";
        return $cadena;
    }
}
?>