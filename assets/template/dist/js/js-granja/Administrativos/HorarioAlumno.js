    $(document).ready(function(){
    
      combo_carreras_horarioalumno_admin();
      $("#elcombo_carreras_horarioalumno_admin").change(function () {
        // SE MUESTRAN LOS ALUMNOS
          $("#tbl_alumno_elegir_materias_admin").DataTable().destroy();
          llenarTablaAlumnos_horario_admin($("#elcombo_carreras_horarioalumno_admin").val(),
           $("#elcombo_opciones_horarioalumno_admin").val(),
           $("#elcombo_semestre_horarioalumno_admin").val());
//SE MUESTRAN LAS MATERIAS DISPONIBLES DE SU CARRERA
           $("#tbl_elegir_materias_admin").DataTable().destroy();
           llenartablaseleccionmaterias_admin($("#elcombo_carreras_horarioalumno_admin").val(),
           $("#elcombo_opciones_horarioalumno_admin").val(),
           $("#elcombo_semestre_horarioalumno_admin").val());
      });
      combo_semestres_horarioalumno_admin();
      $("#elcombo_semestre_horarioalumno_admin").change(function () {
          $("#tbl_alumno_elegir_materias_admin").DataTable().destroy();
          llenarTablaAlumnos_horario_admin($("#elcombo_carreras_horarioalumno_admin").val(),
           $("#elcombo_opciones_horarioalumno_admin").val(),
           $("#elcombo_semestre_horarioalumno_admin").val());
           //SE MUESTRAN LAS MATERIAS DISPONIBLES DE SU CARRERA
           $("#tbl_elegir_materias_admin").DataTable().destroy();
           llenartablaseleccionmaterias_admin($("#elcombo_carreras_horarioalumno_admin").val(),
           $("#elcombo_opciones_horarioalumno_admin").val(),
           $("#elcombo_semestre_horarioalumno_admin").val());
      });
      combo_opciones_alumnos_admin();
      $("#elcombo_opciones_horarioalumno_admin").change(function () {
          $("#tbl_alumno_elegir_materias_admin").DataTable().destroy();
          llenarTablaAlumnos_horario_admin($("#elcombo_carreras_horarioalumno_admin").val(),
           $("#elcombo_opciones_horarioalumno_admin").val(),
           $("#elcombo_semestre_horarioalumno_admin").val());
           //SE MUESTRAN LAS MATERIAS DISPONIBLES DE SU CARRERA
           $("#tbl_elegir_materias_admin").DataTable().destroy();
           llenartablaseleccionmaterias_admin($("#elcombo_carreras_horarioalumno_admin").val(),
           $("#elcombo_opciones_horarioalumno_admin").val(),
           $("#elcombo_semestre_horarioalumno_admin").val());
      });


        horarioyaelegido_admin();
        periodo_activo_horario_admin();
     llenartabla_materias_elegidas_admin();
      $("#elegirmaterias").click(function () {

        $("#tbl_elegir_materias_admin").DataTable().destroy();
        llenartablaseleccionmaterias_admin();
    });
           
    }); // FIN DE LA FUNCION PRINCIPAL

///////////////////////////////////////// CONDICIONALES /////////////////////////////////////////////////////////////////
function combo_carreras_horarioalumno_admin() {
  $.ajax({
      type: "get",
      url: base_url + 'Administrativos/HacerHorarioProfesor/obtenercarreras',
      dataType: "json",
      success: function (data) {
          console.log(data);
          $.each(data, function (key, registro) {
              $("#elcombo_carreras_horarioalumno_admin").append('<option value=' + registro.id_carrera + '>' + registro.carrera_descripcion + '</option>');
          });
      },
  });
}
function combo_opciones_alumnos_admin() {
  $.ajax({
      type: "get",
      url: base_url + 'Administrativos/HacerHorarioProfesor/obteneropciones',
      dataType: "json",
      success: function (data) {
          $.each(data, function (key, registro) {
              $("#elcombo_opciones_horarioalumno_admin").append('<option value=' + registro.id_opcion + '>' + registro.descripcion + '</option>');
          });

      },
  });
}
function combo_semestres_horarioalumno_admin() {
  $.ajax({
      type: "get",
      url: base_url + 'Administrativos/HacerHorarioProfesor/obtenersemestres',
      dataType: "json",
      success: function (data) {
          $.each(data, function (key, registro) {
              $("#elcombo_semestre_horarioalumno_admin").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
          });

      },
  });
}
////////////////////////////////////////// CONDICIONALES ////////////////////////////////////////////////////////////////

///////////////////////////////////// TABLA ALUMNOS  ///////////////////////////////////////
function llenarTablaAlumnos_horario_admin(carrera,opcion,cuatrimestre) {
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
          $("#tbl_alumno_elegir_materias_admin").DataTable({
              data: response,
              responsve: true,
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
                  data: function(row, type, set) {
                    var concat="";
                    var detalle_numero_alumno = concat.concat(`${row.id_detalle}`,'_',`${row.numero_control}`,'_',`${row.alumno}`);
                    
                      return `
                          <a href="#" id="seleccionar_alumno_para_elegir_materias" class="btn btn-info" value="${detalle_numero_alumno}"><i class="far fa-edit"></i></a>
                             `;
                  },
              },

              ],
              "language": language_espaniol,

          });
      },
  });
}

$(document).on("click", "#seleccionar_alumno_para_elegir_materias", function (e) {
  e.preventDefault();
  var edit_id = $(this).attr("value");
  var array = edit_id.split('_');
  
  var detalle = array[0];
  var numero_control = array[1];
  var alumno = array[2];
  $('#detalle_alumno_horario_admin').val(detalle);
  $('#numero_control_alumno_horario_admin').val(numero_control);
  $('#nombre_alumno_horario_admin').val(alumno);
  $("#tbl_elegir_materias_admin").DataTable().destroy();
  $("#tbl_materias_elegidas_admin").DataTable().destroy();
  llenartabla_materias_elegidas_admin();
  
});
/////////////////////////////////////  TABLA ALUMNOS /(((((((////////////////////////////)))))))


