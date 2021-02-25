<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

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
      <strong><font color="#D34787">Alumnos</font></strong>
      </h1>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>

  <div class="row">
  <div class="col-10 col-sm-12">
                  <div class="row">
                    <div class="col-4 col-sm-8">
                      <label for="">Seleccione alguna carrera: </label>
                    <select background-color="red" id="combo_carreras_alumnos_admin" class="form-control"><option value="" selected>Seleccione una carrera</option></select>

                    </div>

                    <div class="col-4 col-sm-4">
                        <label for="">Semestre: </label>
                        <select background-color="red" id="combo_semestres_alumnos_admin" class="form-control"><option value="" selected>Seleccione un semestre</option></select>
                    </div>
                  </div> <!--END OF SECOND ROW-->
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->
                  <br>
 <div class="row">
  <div class="col-10 col-sm-12">
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Seleccione alguna opción de estudio: </label>
                    <select background-color="red" id="combo_opciones_alumnos_admin" class="form-control"><option value="" selected>Seleccione una opción de estudio</option></select>
                    </div>
                  </div>
                  <br>
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->
  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="row">
          <div class="col-md-12">
      <?php if($permisos->insert == 1):?>
        <div class="d-flex flex-row">
              <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#modaladdalumno"> <span class="fa fa-plus"></span>  Agregar Alumno</a>
      </div>
              <?php endif;?>
          </div>
      </div>
