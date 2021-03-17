<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generaticket extends CI_Controller {
		 // private $permisos;
		  public function __construct(){
			 	 parent::__construct();
				 // $this->permisos = $this->backend_lib->control();
				 // $this->load->helper(array('form', 'url'));
			 	 // $this->load->library(array('session', 'form_validation'));
			 	 // $this->load->model("Modelo_Carreras");
			 }


			 public function index(){
		 		// $data  = array(
		 		// 	'permisos' => $this->permisos,
		 		// );
		 		$this->load->view('layouts/header');
		 		$this->load->view('layouts/aside');
		 		$this->load->view('admin/Vistas_administrativos/Ver_ticket');
		 		$this->load->view('layouts/footer');
		 	}



		 public function generaTicketSRES(){

			$pdf = new \FPDF('P', 'mm', array(80 ,200 ));
			$pdf->AddPage();
			$pdf->SetMargins(10, 10, 10);
			$pdf->SetTitle("Ventas");
			$pdf->SetFont('Arial', 'B', 10);

			$pdf->Cell(70, 5, "Venta de productos", 0, 1, 'C');
			$pdf->SetFont('Arial', 'B', 9);

			$pdf->image(base_url(). '/imagenes/logo.png', 10, 10, 20, 20, 'PNG');
			$pdf->Cell(50, 5, "name tienda", 0, 1, 'L');
			$pdf->Cell(20, 5, utf8_decode('Dirección: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 9);
			$pdf->Cell(50, 5, 'Direccion tienda: ', 0, 1, 'L');
			$pdf->SetFont('Arial', 'B', 9);

			$pdf->Cell(25, 5, utf8_decode('fecha y hora: '), 0, 0, 'L');
			$pdf->SetFont('Arial', '', 9);
			$pdf->Cell(50, 5, utf8_decode('horaaa: '), 0, 1, 'L');
			$pdf->Ln();


			$pdf->SetFont('Arial', 'B', 8);
			$pdf->SetFillColor(0, 0, 0);
			$pdf->SetTextColor(255, 255, 255);
			$pdf->Cell(196, 5, 'detalles de productos: ', 1, 1, 'C', 1);
			$pdf->SetTextColor(0, 0, 0);
			$pdf->Cell(14, 5, 'No: ', 1, 0, 'L');
			$pdf->Cell(25, 5, 'COdigo: ', 1, 0, 'L');
			$pdf->Cell(77, 5, 'nombre: ', 1, 0, 'L');
			$pdf->Cell(25, 5, 'precio: ', 1, 0, 'L');
			$pdf->Cell(25, 5, 'cantidad: ', 1, 0, 'L');
			$pdf->Cell(30, 5, 'importe: ', 1, 1, 'L');


			$this->response->setHeader('Content-Type','application/pdf');
			$pdf->outpage('I','ticket.pdf');
		 }





}  // Fin del controller
