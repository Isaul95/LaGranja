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
            <center><strong><font color="#D34787">Editar Platillo</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Edición del Menu</font></small></center>
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

             <form action="<?php echo base_url();?>mantenimiento/comida/update" method="POST">
             <input type="hidden" value="<?php  echo $comida->id_comida;?>" name="idProductos">

                            <div class="form-group ">
                                <label for="nombre_de_categoria">Nombre_del_platillo:</label>
                                <input type="text" class="form-control" id="nombre_de_categoria" name="nombre_de_categoria"  
                                value="<?php echo $comida->nombre_de_categoria?>">                  
                             </div>


                        <div class="form-group" >
                                <label for="precio_asada">Precio_Asada:</label>
                                <input type="text" class="form-control" id="precio_asada" name="precio_asada"  
                               value="<?php echo $comida->precio_asada?>">   
                             </div>

 <!---BLOKEAR CAJAS >>> readonly="readonly" o >>> disabled="disabled"  -->
                            
                  <div class="form-group" >
                          <label for="precio_chorizo">Precio_Chorizo:</label>
                          <input type="text" class="form-control" id="precio_chorizo" name="precio_chorizo" 
                           value="<?php echo $comida->precio_chorizo?>"> 
                     </div>


                <div class="form-group" >
                                <label for="precio_campechano_a">Precio_Campechano:</label>
                                <input type="text" class="form-control" id="precio_campechano_a" name="precio_campechano_a"  
          value="<?php echo $comida->precio_campechano_a?>">
                             </div>


                <div class="form-group" >
                                <label for="precio_barbacha">Precio_Barbacha:</label>
                                <input type="text" class="form-control" id="precio_barbacha" name="precio_barbacha"  
          value="<?php echo $comida->precio_barbacha?>">
                             </div>

            
            <div class="form-group ">
                                <label for="precio_costilla">Precio_Costilla:</label>
                                <input type="text" class="form-control" id="precio_costilla" name="precio_costilla"  
          value="<?php echo $comida->precio_costilla?>">
                             </div>


         <div class="form-group ">
                                <label for="precio_sencilla">Precio_Sencilla:</label>
                                <input type="text" class="form-control" id="precio_sencilla" name="precio_sencilla"  
          value="<?php echo $comida->precio_sencilla?>">
                             </div>                                  


         <div class="form-group" >
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion"  
          value="<?php echo $comida->descripcion ?>">
                             </div> 
                                        
                                            <div class="form-group">
                                             <center>   <button type="submit" class="btn btn-success btn-flat"><h5>Guardar Cambios</h5> </button></center> 
                                          <br>
                                             <center>   <button  type="submit" class="btn btn-primary btn-float"><a href="<?php echo base_url();?>mantenimiento/comida"></a><h5>Regresar</h5></button></center> 
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
