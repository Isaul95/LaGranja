//https://www.youtube.com/watch?v=K6IH25Vf8ZA   - table cell editing using plain Javascript | DOM coding challenges
///https://www.youtube.com/watch?v=oxZj82kh4FA - Table Quick Edit Using Ajax jQuery
//https://www.youtube.com/watch?v=nd9nOQemVAc  - Inline Datatable Editing using jQuery Tabledit with PHP Ajax
//https://www.jqueryscript.net/table/Inline-Table-Editing-jQuery-Tabledit.html
// DATA TABLE PROPERTY  https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js
$(document).ready(function () {
    date_picker_horario();

    llenar_combo_carreras_horarios_profesores();
    $("#combo_carreras_horario_profesores").change(function () {
        $("#combo_materias_horario_profesores").empty();
        llenar_combo_materias_horario_profesores($("#combo_carreras_horario_profesores").val(), $("#combo_semestres_horario_profesores").val());
    });
    llenar_combo_semestres_horario_profesores();
    $("#combo_semestres_horario_profesores").change(function () {
        $("#combo_materias_horario_profesores").empty();
        llenar_combo_materias_horario_profesores($("#combo_carreras_horario_profesores").val(), $("#combo_semestres_horario_profesores").val());
        $("#tbl_list_horarios_administrativos").DataTable().destroy();
        llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
    });

    llenar_combo_opciones_horario_profesores();
    llenar_combo_profesores_horario_profesores();
    $("#combo_profesores_horario_profesores").change(function (){
        $("#tbl_list_horarios_administrativos").DataTable().destroy();
        llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
        consultar_si_tiene_horario_asignado($("#combo_profesores_horario_profesores").val());
    });
    $("#crear_horario").click(function () {
        asignar_horario_administrativo();
    });
    $('#desconfirmar_horario_profesor').prop('disabled', true);
    $('#confirmar_horario_profesor').prop('disabled', true);
    $('#horario_profesores_inicio').timepicker({ 'forceRoundTime': true });
    $('#horario_profesores_fin').timepicker({ 'forceRoundTime': true });

}); // FIN DE LA FUNCION PRINCIPAL

function consultar_si_tiene_horario_asignado(profesor) {
    var id_profesores = profesor;
    var fd = new FormData();
    fd.append("id_profesores", id_profesores);
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/HacerHorarioProfesor/ver_si_tiene_horario_asignado',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            var horario = data.post[0].horario_asignado;
            if(horario==1){
                $('#confirmar_horario_profesor').prop('disabled', true);
                $('#desconfirmar_horario_profesor').prop('disabled', false);
            }else{
                $('#confirmar_horario_profesor').prop('disabled', false);
                $('#desconfirmar_horario_profesor').prop('disabled', true);
            }

        },
    });
  }
