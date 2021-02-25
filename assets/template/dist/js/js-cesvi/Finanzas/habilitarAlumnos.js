
  $(document).ready(function(){
        litarAlumnosConBaucherRegistrados();
        date_picker_parcialidad();
        // =============== LLENADO DE COMBOS =================
      llenar_combo_carreras_AltaAlumn_Finanzas();
      llenar_combo_semestres_AltaAlumn_Finanzas();
      llenar_combo_opciones_AltaAlumn_Finanzas();
      llenar_combo_tipoDePgos_AltaAlumn_Finanzas();


      $("#combo_CarreraAltaAlumn_Finanzas").change(function () {
            var tipoPago = $("#combo_TipoDePagosAltaAlumn_Finanzas").val();
            var licenciatura = $("#combo_CarreraAltaAlumn_Finanzas").val();
            var semestre = $("#combo_SemestresAltaAlumn_Finanzas").val();
            var opciones = $("#combo_opcionesAltaAlumn_Finanzas").val();
            $("#tbl_listAlumConBaucher").DataTable().destroy();
            litarAlumnosConBaucherRegistrados(licenciatura,semestre,opciones,tipoPago);
        });

        $("#combo_SemestresAltaAlumn_Finanzas").change(function () {
          var tipoPago = $("#combo_TipoDePagosAltaAlumn_Finanzas").val();
          var licenciatura = $("#combo_CarreraAltaAlumn_Finanzas").val();
          var semestre = $("#combo_SemestresAltaAlumn_Finanzas").val();
          var opciones = $("#combo_opcionesAltaAlumn_Finanzas").val();
          $("#tbl_listAlumConBaucher").DataTable().destroy();
          litarAlumnosConBaucherRegistrados(licenciatura,semestre,opciones,tipoPago);
         });

         $("#combo_opcionesAltaAlumn_Finanzas").change(function () {
             var tipoPago = $("#combo_TipoDePagosAltaAlumn_Finanzas").val();
             var licenciatura = $("#combo_CarreraAltaAlumn_Finanzas").val();
             var semestre = $("#combo_SemestresAltaAlumn_Finanzas").val();
             var opciones = $("#combo_opcionesAltaAlumn_Finanzas").val();
             $("#tbl_listAlumConBaucher").DataTable().destroy();
             litarAlumnosConBaucherRegistrados(licenciatura,semestre,opciones,tipoPago);
          });

          $("#combo_TipoDePagosAltaAlumn_Finanzas").change(function () {
               var tipoPago = $("#combo_TipoDePagosAltaAlumn_Finanzas").val();
               var licenciatura = $("#combo_CarreraAltaAlumn_Finanzas").val();
               var semestre = $("#combo_SemestresAltaAlumn_Finanzas").val();
               var opciones = $("#combo_opcionesAltaAlumn_Finanzas").val();
           $("#tbl_listAlumConBaucher").DataTable().destroy();
           litarAlumnosConBaucherRegistrados(licenciatura,semestre,opciones,tipoPago);
           });


    }); // FIN DE LA FUNCION PRINCIPAL



    function llenar_combo_opciones_AltaAlumn_Finanzas() {
        $.ajax({
            type: "get",
            url: base_url + 'Profesores/PlaneacionProfesores/obteneropciones',
            dataType: "json",
            success: function (data) {
                $.each(data, function (key, registro) {
                    $("#combo_opcionesAltaAlumn_Finanzas").append('<option value=' + registro.id_opcion + '>' + registro.descripcion + '</option>');
                });
            },
        });
    }


    function llenar_combo_semestres_AltaAlumn_Finanzas() {
        $.ajax({
            type: "get",
            url: base_url + 'Profesores/PlaneacionProfesores/obtenersemestres',
            dataType: "json",
            success: function (data) {
                $.each(data, function (key, registro) {
                    $("#combo_SemestresAltaAlumn_Finanzas").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
                });

            },
        });
    }



    function llenar_combo_carreras_AltaAlumn_Finanzas() {
        $.ajax({
            type: "get",
            url: base_url + 'Profesores/PlaneacionProfesores/obtenercarreras',
            dataType: "json",
            success: function (data) {
                console.log(data);
                $.each(data, function (key, registro) {
                    $("#combo_CarreraAltaAlumn_Finanzas").append('<option value=' + registro.id_carrera + '>' + registro.carrera_descripcion + '</option>');
                });
            },
        });
    }


        function llenar_combo_tipoDePgos_AltaAlumn_Finanzas() {
            $.ajax({
                type: "get",
                url: base_url + 'Finanzas/HabilitarAlumnos/obtenerTiposDePagos',
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    $.each(data, function (key, registro) {
                        $("#combo_TipoDePagosAltaAlumn_Finanzas").append('<option value=' + registro.id_tipo_pago + '>' + registro.pago + '</option>');
                    });
                },
            });
        }





function ocultartxt(){
  document.getElementById("formPagoCompleto").style.display = "none";
  document.getElementById("formParcialidad2").style.display = "none";
}


function Mostrar_Parcialidad(){
  document.getElementById("formParcialidad2").style.display = "block";
  document.getElementById("formPagoCompleto").style.display = "none";
    $("#parcial_pagoCompleto").val(" ");
      $("#datepicker_fecha_pagoCompleto").val(" ");
}


