<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModeloApertura extends CI_Model { // INICIO DEL MODELO

# Listar datos de la tabla aperturas
public function listarAperturas(){

  $this->db->select('a.*,d.*');
  $this->db->from('apertura a');
  $this->db->join('usuarios d', 'a.usuario = d.id', 'left');

  $resultados = $this->db->get();
  return $resultados->result();

}
//traerFecha()
public function traerFecha()
          {
            $resultados = $this->db->get('apertura');
            return $resultados->result();
          }

public function traerFechaA($fecha){
  $this->db->select('*');
  $this->db->from('apertura');
  $this->db->where('fecha', $fecha);
  $query = $this->db->get();
  if (count($query->result()) > 0) {
    return $query->row();
  }
}

# Agregar nueva apertura
public function agregarApertura($data)
    {
        return $this->db->insert('apertura', $data);
    }


// Buscar por id
public function single_entry($id)
          {
              $this->db->select('*');
              $this->db->from('apertura');
              $this->db->where('id_apertura', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
// Actualizar datos
public function actualizarApertura($id_apertura,$ajax_data){
  return $this->db->update('apertura', $ajax_data, array('id_apertura' => $id_apertura));

}

public function delete_entry($id)
{
    return $this->db->delete('apertura', array('id_apertura' => $id));
}


} // FIN / CIERRE DEL MODELO
