
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
         
          <li class="active"><a href="#Elegir_materias" data-toggle="tab">Horario de alumnos</a></li>
         
      </ul>
      <!--<?php if($permisos->insert == 1):?>
                               
                                <?php endif;?>-->
      
      <div class="tab-content"> <!-- INICIO DEL CONYENDOR DEL BODY  -->

<!--   ===============================         1- TAB CINCO         ==========================================     -->

        <div class="tab-pane active" id="Elegir_materias">
                   
                    <input type="hidden" id="periodo_escolar_activo_admin">
                    <input type="hidden" id="detalle_alumno_horario_admin">

                  <div class="col-md-12 mt-5">
                    <h1 class="text-center">
                    <strong><font color="#D34787">Horario de alumnos</font></strong>
                    </h1>
                    <hr style="background-color: black; color: black; height: 1px;">
                  </div>

            <br>
            <br>
            <br>
            <div  id="SeleccionHorario_admin"> <!--SELECCIÓN DE MATERIAS-->
            <br> 
            <br>
            <br>
            <br>
            <br>
            <div class="row">
  <div class="col-10 col-sm-12">        
                  <div class="row">
                    <div class="col-4 col-sm-8">
                      <label for="">Seleccione alguna carrera: </label>
                    <select background-color="red" id="elcombo_carreras_horarioalumno_admin" class="form-control"><option value="" selected>Seleccione una carrera</option></select>
                    </div>

                    <div class="col-4 col-sm-4">
                        <label for="">Semestre: </label>
                        <select background-color="red" id="elcombo_semestre_horarioalumno_admin" class="form-control"><option value="" selected>Seleccione un semestre</option></select>
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
                    <select background-color="red" id="elcombo_opciones_horarioalumno_admin" class="form-control"><option value="" selected>Seleccione una opción de estudio</option></select>
                    </div>
                  </div>
                  <br>
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->
                   <br>
                   <br> 
            <br>
            
                   <div class="row my-4"><!--TABLA-->
                <div class="col-md-12 mx-auto">
                  <table id="tbl_alumno_elegir_materias_admin" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                    <thead class="text-center bg-primary">
                      <tr>
                        <th></th>
                        <th>Número de control</th>
                        <th>Alumno</th>
                        <th class="text-center" width="7%">Ver horario</th>
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
              <h2 class="text-center">
                    <strong><font color="#D34787">Alumno seleccionado</font></strong>
                    </h2>
              <br>
              <div class="row">
  <div class="col-10 col-sm-12">        
                  <div class="row">
                    <div class="col-4 col-sm-8">
                      <label for="">Numero de control: </label>
                      <input type="text" class="form-control" id="numero_control_alumno_horario_admin" readonly>
                       </div>

                    <div class="col-4 col-sm-4">
                        <label for="">Alumno: </label>
                        <input type="text" class="form-control" id="nombre_alumno_horario_admin" readonly>
                    </div>
                  </div> <!--END OF SECOND ROW--> 
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->
  <br>
  <br>
              <br>
              <br>
              <br>
              <h2 class="text-center">
                    <strong><font color="#D34787">Materias disponibles para elegir</font></strong>
                    </h2>
                    <br>
               <br>
              <br>
              <div class="row my-4"><!--TABLA-->
                <div class="col-md-12 mx-auto">
                  <table id="tbl_elegir_materias_admin" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                    <thead class="text-center bg-primary">
                      <tr>
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
              <br>
              <h2 class="text-center">
                    <strong><font color="#D34787">Materias elegidas</font></strong>
                    </h2>
                    <br>
              <div class="row my-4"><!--TABLA-->
                <div class="col-md-12 mx-auto">
                  <table id="tbl_materias_elegidas_admin" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
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
              <div class="row"> <!--BOTÓN-->
                    <div class="col-8 col-sm-6">
                    <button type="button" class="btn btn-primary btn-sm btn-block" id="confirmar_horario_elegir_materias_admin">Confirmar horario</button>
                    </div>
                   </div><!--BOTÓN-->

            </div> <!--SELECCIÓN DE MATERIAS-->

            <div class="modal-dialog" id="HorarioSeleccionado_admin">
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
