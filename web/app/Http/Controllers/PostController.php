<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
}
