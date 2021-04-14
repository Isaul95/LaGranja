<?php

defined('BASEPATH') OR exit ("No direct script acces allowed");

class VentasModelo extends CI_Model {

  public function LeerProductos($TipoProducto) {
    $InformacionProductos = $this->db->get_where('productos', array('tipo_producto' => $TipoProducto));
    return $InformacionProductos->result();
  }

}
