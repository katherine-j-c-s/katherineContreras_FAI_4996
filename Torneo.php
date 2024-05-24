<?php
//Implementar la clase Torneo que contiene la colección de partidos y un importe que será parte del premio.
// Cuando un Torneo es creado la colección de partidos debe ser creada como una colección vacía.

class Torneo{
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
    /**
     * Implementar el método ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido) 
     * en la  clase Torneo el cual recibe por parámetro 2 equipos, la fecha en la que se realizará 
     * el partido y si se trata de un partido de futbol o basquetbol . El método debe crear y retornar 
     * la instancia de la clase Partido que corresponda y almacenarla en la colección de partidos del Torneo.
     * Se debe chequear que los 2 equipos tengan la misma categoría e igual cantidad de jugadores, 
     * caso contrario no podrá ser registrado ese partido en el torneo.  
     */
    public function ingresarPartido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido){
        $colPartidas = $this->getColPartidas();

        $idPartida = 1;
        if(count($colPartidas) != 0){
            $idPartida = count($colPartidas) + 1;
        }

        $tipoCategoriaEquipo1 = $OBJEquipo1->getObjCategoria()->getidcategoria();
        $tipoCategoriaEquipo2 = $OBJEquipo2->getObjCategoria()->getidcategoria();

        $cantIntegrantesEquipo1 = $OBJEquipo2->getCantJugadores();
        $cantIntegrantesEquipo2 = $OBJEquipo2->getCantJugadores();

        $nuevoPartido = "no tienen los requerimientos necesarios";

        if($tipoCategoriaEquipo1 == $tipoCategoriaEquipo2 && $cantIntegrantesEquipo1 == $cantIntegrantesEquipo2){
            $nuevoPartido = new Partido($idPartida,$fecha,$OBJEquipo1,0,$OBJEquipo2,0,$tipoPartido);
            $colPartidas[]= $nuevoPartido;
            $this->setColPartidas($colPartidas);
        }
        
        return $nuevoPartido;
    }
    /**
     * Implementar el método darGanadores($deporte) en la clase Torneo que recibe por parámetro si se trata de un partido 
     * de fútbol o de básquetbol y en  base  al parámetro busca entre esos partidos los equipos ganadores ( equipo con
     * mayor cantidad de goles). El método retorna una colección con los objetos de los equipos encontrados.
     */
    public function darGanadores($deporte){
        $colPartidosGanadores = [];
        $colPartidos = $this->getColPartidas();

        foreach($colPartidos as $partido){
            $deportePartido = $partido->getTipoDeDeporte();
            if($deportePartido == $deporte){
                $equipoGanador= $partido->darEquipoGanador();
                $colPartidosGanadores[]= $equipoGanador;
            }
        }
        
        return $colPartidosGanadores;
    }
    /**
     * Implementar el método calcularPremioPartido($OBJPartido) que debe retornar un arreglo asociativo donde una de sus
     * claves es ‘equipoGanador’  y contiene la referencia al equipo ganador; y la otra clave es ‘premioPartido’ que 
     * contiene el valor obtenido del coeficiente del Partido por el importe configurado para el torneo. 
     * (premioPartido = Coef_partido * ImportePremio)
     */
    public function calcularPremioPartido($OBJPartido){
        $equipoGanador= $OBJPartido->darEquipoGanador();

        $coeficientePartido= $OBJPartido->coeficientePartido();
        $importePremio = $this->getimportePremio();
        $premioPartido= $coeficientePartido * $importePremio;

        $array= [
            "equipoGanador" => $equipoGanador,
            "premioPartido" => $premioPartido
        ];
        
        return $array;
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