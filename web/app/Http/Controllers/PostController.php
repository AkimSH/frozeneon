<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function getAllPosts()
    {
        $post = Post::query()
            ->with(['user' => function ($query) {
                $query->select('id', 'avatarfull', 'personaname');
            }])
            ->orderBy('time_created', 'DESC')
            ->get();

        return response()->json(['status' => 'success', 'posts' =>$post->toArray()]);
    }

    public function getPostByIdAjax($post_id)
    {
        $post = Post::query()
            ->where('id', $post_id)
            ->with(['user' => function ($query) {
                $query->select('id', 'avatarfull', 'personaname');
            }])
            ->with(['coments'])
            ->first();


        return response()->json(['post' => $post]);
    }

    public function getPostById($post_id)
    {
        $post = Post::query()
            ->where('id', $post_id)
            ->with(['user' => function ($query) {
                $query->select('id', 'avatarfull', 'personaname');
            }])
            ->with(['coments'])
            ->first();


        return view('post', ['post' => $post]);
    }
}
