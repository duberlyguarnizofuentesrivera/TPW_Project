const el = document.getElementById("writeMessagePopUp");
const btnCerrar = document.getElementById("btnCerrar");
const bgoverlay = document.getElementById("backgroundOverlay");
let formAbierto = false;

document.addEventListener("click", e => {
    console.log(e.target);
    if (e.target === btnCerrar || e.target === bgoverlay) {
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
    bgoverlay.style.backgroundColor = "white";
    bgoverlay.style.opacity="30%";
}

function cerrarForm() {
    el.classList.remove("visible");
    el.classList.add("invisible");
    bgoverlay.style.backgroundColor = "transparent";
    formAbierto = false;
}