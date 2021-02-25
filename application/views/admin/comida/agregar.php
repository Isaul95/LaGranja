<!-- ============  AKI HAREMOS TODO EL MOVIMEINTO DE LISTAR LOS PRODUCTOS DE LA BD  ============ -->

        <!-- Content Wrapper. Contains page content -->
        <style type="text/css">
        .inp{
            color: #DF7401;
        }
        .letras{
                color: white;
               }

           .colorfondo{
               background:#060405 ;       /*#1B2631;*/
           }
           </style>

        <div class="content-wrapper colorfondo">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>   
            <center><strong><font color="#D34787">Nuevo Platillo</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Registro del Menu Platillos</font></small></center>
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

                  <form action="<?php echo base_url();?>mantenimiento/comida/store" method="POST">

  <div class="form-group <?php echo !empty(form_error('nombre_de_categoria'))? 'has-error':'';?>" >
                                <label for="nombre_de_categoria">Nombre_del_platillo:</label>
                                <input type="text" class="form-control" id="nombre_de_categoria" name="nombre_de_categoria"  
          value="<?php echo set_value('nombre_de_categoria');?>"  placeholder="Nombre del Platillo">  
                <?php echo form_error("nombre_de_categoria","<span class='help-block'>", "</span>");?> 
                             </div>

  <div class="form-group <?php echo !empty(form_error('precio_asada'))? 'has-error':'';?>" >
                                <label for="precio_asada">Precio_Asada:</label>
                                <input type="text" class="form-control" id="precio_asada" name="precio_asada"  
          value="<?php echo set_value('precio_asada');?>"  placeholder="Precio Asada">  
                <?php echo form_error("precio_asada","<span class='help-block'>", "</span>");?> 
                             </div>
                             

    <div class="form-group <?php echo !empty(form_error('precio_chorizo'))? 'has-error':'';?>" >
                          <label for="precio_chorizo">Precio_Chorizo:</label>
                          <input type="text" class="form-control" id="precio_chorizo" name="precio_chorizo" 
            value="<?php echo set_value('precio_chorizo');?>" placeholder="Precio Chorizo">
            <?php echo form_error("precio_chorizo","<span class='help-block'>", "</span>");?> 
            
                                            </div>







  <div class="form-group <?php echo !empty(form_error('precio_campechano_a'))? 'has-error':'';?>" >
                                <label for="precio_campechano_a">Precio_Campechano:</label>
                                <input type="text" class="form-control" id="precio_campechano_a" name="precio_campechano_a"  
          value="<?php echo set_value('precio_campechano_a');?>"  placeholder="Precio Campechano">  
                <?php echo form_error("precio_campechano_a","<span class='help-block'>", "</span>");?> 
                             </div>


    <div class="form-group <?php echo !empty(form_error('precio_barbacha'))? 'has-error':'';?>" >
                                <label for="precio_barbacha">Precio_Barbacha:</label>
                                <input type="text" class="form-control" id="precio_barbacha" name="precio_barbacha"  
          value="<?php echo set_value('precio_barbacha');?>"  placeholder="Precio Barbacha">  
                <?php echo form_error("precio_barbacha","<span class='help-block'>", "</span>");?> 
                             </div>

      
 <div class="form-group <?php echo !empty(form_error('precio_costilla'))? 'has-error':'';?>" >
                                <label for="precio_costilla">Precio_Costilla:</label>
                                <input type="text" class="form-control" id="precio_costilla" name="precio_costilla"  
          value="<?php echo set_value('precio_costilla');?>"  placeholder="Precio Costilla">  
                <?php echo form_error("precio_costilla","<span class='help-block'>", "</span>");?> 
                             </div>


    <div class="form-group <?php echo !empty(form_error('precio_sencilla'))? 'has-error':'';?>" >
                                <label for="precio_sencilla">Precio_Sencilla:</label>
                                <input type="text" class="form-control" id="precio_sencilla" name="precio_sencilla"  
          value="<?php echo set_value('precio_sencilla');?>"  placeholder="Precio Sencilla">  
                <?php echo form_error("precio_sencilla","<span class='help-block'>", "</span>");?> 
                             </div>                     


  <div class="form-group <?php echo !empty(form_error('descripcion'))? 'has-error':'';?>" >
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"  
          value="<?php echo set_value('descripcion');?>"  placeholder="Descripcion">  
                <?php echo form_error("descripcion","<span class='help-block'>", "</span>");?> 
                             </div>                         

                                            <div class="form-group">
                                             <center>   <button type="submit" class="btn btn-success btn-flat">Agregar</button></center>                                                                                  
                                            </div>

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
