$(document).ready(function () {
   // llenarTablaMaterias(); // SEINICIALIZA LA FUNCTIO DE LA CARGA DEL LISTADO DE LA TABLA
    llenar_combo_carreras_materias_administrativos();
    $("#combo_carreras_materias_admin").change(function () {
        $("#tbl_vista_materias").DataTable().destroy();
        llenarTablaMaterias($("#combo_carreras_materias_admin").val(), $("#combo_semestres_materias_admin").val());
    });
    llenar_combo_semestres_materias_administrativos();
    $("#combo_semestres_materias_admin").change(function () {
        $("#tbl_vista_materias").DataTable().destroy();
        llenarTablaMaterias($("#combo_carreras_materias_admin").val(), $("#combo_semestres_materias_admin").val());
     });
}); // FIN DE LA FUNCION PRINCIPAL


$(".custom-file-input").on("change", function () {
    let fileName = $(this).val().split("\\").pop();
    let label = $(this).siblings(".custom-file-label");

    if (label.data("default-title") === undefined) {
        label.data("default-title", label.html());
    }

    if (fileName === "") {
        label.removeClass("selected").html(label.data("default-title"));
    } else {
        label.addClass("selected").html(fileName);
    }
});

/* ---------------------------- Add Records Modal --------------------------- */
$("#modaladdmateria").on("hide.bs.modal", function (e) {
    // do something...
    $("#formaddmateria")[0].reset();
});


/* ---------------------------- Edit Record Modal --------------------------- */
$("#modaleditmateria").on("hide.bs.modal", function (e) {
    // do something...
    $("#formeditmateria")[0].reset();
});


/* -------------------------------------------------------------------------- */
/*                               Insert Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#btnaddmateria", function (e) {
    e.preventDefault();
    var clave_materia = $("#clave_materia").val();
    var nombre_materia = $("#nombre_materia").val();
    var creditos_materia = $("#creditos_materia").val();
   
    var licenciaturas_para_materia = $("#licenciaturas_para_materia").val();
    var semestre_materia = $("#semestre_materia").val();
    
    if (clave_materia == "" || nombre_materia == "" || creditos_materia == "" || licenciaturas_para_materia == "" || 
    semestre_materia == "") {
        alert("Debe llenar todos los campos vacios...!");
    } else {

        var fd = new FormData();
     
        fd.append("clave", clave_materia);
        fd.append("nombre_materia", nombre_materia);
        fd.append("creditos", creditos_materia);
        fd.append("especialidad", licenciaturas_para_materia);
        fd.append("semestre", semestre_materia);

        agregar_materia(fd); //Se registra el usuario a la tabla alumnos y a la tabla detalles

    }
});




$(document).on("click", "#update_materia", function (e) {
    e.preventDefault();
    var id_materia_update = $("#id_materia_update").val();
    var clave_materia_update = $("#clave_materia_update").val();
    var nombre_materia_update = $("#nombre_materia_update").val();
    var creditos_materia_update = $("#creditos_materia_update").val();
    var licenciaturas_para_materia_update = $("#licenciaturas_para_materia_update").val();
    var semestre_materia_update = $("#semestre_materia_update").val();
    
    if (clave_materia_update == "" || nombre_materia_update == "" || creditos_materia_update == "" ||  licenciaturas_para_materia_update == "" ||  semestre_materia_update == "" ) {
        alert("Debe llenar todos los campos vacios...!");
    } else {

        var fd = new FormData();
        fd.append("id_materia", id_materia_update);
        fd.append("clave", clave_materia_update);
        fd.append("nombre_materia", nombre_materia_update);
        fd.append("creditos", creditos_materia_update);        
        fd.append("especialidad", licenciaturas_para_materia_update);
        fd.append("semestre", semestre_materia_update);
       

        $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Materias/updatemateria',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
            success: function (response) {
                if (response.response == "success") {
                    toastr["success"](response.message);
                    $("#modaleditmateria").modal("hide");
                    $("#formeditmateria")[0].reset();
                    $("#tbl_vista_materias").DataTable().destroy();
                    llenarTablaMaterias();
                } else {
                    toastr["error"](response.message);
                }
            },
            error: function (response) {
                toastr["error"](response.message);
            }
        });
    }
});

/* -------------------------------------------------------------------------- */
/*                                llenarTablaMaterias               */
/* -------------------------------------------------------------------------- */


