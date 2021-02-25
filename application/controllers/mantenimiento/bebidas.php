<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bebidas extends CI_Controller {

	   public function __construct(){
	 	 parent::__construct();
	 	 $this->load->model("Bebidas_model");
	 }
/* =========================== CONTROLADOR -- BEBIDASS ===================================*/
	
	public function index(){
		  $data = array('bebidas' => $this->Bebidas_model->getbebidas()
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/bebidas/listab', $data);
		$this->load->view('layouts/footer'); 
	}

	 public function agregar(){
	 	   

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/bebidas/addBebida');
		$this->load->view('layouts/footer'); 
	}

	public function store(){

		$Nombre_de_Bebida = $this->input->post("nombre_bebida");
		$Precio_de_Bebida = $this->input->post("precio_bebida");
		$Descripcion_de_Bebida = $this->input->post("descripcion_bebida");
		//$Fecha_caducidad = $this->input->post("caducidad");
	

   $this->form_validation->set_rules("nombre_bebida","Nombre de Bebida del Producto","required|is_unique[bebidas.nombre_bebida]");
   $this->form_validation->set_rules("precio_bebida", "El precio de la bebida", "required");
   $this->form_validation->set_rules("descripcion_bebida", "Descripcion de Bebida", "required"); 
      
      if ($this->form_validation->run()) {

      	 $data = array(
      	 	'nombre_bebida' => $Nombre_de_Bebida, 
			'precio_bebida' => $Precio_de_Bebida, 
			'descripcion_bebida' => $Descripcion_de_Bebida,
			//'Fecha_caducidad' => $Fecha_caducidad,
		);
		    if ($this->Bebidas_model->guardar($data)) {
		    	redirect(base_url()."mantenimiento/bebidas");
		    }  else{
		    	$this->session->set_flashdata("error", " ERROR: NO SE GUARDARON LOS DATOS");
		    	  redirect(base_url()."mantenimiento/bebidas/addBebida");
		       }
        }
           else{
           	   $this->agregar();
           }  
	}  

	  public function edit($id_bebida){

	 	$data = array(
			'bebidas' => $this->Bebidas_model->getBebida($id_bebida) 
		);

	 	$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/bebidas/editbeb', $data);
		$this->load->view('layouts/footer'); 
	 }

	 public function update(){

	 	$idProductos = $this->input->post("idProductos");
	 	$nombre_bebida = $this->input->post("nombre_bebida");
	 	$precio_bebida = $this->input->post("precio_bebida");
		$descripcion_bebida = $this->input->post("descripcion_bebida");
         
        $data = array(
        	'nombre_bebida' => $nombre_bebida, 
			'precio_bebida' => $precio_bebida, 
			'descripcion_bebida' => $descripcion_bebida,
		);

		if ($this->Bebidas_model->update($idProductos, $data)) {
			  redirect(base_url()."mantenimiento/bebidas");
		} else{
                $this->session->set_flashdata("error", " ERROR: NO SE ACTUALIZARÓN LOS DATOS");
		    	  redirect(base_url()."mantenimiento/bebidas/editbeb".$idProductos);
		}
	 }

	 public function delete($id_bebida){
	 	$data = array(
	 		'id_bebida' => $id_bebida, 
	 	);

	 	$this->Bebidas_model->delete($data);
			 redirect(base_url()."mantenimiento/bebidas");
  // https://www.youtube.com/watch?v=3mdQdjc-dhA&list=PLsk-U_4GoSVMz3OzYGN7ZJWOm-rx2FvwS&index=14   --------ELIMINAR
	 }

	 public function edit2($id_Productos){

	 	$data = array(
			'productos' => $this->Productos_model->getProducto($id_Productos) 
		);

	 	$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/productos/edit2', $data);
		$this->load->view('layouts/footer'); 
	 }
}









