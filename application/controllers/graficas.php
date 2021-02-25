<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Graficas extends CI_Controller {

  public function __construct(){
         parent::__construct();
         $this->load->model("consultaventas");

           if (!$this->session->userdata("login")) {
                      redirect(base_url());
                 }
     }
    
    public function index()
    {
        $data = array(
      'cantventa' => $this->consultaventas->rowcount("venta"),
      'cantUsuarios' => $this->consultaventas->rowcount("usuarios"),
    'cantdescripcion_de_venta' => $this->consultaventas->rowcount("descripcion_de_venta"),

   );
       /* $this->load->view('admin/login');*/
        $this->load->view('layouts/header');
        $this->load->view('layouts/aside');
        $this->load->view('admin/Graficas', $data);
        $this->load->view('layouts/footer'); 

    }
}
