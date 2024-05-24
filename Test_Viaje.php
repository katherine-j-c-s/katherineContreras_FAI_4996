<?php

// Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
// Implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.

include "Viaje.php";
include "Pasajero.php";
include "PasajeroVIP.php";
include "PasajeroNE.php";
include "ResponsableV.php";

function menu(){
    $objPasajero1 = new Pasajero("Katherine", "Contreras" , 4123435, 2995506358, 1, 100);
    $objPasajero2 = new Pasajero("Javier", "Carmona" , 43352635, 2995448866, 2, 101);
    $objPasajero3 = new Pasajero("Helent", "Sanchez" , 42256984, 2995436857, 3, 102);

    $objResponsableV = new ResponsableV(1, 123, "Maria", "Rarimez");

    $viajeFeliz = new Viaje(1, "Mendoza", 4, [$objPasajero1, $objPasajero2, $objPasajero3], $objResponsableV, 50);

    $eleccion = 0;
    while ($eleccion != 8){
        echo "Viaje Feliz \n" .
        "1) Ver detalles del viaje \n" .
        "2) Editar código de viaje \n" .
        "3) Editar destinto \n" .
        "4) Editar cantidad máxima de pasajeros \n" .
        "5) Editar responsable de viaje \n" .
        "6) Editar pasajero \n" .
        "7) Agregar pasajero \n" .
        "8) Salir \n";
    
        $eleccion = trim(fgets(STDIN));
        switch ($eleccion){
            case 1:
                echo $viajeFeliz;
                break;
            case 2:
                echo "Ingrese el nuevo código de viaje: \n";
                $nuevoCodigo = trim(fgets(STDIN));
                $viajeFeliz->setCodigo($nuevoCodigo);
                echo "Código actualizado \n";
                break;
            case 3:
                echo "Ingrese el nuevo destino: \n";
                $nuevoDestino = trim(fgets(STDIN));
                $viajeFeliz->setDestino($nuevoDestino);
                echo "Destino actualizado \n";
                break;
            case 4:
                echo "Ingrese el nuevo máximo de pasajeros: \n";
                $nuevoMaximo = trim(fgets(STDIN));
                $viajeFeliz->setCantidadMaximaDePasajeros($nuevoMaximo);
                echo "Máximo de pasajeros actualizado \n";
                break;
            case 5:
                echo $viajeFeliz->getObjResponsableV() . "Editar responsable de viaje \n" .
                "1) Editar número de empleado \n" .
                "2) Editar número de licencia \n" .
                "3) Editar nombre \n" .
                "4) Editar apellido \n";
                $eleccion = trim(fgets(STDIN));
                switch ($eleccion){
                    case 1:
                        echo "Ingrese el nuevo número de empleado: \n";
                        $nuevoNumero = trim(fgets(STDIN));
                        $viajeFeliz->getObjResponsableV()->setNumeroDeEmpleado($nuevoNumero);
                        echo "Número de empleado actualizado \n";
                        break;
                    case 2:
                        echo "Ingrese el nuevo número de licencia: \n";
                        $nuevoNumero = trim(fgets(STDIN));
                        $viajeFeliz->getObjResponsableV()->setNumeroDeLicencia($nuevoNumero);
                        echo "Número de licencia actualizado \n";
                        break;
                    case 3:
                        echo "Ingrese el nuevo nombre: \n";
                        $nuevoNombre = trim(fgets(STDIN));
                        $viajeFeliz->getObjResponsableV()->setNombre($nuevoNombre);
                        echo "Nombre actualizado \n";
                        break;
                    case 4:
                        echo "Ingrese el nuevo apellido: \n";
                        $nuevoApellido = trim(fgets(STDIN));
                        $viajeFeliz->getObjResponsableV()->setApellido($nuevoApellido);
                        echo "Apellido actualizado \n";
                        break;
                    default:
                        echo "Opción incorrecta";
                }
                break;
            case 6:
                echo "Ingrese el número de documento del pasajero que quiere editar: \n";
                $documentoPasajero = trim(fgets(STDIN));
                $objPasajero = $viajeFeliz->buscarPasajero($documentoPasajero);
                if ($objPasajero != null){
                    echo $objPasajero . "\n" .
                    "1) Editar nombre \n" .
                    "2) Editar apellido \n" .
                    "3) Editar número de documento \n" .
                    "4) Editar teléfono \n";
                    $eleccion = trim(fgets(STDIN));
                    switch ($eleccion){
                        case 1:
                            echo "Ingrese el nuevo nombre: \n";
                            $nuevoNombre = trim(fgets(STDIN));
                            $objPasajero->setNombre($nuevoNombre);
                            echo "Nombre actualizado \n";
                            break;
                        case 2:
                            echo "Ingrese el nuevo apellido: \n";
                            $nuevoApellido = trim(fgets(STDIN));
                            $objPasajero->setApellido($nuevoApellido);
                            echo "Apellido actualizado \n";
                            break;
                        case 3:
                            echo "Ingrese el nuevo número de documento: \n";
                            $nuevoDocumento = trim(fgets(STDIN));
                            $objPasajero->setNumeroDeDocumento($nuevoDocumento);
                            echo "Número de documento actualizado \n";
                            break;
                        case 4:
                            echo "Ingrese el nuevo teléfono: \n";
                            $nuevoTelefono = trim(fgets(STDIN));
                            $objPasajero->setTelefono($nuevoTelefono);
                            echo "Teléfono actualizado \n";
                            break;
                        default:
                            echo "Opción incorrecta";
                    }
                }
                break;
            case 7:
                // Hay que programar esta opción teniendo en cuenta que puede ser VIP o con necesidades especiales.
                echo "ahora agrege los datos del pasajero que desea agregar";

                echo "Ingrese el nombre: \n";
                $nuevoNombre = trim(fgets(STDIN));
                echo "Ingrese el apellido: \n";
                $nuevoApellido = trim(fgets(STDIN));
                echo "Ingrese el numero de documento : \n";
                $nuevoNumeroDocumento = trim(fgets(STDIN));
                echo "Ingrese el telefono: \n";
                $nuevotelefono = trim(fgets(STDIN));
                echo "Ingrese el numero de asiento: \n";
                $nuevoNumeroAsiento = trim(fgets(STDIN));
                echo "Ingrese el numero de ticket: \n";
                $nuevoNumeroTicket = trim(fgets(STDIN));

                echo "el pasajero es VIP? s/n";
                $respuestaVIP= trim(fgets(STDIN));
                if($respuestaVIP == "s"){
                    echo "Ingrese el numero de Viaje Frecuente: \n";
                    $numViajeFrecuente = trim(fgets(STDIN));
                    echo "Ingrese la cantidad de millas: \n";
                    $cantidadMillas = trim(fgets(STDIN));
                    $objPasajeroNuevo = new PasajeroVIP($nuevoNombre, $nuevoApellido , $nuevoNumeroDocumento, $nuevotelefono, $nuevoNumeroAsiento, $nuevoNumeroTicket,$numViajeFrecuente,$cantidadMillas);
                    $viajeFeliz-> agregarPasajero($objPasajeroNuevo);
                }else{
                    echo "el pasajero tiene alguna necesidad especial? s/n";
                    $respuestaNE= trim(fgets(STDIN));
                    if($respuestaNE == "s"){
                        echo "Ingrese si usa silla de ruedas: \n";
                        $sillaDeRuedas = trim(fgets(STDIN));
                        echo "Ingrese las comidas especiales que tenga: \n";
                        $comidasEspeciales = trim(fgets(STDIN));
                        echo "Ingrese si tiene un asistente personal: \n";
                        $asistencia = trim(fgets(STDIN));
                        $objPasajeroNuevo = new PasajeroNE($nuevoNombre, $nuevoApellido , $nuevoNumeroDocumento, $nuevotelefono, $nuevoNumeroAsiento, $nuevoNumeroTicket,$sillaDeRuedas,$comidasEspeciales,$asistencia);
                        $viajeFeliz-> agregarPasajero($objPasajeroNuevo);
                    }
                }
                if($respuestaVIP == "n" && $respuestaNE == "n"){
                    $objPasajeroNuevo = new Pasajero($nuevoNombre, $nuevoApellido , $nuevoNumeroDocumento, $nuevotelefono, $nuevoNumeroAsiento, $nuevoNumeroTicket);
                    $viajeFeliz-> agregarPasajero($objPasajeroNuevo);
                }
            case 8:
                echo "Gracias por usar nuestro programa.\n";
                break;
            default:
                echo "Opción incorrecta\n";
                break;

        }
    }


}

menu();