<?php
	require_once("ClassOperation.php");
	$operation1 = new Operacion(10, 12);
	echo "Total suma: " . $operation1->getSuma() . "<BR>";
	echo "Total resta: " . $operation1->getResta() . "<BR>";
	echo "Total multiplicación: " . $operation1->getMultiplicar() . "<BR>";
	echo "Total división: " . $operation1->getDivision() .  "<BR>";
?>