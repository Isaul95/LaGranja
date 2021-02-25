<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SolicitarReciboPago extends CI_Controller {

	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_RegistrosPag");
	 }


	public function index(){

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_Finanzas/VistaSolicitarReciboPago');
		$this->load->view('layouts/footer');
	}


	/* -------------------------------------------------------------------------- */
	/*                               Insert Records                               */
	/* -------------------------------------------------------------------------- */

	public function insertarPagos(){

		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nombre', 'Nombre Alumno', 'required');
			$this->form_validation->set_rules('numero_con', 'Número de control', 'required');
			$this->form_validation->set_rules('carrera', 'Carrera', 'required');
			$this->form_validation->set_rules('semestre', 'Semestre', 'required');

			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {
				$config['upload_path'] = "./assets/template/dist/img/uploads";
				$config['allowed_types'] = 'gif|jpg|png|pdf';
				$config['max_size']     = '1000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
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
		$ajax_data['img'] = $this->upload->data('file_name'); // name file

					if ($this->Modelo_RegistrosPag->insert_entry($ajax_data)) {
						$data = array('res' => "success", 'message' => "Datos agregados correctamente...!");
					} else {
						$data = array('res' => "error", 'message' => "Error al agregar datos...!");
					}
				}
			}
			echo json_encode($data);
		} else {
			echo "No se permite este acceso directo...!!!";
		}

	}




	/* -------------------------------------------------------------------------- */
	/*                                Fetch Records                               */
	/* -------------------------------------------------------------------------- */

	public function listarPagos()
	{
		$posts = $this->Modelo_RegistrosPag->obtenerListaPagos();
		echo json_encode($posts);
	}




	public function verArchivo($id){
		$consulta = $this->Modelo_RegistrosPag->getArchivoId($id);
		$archivo = $consulta['archivo'];
		$img = $consulta['img'];
		header("Content-type: application/pdf");
		header("Content-Disposition: inline; filename=$img.pdf");
		print_r($archivo);

	}


	/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */

public function eliminarPagos()
{
	if ($this->input->is_ajax_request()) {

		$del_id = $this->input->post('del_id');

		$post = $this->Modelo_RegistrosPag->single_entry($del_id);

		unlink(APPPATH . '../assets/template/dist/img/uploads/' . $post->img);

		if ($this->Modelo_RegistrosPag->delete_entry($del_id)) {
			$data = array('res' => "success", 'message' => "Datos eliminados con éxito...!");
		} else {
			$data = array('res' => "error", 'message' => "No se pudo eliminar...!");
		}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}



}  // Fin del controller
