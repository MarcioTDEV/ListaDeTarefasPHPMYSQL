const linkAbrirModal = document.querySelector("#modalHeader");
const fecharModal = document.querySelector(".botaoFechar");

const botaoFecharModal = document.querySelector(".botaoFecharModal")

const modal = document.querySelector(".modalDeletarConta")


linkAbrirModal.addEventListener("click", ()=>{
    modal.classList.toggle("show")
})

fecharModal.addEventListener("click", ()=>{
    modal.classList.toggle("show")
})

botaoFecharModal.addEventListener("click", ()=>{
    modal.classList.toggle("show")
})

