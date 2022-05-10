<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Exception;

class CommentController extends Controller
{
    public function storeComment(Request $request)
    {
        try {
            Comment::create([
                'user_id' => Auth::user()->id,
                'assign_id' => $request->post_id,
                'reply_id' => isset($request->post_id) ? $request->reply_id : null,
                'text' => $request->text,
            ]);
        } catch (\PDOException $exception) {
            return back() ->withErrors($exception->getMessage());
        }

        return back();
    }

    public function storeCommentAjax(Request $request)
    {
        try {
            Comment::create([
                'user_id' => Auth::user()->id,
                'assign_id' => $request->postId,
                'reply_id' => 0,
                'text' => $request->commentText,
            ]);
        } catch (\PDOException $exception) {
            return [
                'status' => 'error',
                'message' => $exception->getMessage()
            ];
        }

        return [
            'status' => 'success',
        ];
    }
}
