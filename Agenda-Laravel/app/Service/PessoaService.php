<?php 


namespace App\Service;

use App\Models\Pessoa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PessoaService 
{

    public function index () 
    {
        $id = Auth::user()->id;
        $perfil = Pessoa::where('id_user', $id)->first();
        return [
            'nome' => $perfil->nome ?? '',
            'sobre_nome' => $perfil->sobre_nome ?? '',
            'telefone' => $perfil->telefone ?? '',
            'cpf' => $perfil->cpf ?? '',
            'apelido' => $perfil->apelido ?? '',
            'data_nascimento' => $perfil->data_nascimento ?? ''
        ];
    }

    public function storage ($data) 
    {
        try {

            DB::beginTransaction();

            $user  = Auth::user()->id;
            if($user) $data['id_user'] = $user;

            $pessoa = new Pessoa();
            $pessoa->fill($data);
            $pessoa->save();

            DB::commit();

            return $pessoa;
        } catch(\Exception $e ){
            echo $e->getMessage();
        }
    }
    
}