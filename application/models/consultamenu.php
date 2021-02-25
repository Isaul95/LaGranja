<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class consultamenu extends CI_Model {

public function obteneridnull($mesa){
     $this->db->distinct();
    $this->db->select("venta.id_venta");
    $this->db->from("venta");
     $this->db->join("descripcion_de_venta","venta.id_venta=descripcion_de_venta.id_venta");
   
   $this->db->where("venta.total IS NULL");
   $this->db->where("venta.pago IS NULL");
   $this->db->where("venta.cambio IS NULL");
   $this->db->where("mesa",$mesa);
    
    $resultados = $this->db->get();
    return $resultados->row_array();
}

public function obteneridparacobrocliente($mesa){
    $this->db->distinct();
    $this->db->select("id_venta");
    $this->db->from("descripcion_de_venta");
    
   $this->db->where("estado", "enturno");
   $this->db->where("mesa",$mesa);
    
    $resultados = $this->db->get();
    return $resultados->row_array();
}

public function obtenerid_enturno($mesa){
          $this->db->distinct();
$this->db->select("id_venta");
    $this->db->from("descripcion_de_venta");
   $this->db->where("mesa",$mesa);
            $this->db->where("estado","enturno");
    
    $resultados = $this->db->get();
    return $resultados->row_array();
}

public function actualizararealizadoalcliente($mesa, $numerodecliente){
  
  ini_set('date.timezone', 'America/Mexico_City');
 $Hora_de_venta=date('H:i:s', time());
 date('g:i:s a', strtotime($Hora_de_venta));
$Fecha_venta=date('Y-m-d', time());

$estadorealizadoparaelcliente =array('estado' => "realizado", 'tipo_venta' => "Cliente", 'Fecha' =>$Fecha_venta, 
'Hora' => date('g:i:s a', strtotime($Hora_de_venta)));


$this->db->where("mesa",$mesa);
$this->db->where("num_cliente",$numerodecliente);
            $this->db->where("estado","enturno");

   $this->db->update("descripcion_de_venta",$estadorealizadoparaelcliente);


}

public function cobraracliente($totalpagoycambio, $mesa){
$idnull=$this->consultamenu->obteneridnull($mesa);
$this->db->where("id_venta",$idnull['id_venta']);

   $this->db->update("venta",$totalpagoycambio);

}

public function actualizarnuevoidventaenlatabladescripciondeventa($mesa){
    $idnull=$this->consultamenu->revisarelidventaenturno();
    $id_enturno=$this->consultamenu->obtenerid_enturno($mesa);

$nuevoid =array('id_venta' => $idnull['id_venta']);

$this->db->where("id_venta",$id_enturno['id_venta']);
$this->db->where("mesa",$mesa);
            $this->db->where("estado","enturno");
   $this->db->update("descripcion_de_venta",$nuevoid);
}


   public function obtenernumerodeclientes($mesa){
    $idnull=$this->consultamenu->obteneridnull($mesa);

        $this->db->distinct();
           $this->db->select("numero_de_clientes");
    $this->db->from("descripcion_de_venta");
    $this->db->where("mesa",$mesa);
            $this->db->where("estado","enturno");
               $this->db->where("id_venta",$idnull['id_venta']);
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
   return $resultados->row_array();
    }


     public function sumadeimportesenlatabladescripciondeventasegunelnumerodecliente($mesa, $numerodeclientes){
 
        $numerodecliente=$this->consultamenu->obtenernumerodeclientes($mesa);
$idnull=$this->consultamenu->obteneridnull($mesa);
if($numerodeclientes){
    $numerodeclientefinal=$numerodeclientes;
       }
    else{
       $numerodeclientefinal= $numerodecliente['numero_de_clientes'];
           }
                              $cliente=1;
                                      $clientes="";

                                      for($a=0; $a<$numerodeclientefinal; $a++){
                                    
                                      $array[]=$cliente;
                                       
                                        $cliente++;
                                      };
                                


        $this->db->select_sum("importe");
        $this->db->select("num_cliente");
        $this->db->from("descripcion_de_venta");
            $this->db->where("mesa",$mesa);
            $this->db->where("estado","enturno");

               $this->db->where_in("num_cliente", array_values($array));
                
               $this->db->where("id_venta", $idnull['id_venta']);
                $this->db->group_by('num_cliente');
             $resultado = $this->db->get();
             return $resultado->result();
    }



public function cancelarmesa($mesa, $cancelarmesa){
    $this->db->where("mesa",$mesa);
    $this->db->where("estado", "enturno");
   $this->db->update("descripcion_de_venta",$cancelarmesa);
}

public function definirtotalporcancelaciondemesa($totalporcancelarmesa, $idnull){
     $this->db->where("id_venta",$idnull);
   $this->db->update("venta",$totalporcancelarmesa);

}

public function definirtotalpagoycambioen0($idacancelar, $ventacancelada){
  $this->db->where("id_venta",$idacancelar);
   $this->db->update("venta",$ventacancelada);

}

//obtener el id apartir de las comidas bebidas o extras cancelados
public function obtenerelidapartirdelaultimacomidacancelada($id_comida, $precio_comida){
//EL ID A CANCELAR SE OBTIENE MEDIANTE LAS CONDICIONES, Y LAS MÁS IMPORTANTES DONDE SE CONSULTA A LOS VALORES EN ESTADO NULL
 $this->db->select("venta.id_venta");
    $this->db->from("venta");
    $this->db->join("descripcion_de_venta","venta.id_venta=descripcion_de_venta.id_venta");
    $this->db->where("id_comida", $id_comida);
        $this->db->where("precio_unitario", $precio_comida);
        $this->db->where("estado", "cancelado");
   $this->db->where("venta.total IS NULL");
   $this->db->where("venta.pago IS NULL");
   $this->db->where("venta.cambio IS NULL");
    
    $resultados = $this->db->get();
    return $resultados->row_array();
}

public function obtenerelidapartirdelaultimabebidacancelada($id_bebida, $precio_bebida){
//EL ID A CANCELAR SE OBTIENE MEDIANTE LAS CONDICIONES, Y LAS MÁS IMPORTANTES DONDE SE CONSULTA A LOS VALORES EN ESTADO NULL
 $this->db->select("venta.id_venta");
    $this->db->from("venta");
    $this->db->join("descripcion_de_venta","venta.id_venta=descripcion_de_venta.id_venta");
    $this->db->where("id_bebida", $id_bebida);
        $this->db->where("precio_unitario", $precio_bebida);
        $this->db->where("estado", "cancelado");
   $this->db->where("venta.total IS NULL");
   $this->db->where("venta.pago IS NULL");
   $this->db->where("venta.cambio IS NULL");
    
    $resultados = $this->db->get();
    return $resultados->row_array();
}
public function obtenerelidapartirdelaultimaextracancelado($id_extra, $precio_extra){
    //EL ID A CANCELAR SE OBTIENE MEDIANTE LAS CONDICIONES, Y LAS MÁS IMPORTANTES DONDE SE CONSULTA A LOS VALORES EN ESTADO NULL
 $this->db->select("venta.id_venta");
    $this->db->from("venta");
    $this->db->join("descripcion_de_venta","venta.id_venta=descripcion_de_venta.id_venta");
    $this->db->where("id_extra", $id_extra);
        $this->db->where("precio_unitario", $precio_extra);
        $this->db->where("estado", "cancelado");
   $this->db->where("venta.total IS NULL");
   $this->db->where("venta.pago IS NULL");
   $this->db->where("venta.cambio IS NULL");
    
    $resultados = $this->db->get();
    return $resultados->row_array();
}//obtener el id apartir de las comidas bebidas o extras cancelados



public function validarcodigodecancelacion($codigodecancelacion){
    $this->db->select("password");
         $this->db->from("usuarios");
        $this->db->where("password", $codigodecancelacion);
 $resultado = $this->db->get();
             return $resultado->row_array();
}

public function cancelacioncomida($id_comida, $precio_comida, $cancelaciondeproducto, $cliente){
$this->db->where("precio_unitario",$precio_comida);
  $this->db->where("id_comida",$id_comida);
  $this->db->where("num_cliente",$cliente);
   $this->db->update("descripcion_de_venta",$cancelaciondeproducto);

}

public function cancelacionbebida($id_bebida, $precio_bebida, $cancelaciondeproducto, $cliente){
    $this->db->where("precio_unitario",$precio_bebida);
  $this->db->where("id_bebida",$id_bebida);
  $this->db->where("num_cliente",$cliente);
   $this->db->update("descripcion_de_venta",$cancelaciondeproducto);

}

public function cancelacionextra($id_extra, $precio_extra, $cancelaciondeproducto, $cliente){
    $this->db->where("precio_unitario",$precio_extra);
  $this->db->where("id_extra",$id_extra);
  $this->db->where("num_cliente",$cliente);
   $this->db->update("descripcion_de_venta",$cancelaciondeproducto);

}

 //´PARA MOSTRAR UNA DESCRIPCION DE COMIDA BEBIDAS Y EXTRAS POR CLIENTE
 public function detalledeventadiariocomida($clienteenturno, $numerodemesa){
       $this->db->select("categoria.nombre_de_categoria, cantidad, precio_unitario, importe");
    $this->db->from("descripcion_de_venta");
    $this->db->join("categoria","descripcion_de_venta.id_comida=categoria.id_comida");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","enturno");
    $this->db->where("num_cliente", $clienteenturno);
   // $this->db->where("id_comida IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }

     public function detalledeventadiariobebida($clienteenturno, $numerodemesa){
        $this->db->select("bebidas.nombre_bebida, cantidad, precio_unitario, importe");
    $this->db->from("descripcion_de_venta");
 $this->db->join("bebidas","descripcion_de_venta.id_bebida=bebidas.id_bebida");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","enturno");
        $this->db->where("num_cliente", $clienteenturno);
    //$this->db->where("id_bebida IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }

        public function detalledeventadiarioextras($clienteenturno, $numerodemesa){
        $this->db->select("extras.nombre, cantidad, precio_unitario, importe");
    $this->db->from("descripcion_de_venta");
     $this->db->join("extras","descripcion_de_venta.id_extra=extras.id_extra");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","enturno");
        $this->db->where("num_cliente", $clienteenturno );
    //$this->db->where("id_extra IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }
     //´PARA MOSTRAR UNA DESCRIPCION DE COMIDA BEBIDAS Y EXTRAS POR CLIENTE


 //´PARA MOSTRAR UNA DESCRIPCION DE COMIDA BEBIDAS Y EXTRAS POR MESA
 public function detalledeventadiariocomidapormesa($numerodemesa){
       $this->db->select("categoria.nombre_de_categoria, cantidad, precio_unitario, importe, descripcion_de_venta.id_comida, descripcion_de_venta.num_cliente");
    $this->db->from("descripcion_de_venta");
    $this->db->join("categoria","descripcion_de_venta.id_comida=categoria.id_comida");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","enturno");
   // $this->db->where("id_comida IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }

     public function detalledeventadiariobebidapormesa($numerodemesa){
        $this->db->select("bebidas.nombre_bebida, cantidad, precio_unitario, importe, descripcion_de_venta.id_bebida, descripcion_de_venta.num_cliente");
    $this->db->from("descripcion_de_venta");
 $this->db->join("bebidas","descripcion_de_venta.id_bebida=bebidas.id_bebida");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","enturno");
    //$this->db->where("id_bebida IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }

        public function detalledeventadiarioextraspormesa($numerodemesa){
        $this->db->select("extras.nombre, cantidad, precio_unitario, importe, descripcion_de_venta.id_extra, descripcion_de_venta.num_cliente");
    $this->db->from("descripcion_de_venta");
     $this->db->join("extras","descripcion_de_venta.id_extra=extras.id_extra");
    $this->db->where("mesa", $numerodemesa);
    $this->db->where("estado","enturno");
    //$this->db->where("id_extra IS NOT NULL");
    
    $resultados = $this->db->get();
    return $resultados->result();
    }
     //´PARA MOSTRAR UNA DESCRIPCION DE COMIDA BEBIDAS Y EXTRAS POR MESA


    public function versilamesaestadisponible($estadoenturno){
        $this->db->distinct();
           $this->db->select("mesa, numero_de_clientes");
    $this->db->from("descripcion_de_venta");
    $this->db->where("estado",$estadoenturno);
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
   return $resultados->result();
    }

//EL MENU
    public function getmenu(){
                $this->db->distinct();
        $this->db->select("nombre_de_categoria, id_comida");
    $this->db->from("categoria");
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->result();
    }
       public function extras(){
            $this->db->select("nombre, id_extra, precio");
    $this->db->from("extras");
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->result();
}
public function bebidas(){
            $this->db->select("nombre_bebida, id_bebida, precio_bebida");
    $this->db->from("bebidas");
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->result();
}
//EL MENU

//PRECIOS DE LAS DIVERSAS CATEGORIAS DE COMIDA
    public function preciotacos(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("categoria");
        $this->db->where("nombre_de_categoria", "Tacos");
 $resultado = $this->db->get();
             return $resultado->row();
        }
           public function precioquekas(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("categoria");
        $this->db->where("nombre_de_categoria", "Quekas");
 $resultado = $this->db->get();
             return $resultado->row();
        }
           public function precioalhorno(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("categoria");
        $this->db->where("nombre_de_categoria", "Al horno");
 $resultado = $this->db->get();
             return $resultado->row();
        }
           public function preciomulas(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("categoria");
        $this->db->where("nombre_de_categoria", "Mulas");
 $resultado = $this->db->get();
             return $resultado->row();
        }
           public function precioburritos(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("categoria");
        $this->db->where("nombre_de_categoria", "Burritos");
 $resultado = $this->db->get();
             return $resultado->row();
        }
        //PRECIOS DE LAS DIVERSAS CATEGORIAS DE COMIDA

//PRECIOS DE LAS DIVERSAS CATEGORIAS DE BEBIDAS
         public function precioaguanatural(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("bebidas");
        $this->db->where("nombre_bebida", "Agua Natural 1 lt.");
 $resultado = $this->db->get();
             return $resultado->row();
        }         public function preciocerveza(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("bebidas");
        $this->db->where("nombre_bebida", "Cerveza coronoa o victoria 355ml.");
 $resultado = $this->db->get();
             return $resultado->row();
        }         public function preciochesco(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("bebidas");
        $this->db->where("nombre_bebida", "Chesco 1/2 lt.");
 $resultado = $this->db->get();
             return $resultado->row();
        }         public function precioaguadeldia(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("bebidas");
        $this->db->where("nombre_bebida", "Agua del día 1 lt.");
 $resultado = $this->db->get();
             return $resultado->row();
        }         public function preciomediaaguadeldia(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("bebidas");
        $this->db->where("nombre_bebida", "Agua del día 1/2 lt.");
 $resultado = $this->db->get();
             return $resultado->row();
        }
 //PRECIOS DE LAS DIVERSAS CATEGORIAS DE BEBIDAS

//PRECIOS DE LAS DIVERSAS CATEGORIAS DE EXTRAS
         public function precioguacamole(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("extras");
        $this->db->where("nombre", "Orden de guacamole");
 $resultado = $this->db->get();
             return $resultado->row();
        }         public function preciobirria(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("extras");
        $this->db->where("nombre", "Birria");
 $resultado = $this->db->get();
             return $resultado->row();
        }         public function preciomediabirria(){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
         $this->db->select();
         $this->db->from("extras");
        $this->db->where("nombre", "Media birria");
 $resultado = $this->db->get();
             return $resultado->row();
        }         
 //PRECIOS DE LAS DIVERSAS CATEGORIAS DE EXTRAS





   


    public function Getpreciosextras($id){ //OBTIENE LOS PRESCIOS DEL TIPO DE COMIDA QUE HAYA SELECCIONADO
        $this->db->where("id_extra",$id);
 $resultado = $this->db->get("extras");
             return $resultado->row();
        }

public function revisarelidventaenturno(){//OBTENER EL MAYOR ID_VENTA
 $this->db->select_max("id_venta");
 $this->db->from("venta");
 $idventaenturno = $this->db->get();
    return $idventaenturno->row_array();
}


public function obtenerelestadodelidventaenturno($idventaenturno){//OBTIENE EL estado DE LA TABLA VENTA, CON UN ID EN ESPECIFICO, EN ESTE CASO EL ID MAXIMO, PARA SABER SI DICHO ID_vENTA YA FUE COMPLETADO, CANCELADO O SIGUE ENTURNO
     $this->db->select("estado");
    $this->db->from("descripcion_de_venta");
    $this->db->where("id_venta",$idventaenturno);
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->row_array();

}
public function obtenerelnumerodemesadependiendoelidventa($idventa, $estadoenturno){//OBTIENE EL NUMERO DE MESA EN BASE AL ID MAXIMO PARA SABER SI COINCIDE CON EL NUMERO DE MESA AL CUAL QUEREMOS INSERTAR, DE LO CONTRARIO DE PASA AL METODO DE ABAJO
   $this->db->select("mesa");
    $this->db->from("descripcion_de_venta");
    $this->db->where("id_venta",$idventa);
    $this->db->where("estado",$estadoenturno);
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->row_array();
}

public function verificar_queno_haya_un_id_venta_ya_conmesa_asignada($mesa, $estadoenturno){//SI BIEN, CON EL METODO ANTERIOR NO COINCIDIO LA MESA DEL ID MAXIMO, CON LA MESA ACTUAL A AGREGAR PRODUCTOS, COMIDA, ETC, PUES SE BUSCA UN ID_vENTA QUE COINCIDA DON EL NUMERO DE MESA Y EL ESTAOD EN TURNO
   $this->db->select("id_venta");
    $this->db->from("descripcion_de_venta");
    $this->db->where("mesa",$mesa);
       $this->db->where("estado",$estadoenturno);
     // $this->db->where("Cantidad !=0");
    $resultados = $this->db->get();
    return $resultados->row_array();
}

public function agregaralatablaventasoloelid($datosdelatablaventa){//AGREGA UN USUARIO A AL TABLA VENTA, ESTO CON EL FIN QUE SE AGREGUE UN NUEVO ID VENTA
         return $this->db->insert("venta",$datosdelatablaventa);
    }

//para la comida
public function actualizarcantidaddecomida($id_comida, $precio, $nuevacantidad, $enturno, $mesa, $clienteenturno){

ini_set('date.timezone', 'America/Mexico_City');
 $Hora_de_venta=date('H:i:s', time());
 date('g:i:s a', strtotime($Hora_de_venta));
$Fecha_venta=date('Y-m-d', time());

 $cantidadbase=
 $this->solosumarlacantidadsielproductoyaseencuentragregadoencomida($id_comida, $precio, $mesa, $clienteenturno);

 $precio_unitario=$this->solosumarlacantidadsielproductoyaseencuentragregadoencomida($id_comida, $precio, $mesa, $clienteenturno);

 $cantidadfinal=$nuevacantidad+$cantidadbase['cantidad'];
 $importefinal=$cantidadfinal*$precio_unitario['precio_unitario'];

 $dataparaupdateaestadorealizado =array('cantidad' => $cantidadfinal, 'importe' => $importefinal, 'Fecha' =>$Fecha_venta, 
  'Hora' =>date('g:i:s a', strtotime($Hora_de_venta)));

 $this->db->where("precio_unitario",$precio);
  $this->db->where("id_comida",$id_comida);
  $this->db->where("mesa",$mesa);
  $this->db->where("num_cliente",$clienteenturno);
   $this->db->update("descripcion_de_venta",$dataparaupdateaestadorealizado);

}
   public function solosumarlacantidadsielproductoyaseencuentragregadoencomida($id_comida, $precio, $mesa, $num_cliente){
 $this->db->select("cantidad, precio_unitario, num_cliente");
 $this->db->where("id_comida",$id_comida);
 $this->db->where("precio_unitario",$precio);
 $this->db->where("estado","enturno");
 $this->db->where("mesa",$mesa);
 $this->db->where("num_cliente", $num_cliente);
 $this->db->from("descripcion_de_venta");
 $idventaenturno = $this->db->get();
    return $idventaenturno->row_array();

   }
   //para la comida


   //para la bebida

public function actualizarcantidaddebebida($id_bebida, 
    $preciobebida, $nuevacantidad, $enturno, $mesa, $clienteenturno){

ini_set('date.timezone', 'America/Mexico_City');
 $Hora_de_venta=date('H:i:s', time());
 date('g:i:s a', strtotime($Hora_de_venta));
$Fecha_venta=date('Y-m-d', time());

 $cantidadbase=
 $this->solosumarlacantidadsielproductoyaseencuentragregadoenbebida($id_bebida, $preciobebida, $mesa, $clienteenturno);

 $precio_unitario=$this->solosumarlacantidadsielproductoyaseencuentragregadoenbebida($id_bebida, $preciobebida, $mesa, $clienteenturno);

 $cantidadfinal=$nuevacantidad+$cantidadbase['cantidad'];
 $importefinal=$cantidadfinal*$precio_unitario['precio_unitario'];

 $dataparaupdateaestadorealizado =array('cantidad' => $cantidadfinal, 'importe' => $importefinal, 'Fecha' =>$Fecha_venta, 
  'Hora' =>date('g:i:s a', strtotime($Hora_de_venta)));

 $this->db->where("precio_unitario",$preciobebida);
  $this->db->where("id_bebida",$id_bebida);
  $this->db->where("mesa",$mesa);
  $this->db->where("estado",$enturno);
  $this->db->where("num_cliente",$clienteenturno);
   $this->db->update("descripcion_de_venta",$dataparaupdateaestadorealizado);

}
   public function solosumarlacantidadsielproductoyaseencuentragregadoenbebida($id_bebida, $preciobebida, $mesa, $num_cliente){
 $this->db->select("cantidad, precio_unitario, num_cliente");
 $this->db->where("id_bebida",$id_bebida);
 $this->db->where("precio_unitario",$preciobebida);
 $this->db->where("estado","enturno");
 $this->db->where("mesa", $mesa);
 $this->db->where("num_cliente", $num_cliente);
 $this->db->from("descripcion_de_venta");
 $idventaenturno = $this->db->get();
    return $idventaenturno->row_array();

   }

   //para la bebida



   //para el extra

public function actualizarcantidaddeextra($id_extra, $precioextra, $nuevacantidad, $enturno, $mesa, $clienteenturno){

ini_set('date.timezone', 'America/Mexico_City');
 $Hora_de_venta=date('H:i:s', time());
 date('g:i:s a', strtotime($Hora_de_venta));
$Fecha_venta=date('Y-m-d', time());

 $cantidadbase=
 $this->solosumarlacantidadsielproductoyaseencuentragregadoenextra($id_extra, $precioextra, $mesa, $clienteenturno);

 $precio_unitario=$this->solosumarlacantidadsielproductoyaseencuentragregadoenextra($id_extra, $precioextra, $mesa, $clienteenturno);

 $cantidadfinal=$nuevacantidad+$cantidadbase['cantidad'];
 $importefinal=$cantidadfinal*$precio_unitario['precio_unitario'];

 $dataparaupdateaestadorealizado =array('cantidad' => $cantidadfinal, 'importe' => $importefinal, 'Fecha' =>$Fecha_venta, 
  'Hora' =>date('g:i:s a', strtotime($Hora_de_venta)));

 $this->db->where("precio_unitario",$precioextra);
  $this->db->where("id_extra",$id_extra);
  $this->db->where("mesa",$mesa);
  $this->db->where("estado",$enturno);
  $this->db->where("num_cliente",$clienteenturno);
   $this->db->update("descripcion_de_venta",$dataparaupdateaestadorealizado);

}
   public function solosumarlacantidadsielproductoyaseencuentragregadoenextra($id_extra, $precioextra, $mesa, $num_cliente){
 $this->db->select("cantidad, precio_unitario, num_cliente");
 $this->db->where("id_extra",$id_extra);
 $this->db->where("precio_unitario",$precioextra);
 $this->db->where("estado","enturno");
 $this->db->where("mesa",$mesa);
 $this->db->where("num_cliente", $num_cliente);
 $this->db->from("descripcion_de_venta");
 $idventaenturno = $this->db->get();
    return $idventaenturno->row_array();

   }

   //para el extra
    


    public function agregaralatabladescripciondeventa($datosdelatabladescripciondeventa){
        //ESTO AGREGA A LA TABLA DESCRIPCION DE VENTA LOS VALORES ESPECIFICOS
        return $this->db->insert("descripcion_de_venta",$datosdelatabladescripciondeventa);
    }

    public function agregarlasbebidasalatabladescripciondeventa($datosdelatabladescripciondeventa){
        //ESTO AGREGA A LA TABLA DESCRIPCION DE VENTA LOS VALORES ESPECIFICOS
        return $this->db->insert("descripcion_de_venta",$datosdelatabladescripciondeventa);
    }
    public function agregarlosextrasalatabladescripciondeventa($datosdelatabladescripciondeventa){
        //ESTO AGREGA A LA TABLA DESCRIPCION DE VENTA LOS VALORES ESPECIFICOS
        return $this->db->insert("descripcion_de_venta",$datosdelatabladescripciondeventa);
    }

    public function secompletolaventa($idmaximo){
         $this->db->where("id_venta",$idmaximo);
             $resultado = $this->db->get("venta");
             return $resultado->row_array();
    }

    public function sumadeimportesenlatabladescripciondeventasegunelnumerodemesa($mesa, $estadoenturno){
        $this->db->select_sum("importe");
            $this->db->where("mesa",$mesa);
            $this->db->where("estado",$estadoenturno);
             $resultado = $this->db->get("descripcion_de_venta");
             return $resultado->row();
    }

 


    public function cerrarventapormesaenlatablaventa($idventadefinitivo, $datosparaelupdatetablaventa){
        $this->db->where("id_venta",$idventadefinitivo);
       $this->db->update("venta",$datosparaelupdatetablaventa);
// es update, no insert
    }

    public function agregarestadorealizadoalatabladescripciondeventa($idventadefinitivo, $dataparaupdateaestadorealizado){
             $this->db->where("id_venta",$idventadefinitivo);
             $this->db->where("estado","enturno");
       $this->db->update("descripcion_de_venta",$dataparaupdateaestadorealizado);
    }
    public function cerrarventaporclienteenlatabladescripcionventa($idventadefinitivo, $mesa, $clienteenturno, $data){
        $this->db->where("id_venta",$idventadefinitivo);
        $this->db->where("mesa",$mesa);
                $this->db->where("num_cliente",$clienteenturno);
       $this->db->update("descripcion_de_venta",$data);

    }
    

   
}
