<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumnos extends CI_Controller {

		 private $permisos;
	   public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
		  // $this->permisos = $this->backend_lib->control();
	 	 $this->load->model("Modelo_Alumnos");
	 }


	public function index(){

		$data  = array(
			'permisos' => $this->permisos,
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Administrativos/VistaAlumnos',$data);
		$this->load->view('layouts/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                               Insert Records                               */
	/* -------------------------------------------------------------------------- */

	public function viewalumno(){
		if ($this->input->is_ajax_request()) {
			$view_id = $this->input->post('view_id');
			if ($post = $this->Modelo_Alumnos->ficha_alumno($view_id)) {
				$data = array('responce' => "success", "post" => $post);
			}else{
				$data = array('responce' => "error", "failed to fetch");
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}

	public function insertaralumno(){

		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('numero_control', 'nombres', 'required');
			$this->form_validation->set_rules('nombres', 'nombres', 'required');
			$this->form_validation->set_rules('apellido_paterno', 'apellido_paterno', 'required');
			$this->form_validation->set_rules('apellido_materno', 'apellido_materno', 'required');
			$this->form_validation->set_rules('direccion', 'direccion', 'required');
			$this->form_validation->set_rules('municipio_direccion', 'municipio_direccion', 'required');
			$this->form_validation->set_rules('estado_direccion', 'estado_direccion', 'required');
			$this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required');
			$this->form_validation->set_rules('fecha_inscripcion', 'fecha_inscripcion', 'required');
			$this->form_validation->set_rules('localidad', 'localidad', 'required');
			$this->form_validation->set_rules('municipio_localidad', 'municipio_localidad', 'required');
			$this->form_validation->set_rules('estado_localidad', 'estado_localidad', 'required');
			$this->form_validation->set_rules('estado_civil', 'estado_civil', 'required');
			$this->form_validation->set_rules('sexo', 'sexo', 'required');
			$this->form_validation->set_rules('tipo_escuela_nivel_medio_superior', 'tipo_escuela_nivel_medio_superior', 'required');
			$this->form_validation->set_rules('institucion', 'institucion', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('telefono', 'telefono', 'required');
			$this->form_validation->set_rules('facebook', 'facebook', 'required');
			$this->form_validation->set_rules('twitter', 'twitter', 'required');
			$this->form_validation->set_rules('instagram', 'instagram', 'required');
           //INSERTANDO EL ALUMNO A SU CARRERA
			$this->form_validation->set_rules('alumno', 'alumno', 'required');
			$this->form_validation->set_rules('carrera', 'carrera', 'required');
			$this->form_validation->set_rules('opcion', 'opcion', 'required');
			$this->form_validation->set_rules('cuatrimestre', 'cuatrimestre', 'required');
			$this->form_validation->set_rules('ciclo_escolar', 'ciclo_escolar', 'required');



			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				if (isset($_FILES["acta_nacimiento"]["name"])) {
					$config['upload_path'] = "./assets/template/dist/img/uploads";
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size']     = '1000';
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$this->load->library('upload', $config);

					if (!$this->upload->do_upload("acta_nacimiento")) {
						$data = array('response' => "error", 'message' => $this->upload->display_errors());
					} else {
						//ACTA
			$file_name = $_FILES['acta_nacimiento']['name'];
			$file_size = $_FILES['acta_nacimiento']['size'];
			$file_tmp = $_FILES['acta_nacimiento']['tmp_name'];
			$file_type = $_FILES['acta_nacimiento']['type'];

			$imagen_temporal = $file_tmp;
			$tipo = $file_type;

			$fp= fopen($imagen_temporal, 'r+b');
			$binario = fread($fp, filesize($imagen_temporal));
			fclose($fp);
			$ajax_data['acta_nacimiento'] = $binario; // Documento pdf
			$ajax_data['nombre_acta'] = $file_name; // name file


		   }
		   }
		   ///////////////////CERTIFICADO
		   if (isset($_FILES["certificado_bachillerato"]["name"])) {
			$config['upload_path'] = "./assets/template/dist/img/uploads";
			$config['allowed_types'] = 'gif|jpg|png|pdf';
			$config['max_size']     = '1000';
			// $config['max_width'] = '1024';
			// $config['max_height'] = '768';
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload("certificado_bachillerato")) {
				$data = array('response' => "error", 'message' => $this->upload->display_errors());
			} else {
			$file_name_certi = $_FILES['certificado_bachillerato']['name'];
			$file_size_certi = $_FILES['certificado_bachillerato']['size'];
			$file_tmp_certi = $_FILES['certificado_bachillerato']['tmp_name'];
			$file_type_certi = $_FILES['certificado_bachillerato']['type'];

			$imagen_temporal_certi = $file_tmp_certi;
			$tipo_certi = $file_type_certi;

			$fp_certi = fopen($imagen_temporal_certi, 'r+b');
			$binario_certi = fread($fp_certi, filesize($imagen_temporal_certi));
			fclose($fp_certi);
			$ajax_data['certificado_bachillerato'] = $binario_certi; // Documento pdf
			$ajax_data['nombre_certificado_bachillerato'] = $file_name_certi;//$this->upload->data('file_name_certi'); // name file


			}
		   }
			//CURP
			if (isset($_FILES["curp"]["name"])) {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload("curp")) {
					$data = array('response' => "error", 'message' => $this->upload->display_errors());
				} else {
			$file_name_curp = $_FILES['curp']['name'];
			$file_size_curp = $_FILES['curp']['size'];
			$file_tmp_curp = $_FILES['curp']['tmp_name'];
			$file_type_curp = $_FILES['curp']['type'];

			$imagen_temporal_curp = $file_tmp_curp;
			$tipo_curp = $file_type_curp;

			$fp_curp = fopen($imagen_temporal_curp, 'r+b');
			$binario_curp = fread($fp_curp, filesize($imagen_temporal_curp));
			fclose($fp_curp);
			$ajax_data['curp'] = $binario_curp; // Documento pdf
			$ajax_data['nombre_curp'] = $file_name_curp;//$this->upload->data('file_name_curp'); // name file

				}
			}
			//CERTIFICADO MEDICO
			if (isset($_FILES["certificado_medico"]["name"])) {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$this->load->library('upload', $config);

				if (!$this->upload->do_upload("certificado_medico")) {
					$data = array('response' => "error", 'message' => $this->upload->display_errors());
				} else {
			$file_name_certim= $_FILES['certificado_medico']['name'];
			$file_size_certim = $_FILES['certificado_medico']['size'];
			$file_tmp_certim = $_FILES['certificado_medico']['tmp_name'];
			$file_type_certim = $_FILES['certificado_medico']['type'];

			$imagen_temporal_certim = $file_tmp_certim;
			$tipo_certim = $file_type_certim;

			$fp_certim = fopen($imagen_temporal_certim, 'r+b');
			$binario_certim = fread($fp_certim, filesize($imagen_temporal_certim));
			fclose($fp_certim);
			$ajax_data['certificado_medico'] = $binario_certim; // Documento pdf
			$ajax_data['nombre_certificado_medico'] = $file_name_certim;//$this->upload->data('file_name_certim'); // name file

				}
			}

			$ajax_data['numero_control'] = $this ->input->post('numero_control');
			$ajax_data['nombres'] = $this ->input->post('nombres');
			$ajax_data['apellido_paterno'] = $this ->input->post('apellido_paterno');
			$ajax_data['apellido_materno'] = $this ->input->post('apellido_materno');
			$ajax_data['direccion'] = $this ->input->post('direccion');
			$ajax_data['municipio_direccion'] = $this ->input->post('municipio_direccion');
			$ajax_data['estado_direccion'] = $this ->input->post('estado_direccion');
			$ajax_data['fecha_nacimiento'] = $this ->input->post('fecha_nacimiento');
			$ajax_data['fecha_inscripcion'] = $this ->input->post('fecha_inscripcion');
			$ajax_data['localidad'] = $this ->input->post('localidad');
			$ajax_data['municipio_localidad'] = $this ->input->post('municipio_localidad');
			$ajax_data['estado_localidad'] = $this ->input->post('estado_localidad');
			$ajax_data['estado_civil'] = $this ->input->post('estado_civil');
			$ajax_data['sexo'] = $this ->input->post('sexo');
			$ajax_data['tipo_escuela_nivel_medio_superior'] = $this ->input->post('tipo_escuela_nivel_medio_superior');
			$ajax_data['institucion'] = $this ->input->post('institucion');
			$ajax_data['email'] = $this ->input->post('email');
			$ajax_data['telefono'] = $this ->input->post('telefono');
			$ajax_data['facebook'] = $this ->input->post('facebook');
			$ajax_data['twitter'] = $this ->input->post('twitter');
			$ajax_data['instagram'] = $this ->input->post('instagram');
			$ajax_data['estatus'] = $this ->input->post('estatus');
			$ajax_data['estatus_alumno_activo'] = $this ->input->post('estatus_alumno_activo');
			//PARA INSERTAR EL ALUMNO A SU CARRERA
			$ajax_data2['alumno'] = $this->input->post('alumno');
			$ajax_data2['carrera'] = $this->input->post('carrera');
			$ajax_data2['opcion'] = $this->input->post('opcion');
			$ajax_data2['cuatrimestre'] = $this->input->post('cuatrimestre');
			$ajax_data2['ciclo_escolar'] = $this->input->post('ciclo_escolar');
			$ajax_data2['estado'] = $this->input->post('estado');
			$ajax_data2['promedio'] = $this->input->post('promedio');
			//PARA AGREGAR EL ALUMNO COMO USUARIO
			$ajax_data4['nombres'] = $this->input->post('nombres');
			$ajax_data4['apellidos'] = $this->input->post('apellidos');
			$ajax_data4['telefono'] = $this->input->post('telefono');
			$ajax_data4['email'] = $this->input->post('email');
			$ajax_data4['username'] = $this->input->post('username');
			$ajax_data4['password'] = $this->input->post('password');
			$ajax_data4['rol_id'] = $this->input->post('rol_id');
			$ajax_data4['estado_usuario'] = $this->input->post('estado_usuario');
			//PARA AVANZAR LA SECUENCIA DE CADA CARRERA
            $secuencia = $this->input->post('id_secuencia');
			$ajax_data3['valor_secuencia'] = $this->input->post('valor_secuencia');
			//PARA VERIFICAR SI EL ALUMNO EXISTE
			$alumno =$this ->input->post('numero_control');
            $tabla = "alumnos";

			if ($this->Modelo_Alumnos->alumnoexiste($tabla,$alumno)>=1) {
				$data = array('response' => "error", 'message' => "El alumno ya se encuentra registrado");
			}
			else{ //EL ALUMNO NO EXISTE, PROCEDE A CREARLO
				if ($this->Modelo_Alumnos->insert_entry($ajax_data)) {
					$data = array('response' => "success", 'message' => "Alumno agregado correctamente");
					if ($this->Modelo_Alumnos->insert_entry_alumno_a_su_carrera($ajax_data2)) {
						$data = array('response' => "success", 'message' => "Alumno agregado correctamente");
					} else {
						$data = array('response' => "error", 'message' => "Error al agregar datos...!");
					}
					if ($this->Modelo_Alumnos->insert_entry_alumno_como_usuario($ajax_data4)) {
						$data = array('response' => "success", 'message' => "Se agrega como usuario");
					} else {
						$data = array('response' => "error", 'message' => "Error al agregar datos...!");
					}
				} else {
					$data = array('response' => "error", 'message' => "Error al agregar datos...!");
				}
				if($this->Modelo_Alumnos->update_secuencia($secuencia,$ajax_data3)) {
					$data = array('response' => "success", 'message' => "¡Alumno agregado correctamente!");
				}else {
					$data = array('response' => "error", 'message' => "¡No se pudo agregar el alumno!");
				}
			}

			}


			echo json_encode($data);

			}
		  else{
			echo "No se permite este acceso directo...!!!";
		}

	}



	public function updatealumno(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nombres', 'nombres', 'required');
			$this->form_validation->set_rules('apellido_paterno', 'apellido_paterno', 'required');
			$this->form_validation->set_rules('apellido_materno', 'apellido_materno', 'required');
			$this->form_validation->set_rules('direccion', 'direccion', 'required');
			$this->form_validation->set_rules('municipio_direccion', 'municipio_direccion', 'required');
			$this->form_validation->set_rules('estado_direccion', 'estado_direccion', 'required');
			$this->form_validation->set_rules('fecha_nacimiento', 'fecha_nacimiento', 'required');
			$this->form_validation->set_rules('fecha_inscripcion', 'fecha_inscripcion', 'required');
			$this->form_validation->set_rules('localidad', 'localidad', 'required');
			$this->form_validation->set_rules('municipio_localidad', 'estado_localidad', 'required');
			$this->form_validation->set_rules('estado_localidad', 'estado_localidad', 'required');
			$this->form_validation->set_rules('estado_civil', 'estado_civil', 'required');
			$this->form_validation->set_rules('sexo', 'sexo', 'required');
			$this->form_validation->set_rules('tipo_escuela_nivel_medio_superior', 'tipo_escuela_nivel_medio_superior', 'required');
			$this->form_validation->set_rules('institucion', 'institucion', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('telefono', 'telefono', 'required');
			$this->form_validation->set_rules('facebook', 'facebook', 'required');
			$this->form_validation->set_rules('twitter', 'twitter', 'required');
			$this->form_validation->set_rules('instagram', 'instagram', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('response' => "error", 'message' => validation_errors());
			} else {
				if (isset($_FILES["acta_nacimiento"]["name"])) {
					$config['upload_path'] = "./assets/template/dist/img/uploads";
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size']     = '1000';
					// $config['max_width'] = '1024';
					// $config['max_height'] = '768';
					$this->load->library('upload', $config);

						//ACTA
			$file_name = $_FILES['acta_nacimiento']['name'];
			$file_size = $_FILES['acta_nacimiento']['size'];
			$file_tmp = $_FILES['acta_nacimiento']['tmp_name'];
			$file_type = $_FILES['acta_nacimiento']['type'];

			$imagen_temporal = $file_tmp;
			$tipo = $file_type;

			$fp= fopen($imagen_temporal, 'r+b');
			$binario = fread($fp, filesize($imagen_temporal));
			fclose($fp);
			$ajax_data['acta_nacimiento'] = $binario; // Documento pdf
			$ajax_data['nombre_acta'] = $file_name; // name file
		   }
		   ///////////////////CERTIFICADO
		   if (isset($_FILES["certificado_bachillerato"]["name"])) {
			$config['upload_path'] = "./assets/template/dist/img/uploads";
			$config['allowed_types'] = 'gif|jpg|png|pdf';
			$config['max_size']     = '1000';
			// $config['max_width'] = '1024';
			// $config['max_height'] = '768';
			$this->load->library('upload', $config);
			$file_name_certi = $_FILES['certificado_bachillerato']['name'];
			$file_size_certi = $_FILES['certificado_bachillerato']['size'];
			$file_tmp_certi = $_FILES['certificado_bachillerato']['tmp_name'];
			$file_type_certi = $_FILES['certificado_bachillerato']['type'];

			$imagen_temporal_certi = $file_tmp_certi;
			$tipo_certi = $file_type_certi;

			$fp_certi = fopen($imagen_temporal_certi, 'r+b');
			$binario_certi = fread($fp_certi, filesize($imagen_temporal_certi));
			fclose($fp_certi);
			$ajax_data['certificado_bachillerato'] = $binario_certi; // Documento pdf
			$ajax_data['nombre_certificado_bachillerato'] = $file_name_certi;//$this->upload->data('file_name_certi'); // name file


		   }
			//CURP
			if (isset($_FILES["curp"]["name"])) {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$this->load->library('upload', $config);

			$file_name_curp = $_FILES['curp']['name'];
			$file_size_curp = $_FILES['curp']['size'];
			$file_tmp_curp = $_FILES['curp']['tmp_name'];
			$file_type_curp = $_FILES['curp']['type'];

			$imagen_temporal_curp = $file_tmp_curp;
			$tipo_curp = $file_type_curp;

			$fp_curp = fopen($imagen_temporal_curp, 'r+b');
			$binario_curp = fread($fp_curp, filesize($imagen_temporal_curp));
			fclose($fp_curp);
			$ajax_data['curp'] = $binario_curp; // Documento pdf
			$ajax_data['nombre_curp'] = $file_name_curp;//$this->upload->data('file_name_curp'); // name file

			}
			//CERTIFICADO MEDICO
			if (isset($_FILES["certificado_medico"]["name"])) {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$this->load->library('upload', $config);

			$file_name_certim= $_FILES['certificado_medico']['name'];
			$file_size_certim = $_FILES['certificado_medico']['size'];
			$file_tmp_certim = $_FILES['certificado_medico']['tmp_name'];
			$file_type_certim = $_FILES['certificado_medico']['type'];

			$imagen_temporal_certim = $file_tmp_certim;
			$tipo_certim = $file_type_certim;

			$fp_certim = fopen($imagen_temporal_certim, 'r+b');
			$binario_certim = fread($fp_certim, filesize($imagen_temporal_certim));
			fclose($fp_certim);
			$ajax_data['certificado_medico'] = $binario_certim; // Documento pdf
			$ajax_data['nombre_certificado_medico'] = $file_name_certim;//$this->upload->data('file_name_certim'); // name file

			}
			$numero_control = $this->input->post('numero_control');
            $ajax_data['nombres'] = $this ->input->post('nombres');
			$ajax_data['apellido_paterno'] = $this ->input->post('apellido_paterno');
			$ajax_data['apellido_materno'] = $this ->input->post('apellido_materno');
			$ajax_data['direccion'] = $this ->input->post('direccion');
			$ajax_data['municipio_direccion'] = $this ->input->post('municipio_direccion');
			$ajax_data['estado_direccion'] = $this ->input->post('estado_direccion');
			$ajax_data['fecha_nacimiento'] = $this ->input->post('fecha_nacimiento');
			$ajax_data['fecha_inscripcion'] = $this ->input->post('fecha_inscripcion');
			$ajax_data['localidad'] = $this ->input->post('localidad');
			$ajax_data['municipio_localidad'] = $this ->input->post('municipio_localidad');
			$ajax_data['estado_localidad'] = $this ->input->post('estado_localidad');
			$ajax_data['estado_civil'] = $this ->input->post('estado_civil');
			$ajax_data['sexo'] = $this ->input->post('sexo');
			$ajax_data['tipo_escuela_nivel_medio_superior'] = $this ->input->post('tipo_escuela_nivel_medio_superior');
			$ajax_data['institucion'] = $this ->input->post('institucion');
			$ajax_data['email'] = $this ->input->post('email');
			$ajax_data['telefono'] = $this ->input->post('telefono');
			$ajax_data['facebook'] = $this ->input->post('facebook');
			$ajax_data['twitter'] = $this ->input->post('twitter');
			$ajax_data['instagram'] = $this ->input->post('instagram');


			if ($this->Modelo_Alumnos->update($numero_control,$ajax_data)) {
				$data = array('response' => "success", 'message' => "Datos actualizados correctamente");
			} else {
				$data = array('response' => "error", 'message' => "Error al agregar datos...!");
			}

			}


			echo json_encode($data);

			}
		  else{
			echo "No se permite este acceso directo...!!!";
		}
	}

	/* -------------------------------------------------------------------------- */
	/*                                Fetch Records                               */
	/* -------------------------------------------------------------------------- */

	public function veralumno ()
	{
		$carrera = $this->input->post('carrera');
		$cuatrimestre = $this->input->post('cuatrimestre');
		$opcion = $this->input->post('opcion');
		$posts = $this->Modelo_Alumnos->obteneralumnos($carrera,$cuatrimestre,$opcion);
		echo json_encode($posts);
	}

	public function verperiodo_activo()
	{
		$posts = $this->Modelo_Alumnos->periodo_activo();
		echo json_encode($posts);
	}

	public function secuencia_derecho()
	{
		$posts = $this->Modelo_Alumnos->secuencia_derecho();
		echo json_encode($posts);
	}
	public function secuencia_psicologia()
	{
		$posts = $this->Modelo_Alumnos->secuencia_psicologia();
		echo json_encode($posts);
	}
	public function secuencia_criminalistica()
	{
		$posts = $this->Modelo_Alumnos->secuencia_criminalistica();
		echo json_encode($posts);
	}
	public function secuencia_diseno()
	{
		$posts = $this->Modelo_Alumnos->secuencia_diseno();
		echo json_encode($posts);
	}
	public function secuencia_contaduria()
	{
		$posts = $this->Modelo_Alumnos->secuencia_contaduria();
		echo json_encode($posts);
	}


	public function verActaalumno($id){
		$consulta = $this->Modelo_Alumnos->getacta($id);
		$archivo = $consulta['acta_nacimiento'];
		$img = $consulta['nombre_acta'];
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=$img.pdf");
		print_r($archivo);

	}
	public function verCertificadoalumno($id){
		$consulta = $this->Modelo_Alumnos->getcertificado($id);
		$archivo = $consulta['certificado_bachillerato'];
		$img = $consulta['nombre_certificado_bachillerato'];
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=$img.pdf");
		print_r($archivo);

	}
	public function verCurpalumno($id){
		$consulta = $this->Modelo_Alumnos->getcurp($id);
		$archivo = $consulta['curp'];
		$img = $consulta['nombre_curp'];
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=$img.pdf");
		print_r($archivo);

	}
	public function verCertificadoMedicoalumno($id){
		$consulta = $this->Modelo_Alumnos->getcertificadomedico($id);
		$archivo = $consulta['certificado_medico'];
		$img = $consulta['nombre_certificado_medico'];
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=$img.pdf");
		print_r($archivo);

	}


	public function editaralumno(){
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');
			if ($post = $this->Modelo_Alumnos->single_entry($edit_id)) {
				$data = array('responce' => "success", "post" => $post);
			}else{
				$data = array('responce' => "error", "failed to fetch");
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
	}


	/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */

public function eliminaralumno()
{
	if ($this->input->is_ajax_request()) {

		$del_id = $this->input->post('numero_control');
		$ajax_data['estatus_alumno_activo'] = $this->input->post('estatus_alumno_activo');
		if ($this->Modelo_Alumnos->update($del_id,$ajax_data)) {
			$data = array('responce' => "success",'message' => "¡Alumno dado de baja!");
		} else {
			$data = array('responce' => "error", 'message' => "¡No se pudo dar de baja!");
		}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}



}  // Fin del controller
function updateTeamLogo() {
	global $server, $db, $dbUser, $dbKey;

	try {
	  $conn = new PDO("mysql:host=" . $server . ";dbname=" . $db, $dbUser, $dbKey);
	  $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	  $file = $_FILES["teamLogo"]["tmp_name"];

	  if(!isset($file)) {
		echo "Please select an image to upload";
	  } else {
		$fileSize = getimagesize($_FILES["teamLogo"]["tmp_name"]);

		if ($fileSize) {
		  $img = file_get_contents($_FILES["teamLogo"]["tmp_name"]);
		  $sql = $conn -> prepare("UPDATE Team SET (teamID, teamLogo) VALUES (:teamID, :teamLogo) WHERE teamID=:teamID");
		  $sql -> bindValue(":teamID", $_POST["teamID"]);
		  $sql -> bindValue(":teamLogo", $img);

		  $result = $sql -> execute();

		  if ($result == null) {
			echo "Error uploading image";
		  } else {
			echo "Image uploaded";
		  }
		} else {
		  echo "The file to be uploaded is not an image";
		}
	  }
	}

	catch(PDOException $e) {
	  echo "An error occured: " . $e -> getMessage();
	}

	$conn = null;
  }

  if (isset($_POST["updateTeam"])) {
	updateTeamLogo();
  }
