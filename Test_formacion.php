<?php
include_once "Locomotora.php";
include_once "Formacion.php";
include_once "VagonPasajeros.php";
include_once "VagonCarga.php";

// 1. Creo la locomotora
$locomotora = new Locomotora(188, 140);
echo "=== Locomotora ===\n";
echo $locomotora . "\n";

// 2. Creo los vagones según la tabla
// Voy a tomar arbitrariamente largo/ancho = 20/4 (podés ajustar)
$vagon1     = new VagonPasajeros(2010, 20, 4, 15000, 30, 25);
$vagonCarga = new VagonCarga     (2015, 20, 4, 15000, 55000);
$vagon2     = new VagonPasajeros(2018, 20, 4, 15000, 50, 50);

echo "=== Vagones creados ===\n";
echo $vagon1     . "\n\n";
echo $vagonCarga . "\n\n";
echo $vagon2     . "\n\n";

// 3. Formo la formación e incorporo los vagones
$formacion = new Formacion($locomotora, 10);
$formacion->incorporarVagonFormacion($vagon1);
$formacion->incorporarVagonFormacion($vagonCarga);
$formacion->incorporarVagonFormacion($vagon2);

echo "Formación creada con éxito.\n\n";

// 4. Intento incorporar 6 pasajeros
$resultado1 = $formacion->incorporarPasajeroFormacion(6);
echo "Incorporar 6 pasajeros: " . ($resultado1 ? "OK\n\n" : "No se pudo\n\n");

// 5. Muestro el estado de cada vagón
echo "Estado de los vagones tras incorporar 6 pasajeros:\n";
echo $vagon1     . "\n\n";
echo $vagonCarga . "\n\n";
echo $vagon2     . "\n\n";

// 6. Intento incorporar 14 pasajeros
$resultado2 = $formacion->incorporarPasajeroFormacion(14);
echo "Incorporar 14 pasajeros: " . ($resultado2 ? "OK\n\n" : "No se pudo\n\n");

// 7. Imprimo la locomotora de nuevo (aunque no cambia)
echo "Locomotora (sin cambios):\n";
echo $locomotora . "\n\n";

// 8. Promedio de pasajeros por vagón
$promedio = $formacion->promedioPasajeroFormacion();
echo "Promedio pasajeros/vagón: $promedio\n\n";

// 9. Peso total de la formación
$pesoTotal = $formacion->pesoFormacion();
echo "Peso total de la formación: $pesoTotal kg\n\n";

// 10. Estado final de los vagones
echo "Estado FINAL de los vagones:\n";
echo $vagon1     . "\n\n";
echo $vagonCarga . "\n\n";
echo $vagon2     . "\n\n";
?>