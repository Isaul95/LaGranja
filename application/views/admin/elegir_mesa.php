 <script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
  <script type="text/javascript">
     function abrirmodalparadefinirnumerodeclientesono($mesa){

     if($mesa==1){
        
 $(document).ready(function(){
        $('#buton1').prop('disabled', "false");  
     });
     }

  if($mesa==2){
            
    $(document).ready(function(){
        $('#buton2').attr('disabled', "false");  
     });
        }
 
    
    if($mesa==3){
              
     $(document).ready(function(){
        $('#buton3').attr('disabled', "false");  
     });  

     }
   
  if($mesa==4){
            
     $(document).ready(function(){
        $('#buton4').attr('disabled', "false");  
     });
       }

  if($mesa=='A1'){
        
 $(document).ready(function(){
    $('#buton5').attr('disabled', "false");  
 });
   }

   if($mesa=='A2'){
        
 $(document).ready(function(){
    $('#buton6').attr('disabled', "false");  
 });
   }

   if($mesa=='A3'){
        
 $(document).ready(function(){
    $('#buton7').attr('disabled', "false");  
 });
   }

   if($mesa=='A4'){
        
 $(document).ready(function(){
    $('#buton8').attr('disabled', "false");  
 });
   }
  
  }
  </script>

   <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
    
            <div class="content-wrapper" style="background-color: blue;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>
                 <center><strong><font color="#D34787">Restaurante "El Toloache"</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Elige una mesa para empezar la venta</font></small></center>
        
        </h1>



   <!--Enviado los numeros de mesa que se encuentran actualmente en turno al metodo de javascript 
   abrirmodalparadefinirnumerodeclientesono-->
         <?php if (!empty($mesadisponible)):?>
               <?php foreach($mesadisponible as $mesadisponible):?>

<!--        <center>MESA:<?php echo $mesadisponible->mesa;?></center> 
<center>Numero de clientes:<?php echo $mesadisponible->numero_de_clientes;?></center> 
-->
        <script language="javascript"> 
         abrirmodalparadefinirnumerodeclientesono('<?php echo $mesadisponible->mesa;?>'); 
        </script>


<?php if ($mesadisponible->mesa==1):?> <!--CONDICIONAL DE LA MESA 1 OCUPADA-->

   <!--CUANDO LA MESA 1 ESTA OCUPADA-->
          <div id="mesa1ocupado" style="display: all;">
  <a class="btn btn-primary btn-lg" 
  href="<?php echo base_url()?>Menucomida/mesaocupada/<?php echo $mesadisponible->mesa;?>/<?php echo $mesadisponible->numero_de_clientes;?>">
    <strong> Agregar </strong><span class="fas fa-arrow-right"></span></a>
 <h5><strong><font color="red">Mesa ocupado</font></strong></h5>
   
          </div>
  <!--CUANDO LA MESA 1 ESTA OCUPADA-->

       <?php endif;?><!--CONDICIONAL DE LA MESA 1 OCUPADA-->


  <?php if ($mesadisponible->mesa==2):?> <!--CONDICIONAL DE LA MESA 2 OCUPADA-->

    <!--CUANDO LA MESA 2 ESTA OCUPADA-->
           <div id="mesa2ocupado" style="display: all;">
 <a class="btn btn-primary btn-lg" href="<?php echo base_url()?>Menucomida/mesaocupada/<?php echo $mesadisponible->mesa;?>/<?php echo $mesadisponible->numero_de_clientes;?>">
      <strong> Agregar </strong><span class="fas fa-arrow-right"></span></a>
       <h5><strong><font color="red">Mesa ocupado</font></strong></h5>
  
             </div>
            
  <!--CUANDO LA MESA 2 ESTA OCUPADA-->

  <?php endif;?><!--CONDICIONAL DE LA MESA 2 OCUPADA-->


   <?php if ($mesadisponible->mesa==3):?> <!--CONDICIONAL DE LA MESA 3 OCUPADA-->

    <!--CUANDO LA MESA 3 ESTA OCUPADA-->
            <div id="mesa3ocupado" style="display: all;">
