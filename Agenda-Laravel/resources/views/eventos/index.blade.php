@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Listagem De Eventos </div>
                @if (session()->has('success'))
                    <div class="card bg-success text-white">
                        <div class="card-body">
                        Evento Agendado Com Sucesso
                        </div>
                    </div>
                @endif

                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark text-center">
                          <tr>
                            <th scope="col">Data Do Evento</th>
                            <th scope="col">Nome Do Evento</th>
                            <th scope="col">Descrição Do Evento</th>
                            <th scope="col">Local</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>


                        <tbody class="text-center">
                            @foreach ($eventos as $evento)
                                <tr>
                                    <th> {{ $evento->hora_evento }} </th>
                                    <td> {{ $evento->nome }} </td>
                                    <td> {{ $evento->descricao }} </td>
                                    <td><strong>Bairro</strong> {{ $evento->localidade }} - <strong>N°</strong> {{ $evento->numero }} - <strong>Rua</strong> {{ $evento->rua }} </td>
                                    <td> 
                                        <button title="Excluir Evento"  data-id="{{ $evento->id }}" class="excluir_evento btn btn-danger"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16"> <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/> </svg> </button> 
                                        <button data-toggle="modal" data-target="#exampleModalCenter" title="Adicionar Pessoas" class="btn btn-primary"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16"> <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/> <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/> </svg> </button> 
                                        <button class="btn btn-info" title="Visualizar Convidados"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"> <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/> </svg> </button>
                                    </td>
                                    <meta name="csrf-token" content="{{ csrf_token() }}">
                                </tr>
                            @endforeach
                        </tbody>
                        
                      </table>
                      @if (count($eventos) <= 0)
                        <div class="text-center">
                            <h4>Nenhum Evento Agendado</h4>
                        </div>
                     @endif
                     
                    <!-- Modal de cadastro de convidados -->
                    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Convidar Pessoas</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-bordered">
                                    <thead class="thead-dark text-center">
                                        <tr>
                                            <th scope="col">Data Do Evento</th>
                                            <th scope="col">Nome Do Evento</th>
                                            <th scope="col">Descrição Do Evento</th>
                                            <th scope="col">Local</th>
                                            <th scope="col">Ação</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            </div>
                        </div>
                    </div>

                     <div class="text-center mt-5">
                         <a href="/eventos/create" class="btn btn-dark">Agendar Evento</a>
                     </div>
        
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/eventos/index.js') }}"></script> 
@endsection