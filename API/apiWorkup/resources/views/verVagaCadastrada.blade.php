<h1>Candidatos para a vaga: {{ $vaga->nomeVaga }}</h1>

@if($candidatos->isEmpty())
    <p>Nenhum candidato encontrado para esta vaga.</p>
@else
    <ul>
        @foreach($candidatos as $candidato)
            <li>
                Usuário: {{ $candidato->usuario->nome }} - Status: {{ $candidato->status->tipoStatusVaga }}
                
                <form action="{{ route('candidaturas.aprovar', $candidato->idVagaUsuario) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-success">Aprovar</button>
                </form>

                <form action="{{ route('candidaturas.negar', $candidato->idVagaUsuario) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Negar</button>
                </form>
                
                <form action="{{ route('mensagem.create', ['idUsuario' => $candidato->idUsuario, 'idEmpresa' => $empresa->idEmpresa]) }}" method="GET" style="display:inline;">
    <button type="submit" class="btn btn-danger">Mandar Mensagem</button>
</form>

     




            </li>
        @endforeach
    </ul>
@endif
