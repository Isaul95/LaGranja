
    <div class="content-wrapper colorfondo" > <!-- STAR ALL CONTENT -->
            <!-- Main content -->
            <section class="content" >
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">

<!-- AKI EMPIEZA LOMMIOO LO NUEVO -->

<div class="container" >

<section class="contenido">
  <div class="row">

    <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_Colegiaturas" data-toggle="tab">Comprobante de pagos</a></li>
          <li><a id="tab-consultar" href="#tab_Cursos" data-toggle="tab">Historial de pagos</a></li>
          <li><a href="#tab_Extraordinario" data-toggle="tab">Avance Reticular</a></li>
          <li><a href="#Elegir_materias" data-toggle="tab">Selección de materias</a></li>
          <li><a href="#tab_consultaDocumentos" data-toggle="tab">Consulta Documentos</a></li>

      </ul>

      <div class="tab-content"> <!-- INICIO DEL CONYENDOR DEL BODY  -->

<!--   ===============================         1- TAB UNO         ==========================================     -->
          <div class="tab-pane  active" id="tab_Colegiaturas">
                <div class="row">
                  <div class="col-md-12 mt-5">
                    <h3 class="text-center">
                    <strong><font color="#D34787">Subir Comprobante de pago</font></strong>
                  </h3>
                    <hr style="background-color: black; color: black; height: 1px;">
                  </div>
                </div>

                <div class="modal-dialog" id="formularioRegistroBaucher">
                  <div class="modal-content">
                    <div class="modal-body">

                  <form id="formularioaltaBaucher">

                        <div class="form-group">
                          <label for="">Número de control: *</label>
                          <input type="text" class="form-control" id="numero_control" readonly value="<?php echo $username;?>" >
                        </div>
                        <?php foreach($datosTxt as $datosTxtAlumn):?>
                        <div class="form-group">
                            <label for="">Nombre Alumno: *</label>
                            <input type="text" class="form-control" id="nameCompletoAlumno" readonly value="<?php echo $datosTxtAlumn->nombre_completo;?>" >
                        <?php endforeach;?>
                        </div>

                        <!-- <div class="form-group">
                          <label for="">Semestre: *</label>
                          <input type="text" class="form-control" id="semestre" readonly>
                        </div> -->

                        <div class="form-group">
                            <label for="">Tipo de pago:</label>
                            <select name="pago" id="pago" class="form-control">
                            <option value="" selected>Seleccione un pago...</option>
                                <?php foreach($tipoDePagos as $pago):?>
                                    <option value="<?php echo $pago->id_tipo_pago;?>"><?php echo $pago->pago;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <!-- file -->
                        <div class="form-group">
                          <label for="customFile">Adjuntar archivo: *</label>
                          <input type="file" class="custom-file-input" id="archivo">
                        </div>

                      </form>
                        </div>
                        <div class="modal-footer">

                          <?php if($permisos->insert == 1):?>
                                <button type="button" class="btn btn-primary" id="darAltaBaucher">Agregar Pago</button>
                          <?php endif;?>
                        </div>
                      </div>
                    </div>


              <!-- *****************  EL DIV DE LA OPCION DEL ICONO PARA LA DESCARGA DEL BAUCHER *******************  -->
                  <div class="modal-dialog" id="baucherPdf">
                    <center>
                      <h4><font color="#3498DB">Comprobante de pago registrado con éxito</font></h4> <br>

                       <!--<div class="row" id="divDatosParcialidad">
                         <div class="col-8 col-sm-6">
                         <label for="">Fue un pago realizado en:</label>
                         <input type="text" class="form-control text-center" id="parcialidadPago" readonly >
                         </div>
                         <div class="col-4 col-sm-6">
                         <label for="">Fecha limite de pago:</label>
                         <input type="text" class="form-control text-center" id="fechaLimitePago" readonly >
                         </div>
                       </div>
                           <div class="row" id="divSinDatosParcialidad">
                             <label for="">El pago fue realizado en una sola exhibición</label>
                           </div>

                           <div class="row" id="xtre">
                             <label for="">Comprobante de pago en proceso de validación</label>
                           </div>-->

                     </center> <br> <br>
                     <strong><font color="#E74C3C">NOTA: Para hacer el cambio del comprobante, es necesario notificar al departamento de finanzas</font></strong> <br>
                  </div>
          </div>


