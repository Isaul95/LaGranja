<!-- ============  AKI HAREMOS TODO EL MOVIMEINTO DE LISTAR LOS PRODUCTOS DE LA BD  ============ -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: #060405;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <h1>
                <center>
                    
                    <strong><font color="red" face="Comic Sans MS,arial,verdana">LISTA DE LAS VENTAS CANCELADAS</font></strong>
               </center>
             </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                 
                 <div class="box box-solid" style="background-color: #060405;">
                    <div class="box-body">
                <h3>
               <strong><font color="#D34787">MESA <?php echo $numerodemesa;?></font></strong>
               <?php $totalfinal = $totalesmesa1->importe;?>
                </h3>
                <h3>
                    <?php if ($totalfinal==0):?>
               <strong><font color="red"> NO HAY VENTAS CANCELADAS POR EL MOMENTO</font></strong>
                <?php endif;?>
                </h3>
                      </div>
                  </div>


                <!-- Default box --> 
                <div class="box box-solid" style="background-color: #060405;">
                    <div class="box-body">

                
                               <div class="row">
                                    <div class="col-md-12">
                                        <table id="examplelist"  class="table">
                                            <thead>
                                                <tr>
                                                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><H4>Numero de cancelación</H4></font></center></th>
                                                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><H4>Total</H4></font></center></th>
                                                         
                                                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><H4>Pago</H4></font></center></th>
                                                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><H4>Cambio</H4></font></center></th>
                                                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><H4>Fecha</H4></font></center></th>
                                                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><H4>Hora</H4></font></center></th>
                                                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><H4>Ver el detalle</H4></font></center></th>                 
                                                </tr>

                                            </thead>
                                                  <tbody>
                                <?php if (!empty($id_ventasmesa1)):?>
                                  <?php foreach($id_ventasmesa1 as $id_ventasmesa1):?>
                                                  <tr>
                            <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $id_ventasmesa1->id_venta;?></h4></font></center></td>
                              <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $id_ventasmesa1->total;?>.00</h4></font></center></td>
                              <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $id_ventasmesa1->pago;?>.00</h4></font></center></td>
                              <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $id_ventasmesa1->cambio;?>.00</h4></font></font></center></td>
                              <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $id_ventasmesa1->Fecha;?></h4></font></center></td>
                              <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $id_ventasmesa1->Hora;?></h4></font></center></td>
                              <td><center>
                                             <div class="btn-group">
                            <a href="<?php echo base_url()?>menuventascanceladas/ventasdiariacomidabebidayextras/<?php echo $id_ventasmesa1->id_venta;?>/<?php echo $numerodemesa;?>/<?php echo $id_ventasmesa1->Fecha;?>" class =" btn btn-info"><span class="far fa-hand-pointer"></span></a>
                                            </div>
                                          
                                           </center></td>



                                                  
                                          </tr>                  
                                  <?php endforeach;?>  
                                       <?php endif;?>

                                         <thead>
                                                <tr>
                                                     <th><center></center></th>
                                                     <th><center></center></th>
                                                         
                                                     <th><center></center></th>
                                                     <th><center></center></th>
                                                     <th><center></center></th>
                                                     <th><center></center></th>
                                                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Total de la mesa</h4></font></center></th>              
                                                </tr>

                                            </thead>         
                                               <?php if (!empty($totalesmesa1)):?>
                                  <?php foreach($totalesmesa1 as $totalesmesa1):?>
                                   
                                               <tr>
                                                  <td><center></center></td>
                              <td><center></center></td>
                              <td><center></center></td>
                              <td><center></center></td>
                              <td><center></center></td>
                              <td><center></center></td>
                            <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $totalesmesa1;?>.00</h4>  </font></center></td>
                            

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
