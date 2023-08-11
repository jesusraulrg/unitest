function cambiarTexto() {
    var titulo = document.getElementById("titulo");
    var texto = document.getElementById("texto");

    titulo.textContent = "¡Texto cambiado!";
    texto.textContent = "Ahora el cuadro es interactivo.";
}

function agrandaCuadro() {
    var cuadro = document.querySelector(".cuadro");
    cuadro.style.transform = "scale(1.1)";
}

function restauraCuadro() {
    var cuadro = document.querySelector(".cuadro");
    cuadro.style.transform = "scale(1)";
}