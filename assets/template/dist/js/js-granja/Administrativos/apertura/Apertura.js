$(document).ready(function () {
  //verificarFecha();
  llenartablaapertura(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA




});

/* ---------------------------- Add producto Modal --------------------------- */
$("#modal_add_apertura").on("hide.bs.modal", function (e) {
    // do something...

    $("#addapertura")[0].reset();
});
/* ---------------------------- Edit producto Modal --------------------------- */
$("#modaleditapertura").on("hide.bs.modal", function (e) {
    // do something...
    //date_picker_nu();
    $("#formeditarapertura")[0].reset();
});

function verificarFecha() {
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
  //$('#f').val(fecha);

  //
  $.ajax({
      type: "get",
      url: base_url + 'Administrativos/Apertura/getFechaApertura',
      dataType: "json",
      success: function (datos) {
          //ar i = "1";
          for (x=0;x<datos.length;x++){
            if(datos[x].fecha == fecha){
              //document.getElementById('modal_add_apertura').disabled=true;
              document.getElementById('btnaddapertura').disabled=true;
            }else {
              //document.getElementById('modal_add_apertura').disabled=false;
              document.getElementById('btnaddapertura').disabled=false;
            }
            //$('#pex_nuevo').append('<option value="'+datos[x].nombre_producto+'">'+ datos[x].nombre_producto +'</option>');
          }

      }
  });

}


/* -------------------------------------------------------------------------- */
/*                      Llenar tabla Aperturas                             */
/* -------------------------------------------------------------------------- */
function llenartablaapertura() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Apertura/listarAperturas',
        dataType: "json",
        success: function (response) {
          //alert(response);
            var i = "1";
            $("#tbl_aperturas").DataTable({
                data: response,
                responsive: true,
                columns: [
                    {
                        data: "id_apertura",
                        "visible": false,
                        "searchable": false
                    },

                    {
                        data: "monto",
                    },
                    {
                        data: "fecha",
                    },

                    {
                        data: "hora",
                    },
                    {
                        data: "nombres",
                    },


                    {
                        orderable: false,
                        searchable: false,
                        data: function (row, type, set) {
                            return `

                        <a href="#" id="edit_apertura" class="btn btn-success btn-remove" value="${row.id_apertura}"><i class="far fa-edit"></i></a>
                        <a href="#" id="del_apertura" class="btn btn-danger btn-remove" value="${row.id_apertura}"><i class="fas fa-trash-alt"></i></a>
                                 `;
                        },
                    },
                ],

                "language": language_espaniol,
            });
        },
        //alert('error');
    });
} // fin de llenar tabla Mobiliario

/* -------------------------------------------------------------------------- */
/*                           Agregar Apertura                            */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#btnaddapertura", function (e) {
    e.preventDefault();

    var monto = $("#monto").val();
    var usuario = $("#id_usuario").val();

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

    if (monto == "") {
        alert("¡Complete todos los campos!");
    } else {
        var fd = new FormData();
        fd.append("monto", monto);
        fd.append("fecha", fecha);
        fd.append("hora", hora);
        fd.append("usuario", usuario);

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Apertura/agregarApertura',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#modal_add_apertura").modal("hide");
                    $("#addapertura")[0].reset();
                    $("#tbl_aperturas").DataTable().destroy();
                    //verificarFecha();
                    llenartablaapertura();
                } else {
                    toastr["error"](response.message);
                    $('#btn_apertura').hide();
                }
            },
        });
    }
});


/* -------------------------------------------------------------------------- */
/*                             Eliminar registro                              */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#del_apertura", function (e) {
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
                url: base_url + 'Administrativos/Apertura/eliminarApertura',
                data: {
                    del_id: del_id,
                },
                dataType: "json",
                success: function (data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Eliminado!',
                            'La apertura fue eliminado',
                            'success'
                        );
                        $("#tbl_aperturas").DataTable().destroy();
                        //verificarFecha();
                        llenartablaapertura();
                    }
                },
            });
        }
    });
});
/* -------------------------------------------------------------------------- */
/*                 Llenar formulario Actualizar                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#edit_apertura", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Apertura/editarApertura',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditapertura').modal('show');

            // Llena los inputs del formulario con los datos a modificar
            $('#id_apertura_update').val(data.post.id_apertura);
            $('#monto_nuevo').val(data.post.monto);
            $('#id_usuario_reg').val(data.post.usuario);





        },
    });
});


/* -------------------------------------------------------------------------- */
/*                        Actualizar Producto                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#update_apertura", function (e) {
    e.preventDefault();
//debugger;
    var id_apertura = $("#id_apertura_update").val();
    var monto = $("#monto_nuevo").val();
    var usuario_cam = $("#id_usuario_cambio").val();
    var usuario_reg = $("#id_usuario_reg").val();

    if ($("#id_usuario_reg").val() == $("#id_usuario_cambio").val()) {
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



    if (monto == "") {
        alert("¡Complete todos los campos!");
    } else {

      var fd = new FormData();
      fd.append("id_apertura", id_apertura);
      fd.append("monto", monto);
      fd.append("fecha", fecha);
      fd.append("hora", hora);
      fd.append("usuario", usuario);


      $.ajax({
          type: "post",
          url: base_url + 'Administrativos/Apertura/updateApertura',
          data:fd,
          processData: false,
          contentType: false,
          dataType: "json",
          enctype: 'multipart/form-data',
          success: function (data) {
            //console.log(res); //ver la respuesta del json, los valores que contiene
              if (data.responce == "success") {
                toastr["success"](data.message);
                $("#modaleditapertura").modal("hide");
                $("#formeditarapertura")[0].reset();
                $("#tbl_aperturas").DataTable().destroy();
                //verificarFecha();
                llenartablaapertura();
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
