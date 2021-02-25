
    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
            <!-- Content Header (Page header) -->
      <!-- <section class="content-header">
        <h1>
              <center><strong><font color="#D34787">Lista de los pagos realizados ISAUL ==></font></strong></center>
              <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Menu cesvi</font></small></center>
        </h1>
        </section> -->



            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">



<!-- AKI EMPIEZA LOMMIOO LO NUEVO -->

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">
      <strong><font color="#D34787">Profesores</font></strong>
      </h1>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="row">
          <div class="col-md-12">
      <?php if($permisos->insert == 1):?>
        <div class="d-flex flex-row">
              <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#modaladdprofesor"> <span class="fa fa-plus"></span>  Agregar profesor</a>
      </div>
              <?php endif;?>
          </div>
      </div>
<hr> <!-- Le da una linea sombreada para ver la divicion -->

      <!-- Modal Agregar nueuvo registro -->
      <div class="modal fade" id="modaladdprofesor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Agregar profesor</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Add Record Form -->
          <form id="formaddprofesor">
          <div class="row">
              <div class="col-sm-12">
                <label for="">Datos personales</label>
                  <div class="row">
                    <div class="col-8 col-sm-8">
                    <label for="">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre_profesor" placeholder="Nombre del profesor">
                    </div>
                    <div class="col-4 col-sm-2">
                    <label for="">Edad</label>
                    <input type="text" class="form-control" id="edad_profesor" placeholder="Edad">
                    </div>
                    <div class="col-4 col-sm-2">
                    <label for="">Sexo</label>
                    <input type="text" class="form-control" id="sexo_profesor" placeholder="Sexo">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-12">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="direccion_profesor" placeholder="Dirección">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Ciudad donde radica</label>
                    <input type="text" class="form-control" id="ciudad_profesor" placeholder="Ciudad">
                    </div>
                    <div class="col-8 col-sm-6">
                    <label for="">Nacionalidad</label>
                    <input type="text" class="form-control" id="nacionalidad_profesor" placeholder="Nacionalidad">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Telefono celular</label>
                    <input type="text" class="form-control" id="telefono_profesor" placeholder="Celular">
                    </div>
                    <div class="col-8 col-sm-6">
                    <label for="">Correo electronico</label>
                    <input type="text" class="form-control" id="email_profesor" placeholder="Email">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Estado civil</label>
                    <input type="text" class="form-control" id="estadocivil_profesor" placeholder="estado civil">
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
              <div class="col-sm-12">
                <label for="">Datos acádemicos</label>
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Nivel de estudios</label>
                    <input type="text" class="form-control" id="niveldeestudios_profesor" placeholder="Nivel de estudios">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Titulado</label>
                    <input type="text" class="form-control" id="titulado_profesor" placeholder="Titulado">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Cedula</label>
                    <input type="text" class="form-control" id="cedula_profesor" placeholder="Cedula">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Ocupación</label>
                    <input type="text" class="form-control" id="ocupacion_profesor" placeholder="Ocupación">
                    </div>
                    <div class="col-4 col-sm-6">
                    <label for="">Tipo de trabajo</label>
                    <input type="text" class="form-control" id="tipodetrabajo_profesor" placeholder="Tipo de trabajo">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Universidad procedente</label>
                    <input type="text" class="form-control" id="universidadprocedente_profesor" placeholder="Universidad procedente">
                    </div>
                    <div class="col-4 col-sm-6">
                    <label for="">Experiencia docente</label>
                    <input type="text" class="form-control" id="experiencia_profesor" placeholder="Experiencia docente">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-12">
                    <label for="">Trabajos anteriores (minimo 3)</label>
                    <input type="text" class="form-control" id="trabajosprevios_profesor" placeholder="Trabajos anteriores">
                    </div>
                  </div>
              </div>
            </div>

                <!-- Image -->
                <div class="form-group">
                  <label for="customFile">Adjuntar archivo (Curriculum vitae)</label>
                  <input type="file" class="custom-file-input" id="archivo_profesor">
                </div>

                </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- Insert Button -->
              <button type="button" class="btn btn-primary" id="btnaddprofesor">Agregar</button>
            </div>
          </div>
        </div>
      </div>

     <div class="modal fade" id="modaleditprofesor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Editar profesor</strong>
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
            <form id="formeditprofesor">
