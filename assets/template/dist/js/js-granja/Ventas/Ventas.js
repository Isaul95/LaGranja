var listaProductosComprados = [];
var ventaID = 0;

//Arreglar lo del input number modificando los algoritmos copiados y con expresión regular
//Cambiar el uso de mi arreglo a la tabla de descripcion de venta
//Actualizar solo la celda que le corresponde al campo de cantidad en la DataTable
//Insertar la compra en la BD
//Corregir lo de que la datatable se desborde

//En_turno  Realizada  Cancelada Credito-pendiente

$(document).ready(function() {

  MostrarTablaDescripcionVenta();

});


$(document).on("click", "#BotonModalProductosCrudos", function(e) {

  $("#TituloModalProductos").text("Productos crudos");
  MostrarTablaProductos("Crudo");

});


$(document).on("click", "#BotonModalProductosCocidos", function(e) {

  $("#TituloModalProductos").text("Productos cocidos");
  MostrarTablaProductos("Cocido");

});


$(document).on("click", "#BotonModalProductosAcompañantes", function(e) {

  $("#TituloModalProductos").text("Productos acompañantes");
  MostrarTablaProductos("Acompañantes");

});


function ComprobarSiHayVentaEnTurno() {
  var usuarioID = $("#id_usuario_venta").val();
  var fecha = new Date();
  var mes = "";
  var dia = "";

  switch (fecha.getMonth() + 1) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
    case 7:
    case 8:
    case 9:
      mes = mes.concat("0",fecha.getMonth()+1);
    break;
    default:
      mes = mes.concat(fecha.getMonth()+1);
    break;
  }

  switch (fecha.getDate()) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
    case 7:
    case 8:
    case 9:
      dia = dia.concat("0",fecha.getDate());
    break;
    default:
      dia = dia.concat(fecha.getDate());
    break;
  }

  var fechaActual = fecha.getFullYear() + "/" + mes + "/" + dia;
  console.log(fechaActual);
  $.ajax({
    type: "post",
    url: base_url + 'Ventas/VentasControlador/CrearVentaEnTurno',
    data: {
      usuarioID: usuarioID,
      fechaActual: fechaActual,
    },
    dataType: "json",
    success: function(id_venta) {
      ventaID = id_venta;
      console.log(ventaID);
    }
  });
}


function MostrarTablaDescripcionVenta() {

  var usuarioID = $("#id_usuario_venta").val();

  $.ajax({
    type: "post",
    url: base_url + 'Ventas/VentasControlador/listar_venta_en_turno',
    data: {
      usuarioID: usuarioID,
    },
    dataType: "json",
    success: function (descripcionDeVenta) {
      $("#TablaDescripcionVenta").DataTable({
        data: descripcionDeVenta,
        responsive: true,
        columns: [
          {
            data: "producto",
          },
          {
            data: "piezas",
          },
          {
            data: "precio_unitario",
          },
          {
            data: "importe",
          },
          {
            orderable: false,
            searchable: false,
            data: function(row, type, set) {
              return `
                <a href="#" id="BorrarProductoDeLaVenta" class="btn btn-danger btn-remove" ProductoID="${row.id_producto}"">
                <i class="fas fa-shopping-cart"></i></a>
              `;
            },
          },
        ],
        'language': idiomaEspañolTablas,
      });
    },
  });
}


function MostrarTablaProductos() {

  var tipoProducto = arguments[0];

  $.ajax({
    type: "post",
    url: base_url + 'Ventas/VentasControlador/EnlistarProductos',
    data: {
      tipoProducto: tipoProducto,
    },
    dataType: "json",
    success: function(datosProducto) {
      $('#TablaVentaProductos').DataTable({
        data: datosProducto,
        responsive: true,
        columns: [
          {
            data: 'nombre_producto',
            orderable: false,
          },
          {
            data: 'cantidad',
            orderable: false,
          },
          {
            orderable: false,
            searchable: false,
            data: function(row, type, set) {
              if (row.cantidad > 0) {
                return `
                  <input type="number" id="CantidadPiezasDeseadasDelProductoConID` + row.id_producto + `" style="width: 50%; text-align: center;" min="0" max="${row.cantidad}" step="1" value="0" onkeypress=ValidarCantidadPiezas(this) onkeyup=ValidarLimitePiezas(this)>
                `;
              } else {
                return `
                  <input type="number" style="width: 50%; text-align: center;" value="0" disabled>
                `;
              }
            },
          },
          {
            orderable: false,
            searchable: false,
            data: function(row, type, set) {
              if (row.cantidad > 0) {
                return `
                  <a href="#" id="AgregarProductoALaVenta" class="btn btn-success btn-remove" ProductoID="${row.id_producto}" Precio="${row.precio}" Cantidad="${row.cantidad}" TipoProducto="${row.tipo_producto}"><i class="fas fa-shopping-cart"></i></a>
                `;
              } else {
                return `
                  <a href="#" class="btn btn-success btn-remove" disabled><i class="fas fa-shopping-cart"></i></a>
                `;
              }
            },
          },
        ],
        'language': idiomaEspañolTablas,
      });
    },
  });
  $('#ModalProductos').modal('show');
  ComprobarSiHayVentaEnTurno();
}