<!--   ===============================         2- TAB DOS         ==========================================     -->

          <div class="tab-pane" id="tab_Cursos">
            <div class="row">
              <div class="col-md-12 mt-5">
                <h1 class="text-center">
                <strong><font color="#D34787">Historial de pagos realizados</font></strong>
                </h1>
                <hr style="background-color: black; color: black; height: 1px;">
              </div>
            </div>

            <div class="row">
              <div class="col-10 col-sm-12">
                             <div class="row">
                               <div class="col-4 col-sm-4">
                                   <label for="">Semestre: </label>
                                   <select background-color="red" id="combo_Semestres_HistPagosAlumnos" class="form-control">
                                     <option value="" selected>Seleccione un semestre...</option>
                                   </select>
                               </div>

                                <div class="col-4 col-sm-4">
                                    <label for="">Tipo de pagos: </label>
                                    <select background-color="red" id="combo_TipoDePagos_HistPagosAlumnos" class="form-control">
                                      <option value="" selected>Seleccione un tipo de pago...</option>
                                    </select>
                                </div>

                              </div>
                              <br>
                </div>
              </div>

            <hr style="background-color: black; color: black; height: 1px;">

              <div class="row my-4">
                <div class="col-md-12 mx-auto">
                  <table id="tbl_histPagosRealizadosXAlumno" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
                    <thead class="text-center bg-primary">
                      <tr>
                        <th width="3%">#</th>
                        <th class="text-center">Nombre<br>Completo</th>
                        <th>No. Control</th>
                        <th class="text-center">Carrera</th>
                        <th class="text-center">Fecha registro</th>
                        <th>Tipo de Pago</th>
                        <th class="text-center">Ver Baucher</th>
                        <th class="text-center">Horario</th>
                        <th class="text-center">Estado</th>
                        <th>Recibo de Pago</th>
                        <th>Constancia</th>
                        <th>Parcialidad pago</th>
                        <th class="text-center">Fecha limite</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
          </div>


<!--   ====================         3- TAB TRES     Avance Reticular    ========================     -->
          <div class="tab-pane" id="tab_Extraordinario">
            <div class="col-lg-4"></div>

<br>
<?php foreach($datosTxt as $datosTxt):?>
  <div class="row">

    <div class="col-sm-12">
      <div for="" class="text-center bg-primary"><strong>Datos Personales</strong></div>
      <br>
       <div class="row">
          <div class="col-8 col-sm-6">
          <label for="">Nombre Completo:</label>
      <input type="text" class="form-control" id="nameCompletoAlum" readonly value="<?php echo $datosTxt->nombre_completo;?>" >
          </div>
          <div class="col-4 col-sm-3">
          <label for="">No. Control:</label>
          <input type="text" class="form-control text-center" id="num_controlAlum" readonly value="<?php echo $datosTxt->numero_control;?>" >
          </div>
          <div class="col-4 col-sm-3">
          <label for="">Semestre:</label>
<input type="text" class="form-control" id="semestreAlum" readonly value="<?php echo $datosTxt->semestre;?>" >
          </div>
        </div>
        <div class="row">
          <div class="col-8 col-sm-6">
          <label for="">Carrera:</label>
          <input type="text" class="form-control" id="carreraAlum" readonly value="<?php echo $datosTxt->carrera_descripcion;?>" >
          </div>
          <div class="col-4 col-sm-3">
          <label for="">Periodo Ecolar:</label>
          <input type="text" class="form-control text-center" id="periodoAlum" readonly value="<?php echo $datosTxt->nombre_ciclo;?>" >
          </div>
        </div>
<input type="hidden" id="detalleId" name="detalleId" value="<?php echo $datosTxt->id_detalle;?>" >
<input type="hidden" id="opcion_estudio" name="opcion_estudio" value="<?php echo $datosTxt->opcion;?>" >
<input type="hidden" id="id_carrera" name="id_carrera" value="<?php echo $datosTxt->id_carrera;?>" >
    </div>

  </div>
  <?php endforeach;?>
<br>

  <div class="row">

     <div class="col-2 col-sm-3">
    <label for="">     Materia Reprobado</label>
     <input type="text" class="bg-red" readonly>
     </div>

     <div class="col-2 col-sm-3">
       <label for="">Materia Acreditada</label>
     <input type="text" class="bg-success" readonly>
     </div>

     <div class="col-2 col-sm-3">
       <label for="">Materia por Cursar</label>
     <input type="text" class="bg-info" readonly>
     </div>

     <div class="col-2 col-sm-3">
       <label for="">Calificación pendiente</label>
     <input type="text" class="bg-yellow" readonly>
     </div>

   </div>

   <br><br><br>



  <div class="container">

    <div class="row">
      <div class="col-8 col-sm-4">
        <label for="">Seleccione semestres cursadas: </label>
        <select background-color="red" id="combo_semestres_cursados" class="form-control">
        <!-- <option value="" selected>Seleccione un semestre...</option> -->
        </select>
      </div>
    </div>

   <br>

<center>
  <div class="row my-4">
    <div class="col-md-12 mx-auto">
      <table id="tbl_avanceRetucularMateriasCursadas" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important" width="100%" >
        <thead class="text-center bg-primary">
          <tr>
            <th> MATERIAS CURSADAS </th>
            <th>CALIFICACIÓN</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</center>
  </div>

<br><br>

              <div class="row">
                <div class="col-8 col-sm-4">
                  <label for="">Seleccione semestre por cursar: </label>
                  <select background-color="red" id="combo_semestres" class="form-control">
                  <option value="" selected>Seleccione un semestre...</option>
                  </select>
                </div>
              </div>
              <br>

              <div class="row my-4">
                <div class="col-md-12 mx-auto">
                  <table id="tbl_avanceRetucular" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important" >
                    <thead class="text-center bg-primary">
                      <tr>
                        <!-- <th>ID MATERIA</th> width="100%" -->
                        <th class="text-center"> MATERIAS POR CURSAR </th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>

          </div>




