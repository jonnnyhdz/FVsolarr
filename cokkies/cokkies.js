 // Obtener el valor de la cookie al cargar la página
 window.onload = function() {
  var id_proyecto = document.getElementById("idproyecto").getAttribute("data-idproyecto");
  var opcionSeleccionada = Cookies.get("opcionSeleccionada_" + id_proyecto);
  if (opcionSeleccionada) {
    document.getElementById("opciones").value = opcionSeleccionada;
  }
};

function guardarSeleccion() {
  var id_proyecto = document.getElementById("idproyecto").getAttribute("data-idproyecto");
  var seleccion = document.getElementById("opciones").value;
  Cookies.set("opcionSeleccionada_" + id_proyecto, seleccion);
}


/* valor que se pone el html */
/*   onchange="guardarSeleccion()" */
/*  console.log("Opción seleccionada guardada en cookie para el id_proyecto " + id_proyecto + ": " + seleccion); */