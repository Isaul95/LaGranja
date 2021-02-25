//https://www.youtube.com/watch?v=K6IH25Vf8ZA   - table cell editing using plain Javascript | DOM coding challenges
///https://www.youtube.com/watch?v=oxZj82kh4FA - Table Quick Edit Using Ajax jQuery
$(document).ready(function () {
    //llenarTablaAlumnosParaDocumentacion();
    var semestre = $("#numero").val();
    var profesor = $("#usuario").val();
    var profe_admin =  $("#rol").val();

    $('#combo_materias_administrativos_profesores').hide();

    $("#combo_materias_administrativos_profesores").change(function () {
        $("#tbl_list_calificaciones_profesor_por_materia").DataTable().destroy();
        llenartablaalumnosasignadosalamateriadelprofesorp($("#combo_materias_administrativos_profesores").val(),profesor);
    });
   
    llenar_combo_carreras_administrativos_profesores();
    $("#combo_carreras_administrativos_profesores").change(function () {
        if(profe_admin==1){//SI ES EL ADMIN
            $("#tbl_list_calificaciones_administrativos_por_carrera_horario").DataTable().destroy();
            llenartablaalumnosasignados_por_carrerayopcion($("#combo_carreras_administrativos_profesores").val(),
            $("#combo_opciones_administrativos_profesores").val(),
            $("#combo_semestres_administrativos_profesores").val());
        }
        else{
            $("#combo_materias_administrativos_profesores").empty();
            $('#combo_materias_administrativos_profesores').show();
            llenar_combo_materias_administrativos_profesores($("#combo_carreras_administrativos_profesores").val(),
            $("#combo_opciones_administrativos_profesores").val(),
            $("#combo_semestres_administrativos_profesores").val(),profesor);
        }
       
     });
    llenar_combo_opciones_administrativos_profesores();
    $("#combo_opciones_administrativos_profesores").change(function () {
        if(profe_admin==1){//SI ES EL ADMIN
            $("#tbl_list_calificaciones_administrativos_por_carrera_horario").DataTable().destroy();
            llenartablaalumnosasignados_por_carrerayopcion($("#combo_carreras_administrativos_profesores").val(),
            $("#combo_opciones_administrativos_profesores").val(),
            $("#combo_semestres_administrativos_profesores").val());
        }
        else{
            $("#combo_materias_administrativos_profesores").empty();
            $('#combo_materias_administrativos_profesores').show();
            llenar_combo_materias_administrativos_profesores($("#combo_carreras_administrativos_profesores").val(),
            $("#combo_opciones_administrativos_profesores").val(),
            $("#combo_semestres_administrativos_profesores").val(),profesor);
        }
    });
    llenar_combo_semestres_administrativos_profesores();
    $("#combo_semestres_administrativos_profesores").change(function () {
        if(profe_admin==1){//SI ES EL ADMIN
            $("#tbl_list_calificaciones_administrativos_por_carrera_horario").DataTable().destroy();
            llenartablaalumnosasignados_por_carrerayopcion($("#combo_carreras_administrativos_profesores").val(),
            $("#combo_opciones_administrativos_profesores").val(),
            $("#combo_semestres_administrativos_profesores").val());
        }
        else{            
            $("#combo_materias_administrativos_profesores").empty();
            $('#combo_materias_administrativos_profesores').show();
            llenar_combo_materias_administrativos_profesores($("#combo_carreras_administrativos_profesores").val(),
            $("#combo_opciones_administrativos_profesores").val(),
            $("#combo_semestres_administrativos_profesores").val(),profesor);
        }
    });

}); // FIN DE LA FUNCION PRINCIPAL

//SELECT - ON CHANGE
//https://stackoverflow.com/questions/11179406/jquery-get-value-of-select-onchange
// SELECT - ADD VALUES
//https://es.stackoverflow.com/questions/33853/crear-select-con-html-usando-ajax
/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaalumnos               */
/* -------------------------------------------------------------------------- */
$("#modaleditcalificacion").on("hide.bs.modal", function (e) {
    // do something...
    $("#formeditcalificacion")[0].reset();
});
$("#modaleditcalificacion_admin").on("hide.bs.modal", function (e) {
    // do something...
    $("#formeditcalificacion_admin")[0].reset();
});

$("#modalcalificacionadmin").on("hide.bs.modal", function (e) {
    // do something...
    $("#formcalificacionadmin")[0].reset();
});




