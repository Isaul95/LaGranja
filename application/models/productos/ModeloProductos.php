<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloProductos extends CI_Model { // INICIO DEL MODELO

# Listar datos de la tabla productos
public function listarProductos(){

  $resultados = $this->db->get('productos');
  return $resultados->result();

}

# Agregar nuevo producto
public function agregarProducto($data)
    {
        return $this->db->insert('productos', $data);
    }


// Buscar por id
public function single_entry($id)
          {
              $this->db->select('*');
              $this->db->from('productos');
              $this->db->where('id_producto', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
// Actualizar datos
public function actualizarProducto($id_producto,$ajax_data){
  return $this->db->update('productos', $ajax_data, array('id_producto' => $id_producto));

}

public function delete_entry($id)
{
    return $this->db->delete('productos', array('id_producto' => $id));
}

  } // FIN / CIERRE DEL MODELO
