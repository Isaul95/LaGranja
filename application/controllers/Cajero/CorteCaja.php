<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CorteCaja extends CI_Controller {
		 private $permisos;
         public function __construct(){
	 	 parent::__construct();
		 $this->permisos = $this->backend_lib->control();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_CorteCaja");
	 }

			public function index(){

		//  OBTIENE LA FECHA ACTUAL DEL SISTYEMA PARAMETRO PARA REALIZAR ALS CONSULTAS CON LA FECHA ACTUAL (DEL DIA)
					ini_set('date.timezone', 'America/Mexico_City');
					 $fechaActualHoy=date('Y/m/d', time());

				$data  = array(
						'permisos' => $this->permisos,
						'username' => $this->session->userdata('username'),
						'totalGastosDelDia' => $this->Modelo_CorteCaja->consultaTotalGastosDelDia($fechaActualHoy),
						'totalPagosDelDia' => $this->Modelo_CorteCaja->consultaTotalDePagosHechosDelDia($fechaActualHoy),
						'totalVentasDelDia' => $this->Modelo_CorteCaja->consultaTotalDeAllVentasHechosDelDia($fechaActualHoy),
						'totalDescuentos_y_sumTotalDescuentosDelDia' => $this->Modelo_CorteCaja->consultaTotalDeDescuentosHechosDelDia($fechaActualHoy),
						'totalProcesadosDelDia' => $this->Modelo_CorteCaja->consultaTotalProcesadosDelDia(),
						'totalDevolucionCrudoDelDia' => $this->Modelo_CorteCaja->consultaTotalDevolucionCrudoDelDia(),
				);

				$this->load->view('layouts/header');
				$this->load->view('layouts/aside');
				$this->load->view('admin/Vistas_Cajero/VistaCorteCaja',$data);
				$this->load->view('layouts/footer');
			}







		//   Realizar registro del corte de caja del dia
		public function registroCorteDeCaja(){
			ini_set('date.timezone', 'America/Mexico_City');
			$fff=date('Y/m/d', time());
			//$fff= date("Y"."/"."m". "/"."d");
			$fc = $this->Modelo_CorteCaja->traerFechaA($fff);
			// Se compara si ya hay una apertura con la fecha actual
		   if ($fc == null || $fc == '') {
// 				DATOS PARA INSERT INTO TABLE CORTES DE CAJA
					$data_cortes['id_apertura'] 		= $this->input->post('id_apertura');
					$data_cortes['monto_entregado'] = $this->input->post('monto_entregado');
					$data_cortes['gastos'] 					= $this->input->post('gastos');
					$data_cortes['ventas'] 					= $this->input->post('ventas');
					$data_cortes['diferencia'] 			= $this->input->post('diferencia');
					$data_cortes['fecha'] 					= $this->input->post('fecha');
					$data_cortes['hora'] 					  = $this->input->post('hora');
					$data_cortes['usuario'] 				= $this->input->post('usuario');

// 				DATOS PARA INSERT INTO TABLE UTILIDADES
			    $datas_utilidad['totaldeventas'] = 	$this->input->post('ventas');
			  	$datas_utilidad['gastos']        = $this->input->post('gastos');
					// $datas_utilidad['diferencia']    = $this->input->post('diferencia');
					$datas_utilidad['fecha']         = 	$this->input->post('fecha');
					$datas_utilidad['pagos']         = 	$this->input->post('pagos');
					$datas_utilidad['pagopollo']     =	$this->input->post('pagopollo');
					$datas_utilidad['tacos']         =	$this->input->post('tacos');
					$datas_utilidad['almuerzo']      =	$this->input->post('almuerzo');

					$datas_utilidad['diferencia']    = $this->input->post('diferenciautilidad');
					$datas_utilidad['totalprocesados']    = $this->input->post('totalprocesados');
					$datas_utilidad['totaldevolucioncrudo']    = $this->input->post('totaldevolucioncrudo');
					$datas_utilidad['utilidad']    = $this->input->post('utilidad');

			  if ($this->Modelo_CorteCaja->insert_entryCaja($data_cortes)) {
						$this->Modelo_CorteCaja->insert_en_Utilidades($datas_utilidad);
						// base_url(); ? > auth/logout
						$data = array('responce' => 'success', 'message' => 'Corte de caja realizado correctamente...!');
						// redirect(base_url()."auth/logout");

						//Cerrar sesion
						$this->session->sess_destroy();
						//$this->load->view("admin/login");
						//redirect(base_url());
						//redirect(base_url());

						// if ($data = array('responce' => 'success')) {
						// 		redirect(base_url()."auth/logout");
						// }

					} else {
						$data = array('responce' => 'error', 'message' => 'Fallo al realizar el corte de caja...!');
					}

				echo json_encode($data);


			}else {
				// En caso de que si haya una apertura con la fecha actual
				$data = array('res' => "error", 'message' => "¡Error! Ya existe un corte con esta fecha :(");
				echo json_encode($data);
			}

		}


	//
	// public function consultarAperturaXXXZ(){
	// 			// $data['estatus'] = $this->input->post('estatus');
	// 			$fecha = $this->input->post('fecha');
	// 					if ($this->Modelo_CorteCaja->obtenerAperturaDelDiaXXSA($fecha)) {
	// 						$data = array('responce' => 'success', 'message' => '¡Apertura!');
	// 					} else {
	// 						// $data = array('responce' => 'error', 'message' => 'No ha realizado el Registro de su Comprobante de pago...!!!');
	// 						$data = array('responce' => 'error');
	// 					}
	// 			echo json_encode($data);
	// }




	public function consultarApertura(){
	$fecha = $this->input->post('fecha');
		$posts = $this->Modelo_CorteCaja->obtenerAperturaDelDia($fecha);
		echo json_encode($posts);
	}



		public function verProductosCrudosVendidos(){
		// $fecha = $this->input->post('fecha');
			$posts = $this->Modelo_CorteCaja->obtenerProductosCrudosVendidosDelDia();
			echo json_encode($posts);
		}


}  // Fin del controller
