<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistroPagos extends CI_Controller {  // INICIO DEL CONTROLLER


	public function __construct(){ //
	 	 parent::__construct();
		 		$this->load->helper(array('form', 'url'));
		 		$this->load->library('form_validation');
	 	    $this->load->model("Modelo_RegistroPago");
	 }


	public function index(){
		// $data = array('RegistroPago' => $this->Modelo_RegistroPago->getRegistroPago(),
		// );
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
/*  lista_RegistroPago => LISTA POR DEFAULTA ES L PRIMERA VISTA D TODOS  */
	   $this->load->view('admin/Vistas_RegistroPago/lista_RegistroPago');
		$this->load->view('layouts/footer');
	}


// ***************************  INICIO FUNCTION PARA INSRTAR  ************************************
	public function insertar(){

			if ($this->input->is_ajax_request()) {
					// $this->form_validation->set_rules('name', 'Name', 'required');
					// $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

						// if ($this->form_validation->run() == FALSE) {
									$data = array('responce' => 'error', 'message' => validation_errors());


													$config = [
														"upload_path" => "./assets/template/dist/img/uploads",
														'allowed_types' => "pdf|jpg"
													];
													$this->load->library("upload", $config);

													if($this->upload->do_upload('archivo')) {
														$data = array('archivo' => $this->upload->data());

																	if ($this->Modelo_RegistroPago->insertar_resgistroPagos($data)) {
																			$data = array('responce' => 'success', 'message' => 'Record added Successfully');
																	} else {
																			$data = array('responce' => 'error', 'message' => 'Failed to add record');
																	}
																		echo json_encode($data);

													}else {
														echo $this->upload->display_errors();
													}



						// } else {



	    } else {
					echo "No direct script access allowed";
			}

		} // Fin del insertar




// *************************  FUINCTION PARA HAXCER LA CONSULTA GRAL. ******************************
public function listar(){

	if ($this->input->is_ajax_request()) {
		// if ($posts = $this->crud_model->get_entries()) {
		// 	$data = array('responce' => 'success', 'posts' => $posts);
		// }else{
		// 	$data = array('responce' => 'error', 'message' => 'Failed to fetch data');
		// }
		$posts = $this->Modelo_RegistroPago->listaPagos();
		$data = array('responce' => 'success', 'posts' => $posts);
		echo json_encode($data);
	} else {
		echo "No direct script access allowed";
	}

}




// ****************************  FUINCTION PARA ELIMINAR  DATES  **********************************
public function eliminar(){

	if ($this->input->is_ajax_request()) {
		$del_id = $this->input->post('del_id');

		if ($this->Modelo_RegistroPago->delete($del_id)) {
			$data = array('responce' => 'success');
		} else {
			$data = array('responce' => 'error');
		}
		echo json_encode($data);
	} else {
		echo "No direct script access allowed";
	}
}

// *************************  FUINCTION PARA EDITAR Y UPDATE DATES  ******************************

public function edit(){

		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');

			if ($post = $this->Modelo_RegistroPago->edit($edit_id)) {
				$data = array('responce' => 'success', 'post' => $post);
			} else {
				$data = array('responce' => 'error', 'message' => 'failed to fetch record');
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function update()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_name', 'Name', 'required');
			$this->form_validation->set_rules('edit_email', 'Email', 'required|valid_email');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$data['id'] = $this->input->post('edit_record_id');
				$data['name'] = $this->input->post('edit_name');
				$data['email'] = $this->input->post('edit_email');

				if ($this->Modelo_RegistroPago->update($data)) {
					$data = array('responce' => 'success', 'message' => 'Record update Successfully');
				} else {
					$data = array('responce' => 'error', 'message' => 'Failed to update record');
				}
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}



}  // FIN/XCIERRE DEL CONTROLLER
