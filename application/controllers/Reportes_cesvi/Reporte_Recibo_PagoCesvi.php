<?php

error_reporting(0);

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once('src/phpjasperxml_0.9d/class/tcpdf/tcpdf.php');
include_once("src/phpjasperxml_0.9d/class/PHPJasperXML.inc.php");
// include_once ('setting.php');

// SE HACE LA CONECION PARA CADA HOJA DE ESTAS
$server = "localhost";
$user = "root";
$pass = "";
$db = "cesvi_webapp";


$PHPJasperXML = new PHPJasperXML();
//$PHPJasperXML->debugsql=true;
$PHPJasperXML->arrayParameter=array("parameter1"=>1);
// $PHPJasperXML->load_xml_file("report1_prueba.jrxml"); recibo_cesvi
$PHPJasperXML->load_xml_file("src/ReportesPDF_Cesvi_jrxml/reporte_pagocesvi.jrxml");


$PHPJasperXML->transferDBtoArray($server,$user,$pass,$db);
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
