var usuarioID = $("#InputUsuarioID").val();
var ventaID = 0;
var tiempoEntreCadaTeclaPresionada = "";
//var listaProductosComprados = [];


//Actualizar solo la celda que le corresponde al campo de cantidad en la DataTable
//Insertar la compra en la BD
//Corregir lo de que la datatable se desborde
//Agregar un listener para mostrar el botón de realizar venta
//Agregar un listener para habilitar el botón de concretar venta
//Ver que onda con que no permita insertar el primer producto si la venta fue recien creada
//Agregar validadores para los campos del formulario Realizar venta

//En_turno  Realizada  Cancelada Credito-pendiente

$(document).ready(function() {
  ComprobarSiHayVentaEnTurno();
  MostrarTablaDescripcionVenta();
});


$(document).on("click", "#BotonModalProductosCrudos", function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();
  $("#TituloModalProductos").text("Productos crudos");
  MostrarTablaProductos("Crudo");
});


$(document).on("click", "#BotonModalProductosCocidos", function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();
  $("#TituloModalProductos").text("Productos cocidos");
  MostrarTablaProductos("Cocido");
});


$(document).on("click", "#BotonModalProductosAcompañantes", function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();
  $("#TituloModalProductos").text("Productos acompañantes");
  MostrarTablaProductos("Acompañantes");
});


function ComprobarSiHayVentaEnTurno() {
  if (usuarioID) {
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
        $('#InputVentaID').val(id_venta);
      }
    });
  }
}


  function MostrarTablaDescripcionVenta() {
    if (!ventaID) {
      ComprobarSiHayVentaEnTurno();
    }

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
                  <a href="#" id="BorrarProductoDeLaVenta" class="btn btn-danger btn-remove" ProductoID="${row.id_producto}" Cantidad="${row.cantidad}" Piezas="${row.piezas}""><i class="fas fa-shopping-cart"></i></a>
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
  if (!ventaID) {
    ComprobarSiHayVentaEnTurno();
  }

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
}


$(document).on("click", "#EliminarTablaVentaProductos", function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();
  $('#TablaVentaProductos').DataTable().clear();
  $('#TablaVentaProductos').DataTable().destroy();
});


$(document).on("click", "#AgregarProductoALaVenta", function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();

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
          ModificarCantidadProducto(productoID, nuevaCantidad, tipoProducto);
        }
      }
    });
    $('#TablaDescripcionVenta').DataTable().destroy();
    MostrarTablaDescripcionVenta();
  }
});


/*$(document).on("click", "#BorrarProductoDeLaVenta", function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();

  var productoID = $(this).attr("ProductoID");
  var cantidad = $(this).attr("Cantidad");
  var piezas = $(this).attr("Piezas");

  if (cantidad > 0) {
    $.ajax({
      type: "post",
      url: base_url + 'Ventas/VentasControlador/EliminarProductoVenta',
      data: {
        productoID: productoID,
        ventaID: ventaID,
      },
      dataType: "json",
      success: function(resultadoConsulta) {
        if (resultadoConsulta == "Si se eliminó") {
          var nuevaCantidad = cantidad + piezas;
          ModificarCantidadProducto(productoID, nuevaCantidad, "");
        }
      }
    });
    $('#TablaDescripcionVenta').DataTable().destroy();
    MostrarTablaDescripcionVenta();
  }
});*/


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
      $('#TablaVentaProductos').DataTable().destroy();
      MostrarTablaProductos(tipoProducto);
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


$(document).on('click', '#BotonRealizarVenta', function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();

  $.ajax({
    type: 'post',
    url: base_url + 'Ventas/VentasControlador/ObtenerSubtotalVenta',
    data: {
      ventaID: ventaID,
    },
    dataType: 'json',
    success: function(subtotalVenta) {
      $('#ModalRealizarVenta').modal('show');
      $('#SubtotalVenta').val(subtotalVenta)
      $('#TotalVenta').val(subtotalVenta)
    }
  });
});


