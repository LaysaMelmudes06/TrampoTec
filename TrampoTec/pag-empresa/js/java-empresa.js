

function modalseta(){
    
var modalseta=  document.getElementById('abrircandidato')
var modalcandidatoremarcar=  document.getElementById('candidato')

var setabaixo=document.getElementById('setabaixo')

if (modalseta.style.display == 'none'){
    modalcandidatoremarcar.style.display='none'            
     modalseta.style.display = 'block'
     setabaixo.style.transform='rotatex(180deg)'
     setabaixo.style.transitionDuration='0.2s'
     

}else if (modalseta.style.display == 'block'){
    modalcandidatoremarcar.style.display='none'
    modalseta.style.display='none'
    setabaixo.style.transform='rotatex(0deg)'
    setabaixo.style.transitionDuration='0.2s'
    
}
 else{
    modalseta.style.display = 'block'    
    modalcandidatoremarcar.style.display='none'    
    setabaixo.style.transform='rotatex(180deg)'
    setabaixo.style.transitionDuration='0.2s'
}

}


function modalcandidatoremarcar(){
    
var modalcandidatoremarcar=  document.getElementById('candidato')

if (modalcandidatoremarcar.style.display == 'none'){
 modalcandidatoremarcar.style.display = 'block'

}else if (modalcandidatoremarcar.style.display == 'block'){
modalcandidatoremarcar.style.display='none'
}
else{
modalcandidatoremarcar.style.display = 'block'    

}

}

function clickmenu(){
        if (itens.style.display == 'none'){
            itens.style.display = 'block'
            main.style.display ='flex'
        } else if (itens.style.display == 'block'){
            itens.style.display = 'none'
            main.style.display ='block'

        }else{
            itens.style.display = 'block'
            main.style.display ='flex'
           
        }
    }

    function clickmenu2(){
        if (itens2.style.display == 'none'){
            itens2.style.display = 'block'
            main.style.display ='flex'
        } else if (itens2.style.display == 'block'){
            itens2.style.display = 'none'
            main.style.display ='block'
        }else{
            itens2.style.display = 'block'
            main.style.display ='flex'
           
        }
    }


    function modalreagendar(){
    
        var modalreagendar=  document.getElementById('reagendar')
   

        if (modalreagendar.style.display == 'none'){
            modalreagendar.style.display = 'block'
        
        }else if (modalreagendar.style.display == 'block'){
            modalreagendar.style.display='none'
        }
        else{
            modalreagendar.style.display = 'block'    
        
        }
        
        }


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

var button1 = document.getElementById("btn1")
            var button2 = document.getElementById("btn2")
            var button3 = document.getElementById("btn3")
            var indicar = document.getElementById('abrir-indicacao')
            var body = document.getElementsByTagName('body')
            button1.onclick = function (){
                indicar.showModal()
            }
        

            function modalrequisito(){
    
                var requisitos=  document.getElementById('requisito')
           
        
                if (requisitos.style.display == 'none'){
                    requisitos.style.display = 'flex'
                
                }else if (requisitos.style.display == 'flex'){
                    requisitos.style.display='none'
                }
                else{
                    requisitos.style.display = 'flex'    
                
                }
                
                }




            
                