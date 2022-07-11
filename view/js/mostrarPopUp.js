const el = document.getElementById("writeMessagePopUp");
const btnCerrar = document.getElementById("btnCerrar");
const bgOverlay = document.getElementById("backgroundOverlay");
let formAbierto = false;



document.addEventListener("click", e => {
    if (e.target === btnCerrar || e.target === bgOverlay) {
        cerrarForm();
    }
});

function writeMessage() {
    abrirForm();
}

function abrirForm() {
    el.classList.remove("invisible");
    el.classList.add("visible");
    formAbierto = true;
    bgOverlay.style.backgroundColor = "white";
    bgOverlay.style.opacity = "30%";
}

function cerrarForm() {
    el.classList.remove("visible");
    el.classList.add("invisible");
    bgOverlay.style.backgroundColor = "transparent";
    formAbierto = false;
}