function Mostrar_PagoCompleto(){
  document.getElementById("formPagoCompleto").style.display = "block";
  document.getElementById("formParcialidad2").style.display = "none";
  $("#parcial_pagoCompleto").val("Pago_Completo");
    $("#datepicker_fecha_pagoCompleto").val("No Aplica");
}



    // LISTADO DE LA TABLA ALUMOS PARA HABILTAR DAR ACCESO A SU RECIBO Y ELEHIR MATERIAS
      /* -------------------------------------------------------------------------- */
      /*                      llenarTablaPagos Records                              */
      /* -------------------------------------------------------------------------- */
      function litarAlumnosConBaucherRegistrados(licenciatura,semestre,opciones,tipoPago) {
         console.log("Lista de alumnos con baucher...!");
          // debugger;
          var datos = {
               semestre : semestre,
               opciones : opciones,
               licenciatura : licenciatura,
               tipoPago : tipoPago,
              }
              // var url = base_url+'Finanzas/HabilitarAlumnos/listaDeAlumnosConBaucherRegistrado/'+datos.tipoPago;
              var url = base_url+'Finanzas/HabilitarAlumnos/listaDeAlumnosConBaucherRegistrado';

          $.ajax({
              type: "post",
              // url: base_url+'Finanzas/HabilitarAlumnos/listaDeAlumnosConBaucherRegistrado',
              url: url,
              dataType: "json",
              data : (datos),
              success: function(response) {
                  var i = "1";
                  $("#tbl_listAlumConBaucher").DataTable({
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
                              data: "carrera_descripcion",
                          },
                          {
                              data: "numero_control",
                          },
                          {
                              data: "fecha_registro",
                          },

    // 1.- el baucher k el alumnos registra
                          // {
                          //     data: "archivo",
                          //     render: function(data, type, row, meta) {
                          //       //  Se consulta el file.pdf x el no. de control
                          //         var a = `
                          //             <a title="Descarga Baucher" href="verBaucher/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                          //         `;
                          //         return a;
                          //     },
                          // },

                          {
                        //   Es el estatus de la tabla de alumnos
                              data: "estatus",
                              orderable: false,
                              searchable: false,
                              "render" : function(data, type, row) {
                                var habilitarAlumno = `${row.estatus}`;
                        // var espera = 'En_espera_de_materias';
                                var string = '<input type="checkbox" ';
                                if(habilitarAlumno == 1){
                                 // string = string + `checked onclick=habilitaRegistroFinanzas(0,'${row.numero_control}','${row.id_alta_baucher_banco}','Inicio_inscripcion','${row.semestre}')>`;
                                // string = string + `checked>`;
                              string= "¡Horario ya asignado!" ;
                              }else {
                                  string = string +`onclick=habilitaRegistroFinanzas(1,'${row.numero_control}','En_curso','${row.id_detalle}')>`;
                                }
                                return string;
			                         },
                          },

// DEBE ESTAR disabled , ASTA K SE ACTIVE EL CHECK DE DAR ACCESO AL ALUMNO  SE DEBE DE ACTIVE ESTE CHECK PARA GENERAR EL RECIVO PDF
      //  2.- el recibo k se genera to alumno
                          // {
                          //     data: "cantidad",
                          //     orderable: false,
                          //     searchable: false,
                          //     "render" : function(data, type, row) {
                          //       var hayCantidad = `${row.cantidad}`;
                          //       var hayDescConcepto = `${row.desc_concepto}`;
                          //       // debugger;
                          //           if(hayCantidad != "null" && hayDescConcepto!= "null"){
                          //             var a = `
                          //                 <a title="Descarga Recibo" href="generaPdfRcibo/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                          //             `;
                          //             // var a = `
                          //             //     <a title="Descarga Recibo" onclick=mostrarDocumento('${row.numero_control}')><i class="far fa-file-pdf fa-2x"></i></a>
                          //             // `;
                          //           }else {
                          //             var a = 'No hay recibo';
                          //           }
                          //         return a;
                          //      },
                          // },

        //  3.- si esta mal el baucher k ingresa el alumno
                            // {
                            //     orderable: false,
                            //     searchable: false,
                            //     "render" : function(data, type, row) {
                            //         return `
                            //         <button type='button' class="btn btn-danger" onclick=noAplicaRegistro('${row.numero_control}','${row.id_alta_baucher_banco}')>No Aplica</button>
                            //         `;
                            //     },
                            // },

          // 4.-  recibo firmado y sellado x la institucion
//                             {
//                                 orderable: false,
//                                 searchable: false,
//                                 "render" : function(data, type, row) {
// var a = `
//     <a title="Agregar Recibo Valido" onclick=recuperarDocumentos('${row.numero_control}','${row.id_alta_baucher_banco}','${row.id_recibo}')><i class="fa fa-upload iconbig azul fa-2x"></i></a>
// `;
// return a;
//
//                                 },
//                             },
                            // {
                            //     data: "parcialidad_pago",
                            //     render: function(data, type, row, meta) {
                            //       var parcialidadPagorow = `${row.parcialidad_pago}`;
                            //     if(parcialidadPagorow != "null"){
                            //           var a = '<div class="p-3 mb-2 bg-primary  text-white">'+'PAGO COMPLETO'+'</div>';
                            //     }else {
                            //       var a = '----';
                            //     }
                            // return a;
                            //     },
                            // },
                            // {
                            //     data: "fecha_limite_pago",
                            //     render: function(data, type, row, meta) {
                            //       var fechaLimitePagorow = `${row.fecha_limite_pago}`;
                            //     if(fechaLimitePagorow != "null"){
                            //           var a = '<div class="p-3 mb-2 bg-red text-white">'+fechaLimitePagorow+'</div>';
                            //     }else {
                            //       var a = '----';
                            //     }
                            // return a;
                            //     },
                            // },
                            {
                                orderable: false,
                                searchable: false,
                                  "className": "text-center",
                                "render" : function(data, type, row) {
// var a = `<a title="Agregar Recibo Valido" onclick=recuperarDocumentos('${row.numero_control}','${row.id_alta_baucher_banco}','${row.id_recibo}')><i class="fa fa-upload iconbig azul fa-2x"></i></a>`;   <i class="fas fa-history"></i>
var a = `<a title="Agregar Recibo Valido" onclick=modalHistorialParcialidades('${row.numero_control}','${row.id_alta_baucher_banco}','${row.semestre}','${row.tipo_de_pago}')><i class="fas fa-history iconbig azul fa-2x"></i></a>`
return a;

                                },
                            },

                      ],
                        "language" : language_espaniol,
                  });
              },
          });
      }



      /* -------------------------------------------------------------------------- */
      /*         llenarTabla Historial de pagos x parcialidades                     */
      /* -------------------------------------------------------------------------- */
      function litaHistorialParcialidadXAlumnos() {
        debugger;
        var datos = {
            numero_control : $("#numero_controlHistorialParc").val(),
            id_alta_baucher_banco : $("#id_alta_baucher_bancoHistorialParc").val(),
            semestre : $("#semestreHistorialParc").val(),
            tipoPago : $("#tipo_de_pagoHistorialParc").val(),
            }
    var url = base_url+'Alumnos/AltaBaucherBanco/consultaHistDePagosXAlumnos/'+datos.numero_control;

          $.ajax({
              type: "post",
          url: url,
              dataType: "json",
              data : (datos),
              success: function(response) {
                  $("#tbl_listaHistPagosParcialidad").DataTable({
                      data: response,
                      responsive: true,
                      columns: [
                        // {
                        //       data: "id_alta_baucher_banco",
                        //       "visible": false, // ocultar la columna
                        //   },

                        {
                              data: "archivo",
                              "className": "text-center",
                              render: function(data, type, row, meta) {
                                //  Se consulta el file.pdf x el no. de control
                                  var a = `
                                      <a title="Descarga Baucher" href="HabilitarAlumnos/verBaucher/${row.numero_control}/${row.id_alta_baucher_banco}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                  `;
                                  return a;
                              },
                          },

                        {
                            // data: "estado_archivo",
                            "className": "text-center",
                            orderable: false,
                            searchable: false,
                            "render" : function(data, type, row) {
                              var validarArchivo = `${row.estado_archivo}`;
                              var string = '<input type="checkbox" id="check_id" ';
                              if(validarArchivo != 6){
  string = string + `checked onclick=habilitarValidoComprobantePagoAlumno(6,'${row.numero_control}','${row.id_alta_baucher_banco}','${row.semestre}','${row.pagorecibo}')>`;
                              }else {
  string = string +`onclick=habilitarValidoComprobantePagoAlumno(7,'${row.numero_control}','${row.id_alta_baucher_banco}','${row.semestre}','${row.pagorecibo}')>`;
                              }
                              return string;
                             },
                        },
                          {
                              orderable: false,
                              searchable: false,
                                "className": "text-center",
                              "render" : function(data, type, row) {
                                  var comprobanteValido = `${row.parcialidades}`;
                                    if(comprobanteValido == "null" || comprobanteValido == " "){
                                        var a = '<div class="p-3 mb-2 text-danger">'+'Validar Comprobante'+'</div>';
                                      }else {
  var a = `<a title="Capturar datos Recibo de pago" onclick=modalCapturaDatosRecibo('${row.id_alta_baucher_banco}')><i class="fas fa-edit iconbig azul fa-2x"></i></a>`
                                              }
return a;

                              },
                          },
                          {
                              data: "cantidad",
                              orderable: false,
                              searchable: false,
                              "className": "text-center",
                              "render" : function(data, type, row) {
                                var hayCantidad = `${row.cantidad}`;
                                var hayDescConcepto = `${row.desc_concepto}`;
                                // debugger;
                                    if(hayCantidad != "null" && hayDescConcepto!= "null"){
                                      var a = `
                                          <a title="Descarga Recibo" href="HabilitarAlumnos/generaPdfRcibo/${row.numero_control}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                      `;
                                      // var a = `
                                      //     <a title="Descarga Recibo" onclick=mostrarDocumento('${row.numero_control}')><i class="far fa-file-pdf fa-2x"></i></a>
                                      // `;
                                    }else {
                                      var a = 'No hay recibo';
                                    }
                                  return a;
                               },
                          },
                          {
                            data: "pago_total_a_pagar",

                       },
                           {
                               data: "cantidad",
                          },

                       {
                        data: "restante",
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
                          {
                                orderable: false,
                                searchable: false,
                                "render" : function(data, type, row) {
                                    return `
                                    <button type='button' class="btn btn-danger" onclick=noAplicaRegistro('${row.numero_control}','${row.id_alta_baucher_banco}')>No Aplica</button>
                                    `;
                                },
                            },
                            {
                              orderable: false,
                              searchable: false,
                              "className": "text-center",
                              "render" : function(data, type, row) {
                                var a = `
                                <a title="Agregar Recibo Valido" onclick=recuperarDocumentos('${row.numero_control}','${row.id_alta_baucher_banco}','${row.id_recibo}')><i class="fa fa-upload iconbig azul fa-2x"></i></a>`;
                                return a;

                              },
                          },
                      ],
                        "language" : language_espaniol,
                  });
              },
          });
      }


      function habilitarValidoComprobantePagoAlumno(estado_archivo, numero_control, id_alta_baucher_banco, semestre, pagorecibo){
          debugger;
            		var datos = {
                    estado_archivo : estado_archivo,
            				numero_control : numero_control,
                    pagorecibo: pagorecibo,
                    id_alta_baucher_banco: id_alta_baucher_banco,
                    semestre :semestre,
            		}

            		$.ajax({
            			url: base_url+'Finanzas/HabilitarAlumnos/marcarParaValidarComprobantePago',
                  type: "post",
                  dataType: "json",
            			data : (datos),
            			success : function(data){
                    if (data.responce == "success") {
                          // if (estatus == 0) {  // SI SE DESABILITA SE CARGA LA PAGINA PARA K NO SE INSERTE DOBLE LA INORMACION
                          //   // alert("estra en el reload");
                          //     location.reload();
                          // }
                // toastr["success"](response.message);
                toastr["success"](data.message);
                $('#tbl_listaHistPagosParcialidad').DataTable().destroy();
                litaHistorialParcialidadXAlumnos();
                   validarBaucherPagoAlumno(id_alta_baucher_banco, numero_control, estado_archivo, semestre);
                    }else{
                      toastr["error"](data.message);
                    }
            			}
            		});
            }




      function mostrarDocumento(numero_control) {
        debugger;
          	// var idProyectoAnexo = $('#idProyectoAnexo').val();
// var url = base_url+'Finanzas/HabilitarAlumnos/listaDeAlumnosConBaucherRegistrado/'+datos.tipoPago;
   var url = base_url+"Finanzas/HabilitarAlumnos/generaPdfRcibo/" + numero_control + ".html";
          	window.open(url, "_blank", numero_control);
      }



function modalCapturaDatosRecibo(id_alta_baucher_banco){
    debugger;
    // $('#mensajeErrorDoc').hide();
    // $('#mensaje').hide();
    // $('#modalDocumento').find('input[type="file"]').val('');

    $("#addDatosRecibo").modal("show");
    //$('#modalHistorialDeParcialidadesXAlumno').modal('hide');
    // $("#numero_controlVarHide").val(numero_control);
    $("#id_alta_baucher_bancoDatesRecibo").val(id_alta_baucher_banco);

    // $("#id_reciboVarHide").val(id_recibo);
    // llenarTablaDeDocumentosFirmados();
}



    function recuperarDocumentos(numero_control, id_alta_baucher_banco,id_recibo){
    		debugger;
    		// $('#mensajeErrorDoc').hide();
    		// $('#mensaje').hide();
    		// $('#modalDocumento').find('input[type="file"]').val('');

    		$("#modalDocumento").modal("show");
        $('#modalHistorialDeParcialidadesXAlumno').modal('hide');
    		$("#numero_controlVarHide").val(numero_control);
    		$("#id_alta_baucher_bancoVarHide").val(id_alta_baucher_banco);
    		$("#id_reciboVarHide").val(id_recibo);

        $("#tbl_listaRecibosFirmados").DataTable().destroy();
    		llenarTablaDeDocumentosFirmados();
    }



        function modalHistorialParcialidades(numero_control, id_alta_baucher_banco,semestre, tipo_de_pago){
        		debugger;
        		// $('#mensajeErrorDoc').hide();
        		// $('#mensaje').hide();
        		// $('#modalDocumento').find('input[type="file"]').val('');

        	//	$("#modalHistorialDeParcialidadesXAlumno").modal("show");
        		$("#numero_controlHistorialParc").val(numero_control);
        		$("#id_alta_baucher_bancoHistorialParc").val(id_alta_baucher_banco);
        		$("#semestreHistorialParc").val(semestre);
            $("#tipo_de_pagoHistorialParc").val(tipo_de_pago);
                $("#tbl_listaHistPagosParcialidad").DataTable().destroy();
            		litaHistorialParcialidadXAlumnos();
        }


    function llenarTablaDeDocumentosFirmados() {
       console.log("Lista de los recibos firmados de cada alumno...!");
        debugger;
        $.ajax({
            type: "get",
            url: base_url+'Finanzas/HabilitarAlumnos/verRecibosFirmados',
            dataType: "json",
            success: function(response) {
                var i = "1";
                $("#tbl_listaRecibosFirmados").DataTable({
                    data: response,
                    responsive: true,
                    columns: [
                      {
                            data: "id_recibo_valido",
                            // "visible": false,
                            // "searchable": false
                        },
                        {
                            data: "nombre_archivo",
                        },
                        {
                            data: "archivo",
                            render: function(data, type, row, meta) {
                              var namePdf = `${row.nombre_archivo}`;
                                      if(namePdf != "null"){
                              							$('#archivoPDF').hide();
                              							$('#altaReciboValidado').attr('disabled','disabled');
                              						}
                                return a = `
                      <a title="Descarga Baucher" href="HabilitarAlumnos/verReciboFirmado/${row.id_recibo_valido}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
                                `;
                            },
                        },
                        {
                            orderable: false,
                            searchable: false,
                            data: function (row, type, set) {
                                return `
                <a class="btn btn-danger btn-remove" onclick=deleteRecFirmado('${row.id_recibo_valido}')><i class="fas fa-trash-alt"></i></a>
                                     `;
                            },
                        },
                    ],
                      "language" : language_espaniol,
                });
            },
        });
    }



    function deleteRecFirmado(id_recibo_valido){
        debugger;

              const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                  confirmButton: 'btn btn-success',
                  cancelButton: 'btn btn-danger mr-2'
                },
                buttonsStyling: false
              })

              swalWithBootstrapButtons.fire({
                title: 'Esta seguro de borrar el recibo firmado del alumno...?',
                text: "!Esta acción es irreversile!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, bórralo!',
                cancelButtonText: 'No, cancelar!',
                reverseButtons: true
              }).then((result) => {
                if (result.value) {

                    $.ajax({
                     url: base_url+'Finanzas/HabilitarAlumnos/eliminarReciboFirmadoAlum',
                      type: "post",
                      dataType: "json",
                      data: {
                        id_recibo_valido: id_recibo_valido
                      },
                      success: function(data){
                        if (data.responce == "success") {
                            swalWithBootstrapButtons.fire(
                              '¡Eliminado!',
                              'Su archivo ha sido eliminado.!',
                              'success'
                            );
                            $('#tbl_listaRecibosFirmados').DataTable().destroy();
                            llenarTablaDeDocumentosFirmados();
                            $('#archivoPDF').show();
                            $('#altaReciboValidado').removeAttr('disabled');
                        }else{
                            swalWithBootstrapButtons.fire(
                              '¡Eliminado',
                              'El registro no se elimino...!',
                              'error'
                            );
                        }
                      }
                    });

                } else if (
                  /* Read more about handling dismissals below */
                  result.dismiss === Swal.DismissReason.cancel
                ) {
                  swalWithBootstrapButtons.fire(
                    'Cancelada',
                    'El registro no se elimino...!',
                    'error'
                  )
                }
              });

          }



    /* -------------------------------------------------------------------------- */
    /*            DAR DE ALTA EL RECIBO DE PAGO FIRMADO Y SELLADO                 */
    /* -------------------------------------------------------------------------- */
    $(document).on("click", "#altaReciboValidado", function(e) {
        e.preventDefault();
        // debugger;

        var id_recibo = $("#id_reciboVarHide").val();
        var img = $("#archivo")[0].files[0]; // this is file
        var archivo = $("#archivo")[0].files[0];
        var usuario_alta = $("#userAlta").val();

        if (archivo == undefined) {
            alert("No seleccionó el documento a guardar...!");
        } else {
            var fd = new FormData();

            fd.append("id_recibo", id_recibo);
            fd.append("archivo", img); //Obt principalmente el name file
            fd.append("archivo", archivo); // Obt el file como tal
            fd.append("usuario_alta", usuario_alta);

            $.ajax({
                type: "post",
                url: base_url+'Finanzas/HabilitarAlumnos/agregarReciboFirmado',
                data: fd,
                processData: false,
                contentType: false,
                dataType: "json",
                enctype : 'multipart/form-data',
                success: function(response) {
                    if (response.res == "success") {
                        toastr["success"](response.message);
                        $('#tbl_listaRecibosFirmados').DataTable().destroy();
                        llenarTablaDeDocumentosFirmados();
			    	            $('#archivoPDF').hide();
                    } else {
                        toastr["error"](response.message);
                    }
                },
            });
        }
    });



      function noAplicaRegistro(numero_control, id_alta_baucher_banco){
          // debugger;
                var datos = {
                    numero_control : numero_control,
                    id_alta_baucher_banco : id_alta_baucher_banco
                }

                const swalWithBootstrapButtons = Swal.mixin({
                  customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger mr-2'
                  },
                  buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                  title: 'Esta seguro de borrar el baucher del alumno...?',
                  text: "!Esta acción es irreversile!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Si, bórralo!',
                  cancelButtonText: 'No, cancelar!',
                  reverseButtons: true
                }).then((result) => {
                  if (result.value) {

                      $.ajax({
                        // url: base_url+'mantenimiento/RegistroPagos/eliminar',
                           url: base_url+'Finanzas/HabilitarAlumnos/eliminarAllRegistro',
                        type: "post",
                        dataType: "json",
                        data: {
                          numero_control: numero_control,
                          id_alta_baucher_banco : id_alta_baucher_banco
                        },
                        success: function(data){
                          if (data.responce == "success") {
                              swalWithBootstrapButtons.fire(
                                '¡Eliminado!',
                                'Su archivo ha sido eliminado.!',
                                'success'
                              );
                              $('#tbl_listaHistPagosParcialidad').DataTable().destroy();
                              litaHistorialParcialidadXAlumnos();
                          }else{
                              swalWithBootstrapButtons.fire(
                                '¡Eliminado',
                                'El registro no se elimino...!',
                                'error'
                              );
                          }
                        }
                      });

                  } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                  ) {
                    swalWithBootstrapButtons.fire(
                      'Cancelada',
                      'El registro no se elimino...!',
                      'error'
                    )
                  }
                });

            }




