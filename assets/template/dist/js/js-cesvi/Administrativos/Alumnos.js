$(document).ready(function () {
    llenarTablaAlumnos(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
    date_picker_alumno();
    periodo_activo();
    deshabilitar_view_alumno();
    secuencia_derecho();
    secuencia_psicologia();
    secuencia_criminalistica();
    secuencia_diseño();
    secuencia_contaduria();

    llenar_combo_carreras_alumnos_admin();
$("#combo_carreras_alumnos_admin").change(function () {
    $("#tbl_alumnos_inscripcion").DataTable().destroy();
    llenarTablaAlumnos($("#combo_carreras_alumnos_admin").val(),
     $("#combo_opciones_alumnos_admin").val(),
     $("#combo_semestres_alumnos_admin").val());
});
llenar_combo_semestres_alumnos_admin();
$("#combo_semestres_alumnos_admin").change(function () {
    $("#tbl_alumnos_inscripcion").DataTable().destroy();
    llenarTablaAlumnos($("#combo_carreras_alumnos_admin").val(),
     $("#combo_opciones_alumnos_admin").val(),
     $("#combo_semestres_alumnos_admin").val());
});
llenar_combo_opciones_alumnos_admin();
$("#combo_opciones_alumnos_admin").change(function () {
    $("#tbl_alumnos_inscripcion").DataTable().destroy();
    llenarTablaAlumnos($("#combo_carreras_alumnos_admin").val(),
     $("#combo_opciones_alumnos_admin").val(),
     $("#combo_semestres_alumnos_admin").val());
});
}); // FIN DE LA FUNCION PRINCIPAL
function llenar_combo_carreras_alumnos_admin() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obtenercarreras',
        dataType: "json",
        success: function (data) {
            console.log(data);
            $.each(data, function (key, registro) {
                $("#combo_carreras_alumnos_admin").append('<option value=' + registro.id_carrera + '>' + registro.carrera_descripcion + '</option>');
            });
        },
    });
}
function llenar_combo_opciones_alumnos_admin() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obteneropciones',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_opciones_alumnos_admin").append('<option value=' + registro.id_opcion + '>' + registro.descripcion + '</option>');
            });

        },
    });
}
function llenar_combo_semestres_alumnos_admin() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obtenersemestres',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_semestres_alumnos_admin").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
            });

        },
    });
}
$(".custom-file-input").on("change", function () {
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
$("#modaladdalumno").on("hide.bs.modal", function (e) {
    // do something...
    $("#formaddalumno")[0].reset();
    $(".custom-file-label").html("Adjuntar archivo (Curriculum vitae)");
});

/* ---------------------------- Add Records Modal --------------------------- */
$("#modaladdtutor").on("hide.bs.modal", function (e) {
    // do something...
    $("#formaddtutor")[0].reset();
    $(".custom-file-label").html("Adjuntar archivo (Curriculum vitae)");
});

/* ---------------------------- Edit Record Modal --------------------------- */
$("#modaleditalumno").on("hide.bs.modal", function (e) {
    // do something...
    $("#formeditalumno")[0].reset();
});

$("#modalviewalumno").on("hide.bs.modal", function (e) {
    // do something...
});


/* -------------------------------------------------------------------------- */
/*                               Insert Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#btnaddalumno", function (e) {
    e.preventDefault();
    var nombre_alumno = $("#nombre_alumno").val();
    var apellidop_alumno = $("#apellidop_alumno").val();
    var apellidom_alumno = $("#apellidom_alumno").val();
    var direccion_alumno = $("#direccion_alumno").val();
    var municipmunicipio_alumno = $("#municipio_alumno").val();
    var estestado_alumnodo = $("#estado_alumno").val();
    var datepicker_fecha_nacimiento_alumno = $("#datepicker_fecha_nacimiento_alumno").val();
    var datepicker_fecha_inscripcion_alumno = $("#datepicker_fecha_inscripcion_alumno").val();
    var lugar_nacimiento_alumno = $("#lugar_nacimiento_alumno").val();
    var municipio_nacimiento_alumno = $("#municipio_nacimiento_alumno").val();
    var estado_nacimiento_alumno = $("#estado_nacimiento_alumno").val();
    var estado_civil_alumno = $("#estado_civil_alumno").val();
    var sexo_alumno = $("#sexo_alumno").val();
    var institucion_procedencia_alumno = $("#institucion_procedencia_alumno").val();
    var tipo_escuela_alumno = $("#tipo_escuela_alumno").val();
    var telefono_alumno = $("#telefono_alumno").val();
    var email_alumno = $("#email_alumno").val();
    var facebook_alumno = $("#facebook_alumno").val();
    var twitter_alumno = $("#twitter_alumno").val();
    var instagram_alumno = $("#instagram_alumno").val();
    var licenciaturas_alumno = $("#licenciaturas_alumno").val();
    var horarios_alumno = $("#horarios_alumno").val();
    var img_acta_alumno = $("#acta_alumno")[0].files[0]; // this is file
    var img_certificado_alumno = $("#certificado_alumno")[0].files[0]; // this is file
    var img_curp_alumno = $("#curp_alumno")[0].files[0]; // this is file
    var img_certificado_medico_alumno = $("#certificado_medico_alumno")[0].files[0]; // this is file
    var perido_activo_escolar = $('#id_perido_escolar_activo').val();
    //SECUENCIAS
    var secuencia_derecho = $('#secuencia_derecho').val();
    var secuencia_psicologia = $('#secuencia_psicologia').val();
    var secuencia_criminalistica = $('#secuencia_criminalistica').val();
    var secuencia_diseno = $('#secuencia_diseno').val();
    var secuencia_contaduria = $('#secuencia_contaduria').val();

    var id_secuencia_derecho = $('#id_secuencia_derecho').val();
    var id_secuencia_psicologia = $('#id_secuencia_psicologia').val();
    var id_secuencia_criminalistica = $('#id_secuencia_criminalistica').val();
    var id_secuencia_diseno = $('#id_secuencia_diseno').val();
    var id_secuencia_contaduria = $('#id_secuencia_contaduria').val();

    if (nombre_alumno == "" || apellidop_alumno == "" || apellidom_alumno == "" || direccion_alumno == "" ||
        municipmunicipio_alumno == "" || estestado_alumnodo == "" || datepicker_fecha_nacimiento_alumno == "" || datepicker_fecha_inscripcion_alumno == "" ||
        lugar_nacimiento_alumno == "" || municipio_nacimiento_alumno == "" || estado_nacimiento_alumno == "" || estado_civil_alumno == "" || sexo_alumno == "" ||
        institucion_procedencia_alumno == "" || tipo_escuela_alumno == "" || telefono_alumno == "" ||
        email_alumno == "" || facebook_alumno == "" || twitter_alumno == "" || instagram_alumno == "" || licenciaturas_alumno == "" ||
        horarios_alumno == "") {
        alert("Debe llenar todos los campos vacios...!");
    } else {

        var fd = new FormData();

        var archivo_acta_alumno = $("#acta_alumno")[0].files[0]; // this is file
        var archivo_certificado_alumno = $("#certificado_alumno")[0].files[0]; // this is file
        var archivo_curp_alumno = $("#curp_alumno")[0].files[0]; // this is file
        var archivo_certificado_medico_alumno = $("#certificado_medico_alumno")[0].files[0]; // this is file
        var numero="";

        var ciclo =  $("#perido_escolar_activo").val();

        if(licenciaturas_alumno==19){
            var numero_control = numero.concat(nombre_alumno.substring(0,1).toUpperCase(),apellidop_alumno.substring(0,1).toUpperCase(),
            apellidom_alumno.substring(0,1).toUpperCase(),"DG",ciclo.substring(2,4),
            ciclo.substring(7,9),secuencia_diseno);
            var nuevasecuencia =Number(secuencia_diseno)+1;
            fd.append("id_secuencia",  id_secuencia_diseno);
            fd.append("valor_secuencia", nuevasecuencia);

        }
        if(licenciaturas_alumno==21){
            var numero_control = numero.concat(nombre_alumno.substring(0,1).toUpperCase(),apellidop_alumno.substring(0,1).toUpperCase(),
            apellidom_alumno.substring(0,1).toUpperCase(),"C",ciclo.substring(2,4),
            ciclo.substring(7,9),secuencia_contaduria);
            var nuevasecuencia =Number(secuencia_contaduria)+1;
            fd.append("id_secuencia",  id_secuencia_contaduria);
            fd.append("valor_secuencia", nuevasecuencia);
        }
        if(licenciaturas_alumno==22){
            var numero_control = numero.concat(nombre_alumno.substring(0,1).toUpperCase(),apellidop_alumno.substring(0,1).toUpperCase(),
            apellidom_alumno.substring(0,1).toUpperCase(),"CC",ciclo.substring(2,4),
            ciclo.substring(7,9),secuencia_criminalistica);
            var nuevasecuencia =Number(secuencia_criminalistica)+1;
            fd.append("id_secuencia",  id_secuencia_criminalistica);
            fd.append("valor_secuencia", nuevasecuencia);
        }
        if(licenciaturas_alumno==23){
            var numero_control = numero.concat(nombre_alumno.substring(0,1).toUpperCase(),apellidop_alumno.substring(0,1).toUpperCase(),
            apellidom_alumno.substring(0,1).toUpperCase(),"D",ciclo.substring(2,4),
            ciclo.substring(7,9),secuencia_derecho);
            var nuevasecuencia = Number(secuencia_derecho)+1;
            fd.append("id_secuencia",  id_secuencia_derecho);
            fd.append("valor_secuencia", nuevasecuencia);
        }
        if(licenciaturas_alumno==24){
            var numero_control = numero.concat(nombre_alumno.substring(0,1).toUpperCase(),apellidop_alumno.substring(0,1).toUpperCase(),
            apellidom_alumno.substring(0,1).toUpperCase(),"P",ciclo.substring(2,4),
            ciclo.substring(7,9),secuencia_psicologia);
            var nuevasecuencia =Number(secuencia_psicologia)+1;
            fd.append("id_secuencia",  id_secuencia_psicologia);
            fd.append("valor_secuencia", nuevasecuencia);
        }


        fd.append("numero_control",  numero_control);
        fd.append("nombres", nombre_alumno);
        fd.append("apellido_paterno", apellidop_alumno);
        fd.append("apellido_materno", apellidom_alumno);
        fd.append("direccion", direccion_alumno);
        fd.append("municipio_direccion", municipmunicipio_alumno);
        fd.append("estado_direccion", estestado_alumnodo);
        fd.append("fecha_nacimiento", datepicker_fecha_nacimiento_alumno);
        fd.append("fecha_inscripcion", datepicker_fecha_inscripcion_alumno);
        fd.append("localidad", lugar_nacimiento_alumno);
        fd.append("municipio_localidad", municipio_nacimiento_alumno);
        fd.append("estado_localidad", estado_nacimiento_alumno);
        fd.append("estado_civil", estado_civil_alumno);
        fd.append("sexo", sexo_alumno);
        fd.append("tipo_escuela_nivel_medio_superior", tipo_escuela_alumno);
        fd.append("institucion", institucion_procedencia_alumno);
        fd.append("email", email_alumno);
        fd.append("telefono", telefono_alumno);
        fd.append("facebook", facebook_alumno);
        fd.append("twitter", twitter_alumno);
        fd.append("instagram", instagram_alumno);
        fd.append("estatus", 0); //EL ESTADO PARA CUALQUIER MOVIMIENTO DEL ALUMNO
        fd.append("estatus_alumno_activo", 1); // EL ESTADO INICIAL PARA EL ALUMNO QUE SE INGRESA AL SISTEMA

        fd.append("nombre_acta", img_acta_alumno); //Obt principalmente el name file
        fd.append("acta_nacimiento", archivo_acta_alumno); // Obt el file como tal

        fd.append("nombre_certificado_bachillerato", img_certificado_alumno); //Obt principalmente el name file
        fd.append("certificado_bachillerato", archivo_certificado_alumno); // Obt el file como tal

        fd.append("nombre_curp", img_curp_alumno); //Obt principalmente el name file
        fd.append("curp", archivo_curp_alumno); // Obt el file como tal

        fd.append("nombre_certificado_medico", img_certificado_medico_alumno); //Obt principalmente el name file
        fd.append("certificado_medico", archivo_certificado_medico_alumno); // Obt el file como tal

        //EL REGISTRO DEL ALUMNO A SU RESPECTIVA CARRERA Y OOPCION DE ESTUDIO
        fd.append("alumno", numero_control);
        fd.append("carrera", licenciaturas_alumno);
        fd.append("opcion", horarios_alumno);
        fd.append("cuatrimestre", 1);
        fd.append("ciclo_escolar", perido_activo_escolar);
        fd.append("estado", 'Inicio_inscripcion');
        fd.append("promedio", 0);

        //EL REGISTRO DEL ALUMNO COMO USUARIO
        var apellidos = "";
        apellidos = apellidos.concat(apellidop_alumno);
        apellidos = apellidos.concat(" ");
        apellidos = apellidos.concat(apellidom_alumno);
        fd.append("nombres", nombre_alumno);
        fd.append("apellidos", apellidos);
        fd.append("telefono", telefono_alumno);
        fd.append("email", email_alumno);
        fd.append("username", numero_control);
        fd.append("password", 123456);
        fd.append("rol_id", 2);
        fd.append("estado_usuario", 1);

        agregar_alumno(fd); //Se registra el usuario a la tabla alumnos y a la tabla detalles

    }
});




$(document).on("click", "#update_alumno", function (e) {
    e.preventDefault();
    var numero_control_update = $("#numero_control_update").val();
    var nombre_alumno_update = $("#nombre_alumno_update").val();
    var apellidop_alumno_update = $("#apellidop_alumno_update").val();
    var apellidom_alumno_update = $("#apellidom_alumno_update").val();
    var direccion_alumno_update = $("#direccion_alumno_update").val();
    var municipmunicipio_alumno_update = $("#municipio_alumno_update").val();
    var estestado_alumno_updatedo = $("#estado_alumno_update").val();
    var datepicker_fecha_nacimiento_alumno_update = $("#datepicker_fecha_nacimiento_alumno_update").val();
    var datepicker_fecha_inscripcion_alumno_update = $("#datepicker_fecha_inscripcion_alumno_update").val();
    var lugar_nacimiento_alumno_update = $("#lugar_nacimiento_alumno_update").val();
    var municipio_nacimiento_alumno_update = $("#municipio_nacimiento_alumno_update").val();
    var estado_nacimiento_alumno_update = $("#estado_nacimiento_alumno_update").val();
    var estado_civil_alumno_update = $("#estado_civil_alumno_update").val();
    var sexo_alumno_update = $("#sexo_alumno_update").val();
    var institucion_procedencia_alumno_update = $("#institucion_procedencia_alumno_update").val();
    var tipo_escuela_alumno_update = $("#tipo_escuela_alumno_update").val();
    var telefono_alumno_update = $("#telefono_alumno_update").val();
    var email_alumno_update = $("#email_alumno_update").val();
    var facebook_alumno_update = $("#facebook_alumno_update").val();
    var twitter_alumno_update = $("#twitter_alumno_update").val();
    var instagram_alumno_update = $("#instagram_alumno_update").val();
    var img_acta_alumno_update = $("#acta_alumno_update")[0].files[0]; // this is file
    var img_certificado_alumno_update = $("#certificado_alumno_update")[0].files[0]; // this is file
    var img_curp_alumno_update = $("#curp_alumno_update")[0].files[0]; // this is file
    var img_certificado_medico_alumno_update = $("#certificado_medico_alumno_update")[0].files[0]; // this is file

      if (nombre_alumno_update == "" || apellidop_alumno_update == "" || apellidom_alumno_update == "" || direccion_alumno_update == "" ||
        municipmunicipio_alumno_update == "" || estestado_alumno_updatedo == "" || datepicker_fecha_nacimiento_alumno_update == "" || datepicker_fecha_inscripcion_alumno_update == "" ||
        lugar_nacimiento_alumno_update == "" || municipio_nacimiento_alumno_update == "" || estado_nacimiento_alumno_update == "" || estado_civil_alumno_update == "" || sexo_alumno_update == "" ||
        institucion_procedencia_alumno_update == "" || tipo_escuela_alumno_update == "" || telefono_alumno_update == "" ||
        email_alumno_update == "" || facebook_alumno_update == "" || twitter_alumno_update == "" || instagram_alumno_update == "" ) {
    alert("Debe llenar todos los campos vacios...!");
    } else {

        var fd = new FormData();
        var archivo_acta_alumno_update = $("#acta_alumno_update")[0].files[0]; // this is file
        var archivo_certificado_alumno_update = $("#certificado_alumno_update")[0].files[0]; // this is file
        var archivo_curp_alumno_update = $("#curp_alumno_update")[0].files[0]; // this is file
        var archivo_certificado_medico_alumno_update = $("#certificado_medico_alumno_update")[0].files[0]; // this is file

        fd.append("numero_control",  numero_control_update);
        fd.append("nombres", nombre_alumno_update);
        fd.append("apellido_paterno", apellidop_alumno_update);
        fd.append("apellido_materno", apellidom_alumno_update);
        fd.append("direccion", direccion_alumno_update);
        fd.append("municipio_direccion", municipmunicipio_alumno_update);
        fd.append("estado_direccion", estestado_alumno_updatedo);
        fd.append("fecha_nacimiento", datepicker_fecha_nacimiento_alumno_update);
        fd.append("fecha_inscripcion", datepicker_fecha_inscripcion_alumno_update);
        fd.append("localidad", lugar_nacimiento_alumno_update);
        fd.append("municipio_localidad", municipio_nacimiento_alumno_update);
        fd.append("estado_localidad", estado_nacimiento_alumno_update);
        fd.append("estado_civil", estado_civil_alumno_update);
        fd.append("sexo", sexo_alumno_update);
        fd.append("tipo_escuela_nivel_medio_superior", tipo_escuela_alumno_update);
        fd.append("institucion", institucion_procedencia_alumno_update);
        fd.append("email", email_alumno_update);
        fd.append("telefono", telefono_alumno_update);
        fd.append("facebook", facebook_alumno_update);
        fd.append("twitter", twitter_alumno_update);
        fd.append("instagram", instagram_alumno_update);

        if ($("#acta_alumno_update")[0].files.length > 0) {
            fd.append("nombre_acta", img_acta_alumno_update); //Obt principalmente el name file
            fd.append("acta_nacimiento", archivo_acta_alumno_update); // Obt el file como tal
           }
        if ($("#certificado_alumno_update")[0].files.length > 0) {
            fd.append("nombre_certificado_bachillerato", img_certificado_alumno_update); //Obt principalmente el name file
        fd.append("certificado_bachillerato", archivo_certificado_alumno_update); // Obt el file como tal

          }
        if ($("#curp_alumno_update")[0].files.length > 0) {
            fd.append("nombre_curp", img_curp_alumno_update); //Obt principalmente el name file
            fd.append("curp", archivo_curp_alumno_update); // Obt el file como tal
          }
        if ($("#certificado_medico_alumno_update")[0].files.length > 0) {
            fd.append("nombre_certificado_medico", img_certificado_medico_alumno_update); //Obt principalmente el name file
            fd.append("certificado_medico", archivo_certificado_medico_alumno_update); // Obt el file como tal
          }

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Alumnos/updatealumno',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.response == "success") {
                    toastr["success"](response.message);
                    $("#modaleditalumno").modal("hide");
                    $("#formeditalumno")[0].reset();
                    $("#tbl_alumnos_inscripcion").DataTable().destroy();
                    llenarTablaAlumnos();
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

/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaalumnos               */
/* -------------------------------------------------------------------------- */


function llenarTablaAlumnos(carrera,opcion,cuatrimestre) {
    // debugger;

    var fd = new FormData();
    fd.append("carrera", carrera);
    fd.append("opcion", opcion);
    fd.append("cuatrimestre", cuatrimestre);

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Alumnos/veralumno',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multpart/form-data',
        success: function (response) {
            var  i= "1";
            $("#tbl_alumnos_inscripcion").DataTable({
                data: response,
                responsve: true,
                columns: [{
                    data: "numero_control",
                },
                {
                    data: "alumno",
                },
                {
                    data: "nombre_acta",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        var nombre_acta = `${row.nombre_acta}`;
                          var a;
                            if(nombre_acta != "null"&&nombre_acta != "undefined"){
                                var a = `
                                <a ttle="Descarga Documento" href="Alumnos/verActaalumno/${row.numero_control}" target="_blank">< class="far fa-fle-pdf fa-2x"></></a>
                             `;
                            }
                            else{
                                a = 'Sin archvo';
                            }

                        return a;
                    },
                },
                {
                    data: "nombre_certificado_bachillerato",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        var nombre_certfcado_bachllerato = `${row.nombre_certificado_bachillerato}`;
                        var a;
                          if(nombre_certfcado_bachllerato != "null"&&nombre_certfcado_bachllerato != "undefined"){
                            var a = `
                            <a ttle="Descarga Documento" href="Alumnos/verCertfcadoalumno/${row.numero_control}" target="_blank">< class="far fa-fle-pdf fa-2x"></></a>
                            `;
                          }
                          else{
                            a = 'Sn archvo';
                        }
                        return a;
                    },
                },
                {
                    data: "curp",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        var nombre_curp = `${row.nombre_curp}`;
                        var a;
                          if(nombre_curp != "null"&&nombre_curp != "undefined"){
                            var a = `
                            <a ttle="Descarga Documento" href="Alumnos/verCurpalumno/${row.numero_control}" target="_blank">< class="far fa-fle-pdf fa-2x"></></a>
                         `;
                          }
                          else{
                            a = 'Sn archvo';
                        }
                        return a;
                    },
                },
                {
                    data: "certificado_medico",
                    orderable: false,
                    searchable: false,
                    render: function (data, type, row, meta) {
                        var nombre_certfcado_medco = `${row.nombre_certificado_medico}`;
                        var a;
                          if(nombre_certfcado_medco != "null"&&nombre_certfcado_medco != "undefined"){
                        var a = `
                               <a ttle="Descarga Documento" href="Alumnos/verCertfcadoMedcoalumno/${row.numero_control}" target="_blank">< class="far fa-fle-pdf fa-2x"></></a>
                            `;
                          }
                          else{
                            a = 'Sn archvo';
                        }
                        return a;
                    },
                },
                {
                    orderable: false,
                    searchable: false,
                    data: function (row, type, set) {
                        return `
                                <a href="#" id="edit_alumno" class="btn btn-success btn-remove" value="${row.numero_control}"><i class="far fa-edit"></i></a>
                                <a href="#" id="del_alumno" class="btn btn-danger btn-remove" value="${row.numero_control}"><i class="fas fa-trash-alt"></i></a>
                            `;
                    },
                },
                {
                    orderable: false,
                    searchable: false,
                    data: function(row, type, set) {
                        return `
                            <a href="#" id="view_alumno" class="btn btn-info" value="${row.numero_control}"><i class="far fa-edit"></i></a>
                               `;
                    },
                },

                {
                            "className": "text-center",
                            orderable: false,
                            searchable: false,
                            "render" : function(data, type, row) {
                                  var servicio_social = `${row.servicio_social}`;
                              if(servicio_social == 1){
                                var a = 'En proceso';
                              }else {
                                var a = '----';
                              }
                              return a;
                             },
                        },

                        {
                            "className": "text-center",
                            orderable: false,
                            searchable: false,
                            "render" : function(data, type, row) {
                              var practicas_prof = `${row.practicas_prof}`;
                                if(practicas_prof == 1){
                                  var a = 'En proceso';
                                }else {
                                  var a = '----';
                                }
                                return a;
                             },
                        },

                                {
                                "className": "text-center",
                                orderable: false,
                                searchable: false,
                                "render" : function(data, type, row) {
                                    var titulacion = `${row.titulacion}`;
                                      if(titulacion == 1){
                                        var a = 'En proceso';
                                      }else {
                                        var a = '----';
                                      }
                                      return a;
                                     },
                                },


                ],
                "language": language_espaniol,

            });
        },
    });
}

