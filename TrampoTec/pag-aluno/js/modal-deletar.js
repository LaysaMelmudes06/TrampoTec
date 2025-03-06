function modalRemover( $idAluno , $elementoAluno , $curso , $elementoCurso , $etec , $elementoEtec  ){
    const myModal = new bootstrap.Modal('#modalExcluir');
    myModal.show();
    document.getElementById($elementoAluno).value = $idAluno;
    document.getElementById($elementoCurso).value = $curso;
    document.getElementById($elementoEtec).value = $etec;
    
    //window.location.href = "./registro.php";
}