<a class="btn btn-primary btn-lg" 
  href="<?php echo base_url()?>Menucomida/mesaocupada/<?php echo $mesadisponible->mesa;?>/<?php echo $mesadisponible->numero_de_clientes;?>">
 
      <strong> Agregar </strong><span class="fas fa-arrow-right"></span></a>
          <h5><strong><font color="red">Mesa ocupado</font></strong></h5>
  
             </div>
          
  <!--CUANDO LA MESA 3 ESTA OCUPADA-->

  <?php endif;?><!--CONDICIONAL DE LA MESA 3 OCUPADA-->

 
  <?php if ($mesadisponible->mesa==4):?> <!--CONDICIONAL DE LA MESA 4 OCUPADA-->

 <!--CUANDO LA MESA 4 ESTA OCUPADA-->
 <div id="mesa4ocupado" style="display: all;">
 <a class="btn btn-primary btn-lg" 
  href="<?php echo base_url()?>Menucomida/mesaocupada/<?php echo $mesadisponible->mesa;?>/<?php echo $mesadisponible->numero_de_clientes;?>">
 
      <strong> Agregar </strong><span class="fas fa-arrow-right"></span></a>
 <h5><strong><font color="red">Mesa ocupado</font></strong></h5>
  
 </div>
  
  <!--CUANDO LA MESA 4 ESTA OCUPADA-->


  <?php endif;?><!--CONDICIONAL DE LA MESA 5 OCUPADA-->
 
<?php if ($mesadisponible->mesa=='A1'):?> <!--CONDICIONAL DE LA MESA 4 OCUPADA-->

 <!--CUANDO LA MESA 4 ESTA OCUPADA-->
 <div id="mesa5ocupado" style="display: all;">
 <a class="btn btn-primary btn-lg" 
  href="<?php echo base_url()?>Menucomida/mesaocupada/<?php echo $mesadisponible->mesa;?>/<?php echo $mesadisponible->numero_de_clientes;?>">
      <strong> Agregar </strong><span class="fas fa-arrow-right"></span></a>
 <h5><strong><font color="red">Mesa ocupado</font></strong></h5>
 
 </div>
  
  <!--CUANDO LA MESA 4 ESTA OCUPADA-->


  <?php endif;?><!--CONDICIONAL DE LA MESA 6 OCUPADA-->

<?php if ($mesadisponible->mesa=='A2'):?> <!--CONDICIONAL DE LA MESA 4 OCUPADA-->

 <!--CUANDO LA MESA 4 ESTA OCUPADA-->
 <div id="mesa6ocupado" style="display: all;">
 <a class="btn btn-primary btn-lg" 
  href="<?php echo base_url()?>Menucomida/mesaocupada/<?php echo $mesadisponible->mesa;?>/<?php echo $mesadisponible->numero_de_clientes;?>">
      <strong> Agregar </strong><span class="fas fa-arrow-right"></span></a>
<h5><strong><font color="red">Mesa ocupado</font></strong></h5>
  
 </div>
  
  <!--CUANDO LA MESA 4 ESTA OCUPADA-->


  <?php endif;?><!--CONDICIONAL DE LA MESA 7 OCUPADA-->

<?php if ($mesadisponible->mesa=='A3'):?> <!--CONDICIONAL DE LA MESA 4 OCUPADA-->

 <!--CUANDO LA MESA 4 ESTA OCUPADA-->
 <div id="mesa7ocupado" style="display: all;">
 <a class="btn btn-primary btn-lg" 
  href="<?php echo base_url()?>Menucomida/mesaocupada/<?php echo $mesadisponible->mesa;?>/<?php echo $mesadisponible->numero_de_clientes;?>">
      <strong> Agregar </strong><span class="fas fa-arrow-right"></span></a>
<h5><strong><font color="red">Mesa ocupado</font></strong></h5>
  
 </div>

  <!--CUANDO LA MESA 4 ESTA OCUPADA-->


  <?php endif;?><!--CONDICIONAL DE LA MESA 4 OCUPADA-->


<?php if ($mesadisponible->mesa=='A4'):?> <!--CONDICIONAL DE LA MESA 8 OCUPADA-->

 <!--CUANDO LA MESA 8 ESTA OCUPADA-->
 <div id="mesa8ocupado" style="display: all;">
 <a class="btn btn-primary btn-lg" 
  href="<?php echo base_url()?>Menucomida/mesaocupada/<?php echo $mesadisponible->mesa;?>/<?php echo $mesadisponible->numero_de_clientes;?>">
      <strong> Agregar </strong><span class="fas fa-arrow-right"></span></a>
<h5><strong><font color="red">Mesa ocupado</font></strong></h5>
  
 </div>

  <!--CUANDO LA MESA 8 ESTA OCUPADA-->

  <?php endif;?><!--CONDICIONAL DE LA MESA 4 OCUPADA-->

  <?php endforeach;?><!-- FIN DE CONDICIONAL SI LAS MESAS ESTAN OCUPADAS-->
      <?php endif;?><!--FIN DE CONDICIONAL SI LAS MESAS ESTAN OCUPADAS
   Enviado los numeros de mesa que se encuentran actualmente en turno al metodo de javascript 
   abrirmodalparadefinirnumerodeclientesono-->
  

<div id ="divisiondemesas">
  

            <img src="<?php echo base_url()?>assets/template/dist/img/division.png"  class="user-image" alt="User Image" width=500px heigth=800px>

</div>




 
                    <!---div class="box box-solid"> <div class="box-body">
