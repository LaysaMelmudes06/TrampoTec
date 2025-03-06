/*function openModal() {
    var modal = document.getElementById('modal-card')
    if (modal.style.display == 'none') {
        modal.style.display = 'block'
    } else if (modal.style.display == 'block') {
        modal.style.display = 'none'
    } else {
        modal.style.display = 'block'
    }
}*/

var filtro = document.getElementById('abrir-filtro')
        function abrirFiltro(){
           if(filtro.style.display == "none"){
            filtro.style.display="block"
            filtro.style.transform="translateY(25px)"
            filtro.style.transitionDuration='5s'
        }
        else if(filtro.style.display="block"){
        filtro.style.display="none"
    }
    else{
        filtro.style.display="block"
    }
}