
<!DOCTYPE html>
<html>
<head>
	<title>NOTA MAYOR</title>
</head>
<meta charset="utf-8">
<body>
	<form method="POST" action="comparador.php">
	<input	type="text" name="n1" >
	<input	type="text" name="n2" >
	<input	type="text" name="n3" >
	<input type="submit" name="calcular" value="calcular">
	</form>
	
</body>
</html>

<?php
if (isset($_POST['n1']) && isset($_POST['n2']) && isset($_POST['n3'])) {
  $n1=$_POST['n1'];
  $n2=$_POST['n2'];
  $n3=$_POST['n3'];

  if(($n1>$n2) || ($n1>$n3)){
    echo $n1." es el mayor";
  }
  elseif(($n2>$n1) || ($n2>$n3)){
    echo $n2." es el mayor";
  }elseif(($n3>$n2) || ($n3>$n1)){
    echo $n3." es el mayor";
  }
  else{
    echo "los numeros son iguales ";
  }
}
?>
