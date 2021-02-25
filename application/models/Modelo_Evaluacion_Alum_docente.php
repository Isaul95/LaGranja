<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_Evaluacion_Alum_docente extends CI_Model {


  public function consultaDatosDelAlumno($numero_control){
      $this->db->distinct();
      $this->db->select(" alumnos.numero_control as numero_control,
concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as nombre_completo,
detalles.cuatrimestre as semestre, carrera.carrera_descripcion as carrera_descripcion, carrera.id_carrera,
detalles.id_detalle, detalles.opcion , opc.descripcion ");
      $this->db->from("alumnos");
      $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
      $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
      $this->db->join(" opciones opc "," opc.id_opcion = detalles.opcion ");
      $this->db->where_in('detalles.estado', ['En_curso','Inicio_inscripcion']);
      $this->db->where("alumnos.numero_control",$numero_control);
      $resultados = $this->db->get();
      return $resultados->result();
      }


//
//   public function insert_RespuestasEvaluacionAlumnoA_docente($data){
// return $this->db->query('update encuesta_alumnoaprofe set valor = valor + 1 where id_encuesta_Alum  =?',$data);
//             }


public function insert_RespuestasEvaluacionAlumnoA_docente($data){
          return $this->db->insert('detalle_respuestas_eval_alumno_a_profe', $data);
      }


//   public function insert_RespuestasEvaluacionAlumnoA_docente($data){
//     return $this->db->update('encuesta_alumnoaprofe', $data, array('id_encuesta_Alum' => $data['id_encuesta_Alum']));
// }

        //   public function updateStatusDetalles($numero_control, $data3){
        // $this->db->where("alumno",$numero_control);
        //  return $this->db->update("encuesta_alumnoaprofe", $data3);
        // }




  }
