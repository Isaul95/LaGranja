<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function login($username, $password){
      	$this->db->where("username", $username);
      	$this->db->where("password", $password);

        $this->db->select("us.*, r.nombre as rol");
        $this->db->from("usuarios us");
        $this->db->join("roles r","r.id = us.rol_id");

            $resultados = $this->db->get();
    	  // $resultados = $this->db->get("usuarios_roles");    // ESTE ERA LA REAL
    	     if ($resultados->num_rows() > 0) {
    	     	return $resultados->row();
    	     }
    	      else{
    	      	return false;
    	      }
       }

       public function listarPermisos(){

         $this->db->select("us.*, r.nombre as rol");
         $this->db->from("usuarios us");
         $this->db->join("roles r","r.id = us.rol_id");
          $resultados = $this->db->get();
          return $resultados->result();

         }





}
