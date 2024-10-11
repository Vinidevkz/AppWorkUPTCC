<form action="{{ route('mensagem.store') }}" method="POST">
    @csrf
    <input type="hidden" name="idUsuario" value="{{ $idUsuario }}">
    <input type="hidden" name="idEmpresa" value="{{ $idEmpresa }}">
    
    <div class="form-group">
        <label for="mensagem">Mensagem:</label>
        <textarea name="mensagem" id="mensagem" class="form-control" required></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
</form>
