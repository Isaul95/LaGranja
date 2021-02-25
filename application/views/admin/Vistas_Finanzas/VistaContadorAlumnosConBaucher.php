<!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>
            <center><strong><font color="#D34787">Contador de alumnos con bauche</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Ciudad Iguala de la Independencia, Guerrero</font></small></center>
        </h1>
            </section>
            <!-- Main content -->

            <section class="content">




     <div class="row">



<!-- **********************    CUADRO #2  **************************
CONTADOR DE CUANTOS ALUMNOS YA SUBIERON SU BAUCHER AL SISTEMA -->
              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                      <div class="inner">
          <!-- TIENE UN style PARA DARLE EL % ->> -->
          <!-- <h3>53<sup style="font-size: 20px">%</sup></h3>  -->
                           <h3><?php echo $countAlumnosColegiatura;?></h3>
                          <strong><p>Pago de Colegiaturas</p></strong>
                      </div>
                      <div class="icon">
                          <i class="fas fa-money-check-alt"></i>
                      </div>
                        <a href="<?php echo base_url();?>Finanzas/HabilitarAlumnos/Vista_HabilitarAlumnoDespuesDeSubirBaucher?Pago=Colegiatura" class="small-box-footer">Ver Lista <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
              </div>
 <!-- ******************    CUADRO #1   *********************** -->
<div class="col-lg-3 col-xs-6">

                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3><?php echo $countAlumnosCursos;?></h3>
                          <strong>  <p>Pago de Cursos</p></strong>
                        </div>
                        <div class="icon">
                            <i class="fa fa-chalkboard-teacher"></i>
                        </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
            <a href="<?php echo base_url();?>Finanzas/HabilitarAlumnos/Vista_HabilitarAlumnoDespuesDeSubirBaucher?Pago=Cursos" class="small-box-footer">Ver Lista <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>

    <!-- ******************    CUADRO #3   *********************** -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $countAlumnosExtraordinario;?></h3>
                    <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
           <!-- SE IMPRIME (consulta) LA CANTIDAD DE VENTAS REALIZADAS -->
                  <strong> <p>Pago de Extraordinarios</p></strong>
                </div>
                <div class="icon">
                  <i class="fa fa-user-edit"></i>
                </div>
    <!-- <a href="<?php echo base_url();?>menuventas" class="small-box-footer">Ver Ventas <i class="fa fa-arrow-circle-right"></i></a> -->
    <a href="<?php echo base_url();?>Finanzas/HabilitarAlumnos/Vista_HabilitarAlumnoDespuesDeSubirBaucher?Pago=Extraordinario" class="small-box-footer">Ver Lista <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>


     <!-- ******************    CUADRO #4  *********************** -->
            <div class="col-lg-3 col-xs-6">

                <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?php echo $countAlumnosTitulo;?></h3>
                          <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
          <!-- <strong><font color="#D34787">  <p>Pago de Titulos*</p> </font></strong> -->
                        <strong><p>Pago de Titulos</p></strong>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
  <!-- <a href="<?php echo base_url();?>menuventascanceladas" class="small-box-footer">Ver Cancelaciones <i class="fa fa-arrow-circle-right"></i></a> -->
  <a href="<?php echo base_url();?>Finanzas/HabilitarAlumnos/Vista_HabilitarAlumnoDespuesDeSubirBaucher?Pago=Titulo" class="small-box-footer">Ver Lista <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


</div>


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
