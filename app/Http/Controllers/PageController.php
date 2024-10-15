<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(Request $request)
    {

        //para hacer busquedas
        $search = $request->search;
        //mejoramos la consulta para que ayude a las busquedas
        //se escribe la consulta con el valor de busqueda la variable search
        $posts = Post::where('title', 'LIKE', "%{$search}%")
            ->with('user')
            ->latest()->paginate();

        return view('home', ['posts' => $posts]);
    }
 /*  public function blog()
    {
        // $posts = Post::get();
        // $post = Post::first();
        // $post = Post::find(25);

        // dd($post)

        $posts = Post::latest()->paginate();
        
        return view('blog', ['posts' => $posts]);
    }*/
    public function post(Post $post)
{
        return view('post', ['post' => $post]);
    }
}
