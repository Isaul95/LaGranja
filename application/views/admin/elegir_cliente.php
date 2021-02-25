<script lenguage="javascript">

  function datosparaelcobroindividual($numerodecliente, $totaldelcliente){

$('#numerodecliente').val($numerodecliente);
$('#totaldelcliente').val($totaldelcliente);
var clientetotal = 45;

  $(document).ready(function(){
document.getElementById('total').innerHTML = clientetotal;

          });
}

</script>


 <?php if (!empty($cuentaparcial->importe)):?> <!--ESTE BOTON LLAMA AL MODAL DE CANCELACIONES--> 

<div id="botondecancelacion" style="display: all;">
  <button type="button" class="btn btn-danger" class="close" data-toggle="modal" data-target="#cancelacionpormesa" ><strong>Cancelar toda la mesa </strong><span class="fas fa-bomb"></span></button>
</div>
<div id="botontotal" style="display: all;">
  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bd-cobrototaldelamesa-modal-sm"><strong> Cobrar a toda la mesa </strong><span class="fas fa-cash-register"></span></button>
</div>

<?php endif;?><!--COMIDAS-->
  
<div id="botonderegresar">                                            
  <form action="<?php echo base_url();?>Menucomida/iralavista_elegirmesa" method="post">
  <button type="submit" class="btn btn-primary btn-lg">
    <strong>Regresar </strong><span class="fas fa-undo-alt"></span></button>
  </form>

</div>



 <!-- Modal  para hacer cobros individualmente-->
                    
<div class="modal fade"  id="cobroindividual" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
    <h3 class="modal-title" id="exampleModalLabel"><strong><font color="white" face="Comic Sans MS,arial,verdana">Total a pagar del cliente:</font></strong></h3><div id="total"></div>
          <h3 class="modal-title" id="exampleModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      


  <form action="<?php echo base_url();?>Menucomida/cobrarporcliente/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post"> 

     <input type="hidden"  class="form-control" id="numerodecliente" name="numerodecliente">
 <input type="text"  class="form-control" id="totaldelcliente" name="totaldelcliente">
 
 
      <div class="modal-body">
             <div align="center">  
                        <div class="box-body">
                                    <div class="col-md-16">
 
                                      <table>
                                        <tbody>
                                           <tr> <!--EXTRAS-->   
                                           <td>
                                             <center><h4><font color="white">Monto recibido</font></h4></center>
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

          <!-- MODAL PARA hacer cobros individualmente-->



 <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
    
            <div class="content-wrapper" style="background-color: #060405;"><!--INICIO DEL CONTENT WRAPPER-->
            <!-- Content Header (Page header) --> 
            <section class="content-header">
        <h1>
            <center><strong><font color="#D34787">Restaurante "El Toloache"</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana"><strong>Por favor escoge al cliente para comenzar a agrear comida, bebida o algún extra</strong></font></small></center>




    <div id ="mesa">
    <left><font color="#D34787">Mesa: </font><font color="#2F4D97" face="Comic Sans MS,arial,verdana"><?php echo $mesa;?></font></left>
    </div>
    <div id="numerodeclientes">
       <left><font color="#D34787">Clientes en la mesa: </font><font color="#2F4D97" face="Comic Sans MS,arial,verdana"><?php echo $numerodeclientes;?></font></left>
    </div>
      <?php if (!empty($cuentaparcial)):?> <!---->
    <div id ="totaldelamesa">
    <center><p><font color="#D34787">Total de la mesa: </font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">$<?php echo $cuentaparcial->importe;?>.00</font></p></center>
    </div>
       <?php endif;?><!--COMIDAS-->
    

 
        </h1>
     
            </section>
            <!-- Main content -->
           <!--************************************************************************************-->
           <div id="clientesymesa">
            <section>
                    <!---div class="box box-solid"> <div class="box-body">

<!--************************************************************************************************-->                                       
                  
<button type="button" data-toggle="modal" data-target="#menu">                
               <img src="<?php echo base_url()?>assets/template/dist/img/mesa.png"  class="user-image" alt="User Image" width=100px heigth=100px>
</button>
            </section>


        </div>
 
<!--FIN DEL DIV DE LA MESA Y EL USUARIO-->



            <!-- /.content -->
        </div> <!--FIN DEL CONTENT WRAPPER-->
       


       <!-- Modal  para hacer la cancelacionde productos individualmente-->
                    
<div class="modal fade"  id="cancelacionesindividuales" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong><font color="white" face="Comic Sans MS,arial,verdana">Escribe el codigo de cancelacion</font></strong></h3>
          <h3 class="modal-title" id="exampleModalLabel"></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                 
             <!--    id
                 preiounitario

