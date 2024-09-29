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
            </li>
        @endforeach
    </ul>
@endif
