<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Locales extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("locales/ModeloLocales");
	 }

	public function index(){
		$data  = array(
			'permisos' => $this->permisos,
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/locales/VistaLocales',$data);
		$this->load->view('layouts/footer');
	}
# Listar locales
public function listarLocales(){
    $posts = $this->ModeloLocales->listarLocales();
    echo json_encode($posts);
}


# Agregar nuevo local
	public function agregarLocal(){

		if ($this->input->is_ajax_request()) {




	      $ajax_data = array(
          'nombre' => $this->input->post('nombre'),
  				'direccion' => $this->input->post('direccion'),
  				'telefono' => $this->input->post('telefono'),
  				'encargado' => $this->input->post('encargado')
	      );

				if ($this->ModeloLocales->agregarLocal($ajax_data)) {
					$data = array('res' => "success", 'message' => "¡Local agregado!");
	  		} else {
					$data = array('res' => "error", 'message' => "¡Error! :(");
				}

	 		echo json_encode($data);



		} else {
			echo "No se permite este acceso directo...!!!";
		}
	}


# Eliminar mobiliario

public function eliminarLocal(){

	if ($this->input->is_ajax_request()) {
		$del_id = $this->input->post('del_id');
	if ($this->ModeloLocales->delete_entry($del_id)) {

			$data = array('responce' => "success");
	} else {

			$data = array('responce' => "error", "No se pudo eliminar...!");
	}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function editarLocal(){

	if ($this->input->is_ajax_request()) {

		$edit_id = $this->input->post('edit_id');
		if ($post = $this->ModeloLocales->single_entry($edit_id)) {
			$data = array('responce' => "success", "post" => $post);
		}else{
			$data = array('responce' => "error", "failed to fetch");
		}
		echo json_encode($data);
	}else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function updateLocales(){

	if ($this->input->is_ajax_request()) {


			$id_local = $this->input->post('id_local');


			$ajax_data = array(
				'nombre' => $this->input->post('nombre'),
				'direccion' => $this->input->post('direccion'),
				'telefono' => $this->input->post('telefono'),
				'encargado' => $this->input->post('encargado')
			);

			if ($this->ModeloLocales->actualizarLocal($id_local,$ajax_data)) {
				//
				$data = array('responce' => "success", 'message' => "¡Local actualizado!");
				} else {
          $data = array('responce' => "error", 'message' => "Error al agregar datos...!");
				}

			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
}	// Fin de funcion editar


}  // Fin del controller
