var listaProductosComprados = [];


$(document).on("click", "#DescripcionVenta", function(e) {

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


function MostrarTablaDescripcionVenta() {

  var contador = "1";
  $('#TablaDescripcionVenta').DataTable({
    data: listaProductosComprados,
    responsive: true,
    columns: [
      {
        data: 'nombreProducto',
        orderable: false,
      },
      {
        data: 'precioProducto',
        orderable: false,
      },
      {
        data: 'piezas',
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
            <a href="#" id="BorrarProductoDeLaVenta" class="btn btn-danger btn-remove" PosicionArray="${contador - 1}">
            <i class="fas fa-shopping-cart"></i></a>
          `;
        },//Como cuando pinte los cuadros
      },
    ],
    'language': idiomaEspañolTablas,
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
      var contador = "1";
      $('#TablaVentaProductos').DataTable({
        data: datosProducto,
        responsive: true,
        columns: [
          {
            data: 'nombre_producto',
            orderable: false,
          },
          {
            data: 'precio',
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
              return `
                <input type="number" id="CantidadPiezasDeseadasDelProductoConID` + row.id_producto + `" style="width: 50%; text-align: center;" min="0" max="${row.cantidad}" step="1" value="0" onkeyup=enforceMinMax(this)>
              `;
            },
          },
          {
            orderable: false,
            searchable: false,
            data: function(row, type, set) {
              return `
                <a href="#" id="AgregarProductoALaVenta" class="btn btn-success btn-remove" NombreProducto="${row.nombre_producto}" Precio="${row.precio}" ProductoID="${row.id_producto}"><i class="fas fa-shopping-cart"></i></a>
              `;
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
  var precio = $(this).attr("Precio");
  var productoID = $(this).attr("ProductoID");
  var piezas = $('#CantidadPiezasDeseadasDelProductoConID'+productoID).val();

  console.log(nombreProducto, precio, piezas);

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
