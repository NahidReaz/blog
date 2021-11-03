<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index(){

        $posts= Post::latest();

        if (request('search')){
            $posts -> where('title','like','%'.request('search').'%')
                ->orWhere('body','like','%'.request('search').'%');
        }

        return view('posts',[

            'posts' => $posts->get(),
            /*'posts' => $posts->paginate(5),*/
            'categories' => Category::all()
        ]);
    }
    public function show(Post $post){
        return view('post',['post'=> $post]);
    }

    Public function create(){



        return view('create');
    }

}