function asignar_horario_administrativo() {
    var especialidad = $("#combo_carreras_horario_profesores").val();
    var opcion = $("#combo_opciones_horario_profesores").val();
    var profesor = $("#combo_profesores_horario_profesores").val();
    var semestre = $("#combo_semestres_horario_profesores").val();
    var fd = new FormData();
    var fd2 = new FormData();
    var concat = "";
    var fecha = new Date();

    switch (fecha.getMonth() + 1) {
        case 1:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 2:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 3:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 4:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 5:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 6:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        default:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 2);
            break;
    }
    $("#combo_materias_horario_profesores option:selected").each(function () {
        // val, muestra el valor, texto, muestra el contenido
        fd.append("semestre", semestre);
        fd.append("opcion_estudio", opcion);
        fd.append("licenciatura", especialidad);
        fd.append("profesor", profesor);
        fd.append("materia", $(this).val());
        fd.append("ciclo", ciclo);
        fd.append("activo", 'Si');



        agregar_horario(fd);

    });
   /*
       fd2.append("semestre", semestre);
    fd2.append("opcion_estudio", opcion);
    fd2.append("licenciatura", especialidad);
    fd2.append("ciclo", ciclo);
    asigacion_masiva_de_alumnos(fd2);
   */

}
function agregar_horario(fd) {
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/HacerHorarioProfesor/agregarhorario',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (response) {
            if (response.response == "success") {
                toastr["success"](response.message);
                $("#tbl_list_horarios_administrativos").DataTable().destroy();
                llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
            } else {
                toastr["error"](response.message);
            }
        },
    });
}
$(document).on("click", "#confirmar_horario_profesor", function (e) {
    e.preventDefault();
    debugger;
    var profesor = $("#combo_profesores_horario_profesores").val();
    var estado = 1;

    var fd = new FormData();
    fd.append("id_profesores", profesor);
    fd.append("horario_asignado", estado);

    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡Se asignará el horario seleccionado al maestro!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, asignar!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: base_url + 'Administrativos/HacerHorarioProfesor/confirmar_horario_profesor',
                data: fd,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (data) {
                    if (data.response == "success") {
                        Swal.fire(
                            '¡Exito!',
                            '¡Horario asignado con exito!',
                            'success'
                        );
                        $("#tbl_list_horarios_administrativos").DataTable().destroy();
                        llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
                        $('#confirmar_horario_profesor').prop('disabled', true);
                        $('#desconfirmar_horario_profesor').prop('disabled', false);
                    }
                    else{
                      Swal.fire(
                        '¡Error!',
                        '¡No se pudo asignar el horario!',
                        'error'
                    );
                    $("#tbl_list_horarios_administrativos").DataTable().destroy();
        llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
                    }
                },
            });
        }
    });
  });

  $(document).on("click", "#desconfirmar_horario_profesor", function (e) {
    e.preventDefault();
    debugger;
    var profesor = $("#combo_profesores_horario_profesores").val();
    var estado = 0;

    var fd = new FormData();
    fd.append("id_profesores", profesor);
    fd.append("horario_asignado", estado);

    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡Se habilitará al maestro para elegirle materias!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, habilitar!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: base_url + 'Administrativos/HacerHorarioProfesor/confirmar_horario_profesor',
                data: fd,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (data) {
                    if (data.response == "success") {
                        Swal.fire(
                            '¡Exito!',
                            '¡Maestro habilitado!',
                            'success'
                        );
                        $("#tbl_list_horarios_administrativos").DataTable().destroy();
                        llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
                        $('#confirmar_horario_profesor').prop('disabled', false);
                        $('#desconfirmar_horario_profesor').prop('disabled', true);
                    }
                    else{
                      Swal.fire(
                        '¡Error!',
                        '¡No se pudo asignar el horario!',
                        'error'
                    );
                    $("#tbl_list_horarios_administrativos").DataTable().destroy();
        llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
                    }
                },
            });
        }
    });
  });
/*
function asigacion_masiva_de_alumnos(fd2) {
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/HacerHorarioProfesor/asignacion_masiva_de_alumnos',
        data: fd2,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (response) {
            if (response.response == "success") {
                toastr["success"](response.message);
                $("#tbl_list_horarios_administrativos").DataTable().destroy();
                llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val());
            } else {
                toastr["error"](response.message);
            }
        },
    });
}
*/


//SELECT - ON CHANGE
//https://stackoverflow.com/questions/11179406/jquery-get-value-of-select-onchange
// SELECT - ADD VALUES
//https://es.stackoverflow.com/questions/33853/crear-select-con-html-usando-ajax
/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaalumnos               */
/* -------------------------------------------------------------------------- */
$("#modalagregarhorario").on("hide.bs.modal", function (e) {
    // do something...
    $("#formeditcalificacion")[0].reset();
});



function llenar_combo_materias_horario_profesores(especialidad, semestre) {
    var fd = new FormData();
    fd.append("especialidad", especialidad);
    fd.append("semestre", semestre);
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/HacerHorarioProfesor/vermateriasparaasignaralprofesor',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (data) {
            console.log(data);
            $.each(data, function (key, registro) {
                $("#combo_materias_horario_profesores").append('<option value=' + registro.id_materia + '>' + registro.nombre_materia + '</option>');
            });

        },
    });
}
function llenar_combo_carreras_horarios_profesores() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obtenercarreras',
        dataType: "json",
        success: function (data) {
            console.log(data);
            $.each(data, function (key, registro) {
                $("#combo_carreras_horario_profesores").append('<option value=' + registro.id_carrera + '>' + registro.carrera_descripcion + '</option>');
            });
        },
    });
}
function llenar_combo_opciones_horario_profesores() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obteneropciones',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_opciones_horario_profesores").append('<option value=' + registro.id_opcion + '>' + registro.descripcion + '</option>');
            });

        },
    });
}
function llenar_combo_profesores_horario_profesores() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obtenerprofesores',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_profesores_horario_profesores").append('<option value=' + registro.id_profesores + '>' + registro.nombres + '</option>');
            });

        },
    });
}
function llenar_combo_semestres_horario_profesores() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obtenersemestres',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_semestres_horario_profesores").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
            });

        },
    });
}

