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



 
  
 