ventadiariacomida
ventadiariabebidas
ventadiariaextras   
-->
<form action="<?php echo base_url();?>Menucomida/cancelacionesindividuales/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" 
    method="post"> 
     
      <div class="modal-body">
             <div align="center">  
                        <div class="box-body">
                                    <div class="col-md-16">
 <input type="hidden"  class="form-control" id="id_comida" name="id_comida">
 <input type="hidden"  class="form-control" id="cantidad_comida" name="cantidad_comida">
 <input type="hidden"  class="form-control" id="nombre_comida" name="nombre_comida">
 <input type="hidden"  class="form-control" id="precio_comida" name="precio_comida">
  <input type="hidden"  class="form-control" id="num_cliente_comida" name="num_cliente_comida">
 <input type="hidden"  class="form-control" id="id_bebida" name="id_bebida">
 <input type="hidden"  class="form-control" id="cantidad_bebida" name="cantidad_bebida">
 <input type="hidden"  class="form-control" id="nombre_bebida" name="nombre_bebida">
 <input type="hidden"  class="form-control" id="precio_bebida" name="precio_bebida">
  <input type="hidden"  class="form-control" id="num_cliente_bebida" name="num_cliente_bebida">
 <input type="hidden"  class="form-control" id="id_extra" name="id_extra">
 <input type="hidden"  class="form-control" id="cantidad_extra" name="cantidad_extra">
 <input type="hidden"  class="form-control" id="nombre_extra" name="nombre_extra">
 <input type="hidden"  class="form-control" id="precio_extra" name="precio_extra">
  <input type="hidden"  class="form-control" id="num_cliente_extra" name="num_cliente_extra">
                                      <table>
                                        <tbody>
                                           <tr> <!--EXTRAS-->   
                                           <td>
                                             <center><h4><font color="white">Codigo de cancelación</font></h4></center>
                                           </td>   
                                            <td>
                                             <input type="password" class="form-control" placeholder="Ejemplo A12345" name="codigodecancelacion">  
                                           </td>
                                        </tr><!--EXTRAS-->
                    
                                        </tbody>
                                      </table> 
                                   </div>
                          </div>
                </div>
      </div>
          <div class="modal-footer">
             <button type="submit" class="btn btn-secondary"><font color="black">Enviar codigo</font></button>
          </div>
         
      </form>
    </div>
  </div>
</div>

          <!-- MODAL PARA hacer la cancelacion individualmente-->




<!-- Modal  para hacer la cancelacionde productos POR MESA-->
                    
<div class="modal fade"  id="cancelacionpormesa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><strong><font color="white" face="Comic Sans MS,arial,verdana">Escribe el codigo de cancelacion</font></strong></h4>
          <h4 class="modal-title" id="exampleModalLabel"></h4>
          <h3><strong><font color="white" face="Comic Sans MS,arial,verdana">ESTA A PUNTO DE CANCELAR TODAS LAS ORDENES AGREGADAS A LA MESA...</font></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                 
             <!--    id
                 preiounitario

ventadiariacomida
ventadiariabebidas
ventadiariaextras   
-->
<form action="<?php echo base_url();?>Menucomida/cancelartodalamesa/<?php echo $mesa;?>/<?php echo $cuentaparcial->importe;?>/<?php echo $numerodeclientes;?>" 
    method="post"> 
     
      <div class="modal-body">
             <div align="center">  
                        <div class="box-body">
                                    <div class="col-md-16">

                                      <table>
                                        <tbody>
                                           <tr> <!--EXTRAS-->   
                                           <td>
                                             <center><h4><font color="white">Codigo de cancelación</font></h4></center>
                                           </td>   
                                            <td>
                                             <input type="password" class="form-control" placeholder="Ejemplo A12345" name="codigodecancelacion">  
                                           </td>
                                        </tr><!--EXTRAS-->
                    
                                        </tbody>
                                      </table> 
                                   </div>
                          </div>
                </div>
      </div>
          <div class="modal-footer">
             <button type="submit" class="btn btn-secondary"><font color="black">Enviar codigo</font></button>
          </div>
         
      </form>
    </div>
  </div>
</div>

          <!-- MODAL PARA hacer la cancelacion DE MESA-->




<!--**************************************************************************************************************-->

<!--DEFINIR EL PAGO POR CLIENTES-->  
<div id="descripciondeclientes">
  <h3><center><font color="white">Clientes</font></center><h3>
</div>

                            

<div id="cobroporcliente">
  
<div class="box-body">      
                              <div class="col-md-12">
    <table id="comida" class="table">
                  <thead>
        <th><center><font color="white">Cliente</font></center></th>
         <th><center><font color="white">Total</font></center></th>
         <th><center><font color="white">Cobrar</font></center></th>
         
      </thead>                         
                                            
                                                  <tbody>
                                                   
                                        
                                               <tr>
                           
                                     
                                                           
                 

                    <?php if (!empty($totalesdeclientes)):?>
                   <?php foreach($totalesdeclientes as $totalesdeclientes):?>               
                                   
                                    
                                      <td>
<!--AQUI VA A IR EL VALOR DEL TOTAL DE CADA CLIENTE-->
<center><font color="white"><h4><?php echo $totalesdeclientes->num_cliente;?></h4></font></center>
                                  </td>                  
                                       <td>
