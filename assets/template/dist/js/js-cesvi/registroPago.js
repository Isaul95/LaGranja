//
//   $(document).ready(function(){
//   fetch(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
//
//     }); // FIN DE LA FUNCION PRINCIPAL
//
//
// // ******************************************   INICIOA INSERTAR DATOS    ************************************
//     $(document).on("click", "#add", function(e){
//       e.preventDefault();
//
//       var name = $("#name").val();
//       var email = $("#email").val();
//
//       if (dates.name == "" || dates.email == "") {
//         alert("estan vacios los campos OBLIGATORIOS...!");
//       }else{
//
//
//         $.ajax({
//   //      url: base_url+'mantenimiento/RegistrarPagos/addFile',
//           url: base_url+'mantenimiento/RegistroPagos/insertar',
//           type: "post",
//           dataType: "json",
//           data: {
//               name: name,
//               email: email
//             },
//           success: function(data){
//             if (data.responce == "success") {
// // Tiene k destruirse la tabla para reinicializarla de nuevo
//               $('#tbl_registroPago').DataTable().destroy();
//               fetch(); // Inicializando la tablka nuevamente con el nuevo dato added
//               $('#exampleModal').modal('hide');
//               toastr["success"](data.message);
//             }else{
//               toastr["error"](data.message);
//             }
//
//           }
//         });
//         $("#form")[0].reset();  // VACIA MODAL DESPUES DE INSERT
//       }
//
//     });
//
//
//
//   // ******************************************   INICIOA LISTAR DATOS    ************************************
//     // LISTADO DE LA TABLA JSON
//     function fetch(){
//       // debugger;
//       $.ajax({
//          url: base_url+'mantenimiento/RegistroPagos/listar',
//     //   url: "<?php echo base_url(); ?>fetch",
//         //url: base_url()+"Welcome/fetch",
//         type: "post",
//         dataType: "json",
//         success: function(data){
//           if (data.responce == "success") {
//
//               var i = "1";
//                 $('#tbl_registroPago').DataTable( {
//                     "data": data.posts,
//                     "responsive": true,
// //  se comenta esta parte k es para los botones de pdf,excel REPORTES
//                     // dom:
//                     //     "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
//                     //     "<'row'<'col-sm-12'tr>>" +
//                     //     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
//                     // buttons: [
//                     //     'copy', 'excel', 'pdf'
//                     // ],
//                     "columns": [
//                         { "render": function(){
//                           return a = i++;
//                         } },
//                         { "data": "name" },
//                         { "data": "email" },
//                         { "render": function ( data, type, row, meta ) {
//                           var a = `
//                                   <a href="#" value="${row.id}" id="del" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a>
//                                   <a href="#" value="${row.id}" id="edit" class="btn btn-sm btn-outline-success"><i class="fas fa-edit"></i></a>
//                           `;
//                           return a;
//                         } }
//                     ],
//                     "language" : language_espaniol,
//
//
//                 } );
//             }else{
//               toastr["error"](data.message);
//             }
//         }
//       });
//     }
//
//
//
//
//     // ******************************************   INICIOA ELIMINAR DATOS    ************************************
//     $(document).on("click", "#del", function(e){
//       e.preventDefault();
//
//       var del_id = $(this).attr("value");
//
//       const swalWithBootstrapButtons = Swal.mixin({
//         customClass: {
//           confirmButton: 'btn btn-success',
//           cancelButton: 'btn btn-danger mr-2'
//         },
//         buttonsStyling: false
//       })
//
//       swalWithBootstrapButtons.fire({
//         title: 'Are you sure?',
//         text: "You won't be able to revert this!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonText: 'Yes, delete it!',
//         cancelButtonText: 'No, cancel!',
//         reverseButtons: true
//       }).then((result) => {
//         if (result.value) {
//
//             $.ajax({
//               url: base_url+'mantenimiento/RegistroPagos/eliminar',
//               // url: "<?php echo base_url(); ?>delete",
//               type: "post",
//               dataType: "json",
//               data: {
//                 del_id: del_id
//               },
//               success: function(data){
//                 if (data.responce == "success") {
//                     $('#tbl_registroPago').DataTable().destroy();
//                     fetch();
//                     swalWithBootstrapButtons.fire(
//                       'Deleted!',
//                       'Your file has been deleted.',
//                       'success'
//                     );
//                 }else{
//                     swalWithBootstrapButtons.fire(
//                       'Cancelled',
//                       'Your imaginary file is safe :)',
//                       'error'
//                     );
//                 }
//               }
//             });
//
//         } else if (
//           /* Read more about handling dismissals below */
//           result.dismiss === Swal.DismissReason.cancel
//         ) {
//           swalWithBootstrapButtons.fire(
//             'Cancelled',
//             'Your imaginary file is safe :)',
//             'error'
//           )
//         }
//       });
//
//     });
//
//
//
// //  ******************************   INICIOA EDITAR Y ACTUALIZAR DATOS    *********************************
// // ******************** =======>>>>>>>>> El icono Edit dentro del DataTable
//     $(document).on("click", "#edit", function(e){
//       e.preventDefault();
//
//       var edit_id = $(this).attr("value");
//
//       $.ajax({
//         url: base_url+'mantenimiento/RegistroPagos/edit',
//         // url: "<?php echo base_url(); ?>edit",
//         type: "post",
//         dataType: "json",
//         data: {
//           edit_id: edit_id
//         },
//         success: function(data){
//           if (data.responce == "success") {
//               $('#edit_modal').modal('show');
//               $("#edit_record_id").val(data.post.id);
//               $("#edit_name").val(data.post.name);
//               $("#edit_email").val(data.post.email);
//             }else{
//               toastr["error"](data.message);
//             }
//         }
//       });
//
//     });
//
//
//     // Updated datos
//     // ******************** =======>>>>>>>>> El boton de actualizar DATOS del modal
//     $(document).on("click", "#update", function(e){
//       e.preventDefault();
//
//       var edit_record_id = $("#edit_record_id").val();
//       var edit_name = $("#edit_name").val();
//       var edit_email = $("#edit_email").val();
//
//       if (edit_record_id == "" || edit_name == "" || edit_email == "") {
//         alert("Both field is required");
//       }else{
//         $.ajax({
//           url: base_url+'mantenimiento/RegistroPagos/update',
//           // url: "<?php echo base_url(); ?>update",
//           type: "post",
//           dataType: "json",
//           data: {
//             edit_record_id: edit_record_id,
//             edit_name: edit_name,
//             edit_email: edit_email
//           },
//           success: function(data){
//             if (data.responce == "success") {
//               $('#tbl_registroPago').DataTable().destroy();
//               fetch();
//               $('#edit_modal').modal('hide');
//               toastr["success"](data.message);
//             }else{
//               toastr["error"](data.message);
//             }
//           }
//         });
//       }
//     });
//
//
//
//
// // ********************   VAR PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
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