<div class="row">
                    <input type="hidden" id="id_profesores_update">
              <div class="col-sm-12">
                <label for="">Datos personales</label>
                  <div class="row">
                    <div class="col-8 col-sm-8">
                    <label for="">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre_profesor_update" placeholder="Nombre del profesor">
                    </div>
                    <div class="col-4 col-sm-2">
                    <label for="">Edad</label>
                    <input type="text" class="form-control" id="edad_profesor_update" placeholder="Edad">
                    </div>
                    <div class="col-4 col-sm-2">
                    <label for="">Sexo</label>
                    <input type="text" class="form-control" id="sexo_profesor_update" placeholder="Sexo">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-12">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="direccion_profesor_update" placeholder="Dirección">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Ciudad donde radica</label>
                    <input type="text" class="form-control" id="ciudad_profesor_update" placeholder="Ciudad">
                    </div>
                    <div class="col-8 col-sm-6">
                    <label for="">Nacionalidad</label>
                    <input type="text" class="form-control" id="nacionalidad_profesor_update" placeholder="Nacionalidad">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Telefono celular</label>
                    <input type="text" class="form-control" id="telefono_profesor_update" placeholder="Celular">
                    </div>
                    <div class="col-8 col-sm-6">
                    <label for="">Correo electronico</label>
                    <input type="text" class="form-control" id="email_profesor_update" placeholder="Email">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Estado civil</label>
                    <input type="text" class="form-control" id="estadocivil_profesor_update" placeholder="estado civil">
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
              <div class="col-sm-12">
                <label for="">Datos acádemicos</label>
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Nivel de estudios</label>
                    <input type="text" class="form-control" id="niveldeestudios_profesor_update" placeholder="Nivel de estudios">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Titulado</label>
                    <input type="text" class="form-control" id="titulado_profesor_update" placeholder="Titulado">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Cedula</label>
                    <input type="text" class="form-control" id="cedula_profesor_update" placeholder="Cedula">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Ocupación</label>
                    <input type="text" class="form-control" id="ocupacion_profesor_update" placeholder="Ocupación">
                    </div>
                    <div class="col-4 col-sm-6">
                    <label for="">Tipo de trabajo</label>
                    <input type="text" class="form-control" id="tipodetrabajo_profesor_update" placeholder="Tipo de trabajo">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Universidad procedente</label>
                    <input type="text" class="form-control" id="universidadprocedente_profesor_update" placeholder="Universidad procedente">
                    </div>
                    <div class="col-4 col-sm-6">
                    <label for="">Experiencia docente</label>
                    <input type="text" class="form-control" id="experiencia_profesor_update" placeholder="Experiencia docente">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-12">
                    <label for="">Trabajos anteriores (minimo 3)</label>
                    <input type="text" class="form-control" id="trabajosprevios_profesor_update" placeholder="Trabajos anteriores">
                    </div>
                  </div>
              </div>
            </div>
                      <div class="custom-file">
                      <label class="custom-file-label" for="customFile">Adjuntar archivo (Curriculum vitae)</label>
                        <input type="file" class="custom-file-input" id="edit_img">

                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="update_profesor">Actualizar</button>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
