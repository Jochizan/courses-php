<?php

require_once "../config/Session.php";

class Carrito extends Session
{
  public function __construct()
  {
    parent::__construct('carrito');
  }

  public function load()
  {
    if ($this->getValue() == NULL) {
      return [];
    }
    return $this->getValue();
  }

  public function add($id)
  {
    if ($this->getValue() == NULL) {
      $items = [];
    } else {
      $items = json_decode($this->getValue(), 1);
      for ($i = 0; $i < sizeof($items); $i++) {
        if ($items[$i]['id'] == $id) {
          $items[$i]['cantidad']++;
          $this->setValue(json_encode($items));
          return $this->getValue();
        }
      }
    }
    $item = [
      'id' => (int)$id,
      'cantidad' => 1
    ];
    array_push($items, $item);
    $this->setValue(json_encode($items));
    return $this->getValue();
  }

  public function remove($id)
  {
    if ($this->getValue() == NULL) {
      $items = [];
    } else {
      $items = json_decode($this->getValue(), 1);
      for ($i = 0; $i < sizeof($items); $i++) {
        if ($items[$i]['id'] == $id) {
          $items[$i]['cantidad']--;
          if ($items[$i]['cantidad'] == 0) {
            unset($items[$i]);
            $items = array_values($items);
          }
          $this->setValue(json_encode($items));
          return true;
        }
      }
    }
  }

  public function addTheNumber($id, $cantidad)
  {
    if ($this->getValue() == NULL) {
      $items = [];
    } else {
      $items = json_decode($this->getValue(), 1);
      for ($i = 0; $i < sizeof($items); $i++) {
        if ($items[$i]['id'] == $id) {
          $items[$i]['cantidad'] += $cantidad;
          $this->setValue(json_encode($items));
          return $this->getValue();
        }
      }
    }
    $item = [
      'id' => (int)$id,
      'cantidad' => $cantidad
    ];
    array_push($items, $item);
    $this->setValue(json_encode($items));
    return $this->getValue();
  }

  public function removeTheNumber($id, $cantidad)
  {
    if ($this->getValue() == NULL) {
      $items = [];
    } else {
      $items = json_decode($this->getValue(), 1);
      for ($i = 0; $i < sizeof($items); $i++) {
        if ($items[$i]['id'] == $id) {
          $items[$i]['cantidad'] -= $cantidad;
          if ($items[$i]['cantidad'] == 0) {
            unset($items[$i]);
            $items = array_values($items);
          }
          $this->setValue(json_encode($items));
          return true;
        }
      }
    }
  }

  public function emptyCarrito()
  {
    $this->setValue(null);
    return $this->load();
  }
}