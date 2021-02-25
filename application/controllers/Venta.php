
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Venta extends CI_Controller {

  public function __construct(){
	 	 parent::__construct();
	 	  $this->load->model("consultamenu");

	 	   if (!$this->session->userdata("login")) {
	       	     	  redirect(base_url());
	       	     }
	 }
	 	
	public function index()
	{
		$estadoenturno="enturno";
	$vermesaenturno = array('mesadisponible' => $this->consultamenu->versilamesaestadisponible($estadoenturno));

	   /* $this->load->view('admin/login');*/
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/elegir_mesa', $vermesaenturno);
		$this->load->view('layouts/footer'); 

	}
   public function veropcionesdelcliente()
	{
	   /* $this->load->view('admin/login');*/
		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/opcionesdelcliente');
		$this->load->view('layouts/footer'); 

	}

}