Esta vista es la del dashboard WELCOME ISAUL HERE IS MY WORld <br> </div>  <! /.box-body >  </div-->
<div id="mesa1libre">
  <left><font color="white"><h3>1</h3></font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">
            <button id="buton1" type="button" 
            onclick="mandanumerodemesa_almodal('1');" 
data-toggle="modal" data-target="#mesa" class="close">
                   <center><img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg"  class="user-image" alt="User Image" width=100px heigth=100px></center>
                 </button>
</div>                 


<div id="mesa2libre">
    <left><font color="white"><h3>2</h3></font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">
      <button id="buton2" type="button" 
      onclick="mandanumerodemesa_almodal('2');" 
      data-toggle="modal" data-target="#mesa" class="close">
                   <center><img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg"  class="user-image" alt="User Image" width=100px heigth=100px></center>
                 </button>
</div>

<div id="mesa3libre">
  <left><font color="white"><h3>3</h3></font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">
        <button id="buton3" type="button" 
        onclick="mandanumerodemesa_almodal('3');" 
        data-toggle="modal" data-target="#mesa" class="close">
                   <center><img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg"  class="user-image" alt="User Image" width=100px heigth=100px></center>
                 </button>
</div>

<div id="mesa4libre">
    <left><font color="white"><h3>4</h3></font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">
            <button id="buton4" type="button" 
            onclick="mandanumerodemesa_almodal('4');" 
            data-toggle="modal" data-target="#mesa" class="close">
                   <center><img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg"  class="user-image" alt="User Image" width=100px heigth=100px></center>
                 </button>
</div>

<div id="mesa5libre">
    <left><font color="white"><h3>A1</h3></font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">
            <button id="buton5" type="button" 
            onclick="mandanumerodemesa_almodal('A1');" 
            data-toggle="modal" data-target="#mesa" class="close">
                   <center><img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg"  class="user-image" alt="User Image" width=100px heigth=100px></center>
                 </button>
</div>

<div id="mesa6libre">
    <left><font color="white"><h3>A2</h3></font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">
            <button id="buton6" type="button" 
            onclick="mandanumerodemesa_almodal('A2');" 
            data-toggle="modal" data-target="#mesa" class="close">
                   <center><img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg"  class="user-image" alt="User Image" width=100px heigth=100px></center>
                 </button>
</div>
     
<div id="mesa7libre">
    <left><font color="white"><h3>A3</h3></font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">
            <button id="buton7" type="button" 
            onclick="mandanumerodemesa_almodal('A3');" 
            data-toggle="modal" data-target="#mesa" class="close">
                   <center><img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg"  class="user-image" alt="User Image" width=100px heigth=100px></center>
                 </button>
</div>

<div id="mesa8libre">
    <left><font color="white"><h3>A4</h3></font><font color="#2F4D97" face="Comic Sans MS,arial,verdana">
            <button id="buton8" type="button" 
            onclick="mandanumerodemesa_almodal('A4');" 
            data-toggle="modal" data-target="#mesa" class="close">
                   <center><img src="<?php echo base_url()?>assets/template/dist/img/marranito.jpg"  class="user-image" alt="User Image" width=100px heigth=100px></center>
                 </button>
</div>



            </section>
            <!-- Main content -->
            <!-- /.content -->
        </div>
        
        <!-- /.content-wrapper -->
        <!--**********************ELEGIR NUMERO DE CLIENTES EN LA MESA 1***********************************-->

 






          <!-- Modal  para definir el numero de clientes-->
                    
<div class="modal fade" id="mesa" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel"><strong><font color="black" face="Comic Sans MS,arial,verdana">¿Cuántos clientes nos acompañan?</font></strong></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>  
                                            
  <form action="<?php echo base_url();?>Menucomida/mesalibre" method="post"> 

     <input type="hidden" class="form-control" placeholder="Cantidad en numero" id= "numerodemesa" name="numerodemesa"> 

      <div class="modal-body">
             <div align="center">  
                        <div class="box-body">
                                    <div class="col-md-16">
 
                                      <table>
                                        <tbody>
                                           <tr> <!--EXTRAS-->      
                                           <td>
                                             <input type="text" class="form-control" placeholder="Cantidad en numero" name="cantidaddeclientes">  
                                           </td>
                                        </tr><!--EXTRAS-->
                    
                                        </tbody>
                                      </table> 
                                   </div>
                          </div>
                </div>
      </div>
     <div class="modal-footer">
             <button type="submit" class="btn btn-secondary"><font color="black" face="Comic Sans MS,arial,verdana">Agregar clientes</font></button>
          </div>
      </form>
    </div>
  </div>
</div>

          <!-- Modal  para definir el numero de clientes-->

<!--**********************ELEGIR NUMERO DE CLIENTES EN LA MESA 1***********************************-->

       