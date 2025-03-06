function modalrequisito(){
    console.log("oi");
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
  