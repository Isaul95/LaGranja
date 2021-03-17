// $(document).ready(function(){
// llenarTablaPagos(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
//
//   }); // FIN DE LA FUNCION PRINCIPAL
//
//
// $(".custom-file-input").on("change", function() {
//     let fileName = $(this).val().split("\\").pop();
//     let label = $(this).siblings(".custom-file-label");
//
//     if (label.data("default-title") === undefined) {
//         label.data("default-title", label.html());
//     }
//
//     if (fileName === "") {
//         label.removeClass("selected").html(label.data("default-title"));
//     } else {
//         label.addClass("selected").html(fileName);
//     }
// });
//
// /* ---------------------------- Add Records Modal --------------------------- */
// $("#addRecords").on("hide.bs.modal", function(e) {
//     // do something...
//     $("#addRecordForm")[0].reset();
//     $(".custom-file-label").html("Choose file");
// });
//
// /* ---------------------------- Edit Record Modal --------------------------- */
// $("#editRecords").on("hide.bs.modal", function(e) {
//     // do something...
//     $("#editForm")[0].reset();
//     $(".custom-file-label").html("Choose file");
// });
//
//
// /* -------------------------------------------------------------------------- */
// /*                               Insert Records                               */
// /* -------------------------------------------------------------------------- */
// $(document).on("click", "#addPagos", function(e) {
//     e.preventDefault();
//     // debugger;
//     var nombre = $("#nombre").val();
//     var numero_con = $("#numero_con").val();
//     var carrera = $("#carrera").val();
//     var semestre = $("#semestre").val();
//     var img = $("#archivo")[0].files[0]; // this is file
//
//     if (nombre == "" || numero_con == "" || carrera == "" || img.name == "" || semestre == "") {
//         alert("Debe llenar todos los campos vacios here isaul x...!");
//     } else {
//         var fd = new FormData();
//
//     var archivo = $("#archivo")[0].files[0];
//
//         fd.append("nombre", nombre);
//         fd.append("numero_con", numero_con);
//         fd.append("carrera", carrera);
//         fd.append("semestre", semestre);
//         fd.append("archivo", img); //Obt principalmente el name file
//         fd.append("archivo", archivo); // Obt el file como tal
//
//         $.ajax({
//             type: "post",
//             url: base_url+'Finanzas/FormatoRegistroPago/insertarPagos',
//             data: fd,
//             processData: false,
//             contentType: false,
//             dataType: "json",
//             enctype : 'multipart/form-data',
//             success: function(response) {
//                 if (response.res == "success") {
//                     toastr["success"](response.message);
//                     $("#addRecords").modal("hide");
//                     $("#addRecordForm")[0].reset();
//                     $(".add-file-label").html("Choose file");
//                     $("#tbl_regPagos").DataTable().destroy();
//                     llenarTablaPagos();
//                 } else {
//                     toastr["error"](response.message);
//                 }
//             },
//         });
//     }
// });
//
//
//
//
//
// /* -------------------------------------------------------------------------- */
// /*                                llenarTablaPagos Records                               */
// /* -------------------------------------------------------------------------- */
// function llenarTablaPagos() {
//     // debugger;
//     $.ajax({
//         type: "get",
//         url: base_url+'Finanzas/FormatoRegistroPago/listarPagos',
//         // url: base_url + "llenarTablaPagos",
//         dataType: "json",
//         success: function(response) {
//             var i = "1";
//             $("#tbl_regPagos").DataTable({
//                 data: response,
//                 responsive: true,
//                 columns: [{
//                         data: "id",
//                         // render: function(data, type, row, meta) {
//                         //     return i++;
//                         // },
//                     },
//                     {
//                         data: "nombre",
//                     },
//                     {
//                         data: "numero_con",
//                     },
//                     {
//                         data: "carrera",
//                     },
//                     {
//                         data: "semestre",
//                     },
//                     {
//                         data: "archivo",
//                         render: function(data, type, row, meta) {
//                             var a = `
//                                 <a title="Descarga Documento" href="FormatoRegistroPago/verArchivo/${row.id}" target="_blank"><i class="far fa-file-pdf fa-2x"></i></a>
//                             `;
//                             return a;
//                         },
//                     },
//                     {
//                         orderable: false,
//                         searchable: false,
//                         data: function(row, type, set) {
//                             return `
//                                 <a href="#" id="del" class="btn btn-danger btn-remove" value="${row.id}"><i class="fas fa-trash-alt"></i></a>
//                                 <a href="#" id="editar" class="btn btn-sm btn-outline-info" value="${row.id}"><i class="fas fa-edit"></i></a>
//                             `;
//                         },
//                     },
//                 ],
//                   "language" : language_espaniol,
//
//             });
//         },
//     });
// }
//
// // <a href="#" id="edit" class="btn btn-sm btn-outline-info" value="${row.id}"><i class="fas fa-edit"></i></a>
//
// /* -------------------------------------------------------------------------- */
// /*                               Delete Records                               */
// /* -------------------------------------------------------------------------- */
// $(document).on("click", "#del", function(e) {
//     e.preventDefault();
//
//     var del_id = $(this).attr("value");
//
//     Swal.fire({
//         title: "Estas seguro de Borrar?",
//         text: "Esta acción es irreversile...!",
//         icon: "warning",
//         showCancelButton: true,
//         confirmButtonColor: "#3085d6",
//         cancelButtonColor: "#d33",
//         confirmButtonText: "Si, bórralo!",
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 type: "post",
//                 // url: base_url + "delete",
//                   url: base_url+'Finanzas/FormatoRegistroPago/eliminarPagos',
//                 data: {
//                     del_id: del_id,
//                 },
//                 dataType: "json",
//                 success: function(response) {
//                     if (response.res == "success") {
//                         Swal.fire(
//                             "Eliminado...!",
//                             "Tus datos han sido eliminados...",
//                             "success"
//                         );
//                         $("#tbl_regPagos").DataTable().destroy();
//                         llenarTablaPagos();
//                     }
//                 },
//             });
//         }
//     });
// });
//
//
//
// /* -------------------------------------------------------------------------- */
// /*                                Edit Records                                */
// /* -------------------------------------------------------------------------- */
//
// $(document).on("click", "#editar", function(e) {
//     e.preventDefault();
// debugger;
//     var edit_id = $(this).attr("value");
//
//     $.ajax({
//     //  url: base_url + "edit",
//         url: base_url+'Finanzas/FormatoRegistroPago/edit',
//         type: "get",
//         dataType: "JSON",
//         data: {
//             edit_id: edit_id,
//         },
//         success: function(data) {
//             if (data.res == "success") {
//                 $("#editRecords").modal("show");
//                 $("#edit_record_id").val(data.post.id);
//                 $("#edit_nombre").val(data.post.nombre);
//                 $("#edit_numero_con").val(data.post.numero_con);
//                 $("#edit_carrera").val(data.post.carrera);
//                 $("#edit_semestre").val(data.post.semestre);
//                 $("#show_archivo").html(`
//                     <img href="FormatoRegistroPago/verArchivo/${row.id} width="150" height="150" class="rounded img-thumbnail">
//                 `);
//             } else {
//                 toastr["error"](data.message, "Error");
//             }
//         },
//     });
// });
//
// /* -------------------------------------------------------------------------- */
// /*                               Update Records                               */
// /* -------------------------------------------------------------------------- */
//
// $(document).on("click", "#update", function(e) {
//     e.preventDefault();
//
//     var edit_id = $("#edit_record_id").val();
//     var name = $("#edit_name").val();
//     var email = $("#edit_email").val();
//     var mob = $("#edit_mob").val();
//     var edit_img = $("#edit_img")[0].files[0];
//
//     if (name == "" || email == "" || mob == "") {
//         alert("All field are required");
//     } else {
//         var fd = new FormData();
//
//         fd.append("edit_id", edit_id);
//         fd.append("name", name);
//         fd.append("email", email);
//         fd.append("mob", mob);
//         if ($("#edit_img")[0].files.length > 0) {
//             fd.append("edit_img", edit_img);
//         }
//
//         $.ajax({
//             type: "post",
//             url: base_url + "update",
//             data: fd,
//             processData: false,
//             contentType: false,
//             dataType: "json",
//             success: function(response) {
//                 if (response.res == "success") {
//                     toastr["success"](response.message);
//                     $("#editRecords").modal("hide");
//                     $("#editForm")[0].reset();
//                     $(".edit-file-label").html("Choose file");
//                     $("#recordTable").DataTable().destroy();
//                     fetch();
//                 } else {
//                     toastr["error"](response.message);
//                 }
//             },
//         });
//     }
// });
//
//
//
//
//
// // ********************   variable PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
//     var language_espaniol = {
//       "lengthMenu": "Mostrar _MENU_ registros por pagina",
//       "zeroRecords": "No se encontraron resultados en su busqueda",
//       "searchPlaceholder": "Buscar Registros",
//       "info": "Total: _TOTAL_ registros",
//       "infoEmpty": "No Existen Registros",
//       "infoFiltered": "(filtrado de un total de _MAX_ registros)",
//       "search": "Buscar:",
//       "paginate": {
//         "first": "Primero",
//         "last": "Último",
//         "next": "Siguiente",
//         "previous": "Anterior"
//       }, /* TODO ESTO ES PARA CAMBIAR DE IDIOMA */
//     }
