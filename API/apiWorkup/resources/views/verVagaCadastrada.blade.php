    <h1>Candidatos para a vaga: {{ $vaga->nomeVaga }}</h1>

@if($candidatos->isEmpty())
    <p>Nenhum candidato encontrado para esta vaga.</p>
@else
    <div class="list-group">
        @foreach($candidatos as $candidato)
            <div class="list-group-item">
                <h5>Usuário: {{ $candidato->usuario->nomeUsuario }}</h5>
                <p>Status: {{ $candidato->status->tipoStatusVaga }}</p>
                
                <div class="btn-group" role="group">
                    <form action="{{ route('candidaturas.aprovar', $candidato->idVagaUsuario) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Aprovar</button>
                    </form>

                    <form action="{{ route('candidaturas.negar', $candidato->idVagaUsuario) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Negar</button>
                    </form>
                    
                    <form action="{{ route('mensagem.create', ['idUsuario' => $candidato->idUsuario, 'idEmpresa' => $empresa->idEmpresa]) }}" method="GET" style="display:inline;">
                        <button type="submit" class="btn btn-info">Mandar Mensagem</button>
                    </form>

                    <form action="{{ route('mensagem.indexUsuarioUnico', ['idUsuario' => $candidato->idUsuario]) }}" method="GET" style="display:inline;">
                        <button type="submit" class="btn btn-secondary">Ver Mensagens</button>
                    </form>

                    <button type="button" class="btn btn-warning" onclick="toggleDenunciaForm('{{ $candidato->idUsuario }}')">
                        Denunciar
                    </button>
                </div>

                <!-- Formulário de Denúncia -->
                <div id="denunciaForm{{ $candidato->idUsuario }}" class="denuncia-form" style="display:none; margin-top: 10px;">
                    <form action="{{ route('denunciar.usuario') }}" method="POST">
                        @csrf
                        <input type="hidden" name="idUsuario" value="{{ $candidato->idUsuario }}">
                        <input type="hidden" name="idStatus" value="3">
                        <input type="hidden" name="idEmpresa" value="{{ $empresa->idEmpresa }}"> <!-- Adicione aqui -->
                        <div class="form-group">
                            <label for="motivo{{ $candidato->idUsuario }}">Motivo da Denúncia</label>
                            <textarea class="form-control" id="motivo{{ $candidato->idUsuario }}" name="motivo" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-danger">Denunciar</button>
                        <button type="button" class="btn btn-secondary" onclick="toggleDenunciaForm('{{ $candidato->idUsuario }}')">Cancelar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

<!-- Include Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function toggleDenunciaForm(userId) {
    var form = document.getElementById('denunciaForm' + userId);
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}
</script>
