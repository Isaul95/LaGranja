<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_DocumentosDeAlumnos extends CI_Model { // INICIO DEL MODELO


/* -------------------------------------------------------------------------- */
/*                        Lista datos Gral. del Alumno                        */
/* -------------------------------------------------------------------------- */

public function obtenerDatosGnralDelAlumnos($semestre,$licenciatura,$opciones){
    $this->db->distinct();
    $this->db->select("alumnos.numero_control as numero_control, concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno)
    as alumno, detalles.cuatrimestre as semestre, carrera.carrera_descripcion as carrera_descripcion, carrera.id_carrera, calf.detalle, detalles.opcion, detalles.carrera, detalles.promedio, detalles.promedio_letra, detalles.fecha_letra ");
    $this->db->from("alumnos");
    $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
    $this->db->join(" calificaciones calf "," detalles.id_detalle = calf.detalle ");
    $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
    $this->db->where_in('alumnos.estatus', ['0','1']);
    $this->db->where("detalles.cuatrimestre =", $semestre);
    $this->db->where("detalles.carrera =", $licenciatura);
    $this->db->where("detalles.opcion =", $opciones);
    $resultados = $this->db->get();
    return $resultados->result();
    }



    public function insertDatosLetraConstancia($data){
          return $this->db->update('detalles', $data, array('id_detalle' => $data['id_detalle']));
      }



  } // FIN / CIERRE DEL MODELO
