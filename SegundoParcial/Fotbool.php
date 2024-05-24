<?php


Class Futbol extends Partido{

    

    public function __construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2)
    {
        parent::__construct($idpartido, $fecha,$objEquipo1,$cantGolesE1,$objEquipo2,$cantGolesE2);
        
    }


    public function coeficientePartido(){
        $objEquipo1 = $this->getObjEquipo1();
        $golesxjugadores = parent::coeficientePartido();
        $coefBase = $this->getCoefBase();
        $categoria = $objEquipo1->getObjCategoria();
        $coefFinal = 0;

        if($categoria == 'Mayores'){
            $coefBase = 0.27;
            $coefFinal = $golesxjugadores * $coefBase;
        }else if($categoria == 'juveniles'){
            $coefBase = 0.19;
            $coefFinal = $golesxjugadores * $coefBase;
        }else if($categoria == 'Menores'){
            $coefBase = 0.13;
            $coefFinal = $golesxjugadores * $coefBase;
        }
        return $coefFinal;
    }

  
    


    public function __toString()
    {
        return parent::__toString();
    }
}