<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_ProcesoFinal extends CI_Model {


  public function obtenerDatosDelAlumnoProcFin($numero_control){
      $this->db->distinct();
      $this->db->select(" alumnos.numero_control as numero_control,
concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as nombre_completo,
detalles.cuatrimestre as semestre, carrera.carrera_descripcion as carrera_descripcion, carrera.id_carrera,
detalles.id_detalle, detalles.opcion , opc.descripcion ");
      $this->db->from("alumnos");
      $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
      $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
      $this->db->join(" opciones opc "," opc.id_opcion = detalles.opcion ");
      // $this->db->where_in('detalles.estado', ['En_curso','Inicio_inscripcion']);
      $this->db->where("alumnos.numero_control",$numero_control);
      $resultados = $this->db->get();
      return $resultados->result();
      }



/* -------------------------------------------------------------------------- */
/*                       INSERTAR OFICIO DE PRACTOCAS                         */
/* -------------------------------------------------------------------------- */
      public function insert_OficioPracticasProf($data){
              return $this->db->insert('oficios_procesofin', $data);
          }



//  Servicio_social
    public function opcionSubirOfiServiSocial($numero_control){
          $this->db->select("servicio_social");
          $this->db->from("alumnos");
          $this->db->where("numero_control",$numero_control);
          $this->db->where("servicio_social","1");
          $resultados = $this->db->get();
          return $resultados->result();
      }


      //  Practicas_profesionale
    public function opcionSubirOfiPracticasProf($numero_control){
          $this->db->select("practicas_prof");
          $this->db->from("alumnos");
          $this->db->where("numero_control",$numero_control);
          $this->db->where("practicas_prof","1");
          $resultados = $this->db->get();
          return $resultados->result();
      }



      //  TITULACION
      public function opcionSubirOfiTitulacion($numero_control){
            $this->db->select("titulacion");
            $this->db->from("alumnos");
            $this->db->where("numero_control",$numero_control);
            $this->db->where("titulacion","1");
            $resultados = $this->db->get();
            return $resultados->result();
        }


  }  // FIN DE LA CLASE MODELO
