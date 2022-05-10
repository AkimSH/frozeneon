<?php

namespace App\Http;

use App\Models\Comment;
use App\Models\Post;

class Helpers
{

    const CLASS_MAP = [
        'comment' => Comment::class,
        'post' => Post::class
    ];

    public static function getClassNameFromString($string)
    {
        return self::CLASS_MAP[$string];
    }






}