<!--AQUI VA A IR EL VALOR DEL TOTAL DE CADA CLIENTE-->
<center><font color="white"><h4>$<?php echo $totalesdeclientes->importe;?>.00</h4></font></center>
                                  </td>
                                     <td>
<button 
class ="btn btn-primary btn-lg" 
onclick="datosparaelcobroindividual('<?php echo $totalesdeclientes->num_cliente;?>', 
'<?php echo $totalesdeclientes->importe;?>');"
 aria-label="Close" data-toggle="modal" data-target="#cobroindividual">
  <span class="fas fa-cash-register"></span>
</button>  
                                  </td>  
                          

</tr>

                                   





                                                                 <?php endforeach;?>  
                                                            <?php endif;?>


                                                              

                                
                                             
                                                  </tbody>

                                     
                                        </table>
                                    </div>
               </div>

</div>                    

<!--DEFINIR EL PAGO POR CLIENTES-->           
                                     
                     







<!--**************************************************************************************************************-->
<!-- Modal  para definir el cobro-->
                    
<div class="modal fade bd-cobrototaldelamesa-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">
          <font color="white"><strong>Total a pagar de la mesa: <?php echo $mesa;?></strong></h3>
          <h3 class="modal-title" id="exampleModalLabel"><font color="white"><strong>$<?php echo $cuentaparcial->importe;?>.00</strong></font></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                                            
  <form action="<?php echo base_url();?>Menucomida/pagoporeltotaldelamesa/<?php echo $mesa;?>/<?php echo $cuentaparcial->importe;?>/<?php echo $numerodeclientes;?>" method="post"> 
     
      <div class="modal-body">
             <div align="center">  
                        <div class="box-body">
                                    <div class="col-md-16">
 
                                      <table>
                                        <tbody>
                                           <tr> <!--EXTRAS-->   
                                           <td>
                                             <center><h4><font color="white">Monto recibido</font></h4></center>
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

          <!-- Modal  para definir el COBRO DE LA MESA-->
  







<!--**************************************************************************************************************-->

<div id="descripciopndelatablacontenidodelamesa">
  <h3><center><font color="white">Ordenes agregadas</font></center><h3>
</div>
<div id="tabladecontenidodelamesa">
  <!--MODAL QUE MUESTRA LAS COMIDAS Y BEBIDAS YA AGREGADAS DE LA MESA-->

                               <!--MODAL QUE MUESTRA LAS COMIDAS Y BEBIDAS YA AGREGADAS DE LA MESA-->

<div align="right">  
  <div class="box-body">      
    <div class="col-md-12">

<table id="listadecomida" class="table">
<thead>
<td><center><font color="white">Cliente</font></center></td>
<td><center><font color="white">Orden</font></center></td>
<td><center><font color="white">Cantidad</font></center></td>
</thead>                            

  <tbody>
     <tr>
               
                            
                    <?php if (!empty($ventadiariacomida)):?>
                          <?php foreach($ventadiariacomida as $ventadiariacomida):?>
                                  
                  <tr>
                         <?php $cantidad = $ventadiariacomida->precio_unitario;?>
                             <td><center><font color="white"><?php echo $ventadiariacomida->num_cliente;?></font></center></td>         
                       <?php if ($ventadiariacomida->nombre_de_categoria=="Tacos"):?>

                        <?php if ($cantidad==15):?>
              <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                                <?php endif;?>

                                <?php if ($cantidad==13):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                                <?php endif;?>

                                <?php if ($cantidad==17):?>
                       <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                                <?php endif;?>

                                <?php if ($cantidad==14):?>
                         <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                                <?php endif;?>

                                <?php if ($cantidad==35):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                <?php endif;?>
                        <?php endif;?>

                                <?php if ($ventadiariacomida->nombre_de_categoria=="Quekas"):?>
                                  <?php if ($cantidad==45):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                              
                                <?php endif;?>
                                <?php if ($cantidad==40):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==50):?>
                       <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==46):?>
                         <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==70):?>
                                <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                <?php endif;?>
                                <?php endif;?>
                                <?php if ($ventadiariacomida->nombre_de_categoria=="Al horno"):?>
                                  <?php if ($cantidad==45):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==40):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==50):?>
                       <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==46):?>
                         <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==70):?>
                                <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                <?php endif;?>
                                <?php if ($cantidad==35):?>
                          <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de sencilla</font></center></td>
                                <?php endif;?>
                                <?php endif;?>
                                <?php if ($ventadiariacomida->nombre_de_categoria=="Mulas"):?>
                                  <?php if ($cantidad==19):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==17):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==21):?>
                       <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==18):?>
                         <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==45):?>
                                <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                <?php endif;?>
                                <?php endif;?>
                                <?php if ($ventadiariacomida->nombre_de_categoria=="Burritos"):?>
                                  <?php if ($cantidad==45):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</font></center></td>
                       
                                <?php endif;?>
                                <?php if ($cantidad==40):?>
                        <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</font></center></td>
                                <?php endif;?>

                                <?php if ($cantidad==50):?>
                       <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</font></center></td>
                                <?php endif;?>

                                <?php if ($cantidad==46):?>
                         <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</font></center></td>
                                <?php endif;?>

                                <?php if ($cantidad==70):?>
                                <td><center><font color="white"><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</font></center></td>
                                <?php endif;?>

                                <?php endif;?>
                            <td><center><font color="white"><?php echo $ventadiariacomida->cantidad;?></font></center></td>
                       <td>
