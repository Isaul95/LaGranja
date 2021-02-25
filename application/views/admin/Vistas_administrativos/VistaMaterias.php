<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

    <div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->
            <!-- Content Header (Page header) -->
      <!-- <section class="content-header">
        <h1>
              <center><strong><font color="#D34787">Lista de los pagos realizados ISAUL ==></font></strong></center>
              <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Menu cesvi</font></small></center>
        </h1>
        </section> -->



            <!-- Main content -->
            <section class="content">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body">



<!-- AKI EMPIEZA LOMMIOO LO NUEVO -->

<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5">
      <h1 class="text-center">
      <strong><font color="#D34787">Materias</font></strong>
      </h1>
      <hr style="background-color: black; color: black; height: 1px;">
    </div>
  </div>
  <div class="row">
  <div class="col-10 col-sm-12">        
                  <div class="row">
                    <div class="col-4 col-sm-8">
                   
                      <label for="">Seleccione alguna carrera: </label>
                    <select background-color="red" id="combo_carreras_materias_admin" class="form-control"><option value="" selected>Seleccione una carrera</option></select>
                   
                    </div>
                    <div class="col-4 col-sm-4">
                        <label for="">Semestre: </label>
                        <select background-color="red" id="combo_semestres_materias_admin" class="form-control"><option value="" selected>Seleccione un semestre</option></select>
                    </div>
                   
                  </div> <!--END OF SECOND ROW--> 
    </div><!--class="col-10 col-sm-12"-->
  </div> <!--END OF FIRST ROW-->
                  <br>

  <br>
  <div class="row">
    <div class="col-md-12">
      <div class="row">
          <div class="col-md-12">       
      <?php if($permisos->insert == 1):?>
        <div class="d-flex flex-row">
              <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#modaladdmateria"> <span class="fa fa-plus"></span>  Agregar Materia</a>
      </div>
              <?php endif;?>
          </div>
      </div>
<hr> <!-- Le da una linea sombreada para ver la divicion -->

      <!-- Modal Agregar nueuvo Materia -->
      <div class="modal fade" id="modaladdmateria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Agregar Materia</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Add Record Form -->
          <form id="formaddmateria">
          
          <div class="row">
              <div class="col-sm-12">

                <label for="">Materias</label>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Clave</label>
                    <input type="text" class="form-control" id="clave_materia" placeholder="Clave de la materia">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Nombre de la materia</label>
                    <input type="text" class="form-control" id="nombre_materia" placeholder="Nombre de la materia">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Creditos</label>
                    <input type="text" class="form-control" id="creditos_materia" placeholder="Creditos de la materia">
                    </div>
                  </div>
<br>
                  
                  <label for="">Asignada a:</label>
                  <div class="row">
                    <div class="col-6 col-sm-6">
                        <label for="">Licenciatura</label>
                        <select background-color="red" id="licenciaturas_para_materia" class="form-select form-select-lg mb-3">
                        <option value="23">Derecho</option>
                        <option value="24">Psicología</option>
                        <option value="22">Criminalística, Criminología y Técnicas Periciales</option>
                        <option value="19">Diseño Gráfico</option>
                        <option value="21">Contaduría</option>
                        </select>
                     </div>
                     
                     <div class="col-8 col-sm-1">
                    <label for="">Semestre</label>
                    <input type="text" id="semestre_materia" placeholder="Semestre"/>
                     </div>
                  </div>
                  <br>
                  
                </div>
              </div>
  
                </form>
             </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
              <!-- Insert Button -->
              <button type="button" class="btn btn-primary" id="btnaddmateria">Agregar</button>
            </div>
          </div>
        </div>
      </div>
    <!--FIN DEL MODAL DE AGREGAR materia-->


<!--MODAL EDITAR Materia-->
<div class="modal fade" id="modaleditmateria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
          <div class="modal-header bg-primary text-center">
              <strong class="modal-title" id="exampleModalLabel">Editar materia</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row text-center">
                  <div class="col-md-12 my-3">
                    <div id="show_img"></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
            <form id="formeditmateria">
                     
          <div class="row">
              <div class="col-sm-12">
              <input type="hidden" id="id_materia_update">
                <label for="">Materias</label>
                  <div class="row">
                    <div class="col-8 col-sm-6">
                    <label for="">Clave</label>
                    <input type="text" class="form-control" id="clave_materia_update" placeholder="Clave de la materia">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Nombre de la materia</label>
                    <input type="text" class="form-control" id="nombre_materia_update" placeholder="Nombre de la materia">
                    </div>
                    <div class="col-4 col-sm-3">
                    <label for="">Creditos</label>
                    <input type="text" class="form-control" id="creditos_materia_update" placeholder="Creditos de la materia">
                    </div>
                  </div>
<br>
                  <label for="">Asignada a:</label>
                  <div class="row">
                    <div class="col-6 col-sm-6">
                        <label for="">Licenciatura</label>
                        <select background-color="red" id="licenciaturas_para_materia_update" class="form-select form-select-lg mb-3">
                        <option value="23">Derecho</option>
                        <option value="24">Psicología</option>
                        <option value="22">Criminalística, Criminología y Técnicas Periciales</option>
                        <option value="19">Diseño Gráfico</option>
                        <option value="21">Contaduría</option>
                        </select>
                     </div>
                     
                     <div class="col-8 col-sm-1">
                    <label for="">Semestre</label>
                    <input type="text" id="semestre_materia_update" placeholder="Semestre"/>
                     </div>
                  </div>
                  <br>
                  
                </div>
              </div>
  
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary" id="update_materia">Actualizar</button>
            </div>
          </div>
        </div>
      </div>
<!--MODAL EDITAR Materia-->


<!--MODAL VER materia -->

  <div class="row my-4">
    <div class="col-md-12 mx-auto">

      <!-- <table class="table table-borderless" id="tbl_regPagos" style="width:100%"> -->
      <table id="tbl_vista_materias" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
        <thead class="text-center bg-primary">
          <tr>
          <th width="3%"></th>
           <th>Clave</th>
            <th>Materia</th>
            <th>Creditos</th>
            <th class="text-center" width="7%">Acciones</th>
          </tr> 
        </thead>
      </table>

    </div>
  </div>

</div>


<!-- AKI TERMIAN LO MIO LO NUEVO QUE AGREGUE -->
<!--
  <th>Edad</th>
            <th>Sexo</th>
            <th>Dirección</th>
            <th>Ciudad</th>
            <th>Nacionalidad</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th>Estado civil</th>
-->



                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </section>
            <!-- / MAIN content -->




    </div> <!-- /END ALL CONTENT -->

</body>
</html>