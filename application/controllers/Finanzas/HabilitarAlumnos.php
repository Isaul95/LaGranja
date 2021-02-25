<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HabilitarAlumnos extends CI_Controller {

		 private $permisos;
		 // private $firma = "src/logo-cesvi.jpg";
	   public function __construct(){
	 	 parent::__construct();
		 $this->load->helper(array('form', 'url'));
	 	 $this->load->library(array('session', 'form_validation'));
	 	 $this->load->model("Modelo_DarAccesoAlumnos");
		 $this->permisos = $this->backend_lib->control();
	 }

	 // VISTA DONDE SE PRESENTA LOS CONTADORES  (CUADRITOS) SE MANDAN VARIABLES ALA VISTA ESAS VARIABLES CONTIENEN EL NUMERO DE REGISTROS Y SE PRESENTA EN EL CUADRO
	// public function index(){
 //
	// 	$data = array(
	// 	'countAlumnosColegiatura' 	 => $this->Modelo_DarAccesoAlumnos->rowcountColegiatura("alta_baucher_banco"),
	// 	'countAlumnosCursos'         => $this->Modelo_DarAccesoAlumnos->rowcountCursos("alta_baucher_banco"),
	// 	'countAlumnosExtraordinario' => $this->Modelo_DarAccesoAlumnos->rowcountExtraordinario("alta_baucher_banco"),
	// 	'countAlumnosTitulo'				 => $this->Modelo_DarAccesoAlumnos->rowcountTitulo("alta_baucher_banco"),
 // );
 //
	// 	$this->load->view('layouts/header');
	// 	$this->load->view('layouts/aside');
	// 	$this->load->view('admin/Vistas_Finanzas/VistaContadorAlumnosConBaucher', $data);
	// 	$this->load->view('layouts/footer');
	// }



// ESTA VISTA PRESENTA LA LISTA DE ALUMNOS K YA SUBIERON SU BAUCHER Y SE PASA A CHECKEN PARA DARLES ACCESO A ELEGIR SUS MATERIAS
		public function index(){
			$data = array(
				'tipoDePagos' => $this->Modelo_DarAccesoAlumnos->getTipoDePagos(),
				'username' => $this->session->userdata('username'),
			);
			$this->load->view('layouts/header');
			$this->load->view('layouts/aside');
		   $this->load->view('admin/Vistas_Finanzas/VistaHabilitarAlumno', $data);
			$this->load->view('layouts/footer');
		}


		public function listaDeAlumnosConBaucherRegistrado(){  //  $tipoPago
					$semestre = $this->input->post('semestre');
					$opciones = $this->input->post('opciones');
					$licenciatura = $this->input->post('licenciatura');
					$tipoPago = $this->input->post('tipoPago');
			$posts = $this->Modelo_DarAccesoAlumnos->obtenerListaDeAlumnosConBaucherRegistrado($semestre, $opciones, $licenciatura,$tipoPago);
			echo json_encode($posts);
		}


		public function verBaucher($numero_control, $id_alta_baucher_banco){
				$consulta = $this->Modelo_DarAccesoAlumnos->getBaucherId($numero_control, $id_alta_baucher_banco);
				$archivo = $consulta['archivo'];
				$img = $consulta['nombre_archivo'];
				header("Content-type: application/pdf");
				header("Content-Disposition: inline; filename=$img.pdf");
				print_r($archivo);
		}

// ================    ESYE ES MI NEW METODO PARA EL UPDATE DEL CHECKEN    =======================

public function asignacion_masiva_de_alumnos(){
	$licenciatura = 	$this->input->post('licenciatura');
	$opcion_estudio = 	$this->input->post('opcion_estudio');
	$semestre = 	$this->input->post('semestre');
	$detalle = 	$this->input->post('detalle');
	$ciclo = 	$this->input->post('ciclo');

	$materias = $this->Modelo_DarAccesoAlumnos->materias_a_insertar($opcion_estudio,$licenciatura,$semestre,$ciclo);

	foreach ($materias as $materiasdata) {
		$Array_materias[] = array(
			'detalle'          => $detalle,
			'materia'       => $materiasdata['materia'],
			'profesor'           => $materiasdata['profesor'],
			'horario'           => $materiasdata['horario'],
			'calificacion'         => 0,
			'ciclo'          => $materiasdata['ciclo'],
			'estado_profesor'          => 0
		);
	}
	if ($this->Modelo_DarAccesoAlumnos->insert_masvia_de_alumnos($Array_materias)) {
			//	$data = array('response' => "success", 'message' => "Se agrega materia ".$materia." correctamente");
			$data = array('response' => "success", 'message' => "¡Materias asignadas al alumno!");
	} else {
				$data = array('response' => "error", 'message' => "No se agrega correctamente");
	}
echo json_encode($data);
}

public function marcarParaRegistro(){
	if ($this->input->is_ajax_request()) {

	/// INICIO INSERCCIÓN DE MATERIAS
	$licenciatura = 	$this->input->post('licenciatura');
	$opcion_estudio = 	$this->input->post('opcion_estudio');
	$semestre = 	$this->input->post('semestre');
	$detalle = 	$this->input->post('detalle');
	$ciclo = 	$this->input->post('ciclo');
	/// FIN INSERCCIÓN DE MATERIAS
			$data['estatus'] = $this->input->post('estatus');
			$data3['estado'] = $this->input->post('estado');
			$estatus = $this->input->post('estatus');  // var para filtrado si es habilitar o des-habilitar
		    $numero_control = 	$this->input->post('numero_control');
			/*
			$id_alta_baucher_banco = $this->input->post('id_alta_baucher_banco');

			$data2['estado_archivo'] =	7; // ==>> tabla de baucher => estado_archivo mover a  7= ¡Comprobante válido!
			$data4['estado_archivo'] =	6; // ==>> tabla de baucher => estado_archivo mover a  6= ¡Registro baucher!
			*/

		if($estatus != 0){  // Depende del estatus k se mande se hace a accion
			// $this->Modelo_DarAccesoAlumnos->updateStatusComprobPago($numero_control, $data2);//=> Se mueve estatus tabla de baucher => estado_archivo =>1
			$this->Modelo_DarAccesoAlumnos->updateStatusDetalles($numero_control, $data3);//=> Se muesve estado detalles => En_espera_de_materias
						if ($this->Modelo_DarAccesoAlumnos->update($numero_control, $data)) { //=> Mueve estatus de tabla alumno
// 1.- Cuando se habilita solo es estatus en la tabla de alumnos => estatus =1
							$data = array('responce' => 'success', 'message' => 'Alumno habilitado correctamente...!');
						//	$this->asignacion_masiva_de_alumnos($licenciatura,$opcion_estudio,$semestre,$ciclo,$detalle);

						} else {
							$data = array('responce' => 'error', 'message' => 'Fallo habilitar alumno...!');
						}
		} /*
		else {
// 2.- Cuando se DES-habilita cambia el estatus en la tabla de alumnos => estatus =0 y delete los datos del revibo para k cuando se vuelva habilitar metan nuevos datoos
						if ($this->Modelo_DarAccesoAlumnos->update($numero_control, $data)) {
							// $this->Modelo_DarAccesoAlumnos->updateStatusComprobPago($numero_control, $data4);//=>mueve estatus table baucher=>6¡Registro baucher!
							$this->Modelo_DarAccesoAlumnos->updateStatusDetalles($numero_control, $data3);
							// $this->Modelo_DarAccesoAlumnos->deleteDatosDelRecibo($id_alta_baucher_banco);
							$data = array('responce' => 'success', 'message' => 'Alumno fue Deshabilitado...!');
						} else {
							$data = array('responce' => 'error', 'message' => 'Fallo al deshabilitar el Alumno...!');
						}
		}
		  */
		echo json_encode($data);
	}
	else{
	echo "No se permite este acceso directo...!!!";
	}

	}


// ================    ACTUALIZAR ESTATUS DE ARCHIVO PARA VALIDACION DEL BAUCHER    =======================
public function marcarParaValidarComprobantePago(){
			$data['estado_archivo'] = $this->input->post('estado_archivo');
			$numero_control = $this->input->post('numero_control');
			$id_alta_baucher_banco = $this->input->post('id_alta_baucher_banco');
			$pagorecibo = $this->input->post('pagorecibo');

			$data5['estado_archivo'] = $this->input->post('estado_archivo');
			$data5['parcialidades'] =	" ";
			$data5['fecha_limite_de_pago'] =	" ";

				$ajax_data = $this->input->post();
 				$estado = $this->input->post('estado_archivo');  // var para filtrado si es habilitar o des-habilitar

		if($estado != 6){  // Depende del estatus k se mande se hace a accion
			// $this->Modelo_DarAccesoAlumnos->updateStatusComprobPago($numero_control, $data2);//=> Se mueve estatus tabla de baucher => estado_archivo =>1
			// $this->Modelo_DarAccesoAlumnos->updateStatusDetalles($numero_control, $data3);//=> Se muesve estado detalles => En_espera_de_materias
						if ($this->Modelo_DarAccesoAlumnos->updateStatusComprobPago($numero_control, $id_alta_baucher_banco, $data)) { //=> Mueve estatus de tabla alumno
							$data = array('responce' => 'success', 'message' => 'Comprobante de pago validado correctamente...!');
						} else {
							$data = array('responce' => 'error', 'message' => 'Fallo al validar el pago del alumno...!');
						}
		} else {
						if ($this->Modelo_DarAccesoAlumnos->updateStatusComprobPago($numero_control, $id_alta_baucher_banco, $data5)) {
								$this->Modelo_DarAccesoAlumnos->deleteDatosDelRecibo($id_alta_baucher_banco);
								$this->Modelo_DarAccesoAlumnos->deleteDatosDelReciboHistorico($pagorecibo);
							$data = array('responce' => 'success', 'message' => 'Comprobante de pago fue Deshabilitado...!');
						} else {
							$data = array('responce' => 'error', 'message' => 'Fallo al deshabilitar el Comprobante de pago...!');
						}
		}
		echo json_encode($data);
}



	public function validacionComprobanteDePago(){
		$bauche = $this->input->post('bauche');

				$ajax_data = $this->input->post();
/*2.*/		if ($this->Modelo_DarAccesoAlumnos->insertDatosDeValiacionBaucher($ajax_data)) {

					$data = array('responce' => 'success', 'message' => 'Comprobante de pago validado correctamente...!');
				} else {
					$data = array('responce' => 'error', 'message' => 'Fallo al validar datos Comprobante...!');
				}
			// }
			echo json_encode($data);

	}



// >>>>>>>>>>>  ESTA FUNCION ACTUALIZA EL ESTATUS DE LA TABLE AltaBaucherBanco EL ESTADO DE COMO VA EL DOCUMENTO Comprobante DE PAGO   <<<<<<<<<
public function actualizaEstadoDelComprobantePago($numero_control, $estatus){
			// $data['estatus'] = $this->input->post('estatus');
			// $id_alta_baucher_banco = $this->input->post('id_alta_baucher_banco');
 			// $estatus = $this->input->post('estatus');
						$this->Modelo_DarAccesoAlumnos->updateStatusComprobPago($numero_control, $estatus);
		echo json_encode($data);
}



	public function registroDatosParaGenerarReciboPago(){
		$bauche = $this->input->post('bauche');

				$ajax_data = $this->input->post();
/*1.*/		$this->Modelo_DarAccesoAlumnos->deleteDatosDelRecibo($bauche);
/*2.*/		if ($this->Modelo_DarAccesoAlumnos->insert_entry($ajax_data)) {
/*3.*/				$this->Modelo_DarAccesoAlumnos->insert_respaldoHistoricoReciboPagos($bauche);
					$data = array('responce' => 'success', 'message' => 'Datos del recibo agregados correctamente...!');
				} else {
					$data = array('responce' => 'error', 'message' => 'Fallo al agregar datos del recibo...!');
				}
			// }
			echo json_encode($data);
		// } else {
		// 	echo "no inserto toy en el else";
		// }

	}



//   ************************  FUINCTION PARA ELIMINAR  el registro del alumno nauchere  ********************
		public function eliminarAllRegistro(){

			if ($this->input->is_ajax_request()) {
				$numero_control = $this->input->post('numero_control');
				$id_alta_baucher_banco = $this->input->post('id_alta_baucher_banco');

				if ($this->Modelo_DarAccesoAlumnos->eliminarTodoRegistroAlumno($numero_control, $id_alta_baucher_banco)) {
					$data = array('responce' => 'success');
				} else {
					$data = array('responce' => 'error');
				}
				echo json_encode($data);
			} else {
				echo "No direct script access allowed";
			}
		}


		public function obtenerTiposDePagos(){
				$posts = $this->Modelo_DarAccesoAlumnos->consultarTiposDePagos();
				echo json_encode($posts);
			}


		public function verRecibosFirmados()
		{
		    $posts = $this->Modelo_DarAccesoAlumnos->obtenerRecibosFirmadosDelAlumno();
		    echo json_encode($posts);
		}



		/* -------------------------------------------------------------------------- */
		/*        AGREGA EL RECIVO DE PAGO FURMADO Y SELLADO INSTITUXION             */
		/* -------------------------------------------------------------------------- */

		public function agregarReciboFirmado(){

			if ($this->input->is_ajax_request()) {

				$this->form_validation->set_rules('id_recibo', 'Número de control', 'required');

				if ($this->form_validation->run() == FALSE) {
					$data = array('res' => "error", 'message' => validation_errors());
				} else {
					$config['upload_path'] = "./assets/template/dist/img/uploads";
					$config['allowed_types'] = 'gif|jpg|png|pdf';
					$config['max_size']     = '1000';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload("archivo")) {
						$data = array('res' => "error", 'message' => $this->upload->display_errors());
					} else {
					  $file_name = $_FILES['archivo']['name'];
						$file_size = $_FILES['archivo']['size'];
						$file_tmp = $_FILES['archivo']['tmp_name'];
						$file_type = $_FILES['archivo']['type'];

						$imagen_temporal = $file_tmp;
						$tipo = $file_type;

						$fp = fopen($imagen_temporal, 'r+b');
						$binario = fread($fp, filesize($imagen_temporal));
						fclose($fp);

						$ajax_data = $this->input->post();
						$ajax_data['archivo'] = $binario; // Documento pdf
						$ajax_data['nombre_archivo'] = $this->upload->data('file_name'); // name file

						if ($this->Modelo_DarAccesoAlumnos->insert_reciboValidadoXlaIntitucion($ajax_data)) {
							$data = array('res' => "success", 'message' => "Archivo guardado correctamente...!");
						} else {
							$data = array('res' => "error", 'message' => "Error al guardado el archivo...!");
						}
					}
				}
				echo json_encode($data);
			} else {
				echo "No se permite este acceso directo...!!!";
			}
		}


		public function verReciboFirmado($id_recibo_valido){
			$consulta = $this->Modelo_DarAccesoAlumnos->getReciboValidado($id_recibo_valido);
			$archivo = $consulta['archivo'];
			$img = $consulta['nombre_archivo'];
			header("Content-type: application/pdf");
			header("Content-Disposition: inline; filename=$img.pdf");
			print_r($archivo);
		}


		//   ************************  FUINCTION PARA ELIMINAR  el registro del alumno nauchere  ********************
				public function eliminarReciboFirmadoAlum(){

					if ($this->input->is_ajax_request()) {
						$id_recibo_valido = $this->input->post('id_recibo_valido');

						if ($this->Modelo_DarAccesoAlumnos->eliminarReciboFirmadodelAlumno($id_recibo_valido)) {
							$data = array('responce' => 'success');
						} else {
							$data = array('responce' => 'error');
						}
						echo json_encode($data);
					} else {
						echo "No direct script access allowed";
					}
				}




	public function generaPdfRcibo($numero_control){
		/*
		 * Se crea la function para hacer el llamado en el js
		 * se hace todo la parte del reporte
		 */
		error_reporting(0);

		include_once('src/phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
		include_once("src/phpjasperxml_0.9d/class/PHPJasperXML.inc.php");
		// 	include_once("ajuste.php"); // nuestra clase donde esta nuestra conf de ingreso a la bd

		// SE HACE LA CONECION PARA CADA HOJA DE ESTAS
		$server = "localhost";
		$user = "root";
		$pass = "";
		$db = "cesvi_webapp";


		$PHPJasperXML = new PHPJasperXML();
		 // $PHPJasperXML->debugsql=true;
		// 	$PHPJasperXML-> debugsql = false; // Si desea ver la setencia del sql del reporte lo pones en true

		$PHPJasperXML->arrayParameter=array("numcontrol"=>$numero_control);
		// $PHPJasperXML->arrayParameter=array("parameter1"=>1);

		// $PHPJasperXML->arrayParameter.put("firma5",this.getClass().getResourceAsStream("src/logo-cesvi.jpg"));

		// $PHPJasperXML->load_xml_file("report1_prueba.jrxml"); recibo_cesvi
		$PHPJasperXML->load_xml_file("src/ReportesPDF_Cesvi_jrxml/recibo_cesvi.jrxml");

		$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
//  $PHPJasperXML->transferDBtoArray($server,$user,$pass,$db); // las opciones de conexion de base de datos
		$PHPJasperXML->outpage('I','ReciboPago_'.$numero_control.'.pdf');
//  $PHPJasperXML->outpage("D");    //page output method I:standard output  D:Download file

//$PHPJasperXML->outpage('I=render in browser/D=Download/F=save as server side filename according 2nd parameter','filename.pdf or filename.xls or filename.xls depends on constructor')

	}






}  // Fin del controller