function llenar_combo_materias_administrativos_profesores(carrera, opcion, semestre,profesor){
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
        
        fd.append("carrera", carrera);
        fd.append("opcion", opcion);
        fd.append("semestre", semestre);
        fd.append("profesor", profesor);
        fd.append("ciclo", ciclo);
        
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/vermateriasdelprofesor',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (data) {
            $.each(data,function(key, registro) {
                $("#combo_materias_administrativos_profesores").append('<option value='+registro.materia+'>'+registro.nombre_materia+'</option>');
              });   
        
      },
    });
  }
  function llenar_combo_carreras_administrativos_profesores(){
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Calificaciones/obtenercarreras',
        dataType: "json",
        success: function (data) {
            $.each(data,function(key, registro) {
                $("#combo_carreras_administrativos_profesores").append('<option value='+registro.id_carrera+'>'+registro.carrera_descripcion+'</option>');
              });   
        
      },
    });
  }
  function llenar_combo_opciones_administrativos_profesores(){
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Calificaciones/obteneropciones',
        dataType: "json",
        success: function (data) {
            $.each(data,function(key, registro) {
                $("#combo_opciones_administrativos_profesores").append('<option value='+registro.id_opcion+'>'+registro.descripcion+'</option>');
              });   
        
      },
    });
  }
  function llenar_combo_semestres_administrativos_profesores() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obtenersemestres',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_semestres_administrativos_profesores").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
            });

        },
    });
}
  //LLENAR LA TABLA DE ALUMNOS QUE CORRESPONDEN A LAS MATERIAS A LAS QUE EL PROFESOR TIENE ACCESO
function llenartablaalumnosasignadosalamateriadelprofesorp(materia,profesor) {
    // debugger;
    var idmateria = materia;
    var idprofesor = profesor;
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
    fd.append("materia",idmateria);
    fd.append("ciclo",ciclo);
    fd.append("profesor",profesor);

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/veralumnos_asignados_ala_materia_del_profesor',
        data: fd,
        processData: false,
        contentType: false,        
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (data) {
            console.log(data);
            var i = "1";
            $("#tbl_list_calificaciones_profesor_por_materia").DataTable({
                data: data,
                responsive: true,
                columns: [{
                    data: "id_detalle",
                    "visible": false,
                    "searchable": false
                },
                {
                    data: "numero_control",
                },
                {
                    data: "alumno",
                },
                {
                    data: "calificacion",
                },
                {
                    data: "tiempo_extension",
                },
                {
                    orderable: false,
                    searchable: false,
                     data: function (row, type, set) {
                         return `
                                 <a href="#" id="edit_calificacion" class="btn btn-success btn-remove" value="${row.id_detalle}"><i class="far fa-edit"></i></a>
                               `;
                },
                },
                ],
                "language": language_espaniol,

            });
        },
    });
}

  //LLENAR LA TABLA DE ALUMNOS QUE CORRESPONDEN A LAS MATERIAS A LAS QUE EL PROFESOR TIENE ACCESO
  function llenartablaalumnosasignados_por_carrerayopcion($carrera,$opcion,$semestre) {
    // debugger;
    var carrera = $carrera;
    var opcion = $opcion
    var cuatrimestre = $semestre
    var fd = new FormData();
    fd.append("carrera",carrera);
    fd.append("opcion",opcion);
    fd.append("cuatrimestre",cuatrimestre);

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/veralumnos_asignados_porcarrera_opcion',
        data: fd,
        processData: false,
        contentType: false,        
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (data) {
            console.log(data);
            var i = "1";
            $("#tbl_list_calificaciones_administrativos_por_carrera_horario").DataTable({
                data: data,
                responsive: true,
                columns: [
                {
                    data: "id_detalle",
                    "visible": false,
                    "searchable": false
                },
                {
                    data: "numero_control",
                },
                {
                    data: "alumno",
                },
                {
                    orderable: false,
                    searchable: false,
                     data: function (row, type, set) {
                         return `
                                 <a href="#" id="ver_materias_del_alumno" class="btn btn-success btn-remove" value="${row.id_detalle}"><i class="far fa-edit"></i></a>
                              `;
                },
                },
                ],
                "language": language_espaniol,

            });
        },
    });
}

