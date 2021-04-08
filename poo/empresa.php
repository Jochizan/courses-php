<?php
require_once("classEmpleader.php");
require_once("classClient.php");

$objPersona = new Person(78978, "Andres Pérez", 25);
echo $objPersona->getDatePersonal();
//$objEmpleado = new Empleader(78978, "Anres Pérez", 25);
//$objEmpleado->setPuesto("Administrador");
//echo $objEmpleado->getDatePersonal();
//echo "Puesto: " . $objEmpleado->getPuesto();

//$objCliente = new Client(434544, "Elena Castillo", 20);
//$objCliente->setCredito(1000);
//echo $objCliente->getDatePersonal();
//echo "Puesto: " . $objCliente->getCredito();
?>
