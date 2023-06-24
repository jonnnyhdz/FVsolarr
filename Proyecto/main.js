
function eliminar(id) {
     
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });

    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, eliminarlo',
        cancelButtonText: 'No, cancelar',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            );

            // Retrasar la redirección después de 2 segundos
            setTimeout(function() {
                window.location.href = 'actions/Eliminar.php?ID_PROYECTO=' + id;
            }, 2000);
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelado',
                'Tu archivo está seguro :)',
                'error'
            );
        }
    });
} 

function editarC(id) {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success m-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    });
    swalWithBootstrapButtons.fire({
        title: '¿Estás seguro?',
        text: "¡Quieres editar consumo?!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, editar',
        cancelButtonText: 'No, editar',
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
                'Redirigiendo......!',
                'Espero un momento',
                'success'
            )
            // Retrasar la redirección después de 2 segundos
            setTimeout(function() {
                window.location.href = 'Validation/V_consumoE.php?ID_PROYECTO=' + id;
            }, 2000);
        } else if (result.dismiss === Swal.DismissReason.cancel) {
        }
    });
}

function editarN(id, event) {

    event.preventDefault(); // Detener el envío del formulario
    event.stopPropagation(); // Detener la propagación del evento

    Swal.fire({
        title: 'Nombre nuevo?',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        showLoaderOnConfirm: true,
        preConfirm: (nombre) => {
            if (nombre.trim() === '') {
                Swal.showValidationMessage('Por favor, ingresa un nombre válido');
            } else {
                return nombre;
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            const nombreProyecto = result.value;
            const form = document.getElementById('formCrearProyecto');
            const idUsuario = form.querySelector('input[name="id_usuario"]').value;
            form.action = 'actions/Editar.php?ID_PROYECTO=' + id; // Establecer la acción del formulario aquí
            const inputNombre = document.createElement('input');
            inputNombre.type = 'hidden';
            inputNombre.name = 'nombreProyecto';
            inputNombre.value = nombreProyecto;
            form.appendChild(inputNombre);
            /* usuario */
            const inputUsuario = document.createElement('input');
            inputUsuario.type = 'hidden';
            inputUsuario.name = 'id_usuario';
            inputUsuario.value = idUsuario;
            form.appendChild(inputUsuario);
            form.submit();
        }
    });
}

function guardarnombre(event) {
    event.preventDefault(); // Detener el envío del formulario
    event.stopPropagation(); // Detener la propagación del evento

    Swal.fire({
        title: 'Nombre del proyecto',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        showLoaderOnConfirm: true,
        preConfirm: (nombre) => {
            if (nombre.trim() === '') {
                Swal.showValidationMessage('Por favor, ingresa un nombre válido');
            } else {
                return nombre;
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            const nombreProyecto = result.value;
            const form = document.getElementById('formCrearProyecto');
            const idUsuario = form.querySelector('input[name="id_usuario"]').value;
            form.action = 'actions/guardarProyecto.php'; // Establecer la acción del formulario aquí
            const inputNombre = document.createElement('input');
            inputNombre.type = 'hidden';
            inputNombre.name = 'nombreProyecto';
            inputNombre.value = nombreProyecto;
            form.appendChild(inputNombre);
            /* usuario */
            const inputUsuario = document.createElement('input');
            inputUsuario.type = 'hidden';
            inputUsuario.name = 'id_usuario';
            inputUsuario.value = idUsuario;
            form.appendChild(inputUsuario);

            form.submit();
        }
    });
}