$(document).on("click", "#EliminarTablaVentaProductos", function(e) {

  $('#TablaVentaProductos').DataTable().clear();
  $('#TablaVentaProductos').DataTable().destroy();

});


$(document).on("click", "#AgregarProductoALaVenta", function(e) {

  var productoID = $(this).attr("ProductoID");
  var cantidad = $(this).attr("Cantidad");
  var piezasCompradas = $('#CantidadPiezasDeseadasDelProductoConID'+productoID).val();
  var precioProducto = $(this).attr("Precio");
  var precioPiezas = piezasCompradas * precioProducto;
  var tipoProducto = $(this).attr("TipoProducto");

  if (cantidad > 0) {
    $.ajax({
      type: "post",
      url: base_url + 'Ventas/VentasControlador/AgregarProductoVenta',
      data: {
        productoID: productoID,
        piezasCompradas: piezasCompradas,
        precioPiezas: precioPiezas,
        ventaID: ventaID,
      },
      dataType: "json",
      success: function(resultadoConsulta) {
        if (resultadoConsulta > 0) {
          var nuevaCantidad = cantidad - piezasCompradas;
          console.log(resultadoConsulta, nuevaCantidad);
          ModificarCantidadProducto(productoID, nuevaCantidad, tipoProducto);
        }
      }
    });
    $('#TablaDescripcionVenta').DataTable().destroy();
    MostrarTablaDescripcionVenta();
  }
});


$(document).on("click", "#BorrarProductoDeLaVenta", function(e) {

  $('#TablaDescripcionVenta').DataTable().destroy();
  MostrarTablaDescripcionVenta();

});


function ModificarCantidadProducto() {
  var productoID = arguments[0];
  var cantidadModificada = arguments[1];
  var tipoProducto = arguments[2];

  $.ajax({
    type: "post",
    url: base_url + 'Ventas/VentasControlador/CambiarCantidadProducto',
    data: {
      productoID: productoID,
      cantidadModificada: cantidadModificada,
    },
    dataType: "json",
    success: function(nuevaCantidad) {
      console.log(nuevaCantidad);
      if (nuevaCantidad >= 0) {
        $('#TablaVentaProductos').DataTable().destroy();
        MostrarTablaProductos(tipoProducto);
      }
    }
  });
}


function ValidarCantidadPiezas() {
  var cantidadPermitida = new RegExp("[0-9]+");
  var valorInsertado = String.fromCharCode(!event.charCode ? event.which : event.charCode);
  if (!cantidadPermitida.test(valorInsertado)) {
    event.preventDefault();
    return false;
  }
}


function ValidarLimitePiezas(cantidad){
  if (cantidad.value != ""){
    if (parseInt(cantidad.value) > parseInt(cantidad.max)){
      cantidad.value = cantidad.max;
    }
    /*if(parseInt(cantidad.value) < parseInt(cantidad.min)){
      cantidad.value = cantidad.min;
    }*/
  }
  //Ya no es necesario verificar si el valor agregado es menor al límite inferior, en este caso 0, porque la función ValidarCantidadPiezas, con ayuda de la expresión regular, se encarga de no aceptar números negativos.
}


var idiomaEspañolTablas = {
  'lengthMenu': "Mostrar _MENU_ registros por pagina",
  'zeroRecords': "No se encontraron resultados en su búsqueda",
  'searchPlaceholder': "Buscar registros",
  'info': "Total: _TOTAL_ registros",
  'infoEmpty': "No existen registros",
  'infoFiltered': "(filtrado de un total de _MAX_ registros)",
  'search': "Buscar:",
  'paginate': {
    'first': "Primero",
    'last': "Último",
    'next': "Siguiente",
    'previous': "Anterior"
  },
}


function AgregarYEliminarProductosUsandoElArreglo() {

  //Agregar productos al arreglo

  /*var nombreProducto = $(this).attr("NombreProducto");
  var productoID = $(this).attr("ProductoID");
  var piezas = $('#CantidadPiezasDeseadasDelProductoConID'+productoID).val();
  var precio = $(this).attr("Precio");
  var precioTotal = precio * piezas;

  if (piezas > 0) {

    var posicionProductoLista = listaProductosComprados.findIndex(producto => producto.nombreProducto == nombreProducto);

    if (posicionProductoLista >= 0) {
      listaProductosComprados[posicionProductoLista].piezas = piezas;
      listaProductosComprados[posicionProductoLista].precioTotal = precioTotal;
    } else {
      listaProductosComprados.push({"nombreProducto": nombreProducto, "piezas": piezas, "precioProducto": precio,"precioTotal": precioTotal});
    }
  }*/

  //Eliminar productos del arreglo

  /*var nombreProducto = $(this).attr("NombreProducto");
  var posicionProductoLista = listaProductosComprados.findIndex(producto => producto.nombreProducto == nombreProducto);
  var piezas = listaProductosComprados[posicionProductoLista].piezas;

  listaProductosComprados.splice(posicionProductoLista, 1);*/

}
