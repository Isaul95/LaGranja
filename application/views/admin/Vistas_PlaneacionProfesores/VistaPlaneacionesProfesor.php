
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

            <center><strong><font color="#D34787">Subir planeación</font></strong></center>
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
                    <?php if($rol==3):?>
                      <label for="">Seleccione alguna carrera: </label>
                    <select background-color="red" id="combo_carreras_planeacion_profesores" class="form-control"><option value="" selected>Seleccione una carrera</option></select>
                    <?php endif;?>
                    </div>
                    <?php if($rol==3):?>
                    <div class="col-4 col-sm-4">
                        <label for="">Semestre: </label>
                        <select background-color="red" id="combo_semestres_planeacion_profesores" class="form-control"><option value="" selected>Seleccione un semestre</option></select>
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
                    <?php if($rol==3):?>
                      <label for="">Seleccione alguna opción de estudio: </label>
                    <select background-color="red" id="combo_opciones_planeacion_profesores" class="form-control"><option value="" selected>Seleccione una opción de estudio</option></select>
                    <?php endif;?>
                    </div>
                  </div>
                  <br>
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->



<div class="row">
   <div class="col-10 col-sm-12">     
   <br>
<br>
<br>

    </div><!--class="col-10 col-sm-12"-->
</div> <!--END OF FIRST ROW-->

<br>
<br>
<br>
      
<!--MODAL EDITAR calificacion-->
<div class="modal fade" id="modalagregarplaneacionprofesores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <form id="formeditplaneacionprofesores">
                     
          <div class="row">
              <div class="col-sm-12">
              <input type="hidden" id="profesor_planeacion_update">
              <input type="hidden" id="materia_planeacion_update">
              <input type="hidden" id="ciclo_planeacion_update">
              <input type="hidden" id="semestre_planeacion_update">
                <label for="">Asignar fechas y planeacions</label>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Porfesor</label>
                    <input type="text" class="form-control" id="profesor_planeacion" placeholder="Calificacion">
                    </div>
                    <div class="col-8 col-sm-6">
                    <label for="">Materia</label>
                    <input type="text" class="form-control" id="materia_planeacion" placeholder="Calificacion">
                    </div>
                  </div>  
                  <br>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Inicio</label>
                    <input type="text" id="datepicker_planeacion_inicio"/>
                     </div>
                     <div class="col-8 col-sm-6">
                    <label for="">Fin</label>
                    <input type="text" id="datepicker_planeacion_fin"/>
                     </div>
                  </div>        
                  <br> 
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Examen final</label>
                    <input type="text" id="datepicker_planeacion_ex_final"/>
                     </div>
                     <div class="col-8 col-sm-6">
                      <label for="">Salon</label> 
                      <input type="text" id="salon_planeacion"/>
                     </div>
                  </div>  
                  <br>
                  <div class="row">
                  <div class="col-8 col-sm-6">
                      <label for="">Horario</label> 
                      <br>
                      <input type = "text" id="planeacion_profesores_inicio"> 
                      <input type = "text" id="planeacion_profesores_fin">
                     </div>
                  </div>  
                  <div class ="row">
                  <div class="col-8 col-sm-6">
                  <div class="custom-file">
                      <label class="custom-file-label" for="customFile">Adjuntar planeacion</label>
                        <input type="file" class="custom-file-input" id="update_archivo_plaenacion_profesor">
                        </div>
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
              <button type="button" class="btn btn-primary" id="update_planeacion_profesor">Actualizar</button>
            </div>
          </div>
        </div>
      </div>

  <div class="row my-4">
    <div class="col-md-12 mx-auto">

 <?php if($rol==3):?>
 <table id="tbl_list_planeacion_administrativos" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="bg-primary">
          <tr> 
          <th></th>
          <th>Materia</th>
          <th>Salon</th>
          <th>Semestre</th>
            <th>Horario</th>
            <th>Planeación</th>
            <th cclass="text-center" width="7%">Agregar planeacion</th>
          </tr>
        </thead>
      </table>
      <?php endif;?>
    </div>
  </div>
      <hr>
                        </div>
                    </div>
                </div>
            </section>
    </div> <!-- /END ALL CONTENT -->