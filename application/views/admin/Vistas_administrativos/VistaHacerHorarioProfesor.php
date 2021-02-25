
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->

            <section class="content">
                <div class="box box-solid colorfondo">
                    <div class="box-body">

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h3>

        <input type="hidden" id="usuario" name="usuario" value="<?php echo $username;?>" >
        <input type="hidden" id="rol" name="rol" value="<?php echo $rol;?>" >

            <center><strong><font color="#D34787">Horarios de profesores</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Ciudad Iguala de la Independencia, Guerrero</font></small></center>
  </h3>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
<hr> <!-- Le da una linea sombreada para ver la divicion -->
    </div>
  </div>


  <div class="row">
    <div class="col-sm-18">

<br>
<div class="row">
  <div class="col-10 col-sm-12">
                  <div class="row">
                    <div class="col-4 col-sm-8">
                    <?php if($rol==1):?>
                      <label for="">Seleccione alguna carrera: </label>
                    <select background-color="red" id="combo_carreras_horario_profesores" class="form-control"><option value="" selected>Seleccione una carrera</option></select>
                    <?php endif;?>
                    </div>
                    <?php if($rol==1):?>
                    <div class="col-4 col-sm-4">
                        <label for="">Semestre: </label>
                        <select background-color="red" id="combo_semestres_horario_profesores" class="form-control"><option value="" selected>Seleccione un semestre</option></select>
                    </div>
                    <?php endif;?>
                  </div> <!--END OF SECOND ROW-->
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->
                  <br>
 <div class="row">
  <div class="col-10 col-sm-12">
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <?php if($rol==1):?>
                      <label for="">Seleccione alguno de los profesores: </label>
                    <select background-color="red" id="combo_profesores_horario_profesores" class="form-control"><option value="" selected>Seleccione una profesor</option></select>
                    <?php endif;?>
                    </div>

                    <div class="col-8 col-sm-6">
                    <?php if($rol==1):?>
                      <label for="">Seleccione alguna opción de estudio: </label>
                    <select background-color="red" id="combo_opciones_horario_profesores" class="form-control"><option value="" selected>Seleccione una opción de estudio</option></select>
                    <?php endif;?>
                    </div>
                  </div>
                  <br>
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->

  <div class="row">
  <div class="col-10 col-sm-12">
                   <div class="row">
                    <div class="col-8 col-sm-6">
                    <?php if($rol==1):?>
                      <label for="">Seleccione alguna de las materias: </label>
                      <br>
                    <select background-color="red" id="combo_materias_horario_profesores" class="form-control" multiple="multiple"><option value="" selected>Seleccione una materia</option></select>
                    <?php endif;?>
                    </div>

   </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->


<div class="row">
   <div class="col-10 col-sm-12">
   <br>
<br>
<br>
<?php if($rol==1):?>
        <div class="row">
                    <div class="col-8 col-sm-5">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="crear_horario">Generar horario</button>
                    </div>
        </div>
        <?php endif;?>
    </div><!--class="col-10 col-sm-12"-->
</div> <!--END OF FIRST ROW-->

<br>
<br>
<br>

<!--MODAL EDITAR calificacion-->
<div class="modal fade" id="modalagregarhorario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Editar materia</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row text-center">
                  <div class="col-md-12 my-3">
                    <div id="show_img"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
            <form id="formeditcalificacion">

          <div class="row">
              <div class="col-sm-12">
              <input type="hidden" id="profesor_horario_update">
              <input type="hidden" id="materia_horario_update">
              <input type="hidden" id="ciclo_horario_update">
              <input type="hidden" id="semestre_horario_update">
                <label for="">Asignar fechas y horarios</label>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Porfesor</label>
                    <input type="text" class="form-control" id="profesor_horario" readonly>
                    </div>
                    <div class="col-8 col-sm-6">
                    <label for="">Materia</label>
                    <input type="text" class="form-control" id="materia_horario"  readonly>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Inicio</label>
                    <input type="text" id="datepicker_horario_inicio"/>
                     </div>
                     <div class="col-8 col-sm-6">
                    <label for="">Fin</label>
                    <input type="text" id="datepicker_horario_fin"/>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Examen final</label>
                    <input type="text" id="datepicker_horario_ex_final"/>
                     </div>
                     <div class="col-8 col-sm-6">
                      <label for="">Salon</label>
                      <input type="text" id="salon_horario"/>
                     </div>
                  </div>
                  <br>
                  <div class="row">
                  <div class="col-8 col-sm-6">
                      <label for="">Horario</label>
                      <br>
                      <input type = "text" id="horario_profesores_inicio">
                      <input type = "text" id="horario_profesores_fin">
                     </div>
                  </div>

               </div>
           </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="update_horario_profesor">Actualizar</button>
            </div>
          </div>
        </div>
      </div>

  <div class="row my-4">
    <div class="col-md-12 mx-auto">

 <?php if($rol==1):?>
 <table id="tbl_list_horarios_administrativos" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="bg-primary">
          <tr>
          <th></th>
          <th></th>
          <th>Materia</th>
          <th>Salon</th>
          <th>Semestre</th>
          <th>Ciclo</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Ex final</th>
            <th>Horario</th>
            <th cclass="text-center" width="7%">Operaciones</th>
            <th>Imprimir<br>Horario</th>
          </tr>
        </thead>
      </table>
      <?php endif;?>
      <br>
      <div class="row"> <!--BOTÓN-->
                    <div class="col-8 col-sm-6">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="confirmar_horario_profesor">Confirmar horario</button>
                    </div>
                    <div class="col-8 col-sm-6">
                    <button type="button" class="btn btn-danger btn-sm btn-block" id="desconfirmar_horario_profesor">Habilitar profesor</button>
                    </div>
                   </div><!--BOTÓN-->
    </div>
  </div>
      <hr>
                        </div>
                    </div>
                </div>
            </section>
    </div> <!-- /END ALL CONTENT -->
