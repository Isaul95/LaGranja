$(document).ready(function () {
    llenartablaproductos(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA

    date_picker();


});

/* ---------------------------- Add producto Modal --------------------------- */
$("#modal_add_producto").on("hide.bs.modal", function (e) {
    // do something...

    $("#addproducto")[0].reset();
});
/* ---------------------------- Edit producto Modal --------------------------- */
$("#modaleditproducto").on("hide.bs.modal", function (e) {
    // do something...
    //date_picker_nu();
    $("#formeditarproducto")[0].reset();
});

/* -------------------------------------------------------------------------- */
/*                      Llenar tabla Productos                             */
/* -------------------------------------------------------------------------- */
function llenartablaproductos() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Productos/listarProductos',
        dataType: "json",
        success: function (response) {
            var i = "1";
            $("#tbl_productos").DataTable({
                data: response,
                responsive: true,
                columns: [
                    {
                        data: "id_producto",
                        "visible": false,
                        "searchable": false
                    },
                    {
                        data: "nombre_producto",
                    },
                    {
                        data: "tipo_producto",
                    },

                    {
                        data: "precio",
                    },
                    {
                        data: "cantidad",
                    },
                    {
                        data: "fecha_y_hora",
                    },

                    {
                        orderable: false,
                        searchable: false,
                        data: function (row, type, set) {
                            return `

                        <a href="#" id="edit_producto" class="btn btn-success btn-remove" value="${row.id_producto}"><i class="far fa-edit"></i></a>
                        <a href="#" id="del_producto" class="btn btn-danger btn-remove" value="${row.id_producto}"><i class="fas fa-trash-alt"></i></a>
                                 `;
                        },
                    },
                ],

                "language": language_espaniol,
            });
        },
    });
} // fin de llenar tabla Mobiliario

/* -------------------------------------------------------------------------- */
/*                           Agregar Producto                             */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#btnaddproducto", function (e) {
    e.preventDefault();



    var nombre_producto = $("#nombre_producto").val();
    var tipo_producto = $("#tipo_producto").val();
    var precio = parseFloat($("#precio_producto").val());  // Se convierte el texto a un float
    var cantidad = parseFloat($("#cantidad_producto").val());  // Se convierte el texto a un float
    var fecha_de_caducidad = $("#fecha_caducidad").val();
    var id_proveedor = 1;
    var fecha = $("#fechaf").val();

    if($("#fechaf").val() == ''){
      var f = new Date();
      var yyyy = f.getFullYear();
      var mm = f.getMonth()+1;
      //var mm= m+1;
      var dd = f.getDate();

      if(mm<10){
        mm='0'+mm //agrega cero si el menor de 10
      }

      if(dd<10){
        dd='0'+dd; //agrega cero si el menor de 10
      }

      fecha = yyyy + "/" + mm + "/" + dd;
    }

    if($("#fecha_caducidad").val() == ''){
      fecha_de_caducidad='Sin fecha de caducidad';
    }


    if (nombre_producto == "" || precio == "" || tipo_producto == "" || cantidad == "") {
        alert("¡Complete todos los campos!");
    } else {
        var fd = new FormData();
        fd.append("nombre_producto", nombre_producto);
        fd.append("tipo_producto", tipo_producto);
        fd.append("precio", precio);
        fd.append("cantidad", cantidad);
        fd.append("fecha_de_caducidad", fecha_de_caducidad);
        fd.append("id_proveedor", id_proveedor);
        //fd.append("fecha_y_hora", fecha_y_hora);
        fd.append("fecha", fecha);
        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Productos/agregarProducto',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#modal_add_producto").modal("hide");
                    $("#addproducto")[0].reset();
                    $("#tbl_productos").DataTable().destroy();
                    llenartablaproductos();
                } else {
                    toastr["error"](response.message);
                }
            },
        });
    }
});


