<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'comment';
    protected $with = ['user', 'comments'];

    protected $fillable = [
        'user_id',
        'assign_id',
        'reply_id',
        'text'
    ];

    protected $attributes = [
        'likes' => 0,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'reply_id');
    }
}
