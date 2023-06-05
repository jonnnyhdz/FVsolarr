function changeTheme() {
  var theme = document.getElementById('theme');
  var style = document.getElementById('style');
  var toggleSwitch = document.getElementById('toggleSwitch');

  // Alternar entre los modos de estilo y guardar la preferencia en el almacenamiento local
  if (toggleSwitch.checked) {
    theme.setAttribute('href', '../css/bootstrap.min.white.css');
    style.setAttribute('href', '../css/stylewhite.css');
    localStorage.setItem('selectedTheme', 'night');
  } else {
    theme.setAttribute('href', '../css/bootstrap.min.css');
    style.setAttribute('href', '../css/style.css');
    localStorage.setItem('selectedTheme', 'day');
  }
}

// Cargar el tema seleccionado al cargar la página
window.addEventListener('DOMContentLoaded', function() {
  var theme = document.getElementById('theme');
  var style = document.getElementById('style');
  var toggleSwitch = document.getElementById('toggleSwitch');
  var body = document.querySelector('body');

  // Agregar la clase para ocultar el contenido
  body.classList.add('hide-content');

  var selectedTheme = localStorage.getItem('selectedTheme');

  // Establecer el tema seleccionado o un tema predeterminado si no hay preferencia guardada
  if (selectedTheme === 'night') {
    toggleSwitch.checked = true;
    theme.setAttribute('href', '../css/bootstrap.min.white.css');
    style.setAttribute('href', '../css/stylewhite.css');
  } else {
    toggleSwitch.checked = false;
    theme.setAttribute('href', '../css/bootstrap.min.css');
    style.setAttribute('href', '../css/style.css');
  }

  // Remover la clase para mostrar el contenido después de un breve retraso
  setTimeout(function() {
    body.classList.remove('hide-content');
  }, 1500);
});
