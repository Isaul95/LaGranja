<!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar" >
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
<!-- ========= empieza here -->
      <?php
          $user=null;
          $student=2;
          $admin=1;
          $profesor=3;
          $user= $this->session->userdata("rol");
          // echo $user;
      ?>
<!-- ========= finally here -->

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header"><strong>OPCIONES DE MENU</strong></li>
                    <li>
                        <a href="<?php echo base_url();?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>

              <!--  /* ============================================================================================= */
                    /*    ESTE CRUD ES PARA PRUEBAS CODIGO DE PRUEBAS DESCOMENTARLO PARA VER COMO ESTA HECHO JQuery  */
                    /* ============================================================================================= */    -->

                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fas fa-balance-scale"></i> <span>PRUEBAS CRUD</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo base_url();?>mantenimiento/RegistroPagos">
                              Formato de registro de pago</a></li>

                          <li><a href="<?php echo base_url();?>mantenimiento/RegistrarPagos">
                              Registrar pago <br> (Formato/Archivo)</a></li>

                          <li><a href="<?php echo base_url();?>mantenimiento/RegistrosPag">
                              Nuevo pago <br> (VIEW REAL)</a></li>

                          <li><a href="<?php echo base_url();?>mantenimiento/extras">
                            Consulta pagos</a></li>

                        </ul>
                    </li> -->




<!--  AKI EMPIEZA  PARA LOS ALUMNOS EN EL ASide =============================00 -->
<!-- <?php echo $this->session->userdata("username")?> <br>
<?php echo $this->session->userdata("rol")?> -->

 <?php if($user==$student):?>
                                <li class="treeview">
                                   <a href="#">   <!--- class="fa fa-cogs" -->
                                       <i class="fas fa-user-graduate"></i>  <span>Alumnos</span>
                                       <span class="pull-right-container">
                                           <i class="fa fa-angle-left pull-right"></i>
                                       </span>
                                   </a>
                                   <ul class="treeview-menu">

                            <li><a href="<?php echo base_url();?>alumnos/altaBaucherBanco">
                               <i class="fas fa-money-check-alt"></i> Subir Baucher</a>
                           </li>

                           <li><a href="<?php echo base_url();?>alumnos/Evaluacion_Alum_docente">
                              <i class="fas fa-edit"></i> Evaluación Docente</a>
                          </li>

                          <li><a href="<?php echo base_url();?>alumnos/Servicio_social">
                             <i class="fas fa-edit"></i> Servicio social</a>
                         </li>

                         <li><a href="<?php echo base_url();?>alumnos/Practicas_profesionales">
                            <i class="fas fa-edit"></i> Practicas profesionales</a>
                        </li>

                        <li><a href="<?php echo base_url();?>alumnos/Titulacion">
                           <i class="fas fa-edit"></i> Titulación</a>
                       </li>
                                   </ul>
                               </li>
 <?php endif;?>
<!--  AKI termina finally  PARA LOS ALUMNOS EN EL ASide =============================00 -->



<?php if($user==1):?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-balance-scale"></i> <span>Administrativos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li><a href="<?php echo base_url();?>Administrativos/PeriodoEscolar">
                                <i class="far fa-dot-circle"></i> Periodo Escolar</a>
                            </li>
                          <li><a href="<?php echo base_url();?>Administrativos/Carreras">
                            <i class="far fa-dot-circle"></i> Carreras</a></li>

                          <li><a href="<?php echo base_url();?>Administrativos/Profesores">
                            <i class="far fa-dot-circle"></i> Profesores </a></li>
                            <li><a href="<?php echo base_url();?>Administrativos/HacerHorarioProfesor">
                            <i class="far fa-dot-circle"></i> Horario profesor </a></li>

                            <li><a href="<?php echo base_url();?>Administrativos/Horarioalumno">
                            <i class="far fa-dot-circle"></i> Horario alumno </a></li>

                          <li><a href="<?php echo base_url();?>Administrativos/Materias">
                                <i class="far fa-dot-circle"></i> Materias </a></li>

                          <li><a href="<?php echo base_url();?>Administrativos/Alumnos">
                                <i class="far fa-dot-circle"></i> Alumnos </a></li>

                          <li><a href="<?php echo base_url();?>Administrativos/DocumentosAlumnos">
                                <i class="far fa-dot-circle"></i> Documentacion Alumnos</a></li>

                          <li><a href="<?php echo base_url();?>Administrativos/Calificaciones">
                              <i class="far fa-dot-circle"></i> Calificaciones</a></li>

                        </ul>
                    </li>
<?php endif;?>
<?php if($user==1):?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-balance-scale"></i> <span>Finanzas</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                          <li><a href="<?php echo base_url();?>Finanzas/HabilitarAlumnos">
                             <i class="far fa-dot-circle"></i> Habilitar alumnos</a>
                         </li>


                        </ul>
                    </li>
