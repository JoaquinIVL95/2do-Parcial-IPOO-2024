<?php
include_once("Categoria.php");
include_once("Torneo.php");
include_once("Equipo.php");
include_once("Partido.php");
include_once("Fotbool.php");
include_once("Basket.php");

$catMayores = neW Categoria(1,'Mayores');
$catJuveniles = neW Categoria(2,'juveniles');
$catMenores = neW Categoria(1,'Menores');

$objE1 = neW Equipo("Equipo Uno", "Cap.Uno",1,$catMayores);
$objE2 = neW Equipo("Equipo Dos", "Cap.Dos",1,$catMayores);

$objE3 = neW Equipo("Equipo Tres", "Cap.Tres",4,$catJuveniles);
$objE4 = neW Equipo("Equipo Cuatro", "Cap.Cuatro",4,$catJuveniles);

$objE5 = neW Equipo("Equipo Cinco", "Cap.Cinco",5,$catMayores);
$objE6 = neW Equipo("Equipo Seis", "Cap.Seis",6,$catMayores);

$objE7 = neW Equipo("Equipo Siete", "Cap.Siete",7,$catJuveniles);
$objE8 = neW Equipo("Equipo Ocho", "Cap.Ocho",8,$catJuveniles);

$objE9 = neW Equipo("Equipo Nueve", "Cap.Nueve",9,$catMenores);
$objE10 = neW Equipo("Equipo Diez", "Cap.Diez",9,$catMenores);

$objE11 = neW Equipo("Equipo Once", "Cap.Once",11,$catMayores);
$objE12 = neW Equipo("Equipo Doce", "Cap.Doce",11,$catMayores);



$objPartido1 = new Futbol (14, "2024-05-07 ", $objE1, 3 , $objE2, 2);
$objPartido2 = new Basquet (15, "2024-05-07 ", $objE3, 3 , $objE4, 2, 4);

echo $objPartido;
echo $objPartido1->darEquipoGanador();
echo $objPartido1->coeficientePartido();

echo $objPartido2->darEquipoGanador();
echo $objPartido2->coeficientePartido();
// $colPartidos = [];
// $importePremio = 10;
// $objTorneo = new Torneo ($colPartidos , $importePremio);

// echo $objTorneo->ingresarPartido($objE1, $objE2, "2024", "futbol");
?>
