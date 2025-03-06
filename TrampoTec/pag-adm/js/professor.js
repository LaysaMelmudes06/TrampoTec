
var btnSignin = document.querySelector("#signin");
var btnSignup = document.querySelector("#signup");

var body = document.querySelector("body");


btnSignin.addEventListener("click",  ()=> {
   body.className = "sign-in-js"; 
});

btnSignup.addEventListener("click",  ()=> {
    body.className = "sign-up-js";
})


function mostrarSenha(){
    var senha = document.getElementById('password')
    var icon = document.getElementById('icon')

    if(senha.type === 'password'){
        senha.setAttribute('type','text')
        icon.classList.replace('fa-eye','fa-eye-slash')
    }else{
        senha.setAttribute('type','password')
        icon.classList.replace('fa-eye-slash','fa-eye')
    }
}
function mostrarSenha2(){
    var senha = document.getElementById('password2')
    var icon = document.getElementById('icon2')

    if(senha.type === 'password'){
        senha.setAttribute('type','text')
        icon.classList.replace('fa-eye','fa-eye-slash')
    }else{
        senha.setAttribute('type','password')
        icon.classList.replace('fa-eye-slash','fa-eye')
    }
}