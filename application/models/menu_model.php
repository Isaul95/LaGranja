<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menu_model extends CI_Model {
    
    public function getmenu(){
        $this->db->select("id_comida, nombre_de_categoria, precio_asada, precio_chorizo, precio_campechano_a, precio_barbacha, precio_costilla, precio_sencilla, descripcion");
    $this->db->from("categoria");
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->result();
    }

    public function guardar($data){
          return $this->db->insert("categoria", $data);
       }

  /*   ======================  EDITAR  =========================  */
       public function getComida($id_comida){
             $this->db->where("id_comida",$id_comida);
             $resultado = $this->db->get("categoria");
             return $resultado->row();
        }
            public function update($id_comida, $data){
            $this->db->where("id_comida",$id_comida);
             return $this->db->update("categoria", $data);
        }
  
  public function delete($data){
           // $this->db->where("id_Productos",$id_Productos);
             return $this->db->delete("categoria", $data);
              
        }


        
    	
}