<hr> <!-- Le da una linea sombreada para ver la divicion -->

      <!-- Modal Agregar nueuvo alumno -->
      <div class="modal fade" id="modaladdalumno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Agregar Alumno</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Add Record Form -->
          <form id="formaddalumno">
          <input type="hidden" id="id_perido_escolar_activo">
          <input type="hidden" id="perido_escolar_activo">
          <!--SECUENCIAS-->
          <input type="hidden" id="id_secuencia_derecho">
          <input type="hidden" id="id_secuencia_psicologia">
          <input type="hidden" id="id_secuencia_criminalistica">
          <input type="hidden" id="id_secuencia_diseno">
          <input type="hidden" id="id_secuencia_contaduria">

          <input type="hidden" id="secuencia_derecho">
          <input type="hidden" id="secuencia_psicologia">
          <input type="hidden" id="secuencia_criminalistica">
          <input type="hidden" id="secuencia_diseno">
          <input type="hidden" id="secuencia_contaduria">
          <div class="row">
              <div class="col-sm-12">
                <label for="">Datos personales</label>
                  <div class="row">

                    <div class="col-8 col-sm-6">
                    <label for="">Nombre(s)</label>
                    <input type="text" class="form-control" id="nombre_alumno" placeholder="Nombre del alumno">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Apellido paterno</label>
                    <input type="text" class="form-control" id="apellidop_alumno" placeholder="Apellido paterno">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Apellido materno</label>
                    <input type="text" class="form-control" id="apellidom_alumno" placeholder="Apellido materno">
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
              <div class="col-sm-12">
                <label for="">Domicilio</label>
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="direccion_alumno" placeholder="Calle, número y colonia.">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Municipio</label>
                    <input type="text" class="form-control" id="municipio_alumno" placeholder="Municipio">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado_alumno" placeholder="Estado">
                    </div>
                  </div>
                 <br>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Fecha de nacimiento</label>
                    <input type="text" id="datepicker_fecha_nacimiento_alumno"/>
                     </div>
                     <div class="col-8 col-sm-6">
                    <label for="">Fecha de inscripcion</label>
                    <input type="text" id="datepicker_fecha_inscripcion_alumno"/>
                     </div>
                  </div>
                  <br>
                  <label for="">Lugar de nacimiento</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Localidad</label>
                    <input type="text" class="form-control" id="lugar_nacimiento_alumno" placeholder="localidad">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Municipio</label>
                    <input type="text" class="form-control" id="municipio_nacimiento_alumno" placeholder="municipio">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado_nacimiento_alumno" placeholder="estado">
                    </div>
                  </div>
                  <br>
                  <label for="">Estado civil y sexo</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                        <label for="">Estado civil</label>
                        <select background-color="red" id="estado_civil_alumno" class="form-select form-select-lg mb-3">
                        <option value="Soltero(a)">Soltero(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viudo(a)">Viudo(a)</option>
                        </select>
                    </div>
                      <div class="col-4 col-sm-6">
                              <label for="">Sexo</label>
                              <select background-color="red" id="sexo_alumno" class="form-select form-select-lg mb-3">
                              <option value="Masculino">Masculino</option>
                              <option value="Femenino">Femenino</option>
                              </select>
                     </div>
                  </div>
                  <br>
                  <label for="">Escuela de procedencia</label>
                  <div class="row">
                    <div class="col-8 col-sm-8">
                    <label for="">Nombre de la institución</label>
                    <input type="text" class="form-control" id="institucion_procedencia_alumno" placeholder="institución">
                    </div>
                    <div class="col-4 col-sm-4">
                        <label for="">Tipo de escuela nivel medio superior</label>
                        <select background-color="red" id="tipo_escuela_alumno" class="form-select form-select-lg mb-3">
                        <option value="Bachillerato">Bachillerato</option>
                        <option value="Equivalente">Equivalente</option>
                        </select>
                    </div>
                  </div>
                  <br>
                  <label for="">Datos de contacto</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" id="telefono_alumno" placeholder="telefono">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="email_alumno" placeholder="email">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Facebook</label>
                    <input type="text" class="form-control" id="facebook_alumno" placeholder="perfil de facebook">
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-4 col-sm-4">
                    <label for="">Twitter</label>
                    <input type="text" class="form-control" id="twitter_alumno" placeholder="perfil de twitter">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Instagram</label>
                    <input type="text" class="form-control" id="instagram_alumno" placeholder="perfil de instagram">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-6 col-sm-6">
                        <label for="">Licenciatura</label>
                        <select background-color="red" id="licenciaturas_alumno" class="form-select form-select-lg mb-3">
                        <option value="23">Derecho</option>
                        <option value="24">Psicología</option>
                        <option value="22">Criminalística, Criminología y Técnicas Periciales</option>
                        <option value="19">Diseño Gráfico</option>
                        <option value="21">Contaduría</option>
                        </select>
                     </div>
                     <div class="col-6 col-sm-6">
                            <label for="">Horarios</label>
                              <select background-color="red" id="horarios_alumno" class="form-select form-select-lg mb-3">
                              <option value="6">Lunes a Viernes 7:30 a 14:00</option><!--ESCOLARIZADO-->
                              <option value="1">Martes y Jueves 8:00 a 14:00</option><!--EJECUTIVO 1-->
                              <option value="2">Martes y Jueves 15:00 a 20:00</option><!--EJECUTIVO 2-->
                              <option value="3">Miércoles y Viernes 8:00 a 14:00</option><!--EJECUTIVO 3-->
                                <option value="4">Miércoles y Viernes 15:00 a 20:00</option><!--EJECUTIVO 4-->
                                <option value="5">Sábados 8:00 a 20:00</option><!--EJECUTIVO 5-->
                              </select>
                    </div>
                  </div>

                  <br>
                  <br>
                  <br>
                  <div class="col-4 col-sm-4">
                <div class="form-group">
                  <label for="customFile">Acta de nacimiento</label>
                  <input type="file" class="custom-file-input" id="acta_alumno">
                </div>
                </div>
                <div class="col-4 col-sm-4">
                <div class="form-group">
                  <label for="customFile">Certificado de bachillerato</label>
                  <input type="file" class="custom-file-input" id="certificado_alumno">
                </div>
                </div>
                <div class="col-4 col-sm-4">
                <div class="form-group">
                  <label for="customFile">CURP</label>
                  <input type="file" class="custom-file-input" id="curp_alumno">
                </div>
                </div>
                <div class="col-4 col-sm-4">
                <div class="form-group">
                  <label for="customFile">Certificado medico</label>
                  <input type="file" class="custom-file-input" id="certificado_medico_alumno">
                </div>
                </div>


              </div>
            </div>

                <!-- Image -->



                </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- Insert Button -->
              <button type="button" class="btn btn-primary" id="btnaddalumno">Agregar</button>
            </div>
          </div>
        </div>
      </div>
    <!--FIN DEL MODAL DE AGREGAR ALUMNO-->

      <!-- Modal Agregar nueuvo TUTOR -->
      <div class="modal fade" id="modaladdtutor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Agregar tutor</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Add Record Form -->
          <form id="formaddtutor">
          <!--input type="hidden" id="id_alumno">-->
          <div class="row">
              <div class="col-sm-12">
                <label for="">Datos personales</label>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Nombre(s)</label>
                    <input type="text" class="form-control" id="nombre_tutor" placeholder="Nombre del alumno">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Apellido paterno</label>
                    <input type="text" class="form-control" id="apellidop_tutor" placeholder="Apellido paterno">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Apellido materno</label>
                    <input type="text" class="form-control" id="apellidom_tutor" placeholder="Apellido materno">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-sm-12">
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">parentesco</label>
                    <input type="text" class="form-control" id="direccion_tutor" placeholder="Madre, padre, etc.">
                    </div>
                 </div>
              </div>
              </div>
              <br>
            <div class="row">
              <div class="col-sm-12">
                <label for="">Domicilio particular</label>
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="direccion_particular_tutor" placeholder="Calle, número y colonia.">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Municipio</label>
                    <input type="text" class="form-control" id="municipio_particular_tutor" placeholder="Municipio">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado_particular_tutor" placeholder="Estado">
                    </div>
                  </div>
                 <br>
                 <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" id="telefono_particular_tutor" placeholder="telefono">
                    </div>
                </div>
                <br>
                <label for="">Domicilio del trabajo</label>
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="direccion_trabajo_tutor" placeholder="Calle, número y colonia.">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Municipio</label>
                    <input type="text" class="form-control" id="municipio_trabajo_tutor" placeholder="Municipio">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado_trabajo_tutor" placeholder="Estado">
                    </div>
                  </div>
                 <br>
                 <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" id="telefono_trabajo_tutor" placeholder="telefono">
                    </div>
                </div>

            </div>
                </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- Insert Button -->
              <button type="button" class="btn btn-primary" id="btnaddtutor">Agregar</button>
            </div>
          </div>
        </div>
      </div>
    <!--FIN DEL MODAL DE AGREGAR TUTOR-->
    </div>
  </div>

<!--MODAL EDITAR ALUMNO-->
<div class="modal fade" id="modaleditalumno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Editar alumno</strong>
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
            <form id="formeditalumno">
            <div class="row">
              <div class="col-sm-12">
                <label for="">Datos personales</label>
                  <div class="row">
                  <input type="hidden" id="numero_control_update">
                    <div class="col-8 col-sm-6">
                    <label for="">Nombre(s)</label>
                    <input type="text" class="form-control" id="nombre_alumno_update" placeholder="Nombre del alumno">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Apellido paterno</label>
                    <input type="text" class="form-control" id="apellidop_alumno_update" placeholder="Apellido paterno">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Apellido materno</label>
                    <input type="text" class="form-control" id="apellidom_alumno_update" placeholder="Apellido materno">
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
              <div class="col-sm-12">
                <label for="">Domicilio</label>
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="direccion_alumno_update" placeholder="Calle, número y colonia.">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Municipio</label>
                    <input type="text" class="form-control" id="municipio_alumno_update" placeholder="Municipio">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado_alumno_update" placeholder="Estado">
                    </div>
                  </div>
                 <br>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Fecha de nacimiento</label>
                    <input type="text" id="datepicker_fecha_nacimiento_alumno_update"/>
                     </div>
                     <div class="col-8 col-sm-6">
                    <label for="">Fecha de inscripcion</label>
                    <input type="text" id="datepicker_fecha_inscripcion_alumno_update"/>
                     </div>
                  </div>
                  <br>
                  <label for="">Lugar de nacimiento</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Localidad</label>
                    <input type="text" class="form-control" id="lugar_nacimiento_alumno_update" placeholder="localidad">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Municipio</label>
                    <input type="text" class="form-control" id="municipio_nacimiento_alumno_update" placeholder="municipio">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado_nacimiento_alumno_update" placeholder="estado">
                    </div>
                  </div>
                  <br>
                  <label for="">Estado civil y sexo</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                        <label for="">Estado civil</label>
                        <select background-color="red" id="estado_civil_alumno_update" class="form-select form-select-lg mb-3">
                        <option value="Soltero(a)">Soltero(a)</option>
                        <option value="Casado(a)">Casado(a)</option>
                        <option value="Divorciado(a)">Divorciado(a)</option>
                        <option value="Viudo(a)">Viudo(a)</option>
                        </select>
                    </div>
                      <div class="col-4 col-sm-6">
                              <label for="">Sexo</label>
                              <select background-color="red" id="sexo_alumno_update" class="form-select form-select-lg mb-3">
                              <option value="Masculino">Masculino</option>
                              <option value="Femenino">Femenino</option>
                              </select>
                     </div>
                  </div>
                  <br>
                  <label for="">Escuela de procedencia</label>
                  <div class="row">
                    <div class="col-8 col-sm-8">
                    <label for="">Nombre de la institución</label>
                    <input type="text" class="form-control" id="institucion_procedencia_alumno_update" placeholder="institución">
                    </div>
                    <div class="col-4 col-sm-4">
                        <label for="">Tipo de escuela nivel medio superior</label>
                        <select background-color="red" id="tipo_escuela_alumno_update" class="form-select form-select-lg mb-3">
                        <option value="Bachillerato">Bachillerato</option>
                        <option value="Equivalente">Equivalente</option>
                        </select>
                    </div>
                  </div>
                  <br>
                  <label for="">Datos de contacto</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" id="telefono_alumno_update" placeholder="telefono">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="email_alumno_update" placeholder="email">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Facebook</label>
                    <input type="text" class="form-control" id="facebook_alumno_update" placeholder="perfil de facebook">
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-4 col-sm-4">
                    <label for="">Twitter</label>
                    <input type="text" class="form-control" id="twitter_alumno_update" placeholder="perfil de twitter">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Instagram</label>
                    <input type="text" class="form-control" id="instagram_alumno_update" placeholder="perfil de instagram">
                    </div>
                  </div>
                  <br>

                  <br>
                  <br>
                  <br>
                  <div class="col-4 col-sm-4">
                <div class="form-group">
                  <label for="customFile">Acta de nacimiento</label>
                  <input type="file" class="custom-file-input" id="acta_alumno_update">
                </div>
                </div>
                <div class="col-4 col-sm-4">
                <div class="form-group">
                  <label for="customFile">Certificado de bachillerato</label>
                  <input type="file" class="custom-file-input" id="certificado_alumno_update">
                </div>
                </div>
                <div class="col-4 col-sm-4">
                <div class="form-group">
                  <label for="customFile">CURP</label>
                  <input type="file" class="custom-file-input" id="curp_alumno_update">
                </div>
                </div>
                <div class="col-4 col-sm-4">
                <div class="form-group">
                  <label for="customFile">Certificado medico</label>
                  <input type="file" class="custom-file-input" id="certificado_medico_alumno_update">
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
              <button type="button" class="btn btn-primary" id="update_alumno">Actualizar</button>
            </div>
          </div>
        </div>
      </div>
<!--MODAL EDITAR ALUMNO-->

<!--MODAL VER ALUMNO -->

<!-- Modal Agregar nueuvo alumno -->
<div class="modal fade" id="modalviewalumno" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Información del alumno</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                <label for="">Datos personales</label>
                <div class="row">
                <div class="col-8 col-sm-6">
                <input type="text" class="form-control" id="numero_control_view" placeholder="Numero de control">
                </div>
                </div>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Nombre(s)</label>
                    <input type="text" class="form-control" id="nombre_alumno_view" placeholder="Nombre del alumno">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Apellido paterno</label>
                    <input type="text" class="form-control" id="apellidop_alumno_view" placeholder="Apellido paterno">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Apellido materno</label>
                    <input type="text" class="form-control" id="apellidom_alumno_view" placeholder="Apellido materno">
                    </div>
                  </div>
                </div>
              </div>
              <br>
            <div class="row">
              <div class="col-sm-12">
                <label for="">Domicilio</label>
                 <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Dirección</label>
                    <input type="text" class="form-control" id="direccion_alumno_view" placeholder="Calle, número y colonia.">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Municipio</label>
                    <input type="text" class="form-control" id="municipio_alumno_view" placeholder="Municipio">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado_alumno_view" placeholder="Estado">
                    </div>
                  </div>
                 <br>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Fecha de nacimiento</label>
                    <input type="text" class="form-control" id="fecha_nacimiento_alumno_view"/>
                     </div>
                     <div class="col-8 col-sm-6">
                    <label for="">Fecha de inscripcion</label>
                    <input type="text" class="form-control" id="fecha_inscripcion_alumno_view"/>
                     </div>
                  </div>
                  <br>
                  <label for="">Lugar de nacimiento</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Localidad</label>
                    <input type="text" class="form-control" id="lugar_nacimiento_alumno_view" placeholder="localidad">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Municipio</label>
                    <input type="text" class="form-control" id="municipio_nacimiento_alumno_view" placeholder="municipio">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Estado</label>
                    <input type="text" class="form-control" id="estado_nacimiento_alumno_view" placeholder="estado">
                    </div>
                  </div>
                  <br>
                  <label for="">Estado civil y sexo</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Estado civil</label>
                    <input type="text" class="form-control" id="estado_civil_alumno_view" placeholder="estado">
                    </div>
                      <div class="col-4 col-sm-6">
                              <label for="">Sexo</label>
                              <input type="text" class="form-control" id="sexo_alumno_view" placeholder="estado">
                     </div>
                  </div>
                  <br>
                  <label for="">Escuela de procedencia</label>
                  <div class="row">
                    <div class="col-8 col-sm-8">
                    <label for="">Nombre de la institución</label>
                    <input type="text" class="form-control" id="institucion_procedencia_alumno_view" placeholder="institución">
                    </div>
                    <div class="col-4 col-sm-4">
                        <label for="">Tipo de escuela nivel medio superior</label>
                        <input type="text" class="form-control" id="tipo_escuela_alumno_view" placeholder="estado">
                    </div>
                  </div>
                  <br>
                  <label for="">Datos de contacto</label>
                  <div class="row">
                    <div class="col-4 col-sm-4">
                    <label for="">Telefono</label>
                    <input type="text" class="form-control" id="telefono_alumno_view" placeholder="telefono">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="email_alumno_view" placeholder="email">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Facebook</label>
                    <input type="text" class="form-control" id="facebook_alumno_view" placeholder="perfil de facebook">
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-4 col-sm-4">
                    <label for="">Twitter</label>
                    <input type="text" class="form-control" id="twitter_alumno_view" placeholder="perfil de twitter">
                    </div>
                    <div class="col-4 col-sm-4">
                    <label for="">Instagram</label>
                    <input type="text" class="form-control" id="instagram_alumno_view" placeholder="perfil de instagram">
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-6 col-sm-6">
                        <label for="">Licenciatura</label>
                        <input type="text" class="form-control" id="licenciaturas_alumno_view">
                     </div>
                     <div class="col-6 col-sm-6">
                            <label for="">Horario</label>
                            <input type="text" class="form-control" id="horarios_alumno_view">
                    </div>
                  </div>
              </div>
            </div>
             </div>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
    <!--FIN DEL MODAL DE AGREGAR ALUMNO-->

<!--MODAL VER ALUMNO -->

  <div class="row my-4">
    <div class="col-md-12 mx-auto">

      <!-- <table class="table table-borderless" id="tbl_regPagos" style="width:100%"> -->
      <table id="tbl_alumnos_inscripcion" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="text-center bg-primary">
          <tr>
            <th>Numero de control</th>
            <th>Alumno</th>
            <th class="text-center" width="7%">Acta</th>
            <th class="text-center" width="7%">Certificado</th>
            <th class="text-center" width="7%">Curp</th>
            <th class="text-center" width="7%">Cert. medico</th>
            <th class="text-center" width="7%">Acciones</th>
            <th class="text-center" width="7%">Información</th>
            <th class="text-center" width="7%">S. Social</th>
            <th class="text-center" width="7%">P. Profes</th>
            <th class="text-center" width="7%">Titulación</th>
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

</body>
</html>
