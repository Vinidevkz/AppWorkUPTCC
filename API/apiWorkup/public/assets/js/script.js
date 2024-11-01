const $html = document.querySelector('html')
const $button = document.querySelector('#darkmode')

$button.onclick = () => {
    $html.classList.toggle('dark-mode');
};

document.getElementById('prazoVaga').addEventListener('keypress', function(event) {
    const char = String.fromCharCode(event.which);
    if (!/[0-9\/]/.test(char)) {
        event.preventDefault(); // Impede a digitação de caracteres não numéricos
    }
});

document.querySelector('form').addEventListener('submit', function(event) {
    const input = document.getElementById('prazoVaga');
    const dateParts = input.value.split('/');

    if (dateParts.length === 3) {
        const formattedDate = `${dateParts[2]}-${dateParts[1]}-${dateParts[0]}`;
        input.value = formattedDate; // Define o valor formatado no input
    } else {
        alert('Por favor, insira a data no formato dd/mm/yyyy');
        event.preventDefault();
    }
});

