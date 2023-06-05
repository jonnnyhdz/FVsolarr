var opciones = document.getElementById('opciones');
var num_modulos = document.getElementById('num-modulos');
var area_total = document.getElementById('area-total');
var potencia_pico = document.getElementById('potencia-pico'); 
var potencia_pico2 = document.getElementById('potencia-pico2');  

/* valores que traigo */
var potencia = parseFloat(document.getElementById("potencia").getAttribute("value"));
var valor_hola = parseFloat(document.getElementById("hola").getAttribute("value")); 
var area = parseFloat(document.getElementById("area").getAttribute("value"));
var PpicoFv = parseFloat(document.getElementById('PpicoFv').getAttribute("value"));
var tdKwpico = document.getElementById("Kwpico");
var tdKwpico2 = parseFloat(document.getElementById("Kwpico2").getAttribute("value"));
var dato = parseFloat(document.getElementById("dato").getAttribute("value"));

var datoMultiplicado = parseFloat(dato) * 1.25;



function cambiarColor() {
  var tdKwpico2Value = parseFloat(tdKwpico2.innerText);
  var PpicoFvValue = parseFloat(PpicoFv.innerText);

  if (opciones.value === "no" && tdKwpico2Value < PpicoFvValue) {
    tdKwpico.style.backgroundColor = "red";
  } else if (opciones.value === "si" && tdKwpico2Value < potencia) {
    tdKwpico.style.backgroundColor = "red";
  } else {
    tdKwpico.style.backgroundColor = "";
  }
}

opciones.addEventListener('change', function() {
  if (opciones.value === 'no') {
    num_modulos.innerText = valor_hola.toString();
    area_total.innerText = area.toString();
    potencia_pico.innerText = PpicoFv.toString();
    potencia_pico2.innerText = PpicoFv.toString();
  } else {
    // Resto del código para la opción "si"
    location.href = 'Corrientemax.php';
  }
});

window.onload = cambiarColor;



