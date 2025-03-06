let infoPessoal = document.getElementById("info-pessoal")
let infoAcademica = document.getElementById("info-academica")
let conhecimento = document.getElementById("conhecimento")
let disponibilidade = document.getElementById("disponibilidade")



/*function mostrarInfoPessoal(){
    infoAcademica.style.display = "none";
    infoPessoal.style.display = "flex";
    conhecimento.style.display = "none"
    disponibilidade.style.display = "none"
}
*/
function mostrarInfoAcademica(){
    conhecimento.style.display = "none";
    infoAcademica.style.display = "flex";
    disponibilidade.style.display = "none"
    
}

function mostrarConhecimento(){
    conhecimento.style.display = "flex"
    infoAcademica.style.display = "none"
    disponibilidade.style.display = "none"

}
function mostrarDisponibilidade(){
    disponibilidade.style.display = "flex"
    infoAcademica.style.display = "none"
    conhecimento.style.display = "none"
    
}

