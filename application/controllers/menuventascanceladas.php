<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menuventascanceladas extends CI_Controller {
  public function __construct(){ // crear constructor
     parent::__construct();   // hereda
     $this->load->model("consultaventascanceladas");
  
   }
  public function index(){
     $totaldeldia = array(
    'ventasdeldia' => $this->consultaventascanceladas->totaldeldia(), 
    'mesasconcancelaciones' => $this->consultaventascanceladas->mesasconcancelaciones());
$this->load->view('layouts/header');
    $this->load->view('layouts/aside');
     $this->load->view('admin/seleccionemesaparamostrarventasporidcanceladas', $totaldeldia);/*la vista k contrendra el contenido*/
    $this->load->view('layouts/footer');

  }

  public function ventasdiariasporid($numerodemesa){
    $numerodemesa = $numerodemesa;
       $ventasdiariasid = array(
    'id_ventasmesa1' => $this->consultaventascanceladas->idventasenlamesa1($numerodemesa),
 'totalesmesa1'=>$this->consultaventascanceladas->sumadelasventasendeterminadamesa($numerodemesa),
'numerodemesa'=>$numerodemesa);
/*   >Mostrar_comida< == carpeta dentro de la vista/admin y  >list<== file k hace la consulta   */
$this->load->view('layouts/header');
    $this->load->view('layouts/aside');
     $this->load->view('admin/ventasporidcanceladas', $ventasdiariasid);/*la vista k contrendra el contenido*/
    $this->load->view('layouts/footer');
  }
  public function ventasdiariacomidabebidayextras($identurno, $numerodemesa, $fecha){

 $ventasdiariasid = array(
    'ventadiariabebidas' => $this->consultaventascanceladas->detalledeventadiariobebida($identurno, $numerodemesa), 
    'ventadiariaextras' => $this->consultaventascanceladas->detalledeventadiarioextras($identurno, $numerodemesa), 
    'ventadiariacomida' => $this->consultaventascanceladas->detalledeventadiariocomida($identurno, $numerodemesa),
    'idventa'=>$identurno, 
    'totalpagocambioventaparticular'=> $this->consultaventascanceladas->totalpagocambiodeunaventaenparticular($identurno, $numerodemesa), 
    'numerodemesa'=>$numerodemesa, 
    'Fecha' => $fecha);
/*   >Mostrar_comida< == carpeta dentro de la vista/admin y  >list<== file k hace la consulta   */
$this->load->view('layouts/header');
    $this->load->view('layouts/aside'); 
     $this->load->view('admin/listcanceladas', $ventasdiariasid);/*la vista k contrendra el contenido*/
    $this->load->view('layouts/footer');
  }

  public function productoscancelados(){
     $cancelaciones = array(
    'bebidascanceladas' => $this->consultaventascanceladas->bebidacancelada(), 
    'extrascancelados' => $this->consultaventascanceladas->extrascancelados(), 
    'comidacancelada' => $this->consultaventascanceladas->comidacancelada(), 
  'ventasdeldia' => $this->consultaventascanceladas->totaldeldia());
/*   >Mostrar_comida< == carpeta dentro de la vista/admin y  >list<== file k hace la consulta   */
$this->load->view('layouts/header');
    $this->load->view('layouts/aside'); 
     $this->load->view('admin/productoscancelados', $cancelaciones);/*la vista k contrendra el contenido*/
    $this->load->view('layouts/footer');
  }


  




}