<?php endif;?>
<?php if($user==3):?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fas fa-balance-scale"></i> <span>Profesores</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li><a href="<?php echo base_url();?>Profesores/PlaneacionProfesores">
                                <i class="far fa-dot-circle"></i> Subir planeación</a>
                            </li>
                          <li><a href="<?php echo base_url();?>Administrativos/Calificaciones">
                            <i class="far fa-dot-circle"></i> Agregar calificaciones</a></li>
                        </ul>
                    </li>
<?php endif;?>
<?php if($user==1):?>
                    <li class="treeview">
                      <a href="#">
                      <i class="fas fa-user-shield"></i> <span>Administrador</span>
                      <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                      </span>
                            </a>
                      <ul class="treeview-menu">
                      <li><a href="<?php echo base_url();?>administrador/usuarios"><i class="far fa-dot-circle"></i>  Usuarios</a></li>
                    <li><a href="<?php echo base_url();?>administrador/permisos"><i class="far fa-dot-circle"></i>  Permisos</a></li>
                                  </ul>
                </li>
<?php endif;?>


              <!-- <li class="treeview">
                  <a href="#">
                        <i class="fas fa-graduation-cap"></i><span>Cont. academico y escolar</span>
                         <span class="pull-right-container">
                           <i class="fa fa-angle-left pull-right"></i>
                          </span>
                  </a>
                  <ul class="treeview-menu">

                     <li><a href="#">
                        Vista 1</a>
                    </li>

                    <li><a href="#">
                      Vista 2</a>
                    </li>

                </ul>
            </li> -->



            <!--  /* ======================================================================================= */
                  /*    ==>> #3          Atención y soporte  LA OPCION  K VENIA EN EL WORD                   */
                  /* ======================================================================================= */    -->

                     <!-- <li class="treeview">
                        <a href="#">
                            <i class="fab fa-sellsy"></i><span>Atención y soporte</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                  <li><a href="<?php echo base_url();?>graficas">
                    <i class="fas fa-money-check-alt"></i> Graficas</a>
                </li>
                        </ul>
                    </li> -->



                    <!--  /* ======================================================================================= */
                          /*    ==>> #2       Admición e inscripción  LA OPCION  K VENIA EN EL WORD                  */
                          /* ======================================================================================= */    -->

                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fab fa-sellsy"></i> <span>Admición e inscripción</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo base_url();?>mantenimiento/comida">
                                <i class="fas fa-utensils"></i> Comidas</a></li>

                            <li><a href="<?php echo base_url();?>mantenimiento/bebidas">
                                <i class="fas fa-wine-bottle"></i> Bebidas</a></li>


                            <li><a href="<?php echo base_url();?>mantenimiento/extras">
                                <i class="fas fa-plus-circle"></i> Extras</a></li>

                        </ul>
                    </li> -->


                    <!--  /* ======================================================================================= */
                          /*    ==>> #1           BOLSA DE TRABAJO  LA OPCION  K VENIA EN EL WORD                    */
                          /* ======================================================================================= */    -->

                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fab fa-sellsy"></i> <span>Bolsa de Trabajo</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                             <li><a href="<?php echo base_url();?>mantenimiento/comida">
                                <i class="fas fa-utensils"></i> Comidas</a></li>

                            <li><a href="<?php echo base_url();?>mantenimiento/bebidas">
                                <i class="fas fa-wine-bottle"></i> Bebidas</a></li>


                            <li><a href="<?php echo base_url();?>mantenimiento/extras">
                                <i class="fas fa-plus-circle"></i> Extras</a></li>

                        </ul>
                    </li> -->


                    <!--  /* ======================================================================================= */
                          /*                      ESTE CRUD ES PARA PERMISOS ME HECHO EN JQUERY                      */
                          /* ======================================================================================= */    -->

                    <!-- <li class="treeview">
                        <a href="#">
                            <i class="fab fa-sellsy"></i> <span>Administrador ME</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                           <li><a href="<?php echo base_url();?>Administrador/Permisos">
                                <i class="fas fa-utensils"></i> Permisos</a></li>
                        </ul>
                    </li> -->



<!--

<a href="#">
      <i class="fas fa-graduation-cap"></i><span>Cont. academico y escolar</span>
       <span class="pull-right-container">
         <i class="fa fa-angle-left pull-right"></i>
        </span>
</a>



<a href="#">
<i class="fa fa-user-circle-o"></i> <span>Administrador</span>
<span class="pull-right-container">
<i class="fa fa-angle-left pull-right"></i>
</span>
      </a>

 -->












  </ul>
            </section>

        </aside>
