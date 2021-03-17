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
      <strong><font color="#D34787">EVALUACIÓN ALUMNO - DOCENTE CESVI</font></strong>
    </h3>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="row">
          <div class="col-md-12">
            Este cuestionario se solicita sea contestado de manera responsable, atendiendo con sentido critico y justo las situaciones que se piden, ya que nos permitirà brindarles un mejor servicio, de calidad como lo merecen.
          </div>
      </div>
<hr> <!-- Le da una linea sombreada para ver la divicion -->


<!--   TABLA  -->
 <div class="row my-4">
    <div class="col-md-12 mx-auto">

      <h3>
      <strong>Evaluación</strong>
    </h3>
    <div class="row">
        <div class="col-md-12">
          Esta actividad tiene la finalidad de conocer desde la perspectiva del alumno, la forma y dinámica de trabajo que tiene el docente para con los alumnos, esto con la intención de tomar acciones en respuesta a las necesidades que se detecten.
        </div>
    </div>
      <hr>

<br>
<?php foreach($datosAlumno as $datosAlumno):?>
  <div class="row">

    <div class="col-sm-12">
      <br>
       <div class="row">
          <div class="col-8 col-sm-6">
          <label for="">Nombre Completo:</label>
      <input type="text" class="form-control" id="nameAlumnoEncuesta" readonly value="<?php echo $datosAlumno->nombre_completo;?>" >
          </div>
          <div class="col-4 col-sm-3">
          <label for="">Modalidad estudios:</label>
          <input type="text" class="form-control text-center" id="opcionAlumnoEncuesta" readonly value="<?php echo $datosAlumno->descripcion;?>" >
          </div>
          <div class="col-2 col-sm-2">
          <label for="">Semestre:</label>
<input type="text" class="form-control" id="semestreAlumnoEncuesta" readonly value="<?php echo $datosAlumno->semestre;?>" >
          </div>
          <div class="col-8 col-sm-6">
          <label for="">Carrera:</label>
          <input type="text" class="form-control" id="carreraAlumnoEncuesta" readonly value="<?php echo $datosAlumno->carrera_descripcion;?>" >
          </div>

<input type="hidden" id="nuControl" name="nuControl" value="<?php echo $datosAlumno->numero_control;?>" >
        </div>

    </div>

  </div>
  <?php endforeach;?>
<br>


    <form id="formulariEncuesta" class="formulario">

     <!-- <div class="radio" id="lic" >

        <p> Licenciatura </p>

           <input type="radio" name="licenciatura" id="licenciatura">
           <label for="Derecho">Derecho</label>                       <br/>
!-- value="1" --
           <input type="radio" name="licenciatura" id="licenciatura">
           <label for="CCTP">CCTP</label>                              <br/>
!-- value="2" --
           <input type="radio" name="licenciatura" id="licenciatura">
           <label for="Administracion">Administración</label>          <br/>
!-- value="3" --
           <input type="radio" name="licenciatura" id="licenciatura">
           <label for="Conta">Contaduría</label>                       <br/>
!-- value="4" --
           <input type="radio" name="licenciatura" id="licenciatura">
           <label for="Psicologia">Psicología</label>                       <br/>
!-- value="5" --
           <input type="radio" name="licenciatura" id="licenciatura">
           <label for="DisenioGrafico">Diseño Grafico</label>
!-- value="6" --
  </div>
<br/><br/> -->

 <!-- <div class="radio" id="semestre">
           <p> Semestre </p>

          <input type="radio" name="semestre"  id="semestre">
          <label for="1 Semestre">1 Semestre</label>   <br />
!-- value="7" --
          <input type="radio" name="semestre"  id="semestre">
          <label for="2 Semestre">2 Semestre</label>   <br />
!-- value="8" --
          <input type="radio" name="semestre"  id="semestre">
          <label for="3 Semestre">3 Semestre</label>   <br />
!-- value="9" --
          <input type="radio" name="semestre"  id="semestre">
          <label for="4 Semestre">4 Semestre</label>   <br />
!-- value="10" --
          <input type="radio" name="semestre"  id="semestre">
          <label for="5 Semestre">5 Semestre</label>   <br />
!-- value="11" --
          <input type="radio" name="semestre"  id="semestre">
          <label for="6 Semestre">6 Semestre</label>   <br />
!-- value="12" --
          <input type="radio" name="semestre"  id="semestre">
          <label for="7 Semestre">7 Semestre</label>   <br />
