<?php

namespace App\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;//rule

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }
//Esta función solo es el link que redirige al formulario, junto a su post a modificar
    public function create(Post $post)
    {
        
        return view('posts.create', [ 'post' => $post ]);
    }
     //Con este se salva o guarda la info, con el parametro de lo escrito se recupera el envío
     public function store(Request $request)
     {
         //Validación de formularios
         $request->validate([
            'title'=>'required',
            'slug'=>'required|unique:posts,slug',
            'body'=>'required',
        ],[//Aquí en español
            'title.required'=>'Este campo es requerido',
            'slug.required'=>'Colocar la url',
            'slug.unique'=>'Está Url ya existe, intenta con otra',
            'body.required'=>'Se necesita mínimo un párrafo',
        ]);

         $post = $request->user()->posts()->create(  //crearlo, a partir del usuario creado
             [// Aquí se especifica que quiere salvar
                 'title' => $request->title,
                 'slug' => $request->slug, //para tener una url amigable, ejemplo= hola-a-todos
                 'body' => $request->body,
             ]
         );
         //Ahora redirige
         return redirect()->route('posts.edit', $post);
     }
     
//Dentro del parentesis llamamos un registro
    public function edit(Post $post)
    {
        
        return view('posts.edit', [ 'post' => $post ]);
    }

    public function update(Request $request, Post $post)
    {
         //Validación de formularios
         $request->validate([
            'title' => 'required',
            'body' => 'required',   
            'slug' => [
                'required',
                 Rule::unique('posts', 'slug')->ignore($post->id)
             ]
       ]);

        $post ->update(  //crearlo, a partir del usuario creado
            [// Aquí se especifica que quiere salvar
                'title' => $request->title,
                'slug' => $request->slug, //para tener una url amigable, ejemplo= hola-a-todos
                'body' => $request->body,
            ]
        );
        
        //Ahora redirige
        return redirect()->route('posts.edit', $post);
    }
   
    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }

}