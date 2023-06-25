function mostrarOcultarContrasena() {
    var contrasenaInput = document.getElementById("contrasenaInput");
    var toggleIcon = document.querySelector(".toggle-icon");
    
    if (contrasenaInput.type === "password") {
      contrasenaInput.type = "text";
      toggleIcon.innerHTML = '<i class="fa fa-eye-slash"></i>';
    } else {
      contrasenaInput.type = "password";
      toggleIcon.innerHTML = '<i class="fa fa-eye"></i>';
    }
  }