$(document).on("click", "#view_alumno", function (e) {
    e.preventDefault();
    debugger;
    var view_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url+'Administrativos/Alumnos/viewalumno',
        data: {
            view_id: view_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modalviewalumno').modal('show');
            $('#numero_control_view').val(data.post.numero_control);
            $("#nombre_alumno_view").val(data.post.nombres);
            $("#apellidop_alumno_view").val(data.post.apellido_paterno);
            $("#apellidom_alumno_view").val(data.post.apellido_materno);
            $("#direccion_alumno_view").val(data.post.direccion);
            $("#municipio_alumno_view").val(data.post.municipio_direccion);
            $("#estado_alumno_view").val(data.post.estado_direccion);
            $("#fecha_nacimiento_alumno_view").val(data.post.fecha_nacimiento);
            $("#fecha_inscripcion_alumno_view").val(data.post.fecha_inscripcion);
            $("#lugar_nacimiento_alumno_view").val(data.post.localidad);
            $("#municipio_nacimiento_alumno_view").val(data.post.municipio_localidad);
            $("#estado_nacimiento_alumno_view").val(data.post.estado_localidad);
            $("#estado_civil_alumno_view").val(data.post.estado_civil);
            $("#sexo_alumno_view").val(data.post.sexo);
            $("#institucion_procedencia_alumno_view").val(data.post.institucion);
            $("#tipo_escuela_alumno_view").val(data.post.tipo_escuela_nivel_medio_superior);
            $("#telefono_alumno_view" ).val(data.post.telefono);
            $("#email_alumno_view").val(data.post.email);
            $("#facebook_alumno_view").val(data.post.facebook);
            $("#twitter_alumno_view").val(data.post.twitter);
            $("#instagram_alumno_view").val(data.post.instagram);
            $("#licenciaturas_alumno_view").val(data.post.carrera_descripcion);
            $("#horarios_alumno_view").val(data.post.descripcion);
        },
    });
});
// <a href="#" id="edit" class="btn btn-sm btn-outline-info" value="${row.id}"><i class="fas fa-edit"></i></a>

