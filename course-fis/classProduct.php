<?php


class Product
{
  public $strDescripcion;
  public $fltPrecio;
  protected $intStockMinimo = 10;
  protected $strStatus = "Activo";

  public function __construct(string $descripcion, float $precio)
  {
    $this->strDescripcion = $descripcion;
    $this->fltPrecio = $precio;
  }

  /**
   * @return mixed
   */
  public function getStrDescripcion()
  {
    return $this->strDescripcion;
  }

  /**
   * @param mixed $strDescripcion
   */
  public function setStrDescripcion($strDescripcion)
  {
    $this->strDescripcion = $strDescripcion;
  }

  /**
   * @return mixed
   */
  public function getFltPrecio()
  {
    return $this->fltPrecio;
  }

  /**
   * @param mixed $fltPrecio
   */
  public function setFltPrecio($fltPrecio)
  {
    $this->fltPrecio = $fltPrecio;
  }

  /**
   * @return int
   */
  public function getIntStockMinimo(): int
  {
    return $this->intStockMinimo;
  }

  /**
   * @param int $intStockMinimo
   */
  public function setIntStockMinimo(int $intStockMinimo)
  {
    $this->intStockMinimo = $intStockMinimo;
  }

  /**
   * @return string
   */
  public function getStrStatus(): string
  {
    return $this->strStatus;
  }

  /**
   * @param string $strStatus
   */
  public function setStrStatus(string $strStatus)
  {
    $this->strStatus = $strStatus;
  }

  public function getInfoProducto()
  {
    $arrProducto = array(
      'producto' => $this->strDescripcion,
      'precio' => $this->fltPrecio,
      'stock_minimo' => $this->intStockMinimo,
      'estado' => $this->strStatus
    );
    return $arrProducto;
  }
}

?>