<button 
class ="btn btn-danger" 
data-dismiss="modal" aria-label="Close" 
onclick="datosdecancelacionparacomidas('<?php echo $ventadiariacomida->id_comida;?>', 
'<?php echo $ventadiariacomida->precio_unitario;?>', 
'<?php echo $ventadiariacomida->num_cliente;?>',
'<?php echo $ventadiariacomida->nombre_de_categoria;?>',
'<?php echo $ventadiariacomida->cantidad;?>');" 
data-toggle="modal" data-target="#cancelacionesindividuales">
<i class="far fa-trash-alt"></i>
</button>  
                      </td>
                      </tr>
                                                   <?php endforeach;?>  
                                                <?php endif;?>

                    <?php if (!empty($ventadiariabebidas)):?>
                                                      <?php foreach($ventadiariabebidas as $ventadiariabebidas):?>
                                    <tr>
                                      <td><center><font color="white"><?php echo $ventadiariabebidas->num_cliente;?></font></center></td>

                           <td><center><font color="white"><?php echo $ventadiariabebidas->nombre_bebida;?></font></center></td>
                            <td><center><font color="white"><?php echo $ventadiariabebidas->cantidad;?></font></center></td>
                      
                         <td>
<button 
class ="btn btn-danger" 
data-dismiss="modal" aria-label="Close" 
onclick="datosdecancelacionparabebidas('<?php echo $ventadiariabebidas->id_bebida;?>', 
'<?php echo $ventadiariabebidas->precio_unitario;?>', 
'<?php echo $ventadiariabebidas->num_cliente;?>',
'<?php echo $ventadiariabebidas->nombre_bebidae;?>',
'<?php echo $ventadiariabebidas->cantidad;?>);" 
data-toggle="modal" data-target="#cancelacionesindividuales">
<i class="far fa-trash-alt"></i>
</button>                </td>

                         </tr>
                                                     <?php endforeach;?>  
                                                <?php endif;?>

                      <?php if (!empty($ventadiariaextras)):?>
                                          <?php foreach($ventadiariaextras as $ventadiariaextras):?>
                                 <tr>
                                  <td><center><font color="white"><?php echo $ventadiariaextras->num_cliente;?></font></center></td>
                           <td><center><font color="white"><?php echo $ventadiariaextras->nombre;?></font></center></td>
                            <td><center><font color="white"><?php echo $ventadiariaextras->cantidad;?></font></center></td>


                          <td>
<button 
class ="btn btn-danger" 
data-dismiss="modal" aria-label="Close" 
onclick="datosdecancelacionparaextras('<?php echo $ventadiariaextras->id_extra;?>', 
'<?php echo $ventadiariaextras->precio_unitario;?>', 
'<?php echo $ventadiariaextras->num_cliente;?>',
'<?php echo $ventadiariaextras->nombre;?>',
'<?php echo $ventadiariaextras->cantidad;?>);" 
data-toggle="modal" data-target="#cancelacionesindividuales">
<i class="far fa-trash-alt"></i>
</button>                 </td> 
                      
                          </tr> 
                                                   <?php endforeach;?>  
                                                      <?php endif;?>
                        
           </tr>          
         </tbody>                         
       </table>
     </div>
   </div>
 </div>


</div>













<!--MODAL PARA MOSTRAR EL MENU-->
          <!-- Modal  para mostrar los tipos de comida  EJEMPLO
                                                                  
            TACOS
            QUEKAS
            AL HORNO
            BURRITOS
            MULAS-->
                    
<div class="modal fade" id="menu" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel"><font color="white">Elige una opción del menu</font></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<div align="right">  
        <div class="box-body">
                    <div class="col-md-16">
    <table id="examplelist" class="table">
                     <tbody>
                      <tr><!--COMIDAS-->
                        <thead>
                          <tr>
                          <td><center><strong><font color="white" face="Comic Sans MS,arial,verdana"><h3>Comidas</h3></font></strong></center></td>
                          <td><center><font color="white"><h3><i class="fas fa-utensils"></i></h3></font></center></td>
                          </tr>
                        </thead>
                          
           
                         <?php if (!empty($mostrarmenu)):?>
                        <?php foreach($mostrarmenu as $mostrarmenu):?>
                        <tr>
         <td><center><font color="white"><?php echo $mostrarmenu->nombre_de_categoria;?></font></center></td>

                         <td>
                            <div class="btn-group">