// SOLO SE VA HABILITAR CUANDO ESTE DESHABILITADO, UNA VEZ K SE ABILITE SE DESBLOKEA
function habilitaRegistroFinanzas(estatus, numero_control,estado,detalle){
    debugger;

    var licenciatura = $("#combo_CarreraAltaAlumn_Finanzas").val();
    var semestre = $("#combo_SemestresAltaAlumn_Finanzas").val();
    var opciones = $("#combo_opcionesAltaAlumn_Finanzas").val();
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
      		var datos = {
      				numero_control : numero_control,
              estatus: estatus,
              estado : estado,
              licenciatura: licenciatura,
              opcion_estudio: opciones,
              semestre: semestre,
              ciclo:ciclo,
              detalle:detalle
      		}

      		$.ajax({
      			url: base_url+'Finanzas/HabilitarAlumnos/marcarParaRegistro',
            type: "post",
            dataType: "json",
      			data : (datos),
      			success : function(data){
              if (data.responce == "success") {
          toastr["success"](data.message);
        /*
          $("#tbl_listAlumConBaucher").DataTable().destroy();
          debugger;
          var tipoPago = $("#combo_TipoDePagosAltaAlumn_Finanzas").val();
          var licenciatura = $("#combo_CarreraAltaAlumn_Finanzas").val();
          var semestre = $("#combo_SemestresAltaAlumn_Finanzas").val();
          var opciones = $("#combo_opcionesAltaAlumn_Finanzas").val();
          $("#tbl_listAlumConBaucher").DataTable().destroy();
          litarAlumnosConBaucherRegistrados(licenciatura,semestre,opciones,tipoPago);
        */
          asignacion_masiva_de_alumnos(datos);
          // addDatoParaReciboPagoAlumno(id_alta_baucher_banco, numero_control, estatus);
        // validarBaucherPagoAlumno(id_alta_baucher_banco, numero_control, estatus, semestre);   // =========>>>>>  1.- ISAUL Se movio
              }else{
                toastr["error"](data.message);
              }
      			}
      		});
      }

 function asignacion_masiva_de_alumnos(datos){
            $.ajax({
              url: base_url+'Finanzas/HabilitarAlumnos/asignacion_masiva_de_alumnos',
              type: "post",
              dataType: "json",
              data : (datos),
              success : function(data){
                if (data.responce == "success") {
                    toastr["success"](data.message);
                    alert("es¿xit")
                    $("#tbl_listAlumConBaucher").DataTable().destroy();
                    var tipoPago = $("#combo_TipoDePagosAltaAlumn_Finanzas").val();
                    var licenciatura = $("#combo_CarreraAltaAlumn_Finanzas").val();
                    var semestre = $("#combo_SemestresAltaAlumn_Finanzas").val();
                    var opciones = $("#combo_opcionesAltaAlumn_Finanzas").val();
                    $("#tbl_listAlumConBaucher").DataTable().destroy();
                    litarAlumnosConBaucherRegistrados(licenciatura,semestre,opciones,tipoPago);
                }else{
                  toastr["error"](data.message);
                }
              }
            });
          }






            // SE RECOGEN LOS DATOS PARA PODER GENERAR EL RECIBO DE PAGO SIN FIRMA NI SELLO  onClick="eliminarRegistroGasto()"
        function validarBaucherPagoAlumno(id_alta_baucher_banco, numero_control, estado_archivo, semestre){
            debugger;

            if(estado_archivo == 7){  // si habilitan debe mostrar modal si es DESHABILITADO no debe mostrarse

            	$('#validacionBaucherParcialOpagoCompleto').modal({show: true}); // abrir modal al execute la function
              $('#modalHistorialDeParcialidadesXAlumno').modal('hide');
              ocultartxt();
              }

          // Aki solo se imprime al num de control no pude inprimir los demas datos x problemas de los espacios
        $("#numero_con").val(numero_control); // DATO K SE MUESTRA EN EL TXT DEL MODAL

        $(document).on("click", "#validarComprobanteDePago", function(e){ // ADD DATES FOR REVIBO DE PAGO
        e.preventDefault();
        debugger;
        // Se recojern los valores en la variable datos
        var pagoComple = $("#parcial_pagoCompleto").val();
        var parcialid = $("#pago").val();
if (pagoComple == "Pago_Completo") {

  var datos = {
  id_alta_baucher_banco: id_alta_baucher_banco,
  // tipo_de_pago : $("#pago").val(),
  parcialidades: $("#parcial_pagoCompleto").val(),
  fecha_limite_de_pago : $("#datepicker_fecha_pagoCompleto").val(),
              }

} else if (parcialid != " ") {

  var datos = {
  id_alta_baucher_banco: id_alta_baucher_banco,
  // tipo_de_pago : $("#pago").val(),
  // desc_concepto : $("#concepto").val(),
  // cantidad : $("#cantidad").val(),
  // importe_letra : $("#numletra").val()+" PESOS 00/100 M.N", parcial_pagoCompleto
  // usuario_creacion : $("#username").val(),
  parcialidades: $("#parcial").val(),
  // parcialidades: $("#parcial_pagoCompleto").val(),
  fecha_limite_de_pago : $("#datepicker_fecha_parcialidad").val(),
  // fecha_limite_de_pago : $("#datepicker_fecha_pagoCompleto").val(),
              }

}




      // if (datos.tipo_de_pago == "" || datos.parcialidades == "" || datos.fecha_limite_de_pago == "") {
      if (datos.parcialidades == "" ) {
        alert("Los dato son obligatorios...!!!");
        }else{

        $.ajax({           // eAlumnosConBaucherRegistrado/'+datos.tipoPago;
        url: base_url+'Finanzas/HabilitarAlumnos/validacionComprobanteDePago',
        type: "post",
        dataType: "json",
        data : (datos),
        success: function(data){
        if (data.responce == "success") {
        $('#tbl_listaHistPagosParcialidad').DataTable().destroy();
        litaHistorialParcialidadXAlumnos();
      toastr["success"](data.message);

        $('#validacionBaucherParcialOpagoCompleto').modal('hide');
       // $('#modalHistorialDeParcialidadesXAlumno').modal('show');
        }else{
        toastr["error"](data.message);
                }
              }
            });
      $("#addRecordFormParcialidad")[0].reset();  // VACIA MODAL DESPUES DE INSERT
            }
        });

        }



        $(document).on("click", "#regresarModAnteriorValidacion", function (e) {

          $('#validacionBaucherParcialOpagoCompleto').modal('hide');
          //$('#modalHistorialDeParcialidadesXAlumno').modal('show');

        });

        $("#cantidad").on("keyup",  function(e){
          var restante =   parseInt($('#cantidad_total_a_pagar').val())-parseInt($('#cantidad').val());
          var cantidad = parseInt($('#cantidad').val());
          var total = parseInt($('#cantidad_total_a_pagar').val());
          if(cantidad>total ){
            $('#restante').val("¡La cantidad a pagar es mayor al total!");
$("#addDatosAGenerarReciboPago").prop('disabled', true);
          }
          else{

            $('#restante').val(restante);
            $("#addDatosAGenerarReciboPago").prop('disabled', false);
          }

        });


      // SE RECOGEN LOS DATOS PARA PODER GENERAR EL RECIBO DE PAGO SIN FIRMA NI SELLO  DATOS DEL RECIBO DE PAGO A GENERAR
