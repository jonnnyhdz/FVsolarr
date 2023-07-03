
  function datosCalculo3(event) {
    event.preventDefault(); // Evita que el formulario se envíe de forma predeterminada

    // Obtener los valores de los campos ocultos
    var potenciaPico = document.getElementById('inputPotenciaPico').value;
    var numModulos = document.getElementById('inputNumModulos').value;
    var areaTotal = document.getElementById('inputAreaTotal').value;
    var idProyecto = document.getElementById('idProyecto').value;

    // Construir el objeto de parámetros
    var parametros3 = {
      potenciaPico: potenciaPico,
      numModulos: numModulos,
      areaTotal: areaTotal,
      idProyecto: idProyecto
    };

    // Realizar la solicitud AJAX a Calculo3.php
    $.ajax({
      data: parametros3,
      url: 'ajax/Calculo3.php',
      type: 'POST',
      beforeSend: function() {
        $('#mostrar_mensaje3').html("Cargando...");
      },
      success: function(mensaje3) {
        $('#mostrar_mensaje3').html(mensaje3);
      }
    });
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
