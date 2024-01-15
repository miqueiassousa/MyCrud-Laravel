<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;

class PostControllerResource extends Controller

/*

    --resource

    Ao criar um novo controlee --resource ele já vem predefinido com todos
    os métodos utilizado no CRUD

    1ª - php artisan make:controller PostControllerResource --resource


*/


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Reebera o post com um novo recurso
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = new Post();

        // Ler um post especifico
        $posts = $post->find($id);

        dd($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::where($id,'>',0)->update([
            'author' => 'Sousa',
            'title' => 'Meu post atualizado'
        ]);

        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::where($id,'>',0)->delete();
        return $post;
    }
}
