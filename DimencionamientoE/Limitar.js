
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
    mensajeDatos.innerHTML = '<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show m-3">' +
    '<span class="badge badge-pill badge-danger">Alert</span>' +
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
  

  console.log(Limitacion);

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

/* // Función para guardar la selección en una cookie
function guardarSeleccion() {
    var seleccion = document.getElementById("seleccion").value;
    document.cookie = "seleccion=" + seleccion + "; path=/";

}
  
  // Función para mostrar la selección almacenada en la cookie
  function mostrarSeleccion() {
    var cookieValue = document.cookie.replace(/(?:(?:^|.*;\s*)seleccion\s*\=\s*([^;]*).*$)|^.*$/, "$1");
  
    if (cookieValue) {
      var seleccion = cookieValue;

      // Mostrar la selección en otro lugar de la página
      document.getElementById("seleccionGuardada").textContent = "Selección actual: " + seleccion;

      // Seleccionar la opción correspondiente en el select
      var selectElement = document.getElementById("seleccion");
      for (var i = 0; i < selectElement.options.length; i++) {
        if (selectElement.options[i].value === seleccion) {
          selectElement.selectedIndex = i;
          break;
        }
      }
  
      // Mostrar u ocultar los datos propios según la selección
      var datosPropios = document.getElementById("datosPropios");
      if (seleccion === "si") {
        datosPropios.style.display = "block";
      } else {
        datosPropios.style.display = "none";
      }
    }
} */


    




  
  
  