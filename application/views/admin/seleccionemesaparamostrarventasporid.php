<!-- ============  AKI HAREMOS TODO EL MOVIMEINTO DE LISTAR LOS PRODUCTOS DE LA BD  ============ -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: #060405;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <h1>
                <center>
                    <strong><font color="white">VENTAS DEL DÍA</font></strong>
                    
               </center>
             </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                 
                 <div class="box box-solid" style="background-color: #060405;">
                    <div class="box-body">
                <h3>
               <strong><font color="#D34787">Selecciona una mesa para mostrar sus ventas</font></strong>

                </h3>
                <h1>
                  <small><font color="#D34787" face="Comic Sans MS,arial,verdana">Total del día: $<?php echo $ventasdeldia->importe?>.00</font></small>
                </h1>
                      </div>
                  </div>


                <!-- Default box --> 
                <div class="box box-solid">
                    <div class="box-body" style="background-color: #060405;">

                
                               <div class="row">
                                    <div class="col-md-12">
                                        <table id="examplelist"  class="table">
                                            <thead>
                                                <tr>
                                                  <th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Numero de mesa</h4></font></center></th>                 
                                             
                                                  <th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Detalle de venta</h4></font></center></th>                 
                                                </tr>

                                            </thead>
                                                  <tbody>
                                 <?php if (!empty($mesasconcompras)):?>
<?php foreach($mesasconcompras as $mesasconcompras):?>

              <tr>         
                  <td><center><strong><font color="white" face="Comic Sans MS,arial,verdana"><h4>Mesa <?php echo $mesasconcompras->mesa;?></h4></font></strong></center></td>
              <td><center>
                 <div class="btn-group">
<a href="<?php echo base_url()?>menuventas/ventasdiariasporid/<?php echo $mesasconcompras->mesa;?>" class =" btn btn-info"><span class="far fa-hand-pointer"></span></a>
                </div>       
               </center></td>              
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
