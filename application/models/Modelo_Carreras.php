<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_Carreras extends CI_Model { // INICIO DEL MODELO

////////////////////////////// PERIODO ESCOLAR //////////////////////////////////////////
public function obtenercarreras(){
    $this->db->select("id_carrera, carrera_descripcion, clave, fecha");
$this->db->from("carrera");
 // $this->db->where("Cantidad !=0");
$resultados = $this->db->get();
return $resultados->result();
}
///////////////////////////////BORRAR PERIODOS //////////////////////////////////////////

public function delete_entry($id)
{
    return $this->db->delete('carrera', array('id_carrera' => $id));
}

//////////////////////////////  INSERTAR PERIODOS ///////////////////////////////////////
public function insert_entry($data)
    {
        return $this->db->insert('carrera', $data);
    }

///////////////////////////// OBTENER PERIODOS POR ID //////////////////////////////////
public function single_entry($id)
          {
              $this->db->select('*');
              $this->db->from('carrera');
              $this->db->where('id_carrera', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
//////////////////////////////  ACTUALIZAR PERIODOS ///////////////////////////////////////
public function update($data){

    return $this->db->update('carrera', $data, array('id_carrera' => $data['id_carrera']));
}

public function getArchivoId($id){
      $query = $this->db->query("select * FROM cod where id=?", array($id));
      return $query->row_array();
}






          



  } // FIN / CIERRE DEL MODELO
