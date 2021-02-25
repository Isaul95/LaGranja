<div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
             <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">
<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h3 class="text-center">
      <strong><font color="#D34787">PRACTICAS PROFESIONALES</font></strong>
    </h3>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="row">
          <div class="col-md-12">
<center>

            <?php foreach($datosAlumnoProcesoFinal as $datosAlumnoProcesoFinal):?>
              <div class="row">

                <div class="col-sm-12">
                  <br>
                   <div class="row">
                      <div class="col-4 col-sm-2">
                      <label for="">No. Control:</label>
                  <input type="text" class="form-control text-center" id="noControlProcFinPracticas" readonly value="<?php echo $datosAlumnoProcesoFinal->numero_control;?>" >
                      </div>

                      <div class="col-8 col-sm-8">
                      <label for="">Carrera:</label>
                      <input type="text" class="form-control" id="carreraProcFinPracticas" readonly value="<?php echo $datosAlumnoProcesoFinal->carrera_descripcion;?>" >
                      </div>

                      <div class="col-2 col-sm-2">
                      <label for="">Semestre:</label>
            <input type="text" class="form-control text-center" id="semestreProcFinPracticas" readonly value="<?php echo $datosAlumnoProcesoFinal->semestre;?>" >
                      </div>

                    </div>

                </div>

              </div>
              <?php endforeach;?>
            <br>
</center>
          </div>
      </div>
<hr> <!-- Le da una linea sombreada para ver la divicion -->


<div class="modal-dialog" id="formularioRegistroOficioPractProf">
  <div class="modal-content">
    <div class="modal-body">
      <form id="formularioAltaOficioProcFinPracticas">
            <!-- file -->
            <div class="form-group">
              <label for="customFile">Adjuntar archivo: *</label>
              <input type="file" class="custom-file-input" id="archivoProcFinPracticas">
            </div>
      </form>
    </div>

    <div class="modal-footer">
        <!-- <?php if($permisos->insert == 1):?> -->
          <button type="button" class="btn btn-primary" id="darAltaOficioPracticas">Agregar</button>
        <!-- <?php endif;?> -->
    </div>

    </div>
</div>


<div class="modal-dialog" id="noPermisoDeAddOficioPracticasProf">
    <center>
        <strong><font color="#E74C3C">Aun no tiene permiso realizar las Practicas Profesionales...!!!</font></strong> <br>
    </center>
</div>


                          </div>
                        </div>
                      </div>
                    </div><!-- /.box-body -->
                </div> <!-- /.box -->
            </section>
    </div> <!-- /END ALL CONTENT -->