//       function addDatoParaReciboPagoAlumno(id_alta_baucher_banco, numero_control, estatus){
//           debugger;
//
//               if(estatus == 1){  // si habilitan debe mostrar modal si es DESHABILITADO no debe mostrarse
//               	$('#addDatosRecibo').modal({show: true}); // abrir modal al execute la function
// // ocultartxt();
//
//               }
//
//               // Aki solo se imprime al num de control no pude inprimir los demas datos x problemas de los espacios
//               $("#numero_con").val(numero_control); // DATO K SE MUESTRA EN EL TXT DEL MODAL

              $(document).on("click", "#addDatosAGenerarReciboPago", function(e){ // ADD DATES FOR REVIBO DE PAGO
                e.preventDefault();
                debugger;
                // Se recojern los valores en la variable datos

              var datos = {
                  // bauche: id_alta_baucher_banco,
                  bauche : $("#id_alta_baucher_bancoDatesRecibo").val(),
                  desc_concepto : $("#concepto").val(),
                  cantidad : $("#cantidad").val(),
                  importe_letra : $("#numletra").val()+" PESOS 00/100 M.N",
                  usuario_creacion : $("#username").val(),
                   restante : $("#restante").val(),
                   pago_total_a_pagar : $("#cantidad_total_a_pagar").val(),
              }

              if (datos.desc_concepto == "" || datos.cantidad == "" || datos.importe_letra == "") {
                alert("Los dato del recibo son obligatorios...!!!");
              }else{

                $.ajax({
                  url: base_url+'Finanzas/HabilitarAlumnos/registroDatosParaGenerarReciboPago',
                  type: "post",
                  dataType: "json",
                  data : (datos),
                  success: function(data){
                    if (data.responce == "success") {
                        $("#tbl_listaHistPagosParcialidad").DataTable().destroy();
                        litaHistorialParcialidadXAlumnos();
                      toastr["success"](data.message);
                      $("#formAddDatesRecibodePago")[0].reset();   // SE RESETEA EL FORMULARIO DE LOS CAMPOS
                      $('#addDatosRecibo').modal('hide');
                      //$('#modalHistorialDeParcialidadesXAlumno').modal('show');
                    }else{
                      toastr["error"](data.message);
                    }
                  }
                });
                // $("#form")[0].reset();  // VACIA MODAL DESPUES DE INSERT
              }
                });

            // }


