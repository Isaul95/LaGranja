<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloProductoExterno extends CI_Model { // INICIO DEL MODELO


  # Listar datos de la tabla gastos
  public function listarProductoExterno(){
    //
    $resultados = $this->db->get('productoexternotemp');
    return $resultados->result();

  }
  public function verProductosExt(){

    $resultados = $this->db->get('productoexterno');
    return $resultados->result();

  }
  public function listarLocales(){

    $resultados = $this->db->get('locales');
    return $resultados->result();

  }

  public function listarProductos(){
    $crudo='Crudo';
    $this->db->select('*');
    $this->db->from('productos');
    $this->db->where('tipo_producto', $crudo);
    $resultados = $this->db->get();
    return $resultados->result();

  }

  public function getCantidadProducto($nombre){
    $this->db->select('*');
    $this->db->from('productos');
    $this->db->where('nombre_producto', $nombre);
    $query = $this->db->get();
    if (count($query->result()) > 0) {
        return $query;
      }


  }


  # Agregar nueva gastos
  public function agregarProductoExterno($data)
      {
          return $this->db->insert('productoexternotemp', $data);
      }

  // Total
  public function total(){
    //
    $this->db->select_sum('total');
    $query = $this->db->get('productoexternotemp');

    //  $query = $this->db->get();
    if (count($query->result()) > 0) {
      return $query->row();
    }

  }

  // Buscar precio de producto
  public function precio($nombre){
    //
    $this->db->select('*');
    $this->db->from('productos');
    $this->db->where('nombre_producto', $nombre);
    $this->db->where('tipo_producto', 'Crudo');
    $query = $this->db->get();
    if (count($query->result()) > 0) {
            return $query->row();
    }
  }

  // Buscar por id
  public function single_entry($id)
            {
                $this->db->select('*');
                $this->db->from('productoexternotemp');
                $this->db->where('id_pe', $id);
                $query = $this->db->get();
                if (count($query->result()) > 0) {
                    return $query->row();
                }
            }

  public function buscarProductoTemp($nombre){
    //
    $this->db->select('*');
    $this->db->from('productoexternotemp');
    $this->db->where('producto', $nombre);
    $query = $this->db->get();
    if (count($query->result()) > 0) {
        return $query;
    }
  }

  // Actualizar datos
  public function actualizarProductoExt($id_pe,$ajax_data){
    return $this->db->update('productoexternotemp', $ajax_data, array('id_pe' => $id_pe));

  }

  public function delete_entry($id)
  {
      return $this->db->delete('productoexternotemp', array('id_pe' => $id));
  }

  public function getProductosExternos(){
    //
    $this->db->select('*');
    $this->db->from('productoexternotemp');

    $query = $this->db->get();
    if (count($query->result()) > 0) {
        return $query;
    }
  }
  # Agregar Productos finales
  public function agregarProductoExternoFinal($data){
    return $this->db->insert('productoexterno', $data);
  }

  public function agregarProductoExternoFinalP($data){
    return $this->db->insert('productos', $data);
  }
  //Actualizar Producto temporal
  public function actualizarCantidadProductoTemp($nombre,$cantidad,$subtotal){
    $this->db->where('producto', $nombre);
    $this->db->set('pieza', $cantidad);
    $this->db->set('total', $subtotal);
    return $this->db->update('productoexternotemp');
    //return $this->db->update('productos', $ajax_data, array('id_pe' => $id_pe));

  }

  public function actualizarCantidadProducto($nombre,$cantidad){
    //
    $this->db->where('nombre_producto', $nombre);
    $this->db->set('cantidad', $cantidad);
    return $this->db->update('productos');


  }

  public function eliminarProductoExternoFinal(){

    return $this->db->empty_table("productoexternotemp");

  }

} // FIN / CIERRE DEL MODELO
