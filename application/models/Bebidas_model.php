<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bebidas_model extends CI_Model {

/*  =========================== MODELO -- BEBIDASS ===================================0*/

public function getbebidas(){
        $this->db->select("id_bebida, nombre_bebida, precio_bebida, descripcion_bebida");
    $this->db->from("bebidas");
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->result();
    }


                   public function getProveedor(){ 
/* OBTENER PARTE DE proveedores, ESTADO en USO EL CAMPO  para obtener todos los parametros*/
                    $this->db->where("estado", "1"); 
                      $resultados = $this->db->get("proveedor");
                            return $resultados->result();            
                   }

       public function guardar($data){
          return $this->db->insert("bebidas", $data);
       }

        public function getBebida($id_bebida){
             $this->db->where("id_bebida",$id_bebida);
             $resultado = $this->db->get("bebidas");
             return $resultado->row();
        }


     public function tienestock($id_Productos, $Cantidad){
          $this->db->select("Cantidad");
    $this->db->from("productos");
    $this->db->where("id_Productos =",$id_Productos);

    $stockActual = 0;
    $resultados = $this->db->get($stockActual >= $Cantidad);
    return $resultados->result();


          /*   $this->db->where("id_Productos",$id_Productos);
             $this->db->where("Cantidad",$Cantidad);
             $resultado = $this->db->get("productos");
        $stockActual = 0;  
     return $stockActual >= $Cantidad;
         //    return $resultado->row(); */
        }

     /*add new   public function updatestop($id_Productos, $data){
            $this->db->where("id_Productos",$id_Productos);
             return $this->db->updatestop("productos", $data);

 borarrrrlooo despuessss in thisss partt................
             echo $query;
            if($reg = mysql_fetch_array(result)){
            $stockActual = $reg[0];  
           }
            echo "stock actual: ".$stockActual;
            echo "stock : ".$cantidades;
        }*/



 
        public function update($id_bebida, $data){
            $this->db->where("id_bebida",$id_bebida);
             return $this->db->update("bebidas", $data);
              
        }

        public function delete($data){
           // $this->db->where("id_Productos",$id_Productos);
             return $this->db->delete("bebidas", $data);
              
        }

        
}