<!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->             
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>   
            <center><strong><font color="#D34787">Restaurante "El Toloache"</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Ciudad Iguala de la Independencia, Guerrero</font></small></center>
        </h1>
            </section>
            <!-- Main content -->
        
            <section class="content">


                
                
     <div class="row">       

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>0</h3> 

                            <p>Total Ingresos</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
<!-- TIENE UN style PARA DARLE EL % ->> <h3>53<sup style="font-size: 20px">%</sup></h3> -->
                 <h3><?php echo $cantUsuarios;?></h3>
                <p>Usuarios</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner"> 
                <h3><?php echo $cantventa;?></h3>
      <!--- SE IMPRIME (consulta) LA CANTIDAD DE VENTAS REALIZADAS -->
                <p>Ventas Completadas</p>
            </div>
            <div class="icon">    
                <i class="fas fa-money-check-alt"></i>   <!--- for user add-- ion ion-person-add -->
            </div>
            <a href="<?php echo base_url();?>menuventas" class="small-box-footer">Ver Ventas <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?php echo $cantdescripcion_de_venta;?></h3>

                        <p>Ventas Canceladas</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-trash"></i> <!--- grafica de rueda -- ion ion-pie-graph -->
                    </div>
                    <a href="<?php echo base_url();?>menuventascanceladas" class="small-box-footer">Ver Cancelaciones <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Monthly Recap Report</h3>

                <div class="box-tools pull-right">

                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">                        

<div id="grafico" style="margin: 0 auto"></div>

                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- ./box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->    
              

<!---  =====================>> VIDEO DE GRAFICAS PARTE 1 <<<=======
https://www.youtube.com/watch?v=IuJNoL8p7Zc&feature=share&fbclid=IwAR3Hnu7zXDH6hkF1NGCmSp8mn2064-hSc_0HanldLlRFVWvpLMlU60Eow9A
-->

            </section>       
            <!-- /.content -->
        </div>        
        <!-- /.content-wrapper -->
