<div class="content-wrapper colorfondo">
  <section class="content">
    <div class="box box-solid colorfondo">
      <div class="box-body">
        <div class="container">


          <div class="row">
            <div class="col-md-12 mt-5">
              <h1 class="text-center">
                <strong><font color="#D34787">Venta</font></strong>
              </h1>
              <hr style="background-color: black; color: black; height: 1px;">
            </div>
          </div>


          <div class="row">
            <div class="col-md-12">

              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex flex-row">
                    <div class="col-sm-4 col-md-4">
                      <a type="button" class="btn btn-primary btn-float" id="BotonModalProductosCrudos" data-toggle="modal" data-target="#ModalProductos">
                      <i class="fas fa-drumstick-bite"></i> Productos crudos</a>
                    </div>
                    <div class="col-sm-4 col-md-4">
                      <a type="button" class="btn btn-primary btn-float" id="BotonModalProductosCocidos" data-toggle="modal" data-target="#ModalProductos"> <i class="fas fa-drumstick-bite"></i> Productos cocidos</a>
                    </div>
                    <div class="col-sm-4 col-md-4">
                      <a type="button" class="btn btn-primary btn-float" id="BotonModalProductosAcompañantes" data-toggle="modal" data-target="#ModalProductos"><i class="fas fa-drumstick-bite"></i> Productos acompañantes</a>
                    </div>
                  </div>
                </div>
              </div>

              <hr>

              <div class="row my-4">
                <div class="col-md-12 mx-auto">
                  <table class="table table-striped table-bordered table-hover table-condensed dt-responsive nowrap" id="TablaDescripcionVenta" style="background: white!important;" cellspacing="0">
                    <thead class="text-center bg-primary">
                      <tr>
                        <th width="21%">Producto</th>
                        <th width="21%">Piezas</th>
                        <th width="21%">Precio por pieza</th>
                        <th width="21%">Precio total</th>
                        <th width="16%">Eliminar</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div>

            </div>
          </div>


          <div class="modal fade" id="ModalProductos" tabindex="-1" aria-labelledby="TituloModalProductos" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">

                <div class="modal-header bg-primary text-center">
                  <strong id="TituloModalProductos" class="modal-title"></strong>
                </div>

                <div class="modal-body">
                  <div class="row">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover table-condensed dt-responsive nowrap" id="TablaVentaProductos" style="background: white!important;" cellspacing="0" width="100%">
                        <thead class="text-center bg-primary">
                          <tr>
                            <th width="30%">Producto</th>
                            <th width="30%">Precio</th>
                            <th width="30%">Piezas disponibles</th>
                            <th width="30%">Cantidad de piezas</th>
                            <th width="10%">Agregar a la compra</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-danger" id="EliminarTablaVentaProductos" data-dismiss="modal">Cerrar</button>
                </div>

              </div>
            </div>
          </div>


        </div>
      </div>
    </div>
  </section>
</div>