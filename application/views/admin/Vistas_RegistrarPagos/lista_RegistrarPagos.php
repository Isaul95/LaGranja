<!-- ============ VISTA LISTAR LAS TEMPERATURAS DE LA BD  ============ -->

        <div class="content-wrapper colorfondo">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>
            <center><strong><font color="#D34787">Lista de documentos new view</font></strong></center>
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
                                 <a href="<?php echo base_url();?>mantenimiento/RegistrarPagos/agregar_RegistrarPagos" class="btn btn-primary btn-float"> <span class="fa fa-plus"></span> Registrar Nueva Bebida</a>
                             </div>
                         </div>
                              <hr>
                               <div class="row">
                                    <div class="col-md-12">
                                        <table id="examplelist" class="table">
                                            <thead >
                                                <tr>
                                                      <th><center> ID </center></th>
                                                     <th><center> ARCHIVO </center></th>
                                                     <th><center> NOMBRE </center></th>
                                                     <th><center>opciones</center></th>

                                                </tr>
                                            </thead>
                                        <tbody>
                                                    <?php if (!empty($RegistrarPagos)):?>
                                                        <?php foreach($RegistrarPagos as $RegistrarPagos):?>

                                            <?php foreach($archivos as $archivo){  ?>
                                        <tr>
      <td><center><?php echo $RegistrarPagos->id;?></center></td>
      <td>
         <center>
          <a href="<?=base_url()?>mantenimiento/RegistrarPagos/verArchivo/<?=$archivo['id']?>" target="_blank">
            <i class="far fa-file-pdf fa-2x"></i></a>
          </center>
      </td>
      <td><center><?php echo $RegistrarPagos->nombre;?></center></td>

                                    <td>
                                      <center>
                                    <div class="btn-group">

            <!--- EDITAR  MEDICAMENTOS...-->
                                    <a href="<?php echo base_url()?>mantenimiento/bebidas/edit/<?php echo $RegistrarPagos->id;?>" class="btn btn-warning"><span class="fa fa-refresh"></span></a>
            <!--- ELIMINAR MEDICAMENTOS...-->
                                    <a href="<?php echo base_url()?>mantenimiento/bebidas/delete/<?php echo $RegistrarPagos->id;?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>

                                      </div>
                                    </center>
                                                           </td>

                                                       </tr>

                                                       <?php   }  ?>

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
