<?php

defined('BASEPATH') OR exit ("No direct script acces allowed");

class VentasModelo extends CI_Model {

// FUNCIONALES
  public function BuscarIDVenta ($UsuarioID, $FechaActual) {
    $this->db->select('id_venta');
    $this->db->from('venta');
    $this->db->where('id_usuario', $UsuarioID);
    $this->db->where('estado_venta', "En_turno");
    $this->db->where('fecha_reporte', $FechaActual);
    $VentaID = $this->db->get();
    return (count($VentaID->result() > 0) ? $VentaID->row() : 0);
    //VentaID = $this->db->get('venta');
    //return $VentaID->row();
    /*$query = $this->db->get();
    if (count($query->result()) > 0) {
      return $query->row();
    }*/
  }


  public function listar_venta_en_turno($UsuarioID)
  {//p.cantidad as cantidad   productos p
    $this->db->select('p.id_producto as id_producto, p.nombre_producto as producto, dv.cantidad as piezas, p.precio as precio_unitario ,dv.importe as importe');
      $this->db->from('descripcion_de_venta dv');
      $this->db->join("productos p","dv.id_producto = p.id_producto");
      $this->db->join("venta v ","v.id_venta = dv.id_venta");
      $this->db->where('v.estado_venta', "En_turno");
      $this->db->where('v.id_usuario', $UsuarioID);
      $this->db->where('date_format(fecha_reporte,"%Y-%m-%d")', 'CURDATE()', FALSE);
      $resultados = $this->db->get();
  return $resultados->result();
  }


  public function InsertarVenta ($UsuarioID, $FechaActual) {
    $ValoresCampos = array ('id_usuario' => $UsuarioID, 'estado_venta' => "En_turno", 'fecha_reporte' => $FechaActual);
    return $this->db->insert('venta', $ValoresCampos);
  }
 //FUNCIONALES


  public function LeerProductos($TipoProducto) {
    $InformacionProductos = $this->db->get_where('productos', array('tipo_producto' => $TipoProducto));
    return $InformacionProductos->result();
  }


  public function ComprobarSiExisteProductoDescripcionVenta ($ProductoID, $VentaID) {
    $this->db->select('id, cantidad, importe');
    $this->db->from('descripcion_de_venta');
    $this->db->where('id_producto', $ProductoID);
    $this->db->where('id_venta', $VentaID);
    $DatosBusqueda = $this->db->get();
    return (count($DatosBusqueda->result() > 0) ? $DatosBusqueda->result() : 0);
  }


  public function InsertarProductoDescripcionVenta ($ProductoID, $PiezasCompradas, $PrecioPiezas, $VentaID) {
    $ValoresCampos = array ('id_producto' => $ProductoID, 'cantidad' => $PiezasCompradas, 'importe' => $PrecioPiezas, 'id_venta' => $VentaID);
    return ($this->db->insert('descripcion_de_venta', $ValoresCampos) ? $this->db->insert_id() : 0);
  }


  public function ActualizarProductoSeleccionadoDescripcionVenta($NuevaCantidadPiezas, $NuevoPrecioPiezas, $ID) {
    $this->db->set('cantidad', $NuevaCantidadPiezas);
    $this->db->set('importe', $NuevoPrecioPiezas);
    $this->db->where('id', $ID);
    return ($this->db->update('descripcion_de_venta') ? $this->db->affected_rows() : 0);
  }


  public function EliminarProductoDescripcionVenta ($ProductoID, $VentaID) {
    $this->db->where('id_producto', $ProductoID);
    $this->db->where('id_venta', $VentaID);
    return $this->db->delete('descripcion_de_venta');
  }


  public function ActualizarCantidadProducto($ProductoID, $CantidadModificada) {
    /*if ($Operacion == "Resta") {
      $Consulta = "UPDATE productos SET cantidad = cantidad - " + $Piezas + " WHERE id_producto = " .$ProductoID;
    } else {
      $Consulta = "UPDATE productos SET cantidad = cantidad + " .$Piezas. " WHERE id_producto = " .$ProductoID;
    }*/
    $this->db->set('cantidad', $CantidadModificada);
    $this->db->where('id_producto', $ProductoID);
    $NuevaCantidad = $this->db->update('productos');
    return ($NuevaCantidad ? true : false);
  }


  public function BuscarCantidadProducto ($ProductoID) {
    $this->db->select('cantidad');
    $this->db->from('productos');
    $this->db->where('id_producto', $ProductoID);
    $NuevaCantidad = $this->db->get();
    return (count($NuevaCantidad->result() > 0) ? $NuevaCantidad->row() : -1);
  }

}

/*if ($SegundaBusqueda) {
  return $DatosBusqueda->result();
} else {
  return (count($DatosBusqueda->result() > 0) ? true : false);
}*/
