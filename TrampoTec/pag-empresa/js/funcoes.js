let selectCurso = document.getElementById('curso');


selectCurso.onchange = () => {
    let selectArea = document.getElementById('area');
    let valor = selectCurso.value;
    fetch("beck-end/cadastroVaga/selectAreaVaga.php?curso=" + valor)
    .then( response => {
        return response.text();
         })
        .then(texto =>{
            selectArea.innerHTML = texto;

        });
    };
    