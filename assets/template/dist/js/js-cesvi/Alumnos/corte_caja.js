    $(document).ready(function(){
      // debugger;

// SE EXTRAE LA FECHA DEL DIA ACTUAL
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

//  SE EXTRAE LA HORA ACTUAL DEL DIA
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


   consultaAperturaYCorteDelDia(fecha);       // Apertura dle dia

   // consultaTotalGastosDelDia(fecha);          // TOTAL DE GASTOS de ldia
   // consultaTotalDePagosHechosDelDia(fecha);   // TOTAL DE PAGOS HECHOS EN EL DIA
   // consultaTotalDeNumerosyDescuentosDelDia(fecha);   // TOTAL DE PAGOS HECHOS EN EL DIA


   // consultaTotalXXX(fecha);   // TOTAL DE PAGOS HECHOS EN EL DIA


    }); // FIN DE LA FUNCION PRINCIPAL



    function consultaAperturaYCorteDelDia(fecha){
    // debugger;
      		var datos = {
      				fecha : fecha,
      		    }
      		$.ajax({
            url: base_url+'Alumnos/CorteCaja/consultarApertura',
            type: "post",
            dataType: "json",
      			data : (datos),
      			success : function(response){
              $("#tbl_consultaCortesDelDia").DataTable({
                  data: response,
                  responsive: true,
                  columns: [
                      {
                          data: "monto",
                          "className": "text-center",
                          // "visible": false, // ocultar la columna
                        render: function(data, type, row, meta) {
                           var hayApertura = `${row.monto}`;
                           var idApertura = `${row.id_apertura}`;
                                     if (hayApertura == 'null'){
                                        var a = '<div text-white">'+'No hay apertura'+'</div>';
                                        $("#id_ventas").val("No hay apertura");
                                     }else {
                                       $("#id_apertura").val(idApertura);
                                       $("#monto_apertura").val(hayApertura);
                                       var a = '<div text-white">'+hayApertura+'</div>';
                                     }
                                return a;
                           },
                      },
                      {
                        data: "monto_entregado",
                        "className": "text-center",
                      },
                      {
                          data: "gastos",
                          "className": "text-center",
                      },
                      {
                          data: "ventas",
                          // "visible": false, // ocultar la columna
                      },
                      {
                        data: "diferencia",
                        "className": "text-center",
                      },
                      {
                          data: "fecha",
                          "className": "text-center",
                      },
                      {
                          data: "usuario",
                          "className": "text-center",
                      },

                  ],
                    "language" : language_espaniol,
              });
      			    }
      		});
     }







    $(document).on("click", "#agregarCorteCaja", function(e){
                  e.preventDefault();
                  debugger;

                var totalVentasXdia = $("#id_ventas").val();
                var totalGastosXdia = $("#id_gastos").val();
                var totalPagosXdia = $("#id_pagos").val();

                    if (totalGastosXdia != " " || totalPagosXdia != " ") {
                        totalGastosXdia = 0;
                        totalPagosXdia = 0;
                    }

                var totalMontoXdia = $("#id_monto").val();
                var totalprocesados =  $("#total_procesados").val();
                var totaldecrudo =  $("#total_devolucion_crudo").val();
                var pagopollo       =  1800;
                var tacos           =	 60;
                var almuerzo        =  28;

                crudoMasTacos = ( parseFloat(totaldecrudo) + parseFloat(tacos) );
                diferenciaentablautilidad = crudoMasTacos - totalprocesados - almuerzo;
                utilidades = ( parseFloat(totalVentasXdia) + parseFloat(totalPagosXdia) + parseFloat(totaldecrudo) + parseFloat(tacos) - totalprocesados - pagopollo - almuerzo );

// =========0 parseInt => asi sirve para redondear, 30.5+30  60.5 con el parseInt lo redondea a 61
// ===== var x= (parseInt(a) + parseInt(b));
                    var ventasmenosgastos = (totalVentasXdia - totalGastosXdia);
                    var totalVenMenGastos = ( parseFloat(ventasmenosgastos) + parseFloat(totalPagosXdia) );
                    var diferencia = totalMontoXdia - totalVenMenGastos;

                  var datos = {
                        ventas          : $("#id_ventas").val(),
                        gastos          : $("#id_gastos").val(),
                        id_apertura     : $("#id_apertura").val(),
                        usuario         : $("#user_login").val(),
                        monto_entregado : $("#id_monto").val(),
                        pagos           : $("#id_pagos").val(),
                        totalprocesados : totalprocesados,
                        totaldevolucioncrudo : totaldecrudo,
                        fecha           : fecha,
                        hora            : hora,
                        diferencia      : diferencia,
                        pagopollo       : pagopollo,
              					tacos           :	tacos,
              					almuerzo        : almuerzo,
                        diferenciautilidad : diferenciaentablautilidad,
                        utilidad           : utilidades,
                  }

                if (datos.monto_entregado == "" ) {
                  alert("No a capturado el monto...!!!");
                }else{

                  $.ajax({
                    url: base_url+'Alumnos/CorteCaja/registroCorteDeCaja',
                    type: "post",
                    dataType: "json",
                    data : (datos),
                    success: function(data){
                      if (data.responce == "success") {
                        toastr["success"](data.message);
                          $("#formularioAltaCorteCaja")[0].reset();   // SE RESETEA EL FORMULARIO DE LOS CAMPOS
                            $("#tbl_consultaCortesDelDia").DataTable().destroy();
                            consultaAperturaYCorteDelDia(fecha); // update tabla de cortes
                            productoscrudosvendidos();

                      }else{
                        toastr["error"](data.message);
                      }
                    }
                  });
                }
            });




            function productoscrudosvendidos() {
                debugger;
                $.ajax({
                    type: "get",
                    url: base_url+'Alumnos/CorteCaja/verProductosCrudosVendidos',
                    dataType: "json",
                    success: function(response) {
                        var i = "1";
                        // $("#tbl_listaRecibosFirmados").DataTable({
                        //     data: response,
                        //     responsive: true,
                        //     columns: [
                        //         {
                        //             data: "id_recibo_valido",
                        //         },
                        //         {
                        //             data: "nombre_archivo",
                        //         },
                        //     ],
                        //       "language" : language_espaniol,
                        // });
                    },
                });
            }





    // function consultaTotalGastosDelDia(fecha){
    //     // debugger;
    //       		var datos = {
    //       					fecha : fecha,
    //       		    }
    //       		$.ajax({
    //             url: base_url+'Alumnos/CorteCaja/consultaCountAlumnos',
    //             type: "post",
    //             dataType: "json",
    //       			data : (datos),
    //       			success : function(data){
    //               if (data.responce == "success") {
    //                   toastr["success"](data.message);
    //                       // debugger;
    //                       // $('#formularioRegistroBaucher').hide();
    //                       // $('#baucherPdf').show();
    //                     }else{
    //                       // toastr["error"](data.message);
    //                       // $('#baucherPdf').hide();
    //                     }
    //       			    }
    //       		});
    //       }






  //
  // function consultaTotalDeNumerosyDescuentosDelDia(fecha){
  //     // debugger;
  //       		var datos = {
  //       					fecha : fecha,
  //       		    }
  //       		$.ajax({
  //             url: base_url+'Alumnos/CorteCaja/consultaCountAlumnos',
  //             type: "post",
  //             dataType: "json",
  //       			data : (datos),
  //       			success : function(data){
  //               if (data.responce == "success") {
  //                   toastr["success"](data.message);
  //                       // debugger;
  //                       // $('#formularioRegistroBaucher').hide();
  //                       // $('#baucherPdf').show();
  //                     }else{
  //                       // toastr["error"](data.message);
  //                       // $('#baucherPdf').hide();
  //                     }
  //       			    }
  //       		});
  //       }
  //












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
