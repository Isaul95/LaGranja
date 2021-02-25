// assets\template\dist\js\archivos.js

  $(document).ready(function(){

$("#upFile").on("click", function(){

  $("#getFile").click();
  return false;
});


// UNA VES K SE ELIGE EL FILE CAMBIA DE COLOR EL BOTON
$("#getFile").on("change", function(){

  $("#upFile").removeClass("btn-light");
  $("#upFile").addClass("btn-primary");

  $("#ico-btn-file").removeClass("fa-upload");
  $("#ico-btn-file").addClass("fa-check");
  return false;
});




$("body").on("submit", "#formArchivos", function(){
  debugger;
  var actualizacionUsuariosDTO = {
     alumno_nombre_completo : $("#alumno_nombre_completo").val(),
     nombre : $("#nombre").val(),
     // numeroConvocatoria : $("#f-numeroConvocatoria").val(),
   };

  var formData = new FormData();
  var archivo = $(getFile)[0].files[0];  // variable del input del file extraer su valor
   var fileName = archivo.name;

   var alumno_nombre_completo = $("#alumno_nombre_completo").val();
   var nombre = $("#nombre").val();


  $("#smtArchivo").prop('disabled', true);

  formData.append("archivo",archivo);
  formData.append("actualizacionUsuariosDTO", JSON.stringify(actualizacionUsuariosDTO));
  // formData.append("name", name);


alert('bien 1'+ archivo);
alert('alumno_nombre_completo:'+ alumno_nombre_completo);
alert('nombre:'+ nombre);

      $.ajax({
          url: base_url+'mantenimiento/RegistrarPagos/addFile',
          type: "POST",
          data: formData,
          dataType : "json",
          enctype : 'multipart/form-data',
          contentType: false,
          processData: false,
          success: function (resultadoItem){
             location.reload();
            alert('Excelente!');
          }
      });
       return false;
});






}); // FIN DE LA FUNCION PRINCIPAL
