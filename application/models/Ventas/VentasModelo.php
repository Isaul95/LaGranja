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
    //VentaID = $this->db->get('venta');
    //return $VentaID->row();
    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
    }
    public function listar_venta_en_turno($UsuarioID)
    {
      $this->db->select('p.id_producto as id_producto, p.nombre_producto as producto, dv.cantidad as piezas, p.precio as precio_unitario ,dv.importe as importe');
        $this->db->from('descripcion_de_venta dv');
        $this->db->join("productos p","dv.id_producto = p.id_producto");
        $this->db->join("venta v ","v.id_venta = dv.id_venta");
        $this->db->where('v.estado_venta', "En_turno");
        $this->db->where('v.id_usuario', $UsuarioID);
        //$this->db->where('v.fecha_reporte', curdate());
        $this->db->where('date_format(fecha_reporte,"%Y-%m-%d")', 'CURDATE()', FALSE);
        $resultados = $this->db->get();
    return $resultados->result();
    }

  public function CrearVenta ($UsuarioID, $FechaActual) {
    $ValoresCampos = array ('id_usuario' => $UsuarioID, 'estado_venta' => "En_turno", 'fecha_reporte' => $FechaActual);
    return $this->db->insert('venta', $ValoresCampos);
  }
 //FUNCIONALES

  public function LeerProductos($TipoProducto) {
    $InformacionProductos = $this->db->get_where('productos', array('tipo_producto' => $TipoProducto));
    return $InformacionProductos->result();
  }


  public function LeerDescripcionDeLaVentaEnTurno($UsuarioID, $EstadoVenta) {
    $InformacionProductos = $this->db->get_where('productos', array('tipo_producto' => $TipoProducto));
    return $InformacionProductos->result();
    /*$InformacionDescripcionDeVenta = "SELECT p.id_producto AS id_producto, p.nombre_producto AS nombre, dv.cantidad AS cantidad, p.precio AS precio, dv.importe AS importe
FROM descripcion_de_venta dv
INNER JOIN productos p ON dv.id_producto = p.id_producto
INNER JOIN venta v ON dv.id_venta = v.id_venta
WHERE v.estado_venta = "En_turno"
AND v.fecha_reporte = CURDATE( )
AND v.id_usuario =2";*/
  }


  public function ActualizarCantidadProducto($Operacion, $Piezas, $Identificador) {
    /*if ($Operacion == "Resta") {
      $Consulta = "UPDATE productos SET cantidad = cantidad - " .$Piezas. " WHERE id_producto = " .$Identificador;
      $this->db->query($Consulta);
      $ResultadoConsulta = $this->db->affected_rows();
    } else {
      $this->db->set('cantidad', 'cantidad+' .$Piezas, false);
      $this->db->where('nombre_producto', "'".$Identificador."'");
      $this->db->update('productos');
      $ResultadoConsulta = $this->db->affected_rows();
    }
    if ($ResultadoConsulta > 0) {
      $this->db->select('cantidad');
      if ($Operacion == "Suma") {
        $this->db->get_where('productos', array('nombre_producto' => $Identificador));
        $Cantidad = $this->db->result();
      } else {
        $this->db->get_where('productos', array('id_producto' => $Identificador));
        $Cantidad = $this->db->result();
      }
    } else {
      $Cantidad = "Error";
    }
    return $Cantidad;*/

    if ($Operacion == "Resta") {
      $Consulta = "UPDATE productos SET cantidad = cantidad - " .$Piezas. " WHERE id_producto = " .$Identificador;
    } else {
      $Consulta = "UPDATE productos SET cantidad = cantidad + " .$Piezas. " WHERE nombre_producto = '" .$Identificador. "'";
    }
    $this->db->query($Consulta);

    return $Cantidad->result();
  }

}
