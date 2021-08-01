<?php 

namespace App\Service;

use App\Models\Eventos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class EventosService 
{

   public function listagemEventos () 
   {

     $array = [];
     $id_user = Auth::user()->id;
     $eventos = Eventos::select(
       'eventos.id',
       'eventos.nome',
       'eventos.descricao',
       'eventos.hora_evento',
       'enderecos.localidade',
       'enderecos.rua',
       'enderecos.numero'
     )
      ->join('enderecos', 'eventos.id_endereco', 'enderecos.id')
      ->where('eventos.id_user', $id_user)
      ->get();

      foreach($eventos as $evento) {
        array_push($array, $evento);
      }

      return $array;
   }

    public function showForm () 
    {
      $user = Auth::user()->id;
      $endereco = DB::table('enderecos')->where('id_user', $user)->get();
       
       return [
         'enderecos' => $endereco
       ];
    }


    public function storage ($data) 
    {
        try {

          DB::beginTransaction();
           
          $data['hora_evento'] = str_replace('T', ' ', $data['hora_evento']);

          $evento = new Eventos();
          $evento->fill($data);
          $evento->save();

          DB::commit();

          Log::info(array('acao' => 'Cadastro De Evento', 'usuario' => Auth::user()));
          return $evento;
      } catch(\Exception $e ){
          Log::info(array('acao' => 'Cadastro De Evento', 'usuario' => Auth::user()));
          return false;
      }
    }

    public function delete ($id) 
    {
        try {

          DB::beginTransaction();
           
          $evento = Eventos::where('id', $id);
          if($evento) {
            $evento->delete();
          }

          DB::commit();

          Log::info(array('acao' => 'Exclusão De Evento', 'id' => $id));
          return array('title' => 'Exclusão Realizada', 'text' => '', 'type' => 'success');
      } catch(\Exception $e ){
          Log::info(array('acao' => 'Exclusão De Evento', 'id' => $id));
          return array('title' => 'Error Ao Excluir Evento', 'text' => '', 'type' => 'error');
      }
    }
}