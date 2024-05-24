<?php

Class Torneo{


    private $colPartidos;
    private $importePremio;

    public function __construct($colPartidos , $importePremio)
    
    {
        $this->colPartidos = $colPartidos;
        $this->importePremio = $importePremio;
    }

    
    public function getColPartidos()
    {
        return $this->colPartidos;
    }
    public function setColPartidos($colPartidos)
    {
        $this->colPartidos = $colPartidos;
    }


    public function getImportePremio()
    {
        return $this->importePremio;
    } 
    public function setImportePremio($importePremio)
    {
        $this->importePremio = $importePremio;
    }


    public function ingresarPartido($objEquipo1, $objEquipo2, $fecha, $tipoPartido){
        
        $idpartido = count($this->getColPartidos()) + 1;
        $error =1;
        $colPartidos= $this->getColPartidos();

        // $partido = new Partido($OBJEquipo1, $OBJEquipo2, $fecha, $tipoPartido);
        if($objEquipo1->getObjCategoria() === $objEquipo2->getObjCategoria() && $objEquipo1->getCantJugadores() === $objEquipo2->getCantJugadores()){
            if($tipoPartido == 'futbol'){
                //$idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2
                $objPartido = new Futbol($idpartido, $fecha, $objEquipo1,0, $objEquipo2, 0 );
            }else if($tipoPartido == 'basquetbol'){
                //$idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $cantInfracciones, 
                $objPartido = new Basquet($idpartido, $fecha, $objEquipo1,0, $objEquipo2, 0,0 );

            }else{
                $error = -1;
            }
            if($error !=-1){
                 array_push($colPartidos, $objPartido);
                $this->setColPartidos($colPartidos);

            }

        }

        return $this->devolverArreglos($colPartidos);


    }


    public function darGanadores($deporte) {
        $ganadores = [];
        foreach ($this->getColPartidos() as $partido) {
            if (($deporte === 'futbol' && $partido instanceof Futbol) ||
                ($deporte === 'basquetbol' && $partido instanceof Basquet)) {
                $ganador = $partido->darEquipoGanador();
                if ($ganador !== null) {
                    $ganadores[] = $ganador;
                }
            }
        }
        return $ganadores;
    }


    public function calcularPremioPartido($partido) {
        $ganador = $partido->darEquipoGanador();
        if ($ganador !== null) {
            $coeficiente = $partido->coeficientePartido();
            $premioPartido = $coeficiente * $this->importePremio;
            return ['equipoGanador' => $ganador, 'premioPartido' => $premioPartido];
        }
        return null;
    }




    private function devolverArreglos($arreglo){
        $cadena = "";
        foreach($arreglo as $elemento){
            $cadena = $cadena . "\n\n" . $elemento;
        }
        return $cadena;
    }


    public function __toString(){

        return
            "Equipos participantes: " . $this->devolverArreglos($this->getColPartidos()) . "\n" .
            "Importe para el premio: " . $this->getImportePremio(); 
    }


}