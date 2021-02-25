
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">

<!-- AKI EMPIEZA LOMMIOO LO NUEVO -->

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h2 class="text-center">
      <strong><font color="#D34787">Documentos Alumnos</font></strong>
    </h2>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">






  <!-- Modal Agregar promedio y fecha en letra pa constancia estudiante -->
  <div class="modal fade" id="modalConstancia" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary text-center">
          <strong class="modal-title" id="exampleModalLabel">Capturar promedio y fecha en letra para constancia de alumno</strong>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <input type="hidden" id="numero_control_constancia" name="numero_control_constancia">
				      <input type="hidden" id="detalle_constancia" name="detalle_constancia">
				      <input type="hidden" id="semestre_constancia" name="semestre_constancia">
              <input type="hidden" id="opcion_constancia" name="opcion_constancia">
              <input type="hidden" id="carrera_constancia" name="carrera_constancia">


            <!-- <div>
              <label> <span class="rojo">*</span>Seleccione el archivo formato PDF </label>
            </div> -->
            <div class="panel panel-default">
              <div class="panel-body">
              <div class="row">
              <div class="col-xs-12 col-sm-8 col-md-8">
                  <!-- <div class="form-group" id="archivoPDF">
                      <input id="archivo" name="archivo"  type="file" size="60" accept=".pdf"/>
                  </div> -->
              </div>
              </div>
<form id="datesLetraConstancia">
            <div class="form-group">
            <label for="">Promedio del Alumno:</label>
            <input type="text" class="form-control" id="promedioNumeroAlumno" readonly>
          </div>

              <div class="form-group">
              <label for="">Capturar promedio en letra: *</label>
              <input type="text" class="form-control" id="promedio_letra" placeholder="Escribir promedio del alumno en letra...">
            </div>
            <div class="form-group">
              <label for="">Capturar fecha en letra: *</label>
              <input type="text" class="form-control" id="fecha_letra" placeholder="Escribir fecha en letra para la constancia...">
            </div>

              <!-- <table id="tbl_listaRecibosFirmados" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important" width="100%">
                <thead class="bg-primary">
                  <tr>
                    <th width="3%">#</th>
                    <center><th width="25%">Nombre del recibo</th></center>
                    <center><th width="10%">Descarga</th></center>
                    <center><th width="10%">Eliminar</th></center>
                  </tr>
                </thead>
              </table> -->
              </div>
            </div>
</form>
        </div>


        <div id="generarConstanciaPDFAlumno">

                    <center>
                      <h4><font color="#3498DB">Generar Constancia del Alumno</font></h4> <br>
                     <a onclick="generaConstanciaPdfStuden()">
                       <i class="far fa-file-pdf fa-2x"></i></a>
                     </center> <br>

            </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Regresar</button>
          <!-- Insert Button -->
          <button type="button" class="btn btn-primary" id="capturarDatosEnLetraConstancia">Agregar Datos</button>
        </div>
      </div>
    </div>
  </div>



      <br>
<div class="row">
  <div class="col-10 col-sm-12">
                  <div class="row">
                      <div class="col-4 col-sm-6">
                        <label for="">Seleccione alguna carrera: </label>
                      <select background-color="red" id="combo_CarreraDocumAlumnos_Admin" class="form-control">
                      <option value="" selected>Seleccione una carrera...</option>
                      </select>
                      </div>

                      <div class="col-4 col-sm-4">
                          <label for="">Semestre: </label>
                          <select background-color="red" id="combo_SemestresDocumAlumnos_Admin" class="form-control">
                            <option value="" selected>Seleccione un semestre...</option>
                          </select>
                      </div>
                  </div> <!--END OF SECOND ROW-->
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->
                  <br>

                  <div class="row">
                    <div class="col-10 col-sm-12">
                                   <div class="row">
                                    <div class="col-8 col-sm-4">
                                        <label for="">Seleccione alguna opción de estudio: </label>
                                      <select background-color="red" id="combo_opcionesDocumAlumnos_Admin" class="form-control">
                                        <option value="" selected>Seleccione una opción...</option>
                                      </select>
                                      </div>
                                    </div>
                                    <br>
                      </div><!--class="col-10 col-sm-12"-->
                    </div> <!--END OF FIRST ROW-->




<hr> <!-- Le da una linea sombreada para ver la divicion -->

<div class="row my-4">
  <div class="col-md-12 mx-auto">

    <!-- <table class="table table-borderless" id="tbl_regPagos" style="width:100%"> -->
    <table id="tbl_alumnosDocumentacion" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
      <thead class="text-center bg-primary">
        <tr>
          <th>Numero de control</th>
          <th>Alumno</th>
          <!-- <th class="text-center" width="7%">Semestre</th>
          <th>Carrera</th> -->
          <th class="text-center" width="7%">Cert. Estudios</th>
          <th class="text-center" width="7%">Boleta</th>
          <th class="text-center" width="7%">Hist. academico</th>
          <!-- <th class="text-center" width="7%">Cert. parcial</th> -->
          <th class="text-center" width="7%">Horario</th>
          <th class="text-center" width="7%">Constancia</th>
        </tr>
      </thead>
    </table>

  </div>
</div>


    </div>
  </div>
</div>


<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- / MAIN content -->
    </div> <!-- /END ALL CONTENT -->
