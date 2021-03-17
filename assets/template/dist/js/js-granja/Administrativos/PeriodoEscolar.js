$(document).ready(function () {
    llenartablaperiodos(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
    date_picker();
});
/* ---------------------------- Add periodo Modal --------------------------- */
$("#modal_add_periodo_escolar").on("hide.bs.modal", function (e) {
    // do something...
    $("#addperiodo")[0].reset();
});
/* ---------------------------- Edit periodo Modal --------------------------- */
$("#editperiodos").on("hide.bs.modal", function (e) {
    // do something...
    $("#formeditarperiodos")[0].reset();
});
//////////////////////// AGREGAR PERIODO ////////////////////////////////////////////////7
$(document).on("click", "#btnaddperiodo", function (e) {
    e.preventDefault();
    var nombre = $("#ciclo").val();
    var fechainicial = $("#datepicker_fecha_inicial").val();
    var fechafinal = $("#datepicker_fecha_final").val();
    if (nombre == "" || fechainicial == "" || fechafinal == "") {
        alert("¡Complete todos los campos!");
    } else {
        var fd = new FormData();
        fd.append("nombre_ciclo", nombre);
        fd.append("fecha_inicial", fechainicial);
        fd.append("fecha_final", fechafinal);
        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/PeriodoEscolar/insertarperiodos',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.res == "success") {
                    toastr["success"](response.message);
                    $("#modal_add_periodo_escolar").modal("hide");
                    $("#addperiodo")[0].reset();
                    $("#tbl_periodos").DataTable().destroy();
                    llenartablaperiodos();
                } else {
                    toastr["error"](response.message);
                }
            },
        });
    }
});
//////////////////////// VER PERIODOS ////////////////////////////////////////////////7
function llenartablaperiodos() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/PeriodoEscolar/verperiodos',
        dataType: "json",
        success: function (response) {
            var i = "1";
            $("#tbl_periodos").DataTable({
                data: response,
                responsive: true,
                columns: [
                    {
                        data: "id_periodo_escolar",
                        "visible": false,
                        "searchable": false

                    },
                    {
                        data: "nombre_ciclo",
                    },
                    {
                        data: "fecha_inicial",
                    },
                    {
                        data: "fecha_final",
                    },
                    {
                        orderable: false,
                        searchable: false,
                        data: function (row, type, set) {
                            return `  
                        <a href="#" id="edit_periodo" class="btn btn-success btn-remove" value="${row.id_periodo_escolar}"><i class="far fa-edit"></i></a>
                        <a href="#" id="del_periodo" class="btn btn-danger btn-remove" value="${row.id_periodo_escolar}"><i class="fas fa-trash-alt"></i></a>
                                 `;
                        },
                    },
                ],
                "language": language_espaniol,
            });
        },
    });
}
//////////////////////// ELIMINAR PERIODO ////////////////////////////////////////////////7
$(document).on("click", "#del_periodo", function (e) {
    e.preventDefault();
    var del_id = $(this).attr("value");
    Swal.fire({
        title: "¿Estás seguro de Borrar?",
        text: "¡Esta acción es irreversile!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, bórralo!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: base_url + 'Administrativos/PeriodoEscolar/eliminarperiodos',
                data: {
                    del_id: del_id,
                },
                dataType: "json",
                success: function (data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Eliminado!',
                            'El periodo fue eliminado',
                            'success'
                        );
                        $("#tbl_periodos").DataTable().destroy();
                        llenartablaperiodos();
                    }
                },
            });
        }
    });
});
////////////////////////// GET PERIODO FOR EDIT /////////////////////////////////
$(document).on("click", "#edit_periodo", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/PeriodoEscolar/editarperiodos',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            // console.log(data); ver la respuesta del json, los valores que contiene
            $('#editperiodos').modal('show');
            $('#id_periodo_escolar_update').val(data.post.id_periodo_escolar)
            $('#ciclo_update').val(data.post.nombre_ciclo)
            $('#datepicker_fecha_inicial_update').val(data.post.fecha_inicial)
            $('#datepicker_fecha_final_update').val(data.post.fecha_final)
        },
    });
});
////////////////////////// EDIT PERIODO /////////////////////////////////
$(document).on("click", "#update_periodo", function (e) {
    e.preventDefault();
    var id_periodo_escolar_update = $('#id_periodo_escolar_update').val();
    var ciclo_update = $('#ciclo_update').val();
    var fecha_inicial_update = $('#datepicker_fecha_inicial_update').val();
    var fecha_final_update = $('#datepicker_fecha_final_update').val();
    if (ciclo_update == "" || fecha_inicial_update == "" || fecha_final_update == "") {
        alert("¡Complete todos los campos!");
    } else {
        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/PeriodoEscolar/updateperiodos',
            data: {
                id_periodo_escolar_update: id_periodo_escolar_update,
                ciclo_update: ciclo_update,
                fecha_inicial_update: fecha_inicial_update,
                fecha_final_update: fecha_final_update
            },
            dataType: "json",
            success: function (data) {
                if (data.responce == "success") {
                    toastr["success"](data.message);
                    $("#editperiodos").modal("hide");
                    $("#formeditarperiodos")[0].reset();
                    $("#tbl_periodos").DataTable().destroy();
                    llenartablaperiodos();
                } else {
                    toastr["error"](data.message);
                }
            },
        });
    }
});
// ********************   variable PARA CAMBIAR DE IDIOMA AL ESPAÑOL EL DataTable  *************************
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
function date_picker() {
    $("#datepicker_fecha_final,#datepicker_fecha_inicial,#datepicker_fecha_final_update,#datepicker_fecha_inicial_update").datepicker({
        closeText: 'Cerrar',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
        weekHeader: 'Sm',
        dateFormat: 'yy/mm/dd',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    });
    $.datepicker.setDefaults($.datepicker.regional['es']);
}