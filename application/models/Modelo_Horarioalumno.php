<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_Horarioalumno extends CI_Model { // INICIO DEL MODELO

  
  //  CONSULTA GENERAL PARA LLENAR LOS CAMPOS DE LA RETICULA CAMPOS DATOS PERSONALES DEL ALUMNO INDEPENDIENTES
    public function consultaDatosPersonalesDelAlumnos($numero_control){
        $this->db->distinct();
        $this->db->select(" alumnos.numero_control as numero_control,
        concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as nombre_completo,
        detalles.cuatrimestre as semestre, carrera.carrera_descripcion as carrera_descripcion, carrera.id_carrera, detalles.id_detalle, pec.nombre_ciclo,detalles.opcion ");
        $this->db->from("alumnos");
        $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
        //$this->db->join(" calificaciones calf "," detalles.id_detalle = calf.detalle ");
        $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
        $this->db->join(" periodo_escolar pec "," pec.id_periodo_escolar = detalles.ciclo_escolar ");
        $this->db->where_in('detalles.estado', ['En_curso','Inicio_inscripcion']);
        $this->db->where("alumnos.numero_control",$numero_control);
        $resultados = $this->db->get();
        return $resultados->result();
        }



        /* -------------------------------------------------------------------------- */
        /*       Lista datos Gral. del Alumno    para generar documentacion           */
        /* -------------------------------------------------------------------------- */

        public function obtenerDatosGenerarDocsDelAlumno($semestre,$licenciatura,$opciones, $numero_control){
          $this->db->distinct();
          $this->db->select("alumnos.numero_control as numero_control, concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno)
          as alumno, detalles.cuatrimestre as semestre, carrera.carrera_descripcion as carrera_descripcion, carrera.id_carrera, calf.detalle, detalles.opcion, detalles.carrera ");
          $this->db->from("alumnos");
          $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
          $this->db->join(" calificaciones calf "," detalles.id_detalle = calf.detalle ");
          $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
          $this->db->where_in('alumnos.estatus', ['0','1']);
          $this->db->where("detalles.cuatrimestre =", $semestre);
          $this->db->where("detalles.carrera =", $licenciatura);
          $this->db->where("detalles.opcion =", $opciones);
          $this->db->where("detalles.alumno =", $numero_control);
          $resultados = $this->db->get();
          return $resultados->result();
          }


  /* -------------------------------------------------------------------------- */
	/*                            INSERTAR BAUCHE TABLA                           */
	/* -------------------------------------------------------------------------- */
  public function insert_baucher($data){
          return $this->db->insert('alta_baucher_banco', $data);
      }


      public function insert_reciboValidadoXlaIntitucion($data){
              return $this->db->insert('recibo_validado', $data);
          }

	/* -------------------------------------------------------------------------- */
	/*        METODO PARA HACER EL CONTEO DE LAS VENTAS, USERS, ETC..             */
	/* -------------------------------------------------------------------------- */

    public function rowcountColegiatura($tabla){
        if ($tabla == "alta_baucher_banco") {
      // $this->db->select("COUNT(*)");
        // $this->db->from("alta_baucher_banco");
         $this->db->where("tipo_de_pago", "1"); /* SELECT SUM(`total`) FROM `venta` */
        }
      $resultados = $this->db->get($tabla);
      return $resultados->num_rows();
    }


    public function rowcountCursos($tabla){
        if ($tabla == "alta_baucher_banco") {
      // $this->db->select("COUNT(*)");
        // $this->db->from("alta_baucher_banco");
         $this->db->where("tipo_de_pago", "2"); /* SELECT SUM(`total`) FROM `venta` */
        }
      $resultados = $this->db->get($tabla);
      return $resultados->num_rows();
    }


    public function rowcountExtraordinario($tabla){
        if ($tabla == "alta_baucher_banco") {
      // $this->db->select("COUNT(*)");
        // $this->db->from("alta_baucher_banco");
         $this->db->where("tipo_de_pago", "4"); /* SELECT SUM(`total`) FROM `venta` */
        }
      $resultados = $this->db->get($tabla);
      return $resultados->num_rows();
    }


    public function rowcountTitulo($tabla){
        if ($tabla == "alta_baucher_banco") {
      // $this->db->select("COUNT(*)");
        // $this->db->from("alta_baucher_banco");
         $this->db->where("tipo_de_pago", "5"); /* SELECT SUM(`total`) FROM `venta` */
        }
      $resultados = $this->db->get($tabla);
      return $resultados->num_rows();
    }


    public function consultarTiposDePagos(){
                  $this->db->distinct();
                  $this->db->select("id_tipo_pago,pago");
                  $this->db->from("tipos_de_pagos");
                  $resultados = $this->db->get();
                  return $resultados->result();
                  }


                  public function consultarTiposDePagosHistPagosAlumnos(){
                                $this->db->distinct();
                                $this->db->select("id_tipo_pago,pago");
                                $this->db->from("tipos_de_pagos");
                                $resultados = $this->db->get();
                                return $resultados->result();
                                }


    public function consultaCountAlumnosXxx($numero_control){
        // if ($tabla == "alta_baucher_banco") {
          $this->db->select("numero_control");
          $this->db->from("alta_baucher_banco");
          $this->db->where("numero_control",$numero_control); /* SELECT SUM(`total`) FROM `venta` */
//        $this->db->where("numero_control",$numero_control);
        // }
      // $resultados = $this->db->get($tabla);
      // return $resultados->num_rows();
      $resultados = $this->db->get();
      return $resultados->result();
    }


// 1.- Se obtiene el nombre completo de la tabla de alumnos y el no control
// 2.- Se obt. id de la tabla de los baucher y la fecha en k se subio el baucher

  public function obtenerListaDeAlumnosConBaucherRegistrado($semestre, $opciones, $licenciatura,$tipoPago){   // => $tipoPago

    $this->db->select("CONCAT(alu.nombres, ' ', alu.apellido_paterno, ' ', alu.apellido_materno) As nombre_completo,
      ban.id_alta_baucher_banco, ban.fecha_registro, alu.numero_control, alu.estatus, car.carrera_descripcion, rec.cantidad ,
      rec.desc_concepto, rec.id_recibo, ban.semestre,  ban.tipo_de_pago, det.id_detalle");
     //  rec.parcialidad_pago, rec.fecha_limite_pago, tip.pago,
     $this->db->from("alumnos alu");
     $this->db->join("alta_baucher_banco ban","alu.numero_control = ban.numero_control");
     $this->db->join("detalles det ","alu.numero_control = det.alumno");
     $this->db->join("carrera car","car.id_carrera = det.carrera");
     // $this->db->join("tipos_de_pagos tip","tip.id_tipo_pago = ban.tipo_de_pago");
     $this->db->join("datos_recibo rec","rec.bauche = ban.id_alta_baucher_banco",'LEFT');
      // $this->db->where("tip.pago",$tipoPago);
      $this->db->where(" ban.semestre =",$semestre);
      $this->db->where(" det.opcion =",$opciones);
      $this->db->where(" det.carrera =",$licenciatura);
      $this->db->where(" ban.tipo_de_pago =",	$tipoPago);
     $this->db->group_by('nombre_completo');
      $resultados = $this->db->get();
      return $resultados->result();
  }

  ///////////////////////  ACTUALIZAR/INSERT DATOS PARA EL COMPRIBANTE DE PAGO EN LA TABLA DLE BAUCH3ER  //////////////////////
  public function insertDatosDeValiacionBaucher($data){
      return $this->db->update('alta_baucher_banco', $data, array('id_alta_baucher_banco' => $data['id_alta_baucher_banco']));
  }

  // public function insertDatosDeValiacionBaucher($bauche, $data){
  //   $this->db->where("id_alta_baucher_banco",$bauche);
  //    return $this->db->update("alta_baucher_banco", $data);
  //   }



// Se recupera el baucher k se dio de alta para mostrarselo al ADMIN para corroborar k si sea
    public function getBaucherId($numero_control, $id_alta_baucher_banco){
        $query = $this->db->query("select * FROM alta_baucher_banco where numero_control=? and id_alta_baucher_banco =?", array($numero_control, $id_alta_baucher_banco));
        return $query->row_array();
    }

    // SE CONSULTA EL RECIBO YA VALIDADO X LA INSTITUCION
        public function getReciboValidado($id_recibo_valido){
            $query = $this->db->query("select * FROM recibo_validado where id_recibo_valido=?", array($id_recibo_valido));
            return $query->row_array();
        }

  //  =================  ACTUALIZA SIEMPRE EL ESTATUS DE LA TABLA DE ALUMNOS PARA HABILITAR Y DESHABILITAR  ======================
    public function update($numero_control, $data){
      $this->db->where("numero_control",$numero_control);
       return $this->db->update("alumnos", $data);
      }

// ========== ACTUALIZA SIEMPRE EL ESTATUS DE LA TABLA DETALLES PARA HABILITAR Y DESHABILITAR  ===========    estado_archivo
        public function updateStatusDetalles($numero_control, $data3){
          $this->db->where("alumno",$numero_control);
           return $this->db->update("detalles", $data3);
          }

//  ===============  <<<<<<<<<<<   actualiza el estado del comprobante de pago si fue validado o no el k subio  >>>>>>>>>> ============
        public function updateStatusComprobPago($numero_control, $id_alta_baucher_banco, $data2){
          $this->db->where("numero_control",$numero_control);
          $this->db->where("id_alta_baucher_banco",$id_alta_baucher_banco);
           return $this->db->update("alta_baucher_banco", $data2);
          }

//   ************************  FUINCTION PARA ELIMINAR  el registro del alumno nauchere  ********************
      public function eliminarTodoRegistroAlumno($numero_control, $id_alta_baucher_banco){
      return $this->db->delete('alta_baucher_banco', array('numero_control' => $numero_control, 'id_alta_baucher_banco' => $id_alta_baucher_banco));
      }

//    ******************     SE CONSULTAN EL RECIBO FIRMADO Y SELLADO DEL ALUMNOS   ***************************
      public function obtenerRecibosFirmadosDelAlumno(){
          $this->db->select("id_recibo_valido,nombre_archivo");
      $this->db->from("recibo_validado");
       // $this->db->where("Cantidad !=0");
      $resultados = $this->db->get();
      return $resultados->result();
      }


//  *************** Eliminar los datos del registro cuando se deshabilita el alumnos y cuando se elimina el baucher *****************
      public function deleteDatosDelRecibo($id_alta_baucher_banco){
      return $this->db->delete('datos_recibo', array('bauche' => $id_alta_baucher_banco));
      }

      public function insert_entry($data){
          return $this->db->insert('datos_recibo', $data);
        }

// SE HACE EL RESPALDO DE LA TABLA RECIBOS DE PAGOS A HISTORICO
        public function insert_respaldoHistoricoReciboPagos($bauche){  // parcialidad_pago, fecha_limite_pago,
            return $this->db->query(' insert into historico_recibos_pagos (id_recibo, bauche, importe_letra, desc_concepto, cantidad,  pago_total_a_pagar, restante, usuario_creacion, fecha_creacion)
            SELECT * FROM datos_recibo where bauche =?',$bauche);
            // $this->db->where("bauche =",$bauche);
          }

      public function getTipoDePagos(){
      	$resultados = $this->db->get("tipos_de_pagos");
    		return $resultados->result();
    	}

      //   ************************  FUINCTION PARA ELIMINAR  el recibo del alumno ya firmado y sellado  ********************
            public function eliminarReciboFirmadodelAlumno($id_recibo_valido){
            return $this->db->delete('recibo_validado', array('id_recibo_valido' => $id_recibo_valido));
            }



    public function obtenerHistorialDePagosXAlumnos($numero_control,  $semestre, $tipoPago){
     $this->db->select("CONCAT(alu.nombres, ' ', alu.apellido_paterno, ' ', alu.apellido_materno) As nombre_completo,
     ban.id_alta_baucher_banco, ban.fecha_registro, ban.nombre_archivo, alu.numero_control, car.carrera_descripcion,
     sta.estado, tip.pago, rec.id_recibo, val.id_recibo_valido, ban.semestre,
     det.id_detalle, pec.nombre_ciclo, ban.parcialidades, ban.fecha_limite_de_pago,
     ban.estado_archivo, sta.estatus, rec.cantidad , rec.desc_concepto,
     rec.pago_total_a_pagar, rec.restante ");
     $this->db->from("alumnos alu");
     $this->db->join("alta_baucher_banco ban","alu.numero_control = ban.numero_control");
     $this->db->join("detalles det ","alu.numero_control = det.alumno");
     $this->db->join("carrera car","car.id_carrera = det.carrera");
     $this->db->join("estatus sta","sta.estatus = ban.estado_archivo ");
     $this->db->join(" periodo_escolar pec "," pec.id_periodo_escolar = det.ciclo_escolar ");
     $this->db->join("tipos_de_pagos tip","tip.id_tipo_pago = ban.tipo_de_pago");
       $this->db->join("historico_recibos_pagos rec","rec.bauche = ban.id_alta_baucher_banco",'LEFT');
//  $this->db->join("datos_recibo rec","rec.bauche = ban.id_alta_baucher_banco",'LEFT');
       $this->db->join("recibo_validado val","val.id_recibo = rec.id_recibo",'LEFT');
     $this->db->where("ban.numero_control",$numero_control);
     $this->db->where("ban.semestre",$semestre);
     $this->db->where("ban.tipo_de_pago",$tipoPago);
$this->db->group_by('ban.id_alta_baucher_banco');
     $resultados = $this->db->get();
      return $resultados->result();
    }


    //
    // public function obtenerAvanceReticulaXAlumnos($numero_control,$semestre){
    //  $this->db->select(" materias.id_materia,materias.semestre, opciones.opcion, CONCAT(a.nombres, ' ', a.apellido_paterno, ' ', a.apellido_materno) As nombres, materias.nombre_materia, carrera.carrera_descripcion,  calificaciones.calificacion");
    //  $this->db->from(" detalles d ");
    //  $this->db->join("alumnos a","d.alumno = a.numero_control");
    //  $this->db->join("carrera ","carrera.id_carrera = d.carrera");
    //  $this->db->join(" periodo_escolar "," periodo_escolar.id_periodo_escolar = d.ciclo_escolar ");
    //  $this->db->join(" materias "," materias.especialidad = carrera.id_carrera ");
    //  $this->db->join(" calificaciones "," calificaciones.materia = materias.id_materia ", "LEFT");
    //  $this->db->join(" opciones "," d.opcion = opciones.id_opcion ");
    //  $this->db->where(" a.numero_control = ",$numero_control);
    //  $this->db->where(" materias.semestre =",$semestre);
    //
    //  $resultados = $this->db->get();
    //   return $resultados->result();
    // }

    

    public function obtenerAvanceReticulaXAlumnos($numero_control,$semestre, $id_detalle){
      $this->db->select(" m.semestre, CONCAT(a.nombres, ' ', a.apellido_paterno, ' ', a.apellido_materno) As nombres,
       m.nombre_materia");
      $this->db->from(" detalles deta");
      $this->db->join("alumnos a","deta.alumno = a.numero_control");
      $this->db->join(" carrera c ","  deta.carrera = c.id_carrera ");
      $this->db->join(" materias m "," c.id_carrera = m.especialidad  ");
            $this->db->where(" a.numero_control = ",$numero_control);
            $this->db->where(" deta.id_detalle =", $id_detalle );
            $this->db->where(" m.semestre =",$semestre);

      $resultados = $this->db->get();
       return $resultados->result();
     }

     public function obtenerAvanceReticulaXMateriasCursadas($numero_control,$semestre, $id_detalle){
       $this->db->select(" deta.cuatrimestre, CONCAT(a.nombres, ' ', a.apellido_paterno, ' ', a.apellido_materno) As nombres, m.nombre_materia,  cal.calificacion ");
       $this->db->from(" detalles deta");
       $this->db->join("alumnos a","deta.alumno = a.numero_control");
       $this->db->join(" calificaciones cal "," deta.id_detalle = cal.detalle ");
       $this->db->join(" materias m "," cal.materia = m.id_materia ");
             $this->db->where(" a.numero_control = ",$numero_control);
             //$this->db->where(" deta.id_detalle =", $id_detalle );
             $this->db->where(" deta.cuatrimestre =",$semestre);

       $resultados = $this->db->get();
        return $resultados->result();
      }

/***}
 *
 *   public function obtenerAvanceReticulaXAlumnos($numero_control,$semestre, $id_detalle){
         $this->db->select(" d.cuatrimestre, CONCAT(a.nombres, ' ', a.apellido_paterno, ' ', a.apellido_materno) As nombres, m.nombre_materia, calificaciones.calificacion ");
         $this->db->from(" detalles d ");
         $this->db->join("alumnos a","d.alumno = a.numero_control");
         $this->db->join(" calificaciones "," calificaciones.detalle = d.id_detalle ");
         $this->db->join(" materias m "," calificaciones.materia = m.id_materia ");
               $this->db->where(" a.numero_control = ",$numero_control);
               $this->db->where(" calificaciones.detalle =", $id_detalle );
               $this->db->where(" d.cuatrimestre =",$semestre);

         $resultados = $this->db->get();
          return $resultados->result();
        }
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */




    public function obtenerSemestreCombo(){
      // $this->db->distinct();
      $this->db->select("nombre,semestre");
      $this->db->from("semestres");
      $resultados = $this->db->get();
      return $resultados->result();
      }

      /////ASIGNACION MASIVA
      public function insert_masvia_de_alumnos($data){
        return $this->db->insert_batch('calificaciones', $data);
      }
        public function materias_a_insertar($opcion,$carrera,$semestre,$ciclo)
                {
                  $this->db->select('hp.materia as materia, 
                  hp.profesor as profesor, 
                  hp.ciclo as ciclo,
                  hp.horario as horario');
                    $this->db->from('horarios_profesor hp');
                    $this->db->where('hp.opcion_estudio', $opcion);
                    $this->db->where('hp.licenciatura', $carrera);
                    $this->db->where('hp.semestre', $semestre);
                    $this->db->where('hp.ciclo', $ciclo);
                    $resultados = $this->db->get();
                    return $resultados->result_array();                
                }
      /////////FIN ASIGNACION MASIVA
//////////////////////////////////////// SELECCIÓN DE MATERIAS ////////////////////////////////////////////////////////
public function periodo_activo()
          {
              $this->db->select('id_periodo_escolar,nombre_ciclo');
              $this->db->from('periodo_escolar');
              $this->db->where('activo', 1);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
public function horarioyaseleccionado($numero_control){
  // if ($tabla == "alta_baucher_banco") {
    $this->db->select("alumno");
    $this->db->from("detalles");
    $this->db->where("alumno",$numero_control);
    $this->db->where("estado","En curso");
$resultados = $this->db->get();
return $resultados->result();
}
public function update_alumno_en_curso($alumno,$carrera,$opcion,$cuatrimestre,$ciclo,$data){
  return $this->db->update('detalles', $data, array('alumno' => $alumno,'carrera' => $carrera, 'opcion' => $opcion, 'cuatrimestre' => $cuatrimestre, 'ciclo_escolar' => $ciclo, 'estado' => 'Inicio_inscripcion'));
}
public function obtenermateriasaelegir($licenciatura,$semestre,$opcion,$ciclo){
  $this->db->select("m.id_materia as materia,
  m.nombre_materia as nombre_materia,
  p.nombres as profe,
  p.id_profesores as id_profe,
  c.carrera_descripcion as carrera,
  o.descripcion as opcion,
  hp.semestre as semestre,
  hp.ciclo as ciclo,
  hp.horario as horario
  ");
  $this->db->from("horarios_profesor hp");
  $this->db->join("carrera c","hp.licenciatura = c.id_carrera");
  $this->db->join("opciones o ","hp.opcion_estudio = o.id_opcion");
  $this->db->join("materias m","hp.materia = m.id_materia");
  $this->db->join("profesores p","hp.profesor = p.id_profesores");
  //$this->db->join("detalles d","c.id_carrera = d.carrera");

  $this->db->where("hp.ciclo",$ciclo);
  $this->db->where("hp.licenciatura",$licenciatura);
  $this->db->where("hp.opcion_estudio",$opcion);
  $this->db->where("hp.semestre",$semestre);
  //$this->db->where("d.alumno",$numero_control);
  //$this->db->where_in('d.estado', ['En_espera_de_materias','En_curso']);

  $resultados = $this->db->get();
   return $resultados->result();
 }
 public function obtenermateriasaelegidas($numero_control,$ciclo){
  $this->db->select("m.id_materia as materia,
  d.id_detalle as alumno,
  cal.profesor as id_profe,
  m.nombre_materia as nombre_materia,
  p.nombres as profe,
  c.carrera_descripcion as carrera,
  o.descripcion as opcion,
  d.cuatrimestre as semestre,
  cal.ciclo as ciclo,
  cal.horario
  ");
  $this->db->from("calificaciones cal");
  $this->db->join("detalles d","d.id_detalle  = cal.detalle");
  $this->db->join("alumnos a","d.alumno = a.numero_control");
  $this->db->join("carrera c","d.carrera = c.id_carrera");
  $this->db->join("opciones o","d.opcion = o.id_opcion");
  $this->db->join("materias m","cal.materia = m.id_materia");
  $this->db->join("profesores p","cal.profesor  = p.id_profesores");

  $this->db->where("cal.ciclo",$ciclo);
  $this->db->where("d.alumno",$numero_control);
  $this->db->where_in('d.estado', ['Inicio_inscripcion','En_curso']);

  $resultados = $this->db->get();
   return $resultados->result();
 }
 public function materiayaagregada($detalle,$materia,$ciclo){
  // $this->db->distinct();
  $this->db->select("*");
  $this->db->from("calificaciones");
  $this->db->where("detalle",$detalle);
  $this->db->where("materia",$materia);
  $this->db->where("ciclo",$ciclo);
  $resultados = $this->db->get();
  return $resultados->result();
  }
 public function obtenerlicenciaturadelalumno($numero_control){
  // $this->db->distinct();
  $this->db->select("carrera");
  $this->db->from("detalles");
  $this->db->where("alumno",$numero_control);
  $this->db->where_in('estado', ['En_espera_de_materias','En_curso']);
  $resultados = $this->db->get();
  return $resultados->result();
  }
  public function obteneropciondelalumno($numero_control){
    // $this->db->distinct();
    $this->db->select("opcion");
    $this->db->from("detalles");
    $this->db->where("alumno",$numero_control);
    $this->db->where_in('estado', ['En_espera_de_materias','En_curso']);
    $resultados = $this->db->get();
    return $resultados->result();
    }
    public function obtenersemestredelalumno($numero_control){
      // $this->db->distinct();
      $this->db->select("cuatrimestre");
      $this->db->from("detalles");
      $this->db->where("alumno",$numero_control);
      $this->db->where_in('estado', ['En_espera_de_materias','En_curso']);
      $resultados = $this->db->get();
      return $resultados->result();
      }

      public function insertar_materia($data){
        return $this->db->insert('calificaciones', $data);
    }
    public function delete_entry($detalle,$materia,$ciclo,$profesor,$horario)
{
    return $this->db->delete('calificaciones', array('detalle' => $detalle,'materia' => $materia, 'ciclo' => $ciclo, 'profesor' => $profesor, 'horario' => $horario));
}
  } // FIN / CIERRE DEL MODELO