$(document).on("click", "#ver_materias_del_alumno", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
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
            fd.append("detalle",edit_id);
            fd.append("ciclo",ciclo);

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/calificacionesymateriasdelalumno',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modalcalificacionadmin').modal('show');
            
            $("#tbl_list_calificaciones_administrador").DataTable().destroy();
            var i = "1";
            $("#tbl_list_calificaciones_administrador").DataTable({
                data: data,
                responsive: true,
                columns: [
                {
                    data: "detalle",
                    "visible": false,
                    "searchable": false
                },
                {
                    data: "materia",
                    "visible": false,
                    "searchable": false
                },
                {
                    data: "profesor",
                    "visible": false,
                    "searchable": false
                },
                {
                    data: "materianombre",
                },
                {
                    data: "horario",
                },
                {
                    data: "calificacion",
                },
                {
                    data: "modo",
                },
                {
                    orderable: false,
                    searchable: false,
                     data: function (row, type, set) {
                        var concat="";
                        var detalle_materia_profe = concat.concat(`${row.detalle}`,'_',`${row.materia}`,'_',`${row.profesor}`);
                         
                         return `
                                 <a href="#" id="edit_calificacion_admin" class="btn btn-success btn-remove" value="${detalle_materia_profe}"><i class="far fa-edit"></i></a>
                              `;
                },
                },
                ],
                "language": language_espaniol,

            });
/***
 * 
 * 
            $('#calificacion_materia_profesor').val(data.post.calificacion);
            $('#detalle_update').val(data.post.detalle);
            $('#materia_update').val(data.post.materia);
            
 * 
 * 
 * 
 */
        },
        error: function (response) {
            toastr["error"](response.message);
            $('#modaleditcalificacion').modal('hide');
        }
    });
});
$(document).on("click", "#edit_calificacion_admin", function (e) {
    e.preventDefault();
    var del_id = $(this).attr("value");
    var array = del_id.split('_');
    var detalle = array[0];
    var materia = array[1];
    var profe = array[2];

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
            fd.append("detalle",detalle);
            fd.append("materia",materia);
            fd.append("profesor",profe);
            fd.append("ciclo",ciclo);

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/editarcalificacion_admin',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditcalificacion_admin').modal('show');
            $('#calificacion_materia_profesor_admin').val(data.post.calificacion);
            $('#detalle_update_admin').val(data.post.detalle);
            $('#materia_update_admin').val(data.post.materia);
            $('#profesor_update_admin').val(data.post.profesor);
            
        },
        error: function (response) {
            toastr["error"](response.message);
            $('#modaleditcalificacion_admin').modal('hide');
        }
    });
});
$(document).on("click", "#update_calificacion_admin", function (e) {
    e.preventDefault();
    var calificacion_materia_profesor = $("#calificacion_materia_profesor_admin").val();
    var materia_update = $("#materia_update_admin").val();
    var detalle_update = $("#detalle_update_admin").val();
    var profesor = $('#profesor_update_admin').val();
    var usuario = $('#usuario').val();
    var concat="";
    var fecha = new Date();
    var fecha_a_insertar = concat.concat(fecha.getFullYear(),"/",fecha.getMonth()+1,"/",fecha.getDate(),"--",
    fecha.getHours(),":",fecha.getMinutes(),":",fecha.getSeconds());

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

    if(calificacion_materia_profesor>=6){
        var tiempo_extension = 'ord.'
    }else{
        var tiempo_extension = 'extrd.'
    }

      if (calificacion_materia_profesor == "" ||calificacion_materia_profesor>10) {
    alert("Debe agregar una calificación y esta no debe de ser mayor a 10");
    } else {

        var fd = new FormData();

        fd.append("calificacion",  calificacion_materia_profesor);
        fd.append("detalle", detalle_update);
        fd.append("materia", materia_update);
        fd.append("ciclo", ciclo);
        fd.append("profesor", profesor);
        fd.append("estado_administrativo", 2);
        fd.append("tiempo_extension", tiempo_extension);
        fd.append("administrativo_captura", usuario);
        fd.append("fecha_captura_administrativo", fecha_a_insertar);
        fd.append("fecha_actualizacion_administrativo", fecha_a_insertar);
        fd.append("administrativo_actualizacion", usuario);


        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Calificaciones/updatecalificacion_admin',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.response == "success") {
                    toastr["success"](response.message);
                    $("#modaleditcalificacion_admin").modal("hide");
                    $("#formeditcalificacion_admin")[0].reset();

                    $("#tbl_list_calificaciones_profesor_por_materia").DataTable().destroy();
                    llenartablaalumnosasignadosalamateriadelprofesorp($("#combo_materias_administrativos_profesores").val())
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
$(document).on("click", "#edit_calificacion", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    var materia = $('#combo_materias_administrativos_profesores').val();
    var profesor = $('#usuario').val();
    var carrera = $("#combo_carreras_administrativos_profesores").val();
    var opcion =  $("#combo_opciones_administrativos_profesores").val();
    var semestre = $("#combo_semestres_administrativos_profesores").val();

    var concat = "";
    var fecha = new Date();
    if(fecha.getMonth()+1>=1||fecha.getMonth()+1<=9){
        var fecha_actual = concat.concat(fecha.getFullYear(),"-","0",fecha.getMonth()+1,"-",fecha.getDate());

    }else{
        var fecha_actual = concat.concat(fecha.getFullYear(),"-",fecha.getMonth()+1,"-",fecha.getDate());

    }
    
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
            fd.append("detalle",edit_id);
            fd.append("materia",materia);
            fd.append("ciclo",ciclo);
            fd.append("profesor",profesor);

            fd.append("licenciatura",carrera);
            fd.append("semestre",semestre);
            fd.append("opcion_estudio",opcion);
            fd.append("fin",fecha_actual);
          

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/validar_asignacion_calificacion',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (response) {
            console.log(response); //ver la respuesta del json, los valores que contiene
            if (response.response == "success") {//success
                toastr["success"](response.message);
                consulta_calificacion_con_fecha_de_asignacion_valida(fd);
            } else {
                toastr["error"](response.message);
                
            }           
        },
        error: function (response) {
            toastr["error"](response.message);
            alert("erorr");
            $('#modaleditcalificacion').modal('hide');
        }
    });

    
});

