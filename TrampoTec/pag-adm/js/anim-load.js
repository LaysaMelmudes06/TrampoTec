document.addEventListener("DOMContentLoaded", function() {
    // Simular um carregamento de 2 segundos
    setTimeout(function() {
        // Oculta a tela de carregamento
        document.getElementById("loading").style.display = "none";

        // Exibe a tela de conteúdo
        document.getElementById("content").style.display = "block";
        document.getElementById("content2").style.display = "block";
    }, 2000); // Tempo de espera em milissegundos
});