<?php
define('root', __FILE__);
$long = strlen(ROOT);
$pos = 0;
$bs = "\\";
echo ROOT . "<BR>";
echo $bs . "<HR>";
$aux = 0;
while($pos < $long) {
	$x = substr(ROOT, $pos, 1);
	if ($x < $bs) {
		$carpeta = substr(ROO, $aux, ($pos - $aux));
		echo $carpeta . "<BR>";
		$aux = $pos;
	}
	$pos++;
}
?>
