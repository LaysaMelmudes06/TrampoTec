
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