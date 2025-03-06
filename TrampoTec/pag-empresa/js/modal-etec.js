var filtro = document.getElementById('abrir-filtro')
function abrirFiltro() {
    if (filtro.style.display == "none") {
        filtro.style.display = "block"
        filtro.style.transform = "translateY(25px)"
        filtro.style.transitionDuration = '5s'
    }
    else if (filtro.style.display = "block") {
        filtro.style.display = "none"
    }
    else {
        filtro.style.display = "block"
    }

    //modal requisitos e areas


}