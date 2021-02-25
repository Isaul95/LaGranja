 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template/bootstrap/css/bootstrap.css">


¿

 <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
    
            <div class="content-wrapper"><!--INICIO DEL CONTENT WRAPPER-->
            <!-- Content Header (Page header) --> 
            <section class="content-header">
        <h1>
                 

   <?php if (!empty($cuentaparcial)):?> <!---->
    <div id ="totaldelamesa">
    <center><p><font color="#D34787">Total del cliente: <font color="#2F4D97" face="Comic Sans MS,arial,verdana">$<?php echo $cuentaparcial->importe;?></font></p></center>
    </div>
       <?php endif;?><!--COMIDAS-->
    
        </h1>
     
            </section>
            <!-- Main content -->
           <!--************************************************************************************-->
  


   

        
   
   
<!--FIN DEL DIV DE LA MESA Y EL USUARIO-->


            <!-- /.content -->
           <!--************************************************************************************-->
                </div> <!--FIN DEL CONTENT WRAPPER-->





       <!-- Modal  para definir el cobro-->
                    
<div class="modal fade bd-cobrototalporcliente-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><strong><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Total a pagar del cliente <?php echo $clienteenturno?> : </font></strong></h4>
          <h4 class="modal-title" id="exampleModalLabel"><strong><font color="black">$<?php echo $cuentaparcial->importe;?></font></strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                                            
  <form action="<?php echo base_url();?>Menucomida/pagodelcliente/<?php echo $mesa;?>/<?php echo $clienteenturno;?>/<?php echo $numerodeclientes;?>" method="post"> 
     
      <div class="modal-body">
             <div align="center">  
                        <div class="box-body">
                                    <div class="col-md-16">
 
                                      <table>
                                        <tbody>
                                           <tr> <!--EXTRAS-->   
                                           <td>
                                             <center><h4><font color="black">Monto recibido</font></h4></center>
                                           </td>   
                                           <td>
                                             <input type="text" class="form-control" placeholder="Cantidad en numero" name="pago">  
                                           </td>
                                        </tr><!--EXTRAS-->
                    
                                        </tbody>
                                      </table> 
                                   </div>
                          </div>
                </div>
      </div>
          <div class="modal-footer">
             <button type="submit" class="btn btn-secondary"><font color="black">Agregar pago</font></button>
          </div>
         
      </form>
    </div>
  </div>
</div>

          <!-- MODAL PARA ABRIR EL COBRO-->









          <!-- MODAL PARA ABRIR los alimentos bebidas y extras de cada cliente-->
                    
