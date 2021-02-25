<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class menuventas extends CI_Controller {
  public function __construct(){ // crear constructor
     parent::__construct();   // hereda
     $this->load->model("consultaventas");
  
   }
  public function index(){
     $totaldeldia = array(
    'ventasdeldia' => $this->consultaventas->totaldeldia(), 
    'mesasconcompras' => $this->consultaventas->mesasconcompras());
$this->load->view('layouts/header');
    $this->load->view('layouts/aside');
     $this->load->view('admin/seleccionemesaparamostrarventasporid', $totaldeldia);/*la vista k contrendra el contenido*/
    $this->load->view('layouts/footer');

  }

  public function ventasdiariasporid($numerodemesa){
    $numerodemesa = $numerodemesa;
       $ventasdiariasid = array(
    'id_ventasmesa1' => $this->consultaventas->idventasenlamesa1($numerodemesa),
 'totalesmesa1'=>$this->consultaventas->sumadelasventasendeterminadamesa($numerodemesa),
'numerodemesa'=>$numerodemesa);
/*   >Mostrar_comida< == carpeta dentro de la vista/admin y  >list<== file k hace la consulta   */
$this->load->view('layouts/header');
    $this->load->view('layouts/aside');
     $this->load->view('admin/ventasporid', $ventasdiariasid);/*la vista k contrendra el contenido*/
    $this->load->view('layouts/footer');
  }
  public function ventasdiariacomidabebidayextras($identurno, $numerodemesa, $tipo_venta, $fecha, $hora){

 $ventasdiariasid = array(
    'ventadiariabebidas' => $this->consultaventas->detalledeventadiariobebida($identurno, $numerodemesa), 
    'ventadiariaextras' => $this->consultaventas->detalledeventadiarioextras($identurno, $numerodemesa), 
    'ventadiariacomida' => $this->consultaventas->detalledeventadiariocomida($identurno, $numerodemesa),
    'idventa'=>$identurno, 
    'totalpagocambioventaparticular'=> $this->consultaventas->totalpagocambiodeunaventaenparticular($identurno, $numerodemesa), 
    'numerodemesa'=>$numerodemesa, 
    'tipodeventa' => $tipo_venta, 
    'Fecha' => $fecha, 
    'Hora' => $hora);
/*   >Mostrar_comida< == carpeta dentro de la vista/admin y  >list<== file k hace la consulta   */
$this->load->view('layouts/header');
    $this->load->view('layouts/aside');
     $this->load->view('admin/list', $ventasdiariasid);/*la vista k contrendra el contenido*/
    $this->load->view('layouts/footer');
  }


  




}