$(document).on("click", "#regresarModAnterior", function (e) {

  $('#addDatosRecibo').modal('hide');
  //$('#modalHistorialDeParcialidadesXAlumno').modal('show');

});


$(document).on("click", "#regresarModAnterior33", function (e) {

  $('#modalDocumento').modal('hide');
  //$('#modalHistorialDeParcialidadesXAlumno').modal('show');

});




// ********************   VAR PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
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


    function date_picker_parcialidad() {
        $("#datepicker_fecha_parcialidad").datepicker({
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


    //   xxxxxxxxxxxxxxxxxxxx

    class Converter {
        constructor() {
            this.units = ['cero', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve'];
            this.tenToSixteen = ['diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis'];
            this.tens = ['treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa'];
            this.elMessage = document.getElementById('numletra');
            this.addListener();
        }

        addListener() {
            let elInput = document.getElementById('cantidad');
            elInput.addEventListener('keyup', () => {
                if (elInput.value !== '') {
                    this.convertToText(elInput.value);
                    $("#numletra").val(this.getName(elInput.value).toString().toUpperCase());
                } else {
                    this.elMessage.innerText = '';
                }
            });
        }

        convertToText(number) {
            number = this.deleteZerosLeft(number);
            if (!this.validateNumber(number)) {
                this.elMessage.innerText = 'Sólo se aceptan números enteros positivos.';
                return;
            }
            this.elMessage.innerText = this.getName(number);


        }

        // Elimina los ceros a la izquierda
        deleteZerosLeft(number) {
            let i = 0;
            let isZero = true;
            for (i = 0; i < number.length; i++) {
                if (number.charAt(i) != 0) {
                    isZero = false;
                    break;
                }
            }
            return isZero ? '0' : number.substr(i);
        }

        validateNumber(number) {
            // Validar que la cadena sea un número y que no esté vacía
            if (isNaN(number) || number === '') {
                return false;
            }
            // Validar que no tenga punto decimal
            if (number.indexOf('.') >= 0) {
                return false;
            }
            // Validar que el número no sea negativo
            if (number.indexOf('-') >= 0) {
                return false;
            }
            return true;
        }

        getName(number) {
            number = this.deleteZerosLeft(number);

            if (number.length === 1) {
                return this.getUnits(number);
            }
            if (number.length === 2) {
                return this.getTens(number);
            }
            if (number.length === 3) {
                return this.getHundreds(number);
            }
            if (number.length < 7) {
                return this.getThousands(number);
            }
            if (number.length < 13) {
                return this.getPeriod(number, 6, 'millón');
            }
            if (number.length < 19) {
                return this.getPeriod(number, 12, 'billón');
            }
            return 'Número demasiado grande.';
        }

        getUnits(number) {
            let numberInt = parseInt(number);
            return this.units[numberInt];
        }

        getTens(number) {
            // Obtener las unidades
            let units = number.charAt(1);

            if (number < 17) {
                return this.tenToSixteen[number - 10];
            }
            if (number < 20) {
                return 'dieci' + this.getUnits(units);
            }
            // Nombres especiales
            switch (number) {
                case '20':
                    return 'veinte';
                case '22':
                    return 'veintidós';
                case '23':
                    return 'veintitrés';
                case '26':
                    return 'veintiséis';
            }
            if (number < 30) {
                return 'veinti' + this.getUnits(units);
            }
            let name = this.tens[number.charAt(0) - 3];
            if (units > 0) {
                name += ' y ' + this.getUnits(units);
            }
            return name;
        }

        getHundreds(number) {
            let name = '';
            // Obtener las centenas
            let hundreds = number.charAt(0);
            // Obtener las decenas y unidades
            let tens = number.substr(1);

            if (number == 100) {
                return 'cien';
            }
            // Nombres especiales
            switch(hundreds) {
                case '1':
                    name = 'ciento';
                    break;
                case '5':
                    name = 'quinientos';
                    break;
                case '7':
                    name = 'setecientos';
                    break;
                case '9':
                    name = 'novecientos';
            }
            if (name === '') {
                name = this.getUnits(hundreds) + 'cientos';
            }
            if (tens > 0) {
                name += ' ' + this.getName(tens);
            }
            return name;
        }

        getThousands(number) {
            let name = 'mil';
            // Obtener cuantos dígitos están en los miles
            let thousandsLength = number.length - 3;
            // Obtener los miles
            let thousands = number.substr(0, thousandsLength);
            // Obtener las centenas, decenas y unidades
            let hundreds = number.substr(thousandsLength);

            if (thousands > 1) {
                // Se reemplaza la palabra uno por un en numeros como 21000, 31000, 41000, etc.
                name = this.getName(thousands).replace('uno', 'un') + ' mil';
            }
            if (hundreds > 0) {
                name += ' ' + this.getName(hundreds);
            }
            return name;
        }

        // Obtiene periodos, por ejemplo: millones, billones, etc.
        getPeriod(number, digitsToTheRight, periodName) {
            let name = 'un ' + periodName;
            // Obtener cuantos dígitos están dentro del periodo
            let periodLength = number.length - digitsToTheRight;
            // Obtener los dítos del periodo
            let periodDigits = number.substr(0, periodLength);
            // Obtener los digitos previos al periodo
            let previousDigits = number.substr(periodLength);

            if (periodDigits > 1) {
                name = this.getName(periodDigits).replace('uno', 'un') + ' ' + periodName.replace('ó', 'o') + 'es';
            }
            if (previousDigits > 0) {
                name += ' ' + this.getName(previousDigits);
            }
            return name;
        }
    }

    new Converter();
