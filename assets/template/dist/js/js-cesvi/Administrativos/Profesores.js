$(document).ready(function(){
    llenarTablaProfesores(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
    habilitar_deshabilitar();
  }); // FIN DE LA FUNCION PRINCIPAL


$(".custom-file-input").on("change", function() {
    let fileName = $(this).val().split("\\").pop();
    let label = $(this).siblings(".custom-file-label");

    if (label.data("default-title") === undefined) {
        label.data("default-title", label.html());
    }

    if (fileName === "") {
        label.removeClass("selected").html(label.data("default-title"));
    } else {
        label.addClass("selected").html(fileName);
    }
});

/* ---------------------------- Add Records Modal --------------------------- */
$("#modaladdprofesor").on("hide.bs.modal", function(e) {
    // do something...
    $("#formaddprofesor")[0].reset();
    $(".custom-file-label").html("Adjuntar archivo (Curriculum vitae)");
});

/* ---------------------------- Edit Record Modal --------------------------- */
$("#modaleditprofesor").on("hide.bs.modal", function(e) {
    // do something...
    $("#formeditprofesor")[0].reset();
    $(".custom-file-label").html("Adjuntar archivo (Curriculum vitae)");
});

$("#modalviewprofesor").on("hide.bs.modal", function(e) {
    // do something...
});

// ESTE CODIGO EVALUA SI LLEVA FILE O NO, PUEDE INSERTAR SOLO DATES SIN FILE PDF
$(document).on("click", "#btnaddprofesor", function(e) {
    e.preventDefault();
    debugger;

        var nombre_profesor = $("#nombre_profesor").val();
        var edad_profesor = $("#edad_profesor").val();
        var sexo_profesor = $("#sexo_profesor").val();
        var direccion_profesor = $("#direccion_profesor").val();
        var ciudad_profesor = $("#ciudad_profesor").val();
        var nacionalidad_profesor = $("#nacionalidad_profesor").val();
        var telefono_profesor = $("#telefono_profesor").val();
        var email_profesor = $("#email_profesor").val();
        var estadocivil_profesor = $("#estadocivil_profesor").val();
        var niveldeestudios_profesor = $("#niveldeestudios_profesor").val();
        var titulado_profesor = $("#titulado_profesor").val();
        var cedula_profesor = $("#cedula_profesor").val();
        var ocupacion_profesor = $("#ocupacion_profesor").val();
        var tipodetrabajo_profesor = $("#tipodetrabajo_profesor").val();
        var universidadprocedente_profesor = $("#universidadprocedente_profesor").val();
        var experiencia_profesor = $("#experiencia_profesor").val();
        var trabajosprevios_profesor = $("#trabajosprevios_profesor").val();
        var img = $("#archivo_profesor")[0].files[0]; // this is file

    if (nombre_profesor == "" || edad_profesor == "" || sexo_profesor == "" || direccion_profesor == "" || ciudad_profesor == ""||
        nacionalidad_profesor == "" ||  telefono_profesor == "" || email_profesor == "" || estadocivil_profesor == ""||
        niveldeestudios_profesor == "" || titulado_profesor == "" || cedula_profesor == "" || ocupacion_profesor == "" || tipodetrabajo_profesor == ""||
        universidadprocedente_profesor == "" || experiencia_profesor == "" || trabajosprevios_profesor == "" ) { // || img.name == ""
        alert("Debe llenar todos los campos vacios...!");
    } else {
        var fd = new FormData();
        var archivo = $("#archivo_profesor")[0].files[0];

        fd.append("nombres", nombre_profesor);
        fd.append("edad", edad_profesor);
        fd.append("sexo", sexo_profesor);
        fd.append("direccion", direccion_profesor);
        fd.append("ciudad_radicando", ciudad_profesor);
        fd.append("nacionalidad", nacionalidad_profesor);
        fd.append("telefono_celular", telefono_profesor);
        fd.append("correo", email_profesor);
        fd.append("estado_civil", estadocivil_profesor);
        fd.append("nivel_de_estudios", niveldeestudios_profesor);
        fd.append("titulado", titulado_profesor);
        fd.append("cedula", cedula_profesor);
        fd.append("ocupacion", ocupacion_profesor);
        fd.append("tipo_de_trabajo", tipodetrabajo_profesor);
        fd.append("universidad_procedente", universidadprocedente_profesor);
        fd.append("experiencia_docente", experiencia_profesor);
        fd.append("trabajos_anteriores", trabajosprevios_profesor);

        if ($("#archivo_profesor")[0].files.length > 0) {
              fd.append("nombre_archivo", img); //Obt principalmente el name file
              fd.append("curriculum", archivo); // Obt el file como tal
          }

        $.ajax({
            type: "post",
            url: base_url+'Administrativos/Profesores/insertarprofesor',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype : 'multipart/form-data',
            success: function(response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#modaladdprofesor").modal("hide");
                    $("#formaddprofesor")[0].reset();
                    $(".add-file-label").html("Choose file");
                    $("#tbl_profesores").DataTable().destroy();
                    llenarTablaProfesores();
                } else {
                    toastr["error"](response.message);
                }
            },
        });
    }
});
$(document).on("click", "#view_profe", function (e) {
    e.preventDefault();
    debugger;
    var view_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url+'Administrativos/Profesores/viewprofesor',
        data: {
            view_id: view_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modalviewprofesor').modal('show');
            $('#id_profesores_view').val(data.post.id_profesores)
            $("#nombre_profesor_view").val(data.post.nombres);
            $("#edad_profesor_view").val(data.post.edad);
            $("#sexo_profesor_view").val(data.post.sexo);
            $("#direccion_profesor_view").val(data.post.direccion);
            $("#ciudad_profesor_view").val(data.post.ciudad_radicando);
            $("#nacionalidad_profesor_view").val(data.post.nacionalidad);
            $("#telefono_profesor_view").val(data.post.telefono_celular);
            $("#email_profesor_view").val(data.post.correo);
            $("#estadocivil_profesor_view").val(data.post.estado_civil);
            $("#niveldeestudios_profesor_view").val(data.post.nivel_de_estudios);
            $("#titulado_profesor_view").val(data.post.titulado);
            $("#cedula_profesor_view").val(data.post.cedula);
            $("#ocupacion_profesor_view").val(data.post.ocupacion);
            $("#tipodetrabajo_profesor_view").val(data.post.tipo_de_trabajo);
            $("#universidadprocedente_profesor_view").val(data.post.universidad_procedente);
            $("#experiencia_profesor_view").val(data.post.experiencia_docente);
            $("#trabajosprevios_profesor_view").val(data.post.trabajos_anteriores);
        },
    });
});

