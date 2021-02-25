<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_Materias extends CI_Model { // INICIO DEL MODELO


      	/* -------------------------------------------------------------------------- */
      	/*                                Fetch Records                               */
      	/* -------------------------------------------------------------------------- */
    
     
        public function obtenermaterias($semestre,$especialidad){
            $this->db->distinct();
            $this->db->select("m.id_materia, m.clave, 
            m.nombre_materia,m.creditos");
            $this->db->from("materias m");
            $this->db->join("carrera c","m.especialidad = c.id_carrera");
            $this->db->where('m.semestre', $semestre);
            $this->db->where('m.especialidad', $especialidad);
            
            $resultados = $this->db->get();
            return $resultados->result();
            }




// ***************************  INICIO FUNCTION PARA INSRTAR  ************************************
public function insert_entry($data)
    {
        return $this->db->insert('materias', $data);
    }



      public function update($numero_control, $data){
        return $this->db->update('materias', $data, array('id_materia' => $numero_control));
    }


          public function single_entry($id)
          {
            $this->db->select('*');
              $this->db->from('materias');
              $this->db->where('id_materia', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
          public function delete_entry($id)
          {
              return $this->db->delete('materias', array('id_materia' => $id));
          }


  } // FIN / CIERRE DEL MODELO
