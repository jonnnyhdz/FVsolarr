$(document).ready(function() {
    // Función para actualizar los totales y mostrarlos en tiempo real
    function actualizarTotales() {
        // Recorre cada inversor
        $('.solucion-mppt').each(function() {
            var inversorID = $(this).data('inversor');
            var totalModulos = 0;

            // Suma los valores de las soluciones MPPT para el inversor actual
            $('.solucion-mppt[data-inversor="' + inversorID + '"]').each(function() {
                var valor = parseInt($(this).val());
                if (!isNaN(valor)) {
                    totalModulos += valor;
                }
            });

            // Actualiza el total de módulos para el inversor actual
            $('#total-modulos-inversor-' + inversorID).text(totalModulos);
        });
    }

    // Evento de cambio en los campos de solución MPPT y voltaje MPPT
    $('.solucion-mppt, .voltaje-mppt').on('change', function() {
        actualizarTotales();
    });

    // Llama a la función para actualizar los totales al cargar la página
    actualizarTotales();
});


