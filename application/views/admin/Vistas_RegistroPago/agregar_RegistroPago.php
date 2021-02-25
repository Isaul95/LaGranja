<!-- ============  AKI HAREMOS TODO EL MOVIMEINTO DE LISTAR LOS PRODUCTOS DE LA BD  ============ -->

        <div class="content-wrapper colorfondo">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>
            <center><strong><font color="#D34787">Registrar Nuevo Pago</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Realizar un Nuevo Registro</font></small></center>
        </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body letras">
                               <div class="row">
                                    <div class="col-md-12">

                <?php if($this->session->flashdata("error")):?>
                    <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times:</button>
                      <p><i class="icon fa fa-ban"></i> <?php echo $this->session->flashdata("error");?></p>
                    </div>
               <?php endif; ?>

               <!---?php
                      date_default_timezone_set('America/Mexico_City');
                      $fecha_actual = date("Y-m-d H:i:s");
                ?-->

                  <form action="<?php echo base_url();?>mantenimiento/Controller_RegistroPago/captura_inputs" method="POST">

  <div class="form-group <?php echo !empty(form_error('alumno_nombre_completo'))? 'has-error':'';?>" >
                                <label for="alumno_nombre_completo">Nombre_Completo_del_Alumno:</label>
                                <input type="text" class="form-control" id="alumno_nombre_completo" name="alumno_nombre_completo"
          value="<?php echo set_value('alumno_nombre_completo');?>"  placeholder="Nombre del Alumno">
                <?php echo form_error("alumno_nombre_completo","<span class='help-block'>", "</span>");?>
                             </div>



  <div class="form-group <?php echo !empty(form_error('numero_control'))? 'has-error':'';?>" >
                                <label for="numero_control">Número_de_Control:</label>
                                <input type="text" class="form-control" id="numero_control" name="numero_control"
          value="<?php echo set_value('numero_control');?>"  placeholder="Número de control">
                <?php echo form_error("numero_control","<span class='help-block'>", "</span>");?>
                             </div>




    <div class="form-group <?php echo !empty(form_error('carrera'))? 'has-error':'';?>" >
                          <label for="carrera">Carrera:</label>
                          <input type="text" class="form-control" id="carrera" name="carrera"
            value="<?php echo set_value('carrera');?>" placeholder="Carrera">
            <?php echo form_error("carrera","<span class='help-block'>", "</span>");?>

                                            </div>




  <div class="form-group <?php echo !empty(form_error('semestre'))? 'has-error':'';?>" >
                                <label for="semestre">Semestre:</label>
                                <input type="text" class="form-control" id="semestre" name="semestre"
          value="<?php echo set_value('semestre');?>"  placeholder="Semestre">
                <?php echo form_error("semestre","<span class='help-block'>", "</span>");?>
                             </div>


                                            <div class="form-group">
                                             <center>   <button type="submit" class="btn btn-success btn-flat">Agregar</button></center>
                                            </div>

                                        </form>



                  <!-- =============================    FORMULARIO DEL INPUT FILE =============================00 -->



                  <form autocomplete="off" class="form-inline" id="formArchivos" method="POST">
                    <center>
                      <label>Nombre del documento: </label>
                      <div class="input-group">
                        <spam class="input-group-addon">
                          <i class="fa fa-file" aria-hidden="true"></i>
                        </spam>

                        <input type="text" name="nombre" placeholder="Nombre del documento" class="form-control" required="required" />
                      </div>

                      <button class="btn btn-light btn-sm" id="upFile"><i class="fa fa-upload" id="ico-btn-file" aria-hidden="true"></i></button>

                      <input type="file" name="archivo" id="getFile" class="hidden" required="required" accept="application/pdf" />
                      <input type="submit" form="formArchivos" id="smtArchivo" class="btn btn-success btn-sm" value="Agregar" /> <br/>
                    </center>
                  </form>






                                    </div>
                               </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
