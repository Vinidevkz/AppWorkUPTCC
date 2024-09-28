@extends('layouts.main')

@section('title', 'Contato')

@section('content')
<body>
<section class="secao contato" id="contato">

<div class="container container-contato">
    <div class="row" style="height: 100%;">

        <div class="col contato-div-1">
        </div>

        <div class="col contato-div-2">
            <div class="box-wrap">
                <h1 class="titulo">Fale Conosco!</h1>

                <div class="box-contato">

                    <div class="wrap-input">

                        <div class="wrap-nome">
                            <span>Insira seu nome:</span>
                            <input class="input" type="text">
                        </div>
                        
                        <div class="wrap-email">
                            <span>Insira seu email:</span>
                                <input class="input" type="text">
                        </div>
                        
                        <div class="wrap-msg">
                            <span>E sua mensagem:</span>
                            <input class="msg-box" class="msg-box" type="text">
                        </div>

                        <div class="wrap-btn-contato">
                            <input class="btn-enviar" type="submit">
                            <span class="fs-4 fw-bold">ou</span>
                            <button class="btn-problema" type="submit">Relatar Problema</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>
</div>

</section>
</body>

@endsection