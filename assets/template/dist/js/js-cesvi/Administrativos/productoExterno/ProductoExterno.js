$(document).ready(function () {
    llenartablaproductoext(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
    llenarLocales();
    llenarProductos();
    llenarLocalesM();
    llenarProductosEdit();

    document.getElementById('btnaddpexf').disabled=true;




});

/* ---------------------------- Add producto Modal --------------------------- */
$("#modal_add_pex").on("hide.bs.modal", function (e) {
    // do something...

    $("#addpex")[0].reset();
});


/* ---------------------------- Edit producto Modal --------------------------- */

$("#modaleditpex").on("hide.bs.modal", function (e) {
    // do something...
    //date_picker_nu();
    $("#formeditarpex")[0].reset();
});

function llenartablaproductoext() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/ProductoExterno/listarProductoExterno',
        dataType: "json",
        success: function (response) {
            var i = "1";
            $("#tbl_pex").DataTable({
                data: response,
                responsive: true,
                columns: [
                    {
                        data: "id_pe",
                        "visible": false,
                        "searchable": false
                    },

                    {
                        data: "producto",
                    },
                    {
                        data: "tipo",
                    },
                    {
                        data: "precio",
                    },

                    {
                        data: "pieza",
                    },
                    {
                        data: "total",
                    },
                    {
                        data: "tienda_externa",
                    },
                    {
                        data: "fecha",
                    },


                    {
                        orderable: false,
                        searchable: false,
                        data: function (row, type, set) {
                            return `

                        <center><a href="#" id="edit_pex" class="btn btn-success btn-remove" value="${row.id_pe}"><i class="far fa-edit"></i></a>
                        <a href="#" id="del_pex" class="btn btn-danger btn-remove" value="${row.id_pe}"><i class="fas fa-trash-alt"></i></a></center>
                                 `;
                        },
                    },
                ],

                "language": language_espaniol,
            });
        },
    });
} // fin de llenar tabla

//Llenar input $locales

function llenarLocales() {
  //
  $.ajax({
      type: "get",
      url: base_url + 'Administrativos/ProductoExterno/getLocales',
      dataType: "json",
      success: function (datos) {
          //ar i = "1";
          for (x=0;x<datos.length;x++){
            $('#tienda').append('<option value="'+datos[x].nombre+'">'+ datos[x].nombre +'</option>');
          }

      }
  });

}
function llenarProductos() {
  //
  $.ajax({
      type: "get",
      url: base_url + 'Administrativos/ProductoExterno/getProductos',
      dataType: "json",
      success: function (datos) {
          //ar i = "1";
          for (x=0;x<datos.length;x++){
            $('#producto_externo').append('<option value="'+datos[x].nombre_producto+'">'+ datos[x].nombre_producto +'</option>');
          }

      }
  });

}

function llenarProductosEdit() {
  //
  $.ajax({
      type: "get",
      url: base_url + 'Administrativos/ProductoExterno/getProductos',
      dataType: "json",
      success: function (datos) {
          //ar i = "1";
          for (x=0;x<datos.length;x++){
            $('#pex_nuevo').append('<option value="'+datos[x].nombre_producto+'">'+ datos[x].nombre_producto +'</option>');
          }

      }
  });

}

function llenarLocalesM() {
  //
  $.ajax({
      type: "get",
      url: base_url + 'Administrativos/ProductoExterno/getLocales',
      dataType: "json",
      success: function (datos) {
          //ar i = "1";
          for (x=0;x<datos.length;x++){
            $('#tienda_nueva').append('<option value="'+datos[x].nombre+'">'+ datos[x].nombre +'</option>');
          }

      }
  });

}

// Agregar ProductoExterno

$(document).on("click", "#btnaddpex", function (e) {
    e.preventDefault();
    var tipo ='Crudo';
    var producto = $("#producto_externo").val();
    var precio = parseFloat($("#precio_pex").val());
    var pieza = parseFloat($("#piezas").val());
    var tienda = $("#tienda").val();
    var total = precio * pieza;



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


    if (producto == "" || precio == "" || piezas == "" || tienda == "") {
        alert("¡Complete todos los campos!");
    } else {
        var fd = new FormData();

        fd.append("producto", producto);
        fd.append("tipo", tipo);
        fd.append("precio", precio);
        fd.append("pieza", pieza);
        fd.append("total", total);
        fd.append("tienda", tienda);
        fd.append("fecha", fecha);

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/ProductoExterno/agregarProductoExterno',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#modal_add_pex").modal("hide");
                    $("#addpex")[0].reset();
                    $("#tbl_pex").DataTable().destroy();
                    llenartablaproductoext();
                    document.getElementById('btnaddpexf').disabled=false;
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

$(document).on("click", "#del_pex", function (e) {
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
                url: base_url + 'Administrativos/ProductoExterno/eliminarProductoExt',
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
                        $("#tbl_pex").DataTable().destroy();
                        llenartablaproductoext();
                    }
                },
            });
        }
    });
});
/* -------------------------------------------------------------------------- */
/*                 Llenar formulario Actualizar                               */
/* -------------------------------------------------------------------------- */