<button id="botonmenu" 
class ="btn btn-info" 
onclick="quemodalabro('<?php echo $mostrarmenu->nombre_de_categoria;?>');"
data-dismiss="modal" aria-label="Close">
<span class="far fa-hand-pointer"></span>
</button>
                            </div>
                        </td>
                        </tr>
                                     <?php endforeach;?>  
                                            <?php endif;?><!--COMIDAS-->
                         
                
   
                      
                         <tr><!--BEBIDAS-->
                           <thead>
                          <td><center><strong><font color="white" face="Comic Sans MS,arial,verdana"><h3>Bebidas</h3></font></strong></center></td>
                          <td><center><font color="white"><h3><i class="fas fa-wine-bottle"></i></h3></font></center></td>
                        </thead>

                         <?php if (!empty($mostrarbebidas)):?>
                        <?php foreach($mostrarbebidas as $mostrarbebidas):?>

                      <td><center><font color="white"><?php echo $mostrarbebidas->nombre_bebida;?> 
                      $<?php echo $mostrarbebidas->precio_bebida;?></font></center></td>

                           <td>
                             <div class="btn-group">
<button id="botonmenu" 
class ="btn btn-info" 
onclick="quemodalabro('<?php echo $mostrarbebidas->nombre_bebida;?>');"
data-dismiss="modal" aria-label="Close">
<span class="far fa-hand-pointer"></span>
</button>
                            </div>
                          
                           </td>
                           </tr><!--BEBIDAS-->

                           <?php endforeach;?>  
                                            <?php endif;?><!--BEBIDAS-->

                          
                         <tr> <!--EXTRAS-->
                           <thead>
                          <td><center><strong><font color="white" face="Comic Sans MS,arial,verdana"><h3>Extras</h3></font></strong></center></td>
                          <td><center><font color="white"><h3><i class="fas fa-plus-circle"></i></h3></font></center></td>
                        </thead>
                         <?php if (!empty($extras)):?>
                        <?php foreach($extras as $extras):?>

                      <td><center><font color="white"><?php echo $extras->nombre;?>
                           $<?php echo $extras->precio;?>
                      </font></center></td>
                           
                           <td>
                             <div class="btn-group">
<button id="botonmenu" 
class ="btn btn-info" 
onclick="quemodalabro('<?php echo $extras->nombre;?>');"
data-dismiss="modal" aria-label="Close">
<span class="far fa-hand-pointer"></span>
</button>
                            </div>
                           </td>
                        </tr><!--EXTRAS-->

                         <?php endforeach;?>  
                                            <?php endif;?><!--EXTRAS-->
                     </tbody>  

                       </table>
                   </div>
          </div>
</div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><font color="black">Cerrar</font></button>
      </div>
    </div>
  </div>
</div>

<!-- FIN DEL Modal  para mostrar los tipos de comida 
EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
            BURRITOS
            MULAS-->

<!--******************************************************-->   
<!--FIN DEL MODAL PARA MOSTRAR EL MENU-->
























<!--MODALES DE PRECIOS TANTO EN COMIDAS BEBIDAS Y EXTRAS*******************************************-->

<!--MODAL DE TACOS-->
  
 
<div class="modal fade" id="tacosprecios" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?php echo base_url();?>Menucomida/Agregaradescripciondeventa/<?php echo $preciotacos->precio_asada;?>/<?php echo $preciotacos->precio_chorizo;?>/<?php echo $preciotacos->precio_campechano_a;?>/<?php echo $preciotacos->precio_barbacha;?>/<?php echo $preciotacos->precio_costilla;?>/<?php echo $preciotacos->precio_sencilla;?>/<?php echo $preciotacos->id_comida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">

      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">




<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                          <select class="form-control" id="selecttacos" name="elegircliente">

                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>
<br> <!--ESPACIO ENTRE SECCIONES-->
          



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Tacos de asada</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $preciotacos->precio_asada;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="asada">  
                                        </td>
                                     </tbody>  
                    
                            <!--SEGUNDA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Tacos de chorizo</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>    
                                                </tr>
                                     </thead>
                                <tbody>  
                         <td><center> $<?php echo $preciotacos->precio_chorizo;?>.00 </center></td>
                          
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="chorizo">  
                                        </td>  
                                </tbody>  
                 
                                        <!--TERCERA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Tacos de campechano/a</center></th>
                                                     <th><center>Catidad</center></th>
                                                </tr>
                                     </thead>
                            <tbody>
                                      <tr>
                                         <td><center> $<?php echo $preciotacos->precio_campechano_a;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="campechano"> 
                                        </td>

                                      </tr>
                            </tbody>  
                                      
                                                          <!--CUARTA DIVISION -->
                       <thead>
                                                <tr>
                                                     <th><center>Tacos de barbacha</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $preciotacos->precio_barbacha;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="barbacha"> 
                                        </td>  
                            </tbody>  
                              
                                       <!--QUINTA DIVISION -->
                             <thead>
                                                <tr>
                                                     <th><center>Tacos de Costilla</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $preciotacos->precio_costilla;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="costilla"> 
                                        </td>  
                            </tbody>  
                                      
