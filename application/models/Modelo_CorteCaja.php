<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_CorteCaja extends CI_Model {


  public function insert_entryCaja($data_cortes){
        return $this->db->insert('cortes', $data_cortes);
      }



  public function insert_en_Utilidades($datas_utilidad){
        return $this->db->insert('utilidad', $datas_utilidad);
      }


//
//   public function obtenerDatosDelAlumnoProcFin($numero_control){
//       $this->db->distinct();
//       $this->db->select(" alumnos.numero_control as numero_control,
// concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as nombre_completo,
// detalles.cuatrimestre as semestre, carrera.carrera_descripcion as carrera_descripcion, carrera.id_carrera,
// detalles.id_detalle, detalles.opcion , opc.descripcion ");
//       $this->db->from("alumnos");
//       $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
//       $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
//       $this->db->join(" opciones opc "," opc.id_opcion = detalles.opcion ");
//       // $this->db->where_in('detalles.estado', ['En_curso','Inicio_inscripcion']);
//       $this->db->where("alumnos.numero_control",$numero_control);
//       $resultados = $this->db->get();
//       return $resultados->result();
//       }
//


      // public function insert_OficioPracticasProf($data){
      //         return $this->db->insert('oficios_procesofin', $data);
      //     }


//
// //  Servicio_social
//     public function opcionSubirOfiServiSocial($numero_control){
//           $this->db->select("servicio_social");
//           $this->db->from("alumnos");
//           $this->db->where("numero_control",$numero_control);
//           $this->db->where("servicio_social","1");
//           $resultados = $this->db->get();
//           return $resultados->result();
//       }



//  OBTERNER UNA RESPUSTA SI O NO YA EXISTE APERTURA
//     public function obtenerAperturaDelDiaZXSAW($fecha){
//         // if ($tabla == "alta_baucher_banco") {
//           $this->db->select("id_apertura, monto");
//           $this->db->from("apertura");
//           $this->db->where("fecha",$fecha); /* SELECT SUM(`total`) FROM `venta` */
// //        $this->db->where("numero_control",$numero_control);
//         // }
//       // $resultados = $this->db->get($tabla);
//       // return $resultados->num_rows();
//       $resultados = $this->db->get();
//       return $resultados->result();
//     }





//  Tabla Gral de cortes de pagos
    public function obtenerAperturaDelDia($fecha){
      $this->db->select("ap.id_apertura, ap.monto, cor.id_corte, cor.monto_entregado, cor.gastos, cor.ventas, cor.diferencia, cor.fecha, cor.usuario");
      $this->db->from(" apertura ap");
      $this->db->join(" cortes cor "," cor.id_apertura = ap.id_apertura ", "LEFT");
      $this->db->where(" ap.fecha =",$fecha);
      $resultados = $this->db->get();
       return $resultados->result();
     }




//  CONSULTA SUMA TOTAL DE LOS GASTOS DEL DIA
     public function consultaTotalGastosDelDia($fechaActualHoy){
           $this->db->select("SUM(total) as gastoTotal");
           $this->db->from("egreso");
           $this->db->where("fecha",$fechaActualHoy);
              $resultados = $this->db->get();
              return $resultados->result();
     }


//  CONSULTA SUMA TOTAL DE LOS PAGOS REALIZADOS DEL DIA   => Estado_venta = Credito-pagado
      public function consultaTotalDePagosHechosDelDia($fechaActualHoy){
            $this->db->select(" SUM(total) as pagosTotal ");
            $this->db->from(" venta ");
              $this->db->where(" estado_venta ", 'Credito-pagado');
              $this->db->where(" fecha_reporte ",$fechaActualHoy);
                $resultados = $this->db->get();
                return $resultados->result();
      }




  //  CONSULTA SUMA TOTAL DE LAS VENTAS REALIZADOS DEL DIA   => Estado_venta = Realizada
        public function consultaTotalDeAllVentasHechosDelDia($fechaActualHoy){
              $this->db->select(" SUM(total) as totalVentasDelDiaHoy ");
              $this->db->from(" venta ");
                $this->db->where(" estado_venta ", 'Realizada');
                $this->db->where(" fecha_reporte ",$fechaActualHoy);
                  $resultados = $this->db->get();
                  return $resultados->result();
        }

//     ResultSet  rs = sent.executeQuery("select SUM(total) from venta where estado_venta not in ('Cancelada') and fecha_reporte=
//     '"+Controladorventa.fecha()+"' ");


  //  CONSULTA NUMERO_TOTAL DE DESCUENTSO Y LA SUM_DESCUENTOS DEL DIA HOY
        public function consultaTotalDeDescuentosHechosDelDia($fechaActualHoy){
              $this->db->select(" COUNT(descuento) as num_Descuentos, SUM(descuento) as sum_Descuentos ");
              $this->db->from(" venta ");
                $this->db->where(" estado_venta ", 'Realizada');
                $this->db->where(" descuento != 0 ");       // ==>  descuento!=0
                $this->db->where(" fecha_reporte ",$fechaActualHoy);
                  $resultados = $this->db->get();
                  return $resultados->result();
        }



  //  CONSULTA SUMA TOTAL DE PROCESADOS DEL DIA
       public function consultaTotalProcesadosDelDia(){
             $this->db->select("SUM(total) as totalProcesados");
             $this->db->from("procesados");
                $resultados = $this->db->get();
                return $resultados->result();
       }


 //  CONSULTA SUMA TOTAL DE DEVOLUCION DE CRUDO DEL DIA
      public function consultaTotalDevolucionCrudoDelDia(){
            $this->db->select("SUM(total) as totalDevCrudo");
            $this->db->from("devolucion_crudo");
               $resultados = $this->db->get();
               return $resultados->result();
      }





  //  CONSULTAR ALL PRODUCTOS CRUDOS VENDIDOS DEL DIA
      public function obtenerProductosCrudosVendidosDelDia(){
        $this->db->select("  nombre_producto ");
        $this->db->from(" productos ");
        $this->db->where_in(' id_producto ', ['14','15','16','17','18','19','20','21','22','23','57','59']);
         // $this->db->order_by('pollo crudo', 'Medio pollo', 'Pechuga', 'Pechuga en bisteck', 'Muslo', 'Pierna', 'Ala', 'Huacal', 'Cadera', 'Cabeza', 'Molleja', 'Patas');
        $this->db->order_by('FIELD (nombre_producto, "pollo crudo", "Medio pollo", "Pechuga", "Pechuga en bisteck", "Muslo", "Pierna", "Ala", "Huacal", "Cadera", "Cabeza", "Molleja", "Patas" )');

    // $this->db->order_by ( 'FIELD (productos.nombre_producto, 2, 0, 1)' );

        $resultados = $this->db->get();
         return $resultados->result();
       }


  }  // FIN DE LA CLASE MODELO
