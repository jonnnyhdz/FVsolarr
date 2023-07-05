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

/*  como guardar cookkies */

function setSeleccionCookie() {
  var seleccion = document.getElementById("seleccion").value;

  // Guardar la selección en una cookie con una duración de 30 días
  document.cookie = "seleccion=" + seleccion + "; expires=" + getCookieExpiration(30) + "; path=/";

  // Mostrar el mensaje correspondiente según la selección
  if (seleccion === "si") {
    document.getElementById("mensajeDatos").innerHTML = "Utilizarás tus propios datos.";
  } else {
    document.getElementById("mensajeDatos").innerHTML = "Utilizarás los datos de la aplicación.";
  }

  // Mostrar u ocultar los campos de datos propios según la selección
  if (seleccion === "si") {
    document.getElementById("datosPropios").style.display = "block";
  } else {
    document.getElementById("datosPropios").style.display = "none";
  }
}

function getCookieExpiration(days) {
  var date = new Date();
  date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
  return date.toUTCString();
}
