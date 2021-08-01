@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Registo De Eventos </div>
                @if (session()->has('error'))
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                        Não Foi Possivel Agendar, Verifique Os Dados
                        </div>
                    </div>
                @endif
                   <div class="card-body">
                        <form action="{{ route('cadastro.evento') }}" method="POST">
                          @csrf
                          <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="" class="form-label">Nome Do Evento *</label>
                                        <input type="text" placeholder="Nome Do Evento" name="nome" class="form-control">
                                        @if ($errors->has('nome'))
                                            <div class="text-danger">
                                                <li>{{ $errors->first('nome') }}</li>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="form-grop mt-3">
                                      <label for="" class="form-label">Descrição Do Evento *</label>
                                      <textarea name="descricao" placeholder="Descrição Do Evento" class="form-control" cols="30" rows="10"></textarea>
                                        @if ($errors->has('descricao'))
                                            <div class="text-danger">
                                                <li>{{ $errors->first('descricao') }}</li>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mt-3">
                                      <label for="" class="form-label">Data Do Evento *</label>
                                        <input type="datetime-local" placeholder="Data Do Evento" name="hora_evento" class="w-25 form-control">
                                        @if ($errors->has('hora_evento'))
                                            <div class="text-danger">
                                                <li>{{ $errors->first('hora_evento') }}</li>
                                            </div>
                                        @endif
                                    </div>

                                      <div class="form-group mt-3">
                                        <input type="hidden" name="qtd_endereco" value="{{ count($enderecos) }}">
                                        <label for="" class="form-label">Endereço Do Evento *</label>
                                        <select name="id_endereco" id="id_endereco" class="form-control w-50" aria-label="Default select example"></select>
                                        @if(isset($enderecos) && count($enderecos) <= 0)
                                          <p class="text-danger mt-3"> <strong>Observação:</strong> Neste momento, não tem nenhum endereço registado, clique <a href="" data-toggle="modal" data-target="#exampleModal">aqui</a> para cadastrar. </p>
                                        @endif
                                        <button onclick="return false;" class="mt-3 btn btn-primary" data-toggle="modal" data-target="#exampleModal">Adicionar Endereço</button>
                                    </div>
                              </div>


                              <div class="d-flex justify-content-center col-12 mt-5">
                                  <a href="/eventos" class="btn btn-secondary mr-3"> Voltar </a>
                                  <button class="btn btn-dark" id="salvar_pessoa"> Gravar </button>
                              </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Registo De Endereço</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div id="formulario_endereco">
                                          <meta name="csrf-token" content="{{ csrf_token() }}">
                                          <div class="form-group">
                                            <label for="">Localidade*</label>
                                              <input type="text" value="" name="localidade" class="form-control" placeholder="Localidade">
                                          </div>

                                          <div class="form-group">
                                            <label for="">Número*</label>
                                            <input type="number" value="" name="numero" class="form-control" placeholder="Número">
                                          </div>

                                          <div class="form-group">
                                            <label for="">Rua*</label>
                                            <input type="text" value="" name="rua" class="form-control" placeholder="Rua">
                                          </div>

                                          <div class="form-group">
                                            <label for="">Zona*</label>
                                            <select name="zona" class="form-control" id="">
                                              <option value="">Selecione</option>
                                              <option value="Urbana">Urbana</option>
                                              <option value="Rural">Rural</option>
                                            </select>
                                          </div>

                                          <div class="form-group">
                                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}" class="form-control" placeholder="Rua">
                                          </div>
                                        </div>

                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" id="cancelar_endereco" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" id="salvar_endereco" class="btn btn-primary">Gravar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/eventos/cadastro.js') }}"></script>
@endsection
</body>