</table>
                            
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--*********************************************************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
</form>
    </div>
  </div>
</div>


<!--MODAL DE QUEKAS-->

  
 
<div class="modal fade" id="quekasprecios" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url();?>Menucomida/Agregaradescripciondeventa/<?php echo $precioquekas->precio_asada;?>/<?php echo $precioquekas->precio_chorizo;?>/<?php echo $precioquekas->precio_campechano_a;?>/<?php echo $precioquekas->precio_barbacha;?>/<?php echo $precioquekas->precio_costilla;?>/<?php echo $precioquekas->precio_sencilla;?>/<?php echo $precioquekas->id_comida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">

      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">




<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                                   <select class="form-control" id="selectquekas" name="elegircliente">

                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Quekas de asada</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $precioquekas->precio_asada;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="asada">  
                                        </td>
                                     </tbody>  
                    
                            <!--SEGUNDA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Quekas de chorizo</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>    
                                                </tr>
                                     </thead>
                                <tbody>  
                         <td><center> $<?php echo $precioquekas->precio_chorizo;?>.00 </center></td>
                          
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="chorizo">  
                                        </td>  
                                </tbody>  
                 
                                        <!--TERCERA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Quekas de campechano/a</center></th>
                                                     <th><center>Catidad</center></th>
                                                </tr>
                                     </thead>
                            <tbody>
                                      <tr>
                                         <td><center> $<?php echo $precioquekas->precio_campechano_a;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="campechano"> 
                                        </td>

                                      </tr>
                            </tbody>  
                                      
                                                          <!--CUARTA DIVISION -->
                       <thead>
                                                <tr>
                                                     <th><center>Quekas de barbacha</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $precioquekas->precio_barbacha;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="barbacha"> 
                                        </td>  
                            </tbody>  
                              
                                       <!--QUINTA DIVISION -->
                             <thead>
                                                <tr>
                                                     <th><center>Quekas de Costilla</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $precioquekas->precio_costilla;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="costilla"> 
                                        </td>  
                            </tbody>  
                                      
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->
<!--MODAL DE AL HORNO-->

  
 
<div class="modal fade" id="alhornoprecios" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form action="<?php echo base_url();?>Menucomida/Agregaradescripciondeventa/<?php echo $precioalhorno->precio_asada;?>/<?php echo $precioalhorno->precio_chorizo;?>/<?php echo $precioalhorno->precio_campechano_a;?>/<?php echo $precioalhorno->precio_barbacha;?>/<?php echo $precioalhorno->precio_costilla;?>/<?php echo $precioalhorno->precio_sencilla;?>/<?php echo $precioalhorno->id_comida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">

      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">





   <div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                              <select class="form-control" id="selectalhorno" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Al horno asada</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $precioalhorno->precio_asada;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="asada">  
                                        </td>
                                     </tbody>  
                    
                            <!--SEGUNDA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Al horno de chorizo</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>    
                                                </tr>
                                     </thead>
                                <tbody>  
                         <td><center> $<?php echo $precioalhorno->precio_chorizo;?>.00 </center></td>
                          
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="chorizo">  
                                        </td>  
                                </tbody>  
                 
                                        <!--TERCERA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Al horno de campechano/a</center></th>
                                                     <th><center>Catidad</center></th>
                                                </tr>
                                     </thead>
                            <tbody>
                                      <tr>
                                         <td><center> $<?php echo $precioalhorno->precio_campechano_a;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="campechano"> 
                                        </td>

                                      </tr>
                            </tbody>  
                                      
                                                          <!--CUARTA DIVISION -->
                       <thead>
                                                <tr>
                                                     <th><center>Al horno de barbacha</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $precioalhorno->precio_barbacha;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="barbacha"> 
                                        </td>  
                            </tbody>  
                              
                                       <!--QUINTA DIVISION -->
                             <thead>
                                                <tr>
                                                     <th><center>Al horno de Costilla</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $precioalhorno->precio_costilla;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="costilla"> 
                                        </td>  
                            </tbody>  
                            <thead>
                                                <tr>
                                                     <th><center>Al horno de sencilla</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $precioalhorno->precio_sencilla;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="sencilla"> 
                                        </td>  
                            </tbody>  
                                      
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->
<!--MODAL DE MULAS-->

  
 
<div class="modal fade" id="mulasprecios" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<form action="<?php echo base_url();?>Menucomida/Agregaradescripciondeventa/<?php echo $preciomulas->precio_asada;?>/<?php echo $preciomulas->precio_chorizo;?>/<?php echo $preciomulas->precio_campechano_a;?>/<?php echo $preciomulas->precio_barbacha;?>/<?php echo $preciomulas->precio_costilla;?>/<?php echo $preciomulas->precio_sencilla;?>/<?php echo $preciomulas->id_comida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">

      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">




