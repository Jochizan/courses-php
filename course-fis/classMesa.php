<?php


require_once("classMueble.php");

final class Mesa extends Mueble
{
  private $strForma = "";
  protected $strTamanio;
  public $strStatus = "Activo";

  public function __construct(string $descripcion, float $precio, string $marca, string $color, string $material, string $tamanio)
  {
    parent::__construct($descripcion, $precio, $marca, $color, $material);
    $this->strTamanio = $tamanio;
  }

  /**
   * @return string
   */
  public function getForma(): string
  {
    return $this->strForma;
  }

  /**
   * @param string $strForma
   */
  public function setForma(string $strForma)
  {
    $this->strForma = $strForma;
  }

  public function getInfoProducto()
  {
    $arrProducto = array(
      'producto' => $this->strDescripcion,
      'precio' => $this->fltPrecio,
      'stock_minimo' => $this->intStockMinimo,
      'estado' => $this->strStatus,
      'color' => $this->strColor,
      'material' => $this->strMaterial,
      'tamanio' => $this->strTamanio,
      'forma' => $this->strForma
    );
    return $arrProducto;
  }
}

?>