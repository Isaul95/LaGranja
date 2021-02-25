<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class consultaventascanceladas extends CI_Model {

public function mesasconcancelaciones(){

ini_set('date.timezone', 'America/Mexico_City');
  $Fecha=date('Y-m-d', time());

  $this->db->distinct();
           $this->db->select("mesa");
    $this->db->from("descripcion_de_venta");
    
    $this->db->where("estado","cancelado");
        $this->db->where("Fecha", $Fecha);
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
   return $resultados->result();
    }

public function totaldeldia(){

ini_set('date.timezone', 'America/Mexico_City');
  $Fecha=date('Y-m-d', time());

     $this->db->select_sum("importe");
           $this->db->from("descripcion_de_venta");
           $this->db->where("estado","cancelado");
            $this->db->where("Fecha", $Fecha);
             $resultado = $this->db->get();
             return $resultado->row();
}


public function idventasenlamesa1($numerodemesa){

ini_set('date.timezone', 'America/Mexico_City');
  $Fecha=date('Y-m-d', time());

  $this->db->distinct();
           $this->db->select("venta.id_venta, total, pago, cambio, descripcion_de_venta.Fecha, descripcion_de_venta.Hora");
    $this->db->from("descripcion_de_venta");
    $this->db->join("venta","descripcion_de_venta.id_venta=venta.id_venta");
    $this->db->where("estado","cancelado");
    $this->db->where("tipo_venta","Mesa cancelada");

        $this->db->where("mesa", $numerodemesa);
        $this->db->where("Fecha", $Fecha);
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
   return $resultados->result();
    }

    public function sumadelasventasendeterminadamesa($numerodemesa){

ini_set('date.timezone', 'America/Mexico_City');
  $Fecha=date('Y-m-d', time());

           $this->db->select_sum("importe");
           $this->db->from("descripcion_de_venta");
    $this->db->where("estado","cancelado");
        $this->db->where("mesa", $numerodemesa);
        $this->db->where("tipo_venta", "Mesa cancelada");
        $this->db->where("Fecha", $Fecha);
             $resultado = $this->db->get();
             
             return $resultado->row();
    }


 public function detalledeventadiariocomida($identurno, $numerodemesa){
       $this->db->select("categoria.nombre_de_categoria, cantidad, precio_unitario, importe, Hora");
    $this->db->from("descripcion_de_venta");
    $this->db->join("categoria","descripcion_de_venta.id_comida=categoria.id_comida");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","cancelado");
    $this->db->where("id_venta", $identurno);
   // $this->db->where("id_comida IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }

     public function detalledeventadiariobebida($identurno, $numerodemesa){
        $this->db->select("bebidas.nombre_bebida, cantidad, precio_unitario, importe, Hora");
    $this->db->from("descripcion_de_venta");
 $this->db->join("bebidas","descripcion_de_venta.id_bebida=bebidas.id_bebida");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","cancelado");
        $this->db->where("id_venta", $identurno);
    //$this->db->where("id_bebida IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }

        public function detalledeventadiarioextras($identurno, $numerodemesa){
        $this->db->select("extras.nombre, cantidad, precio_unitario, importe, Hora");
    $this->db->from("descripcion_de_venta");
     $this->db->join("extras","descripcion_de_venta.id_extra=extras.id_extra");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","cancelado");
        $this->db->where("id_venta", $identurno );
    //$this->db->where("id_extra IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }
       public function totalpagocambiodeunaventaenparticular($identurno, $numerodemesa){
        $this->db->distinct();
        $this->db->select("venta.total, venta.pago, venta.cambio");
    $this->db->from("venta");
     $this->db->join("descripcion_de_venta","venta.id_venta=descripcion_de_venta.id_venta");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","cancelado");

        $this->db->where("venta.id_venta", $identurno);
    //$this->db->where("id_extra IS NOT NULL");
    

    $resultados = $this->db->get();
    return $resultados->result();
    }

    public function comidacancelada(){

ini_set('date.timezone', 'America/Mexico_City');
  $Fecha=date('Y-m-d', time());

       $this->db->select("categoria.nombre_de_categoria, cantidad, precio_unitario, importe, Fecha, Hora, mesa");
    $this->db->from("descripcion_de_venta");
    $this->db->join("categoria","descripcion_de_venta.id_comida=categoria.id_comida");
  
    $this->db->where("estado","cancelado");

   // $this->db->where("id_comida IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }

     public function bebidacancelada(){

ini_set('date.timezone', 'America/Mexico_City');
  $Fecha=date('Y-m-d', time());

        $this->db->select("bebidas.nombre_bebida, cantidad, precio_unitario, importe, Fecha, Hora, mesa");
    $this->db->from("descripcion_de_venta");
 $this->db->join("bebidas","descripcion_de_venta.id_bebida=bebidas.id_bebida");
  
    $this->db->where("estado","cancelado");
$this->db->where("Fecha", $Fecha);
    //$this->db->where("id_bebida IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }

        public function extrascancelados(){

ini_set('date.timezone', 'America/Mexico_City');
  $Fecha=date('Y-m-d', time());
 $this->db->select("extras.nombre, cantidad, precio_unitario, importe, Fecha, Hora, mesa");
    $this->db->from("descripcion_de_venta");
     $this->db->join("extras","descripcion_de_venta.id_extra=extras.id_extra");
    $this->db->where("estado","cancelado");
$this->db->where("Fecha", $Fecha);
    //$this->db->where("id_extra IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }
}


