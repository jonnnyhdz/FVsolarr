<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <?php

    $ShortCircuitCurrentIsc = 13.95;
    $corrientefusible = $ShortCircuitCurrentIsc * 1.25 * 1.25;
    $voltentrada  = 1100;
    $imax = 17.45 * 1.25



    ?>
    <h1> corriente fusible: <?php echo $corrientefusible ?></h1>
    <div> Fusible a escoger <input type="number" /></div>
    <div>
        <h1>Recomendado por fabricante de modulo: </h1> <input type="number" />
        <h1>Maxima voltaje de entrada del inversor: <?php echo $voltentrada ?> </h1>
        <h1> </h1>
        


    </div>

</body>

</html>