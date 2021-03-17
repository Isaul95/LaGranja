//https://www.youtube.com/watch?v=K6IH25Vf8ZA   - table cell editing using plain Javascript | DOM coding challenges
///https://www.youtube.com/watch?v=oxZj82kh4FA - Table Quick Edit Using Ajax jQuery
//https://www.youtube.com/watch?v=nd9nOQemVAc  - Inline Datatable Editing using jQuery Tabledit with PHP Ajax
//https://www.jqueryscript.net/table/Inline-Table-Editing-jQuery-Tabledit.html
// DATA TABLE PROPERTY  https://markcell.github.io/jquery-tabledit/assets/js/tabledit.min.js
$(document).ready(function () {
   
    llenar_combo_carreras_planeacion_profesores();
    $("#combo_carreras_planeacion_profesores").change(function () {
        var profesor = $('#usuario').val();
        var licenciatura = $("#combo_carreras_planeacion_profesores").val();
        var semestre = $("#combo_semestres_planeacion_profesores").val();
    var opciones = $("#combo_opciones_planeacion_profesores").val();
    $("#tbl_list_planeacion_administrativos").DataTable().destroy();
        llenartablaplaneacionprofesores(profesor,licenciatura,semestre,opciones);
    });
    llenar_combo_semestres_planeacion_profesores();
    $("#combo_semestres_planeacion_profesores").change(function () {
        var profesor = $('#usuario').val();  
        var licenciatura = $("#combo_carreras_planeacion_profesores").val();
    var semestre = $("#combo_semestres_planeacion_profesores").val();
    var opciones = $("#combo_opciones_planeacion_profesores").val();   
    $("#tbl_list_planeacion_administrativos").DataTable().destroy();
        llenartablaplaneacionprofesores(profesor,licenciatura,semestre,opciones);
   });

    llenar_combo_opciones_planeacion_profesores();
    $("#combo_opciones_planeacion_profesores").change(function () {
        var profesor = $('#usuario').val();
        var licenciatura = $("#combo_carreras_planeacion_profesores").val();
    var semestre = $("#combo_semestres_planeacion_profesores").val();
    var opciones = $("#combo_opciones_planeacion_profesores").val();
    $("#tbl_list_planeacion_administrativos").DataTable().destroy();
        llenartablaplaneacionprofesores(profesor,licenciatura,semestre,opciones);
    });
    date_picker_horario();
    deshabilitar_profesor_materia();
    	// initialize input widgets first

}); // FIN DE LA FUNCION PRINCIPAL



//SELECT - ON CHANGE
//https://stackoverflow.com/questions/11179406/jquery-get-value-of-select-onchange
// SELECT - ADD VALUES
//https://es.stackoverflow.com/questions/33853/crear-select-con-html-usando-ajax
/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaalumnos               */
/* -------------------------------------------------------------------------- */
$("#modalagregarplaneacionprofesores").on("hide.bs.modal", function (e) {
    // do something...
    $("#formeditplaneacionprofesores")[0].reset();
    $(".custom-file-label").html("Adjuntar planeacion");
});



function llenar_combo_carreras_planeacion_profesores() {
    $.ajax({
        type: "get",
        url: base_url + 'Profesores/PlaneacionProfesores/obtenercarreras',
        dataType: "json",
        success: function (data) {
            console.log(data);
            $.each(data, function (key, registro) {
                $("#combo_carreras_planeacion_profesores").append('<option value=' + registro.id_carrera + '>' + registro.carrera_descripcion + '</option>');
            });
        },
    });
}
function llenar_combo_opciones_planeacion_profesores() {
    $.ajax({
        type: "get",
        url: base_url + 'Profesores/PlaneacionProfesores/obteneropciones',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_opciones_planeacion_profesores").append('<option value=' + registro.id_opcion + '>' + registro.descripcion + '</option>');
            });

        },
    });
}

function llenar_combo_semestres_planeacion_profesores() {
    $.ajax({
        type: "get",
        url: base_url + 'Profesores/PlaneacionProfesores/obtenersemestres',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_semestres_planeacion_profesores").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
            });

        },
    });
}

//LLENAR LA TABLA DE ALUMNOS QUE CORRESPONDEN A LAS MATERIAS A LAS QUE EL PROFESOR TIENE ACCESO
function llenartablaplaneacionprofesores(profesor,licenciatura,semestre,opciones){
    // debugger;
    var profesor = profesor;
    var fd = new FormData();
    fd.append("profesor", profesor);
    fd.append("licenciatura", licenciatura);
    fd.append("semestre", semestre);
    fd.append("opciones", opciones);

    $.ajax({
        type: "post",
        url: base_url + 'Profesores/PlaneacionProfesores/materias_asignadas',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (data) {
            console.log(data);
            var i = "1";
            $("#tbl_list_planeacion_administrativos").DataTable({
                data: data,
                responsive: true,
                columns: [
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
                        data: "horario",
                    },
                    {
                        data: "nombre_planeacion",
                        orderable: false,
                        searchable: false,
                        "render": function(data, type, row, meta) {

                          var mostrarCV = `${row.nombre_planeacion}`;
                          var a;
                          var profesor = $('#usuario').val();
                            if(mostrarCV != "null"){
                                 a = `
                                 <a title="Descarga Documento" href="PlaneacionProfesores/verArchivo/${row.materia}/${profesor}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                              `;
                            }else{
                                 a = 'No cargada';
                            }
                            return a;
                        },
                    },
                    {
                        orderable: false,
                        searchable: false,
                        data: function (row, type, set) {
                            return `
                                 <a href="#" id="edit_planeacion" class="btn btn-success btn-remove" value="${row.materia}"><i class="far fa-edit"></i></a>
                              `;
                        },
                    },
                ],
                "language": language_espaniol,

            });
        },
    });
}

