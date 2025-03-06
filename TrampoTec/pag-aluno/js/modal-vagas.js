var btn = document.getElementById ('btn')
function openModal(){
    alert ('Você se cadastrou na vaga')
    console.log (1)
}

var button1 = document.getElementById("btn1")
var button2 = document.getElementById("btn2")
var button3 = document.getElementById("btn3")
var modal = document.getElementById("modal")

button1.onclick = function () {
    modal.showModal()
}
button2.onclick = function () {
    modal.showModal()
}
button3.onclick = function () {
    modal.showModal()
}
