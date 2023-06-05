function guardar2() {

    var nummodulos = document.getElementById("nummodulos").value; 
    var cancadenas = document.getElementById("cancadenas").value;
    var opciones = document.getElementById("opciones").value;
    var area = document.getElementById("area-insta").value;
    var idproyecto = idProyecto;



    // Realizar acciones adicionales según el valor seleccionado
 


    var parametros = {
        "id": idproyecto,
        "nummodulos": nummodulos,
        "cancadenas": cancadenas,
        "area": area,
        "opcionSeleccionada":opciones
    };

  

    $.ajax({
        data: parametros,
        url: 'guardar.php',
        type: 'POST',
        beforeSend: function() {
            // Puedes mostrar un mensaje de carga o hacer alguna acción antes de enviar la solicitud
            $('#loading').html("Cargando......");
        },
        success: function(mensaje) {
            // Aquí puedes manejar la respuesta exitosa del servidor
            // Por ejemplo, mostrar un mensaje o actualizar algún elemento en la página
            $('#resultado').html(mensaje);
        },
        error: function() {
            // Aquí puedes manejar errores en caso de que ocurra algún problema en la solicitud AJAX
            // Por ejemplo, mostrar un mensaje de error o tomar alguna acción alternativa
            $('#resultado').html("Se produjo un error en la solicitud.");
        }
    });
}
