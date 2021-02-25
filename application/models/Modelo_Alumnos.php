<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_Alumnos extends CI_Model { // INICIO DEL MODELO


      	/* -------------------------------------------------------------------------- */
      	/*                                Fetch Records                               */
      	/* -------------------------------------------------------------------------- */
    public function alumnoexiste($tabla,$numero_control){
        if ($tabla == "alumnos") {
            //$this->db->select("SUM(total)");
              //$this->db->from("venta");
               $this->db->where("numero_control", $numero_control); /* SELECT SUM(`total`) FROM `venta` */
              }
            $resultados = $this->db->get($tabla);
            return $resultados->num_rows();
    }

      public function get_entries()
        {
            $query = $this->db->get('cod');
            return $query->result();
        }

        public function obteneralumnos($carrera,$cuatrimestre,$opcion){
            $this->db->distinct();
            $this->db->select("alumnos.numero_control as numero_control,
            concat(alumnos.nombres,' ',alumnos.apellido_paterno,' ',alumnos.apellido_materno) as alumno,
            alumnos.nombre_acta, alumnos.nombre_certificado_bachillerato, alumnos.nombre_curp, alumnos.nombre_certificado_medico,
            detalles.id_detalle, alumnos.servicio_social, alumnos.practicas_prof , alumnos.titulacion ");
            $this->db->from("alumnos");
            $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
            $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
           $this->db->where_in('alumnos.estatus', ['0','1']);
            $this->db->where("detalles.carrera", $carrera);
            $this->db->where("detalles.cuatrimestre", $cuatrimestre);
            $this->db->where("detalles.opcion", $opcion);
            $resultados = $this->db->get();
            return $resultados->result();
            }




// ***************************  INICIO FUNCTION PARA INSRTAR  ************************************
public function insert_entry($data)
    {
        return $this->db->insert('alumnos', $data);
    }
    public function insert_entry_alumno_como_usuario($data)
    {
        return $this->db->insert('usuarios', $data);
    }
    public function insert_entry_alumno_a_su_carrera($data)
    {
        return $this->db->insert('detalles', $data);
    }

    public function getacta($id){
      $query = $this->db->query("select * FROM alumnos where numero_control=?", array($id));
      return $query->row_array();
      }
      public function getcertificado($id){
        $query = $this->db->query("select * FROM alumnos where numero_control=?", array($id));
        return $query->row_array();
        }
        public function getcurp($id){
            $query = $this->db->query("select * FROM alumnos where numero_control=?", array($id));
            return $query->row_array();
            }
            public function getcertificadomedico($id){
                $query = $this->db->query("select * FROM alumnos where numero_control=?", array($id));
                return $query->row_array();
                }



      public function update($numero_control, $data){
        return $this->db->update('alumnos', $data, array('numero_control' => $numero_control));
    }
    public function update_secuencia($secuencia, $data){
        return $this->db->update('secuencias', $data, array('id_secuencia' => $secuencia));
    }



          public function ficha_alumno($id)
          {
            $this->db->select(
             "alumnos.numero_control as numero_control,
             alumnos.nombres as nombres,
             alumnos.apellido_paterno as apellido_paterno,
             alumnos.apellido_materno as apellido_materno,
             alumnos.direccion as direccion,
             alumnos.municipio_direccion as municipio_direccion,
             alumnos.estado_direccion as estado_direccion,
             alumnos.fecha_nacimiento as fecha_nacimiento,
             alumnos.fecha_inscripcion as fecha_inscripcion,
             alumnos.localidad as localidad,
             alumnos.municipio_localidad as municipio_localidad,
             alumnos.estado_localidad as estado_localidad,
             alumnos.estado_civil as estado_civil,
             alumnos.sexo as sexo,
             alumnos.institucion as institucion,
             alumnos.tipo_escuela_nivel_medio_superior as tipo_escuela_nivel_medio_superior,
             alumnos.telefono as telefono,
             alumnos.email as email,
             alumnos.facebook as facebook,
             alumnos.twitter as twitter,
             alumnos.instagram as instagram,
             carrera.carrera_descripcion as carrera_descripcion,
             opciones.descripcion as descripcion");
              $this->db->from("alumnos");
              $this->db->join("detalles","alumnos.numero_control = detalles.alumno");
              $this->db->join("carrera","detalles.carrera = carrera.id_carrera");
              $this->db->join("opciones","detalles.opcion = opciones.id_opcion");
              $this->db->where('alumnos.numero_control', $id);

              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }

          public function single_entry($id)
          {
            $this->db->select(
             'numero_control,
              nombres,
              apellido_paterno,
              apellido_materno,
              direccion,
              municipio_direccion,
              estado_direccion,
              fecha_nacimiento,
              fecha_inscripcion,
              localidad,
              municipio_localidad,
              estado_localidad,
              estado_civil,
              sexo,
              institucion,
              tipo_escuela_nivel_medio_superior,
              telefono,
              email,
              facebook,
              twitter,
              instagram');
              $this->db->from('alumnos');
              $this->db->where('numero_control', $id);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
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
          public function secuencia_derecho()
          {
              $this->db->select('id_secuencia,valor_secuencia');
              $this->db->from('secuencias');
              $this->db->where('id_secuencia', 1);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
          public function secuencia_psicologia()
          {
              $this->db->select('id_secuencia,valor_secuencia');
              $this->db->from('secuencias');
              $this->db->where('id_secuencia', 2);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
          public function secuencia_criminalistica()
          {
              $this->db->select('id_secuencia,valor_secuencia');
              $this->db->from('secuencias');
              $this->db->where('id_secuencia', 3);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
          public function secuencia_diseno()
          {
              $this->db->select('id_secuencia,valor_secuencia');
              $this->db->from('secuencias');
              $this->db->where('id_secuencia', 4);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }
          public function secuencia_contaduria()
          {
              $this->db->select('id_secuencia,valor_secuencia');
              $this->db->from('secuencias');
              $this->db->where('id_secuencia', 5);
              $query = $this->db->get();
              if (count($query->result()) > 0) {
                  return $query->row();
              }
          }


  } // FIN / CIERRE DEL MODELO
