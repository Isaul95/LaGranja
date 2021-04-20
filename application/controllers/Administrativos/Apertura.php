<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apertura extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("apertura/ModeloApertura");
	 }

	public function index(){
		$data  = array(
			'permisos' => $this->permisos,
		);
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/apertura/VistaApertura',$data);
		$this->load->view('layouts/footer');
	}
# Listar Apertura
public function listarAperturas(){
    $posts = $this->ModeloApertura->listarAperturas();
		//print_r($posts);

    echo json_encode($posts);
}

public function getFechaApertura(){
    $posts = $this->ModeloApertura->traerFecha();
    echo json_encode($posts);
}

# Agregar nueva Apertura
	public function agregarApertura(){


		if ($this->input->is_ajax_request()) {

			$this->form_validation->set_rules('monto', 'monto', 'required');


			if ($this->form_validation->run() == FALSE) {
				$data = array('res' => "error", 'message' => validation_errors());
			} else {

				//Productos
				$productosA = array('Pollo rostizado' => 2,
														'Pollo asado' => 2,
														'Pech. broaster' => 7,
														'Muslo broaster' => 7,
														'Pierna broaster' => 7,
														'Ala broaster' => 7,
														'Alitas bbq' => 2,
														'Barbacoa de pollo' => 1,
														'Spagueti blanco' => 2,
														'Spagueti rojo' => 1,
														'Arroz blanco' => 1,
														'Arroz rojo' => 2,
														'Frijoles puercos' => 1,
														'Frijoles peruanos' => 2,
														'Frijoles charros' => 2,
														'Cochinita' => 1,
														'Pure' => 1,
														'Nuggets' => 4,
														'Mininuggets' => 8,
														'Tacos' => 30
													);


			$fff=$this->input->post('fecha');
			$fc = $this->ModeloApertura->traerFechaA($fff);
			// Se compara si ya hay una apertura con la fecha actual
		   if ($fc == null || $fc == '') {


		      $ajax_data = array(
		        'monto' => $this->input->post('monto'),
	          'fecha' => $this->input->post('fecha'),
		        'hora' => $this->input->post('hora'),
		        'usuario' =>  $this->input->post('usuario'),

		      );

					if ($this->ModeloApertura->agregarApertura($ajax_data)) {

						// Agregar Productos
						foreach ($productosA as $product => $cant) {
							// code...
							$piezas_nuevas = floatval($cant);
							//Se obtiene la cantidad de productos disponibles actual
							$canPro=$this->ModeloApertura->getCantidadProducto($product);

							foreach ($canPro->result() as $rowP){
								$cantidadAnterior = floatval($rowP->cantidad);
							}
							//Se obtiene la nueva cantidad
							$cantidadNueva = $cantidadAnterior + $piezas_nuevas;
							// Actualiza la cantidad en la tabla productos
							$this->ModeloApertura->actualizarCantidadProducto($product, $cantidadNueva);
						}


						$data = array('res' => "success", 'message' => "¡Registro agregado!");

		  		} else {
						$data = array('res' => "error", 'message' => "¡Error! :(");
					}

		 		echo json_encode($data);


			}else {
				// En caso de que si haya una apertura con la fecha actual
				$data = array('res' => "error", 'message' => "¡Error! Ya existe una apertura con esta fecha :(");
				echo json_encode($data);
			}
			}


		} else {
			echo "No se permite este acceso directo...!!!";
		}
	}



# Eliminar Apertura

public function eliminarApertura(){

	if ($this->input->is_ajax_request()) {
		$del_id = $this->input->post('del_id');
	if ($this->ModeloApertura->delete_entry($del_id)) {

			$data = array('responce' => "success");
	} else {

			$data = array('responce' => "error", "No se pudo eliminar...!");
	}
		echo json_encode($data);
	} else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function editarApertura(){

	if ($this->input->is_ajax_request()) {

		$edit_id = $this->input->post('edit_id');
		if ($post = $this->ModeloApertura->single_entry($edit_id)) {
			$data = array('responce' => "success", "post" => $post);
		}else{
			$data = array('responce' => "error", "failed to fetch");
		}
		echo json_encode($data);
	}else {
		echo "No se permite este acceso directo...!!!";
	}
}

public function updateApertura(){

	if ($this->input->is_ajax_request()) {
    $this->form_validation->set_rules('monto', 'Monto', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array('res' => "error", 'message' => validation_errors());
		} else {

			$id_apertura = $this->input->post('id_apertura');

			$ajax_data = array(
				'monto' => $this->input->post('monto'),
				'fecha' => $this->input->post('fecha'),
        'hora' => $this->input->post('hora'),
				'usuario' => $this->input->post('usuario'),
			);


			if ($this->ModeloApertura->actualizarApertura($id_apertura,$ajax_data)) {
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