$(document).on("click", "#edit_profe", function (e) {
    e.preventDefault();
    debugger;
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url+'Administrativos/Profesores/editarprofesor',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditprofesor').modal('show');
            $('#id_profesores_update').val(data.post.id_profesores)
            $("#nombre_profesor_update").val(data.post.nombres);
            $("#edad_profesor_update").val(data.post.edad);
            $("#sexo_profesor_update").val(data.post.sexo);
            $("#direccion_profesor_update").val(data.post.direccion);
            $("#ciudad_profesor_update").val(data.post.ciudad_radicando);
            $("#nacionalidad_profesor_update").val(data.post.nacionalidad);
            $("#telefono_profesor_update").val(data.post.telefono_celular);
            $("#email_profesor_update").val(data.post.correo);
            $("#estadocivil_profesor_update").val(data.post.estado_civil);
            $("#niveldeestudios_profesor_update").val(data.post.nivel_de_estudios);
            $("#titulado_profesor_update").val(data.post.titulado);
            $("#cedula_profesor_update").val(data.post.cedula);
            $("#ocupacion_profesor_update").val(data.post.ocupacion);
            $("#tipodetrabajo_profesor_update").val(data.post.tipo_de_trabajo);
            $("#universidadprocedente_profesor_update").val(data.post.universidad_procedente);
            $("#experiencia_profesor_update").val(data.post.experiencia_docente);
            $("#trabajosprevios_profesor_update").val(data.post.trabajos_anteriores);
        },
    });
});

