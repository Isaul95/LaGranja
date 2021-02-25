<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_RegistroPago extends CI_Model { // INICIO DEL MODELO


// ***************************  INICIO FUNCTION PARA INSRTAR  ************************************
  public function insertar_resgistroPagos($data){

            return $this->db->insert('crud', $data);
        }

// *************************  FUINCTION PARA HAXCER LA CONSULTA GRAL. ******************************
  public function listaPagos(){

    $query = $this->db->get('crud');
        // if (count( $query->result() ) > 0) {
    	return $query->result();
          // }
        }

        // ****************************  FUINCTION PARA ELIMINAR  DATES  **********************************
        public function delete($id){
        return $this->db->delete('crud', array('id' => $id));
      }



    // ****************************  FUINCTION PARA ELIMINAR  DATES  **********************************

    public function edit($id){

        $this->db->select("*");
        $this->db->from("crud");
        $this->db->where("id", $id);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
          return $query->row();
        }
      }

      public function update($data){

          return $this->db->update('crud', $data, array('id' => $data['id']));
      }


  } // FIN / CIERRE DEL MODELO
