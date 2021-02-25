
  $(document).ready(function(){
  listaPermisos();

    }); // FIN DE LA FUNCION PRINCIPAL


    /* -------------------------------------------------------------------------- */
    /*                               Insert Records                               */
    /* -------------------------------------------------------------------------- */
    $(document).on("click", "#addPermisos", function(e) {
        e.preventDefault();
        debugger;
        var rol    = $("#rol").val();
        var menu   = $("#menu").val();
        var read   = $('input:radio[name=read]:checked').val();
        var insert = $('input:radio[name=insert]:checked').val();
        var updat = $('input:radio[name=updat]:checked').val();
        var delet  = $('input:radio[name=delet]:checked').val();

        if (rol == "" || menu == "") {
            alert("Debe elegir todos los datos...!");
        } else {

          var datos = {
      				rol_id : rol,
      				menu_id : menu,
              read : read,
              insert : insert,
              update : updat,
              delete : delet,
      		}

            $.ajax({
                type: "post",
                url: base_url+'Administrador/Permisos/insertarPermisos',
                data: (datos),
                dataType: "json",
                success: function(data) {
                    if (data.responce == "success") {
                        toastr["success"](data.message);
                        $("#agregarNuevosPermisos").modal("hide");
                        $("#addRecordForm")[0].reset();
                        $("#tbl_permisosRoles").DataTable().destroy();
                        listaPermisos();
                    } else {
                        toastr["error"](response.message);
                    }
                },
            });
        }
    });


  // ******************************   INICIOA LISTAR DATOS    ******************************
    // LISTADO DE LA TABLA JSON
    function listaPermisos(){
      $.ajax({
          type: "get",
          url: base_url+'Administrador/Permisos/listaPermisosAsignados',
          dataType: "json",
          success: function(response) {
              var i = "1";
              $("#tbl_permisosRoles").DataTable({
                  data: response,
                  responsive: true,
                  columns: [
                    {
                          data: "id",
                      },
                      {
                          data: "menu",
                      },
                      {
                          data: "rol",
                      },
                      {
                          data: "read",
                          orderable: false,
                          searchable: false,
                          "render" : function(data, type, row) {
                            var leer = `${row.read}`; // SE RECOGE L VARIABLE DE LL ACCION SI ESTA ACTIVO   class="btn btn-danger btn-remove"
                              if(leer == 0){
                                var a =  `<a title="Desactivo"><i class="fa fa-times text-danger" ></i></a>`;
                              }else {
                                var a =  `<a title="Activo"><i class="fa fa-check text-success" ></i></a>`;
                              }
                                return a;
                           },
                      },
                      {
                          data: "insert",
                          orderable: false,
                          searchable: false,
                          "render" : function(data, type, row) {
                            var agregar = `${row.insert}`; // SE RECOGE L VARIABLE DE LL ACCION SI ESTA ACTIVO   class="btn btn-danger btn-remove"
                              if(agregar == 0){
                                var a =  `<a title="Desactivo"><i class="fa fa-times text-danger" ></i></a>`;
                              }else {
                                var a =  `<a title="Activo"><i class="fa fa-check text-success" ></i></a>`;
                              }
                                return a;
                           },
                      },
                      {
                          data: "update",
                          orderable: false,
                          searchable: false,
                          "render" : function(data, type, row) {
                            var actualizar = `${row.update}`; // SE RECOGE L VARIABLE DE LL ACCION SI ESTA ACTIVO   class="btn btn-danger btn-remove"
                              if(actualizar == 0){
                                var a =  `<a title="Desactivo"><i class="fa fa-times text-danger" ></i></a>`;
                              }else {
                                var a =  `<a title="Activo"><i class="fa fa-check text-success" ></i></a>`;
                              }
                                return a;
                           },
                      },
                      {
                          data: "delete",
                          orderable: false,
                          searchable: false,
                          "render" : function(data, type, row) {
                            var eliminarActivo = `${row.delete}`; // SE RECOGE L VARIABLE DE LL ACCION SI ESTA ACTIVO   class="btn btn-danger btn-remove"
                              if(eliminarActivo == 0){
                                var a =  `<a title="Desactivo"><i class="fa fa-times text-danger" ></i></a>`;
                              }else {
                                var a =  `<a title="Activo"><i class="fa fa-check text-success" ></i></a>`;
                              }
                                return a;
                           },
                      },
//   *************************    opciones DELTE AND UPDATE       ****************************************************

                  {
                      orderable: false,
                      searchable: false,
                      data: function(row, type, set) {
                          return `
                              <a href="#" value="${row.id}" id="del" class="btn btn-danger btn-remove"><i class="fas fa-trash-alt"></i></a>
                              <a href="#" value="${row.id}" id="del" class="btn btn-success"><i class="fas fa-edit"></i></a>
                          `;
                      },
                  },
                  // {
                  //     orderable: false,
                  //     searchable: false,
                  //     data: function(row, type, set) {
                  //         return `
                  //             <a href="#" value="${row.id}" id="del" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
                  //         `;
                  //     },
                  // },

                  ],
                    "language" : language_espaniol,

              });
          },
      });

    }






// ********************   VAR PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
    var language_espaniol = {
      "lengthMenu": "Mostrar _MENU_ registros por pagina",
      "zeroRecords": "No se encontraron resultados en su busqueda",
      "searchPlaceholder": "Buscar Registros",
      "info": "Total: _TOTAL_ registros",
      "infoEmpty": "No Existen Registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "search": "Buscar:",
      "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
      }, /* TODO ESTO ES PARA CAMBIAR DE IDIOMA */
    }
