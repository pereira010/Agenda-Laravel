@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Atualização Do Pefil </div>
                @if (session()->has('success'))
                    <div class="card-header bg-success text-white"> {{ session()->get('success') }} </div>
                @elseif(session()->has('error'))
                    <div class="card-header bg-danger text-white"> {{ session()->get('error') }} </div>
                @endif

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" @if($nome) disabled @endif placeholder="Nome" name="nome" class="form-control" value="{{ $nome ?? '' }}">
                            </div>


                            <div class="form-grop mt-3">
                                <input type="number" @if($telefone) disabled @endif name="telefone" placeholder="Telefone" class="form-control" value="{{ $telefone ?? '' }}">
                            </div>

                            <div class="form-group mt-3">
                                <input type="text" @if($apelido || $apelido != '') disabled @endif placeholder="Apelido" name="apelido" class="form-control" value="{{ $apelido ?? '' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" @if($sobre_nome) disabled @endif name="sobre_nome" placeholder="Sobre o Nome" class="form-control" value="{{ $sobre_nome ?? '' }}">
                            </div>

                            <div class="forom-group mt-3">
                                <input type="integer" @if($cpf || $cpf != '') disabled @endif class="form-control" name="cpf" placeholder="CC" value="{{ $cpf ?? '' }}">
                            </div>

                            <div class="form-group mt-3">
                                <input type="date" @if($data_nascimento) disabled @endif placeholder="Data De Nascimento" name="data_nascimento" class="form-control" value="{{ $data_nascimento ?? '' }}">
                            </div>

                            </div>

                        <div class="d-flex justify-content-center col-12 mt-5">
                            <a href="/pessoa/create" class="btn btn-dark" id="salvar_pessoa"> Atualizar </a href="/pessoa/create">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
