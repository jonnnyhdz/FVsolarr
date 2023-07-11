
function enviarDatos() {

  var dato1 = document.getElementById("dato1").value;
  var dato2 = document.getElementById("dato2").value;
  var dato3 = document.getElementById("dato3").value;
  var id_seleccionado = $('select[name="seleccion"]').val();
  var idproyecto = idProyecto;
  


    var parametros = {
      "idProyecto": idproyecto,
      "seleccion": id_seleccionado,
      "dato1":dato1,
      "dato2":dato2,
      "dato3":dato3
    };

  
  // Realizar la solicitud AJAX a Prueba.php
  $.ajax({
    data: parametros,
    url: 'ajax/Prueba.php',
    type: 'POST',
    beforeSend: function() {
      // Puedes mostrar un mensaje de carga aquí
    },
    success: function(response) {
      // Manejar la respuesta de Prueba.php
    },
    error: function(xhr, status, error) {
      // Manejar errores de la solicitud AJAX
      console.log("Error en la solicitud AJAX");
    }
  });

}


function mostrarOcultarDatos() {
  var seleccion = document.getElementById("seleccion").value;
  var datosPropios = document.getElementById("datosPropios");
  var mensajeDatos = document.getElementById("mensajeDatos");

  if (seleccion === "si") {
    datosPropios.style.display = "block";
    mensajeDatos.style.display = "none";
  } else {
    datosPropios.style.display = "none";
    mensajeDatos.style.display = "block";
    mensajeDatos.innerHTML = '<div class="sufee-alert alert with-close alert-warning alert-dismissible fade show mt-3">' +
    '<span class="badge badge-pill badge-warning mr-2">Alert</span>' +
    'ESTAS UTILIZANDO LOS DATOS DEL SOFTWARE!' +
    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    '<span aria-hidden="true">&times;</span>' +
    '</button>' +
    '</div>';
  }
}

document.addEventListener("DOMContentLoaded", function() {
  mostrarOcultarDatos();
});


function guardarSeleccion(){

  var Limitacion = $('select[name="seleccion"]').val();
  var idproyecto = idProyecto;


  var parametros = {
    "idproyecto": idproyecto,
    "Limitacion": Limitacion
  };
  

  // Realizar la solicitud AJAX a Prueba.php
  $.ajax({
    data: parametros,
    url: 'ajax/Prueba.php',
    type: 'POST',
    beforeSend: function() {
      // Puedes mostrar un mensaje de carga aquí
    },
    success: function(response) {
      // Manejar la respuesta de Prueba.php
      console.log("Se envia:",Limitacion);
    },
    error: function(xhr, status, error) {
      // Manejar errores de la solicitud AJAX
      console.log("Error en la solicitud AJAX");
    }
  });
  mostrarOcultarDatos();
}

    




  
  
  