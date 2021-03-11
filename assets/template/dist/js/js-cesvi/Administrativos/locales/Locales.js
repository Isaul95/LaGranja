$(document).ready(function () {
    llenartablalocales(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA




});

/* ---------------------------- Add producto Modal --------------------------- */
$("#modal_add_local").on("hide.bs.modal", function (e) {
    // do something...

    $("#addlocal")[0].reset();
});
/* ---------------------------- Edit producto Modal --------------------------- */
$("#modaleditlocal").on("hide.bs.modal", function (e) {

    $("#formeditarlocal")[0].reset();
});

/* -------------------------------------------------------------------------- */
/*                      Llenar tabla Gastos                           */
/* -------------------------------------------------------------------------- */
function llenartablalocales() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Locales/listarLocales',
        dataType: "json",
        success: function (response) {
            var i = "1";
            $("#tbl_local").DataTable({
                data: response,
                responsive: true,
                columns: [
                    {
                        data: "id_local",
                        "visible": false,
                        "searchable": false
                    },

                    {
                        data: "nombre",
                    },
                    {
                        data: "direccion",
                    },

                    {
                        data: "telefono",
                    },
                    {
                        data: "encargado",
                    },


                    {
                        orderable: false,
                        searchable: false,
                        data: function (row, type, set) {
                            return `

                        <a href="#" id="edit_local" class="btn btn-success btn-remove" value="${row.id_local}"><i class="far fa-edit"></i></a>
                        <a href="#" id="del_local" class="btn btn-danger btn-remove" value="${row.id_local}"><i class="fas fa-trash-alt"></i></a>
                                 `;
                        },
                    },
                ],

                "language": language_espaniol,
            });
        },
    });
} // fin de llenar tabla

/* -------------------------------------------------------------------------- */
/*                           Agregar Local                          */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#btnaddlocal", function (e) {
    e.preventDefault();
    var nombre = $("#nombre_local").val();
    var direccion = $("#direccion_local").val();
    var telefono = $("#telefono_local").val();
    var encargado = $("#encargado").val();


    if (nombre == "" || direccion == "" || telefono == "" || encargado == "") {
        alert("¡Complete todos los campos!");
    } else {
        var fd = new FormData();
        fd.append("nombre", nombre);
        fd.append("direccion", direccion);
        fd.append("telefono", telefono);
        fd.append("encargado", encargado);

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Locales/agregarLocal',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#modal_add_local").modal("hide");
                    $("#addlocal")[0].reset();
                    $("#tbl_local").DataTable().destroy();
                    llenartablalocales();
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
$(document).on("click", "#del_local", function (e) {
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
                url: base_url + 'Administrativos/Locales/eliminarLocal',
                data: {
                    del_id: del_id,
                },
                dataType: "json",
                success: function (data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Eliminado!',
                            'El registro fue eliminado',
                            'success'
                        );
                        $("#tbl_local").DataTable().destroy();
                        llenartablalocales();
                    }
                },
            });
        }
    });
});
/* -------------------------------------------------------------------------- */
/*                 Llenar formulario Actualizar                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#edit_local", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Locales/editarLocal',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditlocal').modal('show');

            // Llena los inputs del formulario con los datos a modificar
            $('#id_local_update').val(data.post.id_local);
            $('#nombre_local_m').val(data.post.nombre);
            $('#direccion_local_m').val(data.post.direccion);
            $('#telefono_local_m').val(data.post.telefono);
            $('#encargado_m').val(data.post.encargado);

        },
    });
});


/* -------------------------------------------------------------------------- */
/*                        Actualizar Producto                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#update_local", function (e) {
    e.preventDefault();
//debugger;
    var id_local = $("#id_local_update").val();
    var nombre = $("#nombre_local_m").val();
    var direccion = $("#direccion_local_m").val();
    var telefono = $("#telefono_local_m").val();
    var encargado = $("#encargado_m").val();


    if (nombre == ""  || direccion == "" || telefono == "" || encargado == "") {
        alert("¡Complete todos los campos!");
    } else {

      var fd = new FormData();
      fd.append("id_local", id_local);
      fd.append("nombre", nombre);
      fd.append("direccion", direccion);
      fd.append("telefono", telefono);
      fd.append("encargado", encargado);


      $.ajax({
          type: "post",
          url: base_url + 'Administrativos/Locales/updateLocales',
          data:fd,
          processData: false,
          contentType: false,
          dataType: "json",
          enctype: 'multipart/form-data',
          success: function (data) {
            //console.log(res); //ver la respuesta del json, los valores que contiene
              if (data.responce == "success") {
                toastr["success"](data.message);
                $("#modaleditlocal").modal("hide");
                $("#formeditarlocal")[0].reset();
                $("#tbl_local").DataTable().destroy();
                llenartablalocales();
              } else {
                  toastr["error"](data.message);
              }
          },
      });


    }
});



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