<!--VER FICHA COMPLETA DEL PROFESOR-->
<div class="modal fade" id="modalviewprofesor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">información del profesor</strong>
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

            <div class="row">
                    <input type="hidden" id="id_profesores_view">
              <div class="col-sm-12">
                <label for="">Datos personales</label>
                  <div class="row">
                    <div class="col-8 col-sm-8">
                    <label for="">Nombre completo</label>
                    <input type="text" class="form-control" id="nombre_profesor_view" placeholder="Nombre del profesor">
                    </div>
                    <div class="col-4 col-sm-2">
                    <label for="">Edad</label>
                    <input type="text" class="form-control" id="edad_profesor_view" placeholder="Edad">
                    </div>
                    <div class="col-4 col-sm-2">
                    <label for="">Sexo</label>
                    <input type="text" class="form-control" id="sexo_profesor_view" placeholder="Sexo">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-12">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="direccion_profesor_view" placeholder="Dirección">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Ciudad donde radica</label>
                    <input type="text" class="form-control" id="ciudad_profesor_view" placeholder="Ciudad">
                    </div>
                    <div class="col-8 col-sm-6">
                    <label for="">Nacionalidad</label>
                    <input type="text" class="form-control" id="nacionalidad_profesor_view" placeholder="Nacionalidad">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Telefono celular</label>
                    <input type="text" class="form-control" id="telefono_profesor_view" placeholder="Celular">
                    </div>
                    <div class="col-8 col-sm-6">
                    <label for="">Correo electronico</label>
                    <input type="text" class="form-control" id="email_profesor_view" placeholder="Email">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Estado civil</label>
                    <input type="text" class="form-control" id="estadocivil_profesor_view" placeholder="estado civil">
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
              <div class="col-sm-12">
                <label for="">Datos acádemicos</label>
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Nivel de estudios</label>
                    <input type="text" class="form-control" id="niveldeestudios_profesor_view" placeholder="Nivel de estudios">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Titulado</label>
                    <input type="text" class="form-control" id="titulado_profesor_view" placeholder="Titulado">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Cedula</label>
                    <input type="text" class="form-control" id="cedula_profesor_view" placeholder="Cedula">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Ocupación</label>
                    <input type="text" class="form-control" id="ocupacion_profesor_view" placeholder="Ocupación">
                    </div>
                    <div class="col-4 col-sm-6">
                    <label for="">Tipo de trabajo</label>
                    <input type="text" class="form-control" id="tipodetrabajo_profesor_view" placeholder="Tipo de trabajo">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Universidad procedente</label>
                    <input type="text" class="form-control" id="universidadprocedente_profesor_view" placeholder="Universidad procedente">
                    </div>
                    <div class="col-4 col-sm-6">
                    <label for="">Experiencia docente</label>
                    <input type="text" class="form-control" id="experiencia_profesor_view" placeholder="Experiencia docente">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-8 col-sm-12">
                    <label for="">Trabajos anteriores (minimo 3)</label>
                    <input type="text" class="form-control" id="trabajosprevios_profesor_view" placeholder="Trabajos anteriores">
                    </div>
                  </div>
              </div>
            </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  <div class="row my-4">
    <div class="col-md-12 mx-auto">

      <!-- <table class="table table-borderless" id="tbl_regPagos" style="width:100%"> -->
      <table id="tbl_profesores" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="text-center bg-primary">
          <tr>
            <th width="3%">#</th>
            <th>Profesor</th>
            <!-- <th>Estudios</th> -->
            <th>Titulo</th>
            <th>Cedula</th>
            <!--<th>Ocupación</th>-->
            <!-- <th>Tipo de trabajo</th> -->
            <!-- <th>Univ. procedente</th> -->
            <!-- <th>Experiencia docente</th> -->
            <!-- <th>Trabajos ants.</th> -->
            <th class="text-center" width="7%">CV</th>
            <!--<th>Activo/DesAct.</th>-->
            <th>Horario</th>
            <th class="text-center" width="7%">Habilitar</th>
            <th class="text-center" width="7%">Acciones</th>
            <th class="text-center" width="7%">Ficha completa</th>
          </tr>
        </thead>
      </table>

    </div>
  </div>

</div>


<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->
<!--
  <th>Edad</th>
            <th>Sexo</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Nacionalidad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Estado civil</th>
-->



                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- / MAIN content -->




    </div> <!-- /END ALL CONTENT -->
