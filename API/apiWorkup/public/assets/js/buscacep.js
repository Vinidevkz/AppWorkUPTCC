function verificarCEP() {
    const cep = document.getElementById('cepEmpresa').value.replace(/\D/g, ''); // Remove caracteres não numéricos
    if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
        buscarEndereco(cep);
    }
}

function buscarEndereco(cep) {
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
