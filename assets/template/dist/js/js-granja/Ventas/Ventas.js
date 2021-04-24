var listaProductosComprados = [];
var ventaID = 0;
var fecha = new Date();
var mes = fecha.getMonth()+1;
var dia = fecha.getDate();
//mes = String(mes);
//dia = String(dia);
//mes = mes.toString();
//dia = dia.toString();

//Arreglar lo del input number modificando los algoritmos copiados y con expresión regular
//Cambiar el uso de mi arreglo a la tabla de descripcion de venta
//Actualizar solo la celda que le corresponde al campo de cantidad en la DataTable
//Insertar la compra en la BD
//Corregir lo de que la datatable se desborde

//En_turno  Realizada  Cancelada Credito-pendiente
/*window.onload = function() {
  
  if (window.location.href.indexOf('VentaVista.php') > -1) {
    //carousel();
   
  }
}

$(window).load(function(){

  if(document.URL == "/car-driving.html")
  {
    overlay.show();
    overlay.appendTo(document.body);
    $('.popup').show();    
    
    return false;
  }
});*/


$(document).ready(function() {
  
  //ComprobarSiHayVentaEnTurno();
  //MostrarTablaDescripcionVenta();
  ventas_en_turno();

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
  var concat="";
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
        var fecha_a_insertar = concat.concat(fecha.getFullYear(),"/","0",fecha.getMonth()+1,"/",fecha.getDate());
      break;
      default:
        var fecha_a_insertar = concat.concat(fecha.getFullYear(),"/",fecha.getMonth()+1,"/",fecha.getDate());
      break;
  }
console.log(fecha_a_insertar);

  $.ajax({
    type: "post",
    url: base_url + 'Ventas/VentasControlador/CrearVentaEnTurno',
    data: {
      usuarioID: usuarioID,
      fechaActual: fecha_a_insertar,
    },
    dataType: "json",
    success: function(ventaEnTurno) {
      toastr["success"](ventaEnTurno.message);
     // ventaID = ventaEnTurno.id_venta;
      //console.log(ventaID);
    }
  });
}
function ventas_en_turno() {
  
      var usuarioID = $("#id_usuario_venta").val();
  
  $.ajax({
      type: "post",
      url: base_url + 'Ventas/VentasControlador/listar_venta_en_turno',
      data: {
        usuarioID: usuarioID,
      },
      dataType: "json",
      success: function (response) {
          var i = "1";
          $("#TablaDescripcionVenta").DataTable({
              data: response,
              responsive: true,
              columns: [{
                  data: "id_producto",
                  "visible": false,
                  "searchable": false
              },
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
                  data: function (row, type, set) {
                      return `
                              <a href="#" id="del_materia" class="btn btn-danger btn-remove" value="${row.id_producto}"><i class="fas fa-trash-alt"></i></a>
                          `;
                  },
              },
              ],
              "language": language_espaniol,

          });
      },
  });
}

/*function MostrarTablaDescripcionVenta() {

  $('#TablaDescripcionVenta').DataTable({
    data: listaProductosComprados,
    responsive: true,
    columns: [
      {
        data: 'nombreProducto',
        orderable: false,
      },
      {
        data: 'piezas',
        orderable: false,
      },
      {
        data: 'precioProducto',
        orderable: false,
      },
      {
        data: 'precioTotal',
        orderable: false,
      },
      {
        orderable: false,
        searchable: false,
        data: function(row, type, set) {
          return `
            <a href="#" id="BorrarProductoDeLaVenta" class="btn btn-danger btn-remove" NombreProducto="${row.nombreProducto}"">
            <i class="fas fa-shopping-cart"></i></a>
          `;
        },
      },
    ],
    'language': idiomaEspañolTablas,
  });
}*/


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
          /*{
            data: 'precio',
            orderable: false,
          },*/
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
                  <input type="number" id="CantidadPiezasDeseadasDelProductoConID` + row.id_producto + `" style="width: 50%; text-align: center;" min="0" max="${row.cantidad}" step="1" value="0" onkeyup=enforceMinMax(this)>
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
                  <a href="#" id="AgregarProductoALaVenta" class="btn btn-success btn-remove" NombreProducto="${row.nombre_producto}" Precio="${row.precio}" ProductoID="${row.id_producto}" TipoProducto="${row.tipo_producto}"><i class="fas fa-shopping-cart"></i></a>
                `;// IndexTabla="` + $('#TablaVentaProductos').DataTable().row(this).index() + `"
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
}


$(document).on("click", "#EliminarTablaVentaProductos", function(e) {

  $("#TablaVentaProductos").DataTable().clear();
  $("#TablaVentaProductos").DataTable().destroy();

});


$(document).on("click", "#AgregarProductoALaVenta", function(e) {

  var nombreProducto = $(this).attr("NombreProducto");
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
  }

  var tipoProducto = $(this).attr("TipoProducto");
  /*var indexTabla = $(this).attr("IndexTabla");
  console.log(indexTabla);*/

  $.ajax({
    type: "post",
    url: base_url + 'Ventas/VentasControlador/CambiarCantidadProducto',
    data: {
      operacion: "Resta",
      piezas: piezas,
      productoID: productoID,
    },
    dataType: "json",
    success: function(consulta) {
      if (consulta.Resultado == "Exitoso") {
        //var cantidad = consulta.Cantidad;
        console.log(consulta.Valor.cantidad);
        //ActualizarCantidadProductoEnLaTabla(cantidad, );
      }
    },
  });

  $('#TablaDescripcionVenta').DataTable().destroy();
  MostrarTablaDescripcionVenta();

});


$(document).on("click", "#BorrarProductoDeLaVenta", function(e) {

  var nombreProducto = $(this).attr("NombreProducto");
  var posicionProductoLista = listaProductosComprados.findIndex(producto => producto.nombreProducto == nombreProducto);
  var piezas = listaProductosComprados[posicionProductoLista].piezas;

  listaProductosComprados.splice(posicionProductoLista, 1);

  $.ajax({
    type: "post",
    url: base_url + 'Ventas/VentasControlador/CambiarCantidadProducto',
    data: {
      operacion: "Suma",
      piezas: piezas,
      nombreProducto: nombreProducto,
    },
    dataType: "json",
    success: function(consulta) {
      if (consulta.Resultado == "Exitoso") {
        //console.log(consulta.Cantidad);
      }//Duda, ¿cómo hacer una de estas cosas sin que le retornen respuesta?, o alguna variante
    },
  });

  $('#TablaDescripcionVenta').DataTable().destroy();
  MostrarTablaDescripcionVenta();

});


function enforceMinMax(el){
  if(el.value != ""){
    if(parseInt(el.value) < parseInt(el.min)){
      el.value = el.min;
    }
    if(parseInt(el.value) > parseInt(el.max)){
      el.value = el.max;
    }
  }
}


$(function () {
  $("input").keydown(function () {
    // Save old value.
    if (!$(this).val() || (parseInt($(this).val()) <= 11 && parseInt($(this).val()) >= 0))
    $(this).data("old", $(this).val());
  });
  $("input").keyup(function () {
    // Check correct, else revert back to old value.
    if (!$(this).val() || (parseInt($(this).val()) <= 11 && parseInt($(this).val()) >= 0))
      ;
    else
      $(this).val($(this).data("old"));
  });
  //Usar expresiones regulares
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