//LLENAR LA TABLA DE ALUMNOS QUE CORRESPONDEN A LAS MATERIAS A LAS QUE EL PROFESOR TIENE ACCESO
function llenartablahorariosprofesores($profesor,$semestre) {
    // debugger;
    var profesor = $profesor;
    var semestre = $semestre;
    var concat = "";
    var fecha = new Date();

    switch (fecha.getMonth() + 1) {
        case 1:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 2:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 3:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 4:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 5:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 6:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        default:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 2);
            break;
    }
    var fd = new FormData();
    fd.append("profesor", profesor);
    fd.append("ciclo", ciclo);
    fd.append("semestre", semestre);
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/HacerHorarioProfesor/materias_asignadas',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (data) {
            console.log(data);
            var i = "1";
            $("#tbl_list_horarios_administrativos").DataTable({
                data: data,
                responsive: true,
                columns: [
                    {
                        data: "profesor",
                        "visible": false,
                        "searchable": false
                    },
                    {
                        data: "materia",
                        "visible": false,
                        "searchable": false
                    },
                    {
                        data: "nombre_materia",

                    },
                    {
                        data: "salon",

                    },
                    {
                        data: "semestre",

                    },
                    {
                        data: "ciclo",

                    },
                    {
                        data: "inicio",
                    },
                    {
                        data: "fin",
                    },
                    {
                        data: "ex_final",
                    },
                    {
                        data: "horario",
                    },
                    {
                        orderable: false,
                        searchable: false,
                        data: function (row, type, set) {
                            var concat="";
                            var profesor_materia = concat.concat(`${row.profesor}`,'_',`${row.materia}`);

                            return `
                                 <a href="#" id="edit_horario" class="btn btn-success btn-remove" value="${row.materia}"><i class="far fa-edit"></i></a>
                                 <a href="#" id="del_horario" class="btn btn-danger btn-remove" value="${profesor_materia}"><i class="fas fa-trash-alt"></i></a>
                                 `;
                        },
                    },
                    {
                        orderable: false,
                        searchable: false,
                        "className": "text-center",
                        render : function(data, type, row) {            // /${row.ciclo}
                            var a = `
<a title="Generar Horario Profesor" href="HacerHorarioProfesor/generaHorarioProfesor/${row.profesor}/${row.semestre}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                            `;
                             return a;
                        },
                    },
                ],
                "language": language_espaniol,

            });
        },
    });
}

