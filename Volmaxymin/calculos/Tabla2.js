
function calculateVMaximo(input, voc, moduloIndex) {
    var numModulos = parseInt(input.value);
    var vmax = numModulos * voc;
    document.getElementById('vmax_' + moduloIndex).textContent = vmax;
}