<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                                <select class="form-control" id="selectmulas" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Mulas asada</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $preciomulas->precio_asada;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="asada">  
                                        </td>
                                     </tbody>  
                    
                            <!--SEGUNDA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Mulas de chorizo</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>    
                                                </tr>
                                     </thead>
                                <tbody>  
                         <td><center> $<?php echo $preciomulas->precio_chorizo;?>.00 </center></td>
                          
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="chorizo">  
                                        </td>  
                                </tbody>  
                 
                                        <!--TERCERA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Mulas de campechano/a</center></th>
                                                     <th><center>Catidad</center></th>
                                                </tr>
                                     </thead>
                            <tbody>
                                      <tr>
                                         <td><center> $<?php echo $preciomulas->precio_campechano_a;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="campechano"> 
                                        </td>

                                      </tr>
                            </tbody>  
                                      
                                                          <!--CUARTA DIVISION -->
                       <thead>
                                                <tr>
                                                     <th><center>Mulas de barbacha</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $preciomulas->precio_barbacha;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="barbacha"> 
                                        </td>  
                            </tbody>  
                              
                                       <!--QUINTA DIVISION -->
                             <thead>
                                                <tr>
                                                     <th><center>Mulas de Costilla</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $preciomulas->precio_costilla;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="costilla"> 
                                        </td>  
                            </tbody>  
                        
                                      
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->

<!--MODAL DE BURRITOS-->

  
 
<div class="modal fade" id="burritosprecios" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?php echo base_url();?>Menucomida/Agregaradescripciondeventa/<?php echo $precioburritos->precio_asada;?>/<?php echo $precioburritos->precio_chorizo;?>/<?php echo $precioburritos->precio_campechano_a;?>/<?php echo $precioburritos->precio_barbacha;?>/<?php echo $precioburritos->precio_costilla;?>/<?php echo $precioburritos->precio_sencilla;?>/<?php echo $precioburritos->id_comida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">

      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">





   <div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                                   <select class="form-control" id="selectburritos" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Burritos de asada</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $precioburritos->precio_asada;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="asada">  
                                        </td>
                                     </tbody>  
                    
                            <!--SEGUNDA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Burritos de chorizo</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>    
                                                </tr>
                                     </thead>
                                <tbody>  
                         <td><center> $<?php echo $precioburritos->precio_chorizo;?>.00 </center></td>
                          
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="chorizo">  
                                        </td>  
                                </tbody>  
                 
                                        <!--TERCERA DIVISION -->
                                   <thead>
                                                <tr>
                                                     <th><center>Burritos de campechano/a</center></th>
                                                     <th><center>Catidad</center></th>
                                                </tr>
                                     </thead>
                            <tbody>
                                      <tr>
                                         <td><center> $<?php echo $precioburritos->precio_campechano_a;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="campechano"> 
                                        </td>

                                      </tr>
                            </tbody>  
                                      
                                                          <!--CUARTA DIVISION -->
                       <thead>
                                                <tr>
                                                     <th><center>Burritos de barbacha</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $precioburritos->precio_barbacha;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="barbacha"> 
                                        </td>  
                            </tbody>  
                              
                                       <!--QUINTA DIVISION -->
                             <thead>
                                                <tr>
                                                     <th><center>Burritos de Costilla</center></th>
                                                     
                                                     <th><center>Cantidad</center></th>      
                                                </tr>
                                     </thead>
                            <tbody>
                                      
                         <td><center> $<?php echo $precioburritos->precio_costilla;?>.00 </center></td>
                                        
                                        <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="costilla"> 
                                        </td>  
                            </tbody>  
                        
                                      
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->

<!--MODAL DE AGUA NATURAL-->

  
 
<div class="modal fade" id="aguanaturalprecio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="<?php echo base_url();?>Menucomida/Agregar_las_bebidas_ala_tabla_descripciondeventa/<?php echo $precioaguanatural->precio_bebida;?>/<?php echo $precioaguanatural->id_bebida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">





<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                            <select class="form-control" id="selectaguanatural" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Agua Natural 1 lt.</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $precioaguanatural->precio_bebida;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddebebidas">  
                                        </td>
                                     </tbody>           
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->

<!--MODAL DE CHEVE-->

  
 
<div class="modal fade" id="cheveprecio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="<?php echo base_url();?>Menucomida/Agregar_las_bebidas_ala_tabla_descripciondeventa/<?php echo $preciocerveza->precio_bebida;?>/<?php echo $preciocerveza->id_bebida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">




<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                             <select class="form-control" id="cheve" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Cerveza coronoa o victoria 355ml.</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $preciocerveza->precio_bebida;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddebebidas">  
                                        </td>
                                     </tbody>           
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->

<!--MODAL DE CHESCO-->

  
 
