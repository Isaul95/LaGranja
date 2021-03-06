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
                <strong><font color="#D34787">Locales</font></strong>
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
                      <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#modal_add_local"> <span class="fa fa-plus"></span> Nuevo Local</a>
                    </div>
                <?php endif;?>
              </div>
            </div>
            <hr> <!-- Le da una linea sombreada para ver la divicion -->

            <div class="row my-4">
              <div class="col-md-12 mx-auto">

                <table id="tbl_local" class="table table-striped table-bordered dt-responsive nowrap table-hover table-condensed" cellspacing="0" style="background:white!important">
                  <thead class="text-center bg-primary">
                    <tr>
                      <th width="3%" type="hidden">#</th>
                      <th>Nombre</th>
                      <th>Direccion</th>
                      <th width="15%">Telefono</th>
                      <th width="15%">Encargado</th>

                      <th class="text-center" width="15%">Acciones</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>

            <!-- Modal Agregar nuevo registro -->
            <div class="modal fade" id="modal_add_local" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-center">
                    <strong class="modal-title" id="exampleModalLabel">Agregar Local</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="addlocal">

                      <div class="form-group">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="nombre_local" placeholder="Nombre">
                      </div>
                      <div class="form-group">
                        <label for="">Direccion</label>
                        <input type="text" class="form-control" id="direccion_local" placeholder="Direccion">
                      </div>
                      <div class="form-group">
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" id="telefono_local" placeholder="Telefono">
                      </div>
                      <div class="form-group">
                        <label for="">Encargado</label>
                        <input type="text" class="form-control" id="encargado" placeholder="Encargado">
                      </div>

                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <!-- Insert Button -->
                    <button type="button" class="btn btn-primary" id="btnaddlocal">Agregar</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal preparado para editar datos y file -->
            <div class="modal fade" id="modaleditlocal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-center">
                    <strong class="modal-title" id="exampleModalLabel">Editar Local</strong>
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
                          <form id="formeditarlocal">
                            <input type="hidden" id="id_local_update">
                            <!-- Inputs para editar  -->
                            <div class="form-group">
                              <label for="">Nombre</label>
                              <input type="text" class="form-control" id="nombre_local_m">
                            </div>
                            <div class="form-group">
                              <label for="">Direccion</label>
                              <input type="text" class="form-control" id="direccion_local_m">
                            </div>
                            <div class="form-group">
                              <label for="">Telefono</label>
                              <input type="text" class="form-control" id="telefono_local_m">
                            </div>
                            <div class="form-group">
                              <label for="">Encargado</label>
                              <input type="text" class="form-control" id="encargado_m">
                            </div>


                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="update_local">Actualizar</button>
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
