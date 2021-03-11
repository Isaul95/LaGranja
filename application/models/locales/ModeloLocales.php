<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloLocales extends CI_Model { // INICIO DEL MODELO

# Listar datos de la tabla locales
public function listarLocales(){

  $resultados = $this->db->get('locales');
  return $resultados->result();

}

# Agregar nuevo Banquete
public function agregarLocal($data)
    {
        return $this->db->insert('locales', $data);
        //return $this->db->insert('productoexternotemp', $data);
    }


// Buscar por id
public function single_entry($id)
          {
              $this->db->select('*');
              $this->db->from('locales');
              $this->db->where('id_local', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
// Actualizar datos
public function actualizarLocal($id_local,$ajax_data){
  return $this->db->update('locales', $ajax_data, array('id_local' => $id_local));


}

public function delete_entry($id)
{
    return $this->db->delete('locales', array('id_local' => $id));
}

  } // FIN / CIERRE DEL MODELO