$(document).on("click", "#agregar_tutor", function (e) {
    e.preventDefault();
    $('#modaladdtutor').modal('show');

});


$(document).on("click", "#edit_alumno", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Alumnos/editaralumno',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditalumno').modal('show');
            $('#numero_control_update').val(data.post.numero_control);
            $("#nombre_alumno_update").val(data.post.nombres);
            $("#apellidop_alumno_update").val(data.post.apellido_paterno);
            $("#apellidom_alumno_update").val(data.post.apellido_materno);
            $("#direccion_alumno_update").val(data.post.direccion);
            $("#municipio_alumno_update").val(data.post.municipio_direccion);
            $("#estado_alumno_update").val(data.post.estado_direccion);
            $("#datepicker_fecha_nacimiento_alumno_update").val(data.post.fecha_nacimiento);
            $("#datepicker_fecha_inscripcion_alumno_update").val(data.post.fecha_inscripcion);
            $("#lugar_nacimiento_alumno_update").val(data.post.localidad);
            $("#municipio_nacimiento_alumno_update").val(data.post.municipio_localidad);
            $("#estado_nacimiento_alumno_update").val(data.post.estado_localidad);
            $("#estado_civil_alumno_update").val(data.post.estado_civil);
            $("#sexo_alumno_update").val(data.post.sexo);
            $("#institucion_procedencia_alumno_update").val(data.post.institucion);
            $("#tipo_escuela_alumno_update").val(data.post.tipo_escuela_nivel_medio_superior);
            $("#telefono_alumno_update" ).val(data.post.telefono);
            $("#email_alumno_update").val(data.post.email);
            $("#facebook_alumno_update").val(data.post.facebook);
            $("#twitter_alumno_update").val(data.post.twitter);
            $("#instagram_alumno_update").val(data.post.instagram);

        },
    });
});
/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#del_alumno", function (e) {
    e.preventDefault();

    var del_id = $(this).attr("value");

    Swal.fire({
        title: "¿Estás seguro de dar de baja al alumno?",
        text: "¡Esta acción es irreversile!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, darlo de baja!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            var fd = new FormData();
            fd.append("numero_control",del_id);
            fd.append("estatus_alumno_activo",0);
            $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Alumnos/eliminaralumno',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
                success: function (data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Dado de baja!',
                            'El alumno fue dado de baja',
                            'success'
                        );
                        $("#tbl_alumnos_inscripcion").DataTable().destroy();
                        llenarTablaAlumnos();
                    } else {
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

function date_picker_alumno() {
    $("#datepicker_fecha_nacimiento_alumno,#datepicker_fecha_inscripcion_alumno,#datepicker_fecha_nacimiento_alumno_update,#datepicker_fecha_inscripcion_alumno_update").datepicker({
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


function agregar_alumno(fd) {
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Alumnos/insertaralumno',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (response) {
            if (response.response == "success") {
                toastr["success"](response.message);
                $("#modaladdalumno").modal("hide");
                $("#formaddalumno")[0].reset();
                $(".add-file-label").html("No se eligió archivo");
                $("#tbl_alumnos_inscripcion").DataTable().destroy();
                llenarTablaAlumnos();
            } else {
                toastr["error"](response.message);
            }
        },
    });
}




function periodo_activo() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Alumnos/verperiodo_activo',
        dataType: "json",
        success: function (response) {
            $("#id_perido_escolar_activo").val(response['id_periodo_escolar']);
            $("#perido_escolar_activo").val(response['nombre_ciclo']);
        },
    });
}
function secuencia_derecho() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Alumnos/secuencia_derecho',
        dataType: "json",
        success: function (response) {
            $("#id_secuencia_derecho").val(response['id_secuencia']);
            $("#secuencia_derecho").val(response['valor_secuencia']);
        },
    });
}
function secuencia_psicologia() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Alumnos/secuencia_psicologia',
        dataType: "json",
        success: function (response) {
            $("#id_secuencia_psicologia").val(response['id_secuencia']);
            $("#secuencia_psicologia").val(response['valor_secuencia']);
        },
    });
}
function secuencia_criminalistica() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Alumnos/secuencia_criminalistica',
        dataType: "json",
        success: function (response) {
            $("#id_secuencia_criminalistica").val(response['id_secuencia']);
            $("#secuencia_criminalistica").val(response['valor_secuencia']);
        },
    });
}
function secuencia_diseño() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Alumnos/secuencia_diseno',
        dataType: "json",
        success: function (response) {
            $("#id_secuencia_diseno").val(response['id_secuencia']);
            $("#secuencia_diseno").val(response['valor_secuencia']);
        },
    });
}
function secuencia_contaduria() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/Alumnos/secuencia_contaduria',
        dataType: "json",
        success: function (response) {
            $("#id_secuencia_contaduria").val(response['id_secuencia']);
            $("#secuencia_contaduria").val(response['valor_secuencia']);
        },
    });
}

