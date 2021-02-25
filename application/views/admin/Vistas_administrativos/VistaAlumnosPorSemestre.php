
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

            <center><strong><font color="#D34787">Lista de Alumnos, asignación de calificaciones.</font></strong></center>
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
  <div class="col-4 col-sm-12">


                    
                  <div class="row">
                    <div class="col-8 col-sm-6">
                   
                      <label for="">Seleccione alguna carrera: </label>
                    <select background-color="red" id="combo_carreras_administrativos_profesores" class="form-control"><option value="" selected>Seleccione una carrera</option></select>
                    
                    </div>
                    
                    <div class="col-4 col-sm-4">
                        <label for="">Semestre: </label>
                        <select background-color="red" id="combo_semestres_administrativos_profesores" class="form-control"><option value="" selected>Seleccione un semestre</option></select>
                    </div>
                   
                  </div>
                  <br>
                  
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    
                      <label for="">Seleccione alguna opción de estudio: </label>
                    <select background-color="red" id="combo_opciones_administrativos_profesores" class="form-control"><option value="" selected>Seleccione una opcion de estudio</option></select>
                    
                    </div>
                  </div>
                  <br>
                  
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    
                      <label for="">Seleccione alguna de las materias que tiene asignada: </label>
                    <select background-color="red" id="combo_materias_administrativos_profesores" class="form-control"><option value="" selected>Seleccione alguna materia</option></select>
                  
                    </div>
                  </div>

    </div>
  </div>
<br>


      <!-- Modal Agregar nueuvo registro -->
      <div class="modal fade" id="modal_calificaciones_profesores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Agregar licenciatura</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <table id="tbl_list_asignar_calificaciones_administrativos_por_materia" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="bg-primary">
          <tr>
            <th>Numero de control</th>
            <th>Alumno</th>
            <th>Semestre</th>
            <th>Carrera</th>
            <th>Calificacion</th>
            <th>T.EX.</th>
            <th class="text-center" width="7%">Acciones</th>
          </tr>
        </thead>
      </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- Insert Button -->
              <button type="button" class="btn btn-primary" id="btnaddcarrera">Agregar</button>
            </div>
          </div>
        </div>
      </div>
<!--MODAL EDITAR calificacion PROFESOR-->
<div class="modal fade" id="modaleditcalificacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
              <input type="hidden" id="detalle_update">
              <input type="hidden" id="materia_update">
                <label for="">Asignar calificación</label>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Calificacion</label>
                    <input type="text" class="form-control" id="calificacion_materia_profesor" placeholder="Calificacion">
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
              <button type="button" class="btn btn-primary" id="update_calificacion_profesor">Actualizar</button>
            </div>
          </div>
        </div>
      </div>
      <!--MODAL EDITAR calificacion PROFESOR-->

      
<!--MODAL EDITAR calificacion ADMIN-->
<div class="modal fade" id="modalcalificacionadmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Ver calificaciones</strong>
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
            <form id="formcalificacionadmin">
                     
          <div class="row">
              <div class="col-sm-12">
              <table id="tbl_list_calificaciones_administrador" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important" width="100%">
        <thead class="bg-primary">
          <tr>
          <th></th>
          <th></th>
          <th></th>
            <th>Materia</th>
            <th>Horario</th>
            <th>Calificacion</th>
            <th>T.EX.</th>
            <th class="text-center" width="7%">Acciones</th>
          </tr>
        </thead>
      </table>
               </div>
           </div>
  
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="update_calificacion_profesor">Actualizar</button>
            </div>
          </div>
        </div>
      </div>
      <!--MODAL EDITAR calificacion ADMIN-->
<!--MODAL EDITAR calificacion ADMIN-->
<div class="modal fade" id="modaleditcalificacion_admin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Asignar calificación</strong>
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
            <form id="formeditcalificacion_admin">
                     
          <div class="row">
              <div class="col-sm-12">
              <input type="hidden" id="detalle_update_admin">
              <input type="hidden" id="materia_update_admin">
              <input type="hidden" id="profesor_update_admin">
                <label for="">Asignar calificación</label>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Calificacion</label>
                    <input type="text" class="form-control" id="calificacion_materia_profesor_admin" placeholder="Calificacion">
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
              <button type="button" class="btn btn-primary" id="update_calificacion_admin">Actualizar</button>
            </div>
          </div>
        </div>
      </div>
      <!--MODAL EDITAR calificacion ADMIN-->
  <div class="row my-4">
    <div class="col-md-12 mx-auto">

      <!--       tbl_listAlumConBaucher -->
      <?php if($rol==3):?>
      <table id="tbl_list_calificaciones_profesor_por_materia" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="bg-primary">
          <tr>
          <th></th>
          <th>Numero de control</th>
            <th>Alumno</th>
            <th>Calificacion</th>
            <th>T.EX.</th>
            <th class="text-center" width="7%">Acciones</th>
          </tr>
        </thead>
      </table>
      <?php endif;?>
 <!--       tbl_listAlumConBaucher -->
 <?php if($rol==1):?>
 <table id="tbl_list_calificaciones_administrativos_por_carrera_horario" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="bg-primary">
          <tr>
          <th></th>
          <th>Numero de control</th>
            <th>Alumno</th>
            <th cclass="text-center" width="7%">Asignar calificaciones</th>
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