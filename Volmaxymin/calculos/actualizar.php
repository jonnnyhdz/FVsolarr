<?php
if(isset($_POST['dato'])) {
    $dato = $_POST['dato'];
    // Realizar cualquier procesamiento adicional que desees con el dato
    
    // Multiplicar el dato por 1.25
    $datoMultiplicado = $dato * 1.25;
    
    // Devolver el dato multiplicado para actualizar la tabla en tiempo real
    echo $datoMultiplicado;
}
?>