!-- value="13" --
           <input type="radio" name="semestre"  id="semestre">
          <label for="8 Semestre">8 Semestre</label>   <br />
!-- value="14" --
           <input type="radio" name="semestre" id="semestre">
          <label for="9 Semestre">9 Semestre</label>
!-- value="15" --
      </div>

<br/><br/> -->

      <!-- <div class="radio" id="modalidadDiv" >

        <p> Modalidad de estudio </p>
             <input type="radio" name="modalidad"  id="modalidad">
             <label for="Martes y Jueves 7:00 pm a 1:00 pm">Martes y Jueves 7:00 pm a 1:00 pm</label>    <br />
!-- value="16" --
             <input type="radio" name="modalidad"  id="modalidad">
             <label for="Martes y Jueves 3:00 pm a 9:00 pm">Martes y Jueves 3:00 pm a 9:00 pm</label>    <br />
!-- value="17" --
             <input type="radio" name="modalidad"  id="modalidad">
             <label for="Miercoles y Viernes 3:00 pm a 9:00 pm">Miercoles y Viernes 3:00 pm a 9:00 pm</label>    <br />
!-- value="18" --
             <input type="radio" name="modalidad"  id="modalidad">
             <label for="Sàbado 8:00 pm a 8:00 am">Sàbado 8:00 am a 8:00 pm</label>
!-- value="19" --
      </div> -->

      <div class="radio" >
        <h3>
        <strong>Docente</strong>
      </h3>
      <div class="row">
          <div class="col-md-12">
            Enfoque para conocer la perspectiva del alumno en la forma de trabajo docente.
          </div>
      </div>
        <hr>

        <label> Nombre del docente </label>
        <input type="hidden" id="pregunta01" name="pregunta01" value="1" >
        <br>

        <input type="radio" name="docente" value="1" id="docente">
            <label for="Alfoso Rojas Rodrìguez">Alfonso Rojas Rodrìguez</label>    <br />

            <input type="radio" name="docente" value="2" id="docente">
            <label for="Arcadio Sànchez Rebollar">Arcadio Sànchez Rebollar</label>    <br />

            <input type="radio" name="docente" value="3" id="docente">
            <label for="Carolina Nava Laureano">Carolina Nava Laureano</label>     <br />

            <input type="radio" name="docente" value="4" id="docente">
            <label for="Celia Guadalupe Espinoza Guerra">Celia Guadalupe Espinoza Guerra</label>     <br />

            <input type="radio" name="docente" value="5" id="docente">
            <label for="Claudia Santiago Romàn">Claudia Santiago Romàn</label>     <br />

            <input type="radio" name="docente" value="6" id="docente">
            <label for="Columba Acosta Viquez Ortiz">Columba Acosta Viquez Ortiz</label>     <br />

            <input type="radio" name="docente" value="7" id="docente">
            <label for="Edgar Emilio Giles Brito">Edgar Emilio Giles Brito</label>     <br />

            <input type="radio" name="docente" value="8" id="docente">
            <label for="Eli Flores Tellez">Eli Flores Tellez</label>     <br />

            <input type="radio" name="docente" value="9" id="docente">
            <label for="Erik Eduardo Gamboa Salgado">Erik Eduardo Gamboa Salgado</label>


      </div>

      <br/><br/>


      <div class="radio">
<input type="hidden" id="pregunta02" name="pregunta02" value="2" >

        <p>
          ¿El docente mostro los lineamientos y temas a seguir en su forma de evaluar?
        </p>

         <input type="radio" name="lineamientos" value="excelente" id="lineamientos">
         <label for="Exelente">Excelente</label>
         <br />

         <input type="radio" name="lineamientos" value="bien" id="lineamientos">
         <label for="Bien">Bien</label>
         <br />

         <input type="radio" name="lineamientos" value="regular" id="lineamientos">
         <label for="Regular">Regular</label>
         <br />

          <input type="radio" name="lineamientos" value="mal" id="lineamientos">
         <label for="Mal">Mal</label>


     </div>




    </form>


        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="guardarRespuestas">Guardar</button>
        </div>


      <!-- <table id="tbl_carreras" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="text-center bg-primary">
          <tr>
            <th width="3%" type="hidden">#</th>
            <th>Licenciatura</th>
            <th>Clave</th>
            <th>Fecha</th>
            <th class="text-center" width="7%">Acciones</th>
          </tr>
        </thead>
      </table> -->

    </div>
  </div>





    </div>
  </div>



</div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- / MAIN content -->

    </div> <!-- /END ALL CONTENT -->