<div class="modal fade" id="cancelaciones" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"></h4>
          <h4 class="modal-title" id="exampleModalLabel"><strong><font color="black">Recuerda que para cancelar se necesita autorizacion</font></strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                                            
 
      <div class="modal-body">
                    <div class="row">
                                <div class="col-md-4">
                                        <table id="examplelist"  class="table table-bordered btn-hover">
                                            <thead>
                                                <tr>
                                                <th><center><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Nombre</font></center></th>
                                                         
                                                     <th><center><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Cantidad</font></center></th>
                                                        
                                                 <th><center><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Cancelar</font></center></th>

                                                           
                                                               
                                                                  
                                                </tr>

                                            </thead>
                                                  <tbody>
                                               <tr>
                           
                                        
                                <?php if (!empty($ventadiariacomida)):?>
                                                                  <?php foreach($ventadiariacomida as $ventadiariacomida):?>
                                              
                                                  <tr>
                                         
                                          
                                          
                                     <?php $cantidad = $ventadiariacomida->precio_unitario;?>
                                                  
                                   <?php if ($ventadiariacomida->nombre_de_categoria=="Tacos"):?>

                                    <?php if ($cantidad==15):?>
                          <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                                            <?php endif;?>

                                            <?php if ($cantidad==13):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                                            <?php endif;?>

                                            <?php if ($cantidad==17):?>
                                   <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                                            <?php endif;?>

                                            <?php if ($cantidad==14):?>
                                     <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                                            <?php endif;?>

                                            <?php if ($cantidad==35):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                            <?php endif;?>
                                    <?php endif;?>

                                            <?php if ($ventadiariacomida->nombre_de_categoria=="Quekas"):?>
                                              <?php if ($cantidad==45):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                                          
                                            <?php endif;?>
                                            <?php if ($cantidad==40):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==50):?>
                                   <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==46):?>
                                     <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==70):?>
                                            <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                            <?php if ($ventadiariacomida->nombre_de_categoria=="Al horno"):?>
                                              <?php if ($cantidad==45):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==40):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==50):?>
                                   <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==46):?>
                                     <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==70):?>
                                            <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                            <?php endif;?>
                                            <?php if ($cantidad==35):?>
                                      td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de sencilla</font></center></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                            <?php if ($ventadiariacomida->nombre_de_categoria=="Mulas"):?>
                                              <?php if ($cantidad==19):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==17):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==21):?>
                                   <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==18):?>
                                     <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==45):?>
                                            <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                            <?php endif;?>
                                            <?php endif;?>
                                            <?php if ($ventadiariacomida->nombre_de_categoria=="Burritos"):?>
                                              <?php if ($cantidad==45):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                                   
                                            <?php endif;?>
                                            <?php if ($cantidad==40):?>
                                    <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                                            <?php endif;?>

                                            <?php if ($cantidad==50):?>
                                   <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                                            <?php endif;?>

                                            <?php if ($cantidad==46):?>
                                     <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                                            <?php endif;?>

                                            <?php if ($cantidad==70):?>
                                            <td><center><font color="black"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                            <?php endif;?>

                                            <?php endif;?>
                                        <td><center><font color="black"><?php echo $ventadiariacomida->cantidad;?></font></center></td>
                              <td>

                              <div class="btn-group">
                                  <a data-toggle="modal" data-target="#codigodecancelacion" class =" btn btn-info"><span class="fas fa-times"></span></a>
                              </div>
                             </td>


                                                   </tr>
                                                                 <?php endforeach;?>  
                                                            <?php endif;?>

                                <?php if (!empty($ventadiariabebidas)):?>
                                                                  <?php foreach($ventadiariabebidas as $ventadiariabebidas):?>
                                                <tr>
                                       <td><center><font color="black"><?php echo $ventadiariabebidas->nombre_bebida;?></font></center></td>
                                        <td><center><font color="black"><?php echo $ventadiariabebidas->cantidad;?></font></center></td>
                                     </td>  
                                       <td>
                                    <div class="btn-group">
                                <a data-toggle="modal" data-target="#codigodecancelacion" class =" btn btn-info"><span class="fas fa-times"></span></a>
                                    </div>
                                      </td>
                                                     </tr>
                                                                 <?php endforeach;?>  
                                                            <?php endif;?>

                                  <?php if (!empty($ventadiariaextras)):?>
                                                      <?php foreach($ventadiariaextras as $ventadiariaextras):?>
                                             <tr>
                                       <td><center><font color="black"><?php echo $ventadiariaextras->nombre;?></font></center> </td>
                                        <td><center><font color="black"><?php echo $ventadiariaextras->cantidad;?></font></center></td>
                                       <td>
                                    <div class="btn-group">
                                <a data-toggle="modal" data-target="#codigodecancelacion" class =" btn btn-info"><span class="fas fa-times"></span></a>
                                    </div>
                                      </td>
                                                 </tr> 
                                                                 <?php endforeach;?>  
                                                            <?php endif;?>
                                                 </tr>
                                                  </tbody>
                                        </table>
                                    </div>
                               </div>
      </div>
          <div class="modal-footer">
             </div>
         
 
    </div>
  </div>
</div>

          <!-- MODAL PARA ABRIR los alimentos bebidas y extras de cada cliente-->



            