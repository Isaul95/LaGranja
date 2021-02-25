<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_PeriodoEscolar extends CI_Model { // INICIO DEL MODELO

////////////////////////////// PERIODO ESCOLAR //////////////////////////////////////////
public function obtenerlistaperiodos(){
    $this->db->select("id_periodo_escolar, nombre_ciclo, fecha_inicial, fecha_final");
$this->db->from("periodo_escolar");
 // $this->db->where("Cantidad !=0");
$resultados = $this->db->get();
return $resultados->result();
}
///////////////////////////////BORRAR PERIODOS //////////////////////////////////////////

public function delete_entry($id)
{
    return $this->db->delete('periodo_escolar', array('id_periodo_escolar' => $id));
}

//////////////////////////////  INSERTAR PERIODOS ///////////////////////////////////////
public function insert_entry($data)
    {
        return $this->db->insert('periodo_escolar', $data);
    }

///////////////////////////// OBTENER PERIODOS POR ID //////////////////////////////////
public function single_entry($id)
          {
              $this->db->select('*');
              $this->db->from('periodo_escolar');
              $this->db->where('id_periodo_escolar', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
//////////////////////////////  ACTUALIZAR PERIODOS ///////////////////////////////////////
public function update($data){

    return $this->db->update('periodo_escolar', $data, array('id_periodo_escolar' => $data['id_periodo_escolar']));
}

public function getArchivoId($id){
      $query = $this->db->query("select * FROM cod where id=?", array($id));
      return $query->row_array();
}






          



  } // FIN / CIERRE DEL MODELO
