function guardar() {

    var id_seleccionado = $('select[name="cat"]').val();
    var inputValor1 = document.getElementById("min").value;
    var inputValor2 = document.getElementById("max").value;
    var HSP1 = document.getElementById("ior").value; 
    var proyect = document.getElementById("proyecto").value;  
    var ubi = document.getElementById("ubi").value; 
    var idproyecto = idProyecto;

    var parametros2 = { 
        "id": id_seleccionado,
        "HSP": HSP1,
        "pro": proyect,
        "id_proyecto":idproyecto,
        "ubi" : ubi,
    };


    // Verificar si los campos tienen valor
    if (inputValor1 !== "" && inputValor2 !== "") {
        // Ambos campos tienen valor, enviar ambos parámetros
        var parametros = {
            "id": id_seleccionado,
            "valor1": inputValor1,
            "valor2": inputValor2,
            "id_proyecto":idproyecto
        };
    } else if (inputValor1 !== "") {
        // Solo el campo "min" tiene valor, enviar solo ese parámetro
        var parametros = {
            "id": id_seleccionado,
            "valor1": inputValor1,
            "id_proyecto":idproyecto
        };
    } else if (inputValor2 !== "") {
        // Solo el campo "max" tiene valor, enviar solo ese parámetro
        var parametros = {
            "id": id_seleccionado,
            "valor2": inputValor2,
            "id_proyecto":idproyecto
        
        };
    } else {
        // Ambos campos están vacíos, no enviar nada
        return;
    }


    $.ajax({
        data: parametros,
        url: 'Tiempo.php',
        type: 'POST',
        beforeSend: function() {
            $('#mostrar_mensaje').html("Cargando......");
        },
        success: function(mensaje) {
            $('#mostrar_mensaje').html(mensaje);
        }

        
    });

    $.ajax({
        data: parametros2,
        url: 'ModulosC.php',
        type: 'POST',
        beforeSend: function() {
            $('#mostrar_mensaje2').html("Cargando......");
        },
        success: function(mensaje2) {
            $('#mostrar_mensaje2').html(mensaje2);
        }
    });

}

window.onload = guardar;