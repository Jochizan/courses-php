<?php
$x = "Sistemas UNI"; //definiendo las variables
$y = "Bienvenidos";
$z = "PHP";
echo $y." a ".$x."- curso: <b>".$z."</b>";
echo "<hr>";
define("NOMBRE",'Juan Perez'); //definiendo constantes
echo NOMBRE;
echo "<HR>";
$x = 15;
$y = 30;
echo "La suma de " . $x ." y " . $y . " es: " . ($x + $y);
echo "<BR>";
echo "La resta de $x y $y es: " . ($x - $y);
echo '<BR>';
echo "El producto de $x y $y es: " . ($x * $y);
echo "<BR>";
echo $x++ . "<BR>";
echo $x . "<BR>";
echo ++$x . "<BR>";
echo --$y . "<BR>";
echo $y . "<BR>";
echo $y-- . "<BR>";
//echo $y . "<BR>";
echo "<A href=\"http://www.google.com\">google</A>";
echo "<BR>";
echo "<A href='http://www.yahoo.com'>yahoo</A>";
echo "<HR>";
$x = 7; $y = 7;
echo $x == $y;
echo "<BR>";
echo $x != $y;
$z = $x < $y;
var_dump($z);
$z = $x > $y;
var_dump($z);
$p = 3; $q = 5;
$r = ($p < $q) || ($p > $q) || ($p == $q);
// negación simple
$t = !($p == $q);
var_dump($r);
var_dump($t);
echo "<HR>";
echo date('y-m-d')." -- ".date('Y-M-D H:i')."<BR>";
echo __FILE__."<BR>";
echo dirname(__FILE__)."<BR>";
// número con rand
echo "<b>" . rand(1,10) . "</b><BR>";
$x = "123.45";
var_dump($x);
$y = (float)$x;
var_dump($y);
$z = (int)$y;
var_dump($z);
echo "<HR>";
$varname = "var1";
$$varname = 5;
echo $var1;
echo "<br>fin<br>";//la más común
print("fin<br>");//para dar formatos(números)
die("se acabo");//imprime y termina la ejecución
echo "sigue....";
?>
