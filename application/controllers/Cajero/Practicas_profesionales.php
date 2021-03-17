<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practicas_profesionales extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_ProcesoFinal");
	 }

	public function index(){

		$numero_control =  $this->session->userdata('username');

		$data  = array(
			'permisos' => $this->permisos,
			'datosAlumnoProcesoFinal' => $this->Modelo_ProcesoFinal->obtenerDatosDelAlumnoProcFin($numero_control),
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Alumno/VistaPracticas_profesionales',$data);
		$this->load->view('layouts/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                   Insert  OFICIO PARA PRACTICAS                            */
	/* -------------------------------------------------------------------------- */

	public function insertarOficioPracticasProfesional(){

		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('alumno', 'Número de control', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload("archivo")) {
					$data = array('res' => "error", 'message' => $this->upload->display_errors());
				} else {
				  $file_name = $_FILES['archivo']['name'];
					$file_size = $_FILES['archivo']['size'];
					$file_tmp = $_FILES['archivo']['tmp_name'];
					$file_type = $_FILES['archivo']['type'];

					$imagen_temporal = $file_tmp;
					$tipo = $file_type;

					$fp = fopen($imagen_temporal, 'r+b');
					$binario = fread($fp, filesize($imagen_temporal));
					fclose($fp);

					$ajax_data = $this->input->post();
					$ajax_data['archivo'] = $binario; // Documento pdf
					$ajax_data['nombre_archivo'] = $this->upload->data('file_name'); // name file

					if ($this->Modelo_ProcesoFinal->insert_OficioPracticasProf($ajax_data)) {
						$data = array('res' => "success", 'message' => "Archivo guardado correctamente...!");
					} else {
						$data = array('res' => "error", 'message' => "Error al guardado el archivo...!");
					}
				}
			}
			echo json_encode($data);
		} else {
			echo "No se permite este acceso directo...!!!";
		}
	}





	public function mostrarOpcionSubirOficioPracticasProf(){
		if ($this->input->is_ajax_request()) {
		 $numero_control = $this->input->post('numero_control');
				if ($this->Modelo_ProcesoFinal->opcionSubirOfiPracticasProf($numero_control)) {
					$data = array('responce' => 'success', 'message' => "Ya puede realizar las Practicas Profesionales...!!!");
				} else {
						$data = array('responce' => 'error');
				}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
		}
	}





}  // Fin del controller