$(document).on("click", "#update_profesor", function (e) {
    e.preventDefault();
    debugger;
    var id_profesores = $('#id_profesores_update').val();
   var nombre_profesor = $("#nombre_profesor_update").val();
   var edad_profesor = $("#edad_profesor_update").val();
   var sexo_profesor = $("#sexo_profesor_update").val();
   var direccion_profesor = $("#direccion_profesor_update").val();
   var ciudad_profesor = $("#ciudad_profesor_update").val();
   var nacionalidad_profesor = $("#nacionalidad_profesor_update").val();
   var telefono_profesor = $("#telefono_profesor_update").val();
   var email_profesor = $("#email_profesor_update").val();
   var estadocivil_profesor = $("#estadocivil_profesor_update").val();
   var niveldeestudios_profesor = $("#niveldeestudios_profesor_update").val();
   var titulado_profesor = $("#titulado_profesor_update").val();
   var cedula_profesor = $("#cedula_profesor_update").val();
   var ocupacion_profesor = $("#ocupacion_profesor_update").val();
   var tipodetrabajo_profesor = $("#tipodetrabajo_profesor_update").val();
   var universidadprocedente_profesor = $("#universidadprocedente_profesor_update").val();
   var experiencia_profesor = $("#experiencia_profesor_update").val();
   var trabajosprevios_profesor = $("#trabajosprevios_profesor_update").val();
   // var archivo_profesor_update = $("#archivo_profesor_update")[0].files[0]; // this is file
    var edit_img = $("#edit_img")[0].files[0]; // this is file

    if (nombre_profesor == "" || edad_profesor == "" || sexo_profesor == "" || direccion_profesor == "" || ciudad_profesor == ""||
   nacionalidad_profesor == "" ||  telefono_profesor == "" || email_profesor == "" || estadocivil_profesor == ""||
   niveldeestudios_profesor == "" || titulado_profesor == "" || cedula_profesor == "" || ocupacion_profesor == "" || tipodetrabajo_profesor == ""||
   universidadprocedente_profesor == "" || experiencia_profesor == "" || trabajosprevios_profesor == "" ) {  // || img.name == ""
        alert("Debe llenar todos los campos vacios...!");
    } else {

        var fd = new FormData();
        var archivo = $("#edit_img")[0].files[0];

        fd.append("id_profesores", id_profesores);
        fd.append("nombres", nombre_profesor);
        fd.append("edad", edad_profesor);
        fd.append("sexo", sexo_profesor);
        fd.append("direccion", direccion_profesor);
        fd.append("ciudad_radicando", ciudad_profesor);
        fd.append("nacionalidad", nacionalidad_profesor);
        fd.append("telefono_celular", telefono_profesor);
        fd.append("correo", email_profesor);
        fd.append("estado_civil", estadocivil_profesor);
        fd.append("nivel_de_estudios", niveldeestudios_profesor);
        fd.append("titulado", titulado_profesor);
        fd.append("cedula", cedula_profesor);
        fd.append("ocupacion", ocupacion_profesor);
        fd.append("tipo_de_trabajo", tipodetrabajo_profesor);
        fd.append("universidad_procedente", universidadprocedente_profesor);
        fd.append("experiencia_docente", experiencia_profesor);
        fd.append("trabajos_anteriores", trabajosprevios_profesor);

        if ($("#edit_img")[0].files.length > 0) {
             fd.append("nombre_archivo", edit_img);
             fd.append("curriculum", archivo); // Obt el file como tal
           }
        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Profesores/updateprofesor',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype : 'multipart/form-data',
            success: function (response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#modaleditprofesor").modal("hide");
                    $("#formeditprofesor")[0].reset();
                    $("#tbl_profesores").DataTable().destroy();
                    llenarTablaProfesores();
                } else {
                    toastr["error"](response.message);
                }
            },
        });
    }
});

/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaProfesores                 */
/* -------------------------------------------------------------------------- */
function llenarTablaProfesores() {
    // debugger; select concat(nombres,concat(' ',concat(apellido_paterno,concat(' ',apellido_materno)))) as nombre_completo from alumnos
    $.ajax({
        type: "get",
        url: base_url+'Administrativos/Profesores/verprofesor',
        dataType: "json",
        success: function(response) {
            var i = "1";
            $("#tbl_profesores").DataTable({
                data: response,
                responsive: true,
                columns: [{
                        data: "id_profesores",
                        "visible": false,
                        "searchable": false
                      },
                    {
                        data: "nombres",
                    },
                    // {
                    //     data: "nivel_de_estudios",
                    // },
                    {
                        data: "titulado",
                    },
                    {
                        data: "cedula",
                    },
                    // {
                    //     data: "tipo_de_trabajo",
                    // },
                    // {
                    //     data: "universidad_procedente",
                    // },
                    // {
                    //     data: "experiencia_docente",
                    // },
                    // {
                    //     data: "trabajos_anteriores",
                    // },
                    {
                        data: "curriculum",
                        orderable: false,
                        searchable: false,
                        "render": function(data, type, row, meta) {

                          var mostrarCV = `${row.nombre_archivo}`;
                          var a;
                            if(mostrarCV != "null"){
                                 a = `
                                 <a title="Descarga Documento" href="Profesores/verArchivo/${row.id_profesores}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                              `;
                            }else{
                                 a = 'Sin cv';
                            }
                            return a;
                        },
                    },
                    /*
                    {
                        data: "estado_profesor",
                        orderable: false,
                        searchable: false,
                        "render" : function(data, type, row) {
                          var habilitarProfesor = `${row.estado_profesor}`;
                          var string = '<input type="checkbox" ';
                          if(habilitarProfesor == 1){
                            string = string + `checked onclick=habilitaRegistro(0,'${row.id_profesores}','${row.id_calificacion}')>`+'&nbsp;&nbsp;&nbsp;' + '<a class="bg-green ">ACTIVO</a>';
                          }else {
                            string = string +`onclick=habilitaRegistro(1,'${row.id_profesores}','${row.id_calificacion}')>` +'&nbsp;&nbsp;&nbsp;' + '<a class="bg-red ">DESACTIVO</a>';
                          }
                          return string;
                         },
                    },
                    */


                    // {
                    //     // data: "certificado_estudios",
                    //     orderable: false,
                    //     searchable: false,
                    //     render : function(data, type, row) {
                    //         var a = `
                    //             <a title="Generar Horario Profesor" href="Profesores/generaHorarioProfesor" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                    //         `;
                    //          return a;
                    //     },
                    // },
                    {
                        orderable: false,
                        searchable: false,
                        data: function(row, type, set) {
                            var horario=row.horario_asignado;
                            var a;
                            if(horario==1){
                                a =`
                                <a href="#" id="habilitar_profesor" class="btn btn-info" value="${row.id_profesores}"><i class="far fa-edit"></i></a>
                                   `;
                            }else{
                                a= `¡Profesor sin horario asignado!`;
                            }
                            return a;
                        },
                    },
                    {
                        orderable: false,
                        searchable: false,
                        data: function(row, type, set) {
                            return `
                                <a href="#" id="edit_profe" class="btn btn-success btn-remove" value="${row.id_profesores}"><i class="far fa-edit"></i></a>
                                <a href="#" id="del_profesor" class="btn btn-danger btn-remove" value="${row.id_profesores}"><i class="fas fa-trash-alt"></i></a>
                            `;
                        },
                    },
                    {
                        orderable: false,
                        searchable: false,
                        data: function(row, type, set) {
                            return `
                                <a href="#" id="view_profe" class="btn btn-info" value="${row.id_profesores}"><i class="far fa-edit"></i></a>
                                   `;
                        },
                    },


                ],
                  "language" : language_espaniol,
            });
        },
    });
}