$(document).on("click", "#edit_planeacion", function (e) {
    e.preventDefault();
    var materia = $(this).attr("value");
    var profesor = $('#usuario').val();
    var fd = new FormData();
    fd.append("materia", materia);
    fd.append("profesor", profesor);
    $.ajax({
        type: "post",
        url: base_url + 'Profesores/PlaneacionProfesores/editarcalificacion',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modalagregarplaneacionprofesores').modal('show');
            $('#profesor_planeacion_update').val($('#usuario').val());
            $('#materia_planeacion_update').val(materia);
            $('#ciclo_planeacion_update').val(data.post.ciclo);
            $('#semestre_planeacion_update').val(data.post.semestre);
            $('#profesor_planeacion').val(data.post.nombres);
            $('#materia_planeacion').val(data.post.nombre_materia);
            $('#salon_planeacion').val(data.post.salon);
            $('#datepicker_planeacion_inicio').val(data.post.inicio);
            $('#datepicker_planeacion_fin').val(data.post.fin);
            $('#datepicker_planeacion_ex_final').val(data.post.ex_final);
            $('#planeacion_profesores_inicio').val(data.post.horario_inicio);
            $('#planeacion_profesores_fin').val(data.post.horario_fin);

        },
        error: function (response) {
            toastr["error"](response.message);
            $('#modalagregarplaneacionprofesores').modal('hide');
        }
    });
});

$(document).on("click", "#update_planeacion_profesor", function (e) {
    e.preventDefault();
    var profesor_planeacion_update = $("#profesor_planeacion_update").val();
    var materia_planeacion_update = $("#materia_planeacion_update").val();
    var ciclo_planeacion_update = $("#ciclo_planeacion_update").val();
    var semestre_planeacion_update = $("#semestre_planeacion_update").val();

    var nombre_materia = $("#materia_planeacion").val();
    var edit_img = $("#update_archivo_plaenacion_profesor")[0].files[0]; // this is file

        var fd = new FormData();
        var archivo = $("#update_archivo_plaenacion_profesor")[0].files[0];

        fd.append("profesor", profesor_planeacion_update);
        fd.append("materia", materia_planeacion_update);
        fd.append("ciclo", ciclo_planeacion_update);
        fd.append("semestre", semestre_planeacion_update);

        fd.append("nombre_materia", nombre_materia);
        if ($("#update_archivo_plaenacion_profesor")[0].files.length > 0) {
             fd.append("nombre_planeacion", edit_img);
             fd.append("planeacion", archivo); // Obt el file como tal
             subir_planeacion(fd);
           }else{
          alert("No cargó planeacion");
           }
});

function subir_planeacion(fd){
    $.ajax({
        type: "post",
        url: base_url + 'Profesores/PlaneacionProfesores/updatehorario',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (response) {
            if (response.response == "success") {
                toastr["success"](response.message);
                $("#modalagregarplaneacionprofesores").modal("hide");
                $("#formeditplaneacionprofesores")[0].reset();
                var profesor = $('#usuario').val();
        var licenciatura = $("#combo_carreras_planeacion_profesores").val();
        var semestre = $("#combo_semestres_planeacion_profesores").val();
    var opciones = $("#combo_opciones_planeacion_profesores").val();
    $("#tbl_list_planeacion_administrativos").DataTable().destroy();
        llenartablaplaneacionprofesores(profesor,licenciatura,semestre,opciones);
            } else {
                toastr["error"](response.message);
            }
        },
        error: function (response) {
            toastr["error"](response.message);
        }
    });
}

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

function deshabilitar_profesor_materia(){
    $('#profesor_planeacion').prop('disabled', true);
    $("#materia_planeacion").prop('disabled', true);
    $('#ciclo_planeacion_update').prop('disabled', true);
            $('#semestre_planeacion_update').prop('disabled', true);
            $('#salon_planeacion').prop('disabled', true);
            $('#datepicker_planeacion_inicio').prop('disabled', true);
            $('#datepicker_planeacion_fin').prop('disabled', true);
            $('#datepicker_planeacion_ex_final').prop('disabled', true);
            $('#planeacion_profesores_inicio').prop('disabled', true);
            $('#planeacion_profesores_fin').prop('disabled', true);
    }
    