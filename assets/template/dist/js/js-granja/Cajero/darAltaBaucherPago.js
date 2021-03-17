    $(document).ready(function(){

     var semestre = $("#semestreAlum").val();
     llenarTablaAvanceReticulaMateriasCursadasPasadas(semestre);


        //SELECCION DE MATERIAS
        horarioyaelegido();
        periodo_activo_horario();
      licenciatura_alumno();
      opcion_alumno();
     semestre_alumno();
     llenartabla_materias_elegidas();
      $("#elegirmaterias").click(function () {

        $("#tbl_elegir_materias").DataTable().destroy();
        llenartablaseleccionmaterias();
    });
            //SELECCION DE MATERIAS

      //litaHistorialPagosAlumnos();
      ccontadordealumnos();

      llenar_comboSemestres();
      llenar_comboSemestres_AnteriosresCursadas();

    llenar_combo_semestres_HistDePagosAlumnos();
    llenar_combo_tipoDePgos_HistDePagosAlumnos();
    llenar_combo_semestres_GenerarDocsAlumnos();



    $("#combo_semestres").change(function () {
      $("#tbl_avanceRetucular").DataTable().destroy();
      llenarTablaAvanceReticula($("#combo_semestres").val());
   });

 $("#combo_semestres_cursados").change(function () {
     $("#tbl_avanceRetucularMateriasCursadas").DataTable().destroy();
     llenarTablaAvanceReticulaMateriasCursadasPasadas($("#combo_semestres_cursados").val());

  });



// Se inicializa tabla
     var tbl = $('#tbl_avanceRetucular').DataTable( {
       });

// EJEMPLO NO #1 PINTAR CELDA TODA  $("#numero_control").val()
      var tabla2 = $('#example22').DataTable( {
          "createdRow": function(row,data,index){
            if (data[0] == 'AMPARO') {
                  $('td',row).eq(0).css({
                    'background-color':'#ff5252',
                    'color':'white',
                  });
            }
          // if (data[2] == 'Tokyo') {
          //       $('td',row).eq(2).css({
          //         'background-color':'green',
          //         'color':'white',
          //       });
          // }
        }
          });

          $("#combo_SemestresGenerarDocumentsAlumnos").change(function () {
            var semestre = $("#combo_SemestresGenerarDocumentsAlumnos").val();
            $("#tbl_generarDocumentsAlumnoTREBWWWW").DataTable().destroy();
            llenarTablaAlumnosParaDocumentacionXXXX(semestre);
           });


          $("#combo_Semestres_HistPagosAlumnos").change(function () {
            var tipoPago = $("#combo_TipoDePagos_HistPagosAlumnos").val();
            var semestre = $("#combo_Semestres_HistPagosAlumnos").val();
            $("#tbl_histPagosRealizadosXAlumno").DataTable().destroy();
            litaHistorialPagosAlumnos(semestre,tipoPago);
           });


           $("#combo_TipoDePagos_HistPagosAlumnos").change(function () {
                var tipoPago = $("#combo_TipoDePagos_HistPagosAlumnos").val();
                var semestre = $("#combo_Semestres_HistPagosAlumnos").val();
            $("#tbl_histPagosRealizadosXAlumno").DataTable().destroy();
            litaHistorialPagosAlumnos(semestre,tipoPago);
            });




    }); // FIN DE LA FUNCION PRINCIPAL


    function llenar_comboSemestres(){
      $.ajax({
          type: "get",
          url: base_url + 'Alumnos/AltaBaucherBanco/obtenerSemestre',
          dataType: "json",
          success: function (data) {
              $.each(data,function(key, registro) {
                  $("#combo_semestres").append('<option value='+registro.semestre+'>'+registro.nombre+'</option>');
                });

        },
      });
    }


    function llenar_comboSemestres_AnteriosresCursadas(){
      $.ajax({
          type: "get",
          url: base_url + 'Alumnos/AltaBaucherBanco/obtenerSemestre',
          dataType: "json",
          success: function (data) {
              $.each(data,function(key, registro) {
                  $("#combo_semestres_cursados").append('<option value='+registro.semestre+'>'+registro.nombre+'</option>');
                });

        },
      });
    }



    function llenar_combo_semestres_HistDePagosAlumnos() {
        $.ajax({
            type: "get",
            url: base_url + 'Profesores/PlaneacionProfesores/obtenersemestres',
            dataType: "json",
            success: function (data) {
                $.each(data, function (key, registro) {
                    $("#combo_Semestres_HistPagosAlumnos").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
                });

            },
        });
    }

    function llenar_combo_semestres_GenerarDocsAlumnos() {
      $.ajax({
          type: "get",
          url: base_url + 'Profesores/PlaneacionProfesores/obtenersemestres',
          dataType: "json",
          success: function (data) {
              $.each(data, function (key, registro) {
                  $("#combo_SemestresGenerarDocumentsAlumnos").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
              });

          },
      });
  }


    function llenar_combo_tipoDePgos_HistDePagosAlumnos() {
        $.ajax({
            type: "get",
            url: base_url + 'Alumnos/AltaBaucherBanco/obtenerTiposDePagosHistPagosAlumnos',
            dataType: "json",
            success: function (data) {
                console.log(data);
                $.each(data, function (key, registro) {
                    $("#combo_TipoDePagos_HistPagosAlumnos").append('<option value=' + registro.id_tipo_pago + '>' + registro.pago + '</option>');
                });
            },
        });
    }




    /* -------------------------------------------------------------------------- */
    /*           llenarTabla materias por cursar sin calificaciones             */
    /* -------------------------------------------------------------------------- */
    function llenarTablaAvanceReticula(semestre) {
      // debugger;
      var datos = {
          numero_control : $("#numero_control").val(),
          id_detalle : $("#detalleId").val(),
          semestre : semestre,
          }
  var url = base_url+'Alumnos/AltaBaucherBanco/consultaAvanceReticulaXAlumnos';

        $.ajax({
            type: "post",
            // url: base_url+'Alumnos/AltaBaucherBanco/consultaHistDePagosXAlumnos/'+datos.numero_control,
        url: url,
            dataType: "json",
            data : (datos),
            success: function(response) {
                $("#tbl_avanceRetucular").DataTable({
                    data: response,
                    responsive: true,
                    columns: [
                      // {
                      //       data: "id_alta_baucher_banco",
                      //       "visible": false, // ocultar la columna
                      //   },
                        {
                          data: "nombre_materia",
                          "className": "text-center",
                                render: function(data, type, row, meta) {
                                   //var aprobado = `${row.calificacion}`;
                                   //validacion(materia,detalle,ciclo,aprobado);
                                   var aprobado = 6;
                                   var materia = `${row.nombre_materia}`;
                                       if (materia != 'null'){
                                          var a = '<div class="p-3 mb-2 bg-info text-white">'+materia+'</div>';
                                       }
                                         //  else if (aprobado >= 6) {
                                         //   var a = '<div class="p-3 mb-2 bg-success text-white">'+materia+'</div>';
                                         // }
                                           else {
                                               // var a = '<div class="p-3 mb-2 bg-red text-white">'+materia+'</div>';
                                             }
                                        return a;
                                   },
                        },

                        // {
                        //     // data: "semestre",
                        //     "rowCallback" : function(data, type, row) {
                        //       var semes= `${row.semestre}`;
                        //     if (semes == '1') {
                        //           $(row).addClass('#FF5252');
                        //     }
                        //     return semes;
                        //     },
                        // },

                    ],
                      "language" : language_espaniol,
                });
            },
        });
    }


    /* -------------------------------------------------------------------------- */
    /*           llenarTabla materias cursadas con calificaciones                 */
    /* -------------------------------------------------------------------------- */
    function llenarTablaAvanceReticulaMateriasCursadasPasadas(semestre) {
      // debugger;
      var datos = {
          numero_control : $("#numero_control").val(),
          id_detalle : $("#detalleId").val(),
          semestre : semestre,
          // semestre : $("#semestreAlum").val(),
          }
  var url = base_url+'Alumnos/AltaBaucherBanco/consultaAvanceReticulaXMateriasCursadas';

        $.ajax({
            type: "post",
            // url: base_url+'Alumnos/AltaBaucherBanco/consultaHistDePagosXAlumnos/'+datos.numero_control,
        url: url,
            dataType: "json",
            data : (datos),
            success: function(response) {
                $("#tbl_avanceRetucularMateriasCursadas").DataTable({
                    data: response,
                    responsive: true,
                    columns: [
                      // {
                      //       data: "id_alta_baucher_banco",
                      //       "visible": false, // ocultar la columna
                      //   },
                        {
                          data: "nombre_materia",
                          "className": "text-center",
                                render: function(data, type, row, meta) {
                                   var aprobado = `${row.calificacion}`;
                                   // var aprobado = 6;
                                   var materia = `${row.nombre_materia}`;
                                       // if (aprobado == 'null'){
                                       //    var a = '<div class="p-3 mb-2 bg-info text-white">'+materia+'</div>';
                                       // }
                                       if (aprobado == 0){
                                          var a = '<div class="p-3 mb-2 bg-yellow text-white">'+materia+'</div>';
                                       }
                                          else if (aprobado >= 6) {
                                           var a = '<div class="p-3 mb-2 bg-success text-white">'+materia+'</div>';
                                         }
                                           else {
                                               var a = '<div class="p-3 mb-2 bg-red text-white">'+materia+'</div>';
                                             }
                                        return a;
                                   },
                        },

                        {
                            data: "calificacion",
                            "className": "text-center",
                                  render: function(data, type, row, meta) {
                                     var aprobado = `${row.calificacion}`;
                                     // var materia = `${row.nombre_materia}`;
                                         if (aprobado == 0){
                                            var a = '<div class="p-3 mb-2 bg-yellow text-white">'+aprobado+'</div>';
                                         }
                                            else if (aprobado >= 6) {
                                             var a = '<div class="p-3 mb-2 bg-success text-white">'+aprobado+'</div>';
                                           }
                                             else {
                                                 var a = '<div class="p-3 mb-2 bg-red text-white">'+aprobado+'</div>';
                                               }
                                          return a;
                                     },
                        },

                    ],
                      "language" : language_espaniol_materias_cursadas,
                });
            },
        });
    }




    /* -------------------------------------------------------------------------- */
    /*                      llenarTablaPagos Records                              */
    /* -------------------------------------------------------------------------- */
    function litaHistorialPagosAlumnos(semestre,tipoPago) {
      // debugger;
      var datos = {
          numero_control : $("#numero_control").val(),
          semestre : semestre,
          tipoPago : tipoPago,
          }
  var url = base_url+'Alumnos/AltaBaucherBanco/consultaHistDePagosXAlumnos/'+datos.numero_control;

        $.ajax({
            type: "post",
        url: url,
            dataType: "json",
            data : (datos),
            success: function(response) {
                $("#tbl_histPagosRealizadosXAlumno").DataTable({
                    data: response,
                    responsive: true,
                    columns: [
                      {
                            data: "id_alta_baucher_banco",
                            "visible": false, // ocultar la columna
                        },
                        {
                            data: "nombre_completo",
                        },
                        {
                            data: "numero_control",
                        },
                        {
                            data: "carrera_descripcion",
                        },
                        {
                            data: "fecha_registro",
                        },
                        {
                            data: "pago",
                        },
                        {
                            data: "archivo",
                            render: function(data, type, row, meta) {
                              //  Se consulta el file.pdf x el no. de control
                                var a = `
                                    <a title="Descarga Baucher" href="AltaBaucherBanco/verBaucher/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                `;
                                return a;
                            },
                        },
                        {
                            // data: "curp",
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return  a = `
        <a title="Generar Horario Alumno" href="AltaBaucherBanco/generaHorarioAlumno/${row.numero_control}/${row.semestre}/${row.id_detalle}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                 `;

                            },
                        },
                        {
                            data: "estado",
                            render: function(data, type, row, meta) {
                              // debugger;
                              var xx = `${row.estatus}`;
                              var estado = `${row.estado}`;
                              // var numeroEstatuFile = `${row.estado_archivo}`;
                              // if(numeroEstatuFile != 6){
                              //   ocultarDatesParcialidades();
                              // }
// var parc = `${row.parcialidades}`;
              // if (parc != 'null') {
                 // llenarDatosAlumTxt(`${row.parcialidades}`,`${row.fecha_limite_de_pago}`,`${row.estado_archivo}`);
              // }else {
              //   ocultarDatesParcialidades();
              // }
                              if(xx == 7){
                                // var a 'background-color', '#A497E5';
                              var a = '<div class="p-3 mb-2 bg-green text-white">'+estado+'</div>';
                              }else {
                                var a = '<div class="p-3 mb-2 bg-red text-white">'+estado+'</div>';
                              }
                          return a;
                              },
                        },
                        {
                            data: "archivo",
                            render: function(data, type, row, meta) {
                              var existeRecibFirmado = `${row.id_recibo_valido}`;
                            if(existeRecibFirmado != "null"){
                                  var a = `<a title="Descarga Recibo de Pago" href="AltaBaucherBanco/verReciboFirmadoValidado/${row.id_recibo_valido}" target="_blank"><i class="far fa-file-pdf fa-2x text-success"></i></a>`;
                            }else {
                              var a = 'No hay recibo';
                            }
                        return a;
                            },
                        },
                        {
                          orderable: false,
                          searchable: false,
                          render: function (data, type, row, meta) {
                              return  a = `
      <a title="Generar Constancia Alumno" href="AltaBaucherBanco/generaConstanciaAlumno/${row.numero_control}/${row.id_detalle}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                               `;
                          },
                      },

                      {
                          data: "parcialidades",
                            "className": "text-center",
                          render: function(data, type, row, meta) {
                            var parcialidadPagorow = `${row.parcialidades}`;
                          if(parcialidadPagorow == "Pago_Completo"){
                                var a = '<div class="p-3 mb-2 bg-green text-white">'+parcialidadPagorow+'</div>';
                                // var a = '<div class="p-3 mb-2 bg-primary  text-white">'+'PAGO COMPLETO'+'</div>';
                          }else if (parcialidadPagorow == "null" || parcialidadPagorow == " ") {
                            // var a = '----';
                            var a = '<div class="p-3 mb-2 text-danger ">'+'----'+'</div>';
                          } else {
                            var a = '<div class="p-3 mb-2 text-white">'+parcialidadPagorow+'</div>';
                          }
                      return a;
                          },
                      },
                      {
                          data: "fecha_limite_de_pago",
                            "className": "text-center",
                          render: function(data, type, row, meta) {
                            var fechaLimitePagorow = `${row.fecha_limite_de_pago}`;
                          if(fechaLimitePagorow == "No Aplica"){
                                var a = '<div class="p-3 mb-2 bg-green text-white">'+fechaLimitePagorow+'</div>';
                          }else if (fechaLimitePagorow == "null" || fechaLimitePagorow == " ") {
                            var a = '<div class="p-3 mb-2 text-danger font-weight-bold">'+'----'+'</div>';
                          }
                          else {
                            var a = '<div class="p-3 mb-2 bg-red text-white">'+fechaLimitePagorow+'</div>';
                          }
                      return a;
                          },
                      },
                    ],
                      "language" : language_espaniol,
                });
            },
        });
    }