$(document).on("click", "#habilitar_profesor", function (e) {
    e.preventDefault();
    debugger;
    var edit_id = $(this).attr("value");
     var fd = new FormData();


        fd.append("profesor", edit_id);
        fd.append("estado_profesor", 1);

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Profesores/updateprofesor_habilitarasignacion_calificacion',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype : 'multipart/form-data',
            success: function (response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#tbl_profesores").DataTable().destroy();
                    llenarTablaProfesores();
                } else {
                    toastr["error"](response.message);
                }
            },
        });

});


// SOLO SE VA HABILITAR CUANDO ESTE DESHABILITADO, UNA VEZ K SE ABILITE SE DESBLOKEA
function habilitaRegistro(estado_profesor, id_profesores, id_calificacion){
    debugger;
      		var datos = {
      				id_profesores : id_profesores,
              estado_profesor: estado_profesor,
              id_calificacion : id_calificacion
      		}
      		$.ajax({
      			url: base_url+'Administrativos/Profesores/marcarParaRegistro/'+datos.id_profesores,
            type: "post",
            dataType: "json",
      			data : (datos),
      			success : function(data){
              if (data.responce == "success") {
                toastr["success"](data.message);
                location.reload();
                $("#tbl_profesores").DataTable().destroy();
              }else{
                toastr["error"](data.message);
              }
      			}
      		});
      }




/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#del_profesor", function(e) {
    e.preventDefault();
    debugger;

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
                // url: base_url + "delete",
                url: base_url+'Administrativos/Profesores/eliminarprofesores',
                data: {
                    del_id: del_id,
                },
                dataType: "json",
                success: function(data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Eliminado!',
                            'El profesor fue eliminado',
                            'success'
                        );
                        $("#tbl_profesores").DataTable().destroy();
                        llenarTablaProfesores();
                    }else{
                        console.log(data);
                    }
                },
            });
        }
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

    function habilitar_deshabilitar(){

$('#id_profesores_view').prop('disabled', true);
$("#nombre_profesor_view").prop('disabled', true);
$("#edad_profesor_view").prop('disabled', true);
$("#sexo_profesor_view").prop('disabled', true);
$("#direccion_profesor_view").prop('disabled', true);
$("#ciudad_profesor_view").prop('disabled', true);
$("#nacionalidad_profesor_view").prop('disabled', true);
$("#telefono_profesor_view").prop('disabled', true);
$("#email_profesor_view").prop('disabled', true);
$("#estadocivil_profesor_view").prop('disabled', true);
$("#niveldeestudios_profesor_view").prop('disabled', true);
$("#titulado_profesor_view").prop('disabled', true);
$("#cedula_profesor_view").prop('disabled', true);
$("#ocupacion_profesor_view").prop('disabled', true);
$("#tipodetrabajo_profesor_view").prop('disabled', true);
$("#universidadprocedente_profesor_view").prop('disabled', true);
$("#experiencia_profesor_view").prop('disabled', true);
$("#trabajosprevios_profesor_view").prop('disabled', true);
    }
