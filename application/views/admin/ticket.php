<?php


include '/autoload.php'; //Nota: si renombraste la carpeta a algo diferente de "ticket" cambia el nombre en esta línea
use  Mike42\Escpos\Printer;
use  Mike42\Escpos\EscposImage;
use  Mike42\Escpos\PrintConnectors\FilePrintConnector;
use  Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

/*
	Este ejemplo imprime un
	ticket de venta desde una impresora térmica
*/


/*
    Aquí, en lugar de "POS" (que es el nombre de mi impresora)
	escribe el nombre de la tuya. Recuerda que debes compartirla
	desde el panel de control  POS-58
*/

/* $nombre_impresora = "Star SP500 Tear Bar (SP512)";  */
$nombre_impresora = "POS-588";


$connector = new WindowsPrintConnector($nombre_impresora);
$printer = new Printer($connector);
#Mando un numero de respuesta para saber que se conecto correctamente.
echo 1;

$printer->text("\n"."Nombre de la Empresa" . "\n");
$printer->text("Direccion: Orquídeas #151" . "\n");
$printer->text("Tel: 454664544" . "\n");
#La fecha también
date_default_timezone_set("America/Mexico_City");
$printer->text(date("Y-m-d H:i:s") . "\n");
$printer->text("-----------------------------" . "\n");
$printer->setJustification(Printer::JUSTIFY_LEFT);
$printer->text("CANT  DESCRIPCION    P.U   IMP.\n");
$printer->text("-----------------------------"."\n");
/*
  Ahora vamos a imprimir los
  productos
*/
  /*Alinear a la izquierda para la cantidad y el nombre*/
  $printer->setJustification(Printer::JUSTIFY_LEFT);
    $printer->text("Producto Galletas\n");
    $printer->text( "2  pieza    10.00 20.00   \n");
    $printer->text("Sabrtitas \n");
    $printer->text( "3  pieza    10.00 30.00   \n");
    $printer->text("Doritos \n");
    $printer->text( "5  pieza    10.00 50.00   \n");
/*
  Terminamos de imprimir
  los productos, ahora va el total
*/
$printer->text("-----------------------------"."\n");
$printer->setJustification(Printer::JUSTIFY_RIGHT);
$printer->text("SUBTOTAL: $100.00\n");
$printer->text("IVA: $16.00\n");
$printer->text("TOTAL: $116.00\n");


/*
  Podemos poner también un pie de página
*/
$printer->setJustification(Printer::JUSTIFY_CENTER);
$printer->text("Muchas gracias por su compra\n");
$printer->text("<?php echo Hora;?>");
$printer->cut();

/*
	Por medio de la impresora mandamos un pulso.
	Esto es útil cuando la tenemos conectada
	por ejemplo a un cajón
*/
$printer->pulse();

/*
	Para imprimir realmente, tenemos que "cerrar"
	la conexión con la impresora. Recuerda incluir esto al final de todos los archivos
*/
$printer->close();

?>


