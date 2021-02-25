<!-- ============ VISTA LISTAR LAS TEMPERATURAS DE LA BD  ============ -->



        <div class="content-wrapper colorfondo">
            <!-- Content Header (Page header) -->
            <section class="content-header">
        <h1>
            <center><strong><font color="#D34787">Asignar permiso de Roles</font></strong></center>
    <center><small><font color="#2F4D97" face="Comic Sans MS,arial,verdana">Menu Restaurante</font></small></center>
        </h1>
            </section>
            <h3>
             <center><font color="#D34787">Pa' que no te lo bajes a brincos</font></center>
         </h3>
            <!-- Main content -->
            <section class="content ">
                <!-- Default box -->
                <div class="box box-solid colorfondo">
                    <div class="box-body ">

                         <div class="row">
                             <div class="col-md-12">
                               <center>
                                    <a type="button" class="btn btn-primary btn-float" data-toggle="modal" data-target="#agregarNuevosPermisos"> <span class="fa fa-plus"></span>  Agregar Nuevo Permisos</a>
                               </center>
                             </div>
                         </div>

                              <hr>
                               <div class="row">
                                    <div class="col-md-12">
                                        <table id="tbl_permisosRoles" class="table">
                                            <thead >
                                                <tr>
                                                      <th><center>#</center></th>
                                                     <th><center>Menu</center></th>
                                                     <th><center>Rol</center></th>
                                                     <th><center>Leer</center></th>
                                                     <th><center>Agregar</center></th>
                                                     <th><center>Actualizar</center></th>
                                                     <th><center>Eliminar</center></th>
                                                     <th><center>opciones</center></th>

                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                               </div>



                               <!-- Modal Agregar nueuvo registro -->
                               <div class="modal fade" id="agregarNuevosPermisos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog">
                                   <div class="modal-content">
                                     <div class="modal-header bg-primary text-center">
                                       <strong class="modal-title" id="exampleModalLabel">Asignar Nuevos Permisos</strong>
                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true">&times;</span>
                                       </button>
                                     </div>
                                     <div class="modal-body">
                                       <!-- Add Record Form -->
                                   <form id="addRecordForm">
                                         <!-- roles -->
                                         <div class="form-group">
                                             <label for="rol">Roles:</label>
                                             <select name="rol" id="rol" class="form-control">
                                                 <?php foreach($roles as $rol):?>
                                                     <option value="<?php echo $rol->id;?>"><?php echo $rol->nombre;?></option>
                                                 <?php endforeach;?>
                                             </select>
                                         </div>

                                         <!-- menus -->
                                         <div class="form-group">
                                             <label for="menu">Menus:</label>
                                             <select name="menu" id="menu" class="form-control">
                                                 <?php foreach($menus as $menu):?>
                                                     <option value="<?php echo $menu->id;?>"><?php echo $menu->nombre;?></option>
                                                 <?php endforeach;?>
                                             </select>
                                         </div>

                                         <!-- ======== LEER======. -->
                                         <div class="form-group">
                                             <label for="read">Leer:</label>
                                             <label class="radio-inline">
                                                 <input type="radio" id="read" name="read" value="1" checked="checked">Si
                                             </label>
                                             <label class="radio-inline">
                                                 <input type="radio" id="read" name="read" value="0" >No
                                             </label>
                                         </div>

                                         <!-- == -->
                                         <div class="form-group">
                                             <label for="read">Agregar:</label>
                                             <label class="radio-inline">
                                                 <input type="radio" id="insert" name="insert" value="1" checked="checked">Si
                                             </label>
                                             <label class="radio-inline">
                                                 <input type="radio" id="insert" name="insert" value="0" >No
                                             </label>
                                         </div>

                                         <!-- ==== -->
                                         <div class="form-group">
                                             <label for="read">Editar:</label>
                                             <label class="radio-inline">
                                                 <input type="radio" id="updat" name="updat" value="1" checked="checked">Si
                                             </label>
                                             <label class="radio-inline">
                                                 <input type="radio" id="updat" name="updat" value="0" >No
                                             </label>
                                         </div>

                                         <div class="form-group">
                                             <label for="read">Eliminar:</label>
                                             <label class="radio-inline">
                                                 <input type="radio" id="delet" name="delet" value="1" checked="checked">Si
                                             </label>
                                             <label class="radio-inline">
                                                 <input type="radio" id="delet" name="delet" value="0" >No
                                             </label>
                                         </div>


                                   </form>
                                     </div>
                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                       <!-- Insert Button -->
                                       <button type="button" class="btn btn-primary" id="addPermisos">Agregar permisos</button>
                                     </div>
                                   </div>
                                 </div>
                               </div>




                    </div>  <!-- /.box-body -->
                </div>  <!-- /.box -->
            </section>  <!-- /.content -->
        </div>  <!-- /.content-wrapper -->
