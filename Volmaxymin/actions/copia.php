       <!--   <div class="container-fluid mt-4 pt-4 px-4">
                    <div class="bg-secondary text-center rounded">
                        <div class="row g-4">
                            <div class="col-sm-12 col-xl-12">
                                <div class="bg-secondary rounded h-100 p-1">

                                <?php
                                    include("../BD/conec.php");

                                    $inversores = array();

                                    $consulta = "SELECT escogido_mfv.ID_ESCOGIDO, escogido_mfv.ID_INVERSORES, inversores.Marca, inversores.Modelo, inversores.No_rastreadores_MPPT, inversores.Max_corriente_cortocircuito_rastreador_MPPT, inversores.Max_corriente_entrada_rastreador_MPPT FROM escogido_mfv
                                    JOIN inversores ON escogido_mfv.ID_INVERSORES = inversores.id_inversor
                                    WHERE escogido_mfv.ID_PROYECTO = '$id_proyecto'";
                                    $resultado = mysqli_query($conexion, $consulta);

                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        $idInversor = $fila['ID_INVERSORES'];
                                        if (!isset($inversores[$idInversor])) {
                                            $inversores[$idInversor] = array(
                                                'ID_INVERSORES' => $fila['ID_INVERSORES'],
                                                'Marca' => $fila['Marca'],
                                                'Modelo' => $fila['Modelo'],
                                                'No_rastreadores_MPPT' => $fila['No_rastreadores_MPPT'],
                                                'voc' => $voc, // Agregar voc al array
                                            );
                                        }
                                    }
                                    ?>

                                    <div class="container-fluid mt-4 pt-4 px-4">
                                        <div class="bg-secondary text-center rounded">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-xl-12">
                                                    <div class="bg-secondary rounded h-100 p-1">
                                                        <?php
                                                        foreach ($inversores as $inversor) {
                                                        ?>
                                                            <div class="container-fluid mt-4 pt-4 px-4 m-2">
                                                                <div class="bg-secondary text-center rounded">
                                                                    <div class="row g-4">
                                                                        <div class="col-sm-12 col-xl-12">
                                                                            <div class="bg-secondary rounded h-100 p-1">
                                                                                <table id="myTable">
                                                                                    <tr>
                                                                                        <th colspan="6">Inversor: <?php echo $inversor['Marca'] . ' ' . $inversor['Modelo']; ?></th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th> Circuito FV </th>
                                                                                        <th> Num. de modulos FV </th>
                                                                                        <th>V.Maximo</th>
                                                                                        <th>Potencia</th>
                                                                                        <th>Corriente</th>
                                                                                    </tr>
                                                                                    <?php
                                                                                    $contador_modulos = $inversor['No_rastreadores_MPPT'] * 2; // Calcular el número de circuitos

                                                                                    for ($i = 1; $i <= $contador_modulos; $i++) {
                                                                                        $modulosmax1 = $modulosmax1; // Asigna el valor inicial deseado
                                                                                    ?>
                                                                                        <tr>
                                                                                            <td>Circuito <?php echo $i; ?></td>
                                                                                            <td>
                                                                                                <input value="<?php echo $modulosmax1; ?>" type="number" class="vmaximo-input form-control border-0 rounded-pill my-2 input-sm" onchange="calculateTotal(this)">
                                                                                            </td>
                                                                                            <td class="total-vmax"> ....</td>
                                                                                            <td class="potencia-input"> .... </td>
                                                                                            <td class="corriente-input"> ....</td>
                                                                                        </tr>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>

                                                        <div id="voc" data-value="<?php echo $voc; ?>"></div>
                                                        <div id="Potenciapanel" data-value="<?php echo $Potenciapanel; ?>"></div>
                                                        <div id="Circuit" data-value="<?php echo $Short_Circuit; ?>"></div>
                                                        <script>
                                                            var voc = parseFloat(document.getElementById("voc").getAttribute("data-value"));
                                                            var Potenciapanel = parseFloat(document.getElementById("Potenciapanel").getAttribute("data-value"));
                                                            var Circuit = parseFloat(document.getElementById("Circuit").getAttribute("data-value"));

                                                            function calculateTotal(input) {
                                                                var tableRow = input.closest('tr');
                                                                var numModulos = parseFloat(input.value);
                                                                var vmax = numModulos * voc;
                                                                var potencia = Potenciapanel * numModulos;
                                                                tableRow.querySelector('.total-vmax').textContent = vmax.toFixed(2);
                                                                tableRow.querySelector('.potencia-input').textContent = potencia.toFixed(2);
                                                                tableRow.querySelector('.corriente-input').textContent = Circuit.toFixed(2);
                                                                calculateRowTotal(tableRow.closest('table'));
                                                            }

                                                            // Llama a calculateTotal para calcular los valores iniciales al cargar la página
                                                            var inputs = document.querySelectorAll('.vmaximo-input');
                                                            inputs.forEach(function(input) {
                                                                calculateTotal(input);
                                                            });
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 -->