<div class="modal fade" id="chescoprecio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="<?php echo base_url();?>Menucomida/Agregar_las_bebidas_ala_tabla_descripciondeventa/<?php echo $preciochesco->precio_bebida;?>/<?php echo $preciochesco->id_bebida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">



<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                             <select class="form-control" id="chesco" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Chesco 1/2 lt.</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $preciochesco->precio_bebida;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddebebidas">  
                                        </td>
                                     </tbody>           
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->

<!--MODAL DE AGUA DEL DIA-->

  
 
<div class="modal fade" id="aguadeldiaprecio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="<?php echo base_url();?>Menucomida/Agregar_las_bebidas_ala_tabla_descripciondeventa/<?php echo $precioaguadeldia->precio_bebida;?>/<?php echo $precioaguadeldia->id_bebida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">




<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                             <select class="form-control" id="aguadeldia" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Agua del día 1 lt.</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $precioaguadeldia->precio_bebida;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddebebidas">  
                                        </td>
                                     </tbody>           
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************--> 

<!--MODAL DE AGUA DEL DIA DE MEDIO LITRO-->

  
 
<div class="modal fade" id="aguadeldiademedioprecio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form action="<?php echo base_url();?>Menucomida/Agregar_las_bebidas_ala_tabla_descripciondeventa/<?php echo $preciomediaaguadeldia->precio_bebida;?>/<?php echo $preciomediaaguadeldia->id_bebida;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">



<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                             <select class="form-control" id="aguadeldiademedio" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Agua del día 1/2 lt.</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $preciomediaaguadeldia->precio_bebida;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddebebidas">  
                                        </td>
                                     </tbody>           
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->

<!--MODAL DE GUACAMOLE-->

  
 
<div class="modal fade" id="guacamoleprecio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <form action="<?php echo base_url();?>Menucomida/Agregar_los_extras_ala_tabla_descripciondeventa/<?php echo $precioguacamole->precio;?>/<?php echo $precioguacamole->id_extra;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">





   <div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                             <select class="form-control" id="guacamole" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Orden de guacamole</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $precioguacamole->precio;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddeextra">  
                                        </td>
                                     </tbody>           
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->

<!--MODAL DE BIRRIA-->

  
 
<div class="modal fade" id="birriaprecio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
               <form action="<?php echo base_url();?>Menucomida/Agregar_los_extras_ala_tabla_descripciondeventa/<?php echo $preciobirria->precio;?>/<?php echo $preciobirria->id_extra;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">




<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                             <select class="form-control" id="birri" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Birria</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $preciobirria->precio;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddeextra">  
                                        </td>
                                     </tbody>           
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->

<!--MODAL DE MEDIA BIRRIA-->

  
  
<div class="modal fade" id="mediabirriaprecio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="overflow-y: scroll;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" style="background-color: black;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><h4><font color="white">Elige al cliente y escribe las cantidades que vayas a agregar de cada comida</font></h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <form action="<?php echo base_url();?>Menucomida/Agregar_los_extras_ala_tabla_descripciondeventa/<?php echo $preciomediabirria->precio;?>/<?php echo $preciomediabirria->id_extra;?>/<?php echo $mesa;?>/<?php echo $numerodeclientes;?>" method="post">
      <div class="modal-body">
                          

        <!--******************************************************-->
               <!--   CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

             <div align="right">  
                        <div class="box-body">
                                    <div class="col-md-16">




<div align="left">
                  <label for="exampleFormControlSelect1">Escoge un cliente</label>
                             <select class="form-control" id="mediabirri" name="elegircliente">


                                <?php $array = new SplFixedArray($numerodeclientes);?>
                                      <?php $cliente=1;?>
                                      <?php for($a=0; $a<count($array); $a++){?>
                                      <?php $array[$a]=$cliente;?>
                                       <?php $cliente++;?>
                                     <?php };?>


                    <option></option>

                            <?php for($a=0; $a<count($array); $a++){?>            
                                      <?php $cliente++;?>
      <option value="<?php echo $array[$a];?>"><?php echo $array[$a];?></option>

                        <?php }; ?> 
                       
    </select>
</div>



                     <table  class="table">
                                         <thead>
                                                <tr>
                                                     <th><center>Media birria</center></th>              
                                                     <th><center>Cantidad</center></th>   
                                                </tr>
                                            </thead>
                                     <tbody>
                         <td><center> $<?php echo $preciomediabirria->precio;?>.00</center></td>

                                         <td>
                                        <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddeextra">  
                                        </td>
                                     </tbody>           
</table>
                 
                                   </div>
                          </div>
                </div>
                <!--   FIND DE CODIGO PARA MOSTRAR LOS TIPOS DE COMIDA, EJEMPLO
            TACOS
            QUEKAS
            AL HORNO
              BURRITOS
            MULAS-->

<!--******************************************************-->
                              

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary"><font color="black">Agregar</font></button>
      </div>
    </form>
    </div>
  </div>
</div>

<!--************************************************************************************************-->
  