//////////////////////////////////////// SELECCIÓN DE MATERIAS ////////////////////////////////////////////////////////
function llenartablaseleccionmaterias_admin(carrera,opcion,semestre) {
 
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
  //fd.append("numero_control", numero_control);
  fd.append("licenciatura", carrera);
  fd.append("semestre", semestre);
  fd.append("opcion", opcion);
  fd.append("ciclo", ciclo);

  $.ajax({
      type: "post",
      url: base_url + 'Administrativos/Horarioalumno/materiasparaelegir',
      data: fd,
      processData: false,
      contentType: false,
      dataType: "json",
      enctype : 'multipart/form-data',
      success: function (response) {
          var i = "1";
          $("#tbl_elegir_materias_admin").DataTable({
              data: response,
              responsive: true,
              columns: [
                  {
                      data: "materia",
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
                        var materia_ciclo_profe_horario = concat.concat(`${row.materia}`,'_',`${row.ciclo}`,'_',`${row.id_profe}`,'_',`${row.horario}`);
                          return `
                      <a href="#" id="agregar_materia_admin" class="btn btn-success btn-remove" value="${materia_ciclo_profe_horario}"><i class="far fa-edit"></i></a>
                              `;
                      },
                  },
              ],
              "language": language_espaniol,
          });
      },
  });
}


$(document).on("click", "#agregar_materia_admin", function (e) {
  e.preventDefault();
  var del_id = $(this).attr("value");
  var array = del_id.split('_');
  
  var materia = array[0];
  var ciclo = array[1];
  var profe = array[2];
  var horario = array[3];
  var detalle =   $('#detalle_alumno_horario_admin').val();

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
              url: base_url + 'Administrativos/Horarioalumno/agregar_materia',
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

                      $("#tbl_materias_elegidas_admin").DataTable().destroy();
                      llenartabla_materias_elegidas_admin();
                  }
                  else{
                    Swal.fire(
                      '¡Error!',
                      '¡Materia ya agregada!',
                      'error'
                  );

                  $("#tbl_materias_elegidas_admin").DataTable().destroy();
                  llenartabla_materias_elegidas_admin();
                  }
              },
          });
      }
  });
});
function llenartabla_materias_elegidas_admin() {
  var numero_control = $("#numero_control_alumno_horario_admin").val();
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
      url: base_url + 'Administrativos/Horarioalumno/materiaselegidas',
      data: fd,
      processData: false,
      contentType: false,
      dataType: "json",
      enctype : 'multipart/form-data',
      success: function (response) {
          var i = "1";
          $("#tbl_materias_elegidas_admin").DataTable({
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
                      <a href="#" id="remover_materia_admin" class="btn btn-danger btn-remove" value="${detalle_materia_ciclo_profe_horario}"><i class="far fa-edit"></i></a>
                              `;
                      },
                  },
              ],
              "language": language_espaniol,
          });
      },
  });
}
$(document).on("click", "#remover_materia_admin", function (e) {
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
              url: base_url + 'Administrativos/Horarioalumno/removermateria',
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

                      $("#tbl_materias_elegidas_admin").DataTable().destroy();
                      llenartabla_materias_elegidas_admin();
                  }
                  else{
                    Swal.fire(
                      '¡Error!',
                      '¡Materia no removida!',
                      'error'
                  );

                  $("#tbl_materias_elegidas_admin").DataTable().destroy();
                  llenartabla_materias_elegidas_admin();
                  }
              },
          });
      }
  });
});
$(document).on("click", "#confirmar_horario_elegir_materias_admin", function (e) {
    e.preventDefault();
    debugger;
   
    var numero_control = $("#numero_control_alumno_horario_admin").val();
    var licenciatura = $("#elcombo_carreras_horarioalumno_admin").val();
    var semestre = $("#elcombo_semestre_horarioalumno_admin").val();
    var opcion = $("#elcombo_opciones_horarioalumno_admin").val();

    var periodo_escolar = $("#periodo_escolar_activo_admin").val();
    var En_curso = "En_curso";

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
                url: base_url + 'Administrativos/Horarioalumno/alumnoencurso',
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

                      //  window.location.reload();
                    }
                    else{
                      Swal.fire(
                        '¡Error!',
                        '¡No se pudo asignar el horario!',
                        'error'
                    );

                    $("#tbl_materias_elegidas_admin").DataTable().destroy();
                    llenartabla_materias_elegidas_admin();
                    }
                },
            });
        }
    });
  });
function horarioyaelegido_admin(){
    debugger;
              var datos = {
                      numero_control : $("#numero_control").val(),
                  }
              $.ajax({
            url: base_url+'Administrativos/Horarioalumno/horarioyaseleccionado',
            type: "post",
            dataType: "json",
                  data : (datos),
                  success : function(data){
              if (data.responce == "success") {
                  toastr["success"](data.message);
                      // debugger;
                      $('#SeleccionHorario_admin').hide();
                      $('#HorarioSeleccionado_admin').show();
                    }else{
                      // toastr["error"](data.message);
                      $('#HorarioSeleccionado_admin').hide();
                    }
                      }
              });
      }
      function periodo_activo_horario_admin() {
        debugger;
        $.ajax({
            type: "get",
            url: base_url + 'Administrativos/Horarioalumno/verperiodo_activo_agregar_horario',
            dataType: "json",
            success: function (response) {
                $("#periodo_escolar_activo_admin").val(response['id_periodo_escolar']);
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