function llenarDatosAlumTxt(estadoParcialidad, fecha_limite, estado_archivo){
    if (estadoParcialidad != 'null') {
       // $("#parcialidadPago").val(estadoParcialidad);
        //$("#fechaLimitePago").val(fecha_limite);
        //document.getElementById("divSinDatosParcialidad").style.display = "none";
          document.getElementById("xtre").style.display = "none";
    }

    else if (estado_archivo == 6) {
     // document.getElementById("divSinDatosParcialidad").style.display = "none";
      //document.getElementById("divDatosParcialidad").style.display = "none";
      document.getElementById("xtre").style.display = "block";
    }

    else {
        //document.getElementById("divDatosParcialidad").style.display = "none";
          document.getElementById("xtre").style.display = "none";
        //document.getElementById("divSinDatosParcialidad").style.display = "block";
    }

}
//
// function ocultarDatesParcialidades(){
//   document.getElementById("divSinDatosParcialidad").style.display = "none";
//   // document.getElementById("fechaLimitePago").style.display = "none";
//   // document.getElementById("divSinDatosParcialidad").style.display = "block";
// }


/*         1.-  FUNCTIO CONSULTA QUE NO EXISTA Comprobante PARA EL ALUMNO K SE ESTA LOGUEANDO;
           1.- SI EXISTE BAUCHER LE MUESTRA EL ICONO PARA PODER MOSTRAR EL DOCUMENRO QUE SUIO
           2.- DE LO CONTRARIO SI NO EXISTE EL BAUCHER LE MUESTRA EL FORMULARIO PARA DARLO DE ALTA               ************/

  function ccontadordealumnos(){
      // debugger;
        		var datos = {
        				numero_control : $("#numero_control").val(),
        		    }
        		$.ajax({
              url: base_url+'Alumnos/AltaBaucherBanco/consultaCountAlumnos',
              type: "post",
              dataType: "json",
        			data : (datos),
        			success : function(data){
                if (data.responce == "success") {
                    toastr["success"](data.message);
                        // debugger;
                        // $('#formularioRegistroBaucher').hide();
                        $('#baucherPdf').show();
                      }else{
                        // toastr["error"](data.message);
                        $('#baucherPdf').hide();
                      }
        			    }
        		});
        }


