<?php 
class Viaje{
    private $codigo;
    private $destino;
    private $CantMaxP;
    private $pasajeros= [];

    public function __construct($codigo,$destino,$CantMaxP){
        $this->codigo= $codigo;
        $this->destino = $destino;
        $this->CantMaxP = $CantMaxP;
      //  $this->pasajeros = $pasaj;

    }
    
    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }


    public function getDestino()
    {
        return $this->destino;
    }

  
    public function setDestino($destino)
    {
        $this->destino = $destino;

        return $this;
    }


    public function getCantMaxP()
    {
        return $this->CantMaxP;
    }


    public function setCantMaxP($CantMaxP)
    {
        $this->CantMaxP = $CantMaxP;

        return $this;
    }
    //get no necesita parametros
    public function getPasajeros(){
        return $this->pasajeros;
    }

    public function setPasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
    }

    public function verPasajeros(){
        $prueba= $this->pasajeros;
        $mensaje= "";
        foreach($prueba as $pasaj){
            $mensaje .= "Nombre: ". $pasaj["nombre"] . ", Apellido: " . $pasaj["apellido"] . ", Dni: " . $pasaj["documento"] . "\n";
        } 
        return $mensaje;
    }
    
    public function __toString(){
        return "Codigo Viaje: ".$this->getCodigo(). "\n Destino: " .$this->getDestino(). "\n Cant Max de pasajeros: ".$this->getCantMaxP(). "\n Pasajeros: ". $this->verPasajeros(). "\n";
    
    }


    public function codigoNuevo($nuevo_Codigo)
    {
        $this->setCodigo($nuevo_Codigo);
        return "El codigo nuevo de {$this->getDestino()} es: {$this->getCodigo()}";
    }


    public function agregarPasajero($nombre, $apellido, $documento) {
        if(count($this->pasajeros) < $this->CantMaxP) {

        $pasajero= array(
            'nombre' => $nombre,
            'apellido' => $apellido,
            'documento' => $documento
        );
        array_push($this->pasajeros, $pasajero);
        return true;
        } else {
        return false;
        }
    }
    public function modificarDestino($destino) {
        $this->destino = $destino;
        echo "Destino modificado exitosamente.\n";
    }

    public function modificarMaxPasajeros($CantMaxP) {
        $this->CantMaxP = $CantMaxP;
        echo "Cantidad máxima modificada exitosamente \n";
      }

    public function modificarPasajero($index, $nombre, $apellido, $documento) {
        $this->pasajeros[$index]["nombre"] = $nombre;
        $this->pasajeros[$index]["apellido"] = $apellido;
        $this->pasajeros[$index]["documento"] = $documento;
      }
    
    

    public function eliminarPasajero($documento) {
        foreach($this->pasajeros as $index => $pasajero) {
          if($pasajero["documento"] == $documento) {
            array_splice($this->pasajeros, $index, 1);
            echo "Pasajero eliminado exitosamente.\n";
            return;
          }
        }
        echo "No se encontró al pasajero con el número de documento ingresado.\n";
      }


}