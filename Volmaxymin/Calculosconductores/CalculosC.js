// Archivo: CalculosC.js

// Obtener el elemento input con el id "valorVer"
var valorVerInput = document.getElementById("valorVer") ?? 0;

// Obtener el valor del atributo value
var valorVer = valorVerInput.value;




function calculateTotal(input) {
    var tableRow = input.closest('tr');
    var numModulos = parseFloat(tableRow.querySelector('.vmaximo-input').value);
    var CNominal = 13.46
    var calculos = 2 * (valorVer / 1000) * numModulos * CNominal;

    tableRow.querySelector('.corrientenominal').textContent = CNominal.toFixed(2);
    tableRow.querySelector('.potencia-input').textContent = calculos.toFixed(2);
    tableRow.querySelector('.corriente-input').textContent = Circuit.toFixed(2);
    calculateRowTotal(tableRow.closest('table'));
}
