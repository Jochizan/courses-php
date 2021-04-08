<?php
// funciones normales
function Cuadrado($a) {
  return "El área del rectangulo es " . ($a * $a);
}
function Rectangulo($a, $b) {
  return "El área del cuadrado es " . ($a * $b);
}
function circulo($r) {
  return "El área del circulo es " . ($r * $r * 3.14);
}
// funciones en clases
class Cuadrado {
  public $lado;
  function __construct($lado) 
  {
    $this->lado = $lado;
  }
  function Area() {
    echo "El área del cuadrado es " . ($this->lado * $this->lado);
  } 
}
class Rectangulo {
  public $ancho;
  public $largo;
  function __construct($ancho, $largo) 
  {
    $this->largo= $largo;
    $this->ancho= $ancho;
  }
  function Area() {
    echo "El área del rectangulo es " . ($this->ancho* $this->largo);
  } 
}
class Circulo {
  public $radio;
  function __construct($radio) 
  {
    $this->radio= $radio;
  }
  function Area() {
    echo "El área del círculo es " . ($this->radio* $this->radio* 3.14);
  }
}
$Cuad1 = new Cuadrado(12);
$Cuad1->Area();
echo "<BR>";
$Rec1 = new Rectangulo(12, 12);
$Rec1->Area();
echo "<BR>";
$Circ1 = new Circulo(12);
$Circ1->Area();
?>
