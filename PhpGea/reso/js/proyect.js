
function  readyBody() {
    document.getElementById("formularioVotos").onsubmit = sendFormulario;
}



function sendFormulario() {

    var hasWarning = false;
    var inputPartido;
    inputPartido = document.getElementById("inputPartido1");
    var i = 1;
    while (inputPartido != null) {
        inputPartido.className = "form-control";
        if (inputPartido.value == 0) {
            hasWarning = true;
            inputPartido.className += " inputWarning";
        }
        i++;
        inputPartido = document.getElementById("inputPartido" + i);
    }

    if (hasWarning) {
        if (!confirm("Se han detectado partidos con un número de votos igual a cero. ¿Desea continuar?"))
            return false;
    }
    return true;
}


