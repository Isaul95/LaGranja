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
                <strong><font color="#D34787">Producto Externo</font></strong>
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
                      <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#modal_add_pex"> <span class="fa fa-plus"></span> Nuevo Producto</a>
                      <button type="button" class="btn btn-primary" id="verProductosExt">Ver Productos Externos</button>
                    </div>
                <?php endif;?>
              </div>
            </div>
            <hr> <!-- Le da una linea sombreada para ver la divicion -->

            <div class="row my-4">
              <div class="col-md-12 mx-auto">

                <table id="tbl_pex" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                  <thead class="text-center bg-primary">
                    <tr>
                      <th width="3%" type="hidden">#</th>
                      <th>Prodcuto</th>
                      <th>Tipo</th>
                      <th width="10%">Precio</th>
                      <th width="10%">Piezas</th>
                      <th width="15%">Subtotal</th>
                      <th>Tienda Externa</th>
                      <th width="15%">Fecha</th>


                      <th class="text-center" width="20%">Acciones</th>
                    </tr>
                  </thead>


                </table>
              </div>
            </div>
            <br>
            <?php if($permisos->insert == 1):?>
              <div class="">
                <button type="button" class="btn btn-primary pull-right" id="btnaddpexf">Agregar productos</button>
              </div>
          <?php endif;?>


            <!-- Modal Agregar nuevo registro -->
            <div class="modal fade" id="modal_add_pex" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-center">
                    <strong class="modal-title" id="exampleModalLabel">Agregar Producto Externo</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="addpex">

                      <?php
                        $id_usua_ss=$this->session->userdata('id');
                        $cont=0;
                      ?>

                      <input type="hidden" id="id_usuario_g" name="" value="<?php echo $id_usua_ss;?>">
                      <div class="form-group">
                        <label for="">Tienda Externa</label>
                        <select class="form-control" id="tienda">

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Tipo</label>
                        <select class="form-control" id="tipo_pex">
                          <option value="Pollo">Pollo</option>
                          <option value="Crudo">Crudo</option>
                          <option value="Cocido">Cocido</option>
                          <option value="Acompañantes">Acompañantes</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="">Producto</label>
                        <input type="text" class="form-control" id="producto_externo" placeholder="Producto">
                      </div>
                      <div class="form-group">
                        <label for="">Piezas</label>
                        <input type="text" class="form-control" id="piezas" placeholder="Piezas">
                      </div>
                      <div class="form-group">
                        <label for="">Precio</label>
                        <input type="text" class="form-control" id="precio_pex" placeholder="Precio">
                      </div>
                      <div class="form-group">
                        <label for="">Total: $</label>

                      </div>

                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <!-- Insert Button -->
                    <button type="button" class="btn btn-primary" id="btnaddpex">Agregar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal preparado para editar datos y file -->
            <div class="modal fade" id="modaleditpex" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-center">
                    <strong class="modal-title" id="exampleModalLabel">Editar Prodcuto</strong>
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
                          <form id="formeditarpex">
                            <input type="hidden" id="id_pex_update">
                            <input type="hidden" id="tienda_anterior">
                            <!-- Inputs para editar  -->
                            <label for="">Tienda Externa</label>
                            <select class="form-control" id="tienda_nueva">

                              >
                            </select>
                            <div class="form-group">
                              <label for="">Tipo</label>
                              <select class="form-control" id="tipo_pex_edit">
                                <option value="Pollo">Pollo</option>
                                <option value="Crudo">Crudo</option>
                                <option value="Cocido">Cocido</option>
                                <option value="Acompañantes">Acompañantes</option>

                              </select>
                            <div class="form-group">
                              <label for="">Producto</label>
                              <input type="text" class="form-control" id="pex_nuevo">
                            </div>
                            <div class="form-group">
                              <label for="">Precio</label>
                              <input type="text" class="form-control" id="precio_nuevo">
                            </div>
                            <div class="form-group">
                              <label for="">Piezas</label>
                              <input type="text" class="form-control" id="piezas_nuevas">
                            </div>



                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="update_pex">Actualizar</button>
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
