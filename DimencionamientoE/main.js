function mostrarDatos() {
    var seleccion = document.getElementById("seleccion").value;
    if (seleccion === "si") {
        document.getElementById("numModulos").readOnly = false;
        document.getElementById("areaTotal").readOnly = false;
        document.getElementById("potenciaPico").readOnly = false;

        // Almacenar la selección "Sí" en el almacenamiento local
        localStorage.setItem("seleccion", "si");
    } else {
        document.getElementById("numModulos").readOnly = true;
        document.getElementById("areaTotal").readOnly = true;
        document.getElementById("potenciaPico").readOnly = true;

        if (numModulosModificado) {
            // Restaurar valores iniciales
            numModulosInicial = localStorage.getItem("numModulos");
            document.getElementById("numModulos").value = numModulosInicial;
            document.getElementById("areaTotal").value = localStorage.getItem("areaTotal");
            document.getElementById("potenciaPico").value = localStorage.getItem("potenciaPico");

            numModulosModificado = false;
            localStorage.setItem("numModulosModificado", false);
        }

        // Almacenar la selección "No" en el almacenamiento local
        localStorage.setItem("seleccion", "no");
    }
    
}

window.addEventListener("load", function () {
    numModulosModificado = localStorage.getItem("numModulosModificado") === "true";
    inicializarValores();
    mostrarDatos();
    datosconcambios();
    // Restaurar la selección guardada en el almacenamiento local
    var seleccionGuardada = localStorage.getItem("seleccion");
    if (seleccionGuardada) {
        document.getElementById("seleccion").value = seleccionGuardada;
    }
});

function enviarDatos(event) {
    event.preventDefault();
    
    var numModulos = document.getElementById("inputNumModulos").value;
    var areaTotal = document.getElementById("inputAreaTotal").value;
    var potenciaPico = document.getElementById("inputPotenciaPico").value;

    // Actualizar los valores en el almacenamiento local
    localStorage.setItem("numModulos", numModulos);
    localStorage.setItem("areaTotal", areaTotal);
    localStorage.setItem("potenciaPico", potenciaPico);
    
    // Reiniciar los valores iniciales y mostrar los nuevos valores
    numModulosInicial = numModulos;
    numModulosModificado = true;
    localStorage.setItem("numModulosModificado", true);
    mostrarDatos();
    datosconcambios();
    document.getElementById("mensajeModificacion").innerText = "¡Valores Actualizados!";
    
    // Restablecer el formulario de envío
    document.getElementById("formularioEnvio").reset();
}

var numModulosInicial;
var numModulosModificado = false;

function inicializarValores() {
    if (localStorage.getItem("numModulos") !== null) {
        numModulosInicial = localStorage.getItem("numModulos");
        document.getElementById("numModulos").value = numModulosInicial;
    } else {
        numModulosInicial = null;
    }

    if (localStorage.getItem("areaTotal") !== null) {
        document.getElementById("areaTotal").value = localStorage.getItem("areaTotal");
    } else {
        document.getElementById("areaTotal").value = 0;
    }

    if (localStorage.getItem("potenciaPico") !== null) {
        document.getElementById("potenciaPico").value = localStorage.getItem("potenciaPico");
    } else {
        document.getElementById("potenciaPico").value = 0;
    }
    datosconcambios();
}

function actualizarDatos() {
    var numModulos = document.getElementById("numModulos").value;
    var areaTotal = document.getElementById("areaTotal").value;
    var potenciaPico = document.getElementById("potenciaPico").value;

    if (numModulosInicial !== null) {
        if (numModulos !== numModulosInicial || areaTotal !== localStorage.getItem("areaTotal") || potenciaPico !== localStorage.getItem("potenciaPico")) {
            numModulosInicial = numModulos;
            numModulosModificado = true;
            localStorage.setItem("numModulosModificado", true);
        }
    }

    localStorage.setItem("numModulos", numModulos);
    localStorage.setItem("areaTotal", areaTotal);
    localStorage.setItem("potenciaPico", potenciaPico);

    datosconcambios();
}



window.addEventListener("storage", function (event) {
    if (event.key === "numModulosModificado" && event.newValue === "false") {
        numModulosInicial = null;
        numModulosModificado = false;
        inicializarValores();
        mostrarDatos();
        document.getElementById("mensajeModificacion").innerText = "";
    }
});

function datosconcambios() {
    var numModulos = document.getElementById("numModulos").value;
    var areaTotal = document.getElementById("areaTotal").value;
    var potenciaPico = document.getElementById("potenciaPico").value;

    var datosElement = document.getElementById("datos");
    datosElement.innerText = "Número de Módulos: " + numModulos + ", Área Total para instalar módulos FV: " + areaTotal + ", Potencia Pico FV: " + potenciaPico;

}




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
        "ubi" : ubi
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
        url: 'ajax/Calculo1.php',
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
        url: 'ajax/Calculo2.php',
        type: 'POST',
        beforeSend: function() {
            $('#mostrar_mensaje2').html("Cargando......");
        },
        success: function(mensaje2) {
            $('#mostrar_mensaje2').html(mensaje2);
        }
    });

}

function OInversor(){

    document.getElementById("cantidad").addEventListener("change", function() {
        var cantidad = parseInt(this.value);
        for (var i = 1; i <= 10; i++) {
            if (i <= cantidad) {
                document.getElementById("marca_" + i).style.display = "block";
            } else {
                document.getElementById("marca_" + i).style.display = "none";
            }
        }
    });

    // Mostrar o ocultar las marcas dependiendo de si los inversores son los mismos o diferentes
    document.getElementById("inversores").addEventListener("change", function() {
        var inversores = this.value;
        if (inversores === "mismo") {
            for (var i = 2; i <= 10; i++) {
                document.getElementById("marca_" + i).style.display = "none";
            }
        } else {
            var cantidad = parseInt(document.getElementById("cantidad").value);
            for (var i = 2; i <= cantidad; i++) {
                document.getElementById("marca_" + i).style.display = "block";
            }
        }
    });
}

window.onload = guardar;
