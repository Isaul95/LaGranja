<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeriodoEscolar extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_PeriodoEscolar");
	 }

	public function index(){
		$data  = array(
			'permisos' => $this->permisos,
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/Vistas_administrativos/VistaPeriodoEscolar',$data);
		$this->load->view('layouts/footer');
	}

////////////  VISUALIZACIÓN DE LOS PERIODOS ESCOLARES /////////////////////////////
public function verperiodos()
{
    $posts = $this->Modelo_PeriodoEscolar->obtenerlistaperiodos();
    echo json_encode($posts);
}

////////////  INSERCIÓON DE LOS PERIODOS ESCOLARES /////////////////////////////
	public function insertarperiodos(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nombre_ciclo', 'ciclo', 'required');
			$this->form_validation->set_rules('fecha_inicial', 'fecha_inicial', 'required');
			$this->form_validation->set_rules('fecha_final', 'fecha_final', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {
        $ajax_data = $this->input->post();
        					if ($this->Modelo_PeriodoEscolar->insert_entry($ajax_data)) {
						$data = array('res' => "success", 'message' => "¡Periodo agregado!");
					} else {
						$data = array('res' => "error", 'message' => "");
					}
				
			}
			echo json_encode($data);
		} else {
			echo "No se permite este acceso directo...!!!";
		}

	}

////////////  ELIMINACIÓN DE LOS PERIODOS ESCOLARES /////////////////////////////
public function eliminarperiodos(){
	if ($this->input->is_ajax_request()) {
		$del_id = $this->input->post('del_id');
	if ($this->Modelo_PeriodoEscolar->delete_entry($del_id)) {
			$data = array('responce' => "success");
	} else {
			$data = array('responce' => "error", "No se pudo eliminar...!");
	}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function editarperiodos(){
	if ($this->input->is_ajax_request()) {
		$edit_id = $this->input->post('edit_id');
		if ($post = $this->Modelo_PeriodoEscolar->single_entry($edit_id)) {
			$data = array('responce' => "success", "post" => $post);
		}else{
			$data = array('responce' => "error", "failed to fetch");
		}
		echo json_encode($data);
	}else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function updateperiodos(){
	if ($this->input->is_ajax_request()) {
		$this->form_validation->set_rules('ciclo_update', 'ciclo', 'required');
		$this->form_validation->set_rules('fecha_inicial_update', 'fecha_inicial', 'required');
		$this->form_validation->set_rules('fecha_final_update', 'fecha_final', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data = array('res' => "error", 'message' => validation_errors());
		} else {
			$data['id_periodo_escolar'] = $this ->input->post('id_periodo_escolar_update');
			$data['nombre_ciclo'] = $this ->input->post('ciclo_update');
			$data['fecha_inicial'] = $this ->input->post('fecha_inicial_update');
			$data['fecha_final'] = $this ->input->post('fecha_final_update');
	
						if ($this->Modelo_PeriodoEscolar->update($data)) {
					$data = array('responce' => "success", 'message' => "¡Periodo actualizado!");
				} else {
					$data = array('responce' => "error", 'message' => "");
				}
			
		}
		echo json_encode($data);
	}else {
		echo "No se permite este acceso directo...!!!";
	}
}


}  // Fin del controller