/* -------------------------------------------------------------------------- */
/*                               Insert baucher                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#darAltaBaucher", function(e) {
    e.preventDefault();
    // debugger;

    var numero_control = $("#numero_control").val();
    var img = $("#archivo")[0].files[0]; // this is file
    var tipo_de_pago = $("#pago").val();
    var archivo = $("#archivo")[0].files[0];
    var semestre = $("#semestreAlum").val();

    if (archivo == undefined) {
        alert("No seleccionó el documento a guardar...!");
    } else {
        var fd = new FormData();

        fd.append("numero_control", numero_control);
        fd.append("archivo", img); //Obt principalmente el name file
        fd.append("archivo", archivo); // Obt el file como tal
        fd.append("tipo_de_pago", tipo_de_pago);
        fd.append("estado_archivo", 6);  // 6 => estatyus de "Registro baucher"
        fd.append("semestre", semestre);

        $.ajax({
            type: "post",
            url: base_url+'Alumnos/AltaBaucherBanco/insertarBaucherDelBanco',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype : 'multipart/form-data',
            success: function(response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#formularioaltaBaucher")[0].reset();
                    //  Si se inserto bien el baucher se recarga la pagina
                    location.reload();
                } else {
                    toastr["error"](response.message);
                }
            },
        });
    }
});


//////////////////////////////////////// SELECCIÓN DE MATERIAS ////////////////////////////////////////////////////////
function llenartablaseleccionmaterias() {
  var numero_control = $("#numero_control").val();

  var licenciatura = $("#licenciatura").val();
  var semestre = $("#semestre").val();
  var opcion = $("#opcion").val();
  var fd = new FormData();
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
  fd.append("numero_control", numero_control);
  fd.append("licenciatura", licenciatura);
  fd.append("semestre", semestre);
  fd.append("opcion", opcion);
  fd.append("ciclo", ciclo);

  $.ajax({
      type: "post",
      url: base_url + 'Alumnos/AltaBaucherBanco/materiasparaelegir',
      data: fd,
      processData: false,
      contentType: false,
      dataType: "json",
      enctype : 'multipart/form-data',
      success: function (response) {
          var i = "1";
          $("#tbl_elegir_materias").DataTable({
              data: response,
              responsive: true,
              columns: [
                  {
                      data: "materia",
                      "visible": false,
                      "searchable": false

                  },
                  {
                    data: "alumno",
                    "visible": false,
                    "searchable": false

                  },
                  {
                    data: "id_profe",
                    "visible": false,
                    "searchable": false

                  },
                  {
                      data: "nombre_materia",
                  },
                  {
                      data: "profe",
                  },
                  {
                      data: "carrera",
                  },
                  {
                    data: "opcion",
                  },
                  {
                    data: "semestre",
                  },
                  {
                    data: "ciclo",
                  },
                  {
                    data: "horario",
                  },
                  {
                      orderable: false,
                      searchable: false,
                      data: function (row, type, set) {
                        var concat="";
                        var detalle_materia_ciclo_profe_horario = concat.concat(`${row.alumno}`,'_',`${row.materia}`,'_',`${row.ciclo}`,'_',`${row.id_profe}`,'_',`${row.horario}`);
                          return `
                      <a href="#" id="agregar_materia" class="btn btn-success btn-remove" value="${detalle_materia_ciclo_profe_horario}"><i class="far fa-edit"></i></a>
                              `;
                      },
                  },
              ],
              "language": language_espaniol,
          });
      },
  });
}
function licenciatura_alumno() {
  var numero_control = $("#numero_control").val();
  var fd = new FormData();
  fd.append("numero_control", numero_control);
  $.ajax({
      type: "post",
      url: base_url + 'Alumnos/AltaBaucherBanco/licenciaturadelalumno',
      data: fd,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (data) {
          $("#licenciatura").val(data.post[0].carrera);

      },
  });
}
function opcion_alumno() {
  var numero_control = $("#numero_control").val();
  var fd = new FormData();
  fd.append("numero_control", numero_control);
  $.ajax({
      type: "post",
      url: base_url + 'Alumnos/AltaBaucherBanco/opciondelalumno',
      data: fd,
      processData: false,
      contentType: false,
      dataType: "json",
      success: function (data) {
          $("#opcion").val(data.post[0].opcion);
      },
  });
}
function semestre_alumno() {
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

$(document).on("click", "#agregar_materia", function (e) {
  e.preventDefault();
  var del_id = $(this).attr("value");
  var array = del_id.split('_');
  var detalle = array[0];
  var materia = array[1];
  var ciclo = array[2];
  var profe = array[3];
  var horario = array[4];

  var fd = new FormData();
  fd.append("detalle", detalle);
  fd.append("materia", materia);
  fd.append("estado_profesor", 0);
  fd.append("estado_administrativo", 0);
  fd.append("ciclo", ciclo);
  fd.append("profesor", profe);
  fd.append("horario", horario);


  Swal.fire({
      title: "¿Estás seguro?",
      text: "¡Se agregara la materia a tu horario!",
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
              url: base_url + 'Alumnos/AltaBaucherBanco/agregar_materia',
              data: fd,
              processData: false,
              contentType: false,
              dataType: "json",
              success: function (data) {
                  if (data.responce == "success") {
                      Swal.fire(
                          '¡Exito!',
                          '¡Materia agregada con exito!',
                          'success'
                      );

                      $("#tbl_materias_elegidas").DataTable().destroy();
                      llenartabla_materias_elegidas();
                  }
                  else{
                    Swal.fire(
                      '¡Error!',
                      '¡Materia ya agregada!',
                      'error'
                  );

                  $("#tbl_materias_elegidas").DataTable().destroy();
                  llenartabla_materias_elegidas();
                  }
              },
          });
      }
  });
});
function llenartabla_materias_elegidas() {
  var numero_control = $("#numero_control").val();
  var fd = new FormData();
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
  fd.append("numero_control", numero_control);
  fd.append("ciclo", ciclo);


  $.ajax({
      type: "post",
      url: base_url + 'Alumnos/AltaBaucherBanco/materiaselegidas',
      data: fd,
      processData: false,
      contentType: false,
      dataType: "json",
      enctype : 'multipart/form-data',
      success: function (response) {
          var i = "1";
          $("#tbl_materias_elegidas").DataTable({
              data: response,
              responsive: true,
              columns: [
                  {
                      data: "materia",
                      "visible": false,
                      "searchable": false

                  },
                  {
                    data: "alumno",
                    "visible": false,
                    "searchable": false

                  },
                  {
                    data: "id_profe",
                    "visible": false,
                    "searchable": false

                  },
                  {
                      data: "nombre_materia",
                  },
                  {
                      data: "profe",
                  },
                  {
                      data: "carrera",
                  },
                  {
                    data: "opcion",
                  },
                  {
                    data: "semestre",
                  },
                  {
                    data: "ciclo",
                  },
                  {
                    data: "horario",
                  },
                  {
                      orderable: false,
                      searchable: false,
                      data: function (row, type, set) {
                        var concat="";
                        var detalle_materia_ciclo_profe_horario = concat.concat(`${row.alumno}`,'_',`${row.materia}`,'_',`${row.ciclo}`,'_',`${row.id_profe}`,'_',`${row.horario}`);
                           return `
                      <a href="#" id="remover_materia" class="btn btn-danger btn-remove" value="${detalle_materia_ciclo_profe_horario}"><i class="far fa-edit"></i></a>
                              `;
                      },
                  },
              ],
              "language": language_espaniol,
          });
      },
  });
}
$(document).on("click", "#remover_materia", function (e) {
  e.preventDefault();
  var del_id = $(this).attr("value");
  var array = del_id.split('_');
  var detalle = array[0];
  var materia = array[1];
  var ciclo = array[2];
  var profe = array[3];
  var horario = array[4];

  var fd = new FormData();
  fd.append("detalle", detalle);
  fd.append("materia", materia);
  fd.append("ciclo", ciclo);
  fd.append("profesor", profe);
  fd.append("horario", horario);

  Swal.fire({
      title: "¿Estás seguro?",
      text: "¡Se removera la materia de tu horario!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "¡Si, remover!",
      cancelButtonText: "¡No, cancelar!",
  }).then((result) => {
      if (result.isConfirmed) {
          $.ajax({
              type: "post",
              url: base_url + 'Alumnos/AltaBaucherBanco/removermateria',
              data: fd,
              processData: false,
              contentType: false,
              dataType: "json",
              success: function (data) {
                  if (data.responce == "success") {
                      Swal.fire(
                          '¡Exito!',
                          '¡Materia removida con exito!',
                          'success'
                      );

                      $("#tbl_materias_elegidas").DataTable().destroy();
                      llenartabla_materias_elegidas();
                  }
                  else{
                    Swal.fire(
                      '¡Error!',
                      '¡Materia no removida!',
                      'error'
                  );

                  $("#tbl_materias_elegidas").DataTable().destroy();
                  llenartabla_materias_elegidas();
                  }
              },
          });
      }
  });
});
$(document).on("click", "#confirmar_horario_elegir_materias", function (e) {
    e.preventDefault();
    // debugger;
    var numero_control = $("#numero_control").val();
    var licenciatura = $("#licenciatura").val();
    var semestre = $("#semestre").val();
    var opcion = $("#opcion").val();
    var periodo_escolar = $("#periodo_escolar_activo").val();
    var En_curso = "En curso";

    var fd = new FormData();
    fd.append("alumno", numero_control);
    fd.append("estado", En_curso);
    fd.append("carrera", licenciatura);
    fd.append("cuatrimestre", semestre);
    fd.append("opcion", opcion);
    fd.append("ciclo_escolar", periodo_escolar);

    Swal.fire({
        title: "¿Estás seguro?",
        text: "¡Se asignará el horario seleccionado!",
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
                url: base_url + 'Alumnos/AltaBaucherBanco/alumnoencurso',
                data: fd,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function (data) {
                    if (data.response == "success") {
                        Swal.fire(
                            '¡Exito!',
                            '¡Horario seleccionado con exito!',
                            'success'
                        );

                        window.location.reload();
                    }
                    else{
                      Swal.fire(
                        '¡Error!',
                        '¡No se pudo asignar el horario!',
                        'error'
                    );

                    $("#tbl_materias_elegidas").DataTable().destroy();
                    llenartabla_materias_elegidas();
                    }
                },
            });
        }
    });
  });
function horarioyaelegido(){
    // debugger;
              var datos = {
                      numero_control : $("#numero_control").val(),
                  }
              $.ajax({
            url: base_url+'Alumnos/AltaBaucherBanco/horarioyaseleccionado',
            type: "post",
            dataType: "json",
                  data : (datos),
                  success : function(data){
              if (data.responce == "success") {
                  toastr["success"](data.message);
                      // debugger;
                      $('#SeleccionHorario').hide();
                      $('#HorarioSeleccionado').show();
                    }else{
                      // toastr["error"](data.message);
                      $('#HorarioSeleccionado').hide();
                    }
                      }
              });
      }
      function periodo_activo_horario() {
        // debugger;
        $.ajax({
            type: "get",
            url: base_url + 'Alumnos/AltaBaucherBanco/verperiodo_activo_agregar_horario',
            dataType: "json",
            success: function (response) {
                $("#periodo_escolar_activo").val(response['id_periodo_escolar']);
            },
        });
    }



    function llenarTablaAlumnosParaDocumentacionXXXX(semestre) {
      // debugger;
        var datos = {
                        opciones : $("#opcion_estudio").val(),
                        licenciatura : $("#carreraAlum").val(),
                        numero_control : $("#num_controlAlum").val(),
                        semestre : semestre,
                    }

    $.ajax({
        type: "post",
        url: base_url + 'Alumnos/AltaBaucherBanco/consultaAlumnosPaDocumentos',
        dataType: "json",
        data : (datos),
        success: function (response) {
            $("#tbl_generarDocumentsAlumnoTREBWWWW").DataTable({
                data: response,
                responsive: true,
                columns: [{
                    data: "numero_control",
                      "className": "text-center",
                },
                {
                    data: "alumno",
                      "className": "text-center",
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
                            <a title="Generar Certificado de Estudios" href="AltaBaucherBanco/generaCertificadoEstudios/${row.numero_control}/${row.id_detalle}/${row.semestre}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                        `;
                         return a;
                    },
                },
                // {
                //     // data: "nombre_certificado_bachillerato",
                //     orderable: false,
                //     searchable: false,
                //     "className": "text-center",
                //     render: function (data, type, row, meta) {
                //         var a;
                //             var a = `
                //             <a title="Generar Boleta Calificaciones" href="AltaBaucherBanco/generaBoletaCalificaciones/${row.numero_control}/${row.semestre}/${row.detalle}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                //             `;
                //         return a;
                //     },
                // },
//                 {
//                     // data: "curp",
//                     orderable: false,
//                     searchable: false,
//                     "className": "text-center",
//                     render: function (data, type, row, meta) {
//                         return  a = `
// <a title="Generar Historial Academico" href="AltaBaucherBanco/generaHistAcademico/${row.numero_control}/${row.detalle}/${row.semestre}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
//                          `;
//                     },
//                 },
                {
                    // data: "curp",
                    orderable: false,
                    searchable: false,
                    "className": "text-center",
                    render: function (data, type, row, meta) {
                        return  a = `
<a title="Generar Horario Alumno" href="AltaBaucherBanco/generaHorarioAlumno/${row.numero_control}/${row.semestre}/${row.id_detalle}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                         `;
                    },
                },

//                 {
//                     orderable: false,
//                     searchable: false,
//                     render: function (data, type, row, meta) {
//                         return  a = `
// <a title="Generar Constancia Alumno" href="AltaBaucherBanco/generaConstanciaAlumno/${row.numero_control}/${row.id_detalle}/${row.semestre}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
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
                          if(hayPromedio != "0" && hayPromedioLetra != "null" && hayFechaLetra != "null"){

                          var a = `<a title="Generar Constancia Alumno" href="AltaBaucherBanco/generaConstanciaAlumno/${row.numero_control}/${row.id_detalle}/${row.semestre}/${row.opcion}/${row.carrera}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>`;
                        }else {
                            var a = 'No hay Constancia';
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



    var language_espaniol_materias_cursadas = {
      "lengthMenu": "Mostrar _MENU_ registros por pagina",
      "zeroRecords": "LAS MATERIAS AUN NO HAN SIDO CURSADAS",
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
