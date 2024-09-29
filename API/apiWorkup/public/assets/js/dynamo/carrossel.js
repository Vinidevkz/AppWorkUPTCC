// ESSA FUNÇÃO É UM MÉTODO PARA MUDAR A IMAGEM
function changeImage(src) {
    document.getElementById('mainImage').src = src;
}

// ESSA FUNÇÃO OUVE OS ELEMNTOS COM CLASS .box-img
document.querySelectorAll('.box-img').forEach(element => {
element.addEventListener('click', function() {
// REMOVE A CLASSE E SEUS ATRIBUTOS
document.querySelectorAll('.box-img').forEach(el => el.classList.remove('active'));
//ADICIONA A CLASSE E SEUS ATRIBUTOS
this.classList.add('active');
});
});

