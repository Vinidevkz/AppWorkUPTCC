// Seleciona os elementos
const btnAbrirModal = document.getElementById("btnAbrirModal");
const modalSobreNos = document.getElementById("modalSobreNos");
const btnFecharModal = document.getElementById("btnFecharModal");

// Função para abrir o modal
btnAbrirModal.addEventListener("click", () => {
    modalSobreNos.style.display = "flex";
});

// Função para fechar o modal
btnFecharModal.addEventListener("click", () => {
    modalSobreNos.style.display = "none";
});

// Fechar o modal ao clicar fora do conteúdo modal
window.addEventListener("click", (e) => {
    if (e.target === modalSobreNos) {
        modalSobreNos.style.display = "none";
    }
});



