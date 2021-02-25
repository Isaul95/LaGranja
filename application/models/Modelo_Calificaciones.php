<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_calificaciones extends CI_Model { // INICIO DEL MODELO


      	/* -------------------------------------------------------------------------- */
      	/*                                Fetch Records                               */
      	/* -------------------------------------------------------------------------- */
 
        public function obtenermaterias($carrera,$opcion,$semestre,$profesor,$ciclo){
            $this->db->distinct();
            $this->db->select("hp.materia,m.nombre_materia");
            $this->db->from("horarios_profesor hp");
            $this->db->join("profesores p","hp.profesor = p.id_profesores");
            $this->db->join("materias m","hp.materia = m.id_materia");
            $this->db->where("hp.licenciatura", $carrera);
            $this->db->where("hp.opcion_estudio", $opcion);
            $this->db->where("hp.profesor", $profesor);
            $this->db->where("hp.semestre", $semestre);
            $this->db->where("hp.ciclo", $ciclo);
            
            $resultados = $this->db->get();
            return $resultados->result();
            }
            public function obtenercarreras(){
              $this->db->distinct();
              $this->db->select("id_carrera,carrera_descripcion");
              $this->db->from("carrera");
              $resultados = $this->db->get();
              return $resultados->result();
              }
              public function obteneropciones(){
                $this->db->distinct();
                $this->db->select("id_opcion,descripcion");
                $this->db->from("opciones");
                $resultados = $this->db->get();
                return $resultados->result();
                }
        public function alumnos_asignados_a_la_materia_del_profesor($materia,$ciclo,$profesor){
                $this->db->distinct();
                $this->db->select("detalles.id_detalle as id_detalle,alumnos.numero_control as numero_control, 
                concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as alumno, 
                detalles.cuatrimestre as cuatrimestre, carrera.carrera_descripcion as carrera_descripcion,
                calificaciones.calificacion as calificacion, calificaciones.tiempo_extension as tiempo_extension");
                $this->db->from("alumnos");
                $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
                $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
                $this->db->join("calificaciones","detalles.id_detalle = calificaciones.detalle");
                $this->db->where("alumnos.estatus", "1");
                $this->db->where("calificaciones.materia", $materia);
                $this->db->where("calificaciones.ciclo", $ciclo);
                $this->db->where("calificaciones.profesor", $profesor);
                $resultados = $this->db->get();
                return $resultados->result();
                }

                public function alumnos_asignados_a_la_carrera_y_opcion_administrativo($carrera,$opcion,$cuatrimestre){
                  $this->db->distinct();
                  $this->db->select("detalles.id_detalle as id_detalle,alumnos.numero_control as numero_control, 
                  concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as alumno, 
                  detalles.cuatrimestre as cuatrimestre, carrera.carrera_descripcion as carrera_descripcion");
                  $this->db->from("alumnos");
                  $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
                  $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
                  $this->db->where("alumnos.estatus", "1");
                  $this->db->where("detalles.carrera", $carrera);
                  $this->db->where("detalles.opcion", $opcion);
                  $this->db->where("detalles.cuatrimestre", $cuatrimestre);
                  $resultados = $this->db->get();
                  return $resultados->result();
                  }
                  public function updatecalificacion($materia,$id_detalle,$ciclo,$profesor,$data){
                    return $this->db->update('calificaciones', $data, array('materia' => $materia,'detalle'=> $id_detalle,'ciclo'=> $ciclo,'profesor'=> $profesor));
                }
                public function single_entry($id_detalle,$materia,$ciclo,$profesor)
                {
                  $this->db->select('*');
                    $this->db->from('calificaciones');
                    $this->db->where('detalle', $id_detalle);
                    $this->db->where('materia', $materia);
                    $this->db->where('profesor', $profesor);
                    $this->db->where('ciclo', $ciclo);
                    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
                }
                public function single_entry_consulta_calificacion_admin($id,$materia,$profesor,$ciclo)
                {
                  $this->db->select('*');
                    $this->db->from('calificaciones');
                    $this->db->where('detalle', $id);
                    $this->db->where('materia', $materia);
                    $this->db->where('profesor', $profesor);
                    $this->db->where('ciclo', $ciclo);
                    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
                }
                public function single_entry_calificaciones_por_detalle($id,$ciclo)
                {
                  $this->db->select('d.id_detalle as detalle,
                   m.id_materia as materia,
                   cal.profesor as profesor,
                    m.nombre_materia as materianombre, 
                    cal.horario as horario,
                     cal.calificacion as calificacion,
                      cal.tiempo_extension as modo');
                    $this->db->from('calificaciones cal');
                    $this->db->join("detalles d","cal.detalle = d.id_detalle");
                    $this->db->join("materias m","cal.materia = m.id_materia");
                    $this->db->where('cal.detalle', $id);
                    $this->db->where('cal.ciclo', $ciclo);
                    $resultados = $this->db->get();
                return $resultados->result();
                }
                public function sepuede_agregar_calificacion($detalle,$materia,$profesor,$ciclo)
                {
                  $this->db->select('*');
                    $this->db->from('calificaciones');
                    $this->db->where('detalle', $detalle);
                    $this->db->where('materia', $materia);
                    $this->db->where('profesor', $profesor);
                    $this->db->where('ciclo', $ciclo);
                    $this->db->where_in('estado_profesor', ['0','1']);
                    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
                }
                public function sepuede_insertar_o_actualizar_sobre_profesor($detalle,$materia,$ciclo,$profesor)
                {
                  $this->db->select('*');
                    $this->db->from('calificaciones');
                    $this->db->where('detalle', $detalle);
                    $this->db->where('materia', $materia);
                    $this->db->where('ciclo', $ciclo);
                    $this->db->where('profesor', $profesor);
                    $this->db->where('profesor_captura is null',null,false);
                    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
                }
                public function sepuede_insertar_o_actualizar_sobre_admin($detalle,$materia,$ciclo,$profesor)
                {
                  $this->db->select('*');
                    $this->db->from('calificaciones');
                    $this->db->where('detalle', $detalle);
                    $this->db->where('materia', $materia);
                    $this->db->where('ciclo', $ciclo);
                    $this->db->where('profesor', $profesor);
                    $this->db->where('administrativo_captura is null',null,false);
                    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
                }
                public function sepuede_mover_desemestre($tabla,$id_detalle,$ciclo){
                  if ($tabla == "Calificaciones") {
                      //$this->db->select("SUM(total)");
                        //$this->db->from("venta");
                         $this->db->where("detalle", $id_detalle); /* SELECT SUM(`total`) FROM `venta` */
                         $this->db->where("ciclo", $ciclo); /* SELECT SUM(`total`) FROM `venta` */
                         $this->db->where("calificacion", 0); /* SELECT SUM(`total`) FROM `venta` */
                        }
                      $resultados = $this->db->get($tabla);
                      return $resultados->num_rows();
              }
              public function mover_alumno_al_siguiente_senestre($id_detalle){

                return $this->db->query('insert into detalles 
                (alumno, carrera, opcion, ciclo_escolar,cuatrimestre, estado)
                select alumno, 
                carrera, 
                opcion,
                (select id_periodo_escolar from periodo_escolar where activo = 1),
                (cuatrimestre+1),
                "Inicio_inscripcion"
                from detalles
                where estado="En_curso" and id_detalle =  ?',$id_detalle);
                }
                public function estado_del_alumno($id_detalle)
                {
                  $this->db->select('estado, alumno');
                    $this->db->from('detalles');
                    $this->db->where('id_detalle', $id_detalle);
                    $resultados = $this->db->get();
                    return $resultados->row_array();

                  
                }
                public function promedio($id_detalle,$ciclo)
                {
                  $this->db->select('round(avg(calificacion),1) as promedio');
                    $this->db->from('calificaciones');
                    $this->db->where('detalle', $id_detalle);
                    $this->db->where('ciclo', $ciclo);
                    $resultados = $this->db->get();
                    return $resultados->row_array();

                  
                }
                public function agregar_promedio_y_estado($id_detalle,$data){
                  return $this->db->update('detalles', $data, array('id_detalle' => $id_detalle));
              }
              public function actualizar_alumno_a_cero($alumno,$data){
                return $this->db->update('alumnos', $data, array('numero_control' => $alumno));
            }
                public function yasepuedeasignarcalificaciones($opcion_estudio,$licenciatura,$semestre,$ciclo,$materia,
                $profesor,$fecha_actual)
                {
                  $this->db->select('fin,');
                    $this->db->from('horarios_profesor');
                    $this->db->where('opcion_estudio', $opcion_estudio);
                    $this->db->where('licenciatura', $licenciatura);
                    $this->db->where('semestre', $semestre);
                    $this->db->where('ciclo', $ciclo);
                    $this->db->where('materia', $materia);
                    $this->db->where('profesor', $profesor);
                    //2021-02-18 >= 2021-02-18
                    //2021-02-23 <= 2021-02-18 
                   // $this->db->where('ex_final >=',date('Y-m-d',$fecha_actual));
                    // $this->db->where('fin <=',date('Y-m-d',$fecha_actual));
                     $this->db->where('ex_final', $fecha_actual);
                    // $this->db->where('DATE_FORMAT(fin, "%Y-%m-%d") >=',date('Y-m-d',$fecha_actual));
                    $query = $this->db->get();
                    if (count($query->result()) > 0) {
                        return $query->row();
                    }
                }
                //select ex_final,fin from horarios_profesor where opcion_estudio =6 and licenciatura=20 and semestre=1 and ciclo='21/1' and materia=107 and profesor=1
                public function yasepuedeasignarcalificacion($opcion_estudio,$licenciatura,$semestre,$ciclo,$materia,
                $profesor,$fecha_actual){
                    
                    $query = $this->db->query(
                        "select fin from horarios_profesor where opcion_estudio = {$opcion_estudio}
                        and licenciatura={$licenciatura}
                        and semestre={$semestre}
                        and ciclo={$ciclo}
                        and materia={$materia}
                        and profesor={$profesor}
                         AND ex_final >= '{$fecha_actual}'
                        AND fin <= '{$fecha_actual}'");
                    return $query;
                  }

// ***************************  INICIO FNCTION PARA INSRTAR  ************************************
public function insert_entry($data)
    {
        return $this->db->insert('materias', $data);
    }



      public function update($numero_control, $data){
        return $this->db->update('materias', $data, array('id_materia' => $numero_control));
    }


          public function delete_entry($id)
          {
              return $this->db->delete('materias', array('id_materia' => $id));
          }
     
  } // FIN / CIERRE DEL MODELO
  