/* -------------------------------------------------------------------------- */
/*                             Eliminar registro                              */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#del_producto", function (e) {
    e.preventDefault();
    var del_id = $(this).attr("value");
    Swal.fire({
        title: "¿Estás seguro de Borrar?",
        text: "¡Esta acción es irreversile!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, bórralo!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: base_url + 'Administrativos/Productos/eliminarProducto',
                data: {
                    del_id: del_id,
                },
                dataType: "json",
                success: function (data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Eliminado!',
                            'El producto fue eliminado',
                            'success'
                        );
                        $("#tbl_productos").DataTable().destroy();
                        llenartablaproductos();
                    }
                },
            });
        }
    });
});
/* -------------------------------------------------------------------------- */
/*                 Llenar formulario Actualizar                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#edit_producto", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Productos/editarProducto',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditproducto').modal('show');

            // Llena los inputs del formulario con los datos a modificar
            $('#id_producto_update').val(data.post.id_producto);
            $('#nombre_producto_nuevo').val(data.post.nombre_producto);
            $('#tipo_producto_nuevo').val(data.post.tipo_producto);

            $('#precio_producto_nuevo').val(data.post.precio);
            $('#cantidad_producto_nuevo').val(data.post.cantidad);

            $('#fecha_caducidad_anterior').val(data.post.fecha_de_caducidad);
            $('#fecha_caducidad_nueva').val(data.post.fecha_de_caducidad);
            //$("#fecha_caducidad_nueva").datepicker( "setDate", data.post.fecha_de_caducidad );

        },
    });
});


/* -------------------------------------------------------------------------- */
/*                        Actualizar Producto                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#update_producto", function (e) {
    e.preventDefault();
//debugger;
    var id_producto = $("#id_producto_update").val();
    var nombre_producto = $("#nombre_producto_nuevo").val();
    var tipo_producto = $("#tipo_producto_nuevo").val();
    var precio = parseFloat($("#precio_producto_nuevo").val());
    var cantidad = parseFloat($("#cantidad_producto_nuevo").val());


    var fecha_de_caducidad = $("#fecha_caducidad_nueva").val();

    if ($("#fecha_caducidad_nueva").val() == $("#fecha_caducidad_anterior").val() || $("#fecha_caducidad_nueva").val() == '') {
      fecha_de_caducidad = $("#fecha_caducidad_anterior").val();
    }



    if (nombre_producto == "" || precio_producto == "" || cantidad_producto == "" || tipo_producto =="") {
        alert("¡Complete todos los campos!");
    } else {
      var fd = new FormData();
      fd.append("id_producto", id_producto);
      fd.append("nombre_producto", nombre_producto);
      fd.append("tipo_producto", tipo_producto);
      fd.append("precio", precio);
      fd.append("cantidad", cantidad);
      fd.append("fecha_de_caducidad", fecha_de_caducidad);

      $.ajax({
          type: "post",
          url: base_url + 'Administrativos/Productos/updateProducto',
          data:fd,
          processData: false,
          contentType: false,
          dataType: "json",
          enctype: 'multipart/form-data',
          success: function (data) {
            //console.log(res); //ver la respuesta del json, los valores que contiene
              if (data.responce == "success") {
                toastr["success"](data.message);
                $("#modaleditproducto").modal("hide");
                $("#formeditarproducto")[0].reset();
                $("#tbl_productos").DataTable().destroy();
                llenartablaproductos();
              } else {
                  toastr["error"](data.message);
              }
          },
      });


    }
});


function date_picker() {
    $("#fecha_caducidad,#fecha_caducidad_nueva").datepicker({
        closeText: 'Cerrar',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    $.datepicker.setDefaults($.datepicker.regional['es']);
}


// ********************   variable PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
var language_espaniol = {
    "lengthMenu": "Mostrar _MENU_ registros por pagina",
    "zeroRecords": "No se encontraron resultados en su busqueda",
    "searchPlaceholder": "Buscar Registros",
    "info": "Total: _TOTAL_ registros",
    "infoEmpty": "No Existen Registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    }, /* TODO ESTO ES PARA CAMBIAR DE IDIOMA */


}
