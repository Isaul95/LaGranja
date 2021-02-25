$(document).ready(function () {
    llenarTablaAlumnosParaDocumentacion();

// =============== LLENADO DE COMBOS =================
llenar_combo_carreras_documeAlumnos_Admin();
llenar_combo_semestres_documeAlumnos_Admin();
llenar_combo_opciones_documeAlumnos_Admin();

$("#combo_CarreraDocumAlumnos_Admin").change(function () {
      // var profesor = $('#usuario').val();
      var licenciatura = $("#combo_CarreraDocumAlumnos_Admin").val();
      var semestre = $("#combo_SemestresDocumAlumnos_Admin").val();
      var opciones = $("#combo_opcionesDocumAlumnos_Admin").val();
  $("#tbl_alumnosDocumentacion").DataTable().destroy();
      llenarTablaAlumnosParaDocumentacion(licenciatura,semestre,opciones);
      // llenartablaplaneacionprofesores(profesor,licenciatura,semestre,opciones);
  });

  $("#combo_SemestresDocumAlumnos_Admin").change(function () {
        // var profesor = $('#usuario').val();
        var licenciatura = $("#combo_CarreraDocumAlumnos_Admin").val();
        var semestre = $("#combo_SemestresDocumAlumnos_Admin").val();
        var opciones = $("#combo_opcionesDocumAlumnos_Admin").val();
    $("#tbl_alumnosDocumentacion").DataTable().destroy();
        llenarTablaAlumnosParaDocumentacion(licenciatura,semestre,opciones);
   });

   $("#combo_opcionesDocumAlumnos_Admin").change(function () {
        // var profesor = $('#usuario').val();
        var licenciatura = $("#combo_CarreraDocumAlumnos_Admin").val();
        var semestre = $("#combo_SemestresDocumAlumnos_Admin").val();
        var opciones = $("#combo_opcionesDocumAlumnos_Admin").val();
    $("#tbl_alumnosDocumentacion").DataTable().destroy();
        llenarTablaAlumnosParaDocumentacion(licenciatura,semestre,opciones);
    });



}); // FIN DE LA FUNCION PRINCIPAL


function llenar_combo_opciones_documeAlumnos_Admin() {
    $.ajax({
        type: "get",
        url: base_url + 'Profesores/PlaneacionProfesores/obteneropciones',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_opcionesDocumAlumnos_Admin").append('<option value=' + registro.id_opcion + '>' + registro.descripcion + '</option>');
            });
        },
    });
}


function llenar_combo_semestres_documeAlumnos_Admin() {
    $.ajax({
        type: "get",
        url: base_url + 'Profesores/PlaneacionProfesores/obtenersemestres',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_SemestresDocumAlumnos_Admin").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
            });

        },
    });
}



function llenar_combo_carreras_documeAlumnos_Admin() {
    $.ajax({
        type: "get",
        url: base_url + 'Profesores/PlaneacionProfesores/obtenercarreras',
        dataType: "json",
        success: function (data) {
            console.log(data);
            $.each(data, function (key, registro) {
                $("#combo_CarreraDocumAlumnos_Admin").append('<option value=' + registro.id_carrera + '>' + registro.carrera_descripcion + '</option>');
            });
        },
    });
}

/* -------------------------------------------------------------------------- */
/*                                llenarllenarTablaalumnos               */
/* -------------------------------------------------------------------------- */



