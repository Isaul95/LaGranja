<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class comida extends CI_Controller {


	public function __construct(){ // crear constructor
	 	 parent::__construct();   // hereda
	 	 $this->load->model("menu_model");
	 }

	
	public function index()
	{
		$data = array('comida' => $this->menu_model->getmenu(),
		);

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
/*   >Mostrar_comida< == carpeta dentro de la vista/admin y  >list<== file k hace la consulta   */
	   $this->load->view('admin/comida/list', $data);/*la vista k contrendra el contenido*/
		$this->load->view('layouts/footer');
	}

	public function agregar(){
		
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
	   $this->load->view('admin/comida/agregar');/*la vista k contrendra el contenido*/
		$this->load->view('layouts/footer');
	}


	public function store(){
		$Nombre_del_platillo = $this->input->post("nombre_de_categoria");
		$Precio_Asada = $this->input->post("precio_asada");
		$Precio_Chorizo = $this->input->post("precio_chorizo");

        $Precio_Campechano = $this->input->post("precio_campechano_a");
		$Precio_Barbacha = $this->input->post("precio_barbacha");
		$Precio_Costilla = $this->input->post("precio_costilla");
		$Precio_Sencilla = $this->input->post("precio_sencilla");
		$Descripcion = $this->input->post("descripcion");

	$this->form_validation->set_rules("nombre_de_categoria","Nombre de platillo","required|is_unique[categoria.nombre_de_categoria]");
   $this->form_validation->set_rules("precio_asada", "Precio de platillo", "required");
   $this->form_validation->set_rules("precio_chorizo", "precio de platillo", "required"); 

   $this->form_validation->set_rules("precio_campechano_a", "Precio de platillo", "required");
   $this->form_validation->set_rules("precio_barbacha", "Precio de platillo", "required"); 
   $this->form_validation->set_rules("precio_costilla", "Precio de platillo", "required"); 
   $this->form_validation->set_rules("precio_sencilla", "Precio de platillo", "required");
   $this->form_validation->set_rules("descripcion", "Descripcion de platillo", "required"); 


   if ($this->form_validation->run()) {

      	 $data = array(
      	 	'nombre_de_categoria' => $Nombre_del_platillo, 
			'precio_asada' => $Precio_Asada, 
			'precio_chorizo' => $Precio_Chorizo,
			
			'precio_campechano_a' => $Precio_Campechano, 
			'precio_barbacha' => $Precio_Barbacha, 
			'precio_costilla' => $Precio_Costilla,
			'precio_sencilla' => $Precio_Sencilla, 
			'descripcion' => $Descripcion, 
		);
	

	   if ($this->menu_model->guardar($data)) {
		    	redirect(base_url()."mantenimiento/comida");
		    } else{
		    	$this->session->set_flashdata("error", " ERROR: NO SE GUARDARON LOS DATOS");
		    	  redirect(base_url()."mantenimiento/comida/agregar");
		       }
        } 
        else{
           	   $this->agregar();
           }  
	}  


	public function edit($id_comida){

	 	$data = array(
			'comida' => $this->menu_model->getComida($id_comida) 
		);
	 	$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/comida/edit', $data);
		$this->load->view('layouts/footer'); 
	 }

	 public function update(){

        $idProductos = $this->input->post("idProductos");
        $nombre_de_categoria = $this->input->post("nombre_de_categoria");
		$precio_asada = $this->input->post("precio_asada");
		$precio_chorizo = $this->input->post("precio_chorizo");

		$precio_campechano_a = $this->input->post("precio_campechano_a");
		$precio_barbacha = $this->input->post("precio_barbacha");
		$precio_costilla = $this->input->post("precio_costilla");

		$precio_sencilla = $this->input->post("precio_sencilla");
		$descripcion = $this->input->post("descripcion");


        $data = array(
        	'nombre_de_categoria' => $nombre_de_categoria, 
			'precio_asada' => $precio_asada, 
			'precio_chorizo' => $precio_chorizo,	

			'precio_campechano_a' => $precio_campechano_a, 
			'precio_barbacha' => $precio_barbacha, 
			'precio_costilla' => $precio_costilla,	

			'precio_sencilla' => $precio_sencilla, 
			'descripcion' => $descripcion,

				
		);

		if ($this->menu_model->update($idProductos, $data)) {
			  redirect(base_url()."mantenimiento/comida");
		} else{
                $this->session->set_flashdata("error", " ERROR: NO SE ACTUALIZARÓN LOS DATOS");
		    	  redirect(base_url()."mantenimiento/comida/edit".$idProductos);
		}
	 }


public function delete($id_comida){
	 	$data = array(
	 		'id_comida' => $id_comida, 
	 	);

	 	$this->menu_model->delete($data);
			redirect(base_url()."mantenimiento/comida");
  // https://www.youtube.com/watch?v=3mdQdjc-dhA&list=PLsk-U_4GoSVMz3OzYGN7ZJWOm-rx2FvwS&index=14   --------ELIMINAR
	 } 



}



