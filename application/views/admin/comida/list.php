<!-- ============  AKI HAREMOS TODO EL MOVIMEINTO DE LISTAR LOS PRODUCTOS DE LA BD  ============ -->

        <!-- Content Wrapper. Contains page content -->
        <style type="text/css">
        .table{
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
            <center><strong><font color="#D34787">Lista de Menu</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Menu Restaurante</font></small></center>
        </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Default box --> 
                <div class="box box-solid colorfondo">
                    <div class="box-body">

                         <div class="row">
                             <div class="col-md-12">
                                 <a href="<?php echo base_url();?>mantenimiento/comida/agregar" class="btn btn-primary btn-float"> <span class="fa fa-plus"></span> Agregar Nuevo Platillo</a> 
                             </div>
                         </div>

                              <hr>
                               <div class="row">
                                    <div class="col-md-12">
                                        <table id="examplelist"  class="table">
                                            <thead>
                                                <tr>
                                                     
                                                     <th><center>Comida</center></th>
                                                     <th><center>P_asada</center></th>
                                                     <th><center>P_chorizo</center></th>
                                                     <th><center>P_campechano_a</center></th>
                                                     <th><center>P_barbacha</center></th>
                                                     <th><center>P_costilla</center></th>
                                                     <th><center>P_sencilla</center></th>
                                                     <th><center>descripcion</center></th>
                                                     <th><center>opciones</center></th>
                                                </tr>
                                            </thead>
                                                  <tbody>
                                                              <?php if (!empty($comida)):?>
                                                                  <?php foreach($comida as $comida):?>
                                                  <tr>
          
          <td><center> <?php echo $comida->nombre_de_categoria;?></center></td>
          <td><center>$<?php echo $comida->precio_asada;?>.00</center></td>
          <td><center>$<?php echo $comida->precio_chorizo;?>.00</center></td>
          <td><center>$<?php echo $comida->precio_campechano_a;?>.00</center></td>
          <td><center>$<?php echo $comida->precio_barbacha;?>.00</center></td>
          <td><center>$<?php echo $comida->precio_costilla;?>.00</center></td>
          <td><center>$<?php echo $comida->precio_sencilla;?>.00</center></td>
          <td><center><?php echo $comida->descripcion;?> </center></td>
          
                                         <td>
                                    <div class="btn-group">
                                        <center>
            <!--- EDITAR  MEDICAMENTOS...-->
                                    <a href="<?php echo base_url()?>mantenimiento/comida/edit/<?php echo $comida->id_comida;?>" class="btn btn-warning"><span class="fa fa-refresh"></span></a>
            <!--- ELIMINAR MEDICAMENTOS...-->
                                    <a href="<?php echo base_url()?>mantenimiento/comida/delete/<?php echo $comida->id_comida;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
                                         </center>
                                </div>
                                                           </td>
                                                       </tr>
                                                           <?php endforeach;?>  
                                                            <?php endif;?>
                                                  </tbody>
                                        </table>
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