$(document).on("click", "#edit_pex", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/ProductoExterno/editarProductoExt',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditpex').modal('show');

            // Llena los inputs del formulario con los datos a modificar
            $('#id_pex_update').val(data.post.id_pe);
            $('#pex_nuevo').val(data.post.producto);
            //$('#tipo_pex_edit').val(data.post.tipo);
            $('#piezas_nuevas').val(data.post.pieza);
            $('#precio_nuevo').val(data.post.precio);
            $('#tienda_anterior').val(data.post.tienda_externa);
            $('#tienda_nueva').val(data.post.tienda_externa);




        },
    });
});

/* -------------------------------------------------------------------------- */
/*                        Actualizar Producto                               */
/* -------------------------------------------------------------------------- */

$(document).on("click", "#update_pex", function (e) {
    e.preventDefault();
//debugger;
    var id_pe = $("#id_pex_update").val();
    var producto = $("#pex_nuevo").val();
    var tipo = 'Crudo';
    var pieza = $("#piezas_nuevas").val();
    var precio = $("#precio_nuevo").val();
    var tienda= $("#tienda_nueva").val();
    var total = precio*pieza;




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

    if (producto == ""  || pieza == "" || precio == "" || tienda == "") {
        alert("¡Complete todos los campos!");
    } else {

      var fd = new FormData();
      fd.append("id_pe", id_pe);
      fd.append("producto", producto);
      fd.append("tipo", tipo);
      fd.append("pieza", pieza);
      fd.append("precio", precio);
      fd.append("total", total);
      fd.append("tienda", tienda);
      fd.append("fecha", fecha);


      $.ajax({
          type: "post",
          url: base_url + 'Administrativos/ProductoExterno/updateProductoExt',
          data:fd,
          processData: false,
          contentType: false,
          dataType: "json",
          enctype: 'multipart/form-data',
          success: function (data) {
            //console.log(res); //ver la respuesta del json, los valores que contiene
              if (data.responce == "success") {
                toastr["success"](data.message);
                $("#modaleditpex").modal("hide");
                $("#formeditarpex")[0].reset();
                $("#tbl_pex").DataTable().destroy();
                llenartablaproductoext();
              } else {
                  toastr["error"](data.message);
              }
          },
      });


    }
});


// Agregar ProductoExterno
$(document).on("click", "#btnaddpexf", function (e) {
    e.preventDefault();

    var hola='hola';
    Swal.fire({
        title: "¿Estás seguro de Agregar Productos externos?",
        text: "¡Se agregaran nuevos productos!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, agregar!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: base_url + 'Administrativos/ProductoExterno/agregarProductoExternoFinal',

                dataType: "json",
                success: function (data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Agregado!',
                            'Los productos fueron agregados',
                            'success'
                        );
                        $("#tbl_pex").DataTable().destroy();
                        llenartablaproductoext();
                    }else {
                      Swal.fire(
                          '¡No agregado!',
                          'Los productos no fueron agregados',
                          'error'
                      );
                      $("#tbl_pex").DataTable().destroy();
                      llenartablaproductoext();
                      document.getElementById('btnaddpexf').disabled=true;
                    }
                },
            });
        }
    });
});

//

$(document).on("click", "#verProductosExt", function (e) {
    e.preventDefault();
    document.getElementById('btnaddpexf').disabled=true;
    $("#tbl_pex").DataTable().destroy();
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/ProductoExterno/verProductosExt',
        dataType: "json",
        success: function (response) {
            var i = "1";
            $("#tbl_pex").DataTable({
                data: response,
                responsive: true,
                columns: [
                    {
                        data: "id_prodext",
                        "visible": false,
                        "searchable": false
                    },

                    {
                        data: "nombre",
                    },
                    {
                        data: "tipo",
                    },
                    {
                        data: "precio",
                    },

                    {
                        data: "pieza",
                    },
                    {
                        data: "total",
                    },
                    {
                        data: "tienda_externa",
                    },
                    {
                        data: "fecha",
                    },


                    {
                        orderable: false,
                        visible:false,
                        searchable: false,
                        data: function (row, type, set) {
                            return `

                        <center><a href="#" id="edit_pex" class="btn btn-success btn-remove" value="${row.id_prodext}"><i class="far fa-edit"></i></a>
                        <a href="#" id="del_pex" class="btn btn-danger btn-remove" value="${row.id_prodext}"><i class="fas fa-trash-alt"></i></a></center>
                                 `;
                        },
                    },
                ],

                "language": language_espaniol,
            });
        },
    });




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
