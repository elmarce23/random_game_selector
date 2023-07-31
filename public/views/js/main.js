document.addEventListener("onload", () => {
    // Al cargar la página
    loadComponents();
});

const inicio = getElementById("Inicio").addEventListener("onclick", openNav(inicio.id));
const add = getElementById("Agregar").addEventListener("onclick", openNav(add.id));
const rand = getElementById("Random").addEventListener("onclick", openNav(rand.id));


function loadComponents() {
    alert("Cargando");
}

function openNav(navName) {
    let i;
    let x = document.getElementsByClassName("nav-open");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    document.getElementById(navName).style.display = "block";
}