<!--   ===============================         1- TAB CINCO         ==========================================     -->

        <div class="tab-pane" id="Elegir_materias">
                    <input type="hidden" id="licenciatura">
                    <input type="hidden" id="opcion">
                    <input type="hidden" id="semestre">
                    <input type="hidden" id="periodo_escolar_activo">

                  <div class="col-md-12 mt-5">
                    <h1 class="text-center">
                    <strong><font color="#D34787">Elegir materias</font></strong>
                    </h1>
                    <hr style="background-color: black; color: black; height: 1px;">
                  </div>

            <br>
            <br>
            <br>
            <div  id="SeleccionHorario"> <!--SELECCIÓN DE MATERIAS-->

                  <div class="row"> <!--BOTON-->
                    <div class="col-8 col-sm-6">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="elegirmaterias">Seleccionar materias</button>
                    </div>
                   </div><!--BOTON-->
                   <br>
              <div class="row my-4"><!--TABLA-->
                <div class="col-md-12 mx-auto">
                  <table id="tbl_elegir_materias" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                    <thead class="text-center bg-primary">
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Materia</th>
                        <th>Profesor</th>
                        <th>Carrera</th>
                        <th>Opcion</th>
                        <th>Semestre</th>
                        <th>Ciclo</th>
                        <th>Horario</th>
                        <th class="text-center" width="7%">Acciones</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div><!--TABLA-->
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              <div class="row my-4"><!--TABLA-->
                <div class="col-md-12 mx-auto">
                  <table id="tbl_materias_elegidas" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                    <thead class="text-center bg-primary">
                      <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Materia</th>
                        <th>Profesor</th>
                        <th>Carrera</th>
                        <th>Opcion</th>
                        <th>Semestre</th>
                        <th>Ciclo</th>
                        <th>Horario</th>
                        <th class="text-center" width="7%">Acciones</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div><!--TABLA-->
              <div class="row"> <!--BOTÓN-->
                    <div class="col-8 col-sm-6">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="confirmar_horario_elegir_materias">Confirmar horario</button>
                    </div>
                   </div><!--BOTÓN-->

            </div> <!--SELECCIÓN DE MATERIAS-->
            <div class="modal-dialog" id="HorarioSeleccionado">
                <div class="modal-content"> <!---MODAL CONTENT -->
                    <div class="modal-body"><!---MODAL BODY-->
                    <center>
                      <h3><font color="#3498DB">Horario ya seleccionado</font></h3> <br> <br>
                     <a href="AltaBaucherBanco/verBaucher/<?php echo $username;?>" target="_blank">
                       <i class="far fa-file-pdf fa-2x"></i></a>
                     </center> <br> <br>
                     <strong><font color="#E74C3C">Nota: para cualquier aclaración favor de verlo con administrativos</font></strong> <br>
                     </div><!--MODAL BODY SELECCIÓN DE MATERIAS-->
                  </div> <!--MODAL CONTENT SELECCIÓN DE MATERIAS-->
            </div> <!--SELECCIÓN DE MATERIAS-->


      </div>  <!-- FIN DEL CONTENEDOR DEL BODY  -->


<!--   ===============================         5- TAB consulta de documentos de alumnos         =================================     -->

                <div class="tab-pane" id="tab_consultaDocumentos">
                  <div class="row">
                    <div class="col-md-12 mt-5">
                      <h1 class="text-center">
                      <strong><font color="#D34787">Consultar Documentos</font></strong>
                      </h1>
                      <hr style="background-color: black; color: black; height: 1px;">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-10 col-sm-12">
                                   <div class="row">
                                     <div class="col-4 col-sm-4">
                                         <label for="">Semestre: </label>
                                         <select background-color="red" id="combo_SemestresGenerarDocumentsAlumnos" class="form-control">
                                           <option value="" selected>Seleccione un semestre...</option>
                                         </select>
                                     </div>

                                    </div>
                                    <br>
                      </div>
                    </div>

                  <hr style="background-color: black; color: black; height: 1px;">

                    <div class="row my-4">
                      <div class="col-md-12 mx-auto">


                        <table id="tbl_generarDocumentsAlumnoTREBWWWW" class="table table-striped table-bordered table-hover table-condensed" cellspacing="0" style="background:white!important">
                          <thead class="text-center bg-primary">
                            <tr>
                              <th class="text-center">Numero de control</th>
                              <th class="text-center">Alumno</th>
                              <!-- <th class="text-center" width="7%">Semestre</th>
                              <th>Carrera</th> -->
                              <th class="text-center" width="12%">Cert. Estudios</th>
                              <!-- <th class="text-center" width="7%">Boleta</th> -->
                              <!-- <th class="text-center" width="7%">Hist. academico</th> -->
                              <th class="text-center" width="12%">Horario</th>
                              <th class="text-center" width="12%">Constancia</th>
                            </tr>
                          </thead>
                        </table>


                      </div>
                    </div>
                </div>



  </div>

</section>


</div>

<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->




                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- / MAIN content -->




    </div> <!-- /END ALL CONTENT -->
