<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="theme" rel="stylesheet" href="../css/bootstrap.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
    <style>
        .centered-input {
            display: flex;
            align-items: center;
        }
        .centered-input input {
            margin-top: auto;
            margin-bottom: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-secondary text-center rounded p-4">
                    <h3 class="card-title">Detalles del proyecto</h3>
                    <div class="card-body">
                        <div class="form-group centered-input">
                            <label for="nombreProyecto">Nombre del proyecto</label>
                            <input type="text" class="form-control" id="proyecto" name="nameproyecto" oninput="guardar()" value="<?php echo $fila["NOMBRE_PROYECTO"] ?>">
                        </div>
                        <div class="form-group centered-input">
                            <label for="hsp">HSP</label>
                            <input class="form-control" type="number" id="ior" name="hsp" placeholder="Min" oninput="guardar()" value="<?php echo $fila["HSP"] ?>">
                        </div>
                        <div class="form-group centered-input">
                            <label for="temp">Temp. Ambiente (Min/Max)</label>
                            <div class="row">
                                <div class="col">
                                    <input type="number" class="form-control" id="min" name="min" oninput="guardar()" value="<?php echo $fila["TEMP_MIN"] ?>">
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control" id="max" name="max" oninput="guardar()" value="<?php echo $fila["TEMP_MAX"] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group centered-input">
                            <label for="ubicacion">Ubicación</label>
                            <input type="text" class="form-control" name="ubicacion" value="<?php echo $fila["Ubicacion"] ?>" id="ubi" oninput="guardar()">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
