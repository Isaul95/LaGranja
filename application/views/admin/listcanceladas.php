<!-- ============  AKI HAREMOS TODO EL MOVIMEINTO DE LISTAR LOS PRODUCTOS DE LA BD  ============ -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: #060405;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <h1>
                <center>
                    
                    <strong><font color="red" face="Comic Sans MS,arial,verdana">LISTA DE LAS ORDENES CANCELADAS</font></strong>
               </center>
             </h1>
            </section>
            <!-- Main content -->
            <section class="content">
                 
                 <div class="box box-solid" style="background-color: #060405;">
                    <div class="box-body">
                <h3>
               <strong><font color="#D34787">MESA <?php echo $numerodemesa;?></font></strong>
                 </h3>
                 <h3>
                      <strong><font color="#D34787">Numero de cancelación: <?php echo $idventa;?></font></strong>
              
                 </h3>
                  <h3>
<strong><font color="#D34787">Fecha: <?php echo $Fecha;?></font></strong>
              
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

<th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Producto</h4></font></center></th>

<th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Cantidad</h4></font></center></th>
<th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Precio unitario</h4></font></center></th>

<th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Importe</h4></font></center></th>

<th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Hora</h4></font></center></th>
 
    
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
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</h4></font></center></td>
            <?php endif;?>

            <?php if ($cantidad==13):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</h4></font></center></td>
            <?php endif;?>

            <?php if ($cantidad==17):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</h4></font></center></td>
            <?php endif;?>

            <?php if ($cantidad==14):?>
     <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</h4></font></center></td>
            <?php endif;?>

            <?php if ($cantidad==35):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</h4></font></center></td>
            <?php endif;?>
    <?php endif;?>

            <?php if ($ventadiariacomida->nombre_de_categoria=="Quekas"):?>
              <?php if ($cantidad==45):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</h4></font></center></td>
          
            <?php endif;?>
            <?php if ($cantidad==40):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==50):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==46):?>
     <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==70):?>
            <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</h4></font></center></td>
            <?php endif;?>
            <?php endif;?>
            <?php if ($ventadiariacomida->nombre_de_categoria=="Al horno"):?>
              <?php if ($cantidad==45):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==40):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==50):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==46):?>
     <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==70):?>
            <td><font color="white" face="Comic Sans MS,arial,verdana"><center><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</h4></center></center></td>
            <?php endif;?>
            <?php if ($cantidad==35):?>
      <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de sencilla</h4></font></center></td>
            <?php endif;?>
            <?php endif;?>
            <?php if ($ventadiariacomida->nombre_de_categoria=="Mulas"):?>
              <?php if ($cantidad==19):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==17):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==21):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==18):?>
     <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==45):?>
            <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</h4></font></center></td>
            <?php endif;?>
            <?php endif;?>
            <?php if ($ventadiariacomida->nombre_de_categoria=="Burritos"):?>
              <?php if ($cantidad==45):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de asada</h4></font></center></td>

            <?php endif;?>
            <?php if ($cantidad==40):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de chorizo</h4></font></center></td>
            <?php endif;?>

            <?php if ($cantidad==50):?>
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de campechano</h4></font></center></td>
            <?php endif;?>

            <?php if ($cantidad==46):?>
     <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de barbacha</h4></font></center></td>
            <?php endif;?>

            <?php if ($cantidad==70):?>
            <td><font color="white" face="Comic Sans MS,arial,verdana"><center><h4><?php echo $ventadiariacomida->nombre_de_categoria;?> de costilla</h4></center></center></td>
            <?php endif;?>

            <?php endif;?>
        <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4> <?php echo $ventadiariacomida->cantidad;?></h4></font></center></td>
        <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $ventadiariacomida->precio_unitario;?>.00</h4></font> </center></td>  
        <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4> $<?php echo $ventadiariacomida->importe;?>.00</h4></font></center></td>
        <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4><?php echo $ventadiariacomida->Hora;?></h4></font></center></td>
                  </tr>
                                 <?php endforeach;?>  
                            <?php endif;?>

    <?php if (!empty($ventadiariabebidas)):?>
                                  <?php foreach($ventadiariabebidas as $ventadiariabebidas):?>
                <tr>
          
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4> <?php echo $ventadiariabebidas->nombre_bebida;?></h4></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4> <?php echo $ventadiariabebidas->cantidad;?></h4></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $ventadiariabebidas->precio_unitario;?>.00</h4></font></center></td>  
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $ventadiariabebidas->importe;?>.00</h4></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>
  <?php echo $ventadiariabebidas->Hora;?></h4></font></center></td>

                    </tr>
                                 <?php endforeach;?>  
                            <?php endif;?>

    <?php if (!empty($ventadiariaextras)):?>
                      <?php foreach($ventadiariaextras as $ventadiariaextras):?>
             <tr>
                        
  <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4> <?php echo $ventadiariaextras->nombre;?></h4></font></center></td>
  <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4> <?php echo $ventadiariaextras->cantidad;?></h4></font></center></td>
  <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $ventadiariaextras->precio_unitario;?>.00.00</h4></font></center></td>  
  <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $ventadiariaextras->importe;?>.00.00</h4></font> </center></td>
  <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4> <?php echo $ventadiariaextras->Hora;?></h4></font></center></td>
                </tr> 
                                 <?php endforeach;?>  
                            <?php endif;?>
                 </tr>
            

            <thead>
                <tr>
                 
                     
                     <th><center></center></th>  
                     <th><center></center></th>   
                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Pago</h4></font></center></th>
                     <th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Cambio</h4></font></center></th>
                    <th><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>Total</h4></font></center></th>
                     
                                  
                </tr>

            </thead>

                 <?php if (!empty($totalpagocambioventaparticular)):?>
                  <?php foreach($totalpagocambioventaparticular as $totalpagocambioventaparticular):?>
             <tr>
                      
                       <th><center></center></th>  
                       <th><center></center></th>
                     
    <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $totalpagocambioventaparticular->pago;?>.00</font></center></td>  
  <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $totalpagocambioventaparticular->cambio;?>.00</font></center></td>
  <td><center><font color="white" face="Comic Sans MS,arial,verdana"><h4>$<?php echo $totalpagocambioventaparticular->total;?>.00</font></center></td>
       
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
