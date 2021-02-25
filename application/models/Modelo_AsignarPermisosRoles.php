<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_AsignarPermisosRoles extends CI_Model { // INICIO DEL MODELO


  // ***************************  INSERTAR BAUCHE TABLA **********************
  public function insert_baucher($data){

          return $this->db->insert('alta_baucher_banco', $data);
      }


	/* -------------------------------------------------------------------------- */
	/*                              LISRA DE Alumnos                              */
	/* -------------------------------------------------------------------------- */

      public function listarPermisos(){

        $this->db->select("p.*, m.nombre as menu, r.nombre as rol");
        $this->db->from("permisos p");
        $this->db->join("roles r","p.rol_id = r.id");
        $this->db->join("menus m","p.menu_id =m.id ");
         $resultados = $this->db->get();
         return $resultados->result();

        }


        public function getMenus(){
          $resultados = $this->db->get("menus");
          return $resultados->result();
        }


        public function getRoles(){
          $resultados = $this->db->get("roles");
          return $resultados->result();
        }




















    public function insert_permisos($data)
          {
              return $this->db->insert('permisos', $data);
          }




  } // FIN / CIERRE DEL MODELO
