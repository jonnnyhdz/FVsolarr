function generarFechas() {
  var fechaFacturacion = new Date(document.getElementById("fechaFacturacion").value);
  var tipoTarifa = document.getElementById("tipoTarifa").value;
  var tipoServicio = document.getElementById("tipoServicio").value;
  var fechasGeneradas = [];


  var titulos = "<t><th>Fecha</th>";
  if (
    tipoServicio === "1" ||
    tipoServicio === "1A" ||
    tipoServicio === "1B" ||
    tipoServicio === "1C" ||
    tipoServicio === "1D" ||
    tipoServicio === "1F" ||
    tipoServicio === "DAC"
  ) {
    titulos += "<th>KWh</th>";
  } else if (
    tipoServicio === "PDBT" ||
    tipoServicio === "GDBT" ||
    tipoServicio === "RABT" ||
    tipoServicio === "GDMTO" ||
    tipoServicio === "GDMTH" ||
    tipoServicio === "RAMT"
  ) {
    if (tipoTarifa === "mensual" || tipoTarifa === "bimensual") {
      titulos += "<th>KWh</th><th>KW</th><th>Fp</th>";
    } else {
      titulos += "<th>KWh</th>";
    }
  }
  titulos += "</tr>";
  fechasGeneradas.push(titulos);

  if (tipoTarifa === "mensual") {
    for (var i = 0; i < 12; i++) {
      var mesActual = getMonthName(fechaFacturacion.getMonth()) + " " + fechaFacturacion.getFullYear();
      fechaFacturacion.setMonth(fechaFacturacion.getMonth() - 1);

      var fechaTexto = mesActual;
      var fila = "<tr><td>" + fechaTexto + "</td>";
      if (
        tipoServicio === "PDBT" ||
        tipoServicio === "GDBT" ||
        tipoServicio === "RABT" ||
        tipoServicio === "GDMTO" ||
        tipoServicio === "GDMTH" ||
        tipoServicio === "RAMT"
      ) {
        fila +=
          "<td><input class='is-valid form-control' type='number' name='kwh[]' required></td><td><input class='form-control' type='number' name='kw[]' required></td><td><input class='form-control'  type='number' name='fp[]' required></td>";
      } else {
        fila += "<td><input class='form-control' type='number' name='kwh[]' required></td>";
      }
      fila += "</tr>";
      fechasGeneradas.push(fila);
    }
  } else if (tipoTarifa === "bimensual") {
    for (var i = 0; i < 6; i++) {
      var mesActual = getMonthName(fechaFacturacion.getMonth()) + " " + fechaFacturacion.getFullYear();
      fechaFacturacion.setMonth(fechaFacturacion.getMonth() - 2);
      var mesAnterior = getMonthName(fechaFacturacion.getMonth()) + " " + fechaFacturacion.getFullYear();

      var fechaTexto = mesAnterior + " - " + mesActual;
      var fila = "<tr><td>" + fechaTexto + "</td>";

      if (
        tipoServicio === "PDBT" ||
        tipoServicio === "GDBT" ||
        tipoServicio === "RABT" ||
        tipoServicio === "GDMTO" ||
        tipoServicio === "GDMTH" ||
        tipoServicio === "RAMT"
      ) {
        fila +=
          "<td><input class='form-control' type='number' name='kwh[]' required></td><td><input class='form-control'  type='number' name='kw[]' required></td><td><input class='form-control'  type='number' name='fp[]' required></td>";
      } else {
        fila += "<td><input class='form-control' type='number' name='kwh[]' required></td>";
      }

      fila += "</tr>";
      fechasGeneradas.push(fila);
    }
  }

  var resultado = document.getElementById("resultado");
  resultado.innerHTML = "<table>" + fechasGeneradas.join("") + "</table>";
}

// Obtener nombre del mes en español
function getMonthName(monthIndex) {
  var meses = [
    "enero", "febrero", "marzo", "abril", "mayo", "junio",
    "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"
  ];

  return meses[monthIndex];
}

