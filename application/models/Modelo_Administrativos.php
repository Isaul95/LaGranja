<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_RegistrosPag extends CI_Model { // INICIO DEL MODELO


      	/* -------------------------------------------------------------------------- */
      	/*                                Fetch Records                               */
      	/* -------------------------------------------------------------------------- */


      public function get_entries()
        {
            $query = $this->db->get('cod');
            return $query->result();
        }


        public function obtenerListaPagos(){
                $this->db->select("id, nombre, numero_con, carrera , semestre");
            $this->db->from("cod");
             // $this->db->where("Cantidad !=0");
            $resultados = $this->db->get();
            return $resultados->result();
            }




// ***************************  INICIO FUNCTION PARA INSRTAR  ************************************
public function insert_entry($data)
    {
        return $this->db->insert('cod', $data);
    }

    // public function insertarDoc($data){  // SI INSERTa bien
    //   return $this->db->insert("cod", $data);
    //     // return $this->db->insert_id();
    //   }



    // public function getArchivoId($id){  //DE ESTA FORMA SOLO SE REGRESA EL PURO ARCHIVOI COMO BIANRIO
    //   $query = $this->db->query("select archivo FROM cod where id=?", array($id));
    //   $q =  $query->row_array();
    //    return $q['archivo'];
    //
    //   }


    public function getArchivoId($id){
      $query = $this->db->query("select * FROM cod where id=?", array($id));
      return $query->row_array();
      }





      public function delete_entry($id)
          {
              return $this->db->delete('cod', array('id' => $id));
          }

          public function single_entry($id)
          {
              $this->db->select('*');
              $this->db->from('cod');
              $this->db->where('id', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }



  } // FIN / CIERRE DEL MODELO