function deshabilitar_view_alumno(){
$('#numero_control_view').prop('disabled', true);
$("#nombre_alumno_view").prop('disabled', true);
$("#apellidop_alumno_view").prop('disabled', true);
$("#apellidom_alumno_view").prop('disabled', true);
$("#direccion_alumno_view").prop('disabled', true);
$("#municipio_alumno_view").prop('disabled', true);
$("#estado_alumno_view").prop('disabled', true);
$("#fecha_nacimiento_alumno_view").prop('disabled', true);
$("#fecha_inscripcion_alumno_view").prop('disabled', true);
$("#lugar_nacimiento_alumno_view").prop('disabled', true);
$("#municipio_nacimiento_alumno_view").prop('disabled', true);
$("#estado_nacimiento_alumno_view").prop('disabled', true);
$("#estado_civil_alumno_view").prop('disabled', true);
$("#sexo_alumno_view").prop('disabled', true);
$("#institucion_procedencia_alumno_view").prop('disabled', true);
$("#tipo_escuela_alumno_view").prop('disabled', true);
$("#telefono_alumno_view" ).prop('disabled', true);
$("#email_alumno_view").prop('disabled', true);
$("#facebook_alumno_view").prop('disabled', true);
$("#twitter_alumno_view").prop('disabled', true);
$("#instagram_alumno_view").prop('disabled', true);
$("#licenciaturas_alumno_view").prop('disabled', true);
$("#horarios_alumno_view").prop('disabled', true);
}