function llenarTablaAlumnosParaDocumentacion(licenciatura,semestre,opciones) {
        var datos = {
                        opciones : opciones,
                        licenciatura : licenciatura,
                        semestre : semestre,
                    }

    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/DocumentosAlumnos/datosGralDelAlumno',
        dataType: "json",
        data : (datos),
        success: function (response) {
            $("#tbl_alumnosDocumentacion").DataTable({
                data: response,
                responsive: true,
                columns: [{
                    data: "numero_control",
                },
                {
                    data: "alumno",
                },
                // {
                //     data: "semestre",
                // },
                // {
                //     data: "carrera_descripcion",
                // },
                {
                    // data: "certificado_estudios",
                    orderable: false,
                    searchable: false,
                    "className": "text-center",
                    render : function(data, type, row) {
                        var a = `
                            <a title="Generar Certificado de Estudios" href="DocumentosAlumnos/generaCertificadoEstudios/${row.numero_control}/${row.detalle}/${row.semestre}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                        `;
                         return a;
                    },
                },
                {
                    // data: "nombre_certificado_bachillerato",
                    orderable: false,
                    searchable: false,
                    "className": "text-center",
                    render: function (data, type, row, meta) {
                        var a;
                            var a = `
                            <a title="Generar Boleta Calificaciones" href="DocumentosAlumnos/generaBoletaCalificaciones/${row.numero_control}/${row.semestre}/${row.detalle}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                            `;
                        return a;
                    },
                },
                {
                    // data: "curp",
                    orderable: false,
                    searchable: false,
                    "className": "text-center",
                    render: function (data, type, row, meta) {
                        return  a = `
<a title="Generar Historial Academico" href="DocumentosAlumnos/generaHistAcademico/${row.numero_control}/${row.detalle}/${row.semestre}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                         `;
                    },
                },
                {
                    // data: "curp",
                    orderable: false,
                    searchable: false,
                    "className": "text-center",
                    render: function (data, type, row, meta) {
                        return  a = `
<a title="Generar Horario Alumno" href="DocumentosAlumnos/generaHorarioAlumno/${row.numero_control}/${row.semestre}/${row.detalle}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                         `;
                    },
                },

//                 {
//                     orderable: false,
//                     searchable: false,
//                     render: function (data, type, row, meta) {
//                         return  a = `
// <a title="Generar Constancia Alumno" href="DocumentosAlumnos/generaConstanciaAlumno/${row.numero_control}/${row.detalle}/${row.semestre}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
//                          `;
//                     },
//                 },

                    {
                        orderable: false,
                        searchable: false,
                        "className": "text-center",
                        render: function (data, type, row, meta) {
                          var hayPromedio = `${row.promedio}`;
                          var hayPromedioLetra = `${row.promedio_letra}`;
                          var hayFechaLetra = `${row.fecha_letra}`;
                      // if(hayPromedio != "0" && hayPromedioLetra != "null" && hayFechaLetra != "null"){
                          if(hayPromedio != "0"){

                          var a = `<a title="Agregar Recibo Valido" onclick=modalLetras('${row.numero_control}','${row.detalle}','${row.semestre}','${row.opcion}','${row.carrera}','${row.promedio}')><i class="fas fa-edit iconbig azul fa-2x"></i></a>`;
                        }else {
                            var a = 'No hay promedio';
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


function modalLetras(numero_control, detalle, semestre, opcion, carrera, promedio){
          debugger;

        	 $("#modalConstancia").modal("show");
           document.getElementById("generarConstanciaPDFAlumno").style.display = "none";
          $("#promedioNumeroAlumno").val(promedio);

          $("#numero_control_constancia").val(numero_control);
          $("#detalle_constancia").val(detalle);
          $("#semestre_constancia").val(semestre);
          $("#opcion_constancia").val(opcion);
          $("#carrera_constancia").val(carrera);

      }



    $(document).on("click", "#capturarDatosEnLetraConstancia", function(e){ // ADD DATES FOR REVIBO DE PAGO
    e.preventDefault();
    debugger;

        var datos = {
            id_detalle: $("#detalle_constancia").val(),
            promedio_letra: $("#promedio_letra").val(),
            fecha_letra : $("#fecha_letra").val(),
              }

            if (datos.promedio_letra == "" || datos.fecha_letra == "" ) {
              alert("Los dato son obligatorios...!!!");
              }else{

              $.ajax({
              url: base_url+'Administrativos/DocumentosAlumnos/capturaDatosLetrasConstanciaAlumno',
              type: "post",
              dataType: "json",
              data : (datos),
              success: function(data){
              if (data.responce == "success") {
            toastr["success"](data.message);
                document.getElementById("generarConstanciaPDFAlumno").style.display = "block";
              }else{
              toastr["error"](data.message);
                      }
                    }
                  });
            $("#datesLetraConstancia")[0].reset();  // VACIA MODAL DESPUES DE INSERT
                  }
              });



    function generaConstanciaPdfStuden() {
            // debugger;
                var numero_control = $('#numero_control_constancia').val();
                var detalle        = $("#detalle_constancia").val();
                var semestre       = $("#semestre_constancia").val();
                var opcion         = $("#opcion_constancia").val();
                var carrera        = $("#carrera_constancia").val();

            var url = base_url+"Administrativos/DocumentosAlumnos/generaConstanciaAlumno/" + numero_control + "/" + detalle + "/" + semestre + "/" + opcion + "/" + carrera ;
                window.open(url, "_blank", numero_control);
    }



//            LA ORIGINAL QUE ESTABA ANTES FUNCIONANDO BIEN
// function llenarTablaAlumnosParaDocumentacion() {
//     // debugger;
//     $.ajax({
//         type: "get",
//         url: base_url + 'Administrativos/DocumentosAlumnos/datosGralDelAlumno',
//         dataType: "json",
//         success: function (response) {
//             var i = "1";
//             $("#tbl_alumnosDocumentacion").DataTable({
//                 data: response,
//                 responsive: true,
//                 columns: [{
//                     data: "numero_control",
//                 },
//                 {
//                     data: "alumno",
//                 },
//                 {
//                     data: "semestre",
//                 },
//                 {
//                     data: "carrera_descripcion",
//                 },
//                 {
//                     // data: "certificado_estudios",
//                     orderable: false,
//                     searchable: false,
//                     render : function(data, type, row) {
//                         var a = `
//                             <a title="Generar Certificado de Estudios" href="DocumentosAlumnos/generaCertificadoEstudios/${row.numero_control}/${row.detalle}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
//                         `;
//                          return a;
//                     },
//                 },
//                 {
//                     // data: "nombre_certificado_bachillerato",
//                     orderable: false,
//                     searchable: false,
//                     render: function (data, type, row, meta) {
//                         var a;
//                             var a = `
//                             <a title="Generar Boleta Calificaciones" href="DocumentosAlumnos/generaBoletaCalificaciones/${row.numero_control}/${row.semestre}/${row.detalle}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
//                             `;
//                         return a;
//                     },
//                 },
//                 {
//                     // data: "curp",
//                     orderable: false,
//                     searchable: false,
//                     render: function (data, type, row, meta) {
//
//                         return  a = `
// <a title="Generar Historial Academico" href="DocumentosAlumnos/generaHistAcademico/${row.numero_control}/${row.detalle}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
//                          `;
//
//                     },
//                 },
//                 // {
//                 //     // data: "certificado_medico",
//                 //     orderable: false,
//                 //     searchable: false,
//                 //     render: function (data, type, row, meta) {
//                 //         var nombre_certificado_medico = `${row.nombre_certificado_medico}`;
//                 //         var a;
//                 //           if(nombre_certificado_medico != "null"&&nombre_certificado_medico != "undefined"){
//                 //         var a = `
//                 //                <a title="Descarga Documento" href="Alumnos/verCertificadoMedicoalumno/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
//                 //             `;
//                 //           }
//                 //           else{
//                 //             a = 'Sin archivo';
//                 //         }
//                 //         return a;
//                 //     },
//                 // },
//                 // {
//                 //     orderable: false,
//                 //     searchable: false,
//                 //     data: function (row, type, set) {
//                 //         return `
//                 //                 <a href="#" id="edit_alumno" class="btn btn-success btn-remove" value="${row.numero_control}"><i class="far fa-edit"></i></a>
//                 //                 <a href="#" id="del_alumno" class="btn btn-danger btn-remove" value="${row.numero_control}"><i class="fas fa-trash-alt"></i></a>
//                 //             `;
//                 //     },
//                 // },
//                 {
//                     // data: "curp",
//                     orderable: false,
//                     searchable: false,
//                     render: function (data, type, row, meta) {
//                         return  a = `
// <a title="Generar Horario Alumno" href="DocumentosAlumnos/generaHorarioAlumno/${row.numero_control}/${row.semestre}/${row.detalle}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
//                          `;
//
//                     },
//                 },
//
//                 ],
//                 "language": language_espaniol,
//
//             });
//         },
//     });
// }










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
