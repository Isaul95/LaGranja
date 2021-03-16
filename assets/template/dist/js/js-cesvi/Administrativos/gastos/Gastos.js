$(document).ready(function () {
    llenartablagastos(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA




});

/* ---------------------------- Add producto Modal --------------------------- */
$("#modal_add_gasto").on("hide.bs.modal", function (e) {
    // do something...

    $("#addgasto")[0].reset();
});
/* ---------------------------- Edit producto Modal --------------------------- */
$("#modaleditgastoa").on("hide.bs.modal", function (e) {
    // do something...
    //date_picker_nu();
    $("#formeditargasto")[0].reset();
});

/* -------------------------------------------------------------------------- */
/*                      Llenar tabla Gastos                           */
/* -------------------------------------------------------------------------- */
function llenartablagastos() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Gastos/listarGastos',
        dataType: "json",
        success: function (response) {
            var i = "1";
            $("#tbl_gastos").DataTable({
                data: response,
                responsive: true,
                columns: [
                    {
                        data: "idegreso",
                        "visible": false,
                        "searchable": false
                    },

                    {
                        data: "tipo",
                    },
                    {
                        data: "cantidad",
                    },

                    {
                        data: "total",
                    },
                    {
                        data: "fecha",
                    },
                    {
                        data: "nombres",
                    },


                    {
                        orderable: false,
                        visible: false,
                        searchable: false,
                        data: function (row, type, set) {
                            return `

                        <a href="#" id="edit_gasto" class="btn btn-success btn-remove" value="${row.idegreso}"><i class="far fa-edit"></i></a>
                        <a href="#" id="del_gasto" class="btn btn-danger btn-remove" value="${row.idegreso}"><i class="fas fa-trash-alt"></i></a>
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
/*                           Agregar Gasto                           */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#btnaddgasto", function (e) {
    e.preventDefault();
    var tipo = $("#tipo_g").val();
    //var cantidad = $("#cantidad_g").val();
    var total = $("#total_g").val();
    var usuario = $("#id_usuario_g").val();
/*
    if($("#cantidad_g").val() == '' || $("#cantidad_g").val() =='0'){
      cantidad=0;
    }
*/
      var f = new Date();
      var yyyy = f.getFullYear();
      var mm = f.getMonth()+1;
      var dd = f.getDate();

      if(mm<10){
        mm='0'+mm //agrega cero si el menor de 10
      }

      if(dd<10){
        dd='0'+dd; //agrega cero si el menor de 10
      }

      fecha = yyyy + "/" + mm + "/" + dd;
      var ho = f.getHours();
      var min = f.getMinutes();
      var seg = f.getSeconds();

      if(min<10){
        min='0'+min //agrega cero si el menor de 10
      }

      if(seg<10){
        seg='0'+seg; //agrega cero si el menor de 10
      }
      hora = ho + ":" + min + ":" + seg;

    if (tipo == "" || total == "") {
        alert("¡Complete todos los campos!");
    } else {
        var fd = new FormData();
        //fd.append("cantidad", cantidad);
        fd.append("tipo", tipo);
        fd.append("fecha", fecha);
        fd.append("total", total);
        fd.append("usuario", usuario);

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Gastos/agregarGasto',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#modal_add_gasto").modal("hide");
                    $("#addgasto")[0].reset();
                    $("#tbl_gastos").DataTable().destroy();
                    llenartablagastos();
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
$(document).on("click", "#del_gasto", function (e) {
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
                url: base_url + 'Administrativos/Gastos/eliminarGasto',
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
                        $("#tbl_gastos").DataTable().destroy();
                        llenartablagastos();
                    }
                },
            });
        }
    });
});
/* -------------------------------------------------------------------------- */
/*                 Llenar formulario Actualizar                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#edit_gasto", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Gastos/editarGasto',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditgasto').modal('show');

            // Llena los inputs del formulario con los datos a modificar
            $('#id_gasto_update_g').val(data.post.idegreso);
            $('#tipo_g_nuevo').val(data.post.tipo);
            //$('#cantidad_g_nuevo').val(data.post.cantidad);
            $('#total_g_nuevo').val(data.post.total);
            $('#id_usuario_regi').val(data.post.usuario);





        },
    });
});


/* -------------------------------------------------------------------------- */
/*                        Actualizar Producto                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#update_gasto", function (e) {
    e.preventDefault();
//debugger;
    var idegreso = $("#id_gasto_update_g").val();
    var tipo = $("#tipo_g_nuevo").val();
    //var cantidad = $("#cantidad_g_nuevo").val();
    var total = $("#total_g_nuevo").val();

    var usuario_cam = $("#id_usuario_modifi").val();
    var usuario_reg = $("#id_usuario_regi").val();
/*
    if($("#cantidad_g_nuevo").val() == '' || $("#cantidad_g_nuevo").val() =='0'){
      cantidad=0;
    }
*/
    if ($("#id_usuario_regi").val() == $("#id_usuario_modifi").val()) {
      usuario = usuario_reg;
    }else{
      usuario = usuario_cam;
    }

    var f = new Date();
    var yyyy = f.getFullYear();
    var mm = f.getMonth()+1;
    var dd = f.getDate();

    if(mm<10){
      mm='0'+mm //agrega cero si el menor de 10
    }

    if(dd<10){
      dd='0'+dd; //agrega cero si el menor de 10
    }

    fecha = yyyy + "/" + mm + "/" + dd;
    var ho = f.getHours();
    var min = f.getMinutes();
    var seg = f.getSeconds();

    if(min<10){
      min='0'+min //agrega cero si el menor de 10
    }

    if(seg<10){
      seg='0'+seg; //agrega cero si el menor de 10
    }
    hora = ho + ":" + min + ":" + seg;



    if (tipo == ""  || total == "") {
        alert("¡Complete todos los campos!");
    } else {

      var fd = new FormData();
      fd.append("idegreso", idegreso);
      //fd.append("cantidad", cantidad);
      fd.append("tipo", tipo);
      fd.append("fecha", fecha);
      fd.append("total", total);
      fd.append("usuario", usuario);


      $.ajax({
          type: "post",
          url: base_url + 'Administrativos/Gastos/updateGasto',
          data:fd,
          processData: false,
          contentType: false,
          dataType: "json",
          enctype: 'multipart/form-data',
          success: function (data) {
            //console.log(res); //ver la respuesta del json, los valores que contiene
              if (data.responce == "success") {
                toastr["success"](data.message);
                $("#modaleditgasto").modal("hide");
                $("#formeditargasto")[0].reset();
                $("#tbl_gastos").DataTable().destroy();
                llenartablagastos();
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
