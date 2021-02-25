<!-- ============ VISTA LISTAR LAS TEMPERATURAS DE LA BD  ============ -->

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
            <center><strong><font color="#D34787">Lista de Bebidas</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Menu Restaurante</font></small></center>
        </h1>
            </section>
            <h3>
             <center><font color="#D34787">Pa' que no te lo bajes a brincos</font></center>
         </h3>
            <!-- Main content -->
            <section class="content ">
                <!-- Default box --> 
                <div class="box box-solid colorfondo">
                    <div class="box-body ">
         
                         <div class="row">
                             <div class="col-md-12">
                                 <a href="<?php echo base_url();?>mantenimiento/bebidas/agregar" class="btn btn-primary btn-float"> <span class="fa fa-plus"></span> Registrar Nueva Bebida</a> 
                             </div>
                         </div>
                              <hr>
                               <div class="row">
                                    <div class="col-md-12"> 
                                        <table id="examplelist" class="table">
                                            <thead > 
                                                <tr>
                                                      <th><center> Bebidas </center></th>
                                                     <th><center> Precio </center></th>
                                                     <th><center>opciones</center></th>
                                                     
                                                </tr> 
                                            </thead>
                                        <tbody>
                                                    <?php if (!empty($bebidas)):?>
                                                        <?php foreach($bebidas as $bebidas):?>
                                        <tr> 
      <td><center> <?php echo $bebidas->nombre_bebida;?> </center></td>
      <td><center>$<?php echo $bebidas->precio_bebida;?>.00 </center></td>
                                
                                    <td>
                                      <center>
                                    <div class="btn-group">
                                      
            <!--- EDITAR  MEDICAMENTOS...-->
                                    <a href="<?php echo base_url()?>mantenimiento/bebidas/edit/<?php echo $bebidas->id_bebida;?>" class="btn btn-warning"><span class="fa fa-refresh"></span></a>
            <!--- ELIMINAR MEDICAMENTOS...-->
                                    <a href="<?php echo base_url()?>mantenimiento/bebidas/delete/<?php echo $bebidas->id_bebida;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
                                      
                                      </div>
                                    </center>
                                                           </td> 
    
                                                       </tr>
                                                           <?php endforeach;?>  
                                                            <?php endif;?>
                                                  </tbody>
                                        </table>
                                    </div>
                               </div>
                    </div>  <!-- /.box-body -->
                </div>  <!-- /.box -->
            </section>  <!-- /.content -->
        </div>  <!-- /.content-wrapper -->
