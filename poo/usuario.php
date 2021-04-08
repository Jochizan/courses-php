<?php
	require_once("classUser.php");
	$objUserOne = new User("Joan Roca", "joanjose_04@hotmail.com", "Admin");
	$objAndrea = new User("Andrea Arana", "andrea@info.com", "Cliente");
	// echo $objUserOne->strName;
	// echo $objUserOne->strEmail;
	// echo $objUserOne->strTipe;
	// echo User::$strEstado;
	echo $objUserOne->getPerfil();
	echo "<BR><BR>";
	echo $objAndrea->getPerfil();
	$objAndrea->setChangePassword("123456789");
	echo "<BR><BR>";
	echo $objAndrea->getPerfil();
?>