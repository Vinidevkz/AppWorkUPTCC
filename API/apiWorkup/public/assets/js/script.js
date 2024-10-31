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

function buscarEndereco() {
    const cep = document.getElementById('cepEmpresa').value.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    // Preenche os campos com os dados retornados
                    document.getElementById('logradouroEmpresa').value = data.logradouro;
                    document.getElementById('cidadeEmpresa').value = data.localidade;
                    document.getElementById('estadoEmpresa').value = data.uf;

                    // Habilita os campos de endereço, cidade e estado
                    document.getElementById('logradouroEmpresa').disabled = false;
                    document.getElementById('cidadeEmpresa').disabled = false;
                    document.getElementById('estadoEmpresa').disabled = false;
                } else {
                    alert('CEP não encontrado.');
                }
            })
            .catch(error => {
                console.error('Erro ao buscar o endereço:', error);
            });
    }

   
}