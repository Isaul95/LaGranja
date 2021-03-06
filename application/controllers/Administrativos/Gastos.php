<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("gastos/ModeloGastos");
	 }

	public function index(){
		$data  = array(
			'permisos' => $this->permisos,
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/gastos/VistaGastos',$data);
		$this->load->view('layouts/footer');
	}
# Listar Apertura
public function listarGastos(){
    $posts = $this->ModeloGastos->listarGastos();
    echo json_encode($posts);
}



# Agregar nueva Apertura
	public function agregarGasto(){


		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('total', 'Total', 'required');


			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {


	      $ajax_data = array(
	        //'cantidad' => $this->input->post('cantidad'),
          'tipo' => $this->input->post('tipo'),
	        'fecha' => $this->input->post('fecha'),
          'total' => $this->input->post('total'),
	        'usuario' => $this->input->post('usuario'),

	      );

				if ($this->ModeloGastos->agregarGasto($ajax_data)) {
					$data = array('res' => "success", 'message' => "¡Registro agregado!");
	  		} else {
					$data = array('res' => "error", 'message' => "¡Error! :(");
				}

	 		echo json_encode($data);


			}
		} else {
			echo "No se permite este acceso directo...!!!";
		}
	}



# Eliminar Apertura

public function eliminarGasto(){

	if ($this->input->is_ajax_request()) {
		$del_id = $this->input->post('del_id');
	if ($this->ModeloGastos->delete_entry($del_id)) {

			$data = array('responce' => "success");
	} else {

			$data = array('responce' => "error", "No se pudo eliminar...!");
	}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function editarGasto(){

	if ($this->input->is_ajax_request()) {

		$edit_id = $this->input->post('edit_id');
		if ($post = $this->ModeloGastos->single_entry($edit_id)) {
			$data = array('responce' => "success", "post" => $post);
		}else{
			$data = array('responce' => "error", "failed to fetch");
		}
		echo json_encode($data);
	}else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function updateGasto(){

	if ($this->input->is_ajax_request()) {
    $this->form_validation->set_rules('tipo', 'Descripcion', 'required');
    $this->form_validation->set_rules('total', 'Total', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array('res' => "error", 'message' => validation_errors());
		} else {

			$idegreso = $this->input->post('idegreso');

			$ajax_data = array(
				//'cantidad' => $this->input->post('cantidad'),
				'tipo' => $this->input->post('tipo'),
        'fecha' => $this->input->post('fecha'),
        'total' => $this->input->post('total'),
				'usuario' => $this->input->post('usuario'),
			);


			if ($this->ModeloGastos->actualizarGasto($idegreso,$ajax_data)) {
				//
				$data = array('responce' => "success", 'message' => "¡Apertura actualizada!");
				} else {
          $data = array('responce' => "error", 'message' => "Error al agregar datos...!");
					//$data = array('responce' => "error", 'message' => "");
				}
			}
			echo json_encode($data);
		}else {
			echo "No se permite este acceso directo...!!!";
		}
}	// Fin de funcion editar


}  // Fin del controller
