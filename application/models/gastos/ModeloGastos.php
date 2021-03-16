<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloGastos extends CI_Model { // INICIO DEL MODELO

# Listar datos de la tabla gastos
public function listarGastos(){

  $this->db->select('a.*,d.*');
  $this->db->from('egreso a');
  $this->db->join('usuarios d', 'a.usuario = d.id', 'left');

  $resultados = $this->db->get();
  return $resultados->result();


}

# Agregar nueva gastos
public function agregarGasto($data)
    {
        return $this->db->insert('egreso', $data);
    }


// Buscar por id
public function single_entry($id)
          {
              $this->db->select('*');
              $this->db->from('egreso');
              $this->db->where('idegreso', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
// Actualizar datos
public function actualizarGasto($idegreso,$ajax_data){
  return $this->db->update('egreso', $ajax_data, array('idegreso' => $idegreso));

}

public function delete_entry($id)
{
    return $this->db->delete('egreso', array('idegreso' => $id));
}

  } // FIN / CIERRE DEL MODELO