function llenarTablaMaterias(carrera,semestre) {
    // debugger;
        // debugger;
        var semestres = semestre;
        var carreras = carrera;
        var fd = new FormData();
        fd.append("semestre", semestres);
        fd.append("especialidad", carreras);

    
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Materias/vermaterias',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (response) {
            var i = "1";
            $("#tbl_vista_materias").DataTable({
                data: response,
                responsive: true,
                columns: [{
                    data: "id_materia",
                    "visible": false,
                    "searchable": false
                },
                {
                    data: "clave",
                },
                {
                    data: "nombre_materia",
                },
                {
                    data: "creditos",
                },
                {
                    orderable: false,
                    searchable: false,
                    data: function (row, type, set) {
                        return `
                                <a href="#" id="edit_materia" class="btn btn-success btn-remove" value="${row.id_materia}"><i class="far fa-edit"></i></a>
                                <a href="#" id="del_materia" class="btn btn-danger btn-remove" value="${row.id_materia}"><i class="fas fa-trash-alt"></i></a>
                            `;
                    },
                },
                ],
                "language": language_espaniol,

            });
        },
    });
}





$(document).on("click", "#edit_materia", function (e) {
    e.preventDefault();
    var edit_id = $(this).attr("value");
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Materias/editarmateria',
        data: {
            edit_id: edit_id,
        },
        dataType: "json",
        success: function (data) {
            console.log(data); //ver la respuesta del json, los valores que contiene
            $('#modaleditmateria').modal('show');
            $("#id_materia_update").val(data.post.id_materia);
            $("#clave_materia_update").val(data.post.clave);
            $("#nombre_materia_update").val(data.post.nombre_materia);
            $("#creditos_materia_update").val(data.post.creditos);
            $("#licenciaturas_para_materia_update").val(data.post.especialidad);
            $("#semestre_materia_update").val(data.post.semestre);
        },
    });
});
/* -------------------------------------------------------------------------- */
/*                               Delete Records                               */
/* -------------------------------------------------------------------------- */
$(document).on("click", "#del_materia", function (e) {
    e.preventDefault();

    var del_id = $(this).attr("value");

    Swal.fire({
        title: "¿Estás seguro de dar de eliminar la materia?",
        text: "¡Esta acción es irreversile!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "¡Si, eliminala!",
        cancelButtonText: "¡No, cancelar!",
    }).then((result) => {
        if (result.isConfirmed) {
            var fd = new FormData();
            fd.append("id_materia",del_id);
        
            $.ajax({
            type: "post",
            url: base_url + 'Administrativos/Materias/eliminarmateria',
            data: fd,
            processData: false,
            contentType: false,
            dataType: "json",
            enctype: 'multipart/form-data',
                success: function (data) {
                    if (data.responce == "success") {
                        Swal.fire(
                            '¡Materia eliminada!',
                            'Se eliminó la materia',
                            'success'
                        );
                        $("#tbl_vista_materias").DataTable().destroy();
                        llenarTablaMaterias();
                    } else {
                        console.log(data);
                    }
                },
            });
        }
    });
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


function agregar_materia(fd) {
    $.ajax({
        type: "post",
        url: base_url + 'Administrativos/Materias/insertarmateria',
        data: fd,
        processData: false,
        contentType: false,
        dataType: "json",
        enctype: 'multipart/form-data',
        success: function (response) {
            if (response.response == "success") {
                toastr["success"](response.message);
                $("#modaladdmateria").modal("hide");
                $("#formaddmateria")[0].reset();
                $("#tbl_vista_materias").DataTable().destroy();
                llenarTablaMaterias();
            } else {
                toastr["error"](response.message);
            }
        },
    });
}
function llenar_combo_carreras_materias_administrativos() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obtenercarreras',
        dataType: "json",
        success: function (data) {
            console.log(data);
            $.each(data, function (key, registro) {
                $("#combo_carreras_materias_admin").append('<option value=' + registro.id_carrera + '>' + registro.carrera_descripcion + '</option>');
            });
        },
    });
}
function llenar_combo_semestres_materias_administrativos() {
    $.ajax({
        type: "get",
        url: base_url + 'Administrativos/HacerHorarioProfesor/obtenersemestres',
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, registro) {
                $("#combo_semestres_materias_admin").append('<option value=' + registro.semestre + '>' + registro.nombre + '</option>');
            });

        },
    });
}



