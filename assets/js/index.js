let boxSucess = document.querySelector('.boxSucess');
setTimeout(()=>{
    boxSucess.style.display="block"; // Mostrar o elemento
    setTimeout(()=>{
        boxSucess.classList.add('boxSucessInput'); // Adicionar classe
    },500)
},1000)

setTimeout(()=>{
    boxSucess.classList.remove('boxSucessInput'); // Remover a class adicionada
    boxSucess.classList.add('boxSucessOut'); // Adicionar outra classe
    setTimeout(()=>{
        boxSucess.style.display="none"; // Deixar elemento invisivel
    },1500)
},8500)