/*$("#InputVentaID").on('change', function(aunNoSeQueHace){
  aunNoSeQueHace.preventDefault();

  if (ventaID) {
    $('#TotalVenta').val(nuevoTotal);
  } else {
    $('#DescuentoVenta').val('');
    toastr.warning("El descuento no puede ser mayor al total de la venta", "¡Cuidado!");
  }
});*/


$("#DescuentoVenta").on('keyup', function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();

  var subtotal = parseFloat($('#SubtotalVenta').val());
  var descuento = parseFloat($('#DescuentoVenta').val());
  var pago = parseFloat($('#PagoVenta').val());

  if (subtotal > descuento) {
    var total = subtotal - descuento;
    $('#TotalVenta').val(total);
    if(pago) {
      var cambio = pago - total;
      $('#CambioVenta').val(cambio);
    }
  } else if (!descuento) {
    $('#TotalVenta').val(subtotal);
    if(pago) {
      var cambio = pago - subtotal;
      $('#CambioVenta').val(cambio);
    }
  } else {
    $('#TotalVenta').val("El descuento no puede ser mayor o igual al total de la venta");
    $('#DescuentoVenta').val('');
    //toastr.warning("El descuento no puede ser mayor al total de la venta", "¡Cuidado!");
  }
});


$("#PagoVenta").on("keyup", function() {
  clearTimeout(tiempoEntreCadaTeclaPresionada);
  tiempoEntreCadaTeclaPresionada = setTimeout(ValidarPagoVenta, 750);
});


function ValidarPagoVenta() {
  var pago = parseFloat($('#PagoVenta').val());
  var total = parseFloat($('#TotalVenta').val());

  if (pago >= total) {
    var cambio = pago - total;
    $('#CambioVenta').val(cambio);
  } else if (!pago) {
    $('#CambioVenta').val('');
  } else {
    $('#PagoVenta').val('');
    $('#CambioVenta').val("No se pagó el total de la venta");
  }
}


$(document).on('click', '#BotonConcretarVenta', function(aunNoSeQueHace) {
  aunNoSeQueHace.preventDefault();

  var subtotal = $('#SubtotalVenta').val();
  var descuento = $('#DescuentoVenta').val();
  var total = $('#TotalVenta').val();
  var pago = $('#PagoVenta').val();
  var cambio = $('#CambioVenta').val();

  if (!descuento) {
    descuento = "0";
  }

  $.ajax({
    type: 'post',
    url: base_url + 'Ventas/VentasControlador/ActualziarVenta',
    data: {
      ventaID: ventaID,
      subtotal: subtotal,
      descuento: descuento,
      total: total,
      pago: pago,
      cambio: cambio,
    },
    dataType: 'json',
    success: function(ventaActualizada) {
      if (ventaActualizada) {
        ventaID = 0;
        $('#ModalRealizarVenta').modal('hide');
        $('#FormularioRealizarVenta')[0].reset();
        $('#TablaDescripcionVenta').DataTable().destroy();
        MostrarTablaDescripcionVenta();
      }
    }
  });
});


$(document).on('click', '#BotonCancelarVenta', function(e) {
  e.preventDefault();

  Swal.fire({
    title: "¿Estás seguro de cancelar la venta actual?",
    //text: "¡Esta acción es irreversible!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#dd3333",
    confirmButtonText: "¡Si, cancelala!",
    cancelButtonText: "¡No, no la canceles!",
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'post',
        url: base_url + 'Ventas/VentasControlador/CancelarVenta',
        data: {
          ventaID: ventaID,
        },
        dataType: 'json',
        success: function(ventaFueCancelada) {
          if (ventaFueCancelada) {
            Swal.fire(
              "¡Cancelada!",
              "La venta fue cancelada"
            );
            ventaID = 0;
            $('#ModalRealizarVenta').modal('hide');
            $('#FormularioRealizarVenta')[0].reset();
            $('#TablaDescripcionVenta').DataTable().destroy();
            MostrarTablaDescripcionVenta();
          }
        },
      });
    }
  });
});


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
