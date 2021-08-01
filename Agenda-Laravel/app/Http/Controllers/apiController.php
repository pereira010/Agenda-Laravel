<?php //////////testar pois não está bem - apicontroller - web.php - eventoscontroller

namespace App\Http\Controllers;

use App\Models\Eventos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiController extends Controller
{
    public function getAllPost()
    {
        $response = HTTP::get("https://jsonplaceholder.typicode.com/posts");
        return $response->json();
       // dd($response->json());
    }

    public function getSinglePost($id)
    {
        $response = HTTP::get("https://jsonplaceholder.typicode.com/posts/".$id);
        return $response->json();
       // dd($response->json());
    }

    public function addPost()
    {
        $post = HTTP::post("http://localhost:9000/event/event", [
            'nome'=>'',
            'descricao'=>'',
            'hora_evento'=>'',
            'id_endereco'=>'',
            'id_user'=>''
        ]);
        return $post->json();
       // dd($response->json());
    }

    public function updatePost()
    {
        $post = HTTP::put("https://jsonplaceholder.typicode.com/posts/1", [
            'title'=>'my first title updated',
            'body'=>'Learning points youtube channel'
        ]);
        return $post->json();
       // dd($response->json());
    }

    public function deletePost($id)
    {
        $post = HTTP::delete("https://jsonplaceholder.typicode.com/posts/".$id);
        return $post->json();
       // dd($response->json());
    }
}
