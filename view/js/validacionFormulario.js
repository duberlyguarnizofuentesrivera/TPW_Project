nombre = document.getElementById("txtNombre");
apellido = document.getElementById("txtApellido");
pais = document.getElementById("cmbPais");
mensaje = document.getElementById("txtMensaje");

nombre.addEventListener("keyup", validarForm);
apellido.addEventListener("keyup", validarForm);
pais.addEventListener("change", validarForm);
mensaje.addEventListener("keyup", validarForm);

function validarForm() {
    let nombre;
    let apellido;
    let pais;
    let mensaje;
    let error = false;
    if (formAbierto) {
        nombre = document.getElementById("txtNombre").value;
        apellido = document.getElementById("txtApellido").value;
        pais = document.getElementById("cmbPais").value;
        mensaje = document.getElementById("txtMensaje").value;

        if (contieneCaracteresEspeciales(nombre)) {
            document.getElementById("txtNombre").style.borderColor = "red";
            document.getElementById("nombreErrorSpan").innerHTML = "Caracteres no validos!";
            error = true;
        } else {
            document.getElementById("txtNombre").style.borderColor = "gray";
            document.getElementById("nombreErrorSpan").innerHTML = "";
        }
        if (contieneCaracteresEspeciales(apellido)) {
            document.getElementById("txtApellido").style.borderColor = "red";
            document.getElementById("apellidoErrorSpan").innerHTML = "caracteres no validos!";
            error = true;
        } else {
            document.getElementById("txtApellido").style.borderColor = "gray";
            document.getElementById("apellidoErrorSpan").innerHTML = "";
        }
        if (mensajeContieneNombres(mensaje, nombre, apellido)) {
            document.getElementById("txtMensaje").style.borderColor = "red";
            document.getElementById("mensajeErrorSpan").innerHTML = "No debes incluir información sensible (nombres del destinatario)";
            error = true;
        } else if (mensajeContieneCaracteresEspeciales(mensaje)) {
            document.getElementById("txtMensaje").style.borderColor = "red";
            document.getElementById("mensajeErrorSpan").innerHTML = "No debes incluir caracteres especiales!";
        } else {
            document.getElementById("txtMensaje").style.borderColor = "gray";
            document.getElementById("mensajeErrorSpan").innerHTML = "";
        }
    }
    document.getElementById("btnCrearMensaje").disabled = error;
}

function contieneCaracteresEspeciales(texto) {
    const format = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~\d]/;
    return format.test(texto);

}

//pasamos a minúsculas, creamos un array para nombre y apellido e iteramos para ver si mensaje contiene elementos del array
function mensajeContieneNombres(mensaje, nombre, apellido) {
    if (mensaje.length > 1) {
        let arrayNombre = nombre.toLowerCase().split(" ");
        let arrayApellido = apellido.toLowerCase().split(" ");
        for (const nombre of arrayNombre) {
            if (mensaje.toLowerCase().includes(nombre)) {
                return true;
            }
        }
        for (const apellido of arrayApellido) {
            if (mensaje.toLowerCase().includes(apellido)) {
                return true;
            }
        }
    }
    return false;
}

function mensajeContieneCaracteresEspeciales(mensaje) {
    const format = /[`@^&_\\|<>\/~]/;
    return format.test(mensaje);
}
