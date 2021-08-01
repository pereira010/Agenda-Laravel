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
                    <form action="{{ route('cadastro.pessoa') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" placeholder="Nome" name="nome" class="form-control">
                                    @if ($errors->has('nome'))
                                        <div class="text-danger">
                                            <li>{{ $errors->first('nome') }}</li>
                                        </div>
                                    @endif
                                </div>


                                <div class="form-grop mt-3">
                                    <input type="number" name="telefone" placeholder="Telefone" class="form-control">
                                    @if ($errors->has('telefone'))
                                        <div class="text-danger">
                                            <li>{{ $errors->first('telefone') }}</li>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mt-3">
                                    <input type="text" placeholder="Apelido" name="apelido" class="form-control">
                                    @if ($errors->has('apelido'))
                                        <div class="text-danger">
                                            <li>{{ $errors->first('apelido') }}</li>
                                        </div>
                                    @endif
                                </div>
                           </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="sobre_nome" placeholder="Sobre o Nome" class="form-control">
                                    @if ($errors->has('sobre_nome'))
                                        <div class="text-danger">
                                            <li>{{ $errors->first('sobre_nome') }}</li>
                                        </div>
                                    @endif
                                </div>

                                <div class="forom-group mt-3">
                                    <input type="integer" class="form-control" name="cpf" placeholder="CPF">
                                    @if ($errors->has('cpf'))
                                        <div class="text-danger">
                                            <li>{{ $errors->first('cpf') }}</li>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mt-3">
                                    <input type="date" placeholder="Data De Nascimento" name="data_nascimento" class="form-control">
                                    @if ($errors->has('data_nascimento'))
                                        <div class="text-danger">
                                            <li>{{ $errors->first('data_nascimento') }}</li>
                                        </div>
                                    @endif
                                </div>

                             </div>

                           <div class="d-flex justify-content-center col-12 mt-5">
                               <a href="/pessoa" class="btn btn-secondary mr-3"> Voltar </a>
                               <button class="btn btn-dark" id="salvar_pessoa"> Gravar </button>
                           </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