$(document).on("click", "#edit_horario", function (e) {
    e.preventDefault();
    var materia = $(this).attr("value");
    var profesor = $('#combo_profesores_horario_profesores').val();
    var concat = "";
    var fecha = new Date();

    switch (fecha.getMonth() + 1) {
        case 1:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 2:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 3:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 4:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 5:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 6:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        default:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 2);
            break;
    }
    var fd = new FormData();
    fd.append("materia", materia);
    fd.append("profesor", profesor);
    fd.append("ciclo", ciclo);

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/HacerHorarioProfesor/editarcalificacion',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modalagregarhorario').modal('show');
            $('#profesor_horario_update').val($('#combo_profesores_horario_profesores').val());
            $('#materia_horario_update').val(materia);
            $('#ciclo_horario_update').val(data.post.ciclo);
            $('#semestre_horario_update').val(data.post.semestre);
            $('#profesor_horario').val(data.post.nombres);
            $('#materia_horario').val(data.post.nombre_materia);
            $('#salon_horario').val(data.post.salon);
            $('#datepicker_horario_inicio').val(data.post.inicio);
            $('#datepicker_horario_fin').val(data.post.fin);
            $('#datepicker_horario_ex_final').val(data.post.ex_final);

            var horario = data.post.horario;
            var array = horario.split(' - ');
            var horario_inicio = array[0];
            var horario_fin = array[1];

            $('#horario_profesores_inicio').val(horario_inicio);
            $('#horario_profesores_fin').val(horario_fin);

        },
        error: function (response) {
            toastr["error"](response.message);
            $('#modalagregarhorario').modal('hide');
        }
    });
});
$(document).on("click", "#del_horario", function (e) {
    e.preventDefault();

    var del_id = $(this).attr("value");
    var array = del_id.split('_');
    var profesor = array[0];
    var materia = array[1];
    var concat = "";
    var fecha = new Date();

    switch (fecha.getMonth() + 1) {
        case 1:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 2:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 3:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 4:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 5:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        case 6:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 1);
            break;
        default:
            var ciclo = concat.concat(fecha.getFullYear().toString().substring(2,4), "/", 2);
            break;
    }
    Swal.fire({
        title: "¿Estás seguro de dar de remover esta materia?",
        text: "¡Esta acción es irreversile!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, eliminar materia asignada!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            var fd = new FormData();
            fd.append("profesor",profesor);
            fd.append("materia",materia);
            fd.append("ciclo",ciclo);

            $.ajax({
            type: "post",
            url: base_url + 'Administrativos/HacerHorarioProfesor/eliminarhorario',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
                success: function (data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Materia removida!',
                            'La materia se eliminó del horario',
                            'success'
                        );
                        $("#tbl_list_horarios_administrativos").DataTable().destroy();
                        llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
                    } else {
                        console.log(data);
                    }
                },
            });
        }
    });
});
$(document).on("click", "#update_horario_profesor", function (e) {
    e.preventDefault();

    var profesor_horario_update = $("#profesor_horario_update").val();
    var materia_horario_update = $("#materia_horario_update").val();
    var salon_horario_update = $("#salon_horario").val();

    var ciclo_horario_update = $("#ciclo_horario_update").val();
    var semestre_horario_update = $("#semestre_horario_update").val();

    var datepicker_horario_inicio = $("#datepicker_horario_inicio").val();
    var datepicker_horario_fin = $("#datepicker_horario_fin").val();
    var datepicker_horario_ex_final = $("#datepicker_horario_ex_final").val();
    var concat = "";
    var horario_inicio = $("#horario_profesores_inicio").val();
    var horario_fin = $("#horario_profesores_fin").val();
            var horario_profesores = concat.concat(horario_inicio,' - ',horario_fin);


    var nombre_materia = $("#materia_horario").val();

    if (datepicker_horario_inicio == ""||datepicker_horario_fin == ""||
    datepicker_horario_ex_final == ""||horario_profesores == "") {
        alert("Llene los datos completos de los horarios");
    } else {

        var fd = new FormData();

        fd.append("materia", materia_horario_update);
        fd.append("profesor", profesor_horario_update);
        fd.append("ciclo", ciclo_horario_update);
        fd.append("salon", salon_horario_update);
        fd.append("semestre", semestre_horario_update);
        fd.append("inicio", datepicker_horario_inicio);
        fd.append("fin", datepicker_horario_fin);
        fd.append("ex_final", datepicker_horario_ex_final);
        fd.append("horario", horario_profesores);

        fd.append("nombre_materia", nombre_materia);


        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/HacerHorarioProfesor/updatehorario',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.response == "success") {
                    toastr["success"](response.message);
                    $("#modalagregarhorario").modal("hide");
                    $("#formeditcalificacion")[0].reset();
                    $("#tbl_list_horarios_administrativos").DataTable().destroy();
        llenartablahorariosprofesores($("#combo_profesores_horario_profesores").val(),$("#combo_semestres_horario_profesores").val());
                } else {
                    toastr["error"](response.message);
                }
            },
            error: function (response) {
                toastr["error"](response.message);
            }
        });
    }
});


/**
 * function semestre_alumno() {
  var numero_control = $("#numero_control").val();
  var fd = new FormData();
  fd.append("numero_control", numero_control);
  $.ajax({
      type: "post",
      url: base_url + 'Alumnos/AltaBaucherBanco/semestredelalumno',
      data: fd,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (data) {
          $("#semestre").val(data.post[0].cuatrimestre);

      },
  });
}
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */
//LLENAR LA TABLA DE ALUMNOS QUE CORRESPONDEN A CARRERA Y OPCIÓN DE ESTUDIO

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
function date_picker_horario() {
    $("#datepicker_horario_inicio,#datepicker_horario_fin,#datepicker_horario_ex_final").datepicker({
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
        dateFormat: 'yy/mm/dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    $.datepicker.setDefaults($.datepicker.regional['es']);
}
