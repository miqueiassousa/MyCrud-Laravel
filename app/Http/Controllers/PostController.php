<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class PostController extends Controller
{
    public function create(Request $request) {

        $new_post = [
            'title' => 'Meu Primeiro Post',
            'content'=> 'Conteúdo Qualquer',
            'author' => 'Alessandro'
            ];

        // Formais mais convecional de criar um registro no banco
        // $post = new Post($new_post);
        // Debugar
        // $post->save();

        $post = new Post();

        $post->title= 'Meu Segundo Post';
        $post->content = 'Conteúdo qualquer';
        $post->author = 'Kobs';
        $post->save();

        dd($post);
    }

    public function read(Request $r) {

        $post = new Post();

        // Ler um post especifico
        $posts = $post->find(2);

        dd($posts);
    }

    public function all(Request $r) {

        // 1 opção

        $posts = Post::all();

        // ou

        //$post = new Post();
        //$posts = $post->all();

        return $posts;
    }



    public function update(Request $request) {

        //$post = Post::find(1);

        //Retorna o numero de registros que foram atualizados
        $post = Post::where('id','>',0)->update([
            'author' => 'Sousa',
            'title' => 'Meu post atualizado'
        ]);

        // $post->title = 'Meu post atualizado';
        // $post->save();

        return $post;

    }



    public function delete(Request $request) {

        // $post = Post::find(2);

        // if ($post) {

        //     return $post->delete();

        // }

        // Apaga tudo
        $post = Post::where('id','>',0)->delete();
        return $post;

        /*
            Recurso softDelete proteger os dado que foram deletados, ele desativa
            e não apagar definitivo, o dado continua no banco porem uma coluna
            sera criada infomando quando que o dado foi desativado, podendo
            assim recuperar mais tarde

            1ª - Adicionar o softdelete na migration post_table
            2ª - $table->softDeletes();
            3ª - php artisan migrate:fresh
            4ª - Precisa dizer pro model/post pra não apagar e sim desativar
            5ª - Em model inserir  use SoftDeletes;
        */

    }

}
