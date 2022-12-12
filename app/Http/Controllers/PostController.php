<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
//menghubungkan controller ke model
class PostController extends Controller
{
    public function index()
    {

        return view('posts', [

            "posts" => Post::latest()->filter(request(['search']))->paginate(7)->withQueryString() //untuk menampilkan data paling akhir dan pagination
        ]);
    }


    public function show(Post $post) //method show yang menerima parameter slug dari route
    {

        return view('post', [
            "title" => "blog",
            "post" => $post
        ]);
    }
}
