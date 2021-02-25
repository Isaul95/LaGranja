<!-- ============  AKI HAREMOS TODO EL MOVIMEINTO DE LISTAR LOS PRODUCTOS DE LA BD  ============ -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="background-color: #060405;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
            <h1>
                <center>
                    <strong><font color="red" face="Comic Sans MS,arial,verdana">ORDENES CANCELADAS</font></strong>
               </center>
             </h1>
             <br>
             <br>
              <h3>
                  <font color="#D34787" face="Comic Sans MS,arial,verdana">Total por cancelaciones $ <?php echo $ventasdeldia->importe?>.00</font>
                </h3>
            </section>
            <!-- Main content -->
            <section class="content">
                 
                 <div class="box box-solid" style="background-color: #060405;">
                    <div class="box-body">
              
              
                      </div>
                  </div>


                <!-- Default box --> 
                <div class="box box-solid" style="background-color: #060405;">
<div class="box-body">


<div class="row">
<div class="col-md-12">
  <h5>
<table id="examplelist"  class="table">
<thead>
<tr>
<th><center><font color="white" face="Comic Sans MS,arial,verdana">Mesa</font></center></th>
<th><center><font color="white" face="Comic Sans MS,arial,verdana">Producto</font></center></th>

<th><center><font color="white" face="Comic Sans MS,arial,verdana">Cantidad</font></center></th>
<th><center><font color="white" face="Comic Sans MS,arial,verdana">Precio unitario</font></center></th>

<th><center><font color="white" face="Comic Sans MS,arial,verdana">Importe</font></center></th>
<th><center><font color="white" face="Comic Sans MS,arial,verdana">Fecha</font></center></th>
<th><center><font color="white" face="Comic Sans MS,arial,verdana">Hora</font></center></th>



</tr>

</thead>
<tbody>
<tr>


<?php if (!empty($comidacancelada)):?>
<?php foreach($comidacancelada as $comidacancelada):?>

<tr>



<?php $cantidad = $comidacancelada->precio_unitario;?>

<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->mesa;?></font></center></td>
<?php if ($comidacancelada->nombre_de_categoria=="Tacos"):?>

<?php if ($cantidad==15):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de asada</font></center></td>
<?php endif;?>

<?php if ($cantidad==13):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de chorizo</font></center></td>
<?php endif;?>

<?php if ($cantidad==17):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de campechano</font></center></td>
<?php endif;?>

<?php if ($cantidad==14):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de barbacha</font></center></td>
<?php endif;?>

<?php if ($cantidad==35):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de costilla</font></center></td>
<?php endif;?>
<?php endif;?>

<?php if ($comidacancelada->nombre_de_categoria=="Quekas"):?>
<?php if ($cantidad==45):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de asada</font></center></td>

<?php endif;?>
<?php if ($cantidad==40):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de chorizo</font></center></td>

<?php endif;?>
<?php if ($cantidad==50):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de campechano</font></center></td>

<?php endif;?>
<?php if ($cantidad==46):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de barbacha</font></center></td>

<?php endif;?>
<?php if ($cantidad==70):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de costilla</font></center></td>
<?php endif;?>
<?php endif;?>
<?php if ($comidacancelada->nombre_de_categoria=="Al horno"):?>
<?php if ($cantidad==45):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de asada</font></center></td>

<?php endif;?>
<?php if ($cantidad==40):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de chorizo</font></center></td>

<?php endif;?>
<?php if ($cantidad==50):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de campechano</font></center></td>

<?php endif;?>
<?php if ($cantidad==46):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de barbacha</font></center></td>

<?php endif;?>
<?php if ($cantidad==70):?>
<td><font color="white" face="Comic Sans MS,arial,verdana"><center><?php echo $comidacancelada->nombre_de_categoria;?> de costilla</center></center></td>
<?php endif;?>
<?php if ($cantidad==35):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de sencilla</font></center></td>
<?php endif;?>
<?php endif;?>
<?php if ($comidacancelada->nombre_de_categoria=="Mulas"):?>
<?php if ($cantidad==19):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de asada</font></center></td>

<?php endif;?>
<?php if ($cantidad==17):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de chorizo</font></center></td>

<?php endif;?>
<?php if ($cantidad==21):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de campechano</font></center></td>

<?php endif;?>
<?php if ($cantidad==18):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de barbacha</font></center></td>

<?php endif;?>
<?php if ($cantidad==45):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de costilla</font></center></td>
<?php endif;?>
<?php endif;?>
<?php if ($comidacancelada->nombre_de_categoria=="Burritos"):?>
<?php if ($cantidad==45):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de asada</font></center></td>

<?php endif;?>
<?php if ($cantidad==40):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de chorizo</font></center></td>
<?php endif;?>

<?php if ($cantidad==50):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de campechano</font></center></td>
<?php endif;?>

<?php if ($cantidad==46):?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->nombre_de_categoria;?> de barbacha</font></center></td>
<?php endif;?>

<?php if ($cantidad==70):?>
<td><font color="white" face="Comic Sans MS,arial,verdana"><center><?php echo $comidacancelada->nombre_de_categoria;?> de costilla</center></center></td>
<?php endif;?>

<?php endif;?>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->cantidad;?></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana">$<?php echo $comidacancelada->precio_unitario;?>.00</font></center></td>  
<td><center><font color="white" face="Comic Sans MS,arial,verdana">$<?php echo $comidacancelada->importe;?>.00</font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->Fecha;?></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $comidacancelada->Hora;?></font></center></td>

</tr>
<?php endforeach;?>  
<?php endif;?>

<?php if (!empty($bebidascanceladas)):?>
<?php foreach($bebidascanceladas as $bebidascanceladas):?>
<tr>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $bebidascanceladas->mesa;?></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $bebidascanceladas->nombre_bebida;?></font></center> </td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $bebidascanceladas->cantidad;?></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana">$<?php echo $bebidascanceladas->precio_unitario;?>.00</font></center></td>  
<td><center><font color="white" face="Comic Sans MS,arial,verdana">$<?php echo $bebidascanceladas->importe;?>.00</font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $bebidascanceladas->Fecha;?></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $bebidascanceladas->Hora;?></font></center></td>

</tr>
<?php endforeach;?>  
<?php endif;?>

<?php if (!empty($extrascancelados)):?>
<?php foreach($extrascancelados as $extrascancelados):?>
<tr>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $extrascancelados->mesa;?></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $extrascancelados->nombre;?></font></center> </td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $extrascancelados->cantidad;?></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana">$<?php echo $extrascancelados->precio_unitario;?>.00</font></center></td>  
<td><center><font color="white" face="Comic Sans MS,arial,verdana">$<?php echo $extrascancelados->importe;?>.00</font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $extrascancelados->Fecha;?></font></center></td>
<td><center><font color="white" face="Comic Sans MS,arial,verdana"><?php echo $extrascancelados->Hora;?></font></center></td>

</tr> 
<?php endforeach;?>  
<?php endif;?>
</tr>





</tbody>
</table>
</h5>
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
