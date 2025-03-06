/*function habInput() {
    var inputNome = document.getElementById('inputNome')
    var inputNasc = document.getElementById('inputNasc')
    var inputCpf = document.getElementById('inputCpf')
    var inputCelular = document.getElementById('inputCelular')
    var inputTelefone = document.getElementById('inputTelefone')
    var inputLogradouro = document.getElementById('inputLogradouro')
    var inputBairro = document.getElementById('inputBairro')
    var inputEstado = document.getElementById('inputEstado')
    var inputCep = document.getElementById('inputCep')
    var inputNumero = document.getElementById('inputNumero')
    var inputComplemento = document.getElementById('inputComplemento')
    var btnEditar = document.querySelector('.btn-editar')
    var btnSalvar = document.querySelector('.btn-salvar')
    var allInput = document.getElementsByTagName("input");

    if (inputNome.disabled) {
        inputNome.disabled = false
        inputNasc.disabled = false
        inputCpf.disabled = false
        inputCelular.disabled = false
        inputTelefone.disabled = false
        inputLogradouro.disabled = false
        inputBairro.disabled = false
        inputEstado.disabled = false
        inputCep.disabled = false
        inputNumero.disabled = false
        inputComplemento.disabled = false
        allInput.style.backgroundColor = 'black'
        btnSalvar.style.display = 'flex'
        btnEditar.style.display = 'none'
        console.log("habilitar")

    } else {
        
        btnEditar.style.display = 'none'
        inputNome.disabled = true
        inputNome.disabled = true
        inputNasc.disabled = true
        inputCpf.disabled = true
        inputCelular.disabled = true
        inputTelefone.disabled = true
        inputLogradouro.disabled = true
        inputBairro.disabled = true
        inputEstado.disabled = true
        inputCep.disabled = true
        inputNumero.disabled = true
        inputComplemento.disabled = true
        console.log("desabilitar")
    }
}*/

function habInput() {
    var allInput = document.getElementsByTagName("input");
    var btnSalvar = document.querySelector('.btn-salvar');
    var btnEditar = document.querySelector('.btn-editar');
    
    if (allInput[0].disabled) { // Verifique o primeiro input para determinar o estado
        for (var i = 0; i < allInput.length; i++) {
            allInput[i].disabled = false;
            allInput[i].style.border = '2px solid #000';
            allInput[i].style.borderRadius = '5px';
            
           
        }
        btnSalvar.style.display = 'flex';
        btnEditar.style.display = 'none';

        console.log("habilitar");
    } else {
        btnEditar.style.display = 'block';
        for (var i = 0; i < allInput.length; i++) {
            allInput[i].disabled = true;
            allInput[i].style.backgroundColor = ''; 
        }
        console.log("desabilitar");
    }
}