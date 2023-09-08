let boxSucess = document.querySelector('.boxSucess');
let  body = document.querySelector('body');
setTimeout(()=>{
    boxSucess.style.visibility="visible"; // Mostrar o elemento
    setTimeout(()=>{
        boxSucess.classList.add('boxSucessInput'); // Adicionar classe
        body.classList.add('boxNoMove');
    },500)
},600)

setTimeout(()=>{
    boxSucess.classList.remove('boxSucessInput'); // Remover a class adicionada
    body.classList.remove('boxNoMove'); // Remover class do body
    boxSucess.classList.add('boxSucessOut'); // Adicionar outra classe
    setTimeout(()=>{
        boxSucess.style.visibility="hidden"; // Deixar elemento invisivel
    },1500)
},6500)

