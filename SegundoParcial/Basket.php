<?php

Class Basquet extends Partido{

    private $cantInfracciones;
    private $coefPenalizacion;

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2, $cantInfracciones)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        $this->cantInfracciones = $cantInfracciones;
        $this->coefPenalizacion = 0.75;

    }
 
    public function getCantInfracciones()
    {
        return $this->cantInfracciones;
    }
    public function setCantInfracciones($cantInfracciones)
    {
        $this->cantInfracciones = $cantInfracciones;
    }

    public function getCoefPenalizacion()
    {
        return $this->coefPenalizacion;
    }
    public function setCoefPenalizacion($coefPenalizacion)
    {
        $this->coefPenalizacion = $coefPenalizacion;
    }

    public function coeficientePartido() {
        $golesxjugadores = parent::coeficientePartido();
        $coefPenalizacion = 0.75;
        $coef = $this->getCoefBase() - ($coefPenalizacion * $this->getCantInfracciones());
        return  $golesxjugadores;
    }



    public function __toString()
    {
        return 
           "Partido Jugado: " .  parent::__toString() . "\n".
           "Cantidad de infracciones: " . $this->getCantInfracciones() . "\n".
           "Coeficiente de penalizacion: " . $this->getCoefPenalizacion() . "\n";
    }
}