function consulta_calificacion_con_fecha_de_asignacion_valida(fd){
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/editarcalificacion',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditcalificacion').modal('show');
            $('#calificacion_materia_profesor').val(data.post.calificacion);
            $('#detalle_update').val(data.post.detalle);
            $('#materia_update').val(data.post.materia);
            
        },
        error: function (response) {
            toastr["error"](response.message);
            $('#modaleditcalificacion').modal('hide');
        }
    });
}


$(document).on("click", "#update_calificacion_profesor", function (e) {
    e.preventDefault();
    var calificacion_materia_profesor = $("#calificacion_materia_profesor").val();
    var materia_update = $("#materia_update").val();
    var detalle_update = $("#detalle_update").val();
    var profesor = $('#usuario').val();
    var concat="";
    var fecha = new Date();
    var fecha_a_insertar = concat.concat(fecha.getFullYear(),"/",fecha.getMonth()+1,"/",fecha.getDate(),"--",
    fecha.getHours(),":",fecha.getMinutes(),":",fecha.getSeconds());

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

    if(calificacion_materia_profesor>=6){
        var tiempo_extension = 'ord.'
    }else{
        var tiempo_extension = 'extrd.'
    }

      if (calificacion_materia_profesor == "" ||calificacion_materia_profesor>10) {
    alert("Debe agregar una calificación y esta no debe de ser mayor a 10");
    } else {

        var fd = new FormData();
       

        fd.append("calificacion",  calificacion_materia_profesor);
        fd.append("detalle", detalle_update);
        fd.append("materia", materia_update);
        fd.append("ciclo", ciclo);
        fd.append("estado_profesor", 2);
        fd.append("tiempo_extension", tiempo_extension);
        fd.append("profesor_captura", profesor);
        fd.append("fecha_captura_profesor", fecha_a_insertar);
        fd.append("fecha_actualizacion_profesor", fecha_a_insertar);
        fd.append("profesor_actualizacion", profesor);
        fd.append("profesor", profesor);

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Calificaciones/updatecalificacion',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.response == "success") {
                    toastr["success"](response.message);
                    $("#modaleditcalificacion").modal("hide");
                    $("#formeditcalificacion")[0].reset();
                    $("#tbl_list_calificaciones_profesor_por_materia").DataTable().destroy();
                    llenartablaalumnosasignadosalamateriadelprofesorp($("#combo_materias_administrativos_profesores").val());
                    mover_de_semestre(fd);
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

 function mover_de_semestre(fd){
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Calificaciones/moveralumno_desemestre',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (response) {
            if (response.response == "success") {
                toastr["success"](response.message);
                
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