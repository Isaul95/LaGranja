<div class="content-wrapper colorfondo"> <!-- STAR ALL CONTENT -->


  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="box box-solid colorfondo">
      <div class="box-body">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mt-5">
              <h1 class="text-center">
                <strong><font color="#D34787">Apertura</font></strong>
              </h1>
              <hr style="background-color: black; color: black; height: 1px;">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-12">
                  <?php if($permisos->insert == 1):?>
                    <div class="d-flex flex-row">
                      <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#modal_add_apertura"  id="btn_apertura" > <span class="fa fa-plus"></span> Nueva Apertura</a>
                    </div>
                <?php endif;?>
              </div>
            </div>
            <hr> <!-- Le da una linea sombreada para ver la divicion -->

            <div class="row my-4">
              <div class="col-md-12 mx-auto">

                <table id="tbl_aperturas" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                  <thead class="text-center bg-primary">
                    <tr>
                      <th width="3%" type="hidden">#</th>
                      <th>Monto</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Usuario</th>

                      <th class="text-center" width="20%">Acciones</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>

            <!-- Modal Agregar nuevo registro -->
            <div class="modal fade" id="modal_add_apertura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-center">
                    <strong class="modal-title" id="exampleModalLabel">Agregar Apertura</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="addapertura">
                      <input type="hidden" id="f">

                      <?php
                        $id_user=$this->session->userdata('id');
                      ?>

                      <input type="hidden" id="id_usuario" name="" value="<?php echo $id_user;?>">
                      <div class="form-group">
                        <label for="">Monto</label>
                        <input type="text" class="form-control" id="monto" placeholder="Monto">
                      </div>

                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <!-- Insert Button -->
                    <button type="button" class="btn btn-primary" id="btnaddapertura">Agregar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal preparado para editar datos y file -->
            <div class="modal fade" id="modaleditapertura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-center">
                    <strong class="modal-title" id="exampleModalLabel">Editar Apertura</strong>
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
                          <form id="formeditarapertura">
                            <input type="hidden" id="id_apertura_update">
                            <!-- Inputs para editar  -->
                            <?php
                              $id_user_mod=$this->session->userdata('id');
                            ?>
                            <input type="hidden" id="id_usuario_cambio" name="" value="<?php echo $id_user_mod;?>">


                            <input type="hidden" id="id_usuario_reg">
                            <div class="form-group">
                              <label for="">Monto Nuevo</label>
                              <input type="text" class="form-control" id="monto_nuevo">
                            </div>


                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="update_apertura">Actualizar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </section><!-- / MAIN content -->
</div> <!-- /END ALL CONTENT -->
