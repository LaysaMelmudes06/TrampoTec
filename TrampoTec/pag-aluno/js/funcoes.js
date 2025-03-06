let selectEtec = document.getElementById('nome-etec');


selectEtec.onchange = () => {
    let selectCurso = document.getElementById('curso');
    let valor = selectEtec.value;
    fetch("selectCurso.php?nome-etec=" + valor )
    .then(response => {
        return response.text();
    })
    .then(texto => {
        selectCurso.innerHTML = texto;
    }) ;
  
}